<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;
//use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use Symfony\Component\OptionsResolver\OptionsResolver;

class NewUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
            ])


            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'max' => BCryptPasswordEncoder::MAX_PASSWORD_LENGTH,
                    ]),
                ],
                'first_options' => [
                    'label' => 'Contraseña',
                ],
                'second_options' => [
                    'label' => 'Repítala',
                ],
            ])

                ->add('nombre', TextType::class, [
                    'label' => 'Nombre',
                    'required' => false,
                ])
                ->add('apellidos', TextType::class, [
                    'label' => 'Apellidos',
                ])
                ->add('telefono', TextType::class, [
                    'label' => 'Teléfono',
                    'required' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
