<?php

namespace App\Controller;

use App\Entity\Objet;
use App\Entity\Panier;
use App\Form\ObjetType;
use App\Repository\CategoriesRepository;
use App\Repository\ObjetRepository;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/objet')]
class ObjetController extends AbstractController
{
    #[Route('/', name: 'objet_index', methods: ['GET'])]
    public function index(ObjetRepository $objetRepository, CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('objet/index.html.twig', [
            'objets' => $objetRepository->findAll(),
            'categoryList' => $categoriesRepository->findAll(),

        ]);
    }

    #[Route('/new', name: 'objet_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $objet = new Objet();
        $form = $this->createForm(ObjetType::class, $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objet);
            $entityManager->flush();

            return $this->redirectToRoute('objet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objet/new.html.twig', [
            'objet' => $objet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'objet_show', methods: ['GET'])]
    public function show(Objet $objet): Response
    {
        return $this->render('objet/show.html.twig', [
            'objet' => $objet,
        ]);
    }

    #[Route('/{id}/edit', name: 'objet_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Objet $objet): Response
    {
        $form = $this->createForm(ObjetType::class, $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objet/edit.html.twig', [
            'objet' => $objet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'objet_delete', methods: ['POST'])]
    public function delete(Request $request, Objet $objet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objet_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{id}/panier", requirements={"id":"\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function add2Cart(Objet $entity, PanierRepository $panierRepository, EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $this->getUser();
        $panier = $panierRepository->findOne($user);

        if (null === $panier)
        {
            $panier = (new Panier)
                ->setUser($user)
                ->addObjet($entity)
            ;

            $entityManager->persist($panier);

        } else {
        $panier->addObjet($entity);
        }

        $entityManager->flush();

        return $this->redirectToRoute('objet_index');
    }

    /**
     * @Route("/{id}/removepanier", requirements={"id":"\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function removeCart(Objet $entity, PanierRepository $panierRepository, EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $this->getUser();
        $panier = $panierRepository->findOne($user);

        if (null === $panier)
        {

        } else {
        $panier->removeObjet($entity);
        }

        $entityManager->flush();

        return $this->redirectToRoute('panier_show');
    }
}

