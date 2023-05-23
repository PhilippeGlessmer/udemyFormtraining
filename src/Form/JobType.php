<?php

namespace App\Form;

use App\Service\RandomPlace;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{ChoiceType, SubmitType, TextType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => $options['my_title']
                ]
            ])
            ->add('place', PlaceType::class,[

            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here

        ]);
        $resolver->setRequired([
            'my_title',
        ]);
    }
}
