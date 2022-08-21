<?php

namespace App\Entity;

use App\Repository\PolicyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolicyRepository::class)]
class Policy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $premium = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Customer $customer = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?PolicyType $policyType = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Insurer $insurer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPremium(): ?float
    {
        return $this->premium;
    }

    public function setPremium(float $premium): self
    {
        $this->premium = $premium;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPolicyType(): ?PolicyType
    {
        return $this->policyType;
    }

    public function setPolicyType(?PolicyType $policyType): self
    {
        $this->policyType = $policyType;

        return $this;
    }

    public function getInsurer(): ?Insurer
    {
        return $this->insurer;
    }

    public function setInsurer(?Insurer $insurer): self
    {
        $this->insurer = $insurer;

        return $this;
    }
}
