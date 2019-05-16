<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use DateTime;
use Symfony\Component\Validator\Constraints\Date;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'nom'
                ]])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'prenom'
                ]])
            ->add('permis', DateType::class, [
                'label' => "Date d'optention du permis de conduire",
                'required' => false,
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'datePermis',
                    'type' => 'date'
                ]])
            ->add('urlpermis', TextType::class, [
                'label' => 'Url vers une copie du permis de conduire',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'urlPermis',
                    'placeholder' => 'www.exemple.fr'
                ]])
            ->add('mail', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'mail',
                    'type' => 'email'
                ]])
            ->add('numtel', TelType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'tel',
                    'type' => 'tel'
                ]])
        ;

        if($options['isCreate'] == true) {
            $builder->add('dateinscription', DateType::class, [
                'label' => "Date d'inscription",
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'datePermis',
                    'type' => 'date'
                ]])
                ->add('admin', ChoiceType::class, [
                    'label' => "L'utilisateur est un responsable de formation ?",
                    'choices' => [
                        'Oui' => 1,
                        'Non' => 0
                    ],
                    'expanded' => true,
                    'multiple' => false,
                    ])
                ->add('save', SubmitType::class, [
                    'label' => "Créer l'utilisateur",
                    'attr' => [
                        'class' => 'btn btn-primary',
                    ]
                ])
            ;
        } else {
            $builder->add('save', SubmitType::class, [
                'label' => 'Mettre à jour',
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'isCreate' => false
        ]);
    }
}
