<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use App\Repository\CarpetaRepository;
use App\Entity\Carpeta;


/**
 * Controller used to manage current user.
 *
 * @Route("/user")
 * @Security("is_granted('ROLE_USER')")
 *
 */
class CarpetaController extends AbstractController
{

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


}
   