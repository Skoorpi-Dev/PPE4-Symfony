<?php


namespace App\Controller;


use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class BoutiqueController extends AbstractController
{
    /**
     * @Route("/boutique/produit/", name="boutique_produit")
     * @return Response
     */
    public function produit (): Response
    {
        $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();
        return $this->render('boutique/index.html.twig', [
            'produit' => $produit,
        ]);
    }
//
//    /**
//     * @Route("/boutique/produit/{id}", name="boutique_produit_id")
//     * @return Response
//     */
//    public function produitId (Produit $produit): Response
//    {
//        return $this->render('boutique/index.html.twig', [
//            'produit' => $produit,
//        ]);
//    }



}