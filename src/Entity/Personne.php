<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
#[InheritanceType("JOINED")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(
    [
        "personne" => "Personne",
        "user" => "User",
        "professeur" => "Professeur",
        "etudiant" => "Etudiant",
        "rp" => "RP",
        "ac" => "AC"
    ],
)]
class Personne {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nomComplet;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $sexe;

    public function getId(): ?int {
        return $this->id;
    }

    public function getNomComplet(): ?string {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    public function getSexe(): ?string {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self {
        $this->sexe = $sexe;

        return $this;
    }
}
