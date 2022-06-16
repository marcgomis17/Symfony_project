<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfesseurType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('nomComplet', TextType::class, ['required' => false])
            /* ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Masculin' => 'm',
                    'Féminin' => 'f'
                ]
            ]) */
            ->add('grade', TextType::class, ['required' => false])
            ->add('classes', EntityType::class, [
                'mapped' => true,
                'class' => Classe::class,
                'choice_label' => 'nom_classe',
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ])
            ->add('modules', EntityType::class, [
                'mapped' => true,
                'class' => Module::class,
                'choice_label' => 'nom_module',
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ])
            ->add('save', SubmitType::class, ['label' => 'Ajouter']);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}
