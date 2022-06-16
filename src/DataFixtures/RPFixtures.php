<?php

namespace App\DataFixtures;

use App\Entity\RP;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RPFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $rp = new RP();
        $rp->setNomComplet('Admin RP');
        $rp->setEmail('admin-rp@gmail.com')
            ->setPassword('$2y$13$gYYbdgWfnW40AW6fDxU1YOWywe.JyuAaA/IhWGLWv00fpR4oHmFMW');
        $manager->persist($rp);
        $manager->flush();
    }
}
