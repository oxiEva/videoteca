<?php

namespace App\Form;

use App\Entity\Copy;
use App\Entity\Film;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CopyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            //Convert this filed in autocomplete field
            ->add('originalFilm', EntityType::class,array(
                'class' => Film::class
            ))
            ->add('price')
            ->add('language', ChoiceType::class, [
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Catalan' => 'cat',
                    'Germany' => 'ge',
                    'Bork' => 'muppets',
                    'Pirate' => 'arr',
                ],
                'preferred_choices' => ['en', 'arr'],])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'New' => 'New',
                    'Perfect' => 'Perfect',
                    'Small stroke' => 'Small stroke',
                    'Without box' => 'Without box',
                    'Other' => 'Other',
                ],
            ])
            ->add('dateOfSale')
            ->add('creationDate')
            ->add('vendor', EntityType::class, array(
                'class' => User::class
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Copy::class,
            'allow_extra_fields' => true,
        ]);
    }
}
