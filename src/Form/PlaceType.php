<?php

namespace App\Form;

use App\Service\RandomPlace;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaceType extends AbstractType{

    private  $randomPlace;
    public function __construct(RandomPlace $randomPlace){
        $this->randomPlace = $randomPlace;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => array_combine(RandomPlace::PLACES,RandomPlace::PLACES ),
            'data' => $this->randomPlace->getRandomPlace(),
            'label' => false,
            'attr' => [
                'class' => 'form-control',
            ]
        ]);
    }
    public function getParent()
    {
        return ChoiceType::class;
    }
    public function getBlockPrefix()
    {
        return 'custom_place';
    }
}