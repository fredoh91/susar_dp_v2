<?php

namespace App\MsAccess\Pagination;


/**
 * Description of DatabaseAccess
 *
 * @author Frannou
 */
class MsAccessPaginator {
    public function test() {
        echo('ok je charge la classe de pagination MS Access');
    }

     /**
      * permet de retourner un sous tableau à partir d'un tableau, pour mettre en place une pagination
      *
      * @param array $donnees : tableau représentant les données d'une requête
      * @param integer $page : page a afficher
      * @param integer $nbParPage : nombre d'enregistrement par page à afficher
      * @return array
      */
    public function paginate(array $donnees, int $page, int $nbParPage): array {
        return array_slice($donnees, ($page * $nbParPage), $nbParPage);
    }
}