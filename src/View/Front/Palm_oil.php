<?php namespace View\Front;

/**
*
*/
class Palm_oil
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-9 animated slideInLeft" id="aside-left">

                        <h2>L'huile de palme</h2>
                        <br>


                        <h3>Le palmier à huile</h3>

                        <p>Le palmier à huile est originaire de l’Afrique de l’Ouest, il est largement cultivé pour ses fruits et ses graines riches en huile à usage alimentaire et industriel. Le palmier à huile mesure 20 à 25 m de haut, mais dans les palmeraies de culture les élaeis ne dépassent pas 15 mètres. Les feuilles, pennées (= feuilles composées dont les  folioles sont disposées comme les barbes d'une plume) mesurent de 5 à 7 m de long, à pétiole très robuste et épineux.
                        </p>
                        <p>
                            Le fruit est une drupe (= fruit charnu à noyau) charnue, de forme ovoïde, sessile. La pulpe de couleur jaune orangé, renferme près de 50% de lipides qui constituent l'huile de palme. Les noix de palme sont groupées en régimes. Un régime peut porter jusqu'à 1 500 drupes.
                        </p>
                        <p>
                            Le noyau, constitué de l'amande et de la coque, pèse de 1 à 6 g selon les variétés. À l'intérieur du noyau, la graine ou amande, appelée palmiste, est riche en lipides et fournit l'huile de palmiste.
                        </p>
                        <p>
                            Il a été importé de Malaise en 1870 comme plante d’ornement, puis dès 1917, il y est cultivé de manière plus intensive. Dans les années 1960, la culture des palmiers à huile s’est accélérée en Malaisie, puis s’est étendue à l’Indonésie.
                        </p>
                        <p>
                            L'indonésie est le 2e pays producteur d'huile de palme derrière la Malaisie. L'Inde et la Chine sont les plus gros importateurs d'huile de palme et sont pour le moment peu concernés par les dégâts environnementaux causés par cette culture dans les pays de production.
                        </p>
                        <p>

                            <h2>Les méthodes</h2>
                            <br>


                            <h3>Moyens mécaniques</h3>
                            <p>Utilisé pour la récolte des grumes précieuses ou des plantations pour la papeterie, ils sont de plus en plus puissants, de plus en plus destructeurs et participent à la fragmentation de la forêt.
                            </p>
                            <h3>Feu</h3>
                            <p>Cette méthode devient de plus en plus courante et est encore plus destructrice. Les nombreux feux volontairement allumés, jusqu'à 80%, volontairement incontrôlés, et illégaux détruisent en une année des centaines de milliers d'hectares. </p><p>Certaines années la situation est telle que les aéroports de Malaisie, Singapour, Bornéo et de Sumatra doivent être fermés à cause des fumées que dégagent ces incendies.

                                <p>La forêt tropicale est brûlée pour faire place aux cultures de palmiers à huile à Sumatra (Indonésie).
                                </p>
                                <p>
                                    Les terres brûlées sont alors rattachées aux forêts de conversion et données par l'état à des sociétés de plantation généralement asiatiques. C'est la mise devant le fait accompli.
                                </p>
                                <h2>Le commerce du bois</h2>

                                <p>Il alimente l'Europe, la Chine en bois précieux (teck, ébène), l'Asie en pâte à papier (acacia). Environ 80 % du commerce est illégal et il n'y a pas de label type FSC (Forest Stewardship Council) en Indonésie, label destiné à promouvoir durablement l'exploitation des forêts.
                                </p>
                                <h2>Le palmier à huile</h2>

                                <p>Avec une grandeur moyenne de 25 000 hectares par compagnie, et des consortiums montant à plusieurs centaines de milliers d'hectares, toujours en monoculture, quand le dévolu est mis sur une région forestière c'est une catastrophe pour cette région.</p>

                                <h2>La différents noms de l'huile de palme</h2>

                                <p><strong>Huile végétale</strong></p>
                                <ul>

                                    <li>Elaeis guinensis : Nom scientifique de l’huile de palme</li>
                                    <li>Palm oil kernal</li>
                                    <li>Sodium paml kernelate</li>
                                    <li>Palmalein, Palm olein</li>
                                    <li>Palmitic acid : Synonyme = Hexadecylic acid</li>
                                    <li>Palm fruit oil</li>
                                    <li>Hydrated palm glycérides</li>
                                    <li>Palmate</li>
                                    <li>Palmitate</li>
                                    <li>Cetyle palmitate</li>
                                    <li>Octyle palmitate</li>
                                    <li>Tous les noms avec "palm".</li>

                                </ul>
                                <p><strong>Susceptibles d’être de l’huile de palme :</strong></p>
                                <ul>


                                    <li>Sodium laureth sulfate : peut provenir de la noix de coco</li>
                                    <li>Sodium lauryl sulfate (SLS) : peut provenir du ricin</li>
                                    <li>Sodium lauryl lactylate</li>
                                    <li>Sodium lautyl sulfoacetate : peut provenir de la noix de coco</li>
                                    <li>Sodium isostearoyl lactylate</li>
                                    <li>Sodium dodecyl sulfate (SDS ou NaDS) : peut provenir de la noix de coco</li>
                                    <li>Steareth -2, Steareth -20</li>
                                    <li>Cetearyl alcohol : Alcool cétylique / Alcool cetylique</li>
                                    <li>Stearic acid : Acide stéarique peut provenir de la noix de coco</li>
                                    <li>    Glyceryl stéarate</li>
                                    <li>Emulsifiants E422, E430-436, E470-483, E493)495</li>
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
