<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $roleSuper[] = 'ROLE_SUPER_ADMIN';

        $user = new User();
        $user->setEmail('jorge@kimberly-systems.com') ;
        $user->setNombre('Jorge');
        $user->setApellidos('Maté Martínez');
        $user->settelefono('0034 636 831 823');
        $user->setEnabled(true);

        $user->setRoles($roleSuper);

        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         '4444'
                     ));
            
        $manager->persist($user);
        

        $roleAdmin[] = 'ROLE_SUPER_ADMIN';

        $user = new User();
        $user->setEmail('gestion@euroboxenvases.com') ;
        $user->setNombre('Ángel');
        $user->setApellidos('');
        $user->settelefono('');
        $user->setEnabled(true);

        $user->setRoles($roleAdmin);

        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         'carbo'
                     ));
            
        $manager->persist($user);



        $manager->flush();
    }
}
