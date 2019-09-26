<?php

namespace AppBundle\Form;

use AppBundle\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('modele', TextType::class, [
                'label' => 'Modèle',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'modele'
                ]])
            ->add('kilometrage', NumberType::class, [
                'label' => 'Kilométrage',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'kilometrage'
                ]])
            ->add('marque', TextType::class, [
                'label' => 'Marque',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'marque'
                ]])
            ->add('nbplace', NumberType::class, [
                'label' => 'Nombre de places',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'nbplace'
                ]])
            ->add('immatriculation', TextType::class, [
                'label' => 'Immatriculation',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'immatriculation'
                ]])
            ->add('datepremierecirculation', DateType::class, [
                'label' => "Date de la première circulation",
                'required' => false,
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'datepremierecirculation',
                    'type' => 'date'
                ]])
        ;
        if($options['isCreate'] == true) {
            $builder->add('save', SubmitType::class, [
                    'label' => "Créer le véhicule",
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
            'data_class' => Vehicule::class,
            'isCreate' => false
        ]);
    }
}
