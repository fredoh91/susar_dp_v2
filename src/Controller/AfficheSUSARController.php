<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\MsAccess\Requetes\RqSusarDP;
use App\MsAccess\Pagination\MsAccessPaginator;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SusarDPFormType;
use Doctrine\ORM\EntityManagerInterface;
class AfficheSUSARController extends AbstractController
{
    /**
     * @Route("/affichesusar_old/{page<\d+>?1}", name="affiche_susar_old")
     * @return Response
     */

    // private $AllSusarDP;
    
    public function AffSusar_old(Request $request, RqSusarDP $RqSusarDP, EntityManagerInterface $em): Response
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
     * @Route("/affichesusar", name="affiche_susar")
     * @return Response
     */
    public function AffSusar(Request $request, RqSusarDP $RqSusarDP, EntityManagerInterface $em): Response
    {
        $NbParPage = 30;
        $form = $this->createForm(SusarDPFormType::class);
        // dump($request->query->all());
        $data_get = $request->query->all();
        // $param_get = $this->FormatParamGet($data_get['susar_dp_form']);

        // dd($param_get);
        // dd($data_get);
        // dd($data_get->get('DMM'));
        // var_dump($data_get);
        if (empty($data_get)) {
            //  Pas de paramètre en GET, on retourne tous les SUSARs
            $AllSusarDP = $RqSusarDP->SelectAllSusar();
            $page = 1;
            $param_get = "";
        } else {
            $param_get = $this->FormatParamGet($data_get['susar_dp_form']);
            //  Paramètre en GET, on retourne une partie des SUSARs
            // dump("tableau param plein");
            $clauseWhere = $RqSusarDP->getWhere_get($data_get['susar_dp_form'], $em);

            $clauseWhereBindParam = $RqSusarDP->getWhereBindParam_get($data_get['susar_dp_form']);
            $AllSusarDP = $RqSusarDP->SelectSusar($clauseWhere, $clauseWhereBindParam);
            
            // $page = $request->query->get('page');
            if (isset($request->query->get('susar_dp_form')['page'])) {
                $page = $request->query->get('susar_dp_form')['page'];
            } else {
                $page = 1;
            }

        }

        $NbLigneReq = count($AllSusarDP);
        $AllSusarDP = array_slice($AllSusarDP,$page * $NbParPage,$NbParPage);
        $pagi = new MsAccessPaginator($NbLigneReq, $NbParPage);
        $ListeNumPage = $pagi->ListeNumPage($page, 3);

        return $this->render('affiche_susar/AffSusar.html.twig', [
            'SusarsDP' => $AllSusarDP,
            'form' => $form->createView(),
            'page' => $page,
            'NbParPage' => $NbParPage,
            'NbLigneReq' => $NbLigneReq,
            'param_get' => $param_get,
            'ListeNumPage' => $ListeNumPage,
        ]);        
    } 

    public function FormatParamGet($param_get):string {
        $param = '';
        // dd($param_get);
        foreach ($param_get  as $key => $value) {
            // dump($key,$value);

            if ($key === 'DateRecepDeb' or $key === 'DateRecepFin' or $key === 'DateEvalDeb' or $key === 'DateEvalFin') {
                
            } else {
                $value_format = ($value === '') ? '' : $value;
                if($param === '') {
                    $param = '?susar_dp_form%5B'.$key.'%5D='.$value_format;
                } else {
                    $param .= '&susar_dp_form%5B'.$key.'%5D='.$value_format;;
                }
            }
        }
        // dd($param);
        return $param;
    }

}
