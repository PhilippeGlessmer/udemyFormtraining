<?php

namespace App\Form;

use App\DataTransformer\EuroToDollarTransformer;
use App\Service\RandomPlace;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{CheckboxType,
    ChoiceType,
    CountryType,
    EmailType,
    HiddenType,
    MoneyType,
    SubmitType,
    TextType};
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class JobType extends AbstractType
{
    private $transformer;

    /**
     * @param $transformer
     */
    public function __construct(EuroToDollarTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

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
            ->add('country', HiddenType::class)
            ->add('contact', EmailType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'constraints' => new Email(),
            ])
            ->add('salary', MoneyType::class)

            ->add('autorizationWork', CheckboxType::class, [
                'required' => false,
            ])
            ->add('save', SubmitType::class)
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event){
                /** @var   $job */
                $job = $event->getData();
                $place = $job->getPlace();
                $country = RandomPlace::getCountryByPlace($place);
                $job->setCountry($country);
            });
        ;
        $builder->get('salary')->addModelTransformer($this->transformer);
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
