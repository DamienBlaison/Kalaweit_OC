<?php
/* classe permettant de recuperer le contenu des rapport annuels */
namespace Controller\Back;

class Annual_report
{

    function get_list(){

        ////////////////////////////////////////////////////////////

        //         recuperation des param de la liste             //

        ////////////////////////////////////////////////////////////

        $bdd = (new \Manager\Connexion)->getBdd();

        if(isset($_GET['y'])){$year = $_GET['y']; } else { $year = date('Y');}

        $p_name         = 'y';
        $p_option       = (new \Manager\Year)->getAll() ;
        $p_selected     = $_GET['y'];
        $p_fontawesome  ='fa fa-calendar';
        $p_return       ='config';

        ////////////////////////////////////////////////////////////

        //         recuperation donnees des cards            //

        ////////////////////////////////////////////////////////////

        $card1_data = (new \Manager\Asso_donation($bdd))->get_year_count($year);
        $card2_data = (new \Manager\Asso_donation_dulan($bdd))->get_year_count($year);
        $card3_data = (new \Manager\Asso_donation_forest($bdd))->get_year_count($year);

        $card7_data = (new \Manager\Asso_donation_asso($bdd))->get_year_count($year);
        $card8_data = (new \Manager\Asso_adhesion($bdd))->get_year_count($year);

        $card4_data = (new \Manager\Asso_donation($bdd))->get_year_sum($year);
        $card5_data = (new \Manager\Asso_donation_dulan($bdd))->get_year_sum($year);
        $card6_data = (new \Manager\Asso_donation_forest($bdd))->get_year_sum($year);

        $card9_data = (new \Manager\Asso_donation_asso($bdd))->get_year_sum($year);
        $card10_data = (new \Manager\Asso_adhesion($bdd))->get_year_sum($year);

        ////////////////////////////////////////////////////////////

        //         recuperation donnees des graphiques            //

        ////////////////////////////////////////////////////////////

        $data1 = (new \Manager\Asso_donation($bdd))->get_chart_data_count($year);
        $data2 = (new \Manager\Asso_donation_dulan($bdd))->get_chart_data_count($year);
        $data3 = (new \Manager\Asso_donation_forest($bdd))->get_chart_data_count($year);

        $data7 = (new \Manager\Asso_donation_asso($bdd))->get_chart_data_count($year);
        $data8 = (new \Manager\Asso_adhesion($bdd))->get_chart_data_count($year);

        $data4 = (new \Manager\Asso_donation($bdd))->get_chart_data_sum($year);
        $data5 = (new \Manager\Asso_donation_dulan($bdd))->get_chart_data_sum($year);
        $data6 = (new \Manager\Asso_donation_forest($bdd))->get_chart_data_sum($year);

        $data9 = (new \Manager\Asso_donation_asso($bdd))->get_chart_data_sum($year);
        $data10 = (new \Manager\Asso_adhesion($bdd))->get_chart_data_sum($year);



        ////////////////////////////////////////////////////////////

        //         recuperation donnees des tables count          //

        ////////////////////////////////////////////////////////////

        $data_resume1 = (new \Manager\Asso_donation($bdd))->get_resume_data_count($year);
        array_unshift($data_resume1,"Animaux");

        $data_resume2= (new \Manager\Asso_donation_dulan($bdd))->get_resume_data_count($year);
        array_unshift($data_resume2,"Dulan");

        $data_resume3= (new \Manager\Asso_donation_forest($bdd))->get_resume_data_count($year);
        array_unshift($data_resume3,"Forêt");

        $data_resume7= (new \Manager\Asso_donation_asso($bdd))->get_resume_data_count($year);
        array_unshift($data_resume7,"Association");

        $data_resume8= (new \Manager\Asso_adhesion($bdd))->get_resume_data_count($year);
        array_unshift($data_resume8,"Adhésion");

        ////////////////////////////////////////////////////////////

        //         recuperation donnees des tables Sum            //

        ////////////////////////////////////////////////////////////

        $data_resume4 = (new \Manager\Asso_donation($bdd))->get_resume_data_sum($year);
        array_unshift($data_resume4,"Animaux");

        $data_resume5= (new \Manager\Asso_donation_dulan($bdd))->get_resume_data_sum($year);
        array_unshift($data_resume5,"Dulan");

        $data_resume6= (new \Manager\Asso_donation_forest($bdd))->get_resume_data_sum($year);
        array_unshift($data_resume6,"Forêt");

        $data_resume9= (new \Manager\Asso_donation_asso($bdd))->get_resume_data_sum($year);
        array_unshift($data_resume9,"Association");

        $data_resume10= (new \Manager\Asso_adhesion($bdd))->get_resume_data_sum($year);
        array_unshift($data_resume10,"Adhésion");

        ////////////////////////////////////////////////////////////

        //         Instanciation des vues des graphiques          //

        ////////////////////////////////////////////////////////////

        $card1 = (new \Controller\Back\htmlElement\Box_info($card1_data[0], 'Dons Animaux', 'fa fa-paw'))->render();
        $card2 = (new \Controller\Back\htmlElement\Box_info($card2_data[0], 'Dons Dulan', 'fa fa-map','bg-yellow'))->render();
        $card3 = (new \Controller\Back\htmlElement\Box_info($card3_data[0], 'Dons Foret', 'fa fa-tree','bg-green'))->render();
        $card4 = (new \Controller\Back\htmlElement\Box_info($card4_data[0].' €', 'Dons animaux', 'fa fa-paw'))->render();
        $card5 = (new \Controller\Back\htmlElement\Box_info($card5_data[0].' €', 'Dons Dulan', 'fa fa-map','bg-yellow'))->render();
        $card6 = (new \Controller\Back\htmlElement\Box_info($card6_data[0].' €', 'Dons Foret', 'fa fa-tree','bg-green'))->render();
        $card7 = (new \Controller\Back\htmlElement\Box_info($card7_data[0], 'Dons Association', 'fa fa-home','bg-purple'))->render();
        $card8 = (new \Controller\Back\htmlElement\Box_info($card8_data[0], 'Adhésions', 'fa fa-home','bg-red'))->render();
        $card9 = (new \Controller\Back\htmlElement\Box_info($card9_data[0].' €', 'Dons Association', 'fa fa-home','bg-purple'))->render();
        $card10 = (new \Controller\Back\htmlElement\Box_info($card10_data[0].' €', 'Adhésions', 'fa fa-home','bg-red'))->render();

        $chart1 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_animal_count','Nombre de dons animaux',$data1,4);
        $chart2 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_dulan_count','Nombre de dons dulan',$data2,4);
        $chart3 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_foret_count','Nombre de dons forêt',$data3,4);

        $chart4 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_animal_sum','Somme récoltée dons animaux',$data4,4);
        $chart5 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_dulan_sum','Somme récoltée dons dulan',$data5,4);
        $chart6 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_foret_sum','Somme récoltée dons forêt',$data6,4);

        $chart7 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_association_count','Nombre de dons Association',$data7,6);
        $chart8 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('adhesion_one_shot_count','Nombre d\'adhésions',$data8,6);

        $chart9 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('donation_one_shot_association_sum','Somme récoltée dons Association',$data9,6);
        $chart10 = (new \View\Back\Annual_report\Component\Donation_one_shot)->render('adhesion_one_shot_sum','Somme récoltée adhésions',$data10,6);


        $table1 = (new \View\Back\Annual_report\Component\Donation_one_shot_table)->render('donation_one_shot_animal_table','Synthèse nombre de dons',[$data_resume1,$data_resume2,$data_resume3,$data_resume7,$data_resume8]);
        $table2 = (new \View\Back\Annual_report\Component\Donation_one_shot_table)->render('donation_one_shot_animal_table','Synthèse montant des dons',[$data_resume4,$data_resume5,$data_resume6,$data_resume9, $data_resume10]);

        $list = (new \Controller\Back\htmlElement\Form_group_select($p_name,$p_option,$p_selected,$p_fontawesome,$p_return))->render();

        $data = [
            "list" => $list,
            "card1" => $card1,
            "card2" => $card2,
            "card3" => $card3,
            "card4" => $card4,
            "card5" => $card5,
            "card6" => $card6,
            "card7" => $card7,
            "card8" => $card8,
            "card9" => $card9,
            "card10" => $card10,
            "chart1" => $chart1,
            "chart2" => $chart2,
            "chart3" => $chart3,
            "chart4" => $chart4,
            "chart5" => $chart5,
            "chart6" => $chart6,
            "chart7" => $chart7,
            "chart8" => $chart8,
            "chart9" => $chart9,
            "chart10" => $chart10,
            "table1" => $table1,
            "table2" => $table2
        ];

        return (new \View\Back\Annual_report\Annual_report)->render($data);

    }
}
 ?>
