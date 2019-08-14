<?php

/* classe permmetant d'afficher les derniers dons FOREST saisi, cela permet à l'utilisateur de vérifier que sa saisie à bien été enregistrée en BDD */


namespace Controller\Back\Component\Asso_donation_forest;

class Table_last_donation_forest
{

    public function render(){

        /* instanciation de la connexion à la BDD */

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        /* récupéraiton des données via le manager asso_donation_forest dans un array */

        $data   = (new \Manager\Asso_donation_forest($bdd))->get_last();

        /* définition des éléménts de paramétrage à passer au composant TABLE WITHOUT PAGINATION */

        $link = '/www/Kalaweit/member/get?cli_id=';
        $update = '/www/Kalaweit/asso_donation_forest/update?don_id=';
        $delete = '/www/Kalaweit/asso_donation_forest/delete?don_id=';
        $print  = '/www/Kalaweit/receipt/add?don_id=';
        $position_status = 6;
        $add = '/www/Kalaweit/asso_donation_forest/add';

        /* instanciation de l'objet Table_without_pagination en lui passant les elements précedement défini */

        $table_last_donation_forest = (new \Controller\Back\htmlElement\Table_without_pagination("Les derniers dons Foret",$data,'Table_last_donation_forest',$link,$update,$delete,$print,$position_status,$add))->render();

        /* renvoi de l'objet pour affichage */

        return  $table_last_donation_forest;

    }

}
