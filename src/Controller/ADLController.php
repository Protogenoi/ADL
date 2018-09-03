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
 * Written by michael <michael@adl-crm.uk>, 22/08/2018 14:23
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



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ADLController extends AbstractController
{

    /**
     * @Route("/", name="app_loginPage")
     */

    public function loginPage()
    {
        return $this->render('ADL/loginPage.html.twig', [
            'title' => 'Login'
        ]);
    }

    /**
     * @Route("/Main", name="app_MainPage")
     */

    public function mainPage()
    {
        return $this->render('ADL/mainPage.html.twig', [
            'title' => 'Main'
        ]);
    }

    /**
     * @Route("/ADL/{slug}")
     */

    public function anyPage($slug)
    {
        return $this->render('ADL/mainPage.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }

}