<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Subservice", mappedBy="types")
     */
    private $subservices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Configuration", mappedBy="type")
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
            $subservice->addType($this);
        }

        return $this;
    }

    public function removeSubservice(Subservice $subservice): self
    {
        if ($this->subservices->contains($subservice)) {
            $this->subservices->removeElement($subservice);
            $subservice->removeType($this);
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
            $configuration->setType($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->contains($configuration)) {
            $this->configurations->removeElement($configuration);
            // set the owning side to null (unless already changed)
            if ($configuration->getType() === $this) {
                $configuration->setType(null);
            }
        }

        return $this;
    }
}
