<?php
namespace Controller\Front;

/**
*
*/
class Maj_password

{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [

            "aside" => $aside
        ];


        $bdd = (new \Manager\Connexion())->getBdd();

        $token = htmlspecialchars($_GET['token']);

        $sso_token = new \Manager\Sso_token('',$token,$bdd);

        $login = $sso_token->get_login();

        if($login === false){

            (new \View\Front\Link_dead())->render($content);
        }

        else{

            if(isset($_POST['new_password']) && isset($_POST["new_password_confirm"])){

                if(htmlspecialchars($_POST['new_password']) === htmlspecialchars($_POST["new_password_confirm"])){

                    (new \Manager\Member($bdd))->maj_password(htmlspecialchars($login["ptok_email"]),htmlspecialchars($_POST["new_password"]));

                    header("Location: /www/Connexion");

                    $sso_token->delete();

                } else {

                    echo '<script> alert("Les mots de passe sont différents, merci de recommencer"); </script>';

                }

            }

            (new \View\Front\Maj_password())->render($content);
        }
    }
}
