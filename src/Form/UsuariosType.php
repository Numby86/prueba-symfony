<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\Usuario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('poblacion')
            ->add('categoria', ChoiceType::class, [
                'choices' => [
                    'X' => 'X',
                    'Y' => 'Y',
                    'Z' => 'Z',
                ],
                'placeholder' => 'Seleccione una categoría',
                'label' => 'Categoría',
            ])
            ->add('edad')
            ->add('activo')
            ->add('fechaCreacion')
            ->add('fechaModificacion')
            ->add('clientes', EntityType::class, [
                'class' => Cliente::class, 
                'choice_label' => 'nombre',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('Crear', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
