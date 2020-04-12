<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *      itemOperations={"get"},
 *      collectionOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\SubCategoryRepository")
 */
class SubCategory
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="subCategories")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Item", mappedBy="subcategory")
     */
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
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
     * @return Collection $items
     */
    public function getItems() : Collection 
    {
        return $this->items;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category 
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): self 
    {
       $this->category = $category;

       return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
