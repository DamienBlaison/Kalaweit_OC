<?php

/** classe permettant de mettre à jour un don effectué **/

namespace Controller\Back\Component\Asso_donation_asso;

class Asso_donation_asso
{
    public function update(){

        /* instanciation connexion à la bdd */

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        /* vérification des informations dans la super variable POST pour MAJ des données en BDD*/
        
        if(isset($_POST["cli_id"])) {

            (new \Manager\Asso_donation_asso($bdd))->update();

        }

        /* affichage des données , renvoi un arrray */

        $donation = (new \Manager\Asso_donation_asso($bdd))->get();

        /* creation des composant html */

        $payment_type = (new \Manager\Asso_payment_type)->getAll($bdd);
        $cli = (new \Manager\Member($bdd))->get_select();
        $status_config = (new \Manager\Status)->getAll($bdd);

        $don_mnt = (new \Controller\Back\htmlElement\Form_group_input('don_mnt','montant du don',$donation["don_mnt"],'fa fa-euro'));
        $devise  = (new \Controller\Back\htmlElement\Form_group_select('ptyp_id',$payment_type,$donation["ptyp_id"],'fa fa-internet-explorer',"ptyp_code"));
        $donator = (new \Controller\Back\htmlElement\Form_group_select('cli_id',$cli,$donation["cli_id"],'fa fa-user',"cli_identity" ));
        $status =  (new \Controller\Back\htmlElement\Form_group_select('don_status',$status_config,$donation["don_status"],'fa fa-check',"config" ));
        $look = (new \Controller\Back\htmlElement\Form_group_input_span('search_member','fa fa-search'));


        $button  = '';
        $button .=                      '<div class="form-group">';
        $button .=                          '<!--<label style="color:white;" for="submit"> test</label>-->';
        $button .=                          '<button id="submit" type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i></button>';
        $button .=                      '</div>';

        /* tableau des différentes composants à passer à la vue */

        $box_donation_content = [
            $donator->render(),
            $look->render(),
            $don_mnt->render(),
            $devise->render(),
            $status->render(),
            $button
        ];

        /* mise en forme des éléments à passer */

        $col_md = [11,1,12,12,12,12,12];

        /* instanciation du composant BOX dans lequel le detail des dons sera affiché */

        $box_donation = (new \Controller\Back\htmlElement\Box('Modifier un don pour l\'association','box-primary',$box_donation_content,$col_md))->render();

        /* passage des composants de la vue */

        $param = [
            "box_donation"=>$box_donation,
        ];

        return $param;

    }

}
