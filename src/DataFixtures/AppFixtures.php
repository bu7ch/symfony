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
          ->SetImage('dog.jpeg')
          ->setPoids(20)
          ->setDangerosite(false);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setName('Cochon')
          ->setDescription("Un animal domestique")
          ->SetImage('pig.jpeg')
          ->setPoids(43)
          ->setDangerosite(false);
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setName('Serpent')
          ->setDescription("Un animal domestique")
          ->SetImage('snake.jpeg')
          ->setPoids(13)
          ->setDangerosite(true);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setName('Lion')
          ->setDescription("Un animal domestique")
          ->SetImage('lion.jpeg')
          ->setPoids(86)
          ->setDangerosite(true);
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setName('crocodile')
          ->setDescription("Un animal domestique")
          ->SetImage('crocodile.jpeg')
          ->setPoids(234)
          ->setDangerosite(true);
        $manager->persist($a5);

        $manager->flush();
    }
}
