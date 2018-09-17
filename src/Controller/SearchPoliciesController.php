<?php

namespace App\Controller;

use App\Repository\PolicyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchPoliciesController extends AbstractController
{
    /**
     * @Route("/search/policies", name="search_policies")
     */
    public function search_policies(
        PolicyRepository $policyRepository,
        Request $request,
        PaginatorInterface $paginator
    ) {

        $q = $request->query->get('q');
        $queryBuilder = $policyRepository->findAllPolicyWithSearch($q);

        $pagination = $paginator->paginate($queryBuilder,
            $request->query->getInt('page', 1), 5);

        return $this->render('search_policies/search_policies.html.twig', [
            'title' => 'Search Policies',
            'policy' => $pagination,
        ]);
    }
}
