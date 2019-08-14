<?php

namespace View\Back\App_connexion;

class Maj_pwd
{

    function render(){

        ob_start();

        ?>

        <!DOCTYPE html>
        <html lang="en" dir="ltr">


        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Kalaweit_friends_administration| Forgotten_pwd</title>
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
                    <p class="login-box-msg">Veuillez renseigner <br>votre nouveau mot de passe
                    <p>Ce dernier doit respecter les conditions suivantes :</p>
                    <ul>
                        <li>Minimum huit caractères</li>
                        <li>Au moins une lettre majuscule</li>
                        <li>Une lettre minuscule </li>
                        <li>Un chiffre</li>
                        <li>Un caractère spécial: @$!%*?&</li>
                    </ul>
                    <br>
                    <form action="" method="post">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Nouveau mot de passe" name="new_password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Confirmation mot de passe" name="new_password_confirm" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <br>
                            <button type="submit" class="btn btn-success btn-block btn-flat">Enregistrement du nouveau mot de passe</button>

                    </form>

                </div>

                <?php echo ob_get_clean() ;

                $script =' <script src="/vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js"></script>';
                $script .='<script src="/vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>';
                $script .='<script src="/vendor/almasaeed2010/adminlte/plugins/iCheck/icheck.min.js"></script>';

                echo $script;

                echo '</body>';
            }
        }
