<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Internaute;
use Symfony\Config\ZenstruckFoundry\FakerConfig;
use Symfony\Config\ZenstruckFoundry;
use Zenstruck\Foundry\Factory;

require_once 'vendor/autoload.php';


class InternauteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /*$faker = FakerConfig::create('FR_fr');
        for($i = 1; $i <= 25; $i++){
            $internaute = new Internaute();
            $internaute->setNom($faker->lastName())
                        ->setPrenom($faker->firstName)
                        ->setNewsletter(random_int(0,1));
            $manager->persist($internaute);*/



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

