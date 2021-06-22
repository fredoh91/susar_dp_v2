<?php

namespace App\MsAccess\Requetes;

use App\MsAccess\Database\DatabaseAccess;
use App\Entity\DP;
use App\Entity\Evaluateurs;
use App\Entity\IntervenantANSMDMM;
use phpDocumentor\Reflection\Types\Null_;
use App\Repository\EvaluateursRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Description of TrtBaseEM
 *
 * @author Frannou
 */
class RqSusarDP {

    private $DbAccess;
    private $PdoAccess;
    private $em;

    function __construct()
    {
        $this->DbAccess = new DatabaseAccess();
        $this->PdoAccess = $this->DbAccess->getPdoAccess();
        // $this->em = $em;
    }
    public function test()
    {
        echo "ça marche !!!";
    }
    public function SelectAllSusar(): array
    {
        // $query = "SELECT SUSAR_EVAL.idSUSAR_PROD, SUSAR_EVAL.idTemp, SUSAR_EVAL.idTempO, SUSAR_EVAL.dateImporte, SUSAR_EVAL.nomFichierA, SUSAR_EVAL.nomFichierC, SUSAR_EVAL.statutImport, SUSAR_EVAL.priorite, SUSAR_EVAL.DP, SUSAR_EVAL.evaluateurDP, SUSAR_EVAL.evaluateurSUSAR, SUSAR_EVAL.visaEvaluateur, SUSAR_EVAL.dateVisa, SUSAR_EVAL.commentaires, SUSAR_EVAL.HPS, SUSAR_EVAL.France, SUSAR_EVAL.age, SUSAR_EVAL.volontairePremier, SUSAR_EVAL.deces, SUSAR_EVAL.pronostic, SUSAR_EVAL.incapacite, SUSAR_EVAL.anoCong, SUSAR_EVAL.MDS, SUSAR_EVAL.vaccin, SUSAR_EVAL.VolontaireSain, SUSAR_EVAL.COVID19, SUSAR_EVAL.qui, SUSAR_EVAL.provenance, SUSAR_EVAL.plus, SUSAR_EVAL.dateExport, SUSAR_EVAL.cptExport, SUSAR_DP.Vu_DP, SUSAR_DP.MesureAction, SUSAR_DP.TypeMesureAction, SUSAR_DP.Commentaire, SUSAR_DP.Produit, SUSAR_DP.DateEvalDP, SUSAR_DP.UtilisateurEvalDP, SUSAR_EVAL.FollowUp, SUSAR_DP.Effet, SUSAR_EVAL.NumEUDRA_CT, SUSAR_EVAL.NumCas FROM SUSAR_EVAL INNER JOIN SUSAR_DP ON SUSAR_EVAL.idSUSAR_PROD = SUSAR_DP.idSUSAR_PROD WHERE 1=1  ORDER BY SUSAR_EVAL.dateImporte DESC";
        $query = "SELECT SUSAR_EVAL.idSUSAR_PROD, SUSAR_EVAL.idTemp, SUSAR_EVAL.idTempO, SUSAR_EVAL.dateImporte, SUSAR_EVAL.nomFichierA, SUSAR_EVAL.nomFichierC, SUSAR_EVAL.statutImport, SUSAR_EVAL.priorite, SUSAR_EVAL.DP, SUSAR_EVAL.evaluateurDP, SUSAR_EVAL.evaluateurSUSAR, SUSAR_EVAL.visaEvaluateur, SUSAR_EVAL.dateVisa, SUSAR_EVAL.commentaires, SUSAR_EVAL.HPS, SUSAR_EVAL.France, SUSAR_EVAL.age, SUSAR_EVAL.volontairePremier, SUSAR_EVAL.deces, SUSAR_EVAL.pronostic, SUSAR_EVAL.incapacite, SUSAR_EVAL.anoCong, SUSAR_EVAL.MDS, SUSAR_EVAL.vaccin, SUSAR_EVAL.VolontaireSain, SUSAR_EVAL.COVID19, SUSAR_EVAL.qui, SUSAR_EVAL.provenance, SUSAR_EVAL.plus, SUSAR_EVAL.dateExport, SUSAR_EVAL.cptExport, SUSAR_DP.Vu_DP, SUSAR_DP.MesureAction, SUSAR_DP.TypeMesureAction, SUSAR_DP.Commentaire, SUSAR_DP.Produit, SUSAR_DP.DateEvalDP, SUSAR_DP.UtilisateurEvalDP, SUSAR_EVAL.FollowUp, SUSAR_DP.Effet, SUSAR_EVAL.NumEUDRA_CT, SUSAR_EVAL.NumCas " . 
                 "FROM SUSAR_EVAL INNER JOIN SUSAR_DP ON SUSAR_EVAL.idSUSAR_PROD = SUSAR_DP.idSUSAR_PROD " .
                 "WHERE 1=1 " . 
                 "ORDER BY SUSAR_EVAL.dateImporte DESC;" ; 

        $this->pdoStatment = $this->PdoAccess->prepare($query);
        $this->pdoStatment->execute();
        $this->result = $this->pdoStatment->fetchAll();
        return $this->result;

    }

