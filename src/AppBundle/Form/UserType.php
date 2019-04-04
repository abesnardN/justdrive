<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use DateTime;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $date = new DateTime();
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('password')
            ->add('permis')
            ->add('urlpermis')
            // ->add('dateinscription', HiddenType::class, [
            //     'data' => $date->format('Y-m-d h:m:i'),
            // ])
            ->add('dateinscription')
            ->add('mail')
            ->add('numtel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
