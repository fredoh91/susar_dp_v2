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

    // private $AllSusarDP;
    
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
        $page=1;
        $NbParPage=30;
        $NbLigneReq=1000;
        return $this->render('affiche_susar/AffSusar.html.twig', [
            'SusarsDP' => $AllSusarDP,
            'form' => $form->createView(),
            'page' => $page,
            'NbParPage' => $NbParPage,
            'NbLigneReq' => $NbLigneReq,
        ]);        
    } 
    /**
     * @Route("/affichesusartestpagi", name="affiche_susar_testpagi")
     * @return Response
     */
    public function AffSusarTestPagi(Request $request, RqSusarDP $RqSusarDP, EntityManagerInterface $em): Response
    {
        $NbParPage = 30;
        $form = $this->createForm(SusarDPFormType::class);
        // dump($request->query->all());
        $data_get = $request->query->all();
        // dd($data_get);
        // dd($data_get->get('DMM'));
        // var_dump($data_get);
        if (empty($data_get)) {
            //  Pas de paramètre en GET, on retourne tous les SUSARs
            $AllSusarDP = $RqSusarDP->SelectAllSusar();
            $page = 1;
        } else {
            //  Paramètre en GET, on retourne une partie des SUSARs
            // dump("tableau param plein");
            $clauseWhere = $RqSusarDP->getWhere_get($data_get['susar_dp_form'], $em);
// dd("stop");
            $clauseWhereBindParam = $RqSusarDP->getWhereBindParam_get($data_get['susar_dp_form']);
            $AllSusarDP = $RqSusarDP->SelectSusar($clauseWhere, $clauseWhereBindParam);
            
            $page = $request->query->get('page');
            // dump($clauseWhere);
            // dump($clauseWhereBindParam);
        }

        // die();
        // if ($request->query->all() === null) {
        //     dump("c est nul");
        // }
        // $form->handleRequest($request);


// dump($AllSusarDP);
// dd("stop");
        
        // if ($form->isSubmitted() && $form->isValid()) {
        //     dump("submitted");
        //     $data = $form->getData();
        //     dd($data);
        //     $clauseWhere = $RqSusarDP->getWhere($data, $em);
        //     $clauseWhereBindParam = $RqSusarDP->getWhereBindParam($data);

        //     // dump($clauseWhereBindParam);
        //     // dd($clauseWhere);
        //     $AllSusarDP = $RqSusarDP->SelectSusar($clauseWhere, $clauseWhereBindParam);
        //     $this->AllSusarDP = $AllSusarDP;
        // } else {
        //     dump("Pas submitted");
        //     if ($page===null or $page===1) {
        //         dump("premiere page de la liste");
        //         $AllSusarDP = $RqSusarDP->SelectAllSusar();
        //         $this->AllSusarDP = $AllSusarDP;
        //     } else {
        //         dump("page suivante de la liste");
                
        //         $AllSusarDP = $this->AllSusarDP;
        //     }
            
        // }
        // dump($AllSusarDP);
        $NbLigneReq = count($AllSusarDP);
        $AllSusarDP = array_slice($AllSusarDP,$page * $NbParPage,$NbParPage);


        // dd(count($AllSusarDP));
        // dd($AllSusarDP);
        return $this->render('affiche_susar/AffSusar.html.twig', [
            'SusarsDP' => $AllSusarDP,
            'form' => $form->createView(),
            'page' => $page,
            'NbParPage' => $NbParPage,
            'NbLigneReq' => $NbLigneReq,
            'datas_get' => $data_get,
        ]);        
    } 

}
