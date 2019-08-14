<?php

namespace View\Back\App_connexion;

class Link_dead
{

    function render(){

        ob_start();

        ?>

        <!DOCTYPE html>
        <html lang="en" dir="ltr">


        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Kalaweit_friends_administration| Link dead</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css">
        </head>


        <body class="hold-transition login-page">
            <div class="login-box">
                <div class="login-logo">
                    <h1><b>KALAWEIT</b><br>Admin</h1>
                </div>
                <div class="login-box-body">
                    <p class="login-box-msg">Le lien utilisé n'est plus actif </br>( durée de validité dépassée ou lien erroné )</p>
                    <a href="/www/Kalaweit/app_connexion">
                        <button type="button" name="button" class=" form-control btn-danger"> Faire une nouvelle demande </button>
                    </a>
                    <br>
                </div>

                <?php echo ob_get_clean() ;

                $script =' <script src="/vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js"></script>';
                $script .='<script src="/vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>';
                $script .='<script src="/vendor/almasaeed2010/adminlte/plugins/iCheck/icheck.min.js"></script>';

                echo $script;

                echo '</body>';
            }
        }
