<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\TrabajoRepository;
use App\Entity\Trabajo;


/**
 * Controller used to manage current user.
 *
 * @Route("/user")
 * @Security("is_granted('ROLE_USER')")
 *
 */
class TrabajoController extends AbstractController
{


    /**
     * @Route("/articulo/{id}", name="trabajo_show")
     */
    public function trabajo_show(Trabajo $trabajo)
    {
        return $this->render('trabajo/show.html.twig', [
            'trabajo' => $trabajo,
            
        ]);
        
    }


    /**
     * @Route("/articulos", name="trabajos")
     */
    public function trabajos(TrabajoRepository $trabajos)
    {
        $trabajos = $trabajos->findAllByOrder('id', 'DESC');

        return $this->render('trabajo/index.html.twig', [
            'trabajos' => $trabajos,
        ]);
        
    }


}