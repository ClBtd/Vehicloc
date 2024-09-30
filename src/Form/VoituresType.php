<?php

namespace App\Form;

use App\Entity\Voitures;
use Doctrine\DBAL\Types\BooleanType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class VoituresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('monthly_price', IntegerType::class, [
                'label' => 'Prix par mois',
            ])
            ->add('daily_price', IntegerType::class, [
                'label' => 'Prix par jour',
            ])
            ->add('places', IntegerType::class, [
                'label' => 'Nombre de places',
            ])
            ->add('motor', ChoiceType::class, [
                'label' => 'Boite de vitesse',
                'choices'  => [
                    'Manuelle' => true,
                    'Automatique' => false,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voitures::class,
        ]);
    }
}
