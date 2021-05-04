<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\MsAccess\Requetes\RqSusarDP;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SusarDPFormType;
use Doctrine\ORM\EntityManagerInterface;
class AfficheSUSARController extends AbstractController
{
    /**
     * @Route("/affichesusar/{page<\d+>?1}", name="affiche_susar")
     * @return Response
     */
    public function AffSusar(Request $request, RqSusarDP $RqSusarDP, EntityManagerInterface $em): Response
    {

        $form = $this->createForm(SusarDPFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $clauseWhere = $RqSusarDP->getWhere($data, $em);
            $clauseWhereBindParam = $RqSusarDP->getWhereBindParam($data);

            // dd($clauseWhere);
            // dump($clauseWhereBindParam);
            $AllSusarDP = $RqSusarDP->SelectSusar($clauseWhere, $clauseWhereBindParam);
        } else {
            $AllSusarDP = $RqSusarDP->SelectAllSusar();
        }
       
        return $this->render('affiche_susar/AffSusar.html.twig', [
            'SusarsDP' => $AllSusarDP,
            'form' => $form->createView(),
        ]);        
    } 

}
