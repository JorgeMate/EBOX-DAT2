<?php

namespace App\Form;

use App\Entity\Trabajo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class TrabajoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        ->add('id_anterior', TextType::class, [
            'label' => 'ID ANTERIOR',
            'required' => true,
            
        ]);


        $builder            
            ->add('s_trabajo', TextType::class, [
                'label' => 'Artículo',
                'required' => true,
            ])
            ->add('i_unidades')
            ->add('s_cod_art', TextType::class, [
                'label' => 'COD. Artículo',
                'required' => true,
            ])
            
            ->add('mt_notas', TextareaType::class, [
                'label' => 'Notas',
                'required' => false,
            ]);
            

            
            

            $builder   
                ->add('i_eti_defecto')
        
                ->add('i_en_cajas', RadioType::class, [
                    'value' => 0,
                    'label'    => 'Ninguna',
                    'required' => false,
                ])
                ->add('i_en_cajas', RadioType::class, [
                    'value' => 1,
                    'label'    => 'A Granell',
                    'required' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trabajo::class,
        ]);
    }
}
