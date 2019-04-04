<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\ClienteRepository;
use App\Repository\UserRepository;

use App\Entity\CodigoP;
use App\Entity\CodigoS;

use App\Entity\User;

use App\Entity\Cliente;

use App\Form\NewUserType;
use App\Form\UserType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;



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
     * @Route("/usuarios", methods={"GET"}, name="usuarios")
     * 
     * LISTAR todos los usuarios
     */
    public function usuarios(UserRepository $usuarios): Response
    {
        
        $user = $this->getUser();
        $usuarios = $usuarios->findAll();

        return $this->render('admin/users/index.html.twig', [
            
            'user' => $user,
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * @Route("/usuario/nuevo", methods={"GET", "POST"}, name="usuario_nuevo")
     * 
     * NUEVO usuario 
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder): Response
    {   // pasamos el usuario para el voter
    
        $userX = new User();

        $userX->setEnabled(true);
        $userX->setEmail('');
        $userX->setPassword('');

        $roles[] = 'ROLE_ADMIN';
        $userX->setRoles($roles);

        $form = $this->createForm(NewUserType::class, $userX);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $userX->setPassword($encoder->encodePassword($userX, $form->get('password')->getData()));

            $this->getDoctrine()->getManager()->persist($userX);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Registro insertado correctamente');

            return $this->redirectToRoute('usuarios', []);
        }

        return $this->render('admin/users/new.html.twig', [
            'user' => $userX,
            'form' => $form->createView(),
            'sidebarContent' => '',
        ]);




    }

 /**
     * @Route("/usuario/{id}/editar", methods={"GET", "POST"}, name="usuario_id_edit")
     * 
     * EDITAR otro usuario del mismo centro, cualquiera si es SUPER_ADMIN 
     */
    public function editUser(Request $request, User $user): Response
    {
        //$this->denyAccessUnlessGranted('USER_EDIT', $user);
        ///////////////////////////////////////////////////


        // if($user->getId() == $security->getUser()->getId()){


        // } else {

        $form = $this->createForm(UserType::class, $user);

        // }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Usuario actualizado correctamente');

            return $this->redirectToRoute('usuarios', []);
        }

        
        return $this->render('admin/users/edit.html.twig', [
        
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/codigoP/{id}", methods={"DELETE"}, name="codigoP_delete")
     */
    public function deleteCodigoP(CodigoP $codigoP)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $em = $this->getDoctrine()->getManager();
        $em->remove($codigoP);
        $em->flush();
        return new Response(null, 204);
    }

    /**
     * @Route("/codigoS/{id}", methods={"DELETE"}, name="codigoS_delete")
     */
    public function deleteCodigoS(CodigoS $codigoS)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $em = $this->getDoctrine()->getManager();
        $em->remove($codigoS);
        $em->flush();
        return new Response(null, 204);
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
     * @Route("/cliente/{id}", methods={"GET", "POST"}, name="cliente")
     */
    public function showCliente(Cliente $cliente): Response
    {

        $carpetas = $cliente->getCarpetas();

        return $this->render('cliente/show.html.twig', [
            'cliente' => $cliente,
            'carpetas' => $carpetas,
         // 'form' => $form->createView(),
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

    /**
    * @Route("/clientesX", name="clientesX")
    */
    public function clientes_paginados(EntityManagerInterface $entityManager, Request $request)
    {

        $order = 'name';

        if ($request->query->get('orden')){
            $order = $request->query->get('orden');
        }


        $queryBuilder = $entityManager->createQueryBuilder()
        ->select('c')
        ->from('App\Entity\Cliente', 'c')
        ->orderBy('c.'.$order, 'ASC');
        
        $adapter = new DoctrineORMAdapter($queryBuilder);

        $pagerfanta = new Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage(10); // 10 by default
        $maxPerPage = $pagerfanta->getMaxPerPage();

        $pagerfanta->getCurrentPageOffsetStart(6);
        $pagerfanta->getCurrentPageOffsetEnd(6);

        if (isset($_GET["page"])) {
            //  $t = $pagerfanta->getNbPages();
            //  var_dump($t); die;
            $page = min($_GET["page"], $pagerfanta->getNbPages());
            $pagerfanta->setCurrentPage($page);
        }

        return $this->render('cliente/indexX.html.twig', [
            'my_pager' => $pagerfanta,
            'order' => $order,
        ]);
    



    }


}

