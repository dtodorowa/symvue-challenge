<?php

namespace App\Entity;

use App\Repository\InsurerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsurerRepository::class)]
class Insurer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'insurer', targetEntity: Policy::class)]
    private Collection $policies;

    public function __construct()
    {
        $this->policies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Policy>
     */
    public function getPolicies(): Collection
    {
        return $this->policies;
    }

    public function addPolicy(Policy $policy): self
    {
        if (!$this->policies->contains($policy)) {
            $this->policies->add($policy);
            $policy->setInsurer($this);
        }

        return $this;
    }

    public function removePolicy(Policy $policy): self
    {
        if ($this->policies->removeElement($policy)) {
            // set the owning side to null (unless already changed)
            if ($policy->getInsurer() === $this) {
                $policy->setInsurer(null);
            }
        }

        return $this;
    }
}
