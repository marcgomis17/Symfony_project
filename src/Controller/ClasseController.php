<?php

namespace App\Controller;

use App\Repository\ClasseRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseController extends AbstractController {
    #[Route('/classe', name: 'app_classe')]
    public function index(ClasseRepository $repo, PaginatorInterface $paginator, Request $request): Response {
        $currentPage = "Liste Classes";
        $data = $repo->findAll();
        $classes = $paginator->paginate($data, $request->query->getInt('page', 1), 3);
        $classes->setCustomParameters(['align' => 'right']);
        return $this->render('classe/list_classes.html.twig', ['current_page' => $currentPage, 'classes' => $classes]);
    }
}
