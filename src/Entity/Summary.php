<?php

namespace App\Entity;

use App\Repository\SummaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SummaryRepository::class)]
class Summary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $totalRecords = null;

    #[ORM\Column]
    private array $genderDistribution = [];

    #[ORM\Column]
    private array $ageDistribution = [];

    #[ORM\Column]
    private array $cityDistribution = [];

    #[ORM\Column]
    private array $soDistribution = [];

    #[ORM\Column(length: 255)]
    private ?string $filename = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $updatedAt = null;

    /**
     * @var Collection<int, Detail>
     */
    #[ORM\OneToMany(targetEntity: Detail::class, mappedBy: 'summary')]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTotalRecords(): ?int
    {
        return $this->totalRecords;
    }

    public function setTotalRecords(int $totalRecords): static
    {
        $this->totalRecords = $totalRecords;

        return $this;
    }

    public function getGenderDistribution(): array
    {
        return $this->genderDistribution;
    }

    public function setGenderDistribution(array $genderDistribution): static
    {
        $this->genderDistribution = $genderDistribution;

        return $this;
    }

    public function getAgeDistribution(): array
    {
        return $this->ageDistribution;
    }

    public function setAgeDistribution(array $ageDistribution): static
    {
        $this->ageDistribution = $ageDistribution;

        return $this;
    }

    public function getCityDistribution(): array
    {
        return $this->cityDistribution;
    }

    public function setCityDistribution(array $cityDistribution): static
    {
        $this->cityDistribution = $cityDistribution;

        return $this;
    }

    public function getSoDistribution(): array
    {
        return $this->soDistribution;
    }

    public function setSoDistribution(array $soDistribution): static
    {
        $this->soDistribution = $soDistribution;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): static
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setSummary($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): static
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getSummary() === $this) {
                $detail->setSummary(null);
            }
        }

        return $this;
    }
}
