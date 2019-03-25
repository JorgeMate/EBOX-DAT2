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
class UserController extends AbstractController
{
 
    /**
     * @Route("/cpanel", methods={"GET"}, name="user_cpanel")
     */
    public function cpanel()
    {
        $user = $this->getUser();

        return $this->render('user/cpanel.html.twig', [
            'user' => $user,
        ]);
    }

}
