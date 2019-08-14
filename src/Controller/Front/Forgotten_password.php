<?php
    namespace Controller\Front;

    /**
     *
     */
    class Forgotten_password

        {

            function render(){

                if(isset($_POST['login'])){

                    $bdd = (new \Manager\Connexion())->getBdd();

                    $check = (new \Manager\Member($bdd))->get_id_from_Login(htmlspecialchars($_POST['login']));

                    if(isset($check['cld_valc'])){

                    $p_to = htmlspecialchars($_POST["login"]);
                    $p_subject = 'Reintialisation du mot de passe';
                    $token = md5(uniqid());

                    (new \Manager\Sso_token(htmlspecialchars($_POST["login"]),$token,$bdd))->add();

                    $p_body = "
                    <p>
                    Bonjour,
                    </p>
                    <p>
                    vous avez souhaitez réinitialiser votre mot de passe .
                    <p>
                    </p>
                    Merci de cliquer sur le lien ci dessous :
                    </p>
                    <p><a href='/www/Maj_password?token=$token'>/www/Maj_password?token=$token</a>
                    </p>
                    <br>
                    <p>Ce lien sera valable 24 heures.</p>

                    <br>
                    <p>Cordialement</p>
                    <p>Kalaweit Administration</p>

                    ";

                    require_once( __DIR__ .'/../../../Manager/Send_mail.php');

                    send_mail($p_to,$p_subject,$p_body);

                    //header("Location: /www/Connexion");

                    }

                    else {

                        echo '<script> alert("Ce compte n\'existe pas !");</script>';
                    }

                }


            $aside = (new \View\Front\Aside())->render();

            $info_member = [

            "login"      => (new \Controller\Front\htmlElement\Form_group_input('login','text,','Identifiant','','fa fa-lock','required'))->render(),
            "submit"     => (new \Controller\Front\htmlElement\Form_group_btn('submit','btn-form ','receipt_btn','Envoi demande de réinitialisation'))->render()


        ];

        $content = [

            "param" =>$info_member,
            "aside" => $aside
        ];



        return (new \View\Front\Forgotten_password())->render($content);

        }
    }

 ?>
