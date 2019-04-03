<?php

namespace AppBundle\Form;

use AppBundle\Entity\Trajet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrajetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fkuser')
            ->add('adressedepart')
            ->add('addressearrive')
            ->add('fkvehicule')
            ->add('datedepart')
            ->add('datearrive')
            ->add('kilometrage')
            ->add('commentaireconducteur')
            ->add('commentaireinterne')
            ->add('pointrdvdepart')
            ->add('pointrdvarrive')
            ->add('fketat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trajet::class,
        ]);
    }
}
