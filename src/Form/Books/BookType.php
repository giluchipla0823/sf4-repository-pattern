<?php

namespace App\Form\Books;

use App\Entity\Books\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                'authorId',
                NumberType::class,
                [
                    'label' => 'Author',
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
