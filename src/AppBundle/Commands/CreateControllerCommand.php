<?php
namespace AppBundle\Commands;

require 'vendor/autoload.php';
// require 'LoadCore.php';
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Core\Core\Build\Genarators;

class CreateControllerCommand extends Command
{
  protected function configure()
  {
    $this
    ->addArgument('controllername', InputArgument::REQUIRED, 'Name Of The Controller to Generate.')
    ->addArgument('option', InputArgument::OPTIONAL, 'Want to Generate a Model?')
    ->setName('app:create-controller')
    ->setDescription('Creates new Contoller.')
    ->setHelp("This command allows you to create new Contoller...");
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // outputs multiple lines to the console (adding "\n" at the end of each line)
    $generator = Genarators::getInstance();
    $output->writeln([
      "<comment>Executing Command -> app:create-controller {$input->getArgument('controllername')}</comment>",
      '**************************************************',
    ]);

    $getArgumentOption = $input->getArgument('option');
    if ($getArgumentOption == 'withModel') {
      $generator->generateModel($input->getArgument('controllername'));
      $build = $generator->generateController($input->getArgument('controllername'));
    }
    else{
      $build = $generator->generateController($input->getArgument('controllername'));
    }

    if ($build['status']) {
      $output->writeln(["<bg=green;options=bold>{$build['message']}</>"]);
    }
    else {
      $output->writeln(["<bg=red;options=bold>{$build['message']}</>"]);
    }

  }
}
