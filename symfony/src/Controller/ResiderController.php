<?php

namespace App\Controller;

use App\Entity\Resider;
use App\Form\ResiderType;
use App\Repository\ResiderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/resider")
 */
class ResiderController extends AbstractController
{
    /**
     * @Route("/", name="resider_index", methods={"GET"})
     */
    public function index(ResiderRepository $residerRepository): Response
    {
        return $this->render('resider/index.html.twig', [
            'residers' => $residerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="resider_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resider = new Resider();
        $form = $this->createForm(ResiderType::class, $resider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resider);
            $entityManager->flush();

            return $this->redirectToRoute('resider_index');
        }

        return $this->render('resider/new.html.twig', [
            'resider' => $resider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resider_show", methods={"GET"})
     */
    public function show(Resider $resider): Response
    {
        return $this->render('resider/show.html.twig', [
            'resider' => $resider,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="resider_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Resider $resider): Response
    {
        $form = $this->createForm(ResiderType::class, $resider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resider_index');
        }

        return $this->render('resider/edit.html.twig', [
            'resider' => $resider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resider_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Resider $resider): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resider->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($resider);
            $entityManager->flush();
        }

        return $this->redirectToRoute('resider_index');
    }
}
