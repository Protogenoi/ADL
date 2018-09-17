<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AegonPoliciesController extends AbstractController
{
    /**
     * @Route("/aegon/view/policies", name="view_aegon_policies")
     */
    public function viewAegonPolicy()
    {
        return $this->render('aegon_policies/view_aegon_policy.html.twig', [
            'title' => 'View Aegon Policy',
        ]);
    }

    /**
     * @Route("/aegon/edit/policies", name="edit_aegon_policies")
     */
    public function editAegonPolicy()
    {
        return $this->render('aegon_policies/edit_aegon_policy.html.twig', [
            'title' => 'Edit Aegon Policy',
        ]);
    }
}
