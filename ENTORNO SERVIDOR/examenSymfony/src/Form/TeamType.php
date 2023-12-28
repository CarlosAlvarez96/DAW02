<?php

namespace App\Form;

use App\Entity\Pokedex;
use App\Entity\Pokemon;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;



class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Pokedex', EntityType::class, [
                'class' => Pokedex::class,
                'choice_label' => 'id',
            ])
            ->add('Pokemon', EntityType::class, [
                'class' => Pokemon::class,
                'choice_label' => 'name',
                'multiple' => true,
                'attr' => [
                    'data-max-options' => 6,
                ],
                'constraints' => [
                    new Count([
                        'max' => 6,
                        'maxMessage' => 'You can select up to {{ limit }} Pokemon.',
                        'min' => 1,
                        'minMessage' => 'You must select at least {{ limit }} Pokemon.',
                    ]),
                    new NotBlank([
                        'message' => 'Please select at least one Pokemon.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
