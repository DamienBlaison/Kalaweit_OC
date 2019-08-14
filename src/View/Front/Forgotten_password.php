<?php namespace View\Front;

/**
*
*/
class Forgotten_password
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Identification</h3>
                                        <br>
                                        <?php echo $content["param"]["login"] ?>
                                        <?php echo $content["param"]["submit"] ?>
                                    </div>
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
