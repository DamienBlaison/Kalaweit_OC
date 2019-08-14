<?php namespace View\Front;

/**
*
*/
class Deforestation
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-9 animated slideInLeft" id="aside-left">

                        <h2>La déforestation</h2>
                        <br>


                        <h3>L'ampleur du problème</h3>

                        <p>Le rythme de la déforestation est effrayant pour l'Indonésie dont la forêt couvrait 75% du territoire.</p><p>En 50 ans, l’Indonésie a perdu plus de 50% de ses forêts.

                            2 millions d'hectares de forêts y disparaissent chaque année, soient l’équivalent de 6 terrains de football chaque minute.</p><p> Les îles de Java et Sulawesi sont déjà déforestées et on estime que 98% des forêts tropicales d'Indonésie pourraient disparaître d'ici 2022. </p><p>La principale raison est le triplement des plantations d'huile de palme d'ici-là : 2,4 millions d'hectares en 2002, 7 millions d'hectares en 2007, 20 millions d’hectares promis…

                            </p><p>Début 2011, le gouvernement indonésien a annoncé son intention de mettre en place un moratoire malheureusement il sera sans effet sur la plus grande partie des forêts menacées et  45 millions d’hectares de forêts et de tourbières seront laissées dans protection.

                            </p><p>Toute compagnie obtenant une concession de la part du gouvernement provincial peut transformer, détruire la forêt à sa guise. </p><p>Ces concessions peuvent être des terres ancestrales appartenant à des peuples de la forêt comme les Orang-Rimba ou les Penan auxquels elles sont volées.

                                La situation administrative est telle que certaines exploitations de palmiers à huile sont désormais présentes dans les parcs nationaux. </p><p>L'abattage illégal de bois a été reconnu dans 37 des 41 parcs nationaux à travers des relevés des autorités indonésiennes.

                                    Une plantation est productive en 3 ans. Dans les plantations, les régimes sont récoltés à la main en continu, 2 à 3 fois par mois. C'est à dire 10 à 30 tonnes de régimes/ha/an. </p><p>Un palmier à huile peut être exploité pendant 20 ans. C'est de la pure monoculture qui entraîne la disparition de la biodiversité. Les plantations font souvent des milliers d'hectares.
                                    </p>


                                    <h3>Que faire ?</h3>

                                    <p>Seul un changement de nos comportements permettra d'enrayer ce désastre. </p><p>Cela passe par l'adoption d'un mode de vie qui aide à la préservation des forêts. </p><p>S'interroger sur nos modes de vie, changer face à notre entourage social, s'indigner face à l'insupportable, scruter les étiquettes, les provenances, raisonner nos besoins de consommation… </p><p>Eviter tous les produits contenant de l'huile de palme (aussi appelée huile végétale).
                                    </p>


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
