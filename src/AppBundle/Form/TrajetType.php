<?php

namespace AppBundle\Form;

use AppBundle\Entity\Trajet;
use AppBundle\Entity\User;
use AppBundle\Entity\Vehicule;
use AppBundle\Entity\Adresse;
use AppBundle\Entity\Etatvehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TrajetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fkuser', EntityType::class, [
                // looks for choices from this entity
                'class' => User::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
                'label'=>'Utilisateur',
            ])

            ->add('adressedepart', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'Adresse de départ',
            ])
            ->add('addressearrive', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'Adresse d\'arrivé',
            ])
            ->add('fkvehicule', EntityType::class, [
                // looks for choices from this entity
                'class' => Vehicule::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'modele',
                'label'=>'Véhicule',
            ])
            ->add('datedepart')
            ->add('datearrive')
            ->add('kilometrage')
            ->add('commentaireconducteur',TextareaType::class, ['required'   => false])
            ->add('commentaireinterne',TextareaType::class, ['required'   => false])

            ->add('pointrdvdepart', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'point RDV départ',
            ])
            ->add('pointrdvarrive', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'point RDV arrivé',
            ])
            ->add('fketat', EntityType::class, [
                // looks for choices from this entity
                'class' => Etatvehicule::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'libelle',
                'label'=>'Etat du véhicule',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trajet::class,
        ]);
    }
}
