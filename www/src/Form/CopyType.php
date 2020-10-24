<?php

namespace App\Form;

use App\Entity\Copy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CopyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filmId')
            ->add('price')
            ->add('language')
            ->add('status')
            ->add('dateOfSale')
            ->add('creationDate')
            ->add('vendor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Copy::class,
        ]);
    }
}
