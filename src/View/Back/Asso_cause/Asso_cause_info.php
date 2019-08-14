<?php
namespace View\Back\Asso_cause;

class Asso_cause_info
{
    function render($param){

        $asso_cause_info  = '';
        $asso_cause_info .= '<form name="asso_cause" class="container-fluid" action="" method="post" style="min-height: 1100px;">';
        $asso_cause_info .=    '</br>';
        $asso_cause_info .=    '<input type="text" name="num_form" value="1" class="hidden">';
        $asso_cause_info .=    '<div class="row">';

        $asso_cause_info .=       ' <div class="col-md-12">';
        $asso_cause_info .=                 ($param["info_générale"])->render();
        $asso_cause_info .=       '</div>';

        $asso_cause_info .=       ' <div class="col-md-12">';
        $asso_cause_info .=                 ($param["autres_infos"])->render();
        $asso_cause_info .=         '</div>';

        $asso_cause_info .=       ' <div id="card_gift" class="col-md-12">';
        $asso_cause_info .=                 ($param["dons_récoltés"]);
        $asso_cause_info .=         '</div>';

        $asso_cause_info .=       ' <div class="col-md-12">';
        $asso_cause_info .=                 ($param["description_fr"])->render();
        $asso_cause_info .=         '</div>';

        $asso_cause_info .=       ' <div class="col-md-12">';
        $asso_cause_info .=                 ($param["description_en"])->render();
        $asso_cause_info .=         '</div>';

        $asso_cause_info .=       ' <div class="col-md-12">';
        $asso_cause_info .=                 ($param["description_es"])->render();
        $asso_cause_info .=         '</div>';

        $asso_cause_info .=    '</div>';
        $asso_cause_info .=            '<div class="col-md-4">';
        $asso_cause_info .=               ' <button type="submit" class="btn btn-block btn-success  ">Enregistrer</button>';
        $asso_cause_info .=           '</div>';
        $asso_cause_info .=           '<div class="col-md-4">';
        $asso_cause_info .=                '<a href="/www/Kalaweit/asso_cause/add"><button type="button" class="btn btn-block btn-primary  ">Nouveau</button></a>';
        $asso_cause_info .=            '</div>';
        $asso_cause_info .=            '<div class="col-md-4">';
        $asso_cause_info .=               ' <a href="/www/Kalaweit/dashboard/get"><button type="button" class="btn btn-block btn-danger  ">Annuler</button></a>';
        $asso_cause_info .=            '</div>';
        $asso_cause_info .=    '</form>';

        return $asso_cause_info;
    }
}
