<?php

namespace App\Command;

use App\Entity\Summary;
use App\Entity\Detail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use League\Csv\Reader;

#[AsCommand(
    name: 'app:import-csv',
    description: 'Imports data from a CSV file and saves it to the database',
)]
class AppCommandImportCsvCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('filePath', InputArgument::REQUIRED, 'Path to the CSV file to be imported')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filePath = $input->getArgument('filePath');

        if (!file_exists($filePath)) {
            $io->error('File not found: ' . $filePath);
            return Command::FAILURE;
        }

        $io->title('Starting CSV import');
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();
        foreach ($records as $record) {
            $summary = new Summary();
            
            $summary->setDate(new \DateTime());
            $summary->setTotalRecords($record['registre'] ?? 0);

            $genderDistribution = [
                'male' => (int)($record['male'] ?? 0),
                'female' => (int)($record['female'] ?? 0),
                'other' => (int)($record['other'] ?? 0),
            ];
            $summary->setGenderDistribution($genderDistribution);
        
            $ageDistribution = [
                '00-10' => [
                    'male' => (int)($record['00-10_male'] ?? 0),
                    'female' => (int)($record['00-10_female'] ?? 0),
                    'other' => (int)($record['00-10_other'] ?? 0),
                ],
                '11-20' => [
                    'male' => (int)($record['11-20_male'] ?? 0),
                    'female' => (int)($record['11-20_female'] ?? 0),
                    'other' => (int)($record['11-20_other'] ?? 0),
                ],
                '21-30' => [
                    'male' => (int)($record['21-30_male'] ?? 0),
                    'female' => (int)($record['21-30_female'] ?? 0),
                    'other' => (int)($record['21-30_other'] ?? 0),
                ],
                '31-40' => [
                    'male' => (int)($record['31-40_male'] ?? 0),
                    'female' => (int)($record['31-40_female'] ?? 0),
                    'other' => (int)($record['31-40_other'] ?? 0),
                ],
                '41-50' => [
                    'male' => (int)($record['41-50_male'] ?? 0),
                    'female' => (int)($record['41-50_female'] ?? 0),
                    'other' => (int)($record['41-50_other'] ?? 0),
                ],
                '51-60' => [
                    'male' => (int)($record['51-60_male'] ?? 0),
                    'female' => (int)($record['51-60_female'] ?? 0),
                    'other' => (int)($record['51-60_other'] ?? 0),
                ],
                '61-70' => [
                    'male' => (int)($record['61-70_male'] ?? 0),
                    'female' => (int)($record['61-70_female'] ?? 0),
                    'other' => (int)($record['61-70_other'] ?? 0),
                ],
                '71-80' => [
                    'male' => (int)($record['71-80_male'] ?? 0),
                    'female' => (int)($record['71-80_female'] ?? 0),
                    'other' => (int)($record['71-80_other'] ?? 0),
                ],
                '81-90' => [
                    'male' => (int)($record['81-90_male'] ?? 0),
                    'female' => (int)($record['81-90_female'] ?? 0),
                    'other' => (int)($record['81-90_other'] ?? 0),
                ],
                '91+' => [
                    'male' => (int)($record['91+_male'] ?? 0),
                    'female' => (int)($record['91+_female'] ?? 0),
                    'other' => (int)($record['91+_other'] ?? 0),
                ],
            ];
            $summary->setAgeDistribution($ageDistribution);

            $soDistribution = [
                'Windows' => (int)($record['Windows'] ?? 0),
                'Apple' => (int)($record['Apple'] ?? 0),
                'Linux' => (int)($record['Linux'] ?? 0),
            ];
            $summary->setSoDistribution($soDistribution);
        
            $summary->setFilename(basename($filePath));
        
            $currentDate = new \DateTime();
            $summary->setCreatedAt($currentDate);
            $summary->setUpdatedAt($currentDate);

            $this->entityManager->persist($summary);

            // -------------------------------------------------------------------------------------------------------
            // -----------------------------------------------  DETAIL -----------------------------------------------
            // -------------------------------------------------------------------------------------------------------
            $detail = new Detail();
            $detail->setFirstName($record['firstName'] ?? null);
            $detail->setLastName($record['lastName'] ?? null);
            $detail->setAge($record['age'] ?? null);
            $detail->setGender($record['gender'] ?? null);
            $detail->setEmail($record['email'] ?? null);
            $detail->setPhone($record['phone'] ?? null);
            $detail->setUsername($record['username'] ?? null);
            $detail->setPassword($record['password'] ?? null);
            $detail->setBirthDate($record['birthDate'] ?? null);
            $detail->setImage($record['image'] ?? null);
            $detail->setBloodGroup($record['bloodGroup'] ?? null);
            $detail->setHeight($record['height'] ?? null);
            $detail->setWeight($record['weight'] ?? null);
            $detail->setEyeColor($record['eyeColor'] ?? null);
            $detail->setHairColor($record['hairColor'] ?? null);
            $detail->setHairType($record['hairType'] ?? null);
            $detail->setIp($record['ip'] ?? null);
            $detail->setAddress($record['address'] ?? null);
            $detail->setAddressCity($record['addressCity'] ?? null);
            $detail->setAddressState($record['addressState'] ?? null);
            $detail->setAddressStateCode($record['addressStateCode'] ?? null);
            $detail->setAddressPostalCode($record['addressPostalCode'] ?? null);
            $detail->setAddressCoordinatesLat($record['addressCoordinatesLat'] ?? null);
            $detail->setAddressCoordinatesLng($record['addressCoordinatesLng'] ?? null);
            $detail->setAddressCountry($record['addressCountry'] ?? null);
            $detail->setMacAddress($record['macAddress'] ?? null);
            $detail->setUniversity($record['university'] ?? null);
            $detail->setBankCardExpire($record['bankCardExpire'] ?? null);
            $detail->setBankCardNumber($record['bankCardNumber'] ?? null);
            $detail->setBankCardType($record['bankCardType'] ?? null);
            $detail->setBankCurrency($record['bankCurrency'] ?? null);
            $detail->setBankIban($record['bankIban'] ?? null);
            $detail->setCompanyDepartment($record['companyDepartment'] ?? null);
            $detail->setCompanyName($record['companyName'] ?? null);
            $detail->setCompanyTitle($record['companyTitle'] ?? null);
            $detail->setCompanyAddress($record['companyAddress'] ?? null);
            $detail->setCompanyAddressCity($record['companyAddressCity'] ?? null);
            $detail->setCompanyAddressState($record['companyAddressState'] ?? null);
            $detail->setCompanyAddressStateCode($record['companyAddressStateCode'] ?? null);
            $detail->setCompanyAddressPostalCode($record['companyAddressPostalCode'] ?? null);
            $detail->setCompanyAddressCoordinatesLat($record['companyAddressCoordinatesLat'] ?? null);
            $detail->setCompanyAddressCoordinatesLng($record['companyAddressCoordinatesLng'] ?? null);
            $detail->setCompanyAddressCountry($record['companyAddressCountry'] ?? null);
            $detail->setEin($record['ein'] ?? null);
            $detail->setSsn($record['ssn'] ?? null);
            $detail->setUserAgent($record['userAgent'] ?? null);
            $detail->setCryptoCoin($record['cryptoCoin'] ?? null);
            $detail->setCryptoWallet($record['cryptoWallet'] ?? null);
            $detail->setCryptoNetwork($record['cryptoNetwork'] ?? null);
            $detail->setRole($record['role'] ?? null);

            $detail->setSummary($summary);

            $this->entityManager->persist($detail);
        }

        $this->entityManager->flush();

        $io->success('CSV import completed successfully.');
        return Command::SUCCESS;
    }
}
