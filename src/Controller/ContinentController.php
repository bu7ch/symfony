<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContinentController extends AbstractController
{
    #[Route('/continent', name: 'continents')]
    public function index(ContinentRepository $repository): Response
    {
      $continents = $repository->findAll();
        return $this->render('continent/index.html.twig', [
            'continents' => $continents,
        ]);
    }
    #[Route('/continent/{id}', name: 'show_continent')]
    public function showContinent(Continent $continent): Response
    {
        return $this->render('continent/show_continent.html.twig', [
            'continent' => $continent,
        ]);
    }
}
