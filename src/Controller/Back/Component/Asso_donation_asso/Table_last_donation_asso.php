<?php
/* classe permmetant d'afficher les derniers dons saisi, cela permet à l'utilisateur de vérifier que sa saisie à bien été enregistrée en BDD */

namespace Controller\Back\Component\Asso_donation_asso;

class Table_last_donation_asso
{

    public function render(){

    /* instanciation de la connexion à la BDD */

    $bdd = new \Manager\Connexion();
    $bdd = $bdd->getBdd();

    /* récupéraiton des données via le manager Asso_donation_asso dans un array */

    $data   = (new \Manager\Asso_donation_asso($bdd))->get_last();

    /* définition des éléménts de paramétrage à passer au composant TABLE WITHOUT PAGINATION */

    $link = '/www/Kalaweit/member/get?cli_id=';
    $update = '/www/Kalaweit/Asso_donation_asso/update?don_id=';
    $delete = '/www/Kalaweit/Asso_donation_asso/delete?don_id=';
    $print  = '/www/Kalaweit/receipt/add?don_id=';
    $p_position_status = 6;
    $add = '/www/Kalaweit/Asso_donation_asso/add';

    /* instanciation de l'objet Table_without_pagination en lui passant les elements précedement défini */

    $table_last_donation = (new \Controller\Back\htmlElement\Table_without_pagination("Les derniers dons Association",$data,'Table_last_donation_asso',$link,$update,$delete,$print,$p_position_status,$add))->render();

    /* renvoi de l'objet pour affichage */

    return $table_last_donation;

    }

}
