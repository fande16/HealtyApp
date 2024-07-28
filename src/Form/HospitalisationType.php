<?php

namespace App\Form;

use App\Entity\Consultation;
use App\Entity\Hospitalisation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HospitalisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateEntre', null, [
                'widget' => 'single_text',
            ])
            ->add('dateSortie', null, [
                'widget' => 'single_text',
            ])
            ->add('chambre')
            ->add('consultation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hospitalisation::class,
        ]);
    }
}
