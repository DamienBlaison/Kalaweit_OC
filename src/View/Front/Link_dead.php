<?php namespace View\Front;

/**
*
*/
class Link_dead
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
                                    <p class="login-box-msg">Le lien que vous essayer d'utiliser n'est plus actif.</p>

                                    <a href="/www/Connexion"><button type="button" name="button" class="btn-form">Faire une nouvelle demande</button></a>
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
