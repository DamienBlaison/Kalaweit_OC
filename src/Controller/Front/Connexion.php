<?php
    namespace Controller\Front;

    /**
     *
     */
    class Connexion

        {

            function render(){

                /* instanciation de la connexion a la bdd */

                $bdd = (new \Manager\Connexion())->getBdd();

                /* verification de la presence du login et du mdp dans le formulaire lors de l envoi de la demande de connexion*/

                if ( isset($_POST['login']) && isset($_POST['password'] )) {

                    /* appelle de la methode de verification */

                    $check = (new \Manager\Member($bdd))->log_in();
                }




            $bdd = (new \Manager\Connexion())->getBdd();;

            $aside = (new \View\Front\Aside())->render();

            $info_member = [

            "login"      => (new \Controller\Front\htmlElement\Form_group_input('login','text,','Identifiant','','fa fa-lock','required'))->render(),
            "password"   => (new \Controller\Front\htmlElement\Form_group_input('password','password','Mot de passe', '','fa fa-lock','required'))->render(),
            "submit"     => (new \Controller\Front\htmlElement\Form_group_btn('submit','btn-form ','receipt_btn','Enregistrer'))->render()


        ];

        $content = [

            "param" =>$info_member,
            "aside" => $aside
        ];



        return (new \View\Front\Connexion())->render($content);

        }
    }

 ?>
