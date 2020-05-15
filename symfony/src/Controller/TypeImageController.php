<?php

namespace App\Controller;

use App\Entity\TypeImage;
use App\Form\TypeImageType;
use App\Repository\TypeImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/image")
 */
class TypeImageController extends AbstractController
{
    /**
     * @Route("/", name="type_image_index", methods={"GET"})
     */
    public function index(TypeImageRepository $typeImageRepository): Response
    {
        return $this->render('type_image/index.html.twig', [
            'type_images' => $typeImageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_image_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeImage = new TypeImage();
        $form = $this->createForm(TypeImageType::class, $typeImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeImage);
            $entityManager->flush();

            return $this->redirectToRoute('type_image_index');
        }

        return $this->render('type_image/new.html.twig', [
            'type_image' => $typeImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_image_show", methods={"GET"})
     */
    public function show(TypeImage $typeImage): Response
    {
        return $this->render('type_image/show.html.twig', [
            'type_image' => $typeImage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_image_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeImage $typeImage): Response
    {
        $form = $this->createForm(TypeImageType::class, $typeImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_image_index');
        }

        return $this->render('type_image/edit.html.twig', [
            'type_image' => $typeImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_image_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeImage $typeImage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeImage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeImage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_image_index');
    }
}
