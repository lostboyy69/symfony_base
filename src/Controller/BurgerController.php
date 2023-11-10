<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BurgerController extends AbstractController
{
    #[Route('/burger', name: 'app_burger')]
    public function burger():Response
    {
        return $this->render('burger.html.twig');
    }
}