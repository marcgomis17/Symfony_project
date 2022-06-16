<?php

namespace App\DataFixtures;

use App\Entity\Module;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ModuleFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $modules = ['HTML/CSS', 'JavaScript', 'Java', 'Mathématiques', 'PHP', 'Python', 'SQL'];
        for ($j = 0; $j < 7; $j++) {
            $module = new Module();
            $module->setNomModule($modules[$j]);
            $manager->persist($module);
        }
        $manager->flush();
    }
}
