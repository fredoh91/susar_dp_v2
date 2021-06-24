<?php

namespace App\MsAccess\Pagination;


/**
 * Description of DatabaseAccess
 *
 * @author Frannou
 */
class MsAccessPaginator {
    private $NbEnreg;
    private $NbParPage;

    function __construct($NbEnreg, $NbParPage) {

        $this->NbEnreg = $NbEnreg;
        $this->NbParPage = $NbParPage;
    }
    /**
     * test
     *
     * @return string
     */
    public function test():string {
        return ("ok je charge la classe de pagination MS Access avec " . $this->NbEnreg . " enregistrements.");
    }

     /**
      * permet de retourner un sous tableau à partir d'un tableau, pour mettre en place une pagination
      *
      * @param array $donnees : tableau représentant les données d'une requête
      * @param integer $page : page a afficher
      * @param integer $NbParPage : nombre d'enregistrement par page à afficher
      * @return array
      */
    public function paginate(array $donnees, int $page, int $NbParPage): array {
        return array_slice($donnees, ($page * $NbParPage), $NbParPage);
    }
    /**
     * retourne le nombre de page pour ce jeu de données
     *
     * @return integer
     */
    public function NbPage():int {
        return floor($this->NbEnreg / $this->NbParPage);
    }
    /**
     * retourne la liste des pages pour afficher dans la vue
     *
     * @param integer $Page numéro de la page a afficher
     * @param integer $NbLiens nombre de lien vers les pages suivantes et précédentes a afficher
     * @return array
     */
    public function ListeNumPage(int $Page, int $NbLiens):array {
        $NbPage = $this->NbPage() ;
        $ListeNumPage = array();
        for ($iCpt = -$NbLiens;$iCpt<=$NbLiens;$iCpt++) {
            if((($Page + $iCpt) <= $NbPage) && (($Page + $iCpt) > 0)) {
                $ListeNumPage[]=($Page + $iCpt) ;
            }
        }
        return $ListeNumPage;
    }
}