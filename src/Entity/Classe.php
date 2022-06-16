<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    private $nomClasse;

    #[ORM\Column(type: 'string', length: 20)]
    private $niveau;

    #[ORM\Column(type: 'string', length: 100)]
    private $filiere;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Inscription::class)]
    private $inscriptions;

    #[ORM\ManyToMany(targetEntity: Professeur::class, mappedBy: 'classes')]
    private $professeurs;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Etudiant::class)]
    private $Etudiants;

    public function __construct() {
        $this->inscriptions = new ArrayCollection();
        $this->professeurs = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
        $this->Etudiants = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNomClasse(): ?string {
        return $this->nomClasse;
    }

    public function setNomClasse(string $nomClasse): self {
        $this->nomClasse = $nomClasse;

        return $this;
    }

    public function getNiveau(): ?string {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self {
        $this->niveau = $niveau;

        return $this;
    }

    public function getFiliere(): ?string {
        return $this->filiere;
    }

    public function setFiliere(string $filiere): self {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setClasse($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getClasse() === $this) {
                $inscription->setClasse(null);
            }
        }

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
            $professeur->addClass($this);
        }

        return $this;
    }

    public function removeProfesseur(Professeur $professeur): self {
        if ($this->professeurs->removeElement($professeur)) {
            $professeur->removeClass($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->Etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): self
    {
        if (!$this->Etudiants->contains($etudiant)) {
            $this->Etudiants[] = $etudiant;
            $etudiant->setClasse($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->Etudiants->removeElement($etudiant)) {
            // set the owning side to null (unless already changed)
            if ($etudiant->getClasse() === $this) {
                $etudiant->setClasse(null);
            }
        }

        return $this;
    }
}
