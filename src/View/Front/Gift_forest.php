<?php namespace View\Front;

/**
*
*/
class Gift_forest

{

    function render($content){

        include('Head.php');

        if(isset($_SESSION["cli_id"])){
        	$connected = $_SESSION["cli_id"];
        }else{
        	$connected = 'not connected';
        }

        ?>
        <div id="connected" hidden ><?php echo $connected ?></div>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-9 animated slideInLeft" id="aside-left">

                        <h2>Faire un don pour la foret</h2>
                        <br>

                        <p>Le prix d'un hectare de forêt pour agrandir nos réserves de forêt à Bornéo et Sumatra est de 1 350 €, soit 13,50 € pour 100 m² de forêt.</p>
                        <p> Ce prix est une moyenne car il varie suivant la situation géographique des hectares (Bornéo, Sumatra, près d'un point d'eau, d'un accès etc.)</p>
                        <p>Vous recevrez un certificat de propriété symbolique, avec votre nom, le montant de votre don et le nombre de m² financés.</p>
                        <p>Merci de renseigner votre adresse postale afin que le reçu fiscal soit accepté par votre centre des impôts. </p>
                        <p>Sans votre adresse postale il ne sera pas valable. Ce reçu fiscal vous permet de déduire de vos impôts 66% du montant de votre don dans la limite de 20% de vos revenus.<br>

                        <?php if(isset($_SESSION["user_login"])){?>

                        <div class="row">



                            <div class="col-md-5">
                                <h2>Je donne une fois</h2>
                                <br>
                                <h3>Par chèque :</h3>
                                <br>

                                <p>Ordre : ASSOCIATION KALAWEIT</p>
                                <p>Adresse : 69, rue Mouffetard – 75005 PARIS</p>


                                <h3>Par Paypal : </h3>

                                <br>
                                <form action="" method="post">

                                    <input id="gift-amount" class="form-control">

                                </form>

                                <br>

                                <div id="paypal-button-container"></div>

                            </div>
                            <div class="col-md-1">

                            </div>

                            <div class="col-md-6">
                                <h2>Je donne chaque mois</h2>
                                <br>

                                <p>Le don régulier est de 13,50€ par mois minimum. </p>
                                <p>Les personnes qui font des dons réguliers sont des Amis de Kalaweit et deviennent automatiquement adhérentes.</p>

                                <h3>Par virement bancaire :</h3>
                                <br>

                                <p><a href="/../Img/Front/RIB.pdf" target="_blank">Imprimer le RIB</a></p>

                                <!--

                                <h3>Par Paypal : </h3>

                                <br>
                                <p><a target="_blank" href="https://www.paypal.com/cgi-bin/webscr">
                                    <img style="width:150px;margin-top:-50px; margin-bottom:-20px;" src="/Img/Front/logo-paypal.png" class="img-responsive">
                                </a></p>

                                -->

                                <p><strong>Pour les personnes ayant un compte bancaire en France: </strong><p>

                                    <p><a href="/../Img/Front/Mandat_prelevement.pdf" target="_blank">Imprimer le formulaire d'autorisation de prélèvement</a></p>

                                    <br>

                                    <h3>Faire un don régulier par HelloAsso : </h3>
                                    <br>

                                    <a target="_blank" href="https://www.helloasso.com/associations/kalaweit/formulaires/1/fr">
                                        <img style="height: 32px; " src="/Img/Front/helloasso.png" class="img-responsive">
                                    </a>

                                    <br>
                                    <br>

                                </div>

                            </div>

                        <?php } else { ?>

                            <div class="clo-md-12">
                                <div class="d-flex justify-content-end">

                                    <a href="/www/Connexion"><button class="btn-form mt20" type="button" name="button">
                                        Se connecter pour faire un don
                                    </button></a>
                                </div>
                            </div>

                        <?php } ?>

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

        <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR"></script>

        <script src="/Js/Front/Gift_forest.js"></script>

        <?php

        include("Footer.php");
    }

}
?>
