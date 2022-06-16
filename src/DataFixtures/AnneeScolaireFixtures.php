<?php

namespace App\DataFixtures;

use App\Entity\AnneeScolaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnneeScolaireFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $anneeScolaire = new AnneeScolaire();
        $anneeScolaire->setLibelleAnnee('2021-2022');
        $manager->persist($anneeScolaire);
        $manager->flush();
    }
}
