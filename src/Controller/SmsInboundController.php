<?php

namespace App\Controller;

use App\Repository\SmsInboundRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SmsInboundController extends AbstractController
{
    /**
     * @Route("/sms/inbound", name="app_sms_inbound")
     */
    public function smsInbound(
        Request $request,
        SmsInboundRepository $smsInboundRepository,
        PaginatorInterface $paginator
    ) {

        $option = $request->query->get('option');

        $queryBuilder = $smsInboundRepository->findAllSMSInbound($option);

        $paginator = $paginator->paginate($queryBuilder,
            $request->query->getInt('page', 1), 20);

        return $this->render('sms_inbound/sms_inbound.html.twig', [
            'title' => 'SMS Report',
            'result' => $paginator,
        ]);
    }
}
