<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('Hello world!');
    }

    /**
     * @Route("/login")
     */
    public function show()
    {
        return new Response('Future page de login');
    }
}