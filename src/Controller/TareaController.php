<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\TareaRepository;
use App\Entity\Tarea;
use App\Entity\Tareasub;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TareaController extends AbstractController
{
    /**
     * @Route("/tarea", methods={"GET"}, name="index_tarea")
     */
    public function index(TareaRepository $tareas): Response
    {
        
        $tareas = $tareas->findAll();

        return $this->render('tarea/index.html.twig', [
            'tareas' => $tareas,
        ]);
    }

    /**
     * @Route("/{id}/subtareas", methods={"GET"}, name="index_subtareas")
     */
    public function indexSub(TareaRepository $tareas, Tarea $tarea)
    {

        $tareas = $tareas->findAll();
        $subtareas = $tarea->getTareasubs();


        //   $subtareas = $this->getDoctrine()
        //   ->getRepository(Tareasub::class)
        //   ->findByTareaField($tarea->getId());



        return $this->render('tarea/indexsub.html.twig', [
            'tareas' => $tareas,
            'subtareas' => $subtareas,
        ]);



    }



}
