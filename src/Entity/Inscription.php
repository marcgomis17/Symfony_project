<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateInscription;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private $classe;

    #[ORM\Column(type: 'string', length: 20)]
    private $etat;

    #[ORM\ManyToOne(targetEntity: Etudiant::class, inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private $etudiant;

    public function getId(): ?int {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTimeInterface {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getClasse(): ?Classe {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self {
        $this->classe = $classe;

        return $this;
    }

    public function getEtat(): ?string {
        return $this->etat;
    }

    public function setEtat(string $etat): self {
        $this->etat = $etat;

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
