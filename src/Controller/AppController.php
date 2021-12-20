<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(ObjetRepository $objetRepository, CategoriesRepository $categoriesRepository): Response
    {
        /**return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);**/
        return $this->render('objet/index.html.twig', [
            'objets' => $objetRepository->findAll(),
            'categoryList' => $categoriesRepository->findAll(),

        ]);
    }
}
