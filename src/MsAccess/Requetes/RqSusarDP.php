<?php

namespace App\MsAccess\Requetes;

use App\MsAccess\Database\DatabaseAccess;

//use App\Entity\EmDenom;
//use App\Entity\EmDenomV2;
//use Doctrine\ORM\EntityManagerInterface;
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
        // $this->DbAccess = $DbAccess;
        // dump ($this->DbAccess);
        $this->PdoAccess = $this->DbAccess->getPdoAccess();
    }
    public function test()
    {
        echo "ça marche !!!";
    }
    public function SelectAllSusar(): array
    {
        $query = "SELECT SUSAR_EVAL.idSUSAR_PROD, SUSAR_EVAL.idTemp, SUSAR_EVAL.idTempO, SUSAR_EVAL.dateImporte, SUSAR_EVAL.nomFichierA, SUSAR_EVAL.nomFichierC, SUSAR_EVAL.statutImport, SUSAR_EVAL.priorite, SUSAR_EVAL.DP, SUSAR_EVAL.evaluateurDP, SUSAR_EVAL.evaluateurSUSAR, SUSAR_EVAL.visaEvaluateur, SUSAR_EVAL.dateVisa, SUSAR_EVAL.commentaires, SUSAR_EVAL.HPS, SUSAR_EVAL.France, SUSAR_EVAL.age, SUSAR_EVAL.volontairePremier, SUSAR_EVAL.deces, SUSAR_EVAL.pronostic, SUSAR_EVAL.incapacite, SUSAR_EVAL.anoCong, SUSAR_EVAL.MDS, SUSAR_EVAL.vaccin, SUSAR_EVAL.VolontaireSain, SUSAR_EVAL.COVID19, SUSAR_EVAL.qui, SUSAR_EVAL.provenance, SUSAR_EVAL.plus, SUSAR_EVAL.dateExport, SUSAR_EVAL.cptExport, SUSAR_DP.Vu_DP, SUSAR_DP.MesureAction, SUSAR_DP.TypeMesureAction, SUSAR_DP.Commentaire, SUSAR_DP.Produit, SUSAR_DP.DateEvalDP, SUSAR_DP.UtilisateurEvalDP, SUSAR_EVAL.FollowUp, SUSAR_DP.Effet, SUSAR_EVAL.NumEUDRA_CT, SUSAR_EVAL.NumCas FROM SUSAR_EVAL INNER JOIN SUSAR_DP ON SUSAR_EVAL.idSUSAR_PROD = SUSAR_DP.idSUSAR_PROD WHERE 1=1  ORDER BY SUSAR_EVAL.dateImporte DESC";
        
        $this->pdoStatment = $this->PdoAccess->prepare($query);
        $this->pdoStatment->execute();
        $this->result = $this->pdoStatment->fetchAll();
        return $this->result;

    }
//    public function DBaccess()
//    {
//        $ObjAccess = new DatabaseAccess();
//        $ReqAccess=$ObjAccess->RqOccurrenceEm();
////        foreach ($ReqAccess as $value) {
////            var_dump(utf8_encode($value["produit"]));
////            var_dump($value["Nbr"]);
////        }
////        var_dump($ReqAccess[2]);
//        dump($ReqAccess[2]["produit"]);
////        die();
//        
////        $pdo = DatabaseAccess::getPdoAccess();
////        dump($pdo);
//    }
//    public function ExtractionAccessOccEM()
//    {
//        $ObjAccess = new DatabaseAccess();
////        $ReqAccess=$ObjAccess->RqOccurrenceEm();
//        $ReqAccess=$ObjAccess->RqOccurrenceEmLimit30();
//        dump(count($ReqAccess));
//    }
    public function importBaseEM()
    {   
        
        $listeInsert = array(); 
        $this->effaceEmDenomV2();
        $ObjAccess = new DatabaseAccess();
//        $ReqAccess=$ObjAccess->RqOccurrenceEmLimit30();
        $ReqAccess=$ObjAccess->RqOccurrenceEm();
        foreach($ReqAccess as $row)
        {
            $listeInsert[] = '("'.(str_replace(CHR(13).CHR(10),"",$row['produit'])).'", '.$row['Nbr'].')';
        }  
        $sql = "INSERT INTO em_denom_v2 (denomination, nbr) VALUES ".implode(',', $listeInsert);       
        $stmt = $this->em->getConnection()->prepare(utf8_encode ($sql));
        $stmt->execute([]);
    }
    public function effaceEmDenomV2(): void
    {
        $sql = "TRUNCATE em_denom_v2";       
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute([]);
    }
}
