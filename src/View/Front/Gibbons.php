<?php namespace View\Front;

/**
*
*/
class Gibbons
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-9 animated slideInLeft" id="aside-left">

                        <h2>Le Gibbon</h2>

                        <img src="/Img/Front/1-20180203113253.png" alt="" style ="width:100%; margin-top:20px; margin-bottom:20px;">

                        <p>Le gibbon est un primate de la famille des hylobatidés. Il appartient à la famille des grands singes composée des gorilles, des bonobos, des orang-outans, des chimpanzés et bien sûr des gibbons.<br><br>Comme l’humain et les autres grands singes, il fait partie des hominoïdés. On le trouve dans les forêts tropicales d’Asie du Sud-Est : Thaïlande, Cambodge, Vietnam, Chine, Laos, Bangladesh, Birmanie (Myanmar), Inde, Malaisie et Indonésie.<br><br>Il existe 17 espèces de gibbons, toutes menacées du fait de la disparition de leur habitat. <br>Certaines sont endémiques à l’Indonésie :</p>
                        <p>
                            <ul>
                                <li>Sumatra : gibbon agile (Hylobates agilis), gibbon à mains blanches (Hylobates LAR), siamang (Symphalangus syndactylus), gibbon de Kloss (Hylobates Klossii),</li>
                                <li>Bornéo (Kalimantan) : gibbon à barbe blanche (Hylobates albibarbis), gibbon de Müller (Hylobates muelleri)</li>
                                <li>Java : gibbon de Moloch (Hylobates Moloch) aussi appelé gibbon de Java, gibbon argenté ou gibbon cendré.</li>
                            </ul>

                            <h3>Spécificités</h3>
                            <p>Le gibbon est un singe arboricole qui se déplace dans les arbres avec une agilité et une rapidité remarquables. Il se nourrit de fruits, de feuilles, de fleurs, parfois d’insectes, d’œufs ou d’oiseaux. Il mesure de 70 cm à un mètre de haut et peut vivre jusqu’à 40 ans. Il ne sait pas nager et on ne le voit quasiment jamais rarement au sol. Il partage son territoire avec d’autres primates comme les orang outans et les macaques, qui vivent un peu plus bas dans les arbres.<br><br>
                                Le gibbon est monogame et la femelle met au monde un seul petit après 7 mois de gestation (une naissance tous les 2 à 4 ans). Les jeunes sont sevrés vers l’âge de 2 ans et restent avec leurs parents jusqu’à l’âge de 7 ans, avant de partir à la recherche d’un partenaire avec lequel ils resteront toute leur vie. Le mâle et la femelle partagent la dominance, mais seule la femelle transporte les petits. Chaque couple vit sur un territoire d’une douzaine d’hectares qu’il délimite chaque matin avec un chant bien particulier. Ce chant est l’une des causes de leur disparition : il permet aux braconniers de localiser facilement les animaux. Ils sont chassés pour le commerce illicite de la faune sauvage ou pour la médecine traditionnelle. Ce sont des animaux très territoriaux, capables de s’entretuer pour un territoire. L'homme est son principal prédateur.<br><br>Le siamang, qui est le plus grand des gibbons, est reconnaissable à ses 2 doigts fusionnés sur chaque main. On le trouve principalement sur l’île de Sumatra. Il a une poche gutturale qui se gonfle lorsqu’il chante.<br><br>Les 17 espèces de gibbons sont protégées par l’annexe 1 de la Convention de Washington, rédigée le 3 mars 1973 et ratifiée par la France le 31 décembre 1992. Les gibbons sont sur la liste rouge de l’UICN (Union Internationale pour la Conservation de la Nature) c'est-à-dire menacés d’extinction à court terme.<br><br>Environ 3 000 gibbons seraient détenus illégalement par des particuliers rien que pour l'île de Bornéo.<br><br>On estime à 80 000 le nombre de gibbons vivants à l’état sauvage dans toute l’Asie du Sud-Est (chiffres UICN).<br><br>Le gibbon de Hainan (Nomascus hainanus) en Chine est le plus menacé. En 2015, il restait 28 de ces animaux à l’état naturel.<br><br>Il resterait environ 1 500 gibbons de Kloss sur les îles Mentawai, situées au large de Sumatra.
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
