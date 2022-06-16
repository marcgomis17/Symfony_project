<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController {
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(): Response {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }

    #[Route('/demande/add', name: 'app_demande_add')]
    public function addDemande(Request $request, DemandeRepository $demandeRepo) {
        $currentPage = "Ajouter une demande";
        $form = $this->createForm(DemandeType::class, new Demande());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $demande = $form->getData();
            $demandeRepo->add($demande, true);
            return $this->redirectToRoute('app_demande');
        }
        return $this->render('demande/add_demandes.html.twig', ['current_page' => $currentPage, 'form' => $form->createView()]);
    }
}
