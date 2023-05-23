<?php

namespace App\Form;

use App\Service\RandomPlace;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{CheckboxType, ChoiceType, EmailType, SubmitType, TextType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class JobType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => $options['my_title']
                ],
                'constraints' => new Length(['min' => 3, 'minMessage' => 'Minimum 3 lettres'])
            ])
            ->add('place', PlaceType::class)
            ->add('contact', EmailType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'constraints' => new Email(),
            ])
            ->add('autorizationWork', CheckboxType::class, [
                'required' => false,
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
//            "validation_groups" => false,

        ]);
        $resolver->setRequired([
            'my_title',
        ]);
    }
}
