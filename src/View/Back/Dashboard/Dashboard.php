<?php
namespace View\Back\Dashboard;

class Dashboard
{

    function render($data){

        require_once(__DIR__.'/../Head.php');

        $render  = '';
        $render .= '<div class="container-fluid" style="padding-left:0px;">';
        $render .= '<section class="content">';
        $render .= '   <div class="box box-danger">';
        $render .= ' <div class="box-header with-border">';

        $render .= '  <h1 class="box-title">Rechercher</h1>';

        $render .=          '</div>';

        $render .=      '<div class="box-body">';
        $render .=      '<div class="row">';
        $render .=         '<div class="container-fluid">';

        $render .=

        '<div class="col-md-4">
        <a href="/www/Kalaweit/member/list/1">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rechercher un membre</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <a href="/www/Kalaweit/asso_cause/list/1">
        <div class="col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-paw"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Rechercher un animal</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <a href="">
        <div class="col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-euro"></i></span>

            <div class="info-box-content">
                <a href="/www/Kalaweit/asso_donation/list/1">
                <span class="info-box-text">Rechercher un don Animal</span>
                </a>
                <a href="/www/Kalaweit/asso_donation_dulan/list/1">
                <span class="info-box-text">Rechercher un don Dulan</span>
                </a>
                <a href="/www/Kalaweit/asso_donation_forest/list/1">
                <span class="info-box-text">Rechercher un don Foret</span>
                </a>
                <a href="/www/Kalaweit/asso_donation_forest/list/1">
                <span class="info-box-text">Rechercher un don Association</span>
                </a>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
            </a>';

        $render .=      '</div>';
        $render .=      '</div>';
        $render .=      '</div>';
        $render .=      '</div>';

        $render .= '   <div class="box box-danger">';
        $render .= ' <div class="box-header with-border">';

        $render .= '  <h1 class="box-title">Raccourcis création</h1>';

        $render .=          '</div>';

        $render .=      '<div class="box-body">';
        $render .=      '<div class="row">';
        $render .=         '<div class="container-fluid">';

        $render .= '<div class="col-md-12">';
        $render .= '<h4>Création membres/bénéficiaires</h4><br>';
        $render .= '</div>';


        $render .=

        '<div class="col-md-4">
        <a href="/www/Kalaweit/member/add">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ajout d\'un membre</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <a href="/www/Kalaweit/asso_cause/add">
        <div class="col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="fa fa-paw"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ajout d\'un animal</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <a href="/www/Kalaweit/users/add">
        <div class="col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-default"><i class="ion ion-ios-gear"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ajout d\'un utilisateur</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
            </a>';


        $render .= '<div class="col-md-12">';
        $render .= '<h4>Création de dons/adhésions</h4><br>';
        $render .= '</div>';

        $render .=                  '<a href="/www/Kalaweit/asso_donation_asso/add"> ';
        $render .=              '<div class="col-md-6">';
        $render .=                  $data["card7"];
        $render .=              '</div>';
        $render .=              '</a>';

        $render .=                  '<a href="/www/Kalaweit/asso_adhesion/add"> ';
        $render .=              '<div class="col-md-6">';
        $render .=                  $data["card8"];
        $render .=              '</div>';
        $render .=              '</a>';

        $render .=                  '<a href="/www/Kalaweit/asso_donation/add"> ';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card4"];
        $render .=              '</div>';
        $render .=              '</a>';
        $render .=               '<a href="/www/Kalaweit/asso_donation_dulan/add">';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card5"];
        $render .=              '</div>';
        $render .=               '</a>';
        $render .=                  '<a href="/www/Kalaweit/Asso_donation_forest/add" >';
        $render .=              '<div class="col-md-4">';
        $render .=                  $data["card6"];
        $render .=              '</div>';
        $render .=             ' </a>';
        $render .=          '</div>';

        $render .=      '</div>';
        $render .=      '</div>';
        $render .=      '</div>';


        $render .= '</section>';
        $render .= '</div>';

        echo $render;

        require_once( __DIR__ .'/../Footer.php');

    }

}
