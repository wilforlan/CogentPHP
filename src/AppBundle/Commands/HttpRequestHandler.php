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
    ->addArgument('method', InputArgument::OPTIONAL, 'Request Method. Default -> GET... Available Method -> [GET, POST]')
    ->addArgument("params", InputArgument::OPTIONAL, "Request Parameters. In an Array Format. Sample ['name' => 'John Doe']")
    ->setName('app:request-url')
    ->setDescription('Perform HTTP Request on Console.')
    ->setHelp("This Command Allow to Perform CURL HTTP Request On Command Line...");
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // outputs multiple lines to the console (adding "\n" at the end of each line)
    $http = HttpClient::getInstance();
    $output->writeln([
      "<comment>Executing Command -> app:request-url {$input->getArgument('requesturl')}</comment>",
      '**************************************************',
    ]);

    $execute = $http->makeRequest($input->getArgument('requesturl'),$input->getArgument('method'),$input->getArgument('params'));

    if ($execute->status) {
      $output->writeln([
        "<bg=green;options=bold>{$execute->message}</>",
        '**************************************************',
      ]);
      $result = ['statusCode' => $execute->data->code, 'body' => $execute->data->body];
      print_r($result);
      $output->writeln([
        "<bg=blue;options=bold>Raw Body: {$execute->data}</>",
        '**************************************************',
      ]);
    }
    else {
      $output->writeln([
        "<bg=red;options=bold>{$execute->message}</>",
        '**************************************************',
      ]);
    }
    // $output->writeln([]), $input->getArgument('method')]);


  }
}
?>
