<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Operario;

class OperarioFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $operario = new Operario();
        $operario->setName('José Ramón Marti');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(002053);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Andres Lajara');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(002063);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Juan Alemany');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(2069);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Jaime Perez');
        $operario->setActivo(1);
        $operario->setPlanta(1);
        $operario->setIname(0);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Néstor Montañés');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(2081);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Daniel Corbí');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(2083);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Angela Silvestre');
        $operario->setActivo(0);
        $operario->setPlanta(0);
        $operario->setIname(2087);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Pilar Grau');
        $operario->setActivo(1);
        $operario->setPlanta(0);
        $operario->setIname(2089);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Julio Quinones');
        $operario->setActivo(1);
        $operario->setPlanta(1);
        $operario->setIname(2099);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Rafael');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(2111);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Jesús Gomez');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(2113);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('Javier Vall');
        $operario->setActivo(0);
        $operario->setPlanta(1);
        $operario->setIname(2129);

        $manager->persist($operario);

        $operario = new Operario();
        $operario->setName('David Carbonell');
        $operario->setActivo(1);
        $operario->setPlanta(1);
        $operario->setIname(2131);
        
        $manager->persist($operario);


        $manager->flush();


    }
}
