<?php

namespace App\Controller;

use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'app_commentaire')]
    public function index(CommentaireRepository $commentaireRepository): Response
    {
        $commentaire= $commentaireRepository->findAll();
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
            'commentaire' => $commentaire
        ]);
    }
}
