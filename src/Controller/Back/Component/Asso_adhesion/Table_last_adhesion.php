<?php

namespace Controller\Back\Component\Asso_adhesion;

/**
 *
 */
class Table_last_adhesion
{

    public function render(){

    $bdd = new \Manager\Connexion();
    $bdd = $bdd->getBdd();

    $data   = (new \Manager\Asso_adhesion($bdd))->get_last();

    $link = '/www/Kalaweit/member/get?cli_id=';
    $update = '/www/Kalaweit/asso_adhesion/update?adhesion_id=';
    $delete = '/www/Kalaweit/asso_adhesion/delete?adhesion_id=';
    $print  = '/www/Kalaweit/receipt/add?adhesion_id=';
    $position_status = 6;
    $add = '/www/Kalaweit/asso_adhesion/add';


    $table_last_adhesion = (new \Controller\Back\htmlElement\Table_without_pagination("Les dernieres adhésions",$data,'Table_last_adhesion',$link,$update,$delete,$print,$position_status,$add))->render();

    return  $table_last_adhesion;

    }

}
