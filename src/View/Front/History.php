<?php namespace View\Front;

/**
*
*/
class History
{

    function render($content){

        include('Head.php');

        ?>
        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-9 animated slideInLeft" id="aside-left">
                        <h2>Historique</h2>
                        <br>
                        <ul>
                            <li>1997 : Création de l’association Etho-Passion, ensuite renommée Kalaweit qui signifie « gibbon » en langue dayak (peuple d’Indonésie).
                            </li>
                            <li>1998 : Grâce à une aide financière de la comédienne Muriel Robin, Chanee arrive en Asie.
                            </li>
                            <li>1999 : Signature d’un protocole d’accord avec les autorités, le ministère indonésien des Forêts et Kalaweit. Ce protocole concerne Bornéo et Sumatra et permet :
                                •    de réhabiliter les gibbons captifs détenus par les populations et les braconniers
                                •    d’informer, de sensibiliser et d’éduquer les populations locales.
                                •    de protéger les forêts tropicales.
                            </li>
                            <li>L’association obtient l’autorisation d’installer son projet au cœur du parc national de Bukit Baka-Bukit Raya à Bornéo. La première station d’accueil des animaux y est construite. A la fin de l’année 2000, 17 gibbons ont été recueillis.
                            </li>
                            <li>2001 : l’association installe son « Care Center » dans la ville de Palangkaraya à Bornéo. C’est un lieu comportant un espace de quarantaine permettant de réaliser les premiers bilans sanitaires sur les gibbons nouvellement recueillis.
                            </li>
                            <li>2002 : un doctorat de 18 mois sur la viabilité du processus de réhabilitation mis en œuvre par Kalaweit est entrepris. Les résultats sont présentés au congrès de l’International Primate Society de Turin en 2004.
                            </li>
                            <li>Installation d'un centre sur l’île d’Hampapak à Bornéo qui est une forêt-sanctuaire inhabitée pouvant accueillir des gibbons.
                            </li>
                            <li>Un accord est signé avec les habitants de la ville de Mintin pour permettre les premiers relâcher de gibbons sur l’île de Mintin à Bornéo. Cette île est aujourd’hui sous la seule responsabilité des villageois.
                            </li>
                            <li>Fin 2002 : 68 gibbons ont été recueillis depuis le début de l’aventure.
                            </li>
                            <li>2003 : création de la radio Kalaweit FM qui émet sur Bornéo. Les programmes sont destinés aux jeunes et des messages environnementaux sont diffusés toutes les heures. L’objectif est de sensibiliser les jeunes indonésiens à la protection de leur environnement.
                            </li>
                            <li>Création de Kalaweit Sumatra, sur l’île de Marak. Ce site est un point stratégique pour contrôler les trafics d’animaux.
                            </li>
                            <li>2004 : signature d’un second protocole d’accord à l’échelle nationale entre Kalaweit et les autorités indonésiennes.
                            </li>
                            <li>Fin 2004 : plus de 240 gibbons ont été recueillis.
                            </li>
                            <li>2005 : arrivée des premiers volontaires à Bornéo et création d’un sanctuaire de 1 000 hectares près de l’île d’Hampapak.
                            </li>
                            <li>2006 : 2 couples de gibbons sont relâchés sur l’île Mintin à Bornéo.
                            </li>
                            <li>2008 : réception d’un gibbon de Kloss. C’est une espèce très menacée et absente des parcs zoologiques du monde entier, excepté à Jakarta et peut-être ailleurs en Asie.
                            </li>
                            <li>2009 : Kalaweit devient le partenaire du département des Forêts pour la gestion de la réserve de Pararawen, zone de 5 300 hectares situés au nord est de la province centrale de Kalimantan (Bornéo).
                            </li>
                            <li>2010 : à Bornéo, transfert des animaux du site d’Hampapak jusqu’au Gibbon Conservation Center de Pararawen, situé dans la région de Muara Teweh, à 300 km de là. C’est un lieu idéal pour l’observation de populations de gibbons sauvages, pour la réhabilitation des animaux et le renforcement des populations sauvages ainsi que pour l’étude et le suivi génétique des espèces de gibbons endémiques à l’Indonésie.
                            </li>
                            <li>2011 : acquisition de terrains à Supayang (village de Sumatra). Démarrage de la construction du Gibbon Conservation Center à Supayang, qui remplace celui de l’île Marak.
                            </li>
                            <li>Acquisition de la réserve de Supayang, limitrophe au Gibbon Conservation Center de Sumatra.
                            </li>
                            <li>2012 : premières utilisation d'un paramoteur. Il permet de survoler la forêt et de renforcer les patrouilles de surveillance des réserves.
                            </li>
                            <li>2013 : construction de 2 nouvelles cliniques vétérinaires dans les Gibbon Conservation Center de Pararawen (Bornéo) et Supayang (Sumatra).
                            </li>
                            <li>2014 : la réserve de Supayang à Sumatra atteint 211,3 hectares. Démarrage du programme de relâcher de plusieurs familles de siamangs.
                            </li>
                            <li>La réserve de Hampapak à Bornéo a malheureusement été détruite et transformée en plantation de palmiers à huile.
                            </li>
                            <li>2015 : Diffusion de la série "Kalaweit Wildlife Rescue" sur Metro TV, une des plus grosses chaînes d'info en Indonésie.
                            </li>
                            <li>2016 : démarrage des achats d'hectares de forêt à Bornéo, et création de la réserve de Pararawen Kalaweit sur cette île.
                            </li>
                            <li>2017 : création de la Magkolisoi reserve sur Bornéo.
                            </li>
                        </ul>
                    </div>
                    <div  class="col-md-3 animated slideInRight asideK">
                        <div class="Wrapper">
                            <?php
                                echo $content["aside"];
                             ?>
                        </div>
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
