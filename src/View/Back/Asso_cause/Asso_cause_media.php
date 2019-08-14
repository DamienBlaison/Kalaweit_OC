<?php
namespace View\Back\Asso_cause;

class Asso_cause_media
{
    function render($param){

        $asso_cause_info  = '';
        $asso_cause_info .=       ' <div class="col-md-12">';
        $asso_cause_info .=                 ($param["pictures"])->render();
        $asso_cause_info .=         '</div>';

        return $asso_cause_info;
    }
}
