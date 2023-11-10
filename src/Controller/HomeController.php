<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil():Response
    {
        return $this->render('accueil.html.twig');
    }
}