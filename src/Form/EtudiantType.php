<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Flex\InformationOperation;

class EtudiantType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('nomComplet', TextType::class)
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Masculin' => 'm',
                    'Féminin' => 'f'
                ]
            ])
            ->add('adresse', TextType::class)
            ->add('classe', EntityType::class, [
                'mapped' => true,
                'class' => Classe::class,
                'choice_label' => 'nom_classe',
            ])
            ->add('save', SubmitType::class, ['label' => 'Inscrire']);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
