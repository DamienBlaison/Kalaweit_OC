<?php namespace View\Front;

/**
*
*/
class Friends

{

    function render($content){

        include('Head.php');

        if(isset($_SESSION["cli_id"])){
        	$connected = $_SESSION["cli_id"];
        } else {
        	$connected = 'not connected';
        }

        ?>
        <div id="connected" hidden ><?php echo $connected ?></div>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 animated slideInLeft" id="aside-left">


                        <h2>Devenir un ami de Kalaweit</h2>
                        <br>
                        <p><strong>Devenir un Ami de Kalaweit est ce qui nous aide le plus !</strong></p>
                        <p>Le don mensuel peut être pour parrainer un gibbon ou pour nous aider à couvrir les dépenses du projet : sauvetages animaux, achat matériel, entretien infrastructures, salaires de l'équipe, patrouilles en forêt, etc..</p>
                        <p>Les Amis sont les personnes qui font un don mensuel régulier. Le minimum est de 5 € par mois. Si Kalaweit atteint le chiffre de 3 500 Amis, alors l’association n’aura pas à craindre pour son avenir !</p>

                        <p><strong>Le don régulier peut se faire :</strong></p>
                        <ul>
                            <li>par prélèvement bancaire. Merci d'imprimer et compléter le formulaire ci-dessous et nous le renvoyer à l'adresse indiquée, en joignant un RIB.</li>
                            <li>avec Paypal.</li>
                            <li>par virement bancaire que vous pouvez mettre en place à partir de votre compte bancaire.</li>
                        </ul>
                        <p>Pensez bien à nous transmettre votre adresse postale sinon le reçu fiscal ne sera pas valable.
                            <p>L'adhésion à l'association est gratuite pour les Amis de Kalaweit. Vous recevrez une carte de membre par email.

                                <?php if(isset($_SESSION["user_login"])){?>

                                    <h2>Moyens de paiment</h2>
                                    <br>
                                    <div id="gift_block" class="row">
                                        <div class="col-md-4">
                                            <h3>Par Paypal : </h3>
                                            <br>
                                            <form action="" method="post">
                                                <input id="gift-amount" type="text" name="gift-amount">
                                                <br>
                                            </form>
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
                                            <a target="_blank" href="https://www.helloasso.com/associations/kalaweit/formulaires/3/fr">
                                                <img style="height: 32px; " src="/Img/Front/helloasso.png" class="img-responsive">
                                            </a>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                    <br><br>
                                    <h3>Information</h3>
                                    <p>Kalaweit a l'agrément ministériel permettant d'établir des reçus fiscaux.</p>
                                    <p>Ce reçu fiscal vous permet de déduire de vos impôts 66% du montant du don dans la limite de 20% de vos revenus.</p>
                                <?php } else { ?>
                                    <div class="clo-md-12">
                                        <div class="d-flex justify-content-end">
                                            <a href="/www/Connexion"><button class="btn-form mt20" type="button" name="button">
                                                Se connecter pour devenir ami de Kalaweit
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

            <?php

            include(__DIR__ .'/../../../www/Js/Front/Friends.js');

            include("Footer.php");
        }
    }
