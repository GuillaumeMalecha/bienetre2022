<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('admin/admin.html.twig');
    }

    /**
     * @Route("/admin/prestataires", name="prestataires")
     */
    public function prestataires()
    {
        return $this->render('admin/prestataires.html.twig');
    }

    /**
     * @Route("/admin/commentaires", name="commentaires")
     */
    public function commentaires()
    {
        return $this->render('admin/commentaires.html.twig');
    }


    /**
     * @Route("/admin/create", name="user_create")
     */
    public function create(FormFactoryInterface $factory)
    {
        $builder = $factory->createBuilder();

        $builder->add('name')
            ->add('shortDescription')
            ->add('category');

        $form = $builder->getForm();

        $formView = $form->createView();

        return $this->render('admin/create.html.twig', [
            'formView' => $formView
        ]);
    }
}