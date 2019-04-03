<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\TrabajoRepository;
use App\Entity\Trabajo;

use App\Entity\CodigoP;

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
     * @Route("/recupera_articulo", methods={"GET","POST"}, name="recupera_trabajo")
     */
    public function recupera(Request $request)
    {

        $id = $request->request->get('id');
        $ilote = 0;
        
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
                $ilote = $request->request->get('ilote');

                if($idpalet){

                    // Es una palet inexistente ?

                    $encontrado = $this->getDoctrine()
                                    ->getRepository(CodigoP::class)
                                    ->findOneBy(['s_codigo' => $idpalet]);

                    if($encontrado){

                        $this->addFlash('danger', 'El PALET ya está REGISTRADO');

                    } else {

                        // Insertamos un Palet
                        $CodigoP = new CodigoP();

                        $CodigoP->setTrabajo($trabajo);
                        $CodigoP->setSCodigo($idpalet);
                        $CodigoP->setIlote($ilote);
                        $CodigoP->setIUnidades($iunidades);

                        $Trabajo = $CodigoP->getTrabajo();

                        
                        $CodigoP->setSDir1($Trabajo->getSDir1());
                        $CodigoP->setSDir2($Trabajo->getSDir2());
                        $CodigoP->setSDir3($Trabajo->getSDir3());
                        $CodigoP->setSDir4($Trabajo->getSDir4());
                        $CodigoP->setSDir5($Trabajo->getSDir5());
                        $CodigoP->setSDir6($Trabajo->getSDir6());


                        $this->getDoctrine()->getManager()->persist($CodigoP);
                        $this->getDoctrine()->getManager()->flush();

                    }
                }

                $palets = $this->getDoctrine()
                ->getRepository(CodigoP::class)
                ->findBy(['trabajo' => $id]);

                return $this->render('recupera/trabajo/recupera_palets.html.twig', [
                    'idpalet' => $idpalet,
                    'i_lote' => $ilote,
                    'i_uds_palet' =>$iunidades,
                    'trabajo' => $trabajo,
                    'palets' => $palets,
                ]);


            } else {

                return $this->redirectToRoute('trabajos');
            } 

        }
            
        return $this->render('recupera/trabajo/recupera.html.twig', []);

    }

    /**
     * @Route("/{id}/palets_articulo", methods={"GET"}, name="palets_articulo")
     */
    public function listaPT(Trabajo $trabajo){

        $palets = $trabajo->getCodigoP();

        //var_dump($palets);die;

        return $this->render('recupera/trabajo/palets.html.twig', [
            'palets' => $palets,
        ]);



    }



}