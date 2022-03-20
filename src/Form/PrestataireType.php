<?php

namespace App\Form;

use App\Entity\CategorieDeServices;
use App\Entity\Prestataire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
            ->add('email', EmailType::class, [
                'required'=>true,
                'label' => ' ',
                'attr'=>['class' => 'form-control b-r', 'placeholder'=>'Email']
            ])
            ->add('password', PasswordType::class, [
                'invalid_message'=>'Les mots de passe doivent être identiques.',
                'label' => ' ',
                'attr'=>['class' => 'form-control b-r', 'placeholder'=>'Mot de passe']
            ])
            ->add('adresseNumero', NumberType::class, [
                'label' => 'Adresse Postale',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Numéro']
            ])
            ->add('adresseRue', TextType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Rue']
            ])
            ->add('codePostal', NumberType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Code Postal']
            ])
            ->add('localite', TextType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Localité']
            ])
            ->add('commune', TextType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Commune']
            ])
            ->add('categorieDeServices', EntityType::class,[
                'class'=>CategorieDeServices::class,
                'multiple' => true,
                'expanded' => true,
                'required' => false,
            ])


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
