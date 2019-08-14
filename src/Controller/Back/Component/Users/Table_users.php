<?php
namespace Controller\Back\Component\Users;

/**
*
*/
class Table_users
{
    use \Controller\Transverse\Get_param_request;

    function render(){

        /* instanciation des recupération des elements de filtre via le trait Get_param_request*/

        $param_request = $this->Get_param_request();

        /* instanciation de la connexion a la bdd */

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        /* instanciation de l'objet Users */

        $userM        = new \Manager\Users($bddM);

        /* application de la methode get_list pour récupération des infos de la liste des causes*/

        $list = $userM->get_list($param_request);

        $request = '';

        /* vérifcaition si des param de request sont passés dans l'url , si oui on initialise les variables pour les afficher dans le formulaire */


        if(isset($_GET['user_first_name'])){ $user_first_name = $_GET['user_first_name'];} else { $user_first_name = '';};
        if(isset($_GET['user_last_name'])){ $user_last_name = $_GET['user_last_name'];} else { $user_last_name = '';};
        if(isset($_GET['user_active'])){ $user_active = $_GET['user_active'];} else { $user_active = '';};
        if(isset($_GET['user_email'])){ $user_email = $_GET['user_email'];} else { $user_email = '';};
        if(isset($_GET['user_login'])){ $user_login = $_GET['user_login'];} else { $user_login = '';};

        /* définition des champs de recherches sous forme de tableaux que l'on pourra parcourrir*/

        $fields =

        [

            [
                "type_balise"   => 'input',
                "id"            => 'user_first_name',
                "type"          => 'text',
                "name"          => 'user_first_name',
                "placeholder"   => 'Prénom',
                "class"         => '6',
                "value"         =>  $user_first_name
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'user_last_name',
                "type"          => 'text',
                "name"          => 'user_last_name',
                "placeholder"   => 'Nom',
                "class"         => '6',
                "value"         =>  $user_last_name
            ]
            ,

            [
                "type_balise"   => 'input',
                "id"            => 'user_login',
                "type"          => 'text',
                "name"          => 'user_login',
                "placeholder"   => 'login',
                "class"         => '3',
                "value"         =>  $user_login
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'user_email',
                "type"          => 'text',
                "name"          => 'user_email',
                "placeholder"   => 'email',
                "class"         => '3',
                "value"         =>  $user_email
            ]

            ,


            [
                "type_balise"   => 'input',
                "id"            => 'user_active',
                "type"          => 'text',
                "name"          => 'user_active',
                "placeholder"   => 'Actif = 1, inactif = 0',
                "class"         => '4',
                "value"         =>  $user_active
            ]

        ];

        /* définition des champs des infos à passées à la vue via un tableau de data */

        $data =[
            "table"             => $list["content"],
            "head"              => $list["head"],
            "count"             => $list["count"][0],
            "title"             => "Liste des utilisateurs"
        ];

        $id = "list_users_filtered";

        /***************************************************************************************************************************/

        /**     Synthese des elements à passer a la vue   **/

        /***************************************************************************************************************************/

        return $p_render = [
            "fields"     => $fields ,
            "data"       => $data,
            "id"         => $id
        ];
    }

}
