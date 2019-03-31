<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\FormatoRepository;
//use App\Entity\Formato;


/**
 * Controller used to manage current user.
 *
 * @Route("/user")
 * @Security("is_granted('ROLE_USER')")
 *
 */
class FormatoController extends AbstractController
{
    /**
     * @Route("/formatos", name="formatos")
     */
    public function formatos(FormatoRepository $formatos)
    {
        $formatos = $formatos->findAll();

        return $this->render('formato/index.html.twig', [
            'formatos' => $formatos,
        ]);
    }
}
   