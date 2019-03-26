<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


use App\Entity\Tarea;
use App\Entity\Tareasub;

class TareaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $tarea = new Tarea();
        $tarea->setTarea('producción');
        $manager->persist($tarea);

            $id = $tarea;

            $sub = new Tareasub();
            $sub->setTarea($id);
            $sub->setTareasub('Muestras');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($id);
            $sub->setTareasub('Impresión de QR');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($id);
            $sub->setTareasub('Taller utillajes');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($id);
            $sub->setTareasub('cuerpos');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($id);
            $sub->setTareasub('prensa');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($id);
            $sub->setTareasub('otros');
            $manager->persist($sub);

        //////////////////////////////////////////

        $tarea = new Tarea();
        $tarea->setTarea('expedición');
        $manager->persist($tarea);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('embalaje y preparación');
            $manager->persist($sub);
            
            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('movimiento entre almacenes');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('control de expedición');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('expedición a clientes');
            $manager->persist($sub);

        //////////////////////////////////////////

        $tarea = new Tarea();
        $tarea->setTarea('montaje');
        $manager->persist($tarea);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('otros');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('cuerpos');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('prensa');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('corte');
            $manager->persist($sub);

        //////////////////////////////////////////

        $tarea = new Tarea();
        $tarea->setTarea('logística');
        $manager->persist($tarea);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('recepción de artículos');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('control de recepción');
            $manager->persist($sub);

        //////////////////////////////////////////

        $tarea = new Tarea();
        $tarea->setTarea('limpeza');
        $manager->persist($tarea);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('fabrica');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('lineas');
            $manager->persist($sub);

        //////////////////////////////////////////

        $tarea = new Tarea();
        $tarea->setTarea('otras tareas');
        $manager->persist($tarea);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('Reparación Maquinaria');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('Programación del sistema');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('Tareas Oficina');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('otras tareas');
            $manager->persist($sub);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('Ingeniería');
            $manager->persist($sub);

        //////////////////////////////////////////

        $tarea = new Tarea();
        $tarea->setTarea('Construcción de utillaje');
        $manager->persist($tarea);

            $sub = new Tareasub();
            $sub->setTarea($tarea);
            $sub->setTareasub('Taller utillaje');
            $manager->persist($sub);



        $manager->flush();
        
    }
}
