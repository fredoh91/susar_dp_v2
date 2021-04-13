<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\MsAccess\Requetes\RqSusarDP;
class AfficheSUSARController extends AbstractController
{
    /**
     * @Route("/affiche/s/u/s/a/r", name="affiche_s_u_s_a_r")
     */
    public function index(): Response
    {
        return $this->render('affiche_susar/index.html.twig', [
            'controller_name' => 'AfficheSUSARController',
        ]);
    }
    /**
     * @Route("/affichesusar", name="affiche_susar")
     * @return Response
     */
    public function AffSusar(): Response
    {

        $RqSusarDP = new RqSusarDP();
        // $RqSusarDP->test();
        $AllSusarDP = $RqSusarDP->SelectAllSusar();
        return $this->render('affiche_susar/AffTest.html.twig', [
            'controller_name' => 'test',
            'AllSusarDP' => $AllSusarDP,
        ]);        
    }
}
