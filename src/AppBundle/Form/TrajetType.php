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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

Use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class TrajetType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('adressedepart', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'Adresse de départ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('adressearrive', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'Adresse d\'arrivée',
                'attr' => ['class' => 'form-control']
            ])
            ->add('fkvehicule', EntityType::class, [
                // looks for choices from this entity
                'class' => Vehicule::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'modele',
                'label'=>'Véhicule',
                'attr' => ['class' => 'form-control']
            ])
            ->add('datedepart',DateTimeType::class,['widget'=>'single_text',
                                                    'label'=>'Date de départ',
                                                'attr'=>['type'=>'date', 'class'=> 'form-control']])
            ->add('datearrive',DateTimeType::class,['widget'=>'single_text',
                                                    'label'=>'Date de retour',
                                                'attr'=>['type'=>'date', 'class'=> 'form-control']])
            ->add('kilometrage',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('commentaireconducteur',TextareaType::class,
                                      ['required'   => false,
                                      "label"=>'Commentaire conducteur',
                                      "attr"=>['class'=>'form-control']
                                    ])
            ->add('commentaireinterne',TextareaType::class,
                                      ['required'   => false,
                                      "label"=>'Commentaire interne',
                                      "attr"=>['class'=>'form-control']
                                    ])

            ->add('pointrdvdepart', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'point RDV départ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('pointrdvarrive', EntityType::class, [
                // looks for choices from this entity
                'class' => Adresse::class,
                // uses the User.username property as the visible option string
                'choice_label' => function (Adresse $adresse) {
                    return $adresse->getNumrue() .' '.$adresse->getNomrue() . ' ' . $adresse->getVille().' '.$adresse->getfkPays();
                },
                'label'=>'point RDV arrivée',
                'attr' => ['class' => 'form-control']
            ])
            ->add('fketat', EntityType::class, [
                // looks for choices from this entity
                'class' => Etatvehicule::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'libelle',
                'label'=>'Etat du véhicule',
                'attr' => ['class' => 'form-control']
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
