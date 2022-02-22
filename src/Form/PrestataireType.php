<?php

namespace App\Form;

use App\Entity\Prestataire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestataireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Nom d\'utilisateur']
            ])
            ->add('siteInternet', UrlType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Lien de votre site internet']
            ])
            ->add('numtel', NumberType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Numéro de Téléphone']
            ])
            ->add('numtva', NumberType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Numéro de TVA']
            ])
            //->add('Internaute')
            //->add('Utilisateur')
            //->add('CategorieDeServices')
            ->add('save', SubmitType::class, [
                'label' => 'Créer mon compte professionnel',
                'attr' => ['class' => 'btn btn-theme full-width']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestataire::class,
        ]);
    }
}
