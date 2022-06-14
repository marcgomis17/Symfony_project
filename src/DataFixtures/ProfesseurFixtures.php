<?php

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Professeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfesseurFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $modules = ['HTML/CSS', 'JavaScript', 'Java', 'Mathématiques', 'PHP', 'Python', 'SQL'];
        for ($i = 1; $i <= 10; $i++) {
            $prof = new Professeur();
            $prof->setNomComplet('Professeur '. $i);
            $prof->setGrade('Grade ' . $i);
            $prof->setSexe("M");
            for ($j = 0; $j < 3; $j++) {
                $module = new Module();
                $module->setNomModule($modules[rand(0, 6)]);
                // dd($module->getNomModule());
                $prof->addModule($module);
                //$manager->persist($module);
            }
            $manager->persist($prof);
        }
        $manager->flush();
    }
}
