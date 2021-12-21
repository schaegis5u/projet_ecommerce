<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Form\CategoriesType;
use App\Repository\CategoriesRepository;
use App\Repository\ObjetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Security as CoreSecurity;


#[Route('/categories')]
class CategoriesController extends AbstractController
{
    #[Route('/', name: 'categories_index', methods: ['GET'])]
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('categories/index.html.twig', [
            'categories' => $categoriesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'categories_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CoreSecurity $security): Response
    {
        if ($security->isGranted('ROLE_ADMIN')) {
            $category = new Categories();
            $form = $this->createForm(CategoriesType::class, $category);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->persist($category);
                $entityManager->flush();

                return $this->redirectToRoute('categories_index', [], Response::HTTP_SEE_OTHER);
            }
        }
        else{
            return $this->redirectToRoute('categories_index');
        }

        return $this->renderForm('categories/new.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'categories_show', methods: ['GET'])]
    public function show(Categories $category, CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('categories/show.html.twig', [
            'category' => $category,
            'categoryList' => $categoriesRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'categories_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categories $category, EntityManagerInterface $entityManager, CoreSecurity $security): Response
    {
        if ($security->isGranted('ROLE_ADMIN')) {
            $form = $this->createForm(CategoriesType::class, $category);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('categories_index', [], Response::HTTP_SEE_OTHER);
            }
        }
        else{
            return $this->redirectToRoute('categories_index');
        }

        return $this->renderForm('categories/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);  
    }

    #[Route('/{id}', name: 'categories_delete', methods: ['POST'])]
    public function delete(Request $request, Categories $category, EntityManagerInterface $entityManager, CoreSecurity $security): Response
    {

        if ($this->security->isGranted('ROLE_ADMIN')) {
            if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
                $entityManager->remove($category);
                $entityManager->flush();
            }
        }


        return $this->redirectToRoute('categories_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/list', name: 'categories_list', methods: ['GET', 'POST'])]
    public function list(CategoriesRepository $categoriesRepository, ObjetRepository $objetRepository): Response
    {
        return $this->render('objet/index.html.twig', [
            'objets' => $objetRepository->findAllObjects(),
            'categoryList' => $categoriesRepository->findAll(),

        ]);
    }
}

