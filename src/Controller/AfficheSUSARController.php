<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\MsAccess\Requetes\RqSusarDP;
use App\MsAccess\Pagination\MsAccessPaginator;
// use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\HttpFoundation\Request;
class AfficheSUSARController extends AbstractController
{

    /**
     * @Route("/affichesusar/{page<\d+>?1}", name="affiche_susar")
     * @return Response
     */
    public function AffSusar(MsAccessPaginator $paginator, Request $request, $page): Response
    {
        // dump($request->query->get('page'));
        $RqSusarDP = new RqSusarDP();
        // $paginator->test();
        // $RqSusarDP->test();
        // $page = 2;
        $nbParPage = 30;
        $AllSusarDP = $RqSusarDP->SelectAllSusar();
        // dump(count($AllSusarDP));
        $TabPagi = $paginator->paginate($AllSusarDP, $page, $nbParPage);

        $NbPage = count($AllSusarDP) / $nbParPage;
        dump($NbPage);
        // dd(count($TabPagi));
        return $this->render('affiche_susar/AffTest.html.twig', [
            'controller_name' => 'test',
            // 'AllSusarDP' => $AllSusarDP,
            'TabPagi' => $TabPagi,
            'page' => $page,
            'NbPage' => $NbPage,
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
