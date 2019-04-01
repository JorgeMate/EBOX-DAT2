<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\SemiRepository;
use App\Entity\Semi;

use App\Form\SemiType;


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
     * @Route("/semielaborado/nuevo", methods={"GET", "POST"}, name="new_semi")
     */
    public function newSemi(Request $request): Response
    {
        $semi = new Semi();

        $form = $this->createForm(SemiType::class, $semi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Comprobamos que no hay un id anterior que se corresponda a id_anterior

            $semiAnterior = $semi->getIdAnterior();

            $semiId = $this->getDoctrine()
            ->getRepository(Semi::class)
            ->findOneBy(['id' => $semiAnterior]);

            if ($semiId){

                $this->addFlash('danger', 'El Semielaborado ya EXISTE');

                return $this->redirectToRoute('recupera_semi');

            } else {

                $this->getDoctrine()->getManager()->persist($semi);
                $this->getDoctrine()->getManager()->flush();

                $this->addFlash('success', 'Semielaborado insertado correctamente');

                return $this->redirectToRoute('semis');

            }

        }

        return $this->render('semi/new.html.twig', [
            'semi' => $semi,
            'form' => $form->createView(),
        ]);

    }


   
    /**
     * @Route("/recupera_semi", name="recupera_semi")
     */
    public function recupera(Request $request)
    {

        $id = $request->request->get('id');
        
        $i_uds_palet = $request->request->get('i_uds_palet');
        


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

                return $this->render('recupera/recupera_palets.html.twig', [
                    'semi' => $semi,
                ]);
        
            } else {

                return $this->redirectToRoute('semis');
        
            }
     
        }   

        return $this->render('recupera/recupera.html.twig', [        
        ]);


    }


}