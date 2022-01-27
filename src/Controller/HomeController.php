<?php

namespace App\Controller;


use App\Entity\Tricks;
use App\Entity\Message;
use App\Repository\TricksRepository;
use App\Form\MessageFormType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
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
        ])
        ;
    }

    //show more tricks
    #[Route('/trick/{id}', name: 'show_trick')]

    public function show(Tricks $trick, Request $request, ObjectManager $manager): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageFormType::class, $message);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($message);
            $manager->flush();

            return $this->redirectToRoute('show_trick', ['id' => $trick->getId()])
            ;

        }

        return $this->render('trick.html.twig', [
            'trick' => $trick,
            'messageForm' => $form->createView()
        ]);
    }
}
