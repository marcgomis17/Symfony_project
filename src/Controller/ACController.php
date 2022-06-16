<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\ClasseRepository;
use App\Repository\EtudiantRepository;
use App\Service\InformationsGenerator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ACController extends AbstractController {
    #[Route('/ac', name: 'app_ac')]
    public function listEtudiants(EtudiantRepository $repo, ClasseRepository $classeRepo): Response {
        $currentPage = "Liste des inscriptions";
        $etudiants = $repo->findBy([], ['id' => 'desc']);
        foreach ($etudiants as $etudiant) {
            $classe = $etudiant->getClasse();
            $etudiant->setClasse($classeRepo->findBy(['id' => $classe->getId()])[0]);
        }
        return $this->render('inscription/list_etudiants.html.twig', ['current_page' => $currentPage, 'etudiants' => $etudiants]);
    }

    #[Route('/ac/inscription', name: 'app_etudiant_register')]
    public function inscrireEtudiant(Request $request, EtudiantRepository $etudiantRepo, InformationsGenerator $generator, UserPasswordHasherInterface $hasher): Response {
        $currentPage = "Inscription";
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $etudiant->setMatricule($generator->generateMatricule());
            $etudiant->setEmail($generator->generateEmail($etudiant->getNomComplet()));
            $etudiant->setPassword($hasher->hashPassword($etudiant, $generator->generatePassword()));
            $etudiant = $form->getData();
            // dd($etudiant);
            $etudiantRepo->add($etudiant, true);
            return $this->redirectToRoute('app_ac');
        }
        return $this->render('inscription/inscription_etudiant.html.twig', ['current_page' => $currentPage, 'form' => $form->createView()]);
    }
}
