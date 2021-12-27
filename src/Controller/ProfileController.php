<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function profile()
    {
        return $this->render('profile/profile.html.twig');
    }

    /**
     * @Route("/profile/update", name="profile_update")
     */
    public function update()
    {
        return $this->render('profile/update.html.twig');
    }

    /**
     * @Route("/profile/stage", name="profile_stage")
     */
    public function stage()
    {
        return $this->render('profile/stage.html.twig');
    }
}