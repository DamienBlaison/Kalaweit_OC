<?php
namespace View\Back\Annual_report;

class Annual_report
{

    function render($data){

        require_once(__DIR__.'/../Head.php');//flag

        $render  = '<div class="content" style="padding-left:0px;">';
        $render .=         '<div class="content">';
        $render  .=     '<div class="container-fluid">';

        $render .=      '<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>';
        $render .=          '<form name="Annual_report" class="row" action="" method="get">';
        $render .=              '<div class="col-md-11">';

        $render .=              $data["list"];

        $render .=              '</div>';
        $render .=              '<div class="col-md-1 col-12">';

        $render .=              '<input id="actualise-report" value="Actualiser" type="submit" class="btn btn-primary btn-sm"></input>';

        $render .=              '</div>';
        $render .=          '</form>';
        $render .=      '</div>';


        $render .=      '<div class="row">';
        $render .=         '<div class="container-fluid">';
        $render .=              '<div class="col-md-6">';
        $render .=                  $data["card7"];
        $render .=              '</div>';
        $render .=              '<div class="col-md-6">';
        $render .=                  $data["card8"];
        $render .=              '</div>';
        $render .=          '</div>';
        $render .=      '</div>';
        $render .=      '<div class="row">';
        $render  .=         '<div class="container-fluid">';
        $render .=              $data["chart7"];
        $render .=              $data["chart8"];
        $render .=          '</div>';
        $render .=      '</div>';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card1"];
        $render .=              '</div>';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card2"];
        $render .=              '</div>';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card3"];
        $render .=              '</div>';
        $render .=      '<div class="row">';
        $render  .=     '<div class="container-fluid">';
        $render .=          $data["chart1"];
        $render .=          $data["chart2"];
        $render .=          $data["chart3"];
        $render .=      '</div>';
        $render .=      '</div>';

        $render .=      '<div class="col-md-12">';

        $render .=          $data["table1"];

        $render .=      '</div>';

        $render .=      '<div class="row">';

        $render  .=         '<div class="container-fluid">';
        $render .=              '<div class="col-md-6">';
        $render .=                  $data["card9"];
        $render .=              '</div>';
        $render .=              '<div class="col-md-6">';
        $render .=                  $data["card10"];
        $render .=              '</div>';
        $render .=          '</div>';

        $render  .=         '<div class="container-fluid">';
        $render .=              $data["chart9"];
        $render .=              $data["chart10"];
        $render .=          '</div>';
        $render .=         '<div class="container-fluid">';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card4"];
        $render .=              '</div>';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card5"];
        $render .=              '</div>';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card6"];
        $render .=              '</div>';
        $render .=          '</div>';
        $render .=      '</div>';

        $render .=      '<div>';
        $render .=          $data["chart4"];
        $render .=          $data["chart5"];
        $render .=          $data["chart6"];
        $render .=      '</div>';

        $render .=      '<div class="col-md-12">';
        $render .=          $data["table2"];
        $render .=      '</div>';
        $render .=      '</div>';



        ?><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script><?php

        echo $render;

        require_once( __DIR__ .'/../Footer.php');

    }
}
