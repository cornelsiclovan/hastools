<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subservice", mappedBy="service")
     */
    private $subservices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Configuration", mappedBy="service")
     */
    private $configurations;

    public function __construct()
    {
        $this->subservices = new ArrayCollection();
        $this->configurations = new ArrayCollection();
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

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Subservice[]
     */
    public function getSubservices(): Collection
    {
        return $this->subservices;
    }

    public function addSubservice(Subservice $subservice): self
    {
        if (!$this->subservices->contains($subservice)) {
            $this->subservices[] = $subservice;
            $subservice->setService($this);
        }

        return $this;
    }

    public function removeSubservice(Subservice $subservice): self
    {
        if ($this->subservices->contains($subservice)) {
            $this->subservices->removeElement($subservice);
            // set the owning side to null (unless already changed)
            if ($subservice->getService() === $this) {
                $subservice->setService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Configuration[]
     */
    public function getConfigurations(): Collection
    {
        return $this->configurations;
    }

    public function addConfiguration(Configuration $configuration): self
    {
        if (!$this->configurations->contains($configuration)) {
            $this->configurations[] = $configuration;
            $configuration->setService($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->contains($configuration)) {
            $this->configurations->removeElement($configuration);
            // set the owning side to null (unless already changed)
            if ($configuration->getService() === $this) {
                $configuration->setService(null);
            }
        }

        return $this;
    }
}
