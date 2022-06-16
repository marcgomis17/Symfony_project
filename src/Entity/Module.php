<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    private $nomModule;

    #[ORM\ManyToMany(targetEntity: Professeur::class, mappedBy: 'modules')]
    private $professeurs;


    public function __construct() {
        $this->professeurs = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNomModule(): ?string {
        return $this->nomModule;
    }

    public function setNomModule(string $nomModule): self {
        $this->nomModule = $nomModule;

        return $this;
    }

    /**
     * @return Collection<int, Professeur>
     */
    public function getProfesseurs(): Collection {
        return $this->professeurs;
    }

    public function addProfesseur(Professeur $professeur): self {
        if (!$this->professeurs->contains($professeur)) {
            $this->professeurs[] = $professeur;
            $professeur->addModule($this);
        }

        return $this;
    }

    public function removeProfesseur(Professeur $professeur): self {
        if ($this->professeurs->removeElement($professeur)) {
            $professeur->removeModule($this);
        }

        return $this;
    }
}
