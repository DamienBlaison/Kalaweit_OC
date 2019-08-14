<?php namespace View\Front;

/**
*
*/
class Maj_password
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <form action="" method="post" class="col-md-9 animated slideInLeft" id="aside-left" >
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Réinitialisation de mot de passe</h2>
                                <br>
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
                            </div>
                        </div>
                    </form>
                    <div  class="col-md-3 animated slideInRight asideK">
                        <?php
                        echo $content["aside"];
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("Footer.php");
}
}
?>