    /**
     * Undocumented function
     *
     * @param string $where
     * @param array $param
     * @return array
     */
    public function SelectSusar(string $where, array $bind_param): array
    {
        // $query = "SELECT SUSAR_EVAL.idSUSAR_PROD, SUSAR_EVAL.idTemp, SUSAR_EVAL.idTempO, SUSAR_EVAL.dateImporte, SUSAR_EVAL.nomFichierA, SUSAR_EVAL.nomFichierC, SUSAR_EVAL.statutImport, SUSAR_EVAL.priorite, SUSAR_EVAL.DP, SUSAR_EVAL.evaluateurDP, SUSAR_EVAL.evaluateurSUSAR, SUSAR_EVAL.visaEvaluateur, SUSAR_EVAL.dateVisa, SUSAR_EVAL.commentaires, SUSAR_EVAL.HPS, SUSAR_EVAL.France, SUSAR_EVAL.age, SUSAR_EVAL.volontairePremier, SUSAR_EVAL.deces, SUSAR_EVAL.pronostic, SUSAR_EVAL.incapacite, SUSAR_EVAL.anoCong, SUSAR_EVAL.MDS, SUSAR_EVAL.vaccin, SUSAR_EVAL.VolontaireSain, SUSAR_EVAL.COVID19, SUSAR_EVAL.qui, SUSAR_EVAL.provenance, SUSAR_EVAL.plus, SUSAR_EVAL.dateExport, SUSAR_EVAL.cptExport, SUSAR_DP.Vu_DP, SUSAR_DP.MesureAction, SUSAR_DP.TypeMesureAction, SUSAR_DP.Commentaire, SUSAR_DP.Produit, SUSAR_DP.DateEvalDP, SUSAR_DP.UtilisateurEvalDP, SUSAR_EVAL.FollowUp, SUSAR_DP.Effet, SUSAR_EVAL.NumEUDRA_CT, SUSAR_EVAL.NumCas FROM SUSAR_EVAL INNER JOIN SUSAR_DP ON SUSAR_EVAL.idSUSAR_PROD = SUSAR_DP.idSUSAR_PROD WHERE SUSAR_EVAL.evaluateurDP = ?  ORDER BY SUSAR_EVAL.dateImporte DESC";
        $query = "SELECT SUSAR_EVAL.idSUSAR_PROD, SUSAR_EVAL.idTemp, SUSAR_EVAL.idTempO, SUSAR_EVAL.dateImporte, SUSAR_EVAL.nomFichierA, SUSAR_EVAL.nomFichierC, SUSAR_EVAL.statutImport, SUSAR_EVAL.priorite, SUSAR_EVAL.DP, SUSAR_EVAL.evaluateurDP, SUSAR_EVAL.evaluateurSUSAR, SUSAR_EVAL.visaEvaluateur, SUSAR_EVAL.dateVisa, SUSAR_EVAL.commentaires, SUSAR_EVAL.HPS, SUSAR_EVAL.France, SUSAR_EVAL.age, SUSAR_EVAL.volontairePremier, SUSAR_EVAL.deces, SUSAR_EVAL.pronostic, SUSAR_EVAL.incapacite, SUSAR_EVAL.anoCong, SUSAR_EVAL.MDS, SUSAR_EVAL.vaccin, SUSAR_EVAL.VolontaireSain, SUSAR_EVAL.COVID19, SUSAR_EVAL.qui, SUSAR_EVAL.provenance, SUSAR_EVAL.plus, SUSAR_EVAL.dateExport, SUSAR_EVAL.cptExport, SUSAR_DP.Vu_DP, SUSAR_DP.MesureAction, SUSAR_DP.TypeMesureAction, SUSAR_DP.Commentaire, SUSAR_DP.Produit, SUSAR_DP.DateEvalDP, SUSAR_DP.UtilisateurEvalDP, SUSAR_EVAL.FollowUp, SUSAR_DP.Effet, SUSAR_EVAL.NumEUDRA_CT, SUSAR_EVAL.NumCas " . 
        "FROM SUSAR_EVAL INNER JOIN SUSAR_DP ON SUSAR_EVAL.idSUSAR_PROD = SUSAR_DP.idSUSAR_PROD " .
        "WHERE 1=1 " ;
        if($where !== null){
           $query .=  $where;
        }
        $query .= " ORDER BY SUSAR_EVAL.dateImporte DESC;" ; 

        // dump($query);
        
        $this->pdoStatment = $this->PdoAccess->prepare($query);

        foreach ($bind_param as $key => &$value){

            // dump ($key, $value);
            $this->pdoStatment->bindParam($key, $value);
        }

        // dump($this->pdoStatment);
        $this->pdoStatment->execute();
        $this->result = $this->pdoStatment->fetchAll();
        return $this->result;
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @return string
     */
    public function getWhere(array $data, EntityManagerInterface $em): string {
        $where = "";
        foreach ($data as $key => $value) {
            // if($value!==null) {
            //     $where .= " AND $key = ?";
            // }
            if($key === 'DP' and $value !== null) {
                // dump("bind param : DP");
                // $where[$icpt] = $value->getNomDP();
                // $icpt++;
                $where .= " AND SUSAR_EVAL.DP = ? ";
            }elseif($key === 'Evaluateurs' and $value !== null) {
                // dump("bind param : evalu");
                // $where[$icpt] = $value->getNomEval();
                // $icpt++;
                $where .= " AND SUSAR_EVAL.evaluateurDP = ? ";
            }elseif($key === 'DMM' and $value !== null) {

                // dd($value);
                // dd( $em);
                $whereDMM = '';
                $repo_eval = $em->getRepository(Evaluateurs::class);
                $liste_eval = $repo_eval->findByDMM_id($value->getId());
                // dd($liste_eval);
                foreach ($liste_eval as $k => $v) {
                    // $where .= " AND SUSAR_EVAL.evaluateurDP = ? ";
                    // dd($v->getNomEval());
                    if($whereDMM === '') {
                        $whereDMM .= " SUSAR_EVAL.evaluateurDP = '" . $v->getNomEval() . "'" ;
                    } else {
                        $whereDMM .= " OR SUSAR_EVAL.evaluateurDP = '" . $v->getNomEval() . "'" ;
                    }
                    
                    
                }
                // dd($whereDMM);
                // $repoEval = new EvaluateursRepository();
                // dd($repoEval->findByDMM_id($value->getId()));
                // dd($repoEval->findByDMM_id($value->getId()));
                // dd($value->getNomEval());
                // dump("bind param : DMM");
                // $where[$icpt] = $value->getDMMCourt();
                // $icpt++;
                // $where .= " AND $key = ? ";
                $where .= " AND ($whereDMM) ";
            }else {}
        }
        return $where;
    }
    /**
     * Undocumented function
     *
     * @param array $data
     * @return string
     */
    public function getWhereBindParam(array $data): array {
        $where =  array();
        $icpt = 1;
        foreach ($data as $key => $value) {
            if($key === 'DP' and $value !== null) {
                // dump("bind param : DP");
                $where[$icpt] = $value->getNomDP();
                $icpt++;
            }elseif($key === 'Evaluateurs' and $value !== null) {
                // dump("bind param : evalu");
                $where[$icpt] = $value->getNomEval();
                $icpt++;
            }elseif($key === 'DMM' and $value !== null) {
                // dump("bind param : DMM");
                // $where[$icpt] = $value->getDMMCourt();
                // $icpt++;
            }else {}
        }
        return $where;
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @return string
     */
    public function getWhere_get(array $data, EntityManagerInterface $em): string {
        $where = "";
        foreach ($data as $key => $value) {


            // dump($key, $value);
            // if($value!==null) {
            //     $where .= " AND $key = ?";
            // }
            if($key === 'DP' and $value !== null and $value !== '') {
                // dump("bind param : DP");
                // $where[$icpt] = $value->getNomDP();
                // $icpt++;
                $where .= " AND SUSAR_EVAL.DP = ? ";
            }elseif($key === 'Evaluateurs' and $value !== null and $value !== '') {
                // dump("bind param : evalu");
                // $where[$icpt] = $value->getNomEval();
                // $icpt++;
                $where .= " AND SUSAR_EVAL.evaluateurDP = ? ";
            }elseif($key === 'DMM' and $value !== null and $value !== '') {

                // dd($value);
                // dd( $em);
                $whereDMM = '';
                $repo_eval = $em->getRepository(Evaluateurs::class);
                $liste_eval = $repo_eval->findByDMM_id($value);
                // dd($liste_eval);
                foreach ($liste_eval as $k => $v) {
                    // $where .= " AND SUSAR_EVAL.evaluateurDP = ? ";
                    // dd($v->getNomEval());
                    if($whereDMM === '') {
                        $whereDMM .= " SUSAR_EVAL.evaluateurDP = '" . $v->getNomEval() . "'" ;
                    } else {
                        $whereDMM .= " OR SUSAR_EVAL.evaluateurDP = '" . $v->getNomEval() . "'" ;
                    }
                    
                    
                }
                // dd($whereDMM);
                // $repoEval = new EvaluateursRepository();
                // dd($repoEval->findByDMM_id($value->getId()));
                // dd($repoEval->findByDMM_id($value->getId()));
                // dd($value->getNomEval());
                // dump("bind param : DMM");
                // $where[$icpt] = $value->getDMMCourt();
                // $icpt++;
                // $where .= " AND $key = ? ";
                $where .= " AND ($whereDMM) ";
            }else {}
        }

        // dd();
        return $where;

    }
    /**
     * Undocumented function
     *
     * @param array $data
     * @return string
     */
    public function getWhereBindParam_get(array $data): array {
        $where =  array();
        $icpt = 1;
        foreach ($data as $key => $value) {
            if($key === 'DP' and $value !== null) {
                // dump("bind param : DP");
                $where[$icpt] = $value;
                $icpt++;
            }elseif($key === 'Evaluateurs' and $value !== null) {
                // dump("bind param : evalu");
                $where[$icpt] = $value;
                $icpt++;
            }elseif($key === 'DMM' and $value !== null) {
                // dump("bind param : DMM");
                // $where[$icpt] = $value->getDMMCourt();
                // $icpt++;
            }else {}
        }
        return $where;
    }

 
}
