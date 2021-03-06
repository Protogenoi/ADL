<?php

namespace App\Controller;

use App\Entity\Policy;
use App\Form\AddAegonPolicyForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AegonPoliciesController extends AbstractController
{
    /**
     * @Route("/aegon/view/policies", name="view_aegon_policies")
     */
    public function viewAegonPolicy(
        Request $request,
        EntityManagerInterface $entityManager
    ) {

        $CID = $request->query->get('CID');
        $PID = $request->query->get('PID');

        $repository = $entityManager->getRepository(Policy::class);
        /** @var  policy */
        $policy = $repository->findOneBy(['id' => $PID, 'client' => $CID]);

        if (!$policy) {
            throw $this->createNotFoundException(sprintf('No policy found for CID:"%s" with PID:%s" found',
                $CID, $PID));
        }

        return $this->render('aegon_policies/view_aegon_policy.html.twig', [
            'title' => 'View Aegon Policy',
            'CID' => $CID,
            'PID' => $PID,
            'policy' => $policy,
        ]);
    }

    /**
     * @Route("/ADL/life/aegon/edit/policies", name="edit_aegon_policies")
     */
    public function editAegonPolicy(
        Request $request,
        EntityManagerInterface $entityManager
    )
    {

        $CID = $request->query->get('CID');
        $PID = $request->query->get('PID');

        $repository = $entityManager->getRepository(Policy::class);
        /** @var  policy */
        $policy = $repository->findOneBy(['id' => $PID, 'client' => $CID]);

        if (!$policy) {
            throw $this->createNotFoundException(sprintf('No policy found for CID:"%s" with PID:%s" found',
                $CID, $PID));
        }

        return $this->render('aegon_policies/edit_aegon_policy.html.twig', [
            'title' => 'Edit Aegon Policy',
            'CID' => $CID,
            'PID' => $PID,
            'policy' => $policy,
        ]);
    }

    /**
     * @Route("/ADL/life/aegon/add/", name="app_addAegonPolicy")
     */

    public function addAegonPolicy(EntityManagerInterface $em, Request $request)
    {

        $form = $this->createForm(AddAegonPolicyForm::class);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var $aegonForm
             */
            $aegonForm = $form->getData();
            $aegonForm->setUser($this->getUser());
            $aegonForm->setOwner('Legal and General');
            $em->persist($aegonForm);
            $em->flush();

            $this->addFlash('success', 'Client added!');

            return $this->redirectToRoute('app_clientsPage', [
                'CID' => $form->getData()->getId(),
            ]);

        }

        return $this->render('ADL/addClient.html.twig', [
            'title' => 'Add Aegon Policy',
            'NewAegonPolicy' => $form->createView(),
        ]);
    }

}
