<?php
/* classe permmetant d'afficher les derniers dons saisi, cela permet à l'utilisateur de vérifier que sa saisie à bien été enregistrée en BDD */

namespace Controller\Back\Component\Asso_donation;

class Table_last_donation
{
    public function render(){

    /* instanciation de la connexion à la BDD */

    $bdd = new \Manager\Connexion();
    $bdd = $bdd->getBdd();

    /* récupéraiton des données via le manager asso_donation dans un array */

    $data   = (new \Manager\Asso_donation($bdd))->get_last();

    /* définition des éléménts de paramétrage à passer au composant TABLE WITHOUT PAGINATION */

    $link = '/www/Kalaweit/member/get?cli_id=';
    $update = '/www/Kalaweit/asso_donation/update?don_id=';
    $delete = '/www/Kalaweit/asso_donation/delete?don_id=';
    $print  = '/www/Kalaweit/receipt/add?don_id=';
    $position_status = 7;
    $add = '/www/Kalaweit/asso_donation/add';

    /* instanciation de l'objet Table_without_pagination en lui passant les elements précedement défini */

    $table_last_donation = (new \Controller\Back\htmlElement\Table_without_pagination("Les derniers dons Animaux",$data,'Table_last_donation',$link,$update,$delete,$print,$position_status,$add))->render();

    /* renvoi de l'objet pour affichage */

    return $table_last_donation;

    }

}
