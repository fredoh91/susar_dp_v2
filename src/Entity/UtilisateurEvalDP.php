<?php

namespace App\Entity;

use App\Repository\UtilisateurEvalDPRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurEvalDPRepository::class)
 */
class UtilisateurEvalDP
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
    private $NomUser;

    /**
     * @ORM\Column(type="boolean")
     */
    private $FlActif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUser(): ?string
    {
        return $this->NomUser;
    }

    public function setNomUser(string $NomUser): self
    {
        $this->NomUser = $NomUser;

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
