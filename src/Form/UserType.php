<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Security\Core\Security;
//use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Defines the form used to edit an user.
 *
 */
class UserType extends AbstractType
{

    private $isAuto;
    private $isAdmin;
    private $isSuper;

    private $self_edit;
//    private $autoInspect;


    public function __construct(Security $security){

        $this->isAuto = false;        
        $this->isAdmin = false;        
        $this->isSuper = false;
 //       $this->autoInspect = false;

        // $this->autoInspect = ($this->user->getId() == $user->getId());
        
        $userRequest = $security->getUser();  
      
        if (in_array('ROLE_SUPER_ADMIN', $userRequest->getRoles())) {
            $this->isSuper = true;
            $this->isAdmin = true;   
            $this->isAuto = true;   
        }
        if (in_array('ROLE_ADMIN', $userRequest->getRoles())) {
            $this->isAdmin = true;   
            $this->isAuto = true;   
        }
        if (in_array('ROLE_AUTO', $userRequest->getRoles())) {
            $this->isAuto = true;   
        }

    }        


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // For the full reference of options defined by each form field type
        // see https://symfony.com/doc/current/reference/forms/types.html

        // By default, form fields include the 'required' attribute, which enables
        // the client-side form validation. This means that you can't test the
        // server-side validation errors from the browser. To temporarily disable
        // this validation, set the 'required' attribute to 'false':
        // $builder->add('title', null, ['required' => false, ...]);

        if($this->isSuper and true) {
            $builder
            ->add('admin', CheckboxType::class, [
                'label' => 'Administrador',
                'required' => false,
            ]);    
        }

        if($this->isAdmin) {
            $builder

            ->add('email', EmailType::class, [
            'label' => 'Email',
            ])

            ->add('auto', CheckboxType::class, [
                    'label' => 'Usuario Autorizado',
                    'required' => false,
                ])
            

            ->add('enabled', CheckboxType::class, [
                'label' => 'Activo (Desmarcar para inhabilitar cuenta)',
                'required' => false,
                ])
            ;

        } else {
        
            $builder            
            ->add('email', TextType::class, [
                'label' => 'Email',
                'disabled' => true,
            ])
        ;
        }
         
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre',
            ])
            ->add('apellidos', TextType::class, [
                'label' => 'Apellidos',
            ])
            ->add('telefono', TelType::class, [
                'label' => 'Teléfono',
                'required' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
