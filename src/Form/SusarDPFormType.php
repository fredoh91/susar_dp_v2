<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\DP;
use App\Entity\Evaluateurs;
use App\Entity\IntervenantANSMDMM;

class SusarDPFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DP', EntityType::class, [
                'class' => DP::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'nomDP',
                'label_format' => 'DP', 
            ])
            ->add('Evaluateurs', EntityType::class, [
                'class' => Evaluateurs::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'nomEval',
                'label_format' => 'Évaluateur', 
            ])
            ->add('DMM', EntityType::class, [
                'class' => IntervenantANSMDMM::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'DMM',
                'label_format' => 'DMM / Pôle', 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
