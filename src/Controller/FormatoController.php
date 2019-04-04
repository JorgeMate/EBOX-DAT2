<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\FormatoRepository;


use Doctrine\ORM\EntityManagerInterface;

use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
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

    /**
    * @Route("/formatosX", name="formatosX")
    */
    public function formatos_paginados(EntityManagerInterface $entityManager, Request $request)
    {

        $order = 'name';

        if ($request->query->get('orden')){
            $order = $request->query->get('orden');
        }

        $queryBuilder = $entityManager->createQueryBuilder()
        ->select('f')
        ->from('App\Entity\Formato', 'f')
        ->orderBy('f.' . $order, 'ASC');
        
        $adapter = new DoctrineORMAdapter($queryBuilder);

        $pagerfanta = new Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage(10); // 10 by default
        $maxPerPage = $pagerfanta->getMaxPerPage();

        $pagerfanta->getCurrentPageOffsetStart(8);
        $pagerfanta->getCurrentPageOffsetEnd(8);

        if (isset($_GET["page"])) {
            $page = min($_GET["page"], $pagerfanta->getNbPages());
            $pagerfanta->setCurrentPage($page);
        }

        return $this->render('formato/indexX.html.twig', [
            'my_pager' => $pagerfanta,
            'order' => $order,
        ]);
    



    }

}
   