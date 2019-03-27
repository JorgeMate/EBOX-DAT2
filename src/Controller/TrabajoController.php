<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrabajoController extends AbstractController
{
    /**
     * @Route("/trabajo", name="trabajo")
     */
    public function index()
    {
        return $this->render('trabajo/index.html.twig', [
            'controller_name' => 'TrabajoController',
        ]);
    }
}
