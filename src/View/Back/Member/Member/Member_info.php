<?php

namespace View\Back\Member\Member;

class Member_info
{
    public function render($param){

        $member_info  = '';
        $member_info .= '<form name="member" class="container-fluid" action="" method="post" style="min-height: 1100px;">';
        $member_info .=    '</br>';
        $member_info .=    '<input type="text" name="num_form" value="1" class="hidden">';
        $member_info .=    '<div class="row">';
        $member_info .=       ' <div class="col-md-6">';
        $member_info .=            '<div class="col-md-12">';
        $member_info .=                 ($param["box_info_member"])->render();
        $member_info .=            '</div>';
        $member_info .=            '<div class="col-md-12">';
        $member_info .=                 ($param["box_info_donator"])->render();
        $member_info .=            '</div>';
        $member_info .=            '<div class="col-md-12">';
        $member_info .=                ($param["box_other_info"])->render();
        $member_info .=           ' </div>';
        $member_info .=        '</div>';
        $member_info .=        '<div class="col-md-6">';
        $member_info .=            ($param["box_cli_data"])->render();
        $member_info .=       ' </div>';


        $member_info .=        '<div class="col-md-12">';
        $member_info .=            ($param["box_info_paiement"])->render();
        $member_info .=       ' </div>';



        $member_info .=       ' <div class="col-md-12">';
        $member_info .=         ' <div class="col-md-6">';
        $member_info .=             $param["card4"];
        $member_info .=         ' </div>';
        $member_info .=         ' <div class="col-md-6">';
        $member_info .=             $param["card5"];
        $member_info .=         ' </div>';
        $member_info .=         ' <div class="col-md-4">';
        $member_info .=             $param["card1"];
        $member_info .=         ' </div>';
        $member_info .=         ' <div class="col-md-4">';
        $member_info .=              $param["card2"];
        $member_info .=         ' </div>';
        $member_info .=         ' <div class="col-md-4">';
        $member_info .=              $param["card3"];
        $member_info .=         ' </div>';
        $member_info .=       ' </div>';

        $member_info .=            '<div class="col-md-12">';
        $member_info .=                ($param["box_cli_comment"])->render();
        $member_info .=            '</div>';
        $member_info .=            '<div class="col-md-4">';
        $member_info .=               ' <button type="submit" class="btn btn-block btn-success  ">Enregistrer</button>';
        $member_info .=           '</div>';
        $member_info .=           '<div class="col-md-4">';
        $member_info .=                '<a href="/www/Kalaweit/member/add"><button type="button" class="btn btn-block btn-primary  ">Nouveau</button></a>';
        $member_info .=            '</div>';
        $member_info .=            '<div class="col-md-4">';
        $member_info .=               ' <a href="/www/Kalaweit/dashboard/get"><button type="button" class="btn btn-block btn-danger  ">Annuler</button></a>';
        $member_info .=            '</div>';
        $member_info .=        '</div>';

        $member_info .='</form>';

        return $member_info;

    }

}
