<?php

namespace App\Controller;

use App\Repository\KeyfactsEmailsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class KeyfactsEmailController extends AbstractController
{
    /**
     * @Route("/life/keyfacts/email", name="app_keyfacts_email")
     */
    public function KeyfactsEmails(
        Request $request,
        KeyfactsEmailsRepository $keyfactsEmailsRepository,
        PaginatorInterface $paginator
    ) {

        $option = $request->query->get('option');

        $queryBuilder = $keyfactsEmailsRepository->KeyfactsEmailReport($option);

        $pagination = $paginator->paginate($queryBuilder,
            $request->query->getInt('page', 1), 20);


        return $this->render('keyfacts_email/keyfacts_email.html.twig', [
            'title' => 'Keyfacts Email Report',
            'result' => $pagination,
        ]);
    }
}
