<?php namespace View\Front;

/**
*
*/
class Account_creation
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 animated slideInLeft" id="aside-left" >
                        <h2>Création de compte</h2>
                        <br>
                        <form class="" action="" method="post">


                        <div class="row">
                            <div class="col-md-6">
                                <h3>Informations de contact</h3>
                                <br>
                                <?php echo $content["param"]["firstname"] ?>
                                <?php echo $content["param"]["lastname"] ?>
                                <?php echo $content["param"]["type"] ?>
                                <?php echo $content["param"]["phone1"] ?>
                                <?php echo $content["param"]["phone2"] ?>

                                <h3>Informations de connexion</h3>
                                <br>
                                <?php echo $content["param"]["email"] ?>
                                <?php echo $content["param"]["password"] ?>

                                <br>
                            </div>
                            <div class="col-md-6">
                                <h3>Adresse</h3>
                                <br>
                                <?php echo $content["param"]["address"] ?>
                                <?php echo $content["param"]["address2"] ?>
                                <?php echo $content["param"]["cp"] ?>
                                <?php echo $content["param"]["town"] ?>
                                <?php echo $content["param"]["country"] ?>

                                <?php echo $content["param"]["submit"] ?>
                            </div>
                        </div>

                        </form>
                    </div>
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
