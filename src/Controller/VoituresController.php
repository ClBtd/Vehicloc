<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Repository\VoituresRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        return $this->render('voitures/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route('/{id}/remove', name: 'voitures_remove', requirements: ['id' => '\d+'])]
    public function remove(Voitures $voiture,EntityManagerInterface $em): Response
    {
        $em->remove($voiture);
        $em->flush();

        return $this->redirectToRoute('voitures');
    }    
}
