<?php

namespace App\Controller;

use App\Entity\Trick;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TrickRepository;


class HomeController extends AbstractController
{
    //home page
    #[Route('/', name: 'home')]
    public function index(TrickRepository $repo): Response
    {
        $tricks = $repo->findBy([], ['create_at' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'tricks' => $tricks,
        ]);
    }

    //show trick article
    #[Route('/trick/{id}', name: 'show_trick')]
    public function show(Trick $trick, ): Response
    {
        return $this->render('home/trick.html.twig', [
            'trick' => $trick,
        ]);
    }
}
