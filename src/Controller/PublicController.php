<?php


namespace App\Controller;

use App\Entity\Prestataire;
use App\Form\InternauteType;
use App\Form\PrestataireType;
use App\Repository\PrestataireRepository;
use http\Client\Response;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(PrestataireRepository $repo)
    {
        $prestataires = $repo->lastsPrestataires();
        return $this->render('public/index.html.twig', [
            'prestataires' => $prestataires
        ]);
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

    // Formulaire d'inscription d'un prestataire
    /**
     * @Route("/register", name="register")
     */
    public function register(FormFactoryInterface $factory, Request $request): \Symfony\Component\HttpFoundation\Response
    {
        $form = $this->createForm(PrestataireType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $prestataire = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prestataire);
            $entityManager->flush();

        }

        $formView = $form->createView();

        return $this->render('public/register.html.twig', [
            'formView' => $formView
        ]);
    }

// Fin du formulaire de prestataire

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
    public function create(FormFactoryInterface $factory, Request $request): \Symfony\Component\HttpFoundation\Response
    {
        $form = $this->createForm(InternauteType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $internaute = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($internaute);
            $entityManager->flush();

            return $this->redirectToRoute('confirm');

        }

        $formView = $form->createView();

        return $this->render('public/create.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/confirm", name="confirm")
     */
    public function confirm()
    {
        return $this->render('public/confirm.html.twig');
    }
}