<?php

/* class permettande de générer le contenu de table des dons par memebre*/


namespace Controller\Back\Component\Member;

class Member_receipt_annual
{

    function render(){

        /* initialisation de la connexion a la BDD */

        $bdd = (new \Manager\Connexion())->getBdd();

        /* initialisation des paramètres à passer a la methode gérant les dons par membre de l'objet asso_donation_dulan */

        $p_nb_by_page = 15;
        $page = 1;

        /* creation de l'objet et utilsation de la méthode */

        $p_data = (new \Manager\Receipt($bdd))->get_receipt_annual_by_member($p_nb_by_page,$page);

        //$check_rf = 0;


        /* initialisation des paramètres nécessaire à la composition de la vue du composant Table */

        $receipt_resume = (new \Manager\Receipt($bdd))->resume_donations_year_by_member($_GET["cli_id"]);

        $p_name = "Recus Fiscaux";
        $p_id = "Receipt_annual";
        $p_update = "";
        $p_delete = "";
        $p_print = "/www/Kalaweit/www/Receipt/";
        $p_add="#";
        $p_position_status = 'NO';


        /* Instanciation et application de le methode render de l'objet Table */

        return (new \Controller\Back\htmlElement\Table($p_name,$p_data,$p_id,$p_update,$p_delete,$p_print,$p_position_status,$p_add,$p_nb_by_page))->render();

    }
}
