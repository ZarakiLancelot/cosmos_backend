<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Filesystem\Filesystem;

#[AsCommand(
    name: 'app:extract-data',
    description: 'Extract data from a file.',
)]
class AppCommandExtractDataCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://dummyjson.com/users');

        $data = $response->toArray();
        $date = (new \DateTime())->format('Ymd');
        $filename = "data_$date.json";

        $filesystem = new Filesystem();
        $filesystem->dumpFile("var/$filename", json_encode($data));

        $output->writeln("Data extracted and saved to $filename.");

        return Command::SUCCESS;
    }
}
