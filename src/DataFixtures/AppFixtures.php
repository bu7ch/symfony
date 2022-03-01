<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Famille;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Famille();
        $c1->setLibelle('Animaux vertébrés')
          ->setDescription('Mammifère');
          $manager->persist($c1);

        $c2 = new Famille();
        $c2->setLibelle('Reptiles')
          ->setDescription('Rampant');
          $manager->persist($c2);

        $c3 = new Famille();
        $c3->setLibelle('Poissons')
          ->setDescription('Ovipare');
          $manager->persist($c3);


        $a1 = new Animal();
        $a1->setName('Chien')
          ->setDescription("Un animal domestique")
          ->SetImage('dog.jpeg')
          ->setPoids(20)
          ->setFamille($c1)
          ->setDangerosite(false);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setName('Cochon')
          ->setDescription("Un animal domestique")
          ->SetImage('pig.jpeg')
          ->setPoids(43)
          ->setFamille($c1)
          ->setDangerosite(false);
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setName('Serpent')
          ->setDescription("Un animal domestique")
          ->SetImage('snake.jpeg')
          ->setPoids(13)
          ->setFamille($c2)
          ->setDangerosite(true);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setName('Lion')
          ->setDescription("Un animal domestique")
          ->SetImage('lion.jpeg')
          ->setPoids(86)
          ->setFamille($c1)
          ->setDangerosite(true);
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setName('crocodile')
          ->setDescription("Un animal domestique")
          ->SetImage('crocodile.jpeg')
          ->setPoids(234)
          ->setFamille($c2)
          ->setDangerosite(true);
        $manager->persist($a5);

        $manager->flush();
    }
}
