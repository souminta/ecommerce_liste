<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Basket", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $basket_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBasketId(): ?basket
    {
        return $this->basket_id;
    }

    public function setBasketId(basket $basket_id): self
    {
        $this->basket_id = $basket_id;

        return $this;
    }
}
