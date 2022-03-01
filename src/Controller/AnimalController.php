<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
  #[Route('/', name: 'home')]
  public function index(): Response
  {
    return $this->render('animal/index.html.twig', []);
  }

  #[Route('/animal', name: 'animals')]
  public function animal( AnimalRepository $repository ): Response
  {
    
    $animaux = $repository->findAll();
    return $this->render('animal/animals.html.twig', [
      "animaux" => $animaux
    ]);
  }
  #[Route('/animal/{id}', name: 'show_animal')]
  public function showAnimal( AnimalRepository $repository, $id ): Response
  {
    
    $animal = $repository->find($id);
    return $this->render('animal/animal.html.twig', [
      "animal" => $animal
    ]);
  }
}
