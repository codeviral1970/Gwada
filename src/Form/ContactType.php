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

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
              'label' => 'Votre prénom',
              'label_attr' => [
                    'class' => 'inline-block text-gray-500 text-sm sm:text-base mb-2',
              ],
              'attr' => ['class' => 'w-full bg-gray-50 text-gray-500 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2'],
            ])
            ->add('lastName', TextType::class, [
              'label' => 'Votre nom',
              'label_attr' => [
                    'class' => 'inline-block text-gray-500 text-sm sm:text-base mb-2',
              ],
              'attr' => ['class' => 'w-full bg-gray-50 text-gray-500 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2'],
            ])
            ->add('email', EmailType::class, [
              'label' => 'Votre email',
              'label_attr' => [
                    'class' => 'inline-block text-gray-500 text-sm sm:text-base mb-2',
              ],
              'attr' => ['class' => 'w-full bg-gray-50 text-gray-500 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2'],
            ])
            ->add('subject', TextType::class, [
              'label' => 'Sujet',
              'label_attr' => [
                    'class' => 'inline-block text-gray-500 text-sm sm:text-base mb-2',
              ],
              'attr' => ['class' => 'w-full bg-gray-50 text-gray-500 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2'],
            ])
            ->add('message', TextareaType::class, [
              'label' => 'Message',
              'label_attr' => [
                    'class' => 'inline-block text-gray-500 text-sm sm:text-base mb-2',
              ],
              'attr' => [
                'class' => 'w-full h-64 bg-gray-50 text-gray-500 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2',
              ],
            ])
            ->add('submit', SubmitType::class, [
              'label' => 'Envoyer',
              'attr' => [
                'class' => 'inline-block bg-rose-500 hover:bg-rose-600 active:bg-rose-700 focus-visible:ring ring-rose-600 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3',
              ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
