<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

#[AsCommand(
    name: 'app:transform-data',
    description: 'Transform data from a file.',
)]
class AppCommandTransformDataCommand extends Command
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
        $date = (new \DateTime())->format('Ymd');
        $jsonFilename = "var/data_$date.json";
        $csvFilename = "var/ETL_$date.csv";

        if (!file_exists($jsonFilename)) {
            $output->writeln("JSON file not found: $jsonFilename.");
            return Command::FAILURE;
        }

        $data = json_decode(file_get_contents($jsonFilename), true);

        if (isset($data['users']) && is_array($data['users']) && !empty($data['users'])) {
            $csvFile = fopen($csvFilename, 'w');

            fputcsv($csvFile, array_keys($data['users'][0]));
            foreach ($data['users'] as $user) {
                if (is_array($user)) {
                    fputcsv($csvFile, $user);                    
                } else {
                    $output->writeln("Invalid user data: $user.");
                    return Command::FAILURE;
                }
            }

            fclose($csvFile);
            $output->writeln("Data transformed and saved to $csvFilename.");
            return Command::SUCCESS;
        } else {
            $output->writeln("No users data found in JSON file. Invalid data structure.");
            return Command::FAILURE;
        }
    }
}
