<?php

/** classe permettant de gérer la liste des dons recus par une cause **/

namespace Controller\Back\Component\Asso_cause;

class Asso_cause_donation
{
    function render(){

        /* instanciation connexion à la bdd */

        $bdd = (new \Manager\Connexion())->getBdd();

        /* définition du nombre de résultat par page des différentes tableaux de dons */

        $p_nb_by_page = 10;
        $page = 1;

        /* instanciation de l'objet p_data -> resultat sous forme d'un array que l'on passera à la classe Table */

        $p_data = (new \Manager\Asso_donation($bdd))->Asso_cause_donation($p_nb_by_page,$page);

        /* définition des paramètres nécessaires à l'instanciation de la classe Table */

        $p_name = "Les dons reçus";
        $p_id = "asso_cause_donation";
        $p_update = "/www/Kalaweit/asso_donation/update?don_id=";
        $p_delete = "/www/Kalaweit/asso_donation/delete?don_id=";
        $p_print = '/www/Kalaweit/receipt/add?don_id=';
        $p_add = "/www/Kalaweit/asso_donation/add";
        $p_position_status = 5;

        /* instanciation de l'objet Table , on retourne le resultat lors de l'appel de la methode rendre() */

        $donation_mnt = (new \Controller\Back\Component\Asso_cause\Donation_current_year())->get();

        $p_data2 = $donation_mnt[0].' €';
        $p_title = 'Dons récoltés cette année';
        $p_icon = 'fa fa-euro';

        $box_donation_mnt = (new \Controller\Back\htmlElement\Box_info($p_data2,$p_title,$p_icon,$p_color = 'bg-aqua'))->render();

        return $box_donation_mnt.(new \Controller\Back\htmlElement\Table($p_name,$p_data,$p_id,$p_update,$p_delete,$p_print,$p_position_status,$p_add,$p_nb_by_page))->render();

    }


}
