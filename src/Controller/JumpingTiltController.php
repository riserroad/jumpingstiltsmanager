<?php

namespace App\Controller;

use App\Entity\JumpingTilt;
use App\Form\JumpingTiltType;
use App\Repository\JumpingTiltRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/jumping/tilt")
 */
class JumpingTiltController extends AbstractController
{
    /**
     * @Route("/", name="jumping_tilt_index", methods={"GET"})
     */
    public function index(JumpingTiltRepository $jumpingTiltRepository): Response
    {
        return $this->render('jumping_tilt/index.html.twig', [
            'jumping_tilts' => $jumpingTiltRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="jumping_tilt_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $jumpingTilt = new JumpingTilt();
        $form = $this->createForm(JumpingTiltType::class, $jumpingTilt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jumpingTilt);
            $entityManager->flush();

            return $this->redirectToRoute('jumping_tilt_index');
        }

        return $this->render('jumping_tilt/new.html.twig', [
            'jumping_tilt' => $jumpingTilt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jumping_tilt_show", methods={"GET"})
     */
    public function show(JumpingTilt $jumpingTilt): Response
    {
        return $this->render('jumping_tilt/show.html.twig', [
            'jumping_tilt' => $jumpingTilt,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="jumping_tilt_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, JumpingTilt $jumpingTilt): Response
    {
        $form = $this->createForm(JumpingTiltType::class, $jumpingTilt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jumping_tilt_index', [
                'id' => $jumpingTilt->getId(),
            ]);
        }

        return $this->render('jumping_tilt/edit.html.twig', [
            'jumping_tilt' => $jumpingTilt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jumping_tilt_delete", methods={"DELETE"})
     */
    public function delete(Request $request, JumpingTilt $jumpingTilt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jumpingTilt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($jumpingTilt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('jumping_tilt_index');
    }
}
