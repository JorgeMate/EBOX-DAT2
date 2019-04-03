<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Controller used to manage current user.
 *
 * @Route("/user")
 * @Security("is_granted('ROLE_USER')")
 *
 */
class CodigoSController extends AbstractController
{
    /**
     * @Route("/nuevo_palet_semi", methods={"GET","POST"}, name="nuevo_palet_semi")
     */
    public function nuevoPalet()
    {
        
    }
}
