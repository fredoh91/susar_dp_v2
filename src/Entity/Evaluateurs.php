<?php

namespace App\Entity;

use App\Repository\EvaluateursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvaluateursRepository::class)
 */
class Evaluateurs
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
    private $nomEval;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DP;

    /**
     * @ORM\Column(type="boolean")
     */
    private $FlActif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEval(): ?string
    {
        return $this->nomEval;
    }

    public function setNomEval(string $nomEval): self
    {
        $this->nomEval = $nomEval;

        return $this;
    }

    public function getDP(): ?string
    {
        return $this->DP;
    }

    public function setDP(string $DP): self
    {
        $this->DP = $DP;

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
