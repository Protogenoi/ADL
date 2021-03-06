<?php
/**
 * ------------------------------------------------------------------------
 *                               ADL CRM
 * ------------------------------------------------------------------------
 *
 * Copyright © 2018 ADL CRM All rights reserved.
 *
 * Unauthorised copying of this file, via any medium is strictly prohibited.
 * Unauthorised distribution of this file, via any medium is strictly prohibited.
 * Unauthorised modification of this code is strictly prohibited.
 *
 * Proprietary and confidential
 *
 * Written by michael <michael@adl-crm.uk>, 10/09/2018 12:37
 *
 * ADL CRM makes use of the following third party open sourced software/tools:
 *  DataTables - https://github.com/DataTables/DataTables
 *  EasyAutocomplete - https://github.com/pawelczak/EasyAutocomplete
 *  PHPMailer - https://github.com/PHPMailer/PHPMailer
 *  ClockPicker - https://github.com/weareoutman/clockpicker
 *  fpdf17 - http://www.fpdf.org
 *  summernote - https://github.com/summernote/summernote
 *  Font Awesome - https://github.com/FortAwesome/Font-Awesome
 *  Bootstrap - https://github.com/twbs/bootstrap
 *  jQuery UI - https://github.com/jquery/jquery-ui
 *  Google Dev Tools - https://developers.google.com
 *  Twitter API - https://developer.twitter.com
 *  Webshim - https://github.com/aFarkas/webshim/releases/latest
 *
 */

namespace App\Controller;


use App\Entity\Clients;
use App\Entity\User;
use App\Form\AddClientForm;
use App\Form\EditClientForm;
use App\Repository\TimelineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{

    /**
     * @Route("/ADL/new/Client", name="app_add_client")
     */

    public function addClientForm(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(AddClientForm::class);

        // only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var $clientForm
             */
            $clientForm = $form->getData();
            $clientForm->setUser($this->getUser());
            $clientForm->setOwner('Legal and General');
            $em->persist($clientForm);
            $em->flush();

            $CID = $form->getData()->getId();

            //$queryBuilder = $timelineRepository->updateClientTimeline($CID, $option);

            $this->addFlash('success', 'Client added '.$CID.'!');

            return $this->redirectToRoute('app_clientsPage', [
                'CID' => $form->getData()->getId(),
            ]);

        }

        return $this->render('ADL/addClient.html.twig', [
            'title' => 'Add New Client',
            'NewClientForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ADL/edit/Client/{id}", name="app_edit_client")
     */

    public function editClientForm(
        EntityManagerInterface $em,
        Request $request,
        Clients $clients,
    TimelineRepository $timelineRepository
    ) {

        $form = $this->createForm(EditClientForm::class, $clients);

        // only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var  $clientForm */
            $clientForm = $form->getData();
            $em->persist($clientForm);
            $em->flush();

            $option = $request->request->get('option');
            $CID = $form->getData()->getId();

            //$queryBuilder = $timelineRepository->updateClientTimeline($CID, $option);

            $this->addFlash('success', 'Client updated!');

            return $this->redirectToRoute('app_clientsPage', [
                'CID' => $CID,
            ]);

        }

        return $this->render('ADL/editClient.html.twig', [
            'title' => 'Edit Client',
            'NewClientForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ADL/Client", name="app_clientsPage")
     */
    public function clientsPage(EntityManagerInterface $em, Request $request)
    {

        $CID = $request->query->get('CID');

        $repository = $em->getRepository(Clients::class);
        /** @var Clients $client */
        $client = $repository->findOneBy(['id' => $CID]);

        if (!$client) {
            throw $this->createNotFoundException(sprintf('No client found for "%s" found',
                $CID));
        }

        return $this->render('ADL/clientsPage.html.twig', [
            'title' => 'Client',
            'client' => $client,
        ]);
    }

}