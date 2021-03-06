<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\TareaRepository;

use App\Entity\Tarea;
use App\Entity\Tareasub;
use App\Entity\Operario;

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

        return $this->render('tarea/indexsub.html.twig', [
            'tareas' => $tareas,
            'subtareas' => $subtareas,
        ]);

    }

    /**
     * @Route("subtarea/{id}/confirm", methods={"GET","POST"}, name="confirm_subtarea")
     */
    public function confirma(Request $request, Tareasub $tareasub)
    {

        $operario = null;
        $iname = $request->request->get('iname');

            if($iname){
                $operario = $this->getDoctrine()
                ->getRepository(Operario::class)
                ->findOneByIname($iname);

            //    var_dump($operario);die;

              }
        

        $tareaX = $this->getDoctrine()
            ->getRepository(Tareasub::class)
            ->findByTareasubField($tareasub);

        //var_dump($tareaX); die;

        return $this->render('tarea/confirm.html.twig', [
            'iname' => $iname,
            'operario' => $operario,
            'tareaX' => $tareaX
        ]);
    
    }






}
