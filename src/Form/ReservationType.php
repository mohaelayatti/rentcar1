<?php

namespace App\Form;

use App\Entity\Car;
use App\Form\CarType;
use App\Entity\Client;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateReservation', DateType::class, [
                'widget' => 'single_text'
            ])
             ->add('dateDepart', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('nbreJour')
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nomClient'
            ])
            
            ->add('car', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'nom'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,

        ]);
    }
}
