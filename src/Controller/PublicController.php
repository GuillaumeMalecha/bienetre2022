<?php


namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function register()
    {
        return $this->render('public/register.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('public/login.html.twig');
    }

    /**
     * @Route("/forgot", name="forgot")
     */
    public function forgot()
    {
        return $this->render('public/forgot.html.twig');
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
}