<?php


namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(UrlGeneratorInterface $urlGenerator)
    {
        return $this->render('public/index.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('public/about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('public/contact.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(FormFactoryInterface $factory)
    {
        $builder = $factory->createBuilder();

        $builder->add('name', TextType::class, [
            'label' => ' ',
            'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Nom d\'utilisateur']
        ])
            ->add('mail', EmailType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Adresse e-mail']
            ])
            ->add('entreprise', NumberType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Numéro de TVA']
            ])
            ->add('password', PasswordType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Mot de passe']
            ]);

        $form = $builder->getForm();

        $formView = $form->createView();

        return $this->render('public/register.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(FormFactoryInterface $factory)
    {
        $builder = $factory->createBuilder();

        $builder->add('mail', EmailType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre adresse email']
            ])
            ->add('password', PasswordType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre mot de passe']
            ]);

        $form = $builder->getForm();

        $formView = $form->createView();

        return $this->render('public/login.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/forgot", name="forgot")
     */
    public function forgot(FormFactoryInterface $factory)
    {
        $builder = $factory->createBuilder();

        $builder->add('mail', EmailType::class, [
            'label' => ' ',
            'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Adresse e-mail']
        ]);

        $form = $builder->getForm();

        $formView = $form->createView();

        return $this->render('public/forgot.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/construct", name="construct")
     */
    public function construct()
    {
        return $this->render('public/construct.html.twig');
    }

    /**
     * @Route("/prestataire", name="prestataire")
     */
    public function prestataire()
    {
        return $this->render('public/prestataire.html.twig');
    }


    /**
     * @Route("/create", name="create")
     */
    public function create(FormFactoryInterface $factory)
    {
        $builder = $factory->createBuilder();

        $builder->add('name', TextType::class, [
            'label' => ' ',
            'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre nom']
        ])
            ->add('firstname', TextType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre prénom']
            ])
            ->add('mail', EmailType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre adresse email']
            ])
            ->add('password', PasswordType::class, [
                'label' => ' ',
                'attr' => ['class' => 'form-control b-r', 'placeholder' => 'Votre mot de passe']
            ]);

        $form = $builder->getForm();

        $formView = $form->createView();

        return $this->render('public/create.html.twig', [
            'formView' => $formView
        ]);
    }
}