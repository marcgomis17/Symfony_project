<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfesseurRepository;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur extends Personne {
    #[ORM\Column(type: 'string', length: 255)]
    private $grade;

    #[ORM\ManyToMany(targetEntity: Module::class, inversedBy: 'professeurs', cascade: ['persist'])]
    private $modules;


    public function __construct() {
        $this->modules = new ArrayCollection();
    }

    public function getGrade(): ?string {
        return $this->grade;
    }

    public function setGrade(string $grade): self {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection {
        return $this->modules;
    }

    public function addModule(Module $module): self {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self {
        $this->modules->removeElement($module);

        return $this;
    }
}
