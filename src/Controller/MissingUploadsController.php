<?php

namespace App\Controller;

use App\Repository\ClientsRepository;
use App\Repository\UploadsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MissingUploadsController extends AbstractController
{
    /**
     * @Route("/ADL/life/missing_uploads", name="app_missing_uploads")
     */
    public function missingUploads(
        Request $request,
        ClientsRepository $uploadsrespository,
        PaginatorInterface $paginator
    ) {

        $option = $request->query->get('option');

        $queryBuilder = $uploadsrespository->findAllMissingUploads($option);

        $pagination = $paginator->paginate($queryBuilder,
            $request->query->getInt('page', 1), 20);


        return $this->render('missing_uploads/missing_uploads.html.twig', [
            'title' => 'Missing Uploads',
            'result' => $pagination,
        ]);
    }
}
