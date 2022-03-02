<?php

namespace App\Controller;

use App\Repository\PersonneRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonneController extends AbstractController
{
    #[Route('/personnes', name: 'personnes')]
    public function index(PersonneRepository $repository): Response
    {
        $personnes = $repository->findAll();
        return $this->render('personne/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }
}
