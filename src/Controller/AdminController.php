<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\ClienteRepository;
use App\Repository\FormatoRepository;
use App\Repository\CarpetaRepository;
use App\Repository\TrabajoRepository;
use App\Repository\SemiRepository;

use App\Entity\Carpeta;
use App\Entity\Trabajo;
use App\Entity\Semi;

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
     * @Route("/semi/{id}", name="semi_show")
     */
    public function semi_show(Semi $semi)
    {
        return $this->render('semi/show.html.twig', [
            'semi' => $semi,
        ]);
    }


    /**
     * @Route("/semielaborados", name="semis")
     */
    public function semis(SemiRepository $semis)
    {
        $semis = $semis->findAllByOrder('id', 'DESC');

     //   var_dump($semis);die;

        return $this->render('semi/index.html.twig', [
            'semis' => $semis,
        ]);
    }

    /**
     * @Route("/articulo/{id}", name="trabajo_show")
     */
    public function trabajo_show(Trabajo $trabajo)
    {
        return $this->render('trabajo/show.html.twig', [
            'trabajo' => $trabajo,
            
        ]);
        
    }


    /**
     * @Route("/articulos", name="trabajos")
     */
    public function trabajos(TrabajoRepository $trabajos)
    {
        $trabajos = $trabajos->findAllByOrder('id', 'DESC');

        return $this->render('trabajo/index.html.twig', [
            'trabajos' => $trabajos,
        ]);
        

    }

    /**
     * @Route("/carpeta/{id}", name="carpeta_show")
     */
    public function carpeta_show(Carpeta $carpeta)
    {

        $trabajos = $carpeta->getTrabajos();
        $semis = [];
        
        foreach ($trabajos as $trabajo){
            $semis = $trabajo->getSemis();
        }

        //var_dump($semis);die;

        return $this->render('carpeta/show.html.twig', [
            'carpeta' => $carpeta,
            'trabajos' => $trabajos,
            'semis' => $semis,
        ]);

    }


    /**
     * @Route("/carpetas", name="carpetas")
     */
    public function carpetas(CarpetaRepository $carpetas)
    {
        
        $carpetas = $carpetas->findAllByOrder('id', 'DESC');

        return $this->render('carpeta/index.html.twig', [
            'carpetas' => $carpetas,
        ]);
    }


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

