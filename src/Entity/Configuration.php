<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ConfigurationRepository")
 */
class Configuration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone", inversedBy="configurations")
     */
    private $zone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subzone", inversedBy="configurations")
     */
    private $subzone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="configurations")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subservice", inversedBy="configurations")
     */
    private $subservice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="configurations")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getSubzone(): ?Subzone
    {
        return $this->subzone;
    }

    public function setSubzone(?Subzone $subzone): self
    {
        $this->subzone = $subzone;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getSubservice(): ?Subservice
    {
        return $this->subservice;
    }

    public function setSubservice(?Subservice $subservice): self
    {
        $this->subservice = $subservice;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function __toString()
    {
        return "configuration ".$this->getZone()->__toString()." ".$this->getId();
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }
}
