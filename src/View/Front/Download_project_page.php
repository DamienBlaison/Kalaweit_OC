<?php  namespace View\Front;

/**
*
*/
class Download_project_page {

    function render($content){

        require_once('Head.php');

        ?>
        <div id="download_container" class="container">


        <div class="jumbotron download_project_jumbo">
            <h1 class="display-4">Projet 5 : Refonte site/admin Kalaweit.org</h1>
            <br>
            <p class="lead">Le projet étant assez conséquent , la limite de dépot sur la plateforme OC ne me permettait pas de le mettre à disposition directement sur cette dernière.</p>
            <p class="lead">Pour télécharger le projet, merci de renseigner la clé fournie puis cliquer sur le bouton ci-dessous.</p>

            <hr class="my-4">

            <form class="row" action="" method="post">
                <div class="col-md-10">
                    <input type="password" name="password_download_project">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success"><span class="fa fa-download"></span>
                      Télecharger
                    </button>
                </div>


            </form>
            </div>

        </div>

        <?php

        require_once("Footer.php");

        echo '<script src="/Js/Front/Download_project.js"></script>';

    }
}
