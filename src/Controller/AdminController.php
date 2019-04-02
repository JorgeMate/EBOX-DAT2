<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\ClienteRepository;

use App\Entity\Semi;

use App\Form\SemiType;


/**
 * Controller used to manage current center.
 *
 * @Route("/admin")
 * @Security("is_granted('ROLE_ADMIN')")
 *
 */
class AdminController extends AbstractController
{


    /**
     * @Route("/", name="admin")
     */
    public function admin()
    {
        $user = $this->getUser();

        return $this->render('admin/admin.html.twig', [
            'user' => $user,
        ]);
    }


    /**
     * @Route("/cpanel", name="admin_cpanel")
     */
    public function cpanel()
    {
        $user = $this->getUser();

        return $this->render('admin/cpanel.html.twig', [
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
    public function newTrabajo(): Response
    {
        
    }


    /**
     * @Route("/clientes", name="clientes")
     */
    public function clientes(ClienteRepository $clientes)
    {
        $clientes = $clientes->findAll();

        return $this->render('cliente/index.html.twig', [
            'clientes' => $clientes,
        ]);
    }

}

