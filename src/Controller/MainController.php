<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\JumpingTiltRepository;


class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(JumpingTiltRepository $repo)
    {
        $jumpingTilts = $repo->findAll() ; 

        dump($jumpingTilts) ; 

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'jumpingTilts' => $jumpingTilts, 
        ]);
    }
}
