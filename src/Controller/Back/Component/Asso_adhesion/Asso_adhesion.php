<?php

/** classe permettant de gérer le contenu d'un composant box adhesion **/

namespace Controller\Back\Component\Asso_adhesion;

class Asso_adhesion
{


    public function update(){

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

    if(isset($_POST["cli_id"])) {

        (new \Manager\Asso_adhesion($bdd))->update();

    }

    $adhesion = (new \Manager\Asso_adhesion($bdd))->get();

    $payment_type = (new \Manager\Asso_payment_type)->getAll($bdd);
    $cli = (new \Manager\Member($bdd))->get_select();
    $status = (new \Manager\Status())->getAll();
    $adhesion_mnt = (new \Controller\Back\htmlElement\Form_group_input('adhesion_mnt','montant de l\'adhésion',$adhesion["adhesion_mnt"],'fa fa-euro'));
    $devise  = (new \Controller\Back\htmlElement\Form_group_select('ptyp_id',$payment_type,$adhesion["ptyp_id"],'fa fa-internet-explorer',"ptyp_code"));
    $donator = (new \Controller\Back\htmlElement\Form_group_select('cli_id',$cli,$adhesion["cli_id"],'fa fa-user',"cli_identity" ));
    $status = (new \Controller\Back\htmlElement\Form_group_select('adhesion_status',$status,$adhesion["adhesion_status"],'fa fa-user',"config" ));
    $look = (new \Controller\Back\htmlElement\Form_group_input_span('search_member','fa fa-search'));

    $button  = '';
    $button .=                      '<div class="form-group">';
    $button .=                          '<!--<label style="color:white;" for="submit"> test</label>-->';
    $button .=                          '<button id="submit" type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i></button>';
    $button .=                      '</div>';

    $box_adhesion_content = [
        $donator->render(),
        $look->render(),
        $adhesion_mnt->render(),
        $devise->render(),
        $status->render(),
        $button
    ];

    $col_md = [11,1,12,12,12,12];

    $box_adhesion = (new \Controller\Back\htmlElement\Box('Modifier une adhésion','box-primary',$box_adhesion_content,$col_md))->render();


    $param = [
        "box_adhesion"=>$box_adhesion,
    ];

    return $param;

    }

}
