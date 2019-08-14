<?php
/* classe permettant de gérer les infos liées au utilisateurs de l'application */

namespace Controller\Back;

class Users
{
    /* intégration du trait Get_param_request pour récupération des filtres eventuellemnt appliqués et ou a appliquer */

    use \Controller\Transverse\Get_param_request;

    /* methode  permettant de récupérer la liste des utilisateurs */

    function get_list(){

        /* instanciation du composant Table user */

        $p_render = (new \Controller\Back\Component\Users\Table_users)->render();

        /* instanciation de la vue avec comme parametre l'opbjet precedement crée */

        return (new \View\Back\Table\Table_filter)->render($p_render);

    }

    /* methode  permettant d'ajouter un nouvel utilisateur */

    function add(){

        /* instanciation de la connexio a la BDD */

        $bdd = (new \Manager\Connexion())->getBdd();



        include( __DIR__ .'/../../../config/config.php');



        $server = $config["host"]["host"];
        $host = $config["Connexion"][$server]["site"];

        /* verification de la présence des elements des données dans POST pour permettre la création del'utilisateur */

        if (isset($_POST)){

            if

            (
                ((isset($_POST["user_login"]))&&($_POST["user_login"])!= '')&&
                ((isset($_POST["user_first_name"]))&&($_POST['user_first_name'])!='')&&
                ((isset($_POST["user_last_name"]))&&($_POST['user_last_name'])!='')&&
                ((isset($_POST["user_email"]))&&($_POST['user_email'])!='')&&
                ((isset($_POST["user_roles"]))&&($_POST['user_roles'])!='')


                )
                /* si toute les conditions sont remplies alors on crée l'utilsateur en bdd via la methode add() du manager */

                {

                    (new \Manager\Users($bdd))->add();

                    $p_to = $_POST["user_email"];
                    $p_subject = 'Création de compte admin Kalaweit';
                    $token = md5(uniqid());

                    (new \Manager\Sso_token($_POST["user_login"],$token,$bdd))->add();

                    $p_body = "
                    <p>
                    Bonjour,
                    </p>
                    <p>
                    Un compte administrateur a été créé pour vous .
                    Merci d'initialiser votre mot de passe en suivant le lien ci dessous .
                    </p>
                    <p> <strong>Votre login de connexion sera : ".$_POST['user_login']." </strong></p>
                    <p><a href='http://".$host."/www/Kalaweit/app_connexion/maj_pwd?token=$token'>http://".$host."/www/Kalaweit/app_connexion/maj_pwd?token=$token</a>
                    </p>
                    <br>
                    <p>Ce lien sera valable 24 heures.</p>

                    <br>
                    <p>Cordialement</p>
                    <p>Kalaweit Administration</p>

                    ";

                    require_once(__DIR__ .'/../../Manager/Send_mail.php');

                    send_mail($p_to,$p_subject,$p_body);

                    echo '<script> alert("Mail de création de compte bien envoyé ");</script>';

                }

        }

        /* sinon on affiche une alerte */

        else {

            echo "<script> alert('au moins un des champs n\'est pas renseigné')</script>";
        }


    /* récupéraiton des elements de config a passer dans le formulaire*/

    $gender = (new \Manager\Gender())->getAll();
    $lang  = (new \Manager\Cli_lang())->getAll();
    $role = (new \Manager\Role())->getAll();

    /* création d'un tableau d'élément HTML à passer à la vue */

    $box_identification_content =
    [
        $user_title = (new \Controller\Back\htmlElement\Form_group_select("user_title",$gender,"","fa fa-venus-mars","config"))->render(),
        $firstname = (new \Controller\Back\htmlElement\Form_group_input("user_first_name","Prénom","","fa fa-user"))->render(),
        $lastname = (new \Controller\Back\htmlElement\Form_group_input("user_last_name","Nom","","fa fa-user"))->render(),
        $mail = (new \Controller\Back\htmlElement\Form_group_input("user_email","Email","","fa fa-at"))->render(),
        $login = (new \Controller\Back\htmlElement\Form_group_input("user_login","Login","","fa fa-lock"))->render(),
        $lang = (new \Controller\Back\htmlElement\Form_group_select("user_preferred_language",$lang,"","fa fa-commenting","config"))->render(),
        $user_role = (new \Controller\Back\htmlElement\Form_group_select("user_roles",$role,"","fa fa-gear","config"))->render(),

        $submit_identification = (new \Controller\Back\htmlElement\Form_group_btn("submit","btn btn-primary pull-right","submit_identification","Ajouter cet utilisateur"))->render()

    ];

    $param = [

        "box_identification" => (new \Controller\Back\htmlElement\Box("Informations utilisateur","box-primary",$box_identification_content,""))->render(),

    ];

    return (new \View\Back\Users\Add_user())->render($param);

}

/* methode  permettant la MAJ d'un utilisateur */

function update(){

    /* instanciation de la connexio a la BDD */

    $bdd = (new \Manager\Connexion())->getBdd();

    /* application de la méthode permettant la maj au chargement de la page (si il y a des infos dans le post -> MAJ) */

    (new \Manager\Users($bdd))->update();

    /* instanciation de l'objet Users , application de la methode get pour cibler un user en particulier */

    $user = (new \Manager\Users($bdd))->get();

    /* récupéraiton des elements de config a passer dans le formaulaire*/

    $gender = (new \Manager\Gender())->getAll();
    $lang  = (new \Manager\Cli_lang())->getAll();
    $role = (new \Manager\Role())->getAll();

    /* création d'un tableau d'élément HTML à passer à la vue */

    $box_identification_content =
    [
        $user_title = (new \Controller\Back\htmlElement\Form_group_select("user_title",$gender,$user["user_title"],"fa fa-venus-mars","config"))->render(),
        $firstname = (new \Controller\Back\htmlElement\Form_group_input("user_first_name","Prénom",$user["user_first_name"],"fa fa-user"))->render(),
        $lastname = (new \Controller\Back\htmlElement\Form_group_input("user_last_name","Nom",$user["user_last_name"],"fa fa-user"))->render(),
        $mail = (new \Controller\Back\htmlElement\Form_group_input("user_email","Email",$user["user_email"],"fa fa-at"))->render(),
        $lang = (new \Controller\Back\htmlElement\Form_group_select("user_preferred_language",$lang,$user["user_preferred_language"],"fa fa-commenting","config"))->render(),
        $user_role = (new \Controller\Back\htmlElement\Form_group_select("user_roles",$role,$user["user_roles"],"fa fa-gear","config"))->render(),

        $submit_identification = (new \Controller\Back\htmlElement\Form_group_btn("submit","btn btn-primary pull-right","submit_identification","Sauvegarder les informations"))->render()

    ];

    /* création d'un tableau d'élément HTML à passer à la vue */

    $box_download_avatar_content =
    [
        $avatar_img = (new \Controller\Back\htmlElement\Img('/Img/Avatar/'.$user["user_avatar"],$user["user_first_name"],'avatar_user_admin'))->render(),
        $avatar_link = '<a href="/www/Kalaweit/users/crop?user_id='.$_GET['user_id'].'" class="btn btn-primary col-md-12">Modifier l\'Avatar</a>'
    ];

    /* création d'un tableau d'élément HTML à passer à la vue */

    $box_avatar_img_content = [

        ];

    /* création d'un tableau d'élément HTML à passer à la vue */

    if($user["user_active"] == 1){

        $box_activation_account_content = [

            $activation_activate = (new \Controller\Back\htmlElement\Form_group_btn("submit","btn btn-danger col-md-12","account_desactivation","Désactiver le compte"))->render()

        ];

    } else {

        $box_activation_account_content = [

            $activation_activate = (new \Controller\Back\htmlElement\Form_group_btn("submit","btn btn-success col-md-12","account_activation","Activer le compte"))->render(),

        ];
    };

    /* Synthese des elements à passer a la vue */

    $param = [

        "box_identification" => (new \Controller\Back\htmlElement\Box("Informations utilisateur","box-primary",$box_identification_content,""))->render(),
        "box_init_avatar"    => (new \Controller\Back\htmlElement\Box("Avatar","box-primary",$box_download_avatar_content,""))->render(),
        "box_avatar"         => (new \Controller\Back\htmlElement\Box("Image du profil","box-primary",$box_avatar_img_content,""))->render(),
        "box_activation"     => (new \Controller\Back\htmlElement\Box("Activation/désactivation","box-primary",$box_activation_account_content,""))->render()

    ];

    /* instanciation de la vue avec comme param le tableau précédement créé */

    return (new \View\Back\Users\User())->render($param);

}

/* methode  permettant la suppression d'un utilisateur */

function delete(){

    /* instanciation de la connexio a la BDD */

    $bdd = (new \Manager\Connexion())->getBdd();

    /* instanciation de l'objet Users et application de la methode delete */

    (new \Manager\Users($bdd))->delete();

}

/* methode  permettant la MAJ de l'avatar d'un utilisateur */

function crop(){

    (new \View\Back\Users\Crop_avatar())->render();

}

}
