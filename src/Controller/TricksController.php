<?php

namespace App\Controller;

use App\Repository\TricksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TricksController extends AbstractController
{
    #[Route('/tricks', name: 'tricks')]
    public function index(TricksRepository $repo): Response
    {
        $tricks = $repo->findAll();

        return $this->render('tricks/index.html.twig', [
            'all_tricks' => $tricks,
        ]);
    }
}
