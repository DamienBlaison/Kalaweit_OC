<?php

/* class permettande de générer le contenu de table des dons foret par memebre*/

namespace Controller\Back\Component\Member;

class Member_donation_forest
{

    function render(){

        /* initialisation de la connexion a la BDD */

        $bdd = (new \Manager\Connexion())->getBdd();

        /* initialisation des paramètres à passer a la methode gérant les dons par membre de l'objet asso_donation_dulan */

        $p_nb_by_page = 5;
        $page = 1;

        /* creation de l'objet et utilsation de la méthode */

        $p_data = (new \Manager\Asso_donation_forest($bdd))->get_donation_forest_by_member($p_nb_by_page,$page);

        /* initialisation des paramètres nécessaire à la composition de la vue du composant Table */

        $p_name = "Les dons Forets";
        $p_id = "donation_forest_by_member";
        $p_update = "/www/Kalaweit/asso_donation_forest/update?don_id=";
        $p_delete = "/www/Kalaweit/asso_donation_forest/delete?don_id=";
        $p_print = "/www/Kalaweit/receipt/add?don_id=";
        $p_add = "/www/Kalaweit/asso_donation_forest/add?cli_id=".$_GET["cli_id"];
        $p_position_status = 3;
        /* Instanciation et application de le methode render de l'objet Table */

        return (new \Controller\Back\htmlElement\Table($p_name,$p_data,$p_id,$p_update,$p_delete,$p_print,$p_position_status,$p_add,$p_nb_by_page))->render();

    }
}
