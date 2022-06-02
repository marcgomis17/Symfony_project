<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

#[Entity(repositoryClass: EtudiantRepository::class)]
#[InheritanceType("JOINED")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["user" => User::class, "etudiant" => Etudiant::class])]
class Etudiant extends User {
    #[ORM\Column(type: 'string', length: 100)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 20)]
    private $matricule;

    public function __construct() {
        $this->setRoles(['ROLE_ETUDIANT']);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getAdresse(): ?string {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMatricule(): ?string {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self {
        $this->matricule = $matricule;

        return $this;
    }
}
