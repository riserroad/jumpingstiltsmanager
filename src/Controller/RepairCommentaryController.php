<?php

namespace App\Controller;

use App\Entity\RepairCommentary;
use App\Form\RepairCommentaryType;
use App\Repository\RepairCommentaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/repair/commentary")
 */
class RepairCommentaryController extends AbstractController
{
    /**
     * @Route("/", name="repair_commentary_index", methods={"GET"})
     */
    public function index(RepairCommentaryRepository $repairCommentaryRepository): Response
    {
        return $this->render('repair_commentary/index.html.twig', [
            'repair_commentaries' => $repairCommentaryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="repair_commentary_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $repairCommentary = new RepairCommentary();
        $form = $this->createForm(RepairCommentaryType::class, $repairCommentary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($repairCommentary);
            $entityManager->flush();

            return $this->redirectToRoute('repair_commentary_index');
        }

        return $this->render('repair_commentary/new.html.twig', [
            'repair_commentary' => $repairCommentary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="repair_commentary_show", methods={"GET"})
     */
    public function show(RepairCommentary $repairCommentary): Response
    {
        return $this->render('repair_commentary/show.html.twig', [
            'repair_commentary' => $repairCommentary,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="repair_commentary_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RepairCommentary $repairCommentary): Response
    {
        $form = $this->createForm(RepairCommentaryType::class, $repairCommentary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('repair_commentary_index', [
                'id' => $repairCommentary->getId(),
            ]);
        }

        return $this->render('repair_commentary/edit.html.twig', [
            'repair_commentary' => $repairCommentary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="repair_commentary_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RepairCommentary $repairCommentary): Response
    {
        if ($this->isCsrfTokenValid('delete'.$repairCommentary->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($repairCommentary);
            $entityManager->flush();
        }

        return $this->redirectToRoute('repair_commentary_index');
    }
}
