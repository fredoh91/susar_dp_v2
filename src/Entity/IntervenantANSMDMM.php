<?php

namespace App\Entity;

use App\Repository\IntervenantANSMDMMRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IntervenantANSMDMMRepository::class)
 */
class IntervenantANSMDMM
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
    private $DMM;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DMM_court;

    /**
     * @ORM\Column(type="boolean")
     */
    private $FlActif;

    /**
     * @ORM\OneToMany(targetEntity=Evaluateurs::class, mappedBy="DMM")
     */
    private $nomEval;

    public function __construct()
    {
        $this->nomEval = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDMM(): ?string
    {
        return $this->DMM;
    }

    public function setDMM(string $DMM): self
    {
        $this->DMM = $DMM;

        return $this;
    }

    public function getDMMCourt(): ?string
    {
        return $this->DMM_court;
    }

    public function setDMMCourt(string $DMM_court): self
    {
        $this->DMM_court = $DMM_court;

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

    /**
     * @return Collection|Evaluateurs[]
     */
    public function getNomEval(): Collection
    {
        return $this->nomEval;
    }

    public function addNomEval(Evaluateurs $nomEval): self
    {
        if (!$this->nomEval->contains($nomEval)) {
            $this->nomEval[] = $nomEval;
            $nomEval->setDMM($this);
        }

        return $this;
    }

    public function removeNomEval(Evaluateurs $nomEval): self
    {
        if ($this->nomEval->removeElement($nomEval)) {
            // set the owning side to null (unless already changed)
            if ($nomEval->getDMM() === $this) {
                $nomEval->setDMM(null);
            }
        }

        return $this;
    }
}
