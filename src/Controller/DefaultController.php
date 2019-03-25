<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

 
    /**
     * @Route("/", methods={"GET"}, name="logout")
     */
    public function home(): Response
    {
        return $this->render('default/homepage.html.twig', [
            
        ]);
        
    }

}