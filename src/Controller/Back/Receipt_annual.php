<?php
/* classe permettant la génaration des recus fiscaux annuel au format PDF */

namespace Controller\Back;

class Receipt_annual

{

    function add(){

        $bdd = (new \Manager\Connexion())->getBdd();

        $receipt_resume = (new \Manager\Receipt($bdd))->resume_donations_year_by_member($_GET["cli_id"]);

        (new \Manager\Receipt_annual($bdd))->add($_GET["cli_id"]);

        //return (new \View\Back\Receipt\Receipt_annual($content))->render();
    }

    function generate(){

        $bdd = (new \Manager\Connexion())->getBdd();

        $ids = (new \Manager\Receipt_annual($bdd))->get_all_ids_to_receipt();

        $count = count($ids);

        $nb_receipt_create = 0;

        (new \Manager\Receipt_annual($bdd))->create_counter($count);

        foreach ($ids as $key => $value) {

            (new \Manager\Receipt_annual($bdd))->add($value["cli_id"]);

            $nb_receipt_create += 1;

            (new \Manager\Receipt_annual($bdd))->maj_counter($nb_receipt_create);

        }

    }


}
