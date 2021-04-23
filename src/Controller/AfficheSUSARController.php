<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\MsAccess\Requetes\RqSusarDP;
use App\MsAccess\Pagination\MsAccessPaginator;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SusarDPFormType;
class AfficheSUSARController extends AbstractController
{
    // private $resquery;
    /**
     * @Route("/affichesusar/{page<\d+>?1}", name="affiche_susar")
     * @return Response
     */
    public function AffSusar(MsAccessPaginator $paginator, Request $request, $page, RqSusarDP $RqSusarDP): Response
    {
        // $RqSusarDP = new RqSusarDP();
        // if($this->resquery!==null) {
        //     dd($this->resquery);
        // }

        $nbParPage = 30;

        $form = $this->createForm(SusarDPFormType::class);
        // $form = $this->createForm(SusarDPFormType::class,[
        //     'action' => $this->generateUrl("affiche_susar"),
        //     'method' => 'GET'
        // ]);
        $form->handleRequest($request);

        if ($request->isMethod('GET')) {
            dump('c est get');
            $data = $form->getData();
            dump($data);
        }
        if ($request->isMethod('POST')) {
            dump('c est post');
        }
        if ($form->isSubmitted()) {
dump('c est submitted');
            
            if ( $form->isValid()) {

dump('c est valid');
            
            }else {
            dump('c est pas valid');
        }

        }else {
            dump('c est pas submitted');
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // dump("salut");
            dump($data);
            $clauseWhere = $RqSusarDP->getWhere($data);
            $clauseWhereBindParam = $RqSusarDP->getWhereBindParam($data);
            $AllSusarDP = $RqSusarDP->SelectSusar($clauseWhere, $clauseWhereBindParam);
            $page=1;
        } else {
            $AllSusarDP = $RqSusarDP->SelectAllSusar();
        }

        $TabPagi = $paginator->paginate($AllSusarDP, $page, $nbParPage);

        $NbPage = count($AllSusarDP) / $nbParPage;
        // $this->resquery = $AllSusarDP;
        return $this->render('affiche_susar/AffSusar.html.twig', [
            'TabPagi' => $TabPagi,
            'page' => $page,
            'NbPage' => $NbPage,
            'form' => $form->createView(),
        ]);        
    } 





    // /**
    //  * @Route("/affichesusar&page=2", name="affiche_susar")
    //  * @return Response
    //  */
    // public function AffSusar_param(Request $request): Response
    // {
    //     // dump($request->query->get('page'));
    // // $_GET parameters
    // $page = $request->query->get('page'); // in your case name is token

    // // // $_POST parameters
    // // $page = $request->request->get('page');
    //     dd($page);
        
    //     // $RqSusarDP = new RqSusarDP();
    //     // // $paginator->test();
    //     // // $RqSusarDP->test();
    //     // // $page = 2;
    //     // $nbParPage = 30;
    //     // $AllSusarDP = $RqSusarDP->SelectAllSusar();
    //     // // dump(count($AllSusarDP));
    //     // $TabPagi = $paginator->paginate($AllSusarDP, $page, $nbParPage);

    //     // $NbPage = count($AllSusarDP) / $nbParPage;
    //     // dump($NbPage);
    //     // dd(count($TabPagi));
    //     return $this->render('affiche_susar/AffTest.html.twig', [
    //         // 'controller_name' => 'test',
    //         // // 'AllSusarDP' => $AllSusarDP,
    //         // 'TabPagi' => $TabPagi,
    //         'page' => $page,
    //         // 'NbPage' => $NbPage,
    //     ]);       
    // }


}
