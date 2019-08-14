<?php namespace View\Front;

/**
*
*/
class Team
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-9 animated slideInLeft" id="aside-left">

                        <h2>L'équipe</h2>
                        <br>

                        <h3>Conseil d'Administration & bureau </h3>

                        <ul>
                            <li>Chanee : Président et fondateur de Kalaweit</li>
                            <li>Jean-Marc Bouve : trésorier</li>
                            <li>Carine Le Thanh : secrétaire</li>
                        </ul>

                        <h3>Indonésie</h3>
                        <p>En Indonésie, on compte 70 employés dont :</p>

                        <ul>
                            <li>Henny : directrice financière</li>
                            <li>Nanto : responsable du Gibbon Conservation Centre de Pararawen (Bornéo)</li>
                            <li>Tono : assistant de direction</li>
                            <li>Feri : directeur des projets (Sumatra)</li>
                            <li>Ori : comptable (Sumatra)</li>
                            <li>Carlo : responsable du programme des adoptions</li>
                            <li>Rina : responsable de l'équipe vétérinaire</li>
                        </ul>

                        <h3>Kalaweit FM </h3>
                        <ul>
                            <li>Willie : animateur et directeur des programmes musicaux</li>
                            <li>Erry : animatrice et responsable du marketing</li>
                            <li>Vitra, Willa, Zeby : animateurs.</li>
                        </ul>

                        <p>Vétérinaires, soigneurs, techniciens, cuisiniers, gardes, comptables, tous jouent un rôle important et permettent à Kalaweit d'exister.</p>

                        <h3>France</h3>
                        <p>En France, 1 personne est employée à temps plein :</p>

                        <ul>
                            <li>Constance Cluset : responsable du bureau France.</li>
                        </ul>

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
