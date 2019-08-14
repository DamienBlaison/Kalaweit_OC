<?php namespace View\Front;

/**
*
*/
class Connexion
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
                                <div class="d-flex justify-content-between">

                                    <h2 class="title_connexion">Connexion </h2>
                                    <a  href="/www/Kalaweit/App_connexion"><i class="fa fa-gear btn_connexion_admin"></i></a>


                                </div>
                                </h2>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Identification</h3>
                                        <br>
                                        <?php echo $content["param"]["login"] ?>
                                        <?php echo $content["param"]["password"] ?>
                                        <div class="col-md-6"><a href="/www/Forgotten_password">Mot de passe oublié</a></div>
                                        <?php echo $content["param"]["submit"] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <h2>Pas encore de compte ?</h2>
                                <br>
                                <div class="d-flex justify-content-end">
                                    <a href="/www/Account_creation"><button type="button" class="btn-form" name="Account_creation">Je crée mon compte</button></a>
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
