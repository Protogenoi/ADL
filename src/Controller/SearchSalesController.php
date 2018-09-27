<?php

namespace App\Controller;

use App\Repository\PolicyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchSalesController extends AbstractController
{
    /**
     * @Route("/ADL/life/search/sales", name="search_sales")
     */
    public function index(
        PolicyRepository $policyRepository,
        Request $request,
        PaginatorInterface $paginator
    ) {
        $datefrom = $request->query->get('datefrom');
        $dateto = $request->query->get('dateto');

        $queryBuilder
            = $policyRepository->findAllPolicySalesWithSearch($datefrom,
            $dateto);

        $pagination = $paginator->paginate($queryBuilder,
            $request->query->getInt('page', 1), 20);

        return $this->render('search_sales/search_sales.html.twig', [
            'title' => 'Search Sales',
            'policy' => $pagination,
        ]);
    }
}
