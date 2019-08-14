<?php namespace View\Front;

/**
*
*/
class Sumatra
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-9 animated slideInLeft" id="aside-left">


                        <h2>Les sites de Kalaweit à Sumatra</h2>
                        <br>


                        <h3>Le Gibbon conservation center de Supayang</h3>

                        <p>Il s'étend sur 8 hectares de terrain, qui appartiennent à Kalaweit. Il est situé à 2 heures de route de Padang, capitale de la région de Sumatra est. C’est un avantage sanitaire intéressant car un climat plus sec signifie moins de problèmes sanitaires pour les animaux. </p>

                        <p>Les gibbons et siamangs proviennent tous de chez des particuliers. Comme à Bornéo, il y a un vrai problème avec la détention illégale d’ animaux.</p>

                        <p>Une des particularités du Gibbon Conservation Center de Supayang est qu’il recueille des gibbons de Kloss (Hylobates klossi), espèce endémique de l’archipel Mentawai située à l'ouest de Sumatra. Il ne subsiste que quelques milliers d’individus à l’état naturel. </p>
                        <p>Le directeur du parc national de Siberut collabore avec Kalaweit pour que tous les gibbons de Kloss détenus illégalement soient remis à Kalaweit. Un programme de reproduction et de réhabilitation est mis en place avec les animaux sains.</p>

                        <p>Cette espèce n'est présente dans aucun parc zoologique, à l'exception de deux animaux dans le zoo de Jakarta et un ou deux individus dans d'autres zoos asiatiques. Aucun couple au monde n'a jamais été formé en captivité.</p>


                        <h3>La réserve de Supayang</h3>

                        <p>
                            Elle est limitrophe avec le Gibbon Conservation Center où sont les animaux que l'association a recueillis à Sumatra. </p>
                            <p>La zone est très riche en biodiversité : gibbons, siamangs, ours, panthères nébuleuses, chats dorés, pangolins, tapirs, muntjacs et même des tigres y ont été observés, c'est une opportunité rare de pouvoir acheter de la forêt de cette qualité.</p>
                            <p>
                                C'est une forêt primaire et secondaire, avec une forte valeur pour la conservation. Elle est située entre 600 et 1050 mètres au dessus de la mer.</p>
                                <p>Quatre patrouilles équestres sont effectuées quotidiennement dans la réserve, afin de lutter contre le braconnage et les coupes illégales de bois.</p>
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
