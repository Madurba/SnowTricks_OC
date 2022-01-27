<?php

namespace App\Controller;


use App\Entity\Tricks;
use App\Repository\TricksRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    //home page
    #[Route('/', name: 'home')]
    public function index(TricksRepository $repo): Response
    {
        $tricks = $repo->findBy([], ['id' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'tricks' => $tricks,
        ]);
    }

    //show more tricks
    #[Route('/trick/{id}', name: 'show_trick')]
    public function show(Tricks $trick): Response
    {
        return $this->render('trick.html.twig', [
            'trick' => $trick
        ]);
    }
}
