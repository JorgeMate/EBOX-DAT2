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

        $user = new User();

        $user->setEmail('jorge@kimberly-systems.com') ;

        $roles[] = 'ROLE_USER';
        $user->setRoles($roles);


        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         '4444'
                     ));
            
        $manager->persist($user);

        $manager->flush();
    }
}
