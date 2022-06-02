<?php

namespace App\Entity;

use App\Repository\ACRepository;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

#[Entity(repositoryClass: ACRepository::class)]
#[InheritanceType("JOINED")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["user" => User::class, "AC" => AC::class])]
class AC extends User {
    public function __construct() {
        $this->setRoles(['ROLE_AC']);
    }
}
