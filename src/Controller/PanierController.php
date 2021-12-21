<?php

namespace App\Controller;

use App\Entity\Paiement;
use App\Entity\Panier;
use App\Entity\User;
use App\Form\PaiementType;
use App\Form\PanierType;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManager;
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
    public function show(PanierRepository $panierRepository, CoreSecurity $security, EntityManagerInterface $entityManager): Response
    {
        $user = $security->getUser();
        if (null === $user)
        {
            return $this->redirectToRoute('objet_index');
        }

        return $this->render('panier/show.html.twig', [
            'panier' => $panierRepository->findOne(($user)),
        ]);
    }

    #[Route('/pay', name: 'panier_pay', methods: ['POST', 'GET'])]
    public function pay(Request $request, PanierRepository $panierRepository, CoreSecurity $security, EntityManagerInterface $entityManager): Response
    {
        $user = $security->getUser();
        if (null === $user)
        {
            return $this->redirectToRoute('objet_index');
        }

        $panier = $panierRepository->findOne(($user));

        $paiement = new Paiement();
        $paiement->setPanier($panier);
        $form = $this->createForm(PaiementType::class, $paiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($paiement);
            foreach ($panier->getObjets() as $objet)
            {
                $panier->removeObjet($objet);
                $entityManager->remove($objet);
            }
            $entityManager->remove($panier);
            $entityManager->flush();

            return $this->redirectToRoute('objet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panier/pay.html.twig', [
            'paiement' => $paiement,
            'form' => $form,
        ]);
    }
}
