<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\User;
use App\Form\PanierType;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security as CoreSecurity;

#[Route('/panier')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'panier_show', methods: ['GET'])]
    public function show(PanierRepository $panierRepository, CoreSecurity $security): Response
    {
        $user = $security->getUser();
        return $this->render('panier/show.html.twig', [
            'panier' => $panierRepository->findOne(($user)),
        ]);
    }
}
