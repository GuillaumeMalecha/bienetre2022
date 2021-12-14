<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return $this->render('admin/admin.html.twig');
    }

    /**
     * @Route("/admin/prestataires")
     */
    public function prestataires()
    {
        return $this->render('admin/prestataires.html.twig');
    }

    /**
     * @Route("/admin/commentaires")
     */
    public function commentaires()
    {
        return $this->render('admin/commentaires.html.twig');
    }
}