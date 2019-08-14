<?php
namespace View\Front;

class Home
{


    function render($content){

        include('Head.php');

        ?>



        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 animated fadeInLeft">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/Img/Front/1-20120110103339.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/Img/Front/c-20190228060300.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/Img/Front/1-20180203113327.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                            <div class="container">

                                <article id="content1" class="">
                                    <header>
                                        <h2>Le mot de Chanee</h2>
                                    </header>
                                    <p>Je suis parti en Indonésie à 18 ans, avec comme seul rêve de rencontrer mes amis gibbons libres…. Une fois arrivé à Bornéo, j’ai compris que mes rêves d’enfant ne pourraient jamais être atteints : la jungle était détruite un peu plus chaque jour. Mais petit à petit, nous avons commencé à sauver de jeunes gibbons orphelins… Petit à petit nous avons acquis de l’expérience… Chaque jour, nous avons appris à aider les vies en détresse. Aujourd’hui,      Kalaweit est le plus grand projet de réhabilitation des gibbons au monde. Cela pourrait ressembler à une victoire, pourtant ces gibbons sont la preuve de notre échec : la forêt continue d’être coupée, les gibbons sont arrachés à leur milieu naturel. Aussi, si l’homme apprend un jour à aimer la vie, toute la vie, Kalaweit n’aura plus à lutter . Chanee.
                                    </p>
                                </article>


                        </div>
                        <div class="container">


                            <h2>L'association</h2>

                            L’association Kalaweit (loi française 1901) a été créée en France en 1998. Son objectif est la sauvegarde des gibbons et de leur habitat en Indonésie.

                            <h3> C’est aujourd’hui le plus grand projet de sauvegarde des gibbons au monde. </h3>


                            <p>En Indonésie, les forêts sont mises à mal par l’extraction de bois exotiques et surtout par la production d’huile de palme. Les jeunes gibbons sont capturés pour devenir des animaux de compagnie mais vers 7 ans, âge de la maturité sexuelle, l'animal devient agressif et est tué. Au moment de la capture, les parents ont eux-mêmes été tués.

                            Le gibbon et l'orang-outan sont en danger d'extinction, mais contrairement à l'orang-outan, il n'existait avant l’action menée par Kalaweit, aucun programme de sauvegarde des gibbons à Bornéo et à Sumatra.

                            Si rien n’est fait, les forêts auront disparu des principales îles indonésiennes d’ici 2030, et avec elles, leur faune et leur flore uniques…

                            </p>

                            <h3>Notre éthique</h3>

                            Kalaweit refuse :

                            <ul>
                                <li>D’euthanasier des animaux dans le cadre de la gestion d’une population. L’euthanasie ne peut avoir lieu qu’en dernier recours pour un animal agonisant ou dont la souffrance est permanente.</li>
                                <li>D’acheter et de vendre des animaux sauvages.</li>
                                <li>D’acheter et de vendre des parties d’animaux sauvages.</li>
                                <li>De stériliser les animaux par castration. La stérilisation (vasectomie) sera toujours choisie.</li>
                                <li>D’envoyer un animal vers une institution zoologique ou tout autre établissement.</li>
                                <li>Toute activité provoquant la souffrance de l’animal.</li>
                                <li>Toute activité qui irait à l’encontre des lois en vigueur.</li>
                            </ul>


                                    <header>
                                        <h2>Nos missions</h2>

                                    </header>
                                    <p>Plus de 6 000 gibbons seraient détenus illégalement rien que sur les îles de Bornéo, Sumatra et Java. Kalaweit ne pourra pas tous les sauver. Mais par son action sur le terrain, l’association offre une vie meilleure aux gibbons ex-captifs, certains pourront même être relachés.</P>



                                    <h3>Sauver les gibbons ex-captifs</h3>

                                    <p>Récupérer les gibbons détenus illégalement est une priorité. La plupart du temps, les animaux sont détenus dans des conditions inadaptées: cages exigües, environnement stressant, carences alimentaires, absence de stimulis et de congénère... A cause de ces facteurs, la durée de vie de ces animaux est très réduite, quand ils ne sont pas tout simplement abattus vers 6/7 ans, âge de la maturité sexuelle car devenus ingérables et agressifs.

                                    Pour certains animaux recueillis, un long travail de réadaptation à la vie sauvage est possible. Il faut sélectionner les animaux non porteurs de maladies humaines pour éviter de contaminer les populations de gibbons sauvages. Ces animaux sont rares car la plupart des gibbons recueillis sont porteurs de différentes maladies comme l’herpès simplex ou des hépatites et il sera impossible de les relacher.</p>

                                    <h3>Préserver les forets en Indonésie</h3>

                                    <p>C’est la création de zones protégées, gérées conjointement par le gouvernement, les populations locales et Kalaweit qui permettra de sauvegarder les gibbons. La nécessité de protéger l’environnement commence à se ressentir notamment auprès des populations qui vivent au contact des forêts et qui voient celles-ci disparaître pour laisser la place aux plantations d’huile de palme. D’autres types d’exploitations viennent aggraver cette déforestation : mines de charbon, de diamants ou d’or...

                                    Devant l’ampleur de cette dégradation, Kalaweit achète des zones de forêt et développe des relations plus étroites avec les villageois et les autorités pour augmenter la surface des zones protégées et protéger ainsi la faune sauvage qui y vit.</p>

                                    <h3>Sensibiliser les indonésiens au respect de la nature</h3>

                                <p>L’avenir de la biodiversité, et des gibbons, sera possible si la jeune génération prend conscience de l’importance de préserver l'environnement. C’est ainsi qu'en 2003 Kalaweit a créé la radio Kalaweit FM qui émet sur Bornéo. Ses programmes sont pour les jeunes (musiques, jeux...). Toutes les heures de courts messages à vocation environnementale sont diffusés ce qui de sensibiliser très efficacement une population que Kalaweit n’aurait pas pu atteindre autrement. Cette radio est devenue très populaire et c’est un formidable outil de communication : plus de 65% des animaux recueillis l’ont été grâce aux signalements des auditeurs.

                                    Ecoutez la radio Kalaweit FM

                                    Depuis 2015, la chaîne indonésienne Métro TV diffuse la série "Kalaweit Wildlife Rescue". Composée de 13 épisodes, elle présente le travail de terrain de Chanee et de son équipe pour venir au secours des animaux sauvages en Indonésie qu'il s'agisse de gibbons ou d'autres espèces. C'est un pas important pour la protection des animaux en Indonésie car tout reste à faire, il n'y a quasiment pas d'éducation au sort des espèces sauvages et encore moins quant aux notions de bien-être animal.

                                    Enfin l'application Kalaweit pour les smartphone permet de suivre l'actualité de Kalaweit, d'écouter la radio, de suivre les patrouilles aériennes, de faire un don....</p>



                                    <h3>Intégrer la population et les autorités à nos actions</h3>

                                    <p>L’intégration de la population locale et des autorités au fonctionnement du projet est essentielle. L’embauche de personnel local créé une proximité et un lien avec les villageois qui s’intéressent ainsi à la protection de leur faune et de leur forêt. Des soins médicaux sont prodigués gratuitement par l’association aux employés et à leurs famille.

                                    Inclure les autorités est un autre point fondamental. La lutte contre le braconnage ou contre les coupes de bois illégales se fait avec la collaboration de la police indonésienne, qui soutient ainsi ouvertement le travail de l’association.</p>
</div>
                        </div>
                        <div class="col-md-3 animated fadeInRight asideK">
                            <?php
                                echo $content["aside"];
                             ?>
                        </div>
                    </div>

                </div>
            </div>


            <?php

            include("Footer.php");
        }
    }
