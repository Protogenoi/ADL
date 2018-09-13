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
use App\Repository\AegonPolicyRepository;
use App\Repository\PolicyRepository;
use App\Repository\TimelineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{

    /**
     * @Route("/add/Client", name="app_addClientPage")
     */
    public function addClientsPage(EntityManagerInterface $em)
    {

        die('todo');

        return new Response(sprintf(
            'Client added: Client id is: #%d',
            $client->getID()
        ));

    }

    /**
     * @Route("/Client{slug}", name="app_clientsPage")
     */
    public function clientsPage($slug, EntityManagerInterface $em, Request $request, AegonPolicyRepository $aegonRepo, PolicyRepository $policyRepo, TimelineRepository $timelineRepository)
    {

        $CID = $request->query->get('CID');

        $policies = $aegonRepo->findAllWithSearch($CID);

        $Allpolicies = $policyRepo->findAllPolicyWithSearch($CID);

        $repository = $em->getRepository(Clients::class);
        /** @var Clients $client */
        $client = $repository->findOneBy(['id' => $slug]);

        if (!$client) {
            throw $this->createNotFoundException(sprintf('No client found for "%s" found',
                $slug));
        }

        return $this->render('ADL/clientsPage.html.twig', [
            'title' => 'Client',
            'client' => $client,
            'policies' => $policies,
            'allpolicies' => $Allpolicies,
        ]);
    }

}