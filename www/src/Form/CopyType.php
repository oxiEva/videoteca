<?php

namespace App\Form;

use App\Entity\Copy;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CopyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('filmId')
            ->add('price')
            ->add('language')
            ->add('status')
            ->add('dateOfSale')
            ->add('creationDate')
            ->add('vendor', EntityType::class, array(
                'class' => User::class
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Copy::class,
            'allow_extra_fields' => true,
        ]);
    }
}
