<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Form\VoituresType;
use App\Repository\VoituresRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/voitures')]
class VoituresController extends AbstractController
{
    #[Route('/', name: 'voitures')]
    public function index(VoituresRepository $repository): Response
    {
        $voitures = $repository->findAll();

        return $this->render('voitures/index.html.twig', [
            'voitures' => $voitures,
        ]);
    }

    #[Route('/{id}', name: 'voitures_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(?Voitures $voiture): Response
    {
        if ($voiture) {
            return $this->render('voitures/show.html.twig', [
                'voiture' => $voiture,
            ]);
        }

        else {
            return $this->redirectToRoute('voitures');
        }
        
    }

    #[Route('/{id}/remove', name: 'voitures_remove', requirements: ['id' => '\d+'])]
    public function remove(Voitures $voiture,EntityManagerInterface $em): Response
    {
        $em->remove($voiture);
        $em->flush();

        return $this->redirectToRoute('voitures');
    }
    
    #[Route('/new', name: 'voitures_new',  methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, ?Voitures $voiture): Response
    {
        $voiture ??= new Voitures();
        $form = $this->createForm(VoituresType::class, $voiture);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($voiture);
            $em->flush();
            return $this->redirectToRoute('voitures_show', ['id' => $voiture->getId()]);
        }

        return $this->render('voitures/new.html.twig', [
            'form' => $form,
        ]);
    }
}
