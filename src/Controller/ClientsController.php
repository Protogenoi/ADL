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
use App\Form\AddClientForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{

    /**
     * @Route("/ADL/add/Client", name="app_addClientPage")
     */
    public function addClientsPage()
    {

        die('todo');

        return new Response(sprintf(
            'Client added: Client id is: #%d',
            $client->getID()
        ));

    }

    /**
     * @Route("/ADL/new/Client", name="app_add_client")
     */

    public function addClientForm(Request $request)
    {
        $form = $this->createForm(AddClientForm::class);

        // only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $clientForm = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($clientForm);
            $em->flush();

            $this->addFlash('success', 'Client added!');

            return $this->redirectToRoute('search_clients');

        }

        return $this->render('ADL/addClient.html.twig', [
            'title' => 'Add New Client',
            'NewClientForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ADL/edit/Client/{id}", name="app_edit_client")
     */

    public function editClientForm(Request $request, Clients $clients)
    {

        $CID = $request->query->get('CID');

        $form = $this->createForm(AddClientForm::class, $clients);

        // only handles data on POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $clientForm = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($clientForm);
            $em->flush();

            $this->addFlash('success', 'Client updated!');

            return $this->redirectToRoute('search_clients');

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