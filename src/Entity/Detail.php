<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $userId = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 10)]
    private ?string $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $usename = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $bloodGroup = null;

    #[ORM\Column(nullable: true)]
    private ?float $height = null;

    #[ORM\Column(nullable: true)]
    private ?float $weight = null;

    #[ORM\Column(length: 16, nullable: true)]
    private ?string $eyeColor = null;

    #[ORM\Column(length: 16, nullable: true)]
    private ?string $hairColor = null;

    #[ORM\Column(length: 16, nullable: true)]
    private ?string $hairType = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $ip = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 50)]
    private ?string $city = null;

    #[ORM\Column(length: 50)]
    private ?string $state = null;

    #[ORM\Column(length: 5)]
    private ?string $stateCode = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $postalCode = null;

    #[ORM\Column(nullable: true)]
    private ?float $coordinatesLat = null;

    #[ORM\Column(nullable: true)]
    private ?float $coordinatesLng = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $macAddress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $university = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $bankCardExpire = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $bankCardNumber = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $bankCardType = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $bankCurrency = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $bankIban = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyDepartment = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyName = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyTitle = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyAddress = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyCity = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyState = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $companyStateCode = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $companyPostalCode = null;

    #[ORM\Column(nullable: true)]
    private ?float $companyCoordinatesLat = null;

    #[ORM\Column(nullable: true)]
    private ?float $companyCoordinatesLng = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $companyCountry = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $ein = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $ssn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userAgent = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cryptoCoin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cryptoWallet = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $cryptoNetwork = null;

    #[ORM\Column(length: 20)]
    private ?string $role = null;

    #[ORM\ManyToOne(inversedBy: 'details')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Summary $summary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getUsename(): ?string
    {
        return $this->usename;
    }

    public function setUsename(?string $usename): static
    {
        $this->usename = $usename;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getBloodGroup(): ?string
    {
        return $this->bloodGroup;
    }

    public function setBloodGroup(?string $bloodGroup): static
    {
        $this->bloodGroup = $bloodGroup;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?float $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getEyeColor(): ?string
    {
        return $this->eyeColor;
    }

    public function setEyeColor(?string $eyeColor): static
    {
        $this->eyeColor = $eyeColor;

        return $this;
    }

    public function getHairColor(): ?string
    {
        return $this->hairColor;
    }

    public function setHairColor(?string $hairColor): static
    {
        $this->hairColor = $hairColor;

        return $this;
    }

    public function getHairType(): ?string
    {
        return $this->hairType;
    }

    public function setHairType(?string $hairType): static
    {
        $this->hairType = $hairType;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getStateCode(): ?string
    {
        return $this->stateCode;
    }

    public function setStateCode(string $stateCode): static
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCoordinatesLat(): ?float
    {
        return $this->coordinatesLat;
    }

    public function setCoordinatesLat(?float $coordinatesLat): static
    {
        $this->coordinatesLat = $coordinatesLat;

        return $this;
    }

    public function getCoordinatesLng(): ?float
    {
        return $this->coordinatesLng;
    }

    public function setCoordinatesLng(?float $coordinatesLng): static
    {
        $this->coordinatesLng = $coordinatesLng;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    public function setMacAddress(?string $macAddress): static
    {
        $this->macAddress = $macAddress;

        return $this;
    }

    public function getUniversity(): ?string
    {
        return $this->university;
    }

    public function setUniversity(?string $university): static
    {
        $this->university = $university;

        return $this;
    }

    public function getBankCardExpire(): ?string
    {
        return $this->bankCardExpire;
    }

    public function setBankCardExpire(?string $bankCardExpire): static
    {
        $this->bankCardExpire = $bankCardExpire;

        return $this;
    }

    public function getBankCardNumber(): ?string
    {
        return $this->bankCardNumber;
    }

    public function setBankCardNumber(?string $bankCardNumber): static
    {
        $this->bankCardNumber = $bankCardNumber;

        return $this;
    }

    public function getBankCardType(): ?string
    {
        return $this->bankCardType;
    }

    public function setBankCardType(?string $bankCardType): static
    {
        $this->bankCardType = $bankCardType;

        return $this;
    }

    public function getBankCurrency(): ?string
    {
        return $this->bankCurrency;
    }

    public function setBankCurrency(?string $bankCurrency): static
    {
        $this->bankCurrency = $bankCurrency;

        return $this;
    }

    public function getBankIban(): ?string
    {
        return $this->bankIban;
    }

    public function setBankIban(?string $bankIban): static
    {
        $this->bankIban = $bankIban;

        return $this;
    }

    public function getCompanyDepartment(): ?string
    {
        return $this->companyDepartment;
    }

    public function setCompanyDepartment(?string $companyDepartment): static
    {
        $this->companyDepartment = $companyDepartment;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanyTitle(): ?string
    {
        return $this->companyTitle;
    }

    public function setCompanyTitle(?string $companyTitle): static
    {
        $this->companyTitle = $companyTitle;

        return $this;
    }

    public function getCompanyAddress(): ?string
    {
        return $this->companyAddress;
    }

    public function setCompanyAddress(?string $companyAddress): static
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    public function getCompanyCity(): ?string
    {
        return $this->companyCity;
    }

    public function setCompanyCity(?string $companyCity): static
    {
        $this->companyCity = $companyCity;

        return $this;
    }

    public function getCompanyState(): ?string
    {
        return $this->companyState;
    }

    public function setCompanyState(?string $companyState): static
    {
        $this->companyState = $companyState;

        return $this;
    }

    public function getCompanyStateCode(): ?string
    {
        return $this->companyStateCode;
    }

    public function setCompanyStateCode(?string $companyStateCode): static
    {
        $this->companyStateCode = $companyStateCode;

        return $this;
    }

    public function getCompanyPostalCode(): ?string
    {
        return $this->companyPostalCode;
    }

    public function setCompanyPostalCode(?string $companyPostalCode): static
    {
        $this->companyPostalCode = $companyPostalCode;

        return $this;
    }

    public function getCompanyCoordinatesLat(): ?float
    {
        return $this->companyCoordinatesLat;
    }

    public function setCompanyCoordinatesLat(?float $companyCoordinatesLat): static
    {
        $this->companyCoordinatesLat = $companyCoordinatesLat;

        return $this;
    }

    public function getCompanyCoordinatesLng(): ?float
    {
        return $this->companyCoordinatesLng;
    }

    public function setCompanyCoordinatesLng(?float $companyCoordinatesLng): static
    {
        $this->companyCoordinatesLng = $companyCoordinatesLng;

        return $this;
    }

    public function getCompanyCountry(): ?string
    {
        return $this->companyCountry;
    }

    public function setCompanyCountry(?string $companyCountry): static
    {
        $this->companyCountry = $companyCountry;

        return $this;
    }

    public function getEin(): ?string
    {
        return $this->ein;
    }

    public function setEin(?string $ein): static
    {
        $this->ein = $ein;

        return $this;
    }

    public function getSsn(): ?string
    {
        return $this->ssn;
    }

    public function setSsn(?string $ssn): static
    {
        $this->ssn = $ssn;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): static
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getCryptoCoin(): ?string
    {
        return $this->cryptoCoin;
    }

    public function setCryptoCoin(?string $cryptoCoin): static
    {
        $this->cryptoCoin = $cryptoCoin;

        return $this;
    }

    public function getCryptoWallet(): ?string
    {
        return $this->cryptoWallet;
    }

    public function setCryptoWallet(?string $cryptoWallet): static
    {
        $this->cryptoWallet = $cryptoWallet;

        return $this;
    }

    public function getCryptoNetwork(): ?string
    {
        return $this->cryptoNetwork;
    }

    public function setCryptoNetwork(?string $cryptoNetwork): static
    {
        $this->cryptoNetwork = $cryptoNetwork;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getSummary(): ?Summary
    {
        return $this->summary;
    }

    public function setSummary(?Summary $summary): static
    {
        $this->summary = $summary;

        return $this;
    }
}
