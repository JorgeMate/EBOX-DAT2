<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\SemiRepository;
use App\Entity\Semi;


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
    public function recupera(Request $request, AdminController $adminController)
    {

        $id = $request->request->get('id');

        if($id){

            $semi = $this->getDoctrine()
            ->getRepository(Semi::class)
            ->findOneBy(['id' => $id]);

            if($semi){

                return $this->render('semi/recupera_palets.html.twig', [
                    'semi' => $semi,
                ]);
        
            } else {


                return $this->render('semi/new.html.twig', [
                    'semi' => $semi,

                ]);

            }
                        
        }   

        return $this->render('semi/recupera.html.twig', [        
        ]);


    }


}