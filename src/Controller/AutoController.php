<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Entity\Semi;
use App\Entity\Trabajo;

use App\Entity\Formato;

use App\Form\SemiType;
use App\Form\TrabajoType;


/**
 *
 * @Route("/auto")
 * @Security("is_granted('ROLE_AUTO')")
 *
 */

class AutoController extends AbstractController
{
    
    /**
     * @Route("/", name="auto")
     */
    public function admin()
    {
        $user = $this->getUser();

        return $this->render('admin/auto.html.twig', [
            'user' => $user,
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
     * @Route("/articulo/nuevo", methods={"GET", "POST"}, name="new_trabajo")
     */
    public function newTrabajo(Request $request): Response
    {

        $trabajo = new Trabajo();

        $form = $this->createForm(TrabajoType::class, $trabajo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Comprobamos que no hay un id anterior que se corresponda a id_anterior

            $trabajoAnterior = $trabajo->getIdAnterior();

            $trabajoId = $this->getDoctrine()
            ->getRepository(Trabajo::class)
            ->findOneBy(['id' => $trabajoAnterior]);

            if ($trabajoId){

                $this->addFlash('danger', 'El Artículo ya EXISTE');
                return $this->redirectToRoute('recupera_trabajo');

            } else {

                $this->getDoctrine()->getManager()->persist($trabajo);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Artículo insertado correctamente');

                return $this->redirectToRoute('trabajos');
            }
        }

        return $this->render('trabajo/new.html.twig', [
           'trabajo' => $trabajo,
           'form' => $form->createView(),
        ]);

        
    }

    /**
     * @Route("/formato/{id}", methods={"GET", "POST"}, name="formato")
     */
    public function showFormato(Formato $formato): Response
    {

        $carpetas = $formato->getCarpetas();

        return $this->render('formato/show.html.twig', [
            'formato' => $formato,
            'carpetas' => $carpetas,
         // 'form' => $form->createView(),
        ]);

    }
    


}
