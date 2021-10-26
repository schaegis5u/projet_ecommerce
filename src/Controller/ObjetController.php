<?php

namespace App\Controller;

use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetController extends AbstractController
{
    #[Route('/objet', name: 'objet')]
    public function index(ObjetRepository $oRepo): Response
    {
        //$entitees = $oRepo->findAll();
        return $this->render('objet/index.html.twig', [
            'controller_name' => 'ObjetController',
            //'objets' => $entitees,
        ]);
    }
}
