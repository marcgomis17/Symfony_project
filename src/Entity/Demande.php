<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $objet;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\ManyToOne(targetEntity: Etudiant::class, inversedBy: 'demandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $etudiant;

    public function getId(): ?int {
        return $this->id;
    }

    public function getObjet(): ?string {
        return $this->objet;
    }

    public function setObjet(string $objet): self {
        $this->objet = $objet;

        return $this;
    }

    public function getLibelle(): ?string {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self {
        $this->libelle = $libelle;

        return $this;
    }

    public function getEtudiant(): ?Etudiant {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self {
        $this->etudiant = $etudiant;

        return $this;
    }
}
