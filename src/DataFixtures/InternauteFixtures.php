<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Internaute;

class InternauteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 25; $i++){
            $internaute = new Internaute();
            $internaute->setNom("Internaute n°$i")
                ->setPrenom("Prénom de l'internaute n°$i")
                ->setNewsletter(random_int(0,1));
            $manager->persist($internaute);
        }

        $manager->flush();
    }
}
