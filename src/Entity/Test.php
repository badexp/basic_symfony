<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 * @ORM\Table(name="test", indexes={@ORM\Index(name="random_index", columns={"random"})})
 */
class Test
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
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="float")
     */
    private $random;

    public function __construct()
    {
        $this->random = random_int(PHP_INT_MIN, PHP_INT_MAX);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getRandom(): ?float
    {
        return $this->random;
    }

    public function setRandom(float $random): self
    {
        $this->random = $random;

        return $this;
    }
}
