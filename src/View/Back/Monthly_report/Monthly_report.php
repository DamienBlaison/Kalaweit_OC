<?php
namespace View\Back\Monthly_report;

class Monthly_report
{

    function render($data){

        $array_year = [date('Y')];

        for ($i = 1; $i < 11 ; $i++) {

            $date = date('Y') - $i;

            $option = [$date] ;

            $array_year = array_merge($array_year , $option );

        }

        $array_month = ['01','02','03','04','05','06','07','08','09','10','11','12'];

        require_once(__DIR__.'/../Head.php');//flag

        $render  = '<div class="content" style="padding-left:0px;margin-top:0px;">';
        $render  .= '<div class="content">';
        $render  .=     '<div class="container-fluid">';

        $render .=      '<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>';

        $render .=          '<form name="Annual_report" class="row" action="" method="get">';

        $render .=     '<div class="col-md-5">';
        $render .=          '<div class="input-group">';
        $render .=              '<span class="input-group-addon">';
        $render .=                 '<i class="fa fa-calendar"></i>';
        $render .=              '</span>';
        $render .=              '<select class="form-control select2 " data-placeholder="" name="y" style="width: 100%;" tabindex="-1" aria-hidden="true">';

        foreach ($array_year as $key => $value) {

            if( $value == $_GET["y"]){

            $render .=                  '<option value="'.$value.'" selected>'.$value.'</option>';

        } else {

            $render .=                  '<option value="'.$value.'" >'.$value.'</option>';
        }

        };

        $render .=              '</select>';
        $render .=          '</div>';
        $render .=      '<br>';

        $render .=              '</div>';
        $render .=     '<div class="col-md-5">';
        $render .=          '<div class="input-group">';
        $render .=              '<span class="input-group-addon">';
        $render .=                 '<i class="fa fa-calendar"></i>';
        $render .=              '</span>';
        $render .=              '<select class="form-control select2 " data-placeholder="" name="m" style="width: 100%;" tabindex="-1" aria-hidden="true">';

        foreach ($array_month as $key => $value) {

            if( $value == $_GET["m"]){

            $render .=                  '<option value="'.$value.'" selected>'.$value.'</option>';

            } else {

            $render .=                  '<option value="'.$value.'">'.$value.'</option>';
            }

        };

        $render .=              '</select>';
        $render .=          '</div>';
        $render .=      '<br>';

        $render .=              '</div>';
        $render .=              '<div class="col-md-2">';

        $render .=              '<input id="actualise-monthly-report" value="Actualiser" type="submit" class="btn btn-primary" style="width:100%;"></input>';

        $render .=              '</div>';
        $render .=          '</form>';
        $render .=      '</div>';

        $render .=         '<div class="container-fluid" id="card-title-monthly-report">';
        $render .=              $data["card1"];
        $render .=      '</div>';
        $render .=              $data["chart"];
        $render .=         '<div class=col-md-6> ';
        $render .=              $data["table"];
        $render .=      '</div>';
        $render .=      '</div>';
        $render .=      '</div>';


        ?><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script><?php

        echo $render;

        require_once( __DIR__ .'/../Footer.php');

    }
}
