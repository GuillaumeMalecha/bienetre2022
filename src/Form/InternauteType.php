<?php

namespace App\Form;

use App\Entity\Internaute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InternauteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre nom']
            ])
            ->add('prenom', TextType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre prénom']
            ])
            ->add('newsletter', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => 'Souhaitez-vous vous inscrire à notre Newsletter ?',
                'attr' => ['class' => 'form-control b-r']
            ])
            /*->add('Bloc')
            ->add('Images')
            ->add('Utilisateur')
            ->add('Prestataire')*/
            ->add('save', SubmitType::class, [
                'label' => 'Créer mon compte utilisateur Bien-Être',
                'attr' => ['class' => 'btn btn-theme full-width']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Internaute::class,
        ]);
    }
}
