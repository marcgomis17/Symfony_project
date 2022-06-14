<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\EtudiantRepository;

#[Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant extends User {
    #[ORM\Column(type: 'string', length: 100)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 20)]
    private $matricule;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: Inscription::class)]
    private $inscriptions;

    public function __construct() {
        $this->setRoles(['ROLE_ETUDIANT']);
        $this->inscriptions = new ArrayCollection();
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

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setEtudiant($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getEtudiant() === $this) {
                $inscription->setEtudiant(null);
            }
        }

        return $this;
    }
}
