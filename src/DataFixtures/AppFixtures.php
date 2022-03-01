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
          ->SetImage('dog.jpeg');
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setName('Cochon')
          ->setDescription("Un animal domestique")
          ->SetImage('pig.jpeg');
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setName('Serpent')
          ->setDescription("Un animal domestique")
          ->SetImage('snake.jpeg');
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setName('Lion')
          ->setDescription("Un animal domestique")
          ->SetImage('lion.jpeg');
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setName('crocodile')
          ->setDescription("Un animal domestique")
          ->SetImage('crocodile.jpeg');
        $manager->persist($a5);

        $manager->flush();
    }
}
