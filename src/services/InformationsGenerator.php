<?php

namespace App\Service;

class InformationsGenerator {
    private $setCap = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private $setLow = "abcdefghijklmnopqrstuvwxyz";
    private $setNum = "1234567890";

    public function generateMatricule() {
        $setNum = str_split($this->setNum);
        $matricule = "";
        $matricule .= "M";
        for ($k = 0; $k < 11; $k++) {
            $matricule .= $setNum[rand(0, count($setNum) - 1)];
        }

        return $matricule;
    }

    public function generateEmail(string $nomComplet) {
        $login = "";
        $setNum = str_split($this->setNum);
        $login = strtolower(str_replace(' ', '', $nomComplet));
        for ($k = 0; $k < rand(0, 4); $k++) {
            $login .= $setNum[rand(0, count($setNum) - 1)];
        }
        $login = $login .= "@school.edu.sn";

        return $login;
    }

    public function generatePassword() {
        $setLow = str_split($this->setLow);
        $setCap = str_split($this->setCap);
        $setNum = str_split($this->setNum);
        $password = "";
        for ($i = 0; $i < 1; $i++) {
            $password .= $this->setCap[rand(0, count($setCap) - 1)];
        }
        for ($k = 0; $k < 4; $k++) {
            $password .= $setLow[rand(0, count($setLow) - 1)];
        }
        $password .= "@";
        for ($k = 0; $k < 4; $k++) {
            $password .= $setNum[rand(0, count($setNum) - 1)];
        }

        return $password;
    }
}
