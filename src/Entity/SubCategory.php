<?php

namespace App\Entity;

use App\Entity\Type;
use App\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="subCategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="subCategory")
     */
    private $SubCategory;
    //private $SubCategory is should be $product;

    public function __construct()
    {
        $this->SubCategory = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Product[]
     */
    public function getSubCategory(): Collection
    {
        return $this->SubCategory;
    }

    public function addSubCategory(Product $subCategory): self
    {
        if (!$this->SubCategory->contains($subCategory)) {
            $this->SubCategory[] = $subCategory;
            $subCategory->setSubCategory($this);
        }

        return $this;
    }

    public function removeSubCategory(Product $subCategory): self
    {
        if ($this->SubCategory->contains($subCategory)) {
            $this->SubCategory->removeElement($subCategory);
            // set the owning side to null (unless already changed)
            if ($subCategory->getSubCategory() === $this) {
                $subCategory->setSubCategory(null);
            }
        }

        return $this;
    }
  
}
