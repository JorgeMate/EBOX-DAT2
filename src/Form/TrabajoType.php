<?php

namespace App\Form;

use App\Entity\Trabajo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;

//use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
//use Symfony\Component\Form\Extension\Core\Type\RadioType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Carpeta;

class TrabajoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        //$builder->add('carpetas', EntityType::class, [
            // looks for choices from this entity
            //'class' => Carpeta::class,
        
            // uses the User.username property as the visible option string
            //'choice_label' => 'name',
        
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        //]);

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
                ->add('i_eti_defecto', ChoiceType::class,[
                    'label' => 'Etiquetas X Palet',
                    'choices' => [
                        
                        '1' => 1,                    
                        '2' => 2,   
                        '3' => 3,                    
                        '4' => 4,   
                        '5' => 5,                    

                    ]
                ])
        


                ->add('i_en_cajas', ChoiceType::class,[
                    'label' => 'Paletización',
                    'choices' => [
                        'No tiene' => 0,
                        'A Granell' => 1,                    
                        'En Cajas' => 2,   
                    ]
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
