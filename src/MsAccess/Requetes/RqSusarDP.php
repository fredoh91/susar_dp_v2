<?php

namespace App\MsAccess\Requetes;

use App\MsAccess\Database\DatabaseAccess;
use App\Entity\DP;
use App\Entity\Evaluateurs;
use App\Entity\IntervenantANSMDMM;
use phpDocumentor\Reflection\Types\Null_;

/**
 * Description of TrtBaseEM
 *
 * @author Frannou
 */
class RqSusarDP {

    private $DbAccess;
    private $PdoAccess;

    function __construct()
    {
        $this->DbAccess = new DatabaseAccess();
        $this->PdoAccess = $this->DbAccess->getPdoAccess();
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

        $this->pdoStatment = $this->PdoAccess->prepare($query);

        foreach ($bind_param as $key => $value){
            $this->pdoStatment->bindParam($key, $value);
        }

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
    public function getWhere(array $data): string {
        $where = "";
        foreach ($data as $key => $value) {
            if($value!==null) {
                $where .= " AND $key = ?";
            }
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
                $where[$icpt] = $value->getNomDP();
            }elseif($key === 'Evaluateurs' and $value !== null) {
                $where[$icpt] = $value->getNomEval();
            }elseif($key === 'DMM' and $value !== null) {
                $where[$icpt] = $value->getDMMCourt();
            }else {}
            $icpt++;
        }
        return $where;
    }
}
