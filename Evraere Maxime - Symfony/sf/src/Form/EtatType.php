<?php

namespace App\Form;

use App\Entity\Etat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Type;

class EtatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, [
           'required' => true,
           'label' => "Entrer l'ID de l'état :  ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer un ID']),
              new Length([                 
                 'min' => 2,
                 'max' => 2,
                 'minMessage' => 'L\'ID doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'Votre ID ne doit pas dépasser {{ limit }} carac.',
                 'exactMessage' => 'Votre ID doit exactement faire 2 carac.'
              ]),
           ]
        ])
            ->add('libelle', TextType::class, [
           'required' => true,
           'label' => "Entrer le nom de l'état : ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer le nom l\'état : ']),
              new Length([                 
                 'min' => 1,
                 'max' => 30,
                 'minMessage' => 'Le nom de l\'état doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'Votre nom d\'état ne doit pas dépasser {{ limit }} carac.'                 
              ]),
           ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etat::class,
        ]);
    }
}
