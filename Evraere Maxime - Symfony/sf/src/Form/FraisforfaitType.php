<?php

namespace App\Form;

use App\Entity\Fraisforfait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Type;


class FraisforfaitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, [
           'required' => true,
           'label' => "Entrer l'ID du frais forfait :  ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer un ID']),
              new Length([                 
                 'min' => 2,
                 'max' => 3,
                 'minMessage' => 'L\'ID doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'Votre ID ne doit pas dépasser {{ limit }} carac.',
                 'exactMessage' => 'Votre ID doit exactement faire 2 carac.'
              ]),
           ]
        ])
            ->add('libelle', TextType::class, [
           'required' => true,
           'label' => "Entrer le nom du frais forfait : ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer le nom du frais forfait : ']),
              new Length([                 
                 'min' => 1,
                 'max' => 20,
                 'minMessage' => 'Le nom du frais forfait doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'Votre nom de frais forfait ne doit pas dépasser {{ limit }} carac.'                 
              ]),
           ]
        ])
            ->add('montant', TextType::class, [
           'required' => true,
           'label' => "Entrer le montant du frais forfait : ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer un montant : ']),
              new Length([                 
                 'min' => 1,
                 'max' => 30,
                 'minMessage' => 'Le montant du frais forfait doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'Votre montant ne doit pas dépasser {{ limit }} carac.'                 
              ]),
           ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fraisforfait::class,
        ]);
    }
}
