<?php namespace View\Front;

/**
*
*/
class Context
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-9 animated slideInLeft" id="aside-left" >

                        <h2>Situation environnementale en Indonésie</h2>
                        <br>

                        <h3>Contexte Environnemental</h3>

                        <p>Composée de 18 307 îles dont les plus importantes sont Bornéo (Kalimantan), Sumatra, Java et Sulawesi, l’Indonésie est le plus grand archipel du monde et abrite la faune et la flore les plus riches du continent asiatique. On y trouve 10% des forêts tropicales de la planète, écosystèmes extrêmement riches d’espèces animales et végétales. Ce pays compte l’une des faunes les plus diversifiées au monde : 15% du nombre total d’espèces de primates y sont recensés dont 7 espèces de gibbons sur les 17 existantes.
                        </p><p>
                            La plupart des tigres, éléphants, rhinocéros ou léopards ont disparu, victime de la chasse et du braconnage. Mais les gibbons ou les orang outans, espèces emblématiques de cette partie du monde survivent encore dans ces écosystèmes précieux et on découvre régulièrement de nouvelles espèces dans les forêts primaires indonésiennes.
                        </p><p>
                            Les forêts d’Indonésie, qui sont les 3e du monde en superficie après celles d’Amazonie et celles du bassin du Congo, sont progressivement anéanties par une déforestation massive.
                        </p><p>
                            L’Indonésie est le pays où la déforestation est la plus importante au monde. Coupes illégales de bois tropicaux, accroissement rapide du nombre d’exploitations de palmiers à huile, défrichage pour augmenter les surfaces cultivables et installer les populations migrantes, ou gigantesques feux de forêts, voilà pourquoi les forêts tropicales indonésiennes disparaissent à un rythme toujours plus inquiétant : c’est l’équivalent de la surface de 6 terrains de football qui disparaît chaque minute en Indonésie.
                        </p><p>
                            A cette déforestation qui semble incontrôlable, s’ajoutent les catastrophes naturelles dont cette région du monde est victime : irruptions volcaniques, séismes, tsunamis...
                        </p><p>
                            La disparition des habitats naturels met en péril cette précieuse biodiversité. Le trafic d’animaux sauvages aggrave ce constat et contribue, pour une grande part, à leur extinction. Il se situe en 3e position après le trafic de drogue et celui des armes dans le monde. Enfin, au contact des hommes, ces animaux sauvages développent des maladies qui déciment leurs populations.
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
