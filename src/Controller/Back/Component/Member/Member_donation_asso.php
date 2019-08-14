<?php

/* class permettande de générer le contenu de table des dons par memebre*/


namespace Controller\Back\Component\Member;

class Member_donation_asso
{

    function render(){

        /* initialisation de la connexion a la BDD */

        $bdd = (new \Manager\Connexion())->getBdd();

        /* initialisation des paramètres à passer a la methode gérant les dons par membre de l'objet Asso_donation_asso_asso_asso_dulan */

        $p_nb_by_page = 5;
        $page = 1;

        /* creation de l'objet et utilsation de la méthode */

        $p_data = (new \Manager\Asso_donation_asso($bdd))->get_donation_asso_by_member($p_nb_by_page,$page);

        /* initialisation des paramètres nécessaire à la composition de la vue du composant Table */

        $p_name = "Dons Association";
        $p_id = "donation_asso_by_member";
        $p_update = "/www/Kalaweit/Asso_donation_asso/update?don_id=";
        $p_delete = "/www/Kalaweit/Asso_donation_asso/delete?don_id=";
        $p_print = "/www/Kalaweit/receipt/add?don_id=";
        $p_add = "/www/Kalaweit/Asso_donation_asso/add?cli_id=".$_GET["cli_id"];
        $p_position_status = 3;
        /* Instanciation et application de le methode render de l'objet Table */

        return (new \Controller\Back\htmlElement\Table($p_name,$p_data,$p_id,$p_update,$p_delete,$p_print,$p_position_status,$p_add,$p_nb_by_page))->render();

    }
}
