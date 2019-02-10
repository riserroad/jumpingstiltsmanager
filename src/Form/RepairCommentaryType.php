<?php

namespace App\Form;

use App\Entity\RepairCommentary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepairCommentaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('repair_date')
            ->add('comment')
            ->add('jumping_tilt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RepairCommentary::class,
        ]);
    }
}
