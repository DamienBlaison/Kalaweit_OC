<?php namespace View\Front;
/**
*
*/
class Gibbon_gallery
{

    function render($content){

        include('Head.php');

        if(isset($_GET["gift_open"]) && $_GET["gift_open"] == 'on'){$checked = "checked=checked";} else { $checked = '';};
        $url  = explode('/',$_SERVER["REQUEST_URI"]);

        $current = explode('?',$url[3]);

        if (isset($current[1])){ $search = $current[1]; } else { $search =''; };

        $current_page = $current[0];
        $previous = $current_page-1 .'?'.$search.'#anchor';
        $next = $current_page+1 .'?'.$search.'#anchor';

        ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 animated slideInLeft">
                        <div id="wrapper-gallery">
                            <div class="form-check">
                                <h2>Parrainer un gibbon</h2>
                                <p> Nous avons besoin de vous pour offrir une deuxième chance à nos pensionnaires !</p>
                                <p>Vous recevrez des nouvelles de votre protégé par email, toutes les 4 à 6 semaines. Votre nom figurera sur la liste des gibbons proposés à l’adoption sur notre site internet.
                                    <p>Vous pouvez parrainer un gibbon en totalité soit 280 € par an ou 23 € par mois, ou seulement en partie.</p>
                                        <h3> Parrainer en faisant un don unique </h3>
                                        <p>Le montant maximum annuel du parrainage unique est de 280 €.
                                            La durée du parrainage est de 12 mois, de date à date donc à partir de la date de versement de votre don. Un email vous sera envoyé au bout des 11 mois pour vous proposer de le poursuivre.
                                        </p>
                                        <p>
                                            Vérifiez bien sur la fiche du gibbon le montant restant à réunir, il est indiqué au-dessus de chaque photo. Si vous voulez donner 80 €, il faut évidemment qu’il reste au moins 80 € à collecter, sinon le total dépassera les 280 € annuels.
                                        </p>
                                        <h3>Parrainer en donnant chaque mois </h3>
                                        <p>Vous pouvez verser de 5 à 23 € par mois. Avec cette formule vous n’avez pas à renouveler votre parrainage d’une année sur l’autre. Il prend fin quand vous le décidez. Vous devenez un Ami de Kalaweit et l’adhésion vous est offerte.</p>
                                        <p>Vérifiez bien sur la fiche du gibbon le montant restant à réunir, il est indiqué au-dessus de chaque photo. Par exemple si vous voulez donner 10 € par mois, cela fera 120 € par an. Il faut donc qu’il reste au moins 120 € à collecter, sinon le total dépassera les 280 € annuels.</p>
                                        <p>Merci de nous indiquer votre adresse postale surtout si vous passez par Paypal ou le virement bancaire. Sans votre adresse postale, votre reçu fiscal ne sera pas valable.
                                            En cas de décès de l’animal, les sommes versées seront réaffectées sur un autre animal ou utilisées pour les autres frais de l’association selon votre souhait.
                                            Pour choisir un animal, veuillez le sélectionner dans la liste ci-dessous.
                                            Si vous remarquez une incohérence dans la liste ci-dessous, merci de nous en informer à l'adresse suivante : kalaweit.france@yahoo.fr
                                        </p>
                                        <p>Merci de votre soutien !</p>
                                        <h2 id="anchor">Les gibbons</h2>
                                    </div>
                                    <br><br>
                                    <form class="" action="/www/Gibbon_gallery/1#anchor" method="get">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Tapez votre recherche ici" name="search">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="checkbox" aria-label="Checkbox for following text input" name="gift_open" <?php echo $checked ?> >
                                                        </div>
                                                    </div>
                                                    <div type="text" class="form-control" aria-label="Text input with checkbox">Les dons ouverts</div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-3">
                                                <div class="input-group ">
                                                    <button class="btn btn-outline-secondary col-md-12" type="submit" id="button-addon2">Rechercher</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <div class="gallery row">
                                        <?php foreach ($content["gallery"]["data"] as $key => $value): ?>
                                            <!--<div class="flex-gallery">-->
                                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                                    <div class="gallery_item">
                                                    <a href="/www/Gibbon?cau_id=<?php echo $value["cau_id"] ?>">
                                                        <img src="/Img/Asso_cause/<?php echo $value["caum_file"] ?>" class="gallery_img" alt="<?php echo $value["cau_name"] ?>">
                                                    </a>
                                                    <div class="caption">
                                                        <h3><?php echo $value["cau_name"] ?></h3>
                                                        <p>Dons collectés :<br> <?php if($value["tot_don"] == NULL){ echo '0';} else { echo $value["tot_don"] ;}?> € / 280 €</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                <br>
                                <br>
                                <div class="col-md-12 nav_gibbons">
                                    <nav id="nav_list_gibbon" class="d-flex justify-content-between">
                                        <ul class="pagination ">
                                            <li class="page-item " id="previous"><a class="page-link" href="/www/Gibbon_gallery/<?php echo $previous ?>">Previous</a></li>
                                            <li class="page-item" id="next"><a class="page-link" href="/www/Gibbon_gallery/<?php echo $next?>">Next</a></li>
                                        </ul>
                                        <ul class="pagination ">
                                            <li class="page-item"><a class="page-link">Page </a></li>
                                            <li class="page-item"><a class="page-link"><?php echo $current_page ?></a></li>
                                            <li class="page-item"><a class="page-link">/</a></li>
                                            <li class="page-item"><a class="page-link" id="nb_page"><?php echo ceil(intval($content["gallery"]["count"])/15)?></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 asideK">
                                <?php
                                echo $content["aside"];
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php

                    echo '<script src="/Js/Front/Gibbon_gallery.js"></script>';
                    
                    include("Footer.php");



                }

            }

            ?>
