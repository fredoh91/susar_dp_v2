<?php

namespace App\Entity;

use App\Repository\TypeMesureActionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeMesureActionRepository::class)
 */
class TypeMesureAction
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
    private $LibMesureAction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $FlActif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibMesureAction(): ?string
    {
        return $this->LibMesureAction;
    }

    public function setLibMesureAction(string $LibMesureAction): self
    {
        $this->LibMesureAction = $LibMesureAction;

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
