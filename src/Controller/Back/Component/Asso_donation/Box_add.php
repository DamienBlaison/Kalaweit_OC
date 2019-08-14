<?php

/** classe permettant de creer un don et de l'injecter en bdd **/

namespace Controller\Back\Component\Asso_donation;

class Box_add

{
    public function render(){

        /* instanciation connexion à la bdd */

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        /* initialisation de la variable $cli_id */

        if( isset($_GET["cli_id"] ) ){ $cli_id = $_GET["cli_id"]; } else { $cli_id ='';}

        /* creation des composant html */

        $payment_type = (new \Manager\Asso_payment_type)->getAll($bdd);
        $cli = (new \Manager\Member($bdd))->get_select();
        $cau = (new \Manager\Asso_cause($bdd))->get_select();
        $status = (new \Manager\Status)->getAll($bdd);

        $donation_mnt = (new \Controller\Back\htmlElement\Form_group_input('donation_mnt','montant du don','','fa fa-euro'));
        $devise  = (new \Controller\Back\htmlElement\Form_group_select('ptyp_id',$payment_type,'','fa fa-internet-explorer',"ptyp_code"));
        $donator = (new \Controller\Back\htmlElement\Form_group_select('cli_id',$cli,$cli_id,'fa fa-user',"cli_identity" ));
        $status =  (new \Controller\Back\htmlElement\Form_group_select('don_status',$status,"",'fa fa-check',"config" ));
        $cause     = (new \Controller\Back\htmlElement\Form_group_select('cau_id',$cau,"",'fa fa-paw',"cau_name" ));
        $look_member = (new \Controller\Back\htmlElement\Form_group_input_span('search_member','fa fa-search'));
        $look_cause = (new \Controller\Back\htmlElement\Form_group_input_span('search_cause','fa fa-search'));

        $submit  = '';
        $submit .=                      '<div class="form-group">';
        $submit .=                          '<button id="submit" type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i></button>';
        $submit .=                      '</div>';

        /* tableau des différentes composants à passer à la vue */

        $box_donation_content = [
            $donator->render(),
            $look_member->render(),
            $cause->render(),
            $look_cause->render(),
            $donation_mnt->render(),
            $devise->render(),
            $status->render(),
            $submit
        ];

        /* mise en forme des éléments à passer */

        $col_md = [11,1,11,1,12,12,12,12];

        /* instanciation des composants BOX dans lequels les details des dons seront affichés */

        $box_donation = (new \Controller\Back\htmlElement\Box('Ajouter un don','box-primary',$box_donation_content,$col_md))->render();

        $box_last_donation = (new \Controller\Back\Component\Asso_donation\Table_last_donation)->render();


        /* passage des composants de la vue */

        $param = [
            "box_donation"=> $box_donation,
            "last_donation" => $box_last_donation

        ];

        return (new \View\Back\Asso_donation\Asso_donation)->render_add($param);
    }
}
