<?php
namespace AppBundle\Commands;

require 'vendor/autoload.php';
// require 'LoadCore.php';
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Core\Core\Build\HttpClient;

class HttpRequestHandler extends Command
{
  protected function configure()
  {
    $this
    ->addArgument('requesturl', InputArgument::REQUIRED, 'Name Of The Controller to Generate.')
    ->addArgument('method', InputArgument::OPTIONAL, 'Enter withController if you Want to Generate a Controller')
    ->addArgument('params', InputArgument::OPTIONAL, 'Enter withController if you Want to Generate a Controller')
    ->setName('app:request-url')
    ->setDescription('Creates new Model.')
    ->setHelp("This command allows you to create new Model...");
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // outputs multiple lines to the console (adding "\n" at the end of each line)
    $http = HttpClient::getInstance();

    $output->writeln([
      "<comment>Executing Command -> app:request-url {$input->getArgument('requesturl')}</comment>",
      '**************************************************',
    ]);

    $output->writeln([$http->validUrl($input->getArgument('requesturl')), $input->getArgument('method')]);


  }
}
?>
