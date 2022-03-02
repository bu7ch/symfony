<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Dispose;
use App\Entity\Famille;
use App\Entity\Personne;
use App\Entity\Continent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {

    $p1 = new Personne();
    $p1->setName('John');
    $manager->persist($p1);

    $p2 = new Personne();
    $p2->setName('Billy');
    $manager->persist($p2);

    $p3 = new Personne();
    $p3->setName('Klauss');
    $manager->persist($p3);

    $europe = new Continent();
    $europe->setLibelle('Europe');
    $manager->persist($europe);

    $afrique = new Continent();
    $afrique->setLibelle('Afrique');
    $manager->persist($afrique);

    $amerique = new Continent();
    $amerique->setLibelle('Amérique');
    $manager->persist($amerique);

    $oceanie = new Continent();
    $oceanie->setLibelle('Océanie');
    $manager->persist($oceanie);


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
      ->addContinent($europe)
      ->addContinent($afrique)
      ->addContinent($amerique)
      ->addContinent($oceanie)
      ->setDangerosite(false);
    $manager->persist($a1);

    $a2 = new Animal();
    $a2->setName('Cochon')
      ->setDescription("Un animal domestique")
      ->SetImage('pig.jpeg')
      ->setPoids(43)
      ->setFamille($c1)
      ->addContinent($afrique)
      ->addContinent($europe)
      ->addContinent($oceanie)
      ->setDangerosite(false);
    $manager->persist($a2);

    $a3 = new Animal();
    $a3->setName('Serpent')
      ->setDescription("Un animal domestique")
      ->SetImage('snake.jpeg')
      ->setPoids(13)
      ->setFamille($c2)
      ->addContinent($amerique)
      ->addContinent($oceanie)
      ->addContinent($europe)
      ->setDangerosite(true);
    $manager->persist($a3);

    $a4 = new Animal();
    $a4->setName('Lion')
      ->setDescription("Un animal domestique")
      ->SetImage('lion.jpeg')
      ->setPoids(86)
      ->addContinent($afrique)
      ->addContinent($oceanie)
      ->addContinent($amerique)
      ->setFamille($c1)
      ->setDangerosite(true);
    $manager->persist($a4);

    $a5 = new Animal();
    $a5->setName('crocodile')
      ->setDescription("Un animal domestique")
      ->SetImage('crocodile.jpeg')
      ->setPoids(234)
      ->setFamille($c2)
      ->addContinent($oceanie)
      ->addContinent($amerique)
      ->addContinent($afrique)
      ->setDangerosite(true);
    $manager->persist($a5);

    $d1 = new Dispose();
    $d1->setPersonne($p1)
      ->setAnimal($a1)
      ->setNb(2);
    $manager->persist($d1);

    $d2 = new Dispose();
    $d2->setPersonne($p1)
      ->setAnimal($a2)
      ->setNb(3);
    $manager->persist($d2);
    
    $d3 = new Dispose();
    $d3->setPersonne($p2)
      ->setAnimal($a3)
      ->setNb(4);
    $manager->persist($d3);


    $manager->flush();
  }
}
