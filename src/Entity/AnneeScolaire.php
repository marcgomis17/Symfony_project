<?php

namespace App\Entity;

use App\Repository\AnneeScolaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneeScolaireRepository::class)]
class AnneeScolaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $libelleAnnee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleAnnee(): ?string
    {
        return $this->libelleAnnee;
    }

    public function setLibelleAnnee(string $libelleAnnee): self
    {
        $this->libelleAnnee = $libelleAnnee;

        return $this;
    }
}
