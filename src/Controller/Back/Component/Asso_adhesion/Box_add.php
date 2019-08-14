<?php
namespace Controller\Back\Component\Asso_adhesion;

/**
*
*/
class Box_add

{
    public function render(){

        $bdd = new \Manager\Connexion();
        $bdd = $bdd->getBdd();

        if( isset($_GET["cli_id"] ) ){ $cli_id = $_GET["cli_id"]; } else { $cli_id ='';}

        $payment_type = (new \Manager\Asso_payment_type)->getAll($bdd);
        $cli = (new \Manager\Member($bdd))->get_select();
        $status = (new \Manager\Status())->getAll();

        $adhesion_mnt = (new \Controller\Back\htmlElement\Form_group_input('adhesion_mnt','montant de l\'adhésion','','fa fa-euro'));
        $devise  = (new \Controller\Back\htmlElement\Form_group_select('ptyp_id',$payment_type,'','fa fa-internet-explorer',"ptyp_code"));
        $donator = (new \Controller\Back\htmlElement\Form_group_select('cli_id',$cli,$cli_id,'fa fa-user',"cli_identity" ));
        $status = (new \Controller\Back\htmlElement\Form_group_select('adhesion_status',$status,'','fa fa-user',"config" ));
        $look = (new \Controller\Back\htmlElement\Form_group_input_span('search_member','fa fa-search'));

        $submit  = '';
        $submit .=                      '<div class="form-group">';
        $submit .=                          '<!--<label style="color:white;" for="submit"> test</label>-->';
        $submit .=                          '<button id="submit" type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i></button>';
        $submit .=                      '</div>';


        $box_adhesion_content = [
            $donator->render(),
            $look->render(),
            $adhesion_mnt->render(),
            $devise->render(),
            $status->render(),
            $submit
        ];

        $col_md = [11,1,12,12,12,12];

        $box_adhesion = (new \Controller\Back\htmlElement\Box('Ajouter une adhésion','box-primary',$box_adhesion_content,$col_md))->render();


        $box_last_adhesion = (new \Controller\Back\Component\Asso_adhesion\Table_last_adhesion)->render();

        $param = [
            "box_adhesion"=> $box_adhesion,
            "last_adhesion" => $box_last_adhesion

        ];

        return (new \View\Back\Asso_adhesion\Asso_adhesion)->render_add($param);
    }
}
