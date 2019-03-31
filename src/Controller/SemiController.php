<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

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
     * @Route("/recupera_semi", name="recupera_semi")
     */
    public function recupera(Request $request)
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

                // Dar de alta

            }
                        
        }   

        return $this->render('semi/recupera.html.twig', [        
        ]);


    }


}