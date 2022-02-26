<?php

namespace App\Form;

use App\Entity\Internaute;
use App\Entity\Prestataire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeUtilisateur', ChoiceType::class,[
                'choices' =>[
                    'Prestataire'=>Prestataire::class,
                    'Internaute'=>Internaute::class
                ]
            ])
            ->add('email', EmailType::class, [
                'required'=>true,

                'attr'=>['placeholder'=>'Email']
            ])
            ->add('password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'invalid_message'=>'Les mots de passe doivent être identiques.'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
