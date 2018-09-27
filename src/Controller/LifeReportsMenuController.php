<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LifeReportsMenuController extends AbstractController
{
    /**
     * @Route("/ADL/life/reports/menu", name="app_life_reports_menu")
     */
    public function lifeMenuController()
    {
        return $this->render('life_reports_menu/life_reports_menu.html.twig', [
            'title' => 'Reports',
        ]);
    }
}
