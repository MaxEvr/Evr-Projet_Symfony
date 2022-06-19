<?php

namespace App\Form;

use App\Entity\Fichefrais;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Etat;
use App\Entity\Utilisateur;

class FichefraisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mois', TextType::class, [
           'required' => true,
           'label' => "Entrer le mois de la fiche frais : ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer le mois de la fiche frais : ']),
              new Length([                 
                 'min' => 6,
                 'max' => 6,
                 'minMessage' => 'Le mois de la fiche doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'Votre mois de la fiche ne doit pas dépasser {{ limit }} carac.',
                 'exactMessage' => 'Le mois doit exactement faire {{ limit }}'
              ]),
           ]
        ])
            ->add('nbjustificatifs', IntegerType::class, [
           'required' => true,
           'label' => "Entrer le nombre de justificatifs de la fiche : ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer le nombre de justificatifs de la fiche : ']),
              new Length([                 
                 'min' => 1,
                 'max' => 11,
                 'minMessage' => 'le nombre de justificatifs de la fiche doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'le nombre de justificatifs de la fiche ne doit pas dépasser {{ limit }} carac.'                 
              ]),
           ]
        ])
            ->add('montantvalide', TextType::class, [
           'required' => true,
           'label' => "Entrer le montant de la fiche frais : ",
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer un montant : ']),
              new Length([                 
                 'min' => 1,
                 'max' => 30,
                 'minMessage' => 'le montant de la fiche frais doit faire au moins {{ limit }} carac.',
                 'maxMessage' => 'Votre montant ne doit pas dépasser {{ limit }} carac.'                 
              ]),
           ]
        ])
                
            ->add('datemodif', DateType::class, [
           'required' => true,
           'label' => "Entrer la date de la fiche frais : ",
           'attr' => [
             'placeholder' => 'Veuillez entrer une date : '              
           ],
        ] )
                
                
            ->add('idetat', EntityType::class, [
           'required' => true,
           'label' => "Entrer l'id de l'état de la fiche frais : ",
           'class' => Etat::class,
           'choice_label' => 'id',
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer un état : ']),              
           ]
        ])
            ->add('idutilisateur', EntityType::class, [
           'required' => true,
           'label' => "Entrer l'id de l'utilisateur de la fiche frais : ",
           'class' => Utilisateur::class,
           'choice_label' => 'id',
           'constraints' => [
              new NotBlank(['message' => 'Veuillez entrer un utilisateur : ']),              
           ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fichefrais::class,
        ]);
    }
}
