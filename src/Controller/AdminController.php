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
    public function cpanel()
    {
        $user = $this->getUser();

        return $this->render('admin/cpanel.html.twig', [
            'user' => $user,
        ]);
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

