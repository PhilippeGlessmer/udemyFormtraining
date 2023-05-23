<?php

namespace App\Form;

use App\Service\RandomPlace;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    private  $randomPlace;
    public function __construct(RandomPlace $randomPlace){
        $this->randomPlace = $randomPlace;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => $options['my_title']
                ]
            ])
            ->add('place', TextType::class,[
                'attr' => [
                    'placeholder' => $this->randomPlace->getRandomPlace(),
                ]
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
