<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ZoneRepository")
 */
class Zone
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
     * @ORM\Column(type="string", length=255)
     */
    private $size;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subzone", mappedBy="zone")
     */
    private $subzones;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="zones")
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Configuration", mappedBy="zone")
     */
    private $configurations;

    public function __construct()
    {
        $this->subzones = new ArrayCollection();
        $this->services = new ArrayCollection();
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

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return Collection|Subzone[]
     */
    public function getSubzones(): Collection
    {
        return $this->subzones;
    }

    public function addSubzone(Subzone $subzone): self
    {
        if (!$this->subzones->contains($subzone)) {
            $this->subzones[] = $subzone;
            $subzone->setZone($this);
        }

        return $this;
    }

    public function removeSubzone(Subzone $subzone): self
    {
        if ($this->subzones->contains($subzone)) {
            $this->subzones->removeElement($subzone);
            // set the owning side to null (unless already changed)
            if ($subzone->getZone() === $this) {
                $subzone->setZone(null);
            }
        }

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
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
            $configuration->setZone($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->contains($configuration)) {
            $this->configurations->removeElement($configuration);
            // set the owning side to null (unless already changed)
            if ($configuration->getZone() === $this) {
                $configuration->setZone(null);
            }
        }

        return $this;
    } 
}
