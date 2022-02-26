<?php

namespace App\Form;

use App\Entity\CategorieDeServices;
use App\Entity\CategorieServices;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecherchePrestataireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prestataire',TextType::class, [
                'attr' => ['placeholder' => 'Nom du prestataire' ],
                'required'=>false
            ])
            ->add('commune', TextType::class, [
                'attr'=>['placeholder'=>'Commune'],
                'required'=>false
            ])
            ->add('categorie', EntityType::class,[
                'class' => CategorieDeServices::class,
                'choice_label' => 'nom',
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
