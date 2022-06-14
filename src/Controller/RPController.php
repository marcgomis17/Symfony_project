<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\AddClasseType;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use App\Repository\DemandeRepository;
use App\Repository\ModuleRepository;
use App\Repository\ProfesseurRepository;
use Doctrine\DBAL\Types\TextType;
use Knp\Component\Pager\PaginatorInterface;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RPController extends AbstractController {
    #[Route('/professeur', name: 'app_professeur')]
    public function listProfs(ProfesseurRepository $repo, PaginatorInterface $paginator, Request $request): Response {
        $currentPage = "Liste Professeurs";
        // dd($repo->findBy([], ['id' => 'desc']));
        $data = $repo->findBy([], ['id' => 'desc']);
        $professeurs = $paginator->paginate($data, $request->query->getInt('page', 1), 5);
        $professeurs->setCustomParameters(['align' => 'right']);
        return $this->render('professeur/list_profs.html.twig', ['current_page' => $currentPage, 'professeurs' => $professeurs]);
    }

    #[Route('/professeur/add', name: 'app_professeur_add')]
    public function addProfs(ProfesseurRepository $repo, PaginatorInterface $paginator, Request $request): Response {
        $currentPage = "Ajouter un Professeur";
        return $this->render('professeur/add_prof.html.twig', ['current_page' => $currentPage]);
    }

    #[Route('/classe', name: 'app_classe')]
    public function listClasses(ClasseRepository $repo, PaginatorInterface $paginator, Request $request): Response {
        $currentPage = "Liste Classes";
        $data = $repo->findBy([], ['id' => 'desc']);
        $classes = $paginator->paginate($data, $request->query->getInt('page', 1), 5);
        $classes->setCustomParameters(['align' => 'right']);
        return $this->render('classe/list_classes.html.twig', ['current_page' => $currentPage, 'classes' => $classes]);
    }

    #[Route('/classe/add', name: 'app_classe_add')]
    public function addClasse(): Response {
        $currentPage = "Ajout de classe";
        $classe = new Classe();
        $form = $this->createForm(ClasseType::class, new Classe());
        return $this->renderForm('classe/add_classe.html.twig', ['form' => $form, 'current_page' => $currentPage]);
        // return $this->render('classe/add_classe.html.twig', );
    }

    #[Route('/module', name: 'app_module')]
    public function listModules(ModuleRepository $repo, PaginatorInterface $paginator, Request $request): Response {
        $currentPage = "Liste Modules";
        $data = $repo->findBy([], ['id' => 'desc']);
        $modules = $paginator->paginate($data, $request->query->getInt('page', 1), 5);
        $modules->setCustomParameters(['align' => 'right']);
        return $this->render('module/list_modules.html.twig', ['current_page' => $currentPage, 'modules' => $modules]);
    }

    #[Route('/demande', name: 'app_demande')]
    public function listDemandes(DemandeRepository $repo, PaginatorInterface $paginator, Request $request): Response {
        $currentPage = "Liste Demandes";
        $data = $repo->findBy([], ['id' => 'desc']);
        $demandes = $paginator->paginate($data, $request->query->getInt('page', 1), 5);
        $demandes->setCustomParameters(['align' => 'right']);
        return $this->render('demande/list_demandes.html.twig', ['current_page' => $currentPage, 'demandes' => $demandes]);
    }

    #[Route('/demande/add', name: 'app_demande_add')]
    public function addDemande(): Response {
        $currentPage = "Formuler une demande";
        return $this->render('demande/add_demandes.html.twig', ['current_page' => $currentPage]);
    }
}
