<?php

namespace App\Form;

use App\Entity\Semi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class SemiRecType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('s_semi', TextType::class, [
                'label' => 'Semielaborado',
                'required' => true,
            ])
            
            ->add('i_en_cajas', CheckboxType::class, [
                'label' => 'En Cajas',
                'value' => false,
                'required' => false,
            ]);


            if(0){

                $builder    
                ->add('i_uds_caja')
                ->add('i_cajas_palet');
        
            }

            $builder    

            ->add('i_uds_palet')

            ->add('s_especificaciones', TextType::class, [
                'label' => 'Especificaciones',
                'required' => false,
            ])
            ->add('mt_notas', TextareaType::class, [
                'label' => 'NOTAS',
                'required' => false,
            ])
            
            
            ->add('generico', CheckboxType::class, [
                'label' => 'Genérico',
                'value' => false,
                'required' => false,
            ])

            
            ->add('s_lote', TextType::class, [
                'label' => 'LOTE',
                'required' => false,
            ])

            ->add('i_activo', CheckboxType::class, [
                'label' => 'Activo',
                'data' => true,
                'required' => false,
            ])

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Semi::class,
        ]);
    }
}
