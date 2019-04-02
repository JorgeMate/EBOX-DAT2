<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Form\UserType;




/**
 * Controller used to manage current user.0034 636 831 823
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

    /**
     * @Route("/profile/edit", methods={"GET", "POST"}, name="user_edit")
     */
    public function edit(Request $request): Response
    {
        $user = $this->getUser();

        // $center = $user->getCenter();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Registro de usuario actualizado correctamente');

            return $this->redirectToRoute('user_cpanel');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
           
            'form' => $form->createView(),
        ]);
    }

}
