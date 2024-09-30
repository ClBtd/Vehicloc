<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VoituresController extends AbstractController
{
    #[Route('/voitures', name: 'app_voitures')]
    public function index(): Response
    {
        return $this->render('voitures/index.html.twig', [
            'controller_name' => 'VoituresController',
        ]);
    }
}
