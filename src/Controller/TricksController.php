<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TricksController extends AbstractController
{
    #[Route('/tricks', name: 'tricks')]
    public function index(TrickRepository $repo): Response
    {
        $tricks = $repo->findAll();

        return $this->render('tricks/index.html.twig', [
            'all_tricks' => $tricks,
        ]);
    }
}
