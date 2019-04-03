<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/recupera_articulo", name="recupera_trabajo")
     */
    public function recupera(Request $request)
    {

        $id = $request->request->get('id');
        
        if($id){

            $trabajo = $this->getDoctrine()
            ->getRepository(Trabajo::class)
            ->findOneBy(['id' => $id]);


            if(!$trabajo){
                $trabajo = $this->getDoctrine()
                ->getRepository(Trabajo::class)
                ->findOneBy(['id_anterior' => $id]);
            }

            if($trabajo){

                $iunidades = $request->request->get('iunidades');
                $idpalet = $request->request->get('idpalet');

            } else {

                return $this->redirectToRoute('trabajos');
            } 

        }
            
        return $this->render('recupera/trabajo/recupera.html.twig', []);

    }

}