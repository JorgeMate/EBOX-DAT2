<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\SemiRepository;
use App\Entity\Semi;

use App\Entity\CodigoS;

//use App\Form\SemiType;


/**
 * Controller used to manage current user.
 *
 * @Route("/user")
 * @Security("is_granted('ROLE_USER')")
 *
 */
class SemiController extends AbstractController
{

    /**
     * @Route("/semi/{id}", name="semi_show")
     */
    public function semi_show(Semi $semi)
    {
        return $this->render('semi/show.html.twig', [
            'semi' => $semi,
        ]);
    }

    /**
     * @Route("/semielaborados", name="semis")
     */
    public function semis(SemiRepository $semis)
    {
        $semis = $semis->findAllByOrder('id', 'DESC');

     //   var_dump($semis);die;

        return $this->render('semi/index.html.twig', [
            'semis' => $semis,
        ]);
    }



   
    /**
     * @Route("/recupera_semi", name="recupera_semi")
     */
    public function recupera(Request $request)
    {

        $id = $request->request->get('id');
        
        if($id){

            $semi = $this->getDoctrine()
            ->getRepository(Semi::class)
            ->findOneBy(['id' => $id]);

            if(!$semi){
                $semi = $this->getDoctrine()
                ->getRepository(Semi::class)
                ->findOneBy(['id_anterior' => $id]);
            }

            if($semi){

                $iunidades = $request->request->get('iunidades');
                $idpalet = $request->request->get('idpalet');

                if($idpalet){

                    // Es una palet inexistente ?

                    $encontrado = $this->getDoctrine()
                        ->getRepository(CodigoS::class)
                        ->findOneBy(['s_codigo' => $idpalet]);

                    if($encontrado){

                        $this->addFlash('danger', 'El PALET ya está REGISTRADO');

                    } else {

                        // Insertamos un Palet
                        $CodigoS = new CodigoS();

                        $CodigoS->setSemi($semi);
                        $CodigoS->setSCodigo($idpalet);
                        $CodigoS->setIUnidades($iunidades);

                        $this->getDoctrine()->getManager()->persist($CodigoS);
                        $this->getDoctrine()->getManager()->flush();
                    }
                }

                $palets = $this->getDoctrine()
                ->getRepository(CodigoS::class)
                ->findBy(['semi' => $id]);

                return $this->render('recupera/semi/recupera_palets.html.twig', [
                    'idpalet' => $idpalet,
                    'i_uds_palet' =>$iunidades,
                    'semi' => $semi,
                    'palets' => $palets,
                ]);
        
            } else {

                return $this->redirectToRoute('semis');
        
            }
     
        }   

        return $this->render('recupera/semi/recupera.html.twig', []);


    }


}