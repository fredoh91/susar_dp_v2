<?php

namespace App\Entity;

use App\Repository\DPRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DPRepository::class)
 */
class DP
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDP;

    /**
     * @ORM\Column(type="boolean")
     */
    private $FlActif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDP(): ?string
    {
        return $this->nomDP;
    }

    public function setNomDP(string $nomDP): self
    {
        $this->nomDP = $nomDP;

        return $this;
    }

    public function getFlActif(): ?bool
    {
        return $this->FlActif;
    }

    public function setFlActif(bool $FlActif): self
    {
        $this->FlActif = $FlActif;

        return $this;
    }
}
