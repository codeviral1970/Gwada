<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('firstName', TextType::class, [
        'label' => 'Votre prénom',
        'constraints' => [
          new Assert\Length([
            'min' => 2,
            'minMessage' => "Minimum 2 caractères",
            'max' => 50,
            'maxMessage' => "Maximum 50 caractères",
          ]),
          new Assert\NotBlank([
            'message' => 'Ce champs ne peut être vide'
          ])
        ]
      ])
      ->add('lastName', TextType::class, [
        'label' => 'Votre nom',
        'constraints' => [
          new Assert\Length([
            'min' => 2,
            'minMessage' => "Minimum 2 caractères",
            'max' => 50,
            'maxMessage' => "Maximum 50 caractères",
          ]),
          new Assert\NotBlank([
            'message' => 'Ce champs ne peut être vide'
          ])
        ]
      ])
      ->add('email', EmailType::class, [
        'label' => 'Votre email',
        'constraints' => [
          new Assert\NotBlank([
            'message' => 'Ce champs ne peut être vide'
          ]),
          new Assert\Email([
            'message' => 'Email invalid'
          ])
        ]
      ])
      ->add('subject', TextType::class, [
        'label' => 'Sujet',
        'constraints' => [
          new Assert\NotBlank([
            'message' => 'Ce champs ne peut être vide'
          ])
        ]
      ])
      ->add('message', TextareaType::class, [
        'label' => 'Message',
        'constraints' => [
          new Assert\NotBlank([
            'message' => 'Ce champs ne peut être vide'
          ])
        ]
      ])
      ->add('submit', SubmitType::class, [
        'label' => 'Envoyer',
        'attr' => [
          'class' => 'inline-block bg-hippie hover:bg-neptune focus-visible:ring ring-theme-color text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3 mt-3',
        ],
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Contact::class,
      'attr' => [
        'novalidate' => 'novalidate',
      ]
    ]);
  }
}
