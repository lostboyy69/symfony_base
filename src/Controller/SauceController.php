<?php

namespace App\Controller;

use App\Entity\Sauce;
use App\Repository\SauceRepository;
use App\Form\SauceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class SauceController extends AbstractController
{
    #[Route('/sauce', name: 'app_sauce')]
    public function index(SauceRepository $sauceRepository): Response
    {
        $sauce= $sauceRepository->findAll();
        
        return $this->render('sauce/index.html.twig', [
            'controller_name' => 'SauceController',
            'sauce'=>$sauce
        ]);
    }
    #[Route('/creation', name: 'creation', methods: ['GET', 'POST'])]
public function creation(Request $request, EntityManagerInterface $em): Response
{
    $sauce = new Sauce();
    $form = $this->createForm(SauceType::class, $sauce);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($sauce);
        $em->flush();
 
        $this->addFlash('success', 'Sauce créé!');
        return $this->redirectToRoute('app_sauce');
    }
 
    return $this->render('sauce/ajout_sauce.html.twig', [
        'sauce' => $sauce,
        'form' => $form->createView()
    ]);
}
}
