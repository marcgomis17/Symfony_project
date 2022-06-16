<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClasseFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $classes = ['Rose Dieng Kuntz', 'Cheikh Anta Diop', 'Hampathé Bâ'];
        $niveaux = ["L1", "L2", "L3", "M1", "M2", "Doctorat"];
        $filieres = ["Dev Web/Mobile", "MAI", "Robotique", "IA", "Infographie", "Dev Data", "Ref Dig"];
        for ($i = 0; $i < 3; $i++) {
            $classe = new Classe();
            $niveau = rand(0, 5);
            $filiere = rand(0, 5);
            $classe->setNomClasse($classes[$i]);
            $classe->setNiveau($niveaux[$niveau]);
            $classe->setFiliere($filieres[$filiere]);
            $manager->persist($classe);
        }
        $manager->flush();
    }
}
