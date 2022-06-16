<?php

namespace App\Entity;

use App\Entity\User;
use App\Repository\RPRepository;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

#[Entity(repositoryClass: RPRepository::class)]
#[InheritanceType("JOINED")]
#[DiscriminatorColumn(name: "discr", type: "string")]
class RP extends User {
    public function __construct() {
        $this->setRoles(['ROLE_RP']);
    }
}
