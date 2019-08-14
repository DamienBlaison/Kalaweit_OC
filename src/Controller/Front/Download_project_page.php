<?php namespace Controller\Front;

/**
*
*/
class Download_project_page
{
    function render(){

        if(isset($_POST["password_download_project"])& $_POST["password_download_project"] == '94332aeaa1c743366413a63a3139b5b8' ){

            //header('Location : /Download_project');

            header("Location:/www/Download_project");
        }

        else {

            echo '<script>alert("La clé est inexistante ou érronée, merci de renseigner une clé valide pour pouvoir télécharger le projet !")</script>';
        }

        $content = [];

        (new \View\Front\Download_project_page())->render($content);
    }
}
