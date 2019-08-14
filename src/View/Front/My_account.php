<?php namespace View\Front;

/**
*
*/
class My_account
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 animated slideInLeft" id="aside-left" >
                        <div class="row">
                            <h2 class="col-md-10">Mes informations</h2>
                            <div  class="col-md-2">
                                <div  class=" btn-toolbar justify-content-end">
                                    <input  id= "info_btn" type="button" class=" btn-form" value="Modifier" name="receipt_btn">
                                </div>
                            </div>

                        </div>
                        <br>
                        <form action="" method="post" id="info_member" class="row" style="display:none;">
                            <div class="col-md-6">
                                <h3>Informations de contact</h3>
                                <br>
                                <?php echo $content["param"]["firstname"] ?>
                                <?php echo $content["param"]["lastname"] ?>
                                <?php echo $content["param"]["type"] ?>
                                <?php echo $content["param"]["phone1"] ?>
                                <?php echo $content["param"]["phone2"] ?>

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


                        </form>

                        <div class="row">

                            <h2 id="history" class="col-md-12">Historiques</h2>

                            <br>

                            <div id="histo_member" class="col-md-12">

                                <h3>Reçu fiscaux</h3>
                                <br>

                                <?php echo $content["table"]["table_receipt_annual"] ?>

                                <h3>Adhésion</h3>
                                <br>

                                <?php echo $content["table"]["table_adhesion"] ?>

                                <h3>Dons pour l'association</h3>
                                <br>

                                <?php echo $content["table"]["table_donation_asso"] ?>


                                <h3>Dons pour les Gibbons</h3>
                                <br>

                                <?php echo $content["table"]["table_donation"] ?>

                                <h3>Dons foret</h3>
                                <br>

                                <?php echo $content["table"]["table_donation_forest"] ?>

                                <h3>Dons Dulan</h3>
                                <br>

                                <?php echo $content["table"]["table_donation_dulan"] ?>

                            </div>
                        </div>
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

    <script src="/Js/Front/My_account.js"></script>

    <?php
    include("Footer.php");

}
}
?>
