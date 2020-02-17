<?php

namespace App\Form\Books;

use App\Entity\Books\{
    Book,
    Author
};
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{
    SubmitType,
    TextType
};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'label' => 'Título',
                    'attr' => [
                        'required' => TRUE
                    ]
                ]
            )
            ->add(
                'description',
                TextType::class,
                [
                    'label' => 'Descripción',
                    'attr' => [
                        'required' => TRUE
                    ]
                ]
            )
            ->add(
                'price',
                TextType::class,
                [
                    'label' => 'Precio',
                    'attr' => [
                        'required' => TRUE
                    ]
                ]
            )
            ->add(
                'author',
                EntityType::class,
                [
                    'label' => 'Seleccionar autor',
                    'placeholder' => 'Seleccionar',
                    'class' => Author::class,
                    'attr' => [
                        'required' => TRUE
                    ]
                ]
            )
            ->add(
                'Guardar',
                SubmitType::class,
                [
                    'attr' => [
                        'class' => 'btn btn-primary',
                        'required' => TRUE
                    ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
