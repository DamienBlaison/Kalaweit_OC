<?php
namespace Controller\Back;

class Dashboard
{

    function get(){

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        $year = date('Y');

        $card4_data = (new \Manager\Asso_donation($bdd))->get_year_sum($year);
        $card5_data = (new \Manager\Asso_donation_dulan($bdd))->get_year_sum($year);
        $card6_data = (new \Manager\Asso_donation_forest($bdd))->get_year_sum($year);

        $card7_data = (new \Manager\Asso_donation_asso($bdd))->get_year_sum($year);
        $card8_data = (new \Manager\Asso_adhesion($bdd))->get_year_sum($year);

        $card4 = (new \Controller\Back\htmlElement\Box_info($card4_data[0].' €', 'Ajouter un nouveau Don Gibbon', 'fa fa-paw'))->render();
        $card5 = (new \Controller\Back\htmlElement\Box_info($card5_data[0].' €', 'Ajouter un nouveau Don Dulan', 'fa fa-map','bg-yellow'))->render();
        $card6 = (new \Controller\Back\htmlElement\Box_info($card6_data[0].' €', 'Ajouter un nouveau Don Foret', 'fa fa-tree','bg-green'))->render();

        $card7 = (new \Controller\Back\htmlElement\Box_info($card7_data[0].' €', 'Ajouter un nouveau Association', 'fa fa-home','bg-purple'))->render();
        $card8 = (new \Controller\Back\htmlElement\Box_info($card8_data[0].' €', 'Ajouter un nouvelle Adhésion', 'fa fa-home','bg-red'))->render();

        $p_render =[


            "card7" => $card7,
            "card8" => $card8,
            "card4" => $card4,
            "card5" => $card5,
            "card6" => $card6,

        ];



        return (new \View\Back\Dashboard\Dashboard)->render($p_render);

    }
}
