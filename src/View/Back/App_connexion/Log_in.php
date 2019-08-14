<?php

namespace View\Back\App_connexion;

class Log_in
{

    function render(){

        ob_start();

        ?>

        <!DOCTYPE html>
        <html lang="en" dir="ltr">


        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Kalaweit_friends_administration| Log in</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css">
        </head>


        <body class="hold-transition login-page">
            <div class="login-box">
                <div class="login-logo">
                    <h1><b>KALAWEIT</b><br>admin</h1>
                </div>
                <div class="login-box-body">
                    <p class="login-box-msg">Veuillez vous identifier pour commencer</p>
                    <form action="" method="post">
                        <div class="form-group has-feedback">
                            <input class="form-control" placeholder="Login" name="login">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                            <button type="submit" class="btn btn-primary btn-block btn-flat">Se connecter</button>
                            <br>
                            <div style=" display: flex; justify-content: center;">
                                <a href="/www/Kalaweit/app_connexion/forgotten_pwd">Mot de passe oublié ?</a>
                            </div>


                    </form>

                    <!--
                        <div class="social-auth-links text-center">
                            <a href="#">Mot de passe oublié</a><br>
                        </div>
                    -->
                </div>

                <?php echo ob_get_clean() ;

                $script =' <script src="/vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js"></script>';
                $script .='<script src="/vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>';
                $script .='<script src="/vendor/almasaeed2010/adminlte/plugins/iCheck/icheck.min.js"></script>';

                echo $script;

                echo '</body>';
            }
        }
