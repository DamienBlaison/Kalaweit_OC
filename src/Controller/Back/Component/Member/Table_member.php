<?php
/* classe permetttant de récupérer les informations relatives au au cause sous forme de liste paginée via l'url */

namespace Controller\Back\Component\Member;

class Table_member
{
    use \Controller\Transverse\Get_param_request;

    function render(){

        /* application de la méthode de récupération des params passés dans l'url */

        $param_request = $this->Get_param_request();

        /* instanciation de la connexion à la bdd */

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        /* instanciation de l'objet membre */

        $memberM        = new \Manager\Member($bddM);

        /* récupération des données sous forme d'un array via la méthode get_list en passant les params contenu dans param_request*/

        $list = $memberM->get_list($param_request);

        $request = '';

        /* initialisation des valeurs à afficher dsans les champs de saisie si remplis*/

        if(isset($_GET['cli_firstname'])){ $cli_firstname = $_GET['cli_firstname'];} else { $cli_firstname = '';};
        if(isset($_GET['cli_lastname'])){ $cli_lastname = $_GET['cli_lastname'];} else { $cli_lastname = '';};
        if(isset($_GET['cli_id'])){ $cli_id = $_GET['cli_id'];} else { $cli_id = '';};
        if(isset($_GET['cli_cp'])){ $cli_cp = $_GET['cli_cp'];} else { $cli_cp = '';};
        if(isset($_GET['cli_town'])){ $cli_town = $_GET['cli_town'];} else { $cli_town = '';};

        /* définition des champs de recherches sous forme de tableaux que l'on pourra parcourrir*/

        $fields =

        [

            [
                "type_balise"   => 'input',
                "id"            => 'cli_firstname',
                "type"          => 'text',
                "name"          => 'cli_firstname',
                "placeholder"   => 'Prénom',
                "class"         => '3',
                "value"         =>  $cli_firstname
            ]
            ,

            [
                "type_balise"   => 'input',
                "id"            => 'cli_lastname',
                "type"          => 'text',
                "name"          => 'cli_lastname',
                "placeholder"   => 'Nom',
                "class"         => '3',
                "value"         =>  $cli_lastname
            ]


            ,

            [
                "type_balise"   => 'input',
                "id"            => 'cli_cp',
                "type"          => 'text',
                "name"          => 'cli_cp',
                "placeholder"   => 'Zip',
                "class"         => '2',
                "value"         =>  $cli_cp
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'cli_town',
                "type"          => 'text',
                "name"          => 'cli_town',
                "placeholder"   => 'Ville',
                "class"         => '2',
                "value"         =>  $cli_town
            ]

        ];

        /* définition des champs des infos à passées à la vue via un tableau de data */

        $data =[
            "table"             => $list["list_member"],
            "head"              => $list["head"],
            "count"             => $list["count"][0],
            "title"             => "Liste des membres"
        ];

        $id = "list_member_filtered";

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
