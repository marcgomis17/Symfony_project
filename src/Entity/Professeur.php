<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\ProfesseurRepository;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity(repositoryClass: ProfesseurRepository::class)]
#[InheritanceType("JOINED")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["personne" => Personne::class, "professeur" => Professeur::class])]
class Professeur extends Personne {
    #[ORM\Column(type: 'string', length: 100)]
    private $grade;

    #[ORM\ManyToMany(targetEntity: Module::class, mappedBy: 'professeurs')]
    private $modules;

    #[ORM\ManyToMany(targetEntity: Classe::class, mappedBy: 'professeurs')]
    private $classes;

    public function __construct() {
        $this->classes = new ArrayCollection();
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
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
            $module->addProfesseur($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self {
        if ($this->modules->removeElement($module)) {
            $module->removeProfesseur($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
            $class->addProfesseur($this);
        }

        return $this;
    }

    public function removeClass(Classe $class): self
    {
        if ($this->classes->removeElement($class)) {
            $class->removeProfesseur($this);
        }

        return $this;
    }
}
