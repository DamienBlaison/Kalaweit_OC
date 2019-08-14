<?php
namespace Controller\Back\Component\Asso_cause;

/**
 *
 */
class Donation_current_year {

    function get(){

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        $year = date("Y");

        if(isset($_GET["cau_id"])){ $cau_id = $_GET["cau_id"] ;

        $donation_mnt =  (new \Manager\Asso_donation($bdd))->get_year_sum_by_cause($year,$cau_id);

        return $donation_mnt;

        } ;

    }
}

 ?>
