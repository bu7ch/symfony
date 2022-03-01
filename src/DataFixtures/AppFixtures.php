<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1 = new Animal();
        $a1->setName('Chien')
          ->setDescription("Un animal domestique")
          ->SetImage('dog.png');
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setName('Cochon')
          ->setDescription("Un animal domestique")
          ->SetImage('pig.png');
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setName('Serpent')
          ->setDescription("Un animal domestique")
          ->SetImage('snake.png');
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setName('Lion')
          ->setDescription("Un animal domestique")
          ->SetImage('lion.png');
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setName('crocodile')
          ->setDescription("Un animal domestique")
          ->SetImage('crocodile.png');
        $manager->persist($a5);

        $manager->flush();
    }
}
