<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ACController extends AbstractController
{
    #[Route('/a/c', name: 'app_a_c')]
    public function index(): Response
    {
        return $this->render('ac/index.html.twig', [
            'controller_name' => 'ACController',
        ]);
    }
}
