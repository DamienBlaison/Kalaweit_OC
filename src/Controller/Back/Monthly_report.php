<?php
/* classe permettant de recuperer le contenu des rapport annuels */
namespace Controller\Back;

class Monthly_report
{

    function get_list(){

        ////////////////////////////////////////////////////////////

        //         recuperation des param de la liste             //

        ////////////////////////////////////////////////////////////

        $bdd = (new \Manager\Connexion)->getBdd();

        
        if(isset($_GET['y'])){$year = $_GET['y']; } else { $year = date('Y');}
        if(isset($_GET['m'])){$month = $_GET['m']; } else { $mont = date('m');}


        $p_name         = 'y';
        $p_option       = (new \Manager\Year)->getAll() ;
        $p_selected     = $_GET['y'];
        $p_fontawesome  ='fa fa-calendar';
        $p_return       ='config';

        $card1 = (new \Controller\Back\htmlElement\Box_info('Synthèse des dons enregistrés', $month.' / '.$year, 'fa fa-euro'))->render();

        $datas =[

        $data1 = (new \Manager\Asso_adhesion($bdd))->get_chart_data_sum_month($year,$month),
        $data2 = (new \Manager\Asso_donation_asso($bdd))->get_chart_data_sum_month($year,$month),
        $data3 = (new \Manager\Asso_donation($bdd))->get_chart_data_sum_month($year,$month),
        $data4 = (new \Manager\Asso_donation_dulan($bdd))->get_chart_data_sum_month($year,$month),
        $data5 = (new \Manager\Asso_donation_forest($bdd))->get_chart_data_sum_month($year,$month),
    ];

        $chart = (new \View\Back\Monthly_report\Component\Donation_one_shot)->render('resume_month','',$datas,6);

        $table = (new \View\Back\Monthly_report\Component\Donation_one_shot_table)->render('donation_synthes','Synthèse',$datas);

        $data = [
            //"list" => $list,
            "card1" => $card1,
            "chart" => $chart,
            "table" => $table

        ];

        return (new \View\Back\Monthly_report\Monthly_report)->render($data);

    }
}
 ?>
