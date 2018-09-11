<?php

namespace App\Controller;

use App\Repository\ClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchClientsController extends AbstractController
{
    /**
     * @Route("/search/clients", name="search_clients")
     */
    public function index(ClientsRepository $repository)
    {
        $clients = $repository->findBy([],['addedDate' => 'DESC']);

        return $this->render('search_clients/index.html.twig', [
            'title' => 'Search Clients',
            'clients' => $clients,
        ]);
    }
}
