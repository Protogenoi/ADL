<?php

namespace App\Controller;

use App\Repository\ClientsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchClientsController extends AbstractController
{
    /**
     * @Route("/search/clients", name="search_clients")
     */
    public function index(ClientsRepository $repository, Request $request, PaginatorInterface $paginator)
    {

        $q = $request->query->get('q');
        $queryBuilder = $repository->getWithSearchQueryBuilder($q);

        $pagination = $paginator->paginate(
            $queryBuilder, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('search_clients/index.html.twig', [
            'title' => 'Search Clients',
            'pagination' => $pagination,
        ]);
    }
}
