<?php

namespace App\Form;

use App\Entity\Pokemon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('num')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Fuego' => 'fuego',
                    'Agua' => 'agua',
                    'Tierra' => 'tierra',
                    'Planta' => 'planta',
                    'Psíquico' => 'psiquico',
                ],
            ])
            ->add('img');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pokemon::class,
        ]);
    }
}
