<?php
namespace AppBundle\Command;

require 'vendor/autoload.php';
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
class CreateUserCommand extends ContainerAwareCommand
{
  protected function configure()
  {
    $this
    ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
    // the name of the command (the part after "bin/console")
    ->setName('app:create-users')

    // the short description shown while running "php bin/console list"
    ->setDescription('Creates new users.')

    // the full command description shown when running the command with
    // the "--help" option
    ->setHelp("This command allows you to create users...")
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // outputs multiple lines to the console (adding "\n" at the end of each line)
    $output->writeln([
      'User Creator',
      '============',
      '',
    ]);


    $output->writeln('Username: '.$input->getArgument('username'));
    $userManager = $this->getContainer()->get('app.user_manager');
        $userManager->create($input->getArgument('username'));

        $output->writeln('User successfully generated!');
  }
}
