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
     * @ORM\ManyToMany(targetEntity="App\Entity\Zone", mappedBy="services")
     */
    private $zones;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Subzone", mappedBy="services")
     */
    private $subzones;

    public function __construct()
    {
        $this->zones = new ArrayCollection();
        $this->subzones = new ArrayCollection();
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
     * @return Collection|Zone[]
     */
    public function getZones(): Collection
    {
        return $this->zones;
    }

    public function addZone(Zone $zone): self
    {
        if (!$this->zones->contains($zone)) {
            $this->zones[] = $zone;
            $zone->addService($this);
        }

        return $this;
    }

    public function removeZone(Zone $zone): self
    {
        if ($this->zones->contains($zone)) {
            $this->zones->removeElement($zone);
            $zone->removeService($this);
        }

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
            $subzone->addService($this);
        }

        return $this;
    }

    public function removeSubzone(Subzone $subzone): self
    {
        if ($this->subzones->contains($subzone)) {
            $this->subzones->removeElement($subzone);
            $subzone->removeService($this);
        }

        return $this;
    }
}
