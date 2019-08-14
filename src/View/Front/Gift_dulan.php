<?php namespace View\Front;

/**
*
*/
class Gift_dulan

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
                        <h2>Faire un don pour le projet Dulan</h2>
                        <br>

                        <p>Le prix d'un hectare de forêt dans cette réserve est de 900 €, soit 9 € pour 100 m² de forêt.</p>
                        <p>Vous recevrez un certificat de propriété symbolique, avec votre nom, le montant de votre don et le nombre de m² financés.</p>
                        <p>Merci de renseigner votre adresse postale afin que le reçu fiscal soit accepté par votre centre des impôts.</p>
                        <p> Sans votre adresse postale il ne sera pas valable. Ce reçu fiscal vous permet de déduire de vos impôts 66% du montant de votre don dans la limite de 20% de vos revenus.</p>

                        <br><br>

                        <?php if(isset($_SESSION["user_login"])){?>

                            <div class="row">


                                <div class="col-md-4">


                                    <h3>Par Paypal : </h3>

                                    <br>
                                    <form action="" method="post">

                                        <input id="gift-amount" class="form-control">

                                    </form>

                                    <br>

                                    <div id="paypal-button-container"></div>

                                </div>
                                <div class="col-md-4">

                                    <h3>Par prélèvement automatique : </h3>
                                    <br>

                                    <p><a href="/../Img/Front/Mandat_prelevement.pdf" target="_blank">Imprimer le formulaire <br>d'autorisation de prélèvement</a></p>

                                    <br>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <h3>Par HelloAsso : </h3>
                                    <br>

                                    <a target="_blank" href="https://www.helloasso.com/associations/kalaweit/collectes/faire-un-don-pour-sauver-la-foret-de-dulan">
                                        <img style="height: 32px; " src="/Img/Front/helloasso.png" class="img-responsive">
                                    </a>

                                    <br>
                                    <br>
                                </div>
                            </div>
                            <br><br>
                            <p>Kalaweit a l'agrément ministériel permettant d'établir des reçus fiscaux.</p>

                            <p>Ce reçu fiscal vous permet de déduire de vos impôts 66% du montant du don dans la limite de 20% de vos revenus.)</p>

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
    <script src="/Js/Front/Gift_dulan.js"></script>

    <?php

    include("Footer.php");
    }
}
