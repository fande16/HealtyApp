<?php

namespace App\Form;

use App\Entity\Consultation;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Entity\Rdv;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('motif')
            ->add('description')
            ->add('resultat')
            ->add('poids')
            ->add('Taille')
            ->add('Temperature')
            ->add('Fréquence_cardiaque')
            ->add('Tension')
            ->add('Fréquence_respiratoire')
            ->add('Diurese')
            ->add('medecin')
            ->add('rdv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Consultation::class,
        ]);
    }
}
