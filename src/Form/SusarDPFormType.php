<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\DP;
use App\Entity\Evaluateurs;
use App\Entity\IntervenantANSMDMM;
use App\Entity\UtilisateurEvalDP;
use App\Entity\TypeMesureAction;
use App\Repository\IntervenantANSMDMMRepository;
use App\Repository\UtilisateurEvalDPRepository;
use App\Repository\TypeMesureActionRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class SusarDPFormType extends AbstractType
{
    private $DMMRepository;
    private $UtilEvalDPRepository;
    private $MesActRepository;
    public function __construct(IntervenantANSMDMMRepository $DMMRepository, UtilisateurEvalDPRepository $UtilEvalDPRepository,TypeMesureActionRepository $MesActRepository)
    {
        $this->DMMRepository = $DMMRepository;
        $this->UtilEvalDPRepository = $UtilEvalDPRepository;
        $this->MesActRepository = $MesActRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DP', EntityType::class, [
                'class' => DP::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'nomDP',
                'label_format' => 'DP : ', 
            ])
            ->add('Evaluateurs', EntityType::class, [
                'class' => Evaluateurs::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'nomEval',
                'label_format' => 'Évaluateur : ',
            ])
            ->add('DMM', EntityType::class, [
                'class' => IntervenantANSMDMM::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'DMM',
                'label_format' => 'DMM / Pôle : ',
                'choices' => $this->DMMRepository->findDMMactif(), 
                
            ])
            ->add('Deces', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Oui' => true,
                    'Non' => false,
                ],
                'label_format' => 'Décès : ',
            ])
            ->add('ProVital', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Oui' => true,
                    'Non' => false,
                ],
                'label_format' => 'Pronostic vital : ',
            ])
            ->add('France', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Oui' => true,
                    'Non' => false,
                ],
                'label_format' => 'France : ',
            ])
            ->add('COVID', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Oui' => true,
                    'Non' => false,
                ],
                'label_format' => 'COVID-19 : ',
            ])
            ->add('VolSain', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Oui - France' => 'oui_france',
                    'Oui - Hors France' => 'oui_hors_france',
                    'Oui - France et Hors France' =>  'oui_france_hors_france',
                    'Non' => 'non',
                ],
                'label_format' => 'Volontaire sain : ',
            ])
            ->add('CIOMS', TextType::class, [
                'label_format' => 'CIOMS (Num. du cas, EUDRACT, produit) : ',
                'required'   => false,
            ])
            ->add('DateRecepDeb', DateType::class, [
                'label_format' => 'Début date de réception : ',
            ])
            ->add('DateRecepFin', DateType::class, [
                'label_format' => 'Fin date de réception : ',
            ])
            ->add('idSusar', TextType::class, [
                'label_format' => 'idSusar : ',
                'required'   => false,
            ])
            ->add('NumEudraCT', TextType::class, [
                'label_format' => 'N° EudraCT : ',
                'required'   => false,
            ])
            ->add('NumCas', TextType::class, [
                'label_format' => 'N° cas : ',
                'required'   => false,
            ])
            ->add('Effet', TextType::class, [
                'label_format' => 'Effet(s) : ',
                'required'   => false,
            ])
            ->add('Comment', TextType::class, [
                'label_format' => 'Commentaire(s) : ',
                'required'   => false,
            ])
            ->add('Prod', TextType::class, [
                'label_format' => 'Produit(s) : ',
                'required'   => false,
            ])
            ->add('Evalue', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Oui' => true,
                    'Non' => false,
                ],
                'label_format' => 'Évalué : ',
            ])
            ->add('FollUp', ChoiceType::class, [
                'choices'  => [
                    '' => 100,
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12,
                    '13' => 13,
                    '14' => 14,
                    '15' => 15,
                    '16' => 16,
                    '17' => 17,
                    '18' => 18,
                    '19' => 19,
                    '20' => 20,
                ],
                'label_format' => 'Follow up : ',
            ])
            ->add('MesAct', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Oui' => true,
                    'Non' => false,
                ],
                'label_format' => 'Mesure/Action : ',
            ])
            ->add('DateEvalDeb', DateType::class, [
                'label_format' => 'Début date d\'évaluation : ',
            ])
            ->add('DateEvalFin', DateType::class, [
                'label_format' => 'Fin date d\'évaluation : ',
            ])
            ->add('UtilEvalDP', EntityType::class, [
                'class' => UtilisateurEvalDP::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'NomUser',
                'label_format' => 'Évaluateur : ',
                'choices' => $this->UtilEvalDPRepository->findUtilEvalDPactif(), 
                
            ])
            ->add('TypMesAct', EntityType::class, [
                'class' => TypeMesureAction::class,
                'empty_data' => '',
                'required' => false,
                'choice_label' => 'LibMesureAction',
                'label_format' => 'Type Mesure/Action : ',
                'choices' => $this->MesActRepository->findMesActactif(), 
                
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
