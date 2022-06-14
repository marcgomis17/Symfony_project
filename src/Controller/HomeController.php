<?php

namespace App\Controller;

use App\Repository\ClasseRepository;
use App\Repository\EtudiantRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
    #[Route('/home', name: 'app_dashboard_home_admin')]
    public function homeAdmin(EtudiantRepository $etudRepo, ProfesseurRepository $profRepo, ClasseRepository $classeRepo): Response {
        $currentPage = "Dashboard-home";
        $nbEtudiants = $etudRepo->createQueryBuilder('id')
            ->select('count(id)')
            ->getQuery()
            ->getSingleScalarResult();
        $nbProfs = $profRepo->createQueryBuilder('id')
            ->select('count(id)')
            ->getQuery()
            ->getSingleScalarResult();
        $nbClasses = $classeRepo->createQueryBuilder('id')
            ->select('count(id)')
            ->getQuery()
            ->getSingleScalarResult();
        return $this->render('home/index.html.twig', ['current_page' => $currentPage, 'nbEtudiants' => $nbEtudiants, 'nbProfs' => $nbProfs, 'nbClasses' => $nbClasses]);
    }
}
