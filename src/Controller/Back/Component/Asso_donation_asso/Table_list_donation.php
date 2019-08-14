<?php
/* classe permetttant de récupérer les informations de dons sous forme de liste paginée */

namespace Controller\Back\Component\Asso_donation_asso;

class Table_list_donation
{
    /* intégartion du trait Get_param_request pour récupération des filtres eventuellemnt appliqués et ou a appliquer */

    use \Controller\Transverse\Get_param_request;

    function render(){

        /* application de la méthode de récupération des params passés dans l'url */

        $param_request = $this->Get_param_request();

        /* instanciation de la connexion a la bdd */

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        /* instanction du manager de l'objet Asso_donation_asso*/

        $Asso_donation_asso       = new \Manager\Asso_donation_asso($bddM);

        /* récupération des données de la liste en passant les paramètres de filtre) */

        $list = $Asso_donation_asso->get_list($param_request);

        $request = '';

        /* vérifcation si des param de request sont passés dans l'url , si oui on initialise les variables pour les afficher dans le formulaire */


        if(isset($_GET['cau_name'])){$cau_name = $_GET['cau_name']; } else { $cau_name = '';};

        if(isset($_GET['cli_firstname'])){$cli_firstname = $_GET['cli_firstname']; } else { $cli_firstname = '';};
        if(isset($_GET['cli_lastname'])){$cli_lastname = $_GET['cli_lastname']; } else { $cli_lastname = '';};
        if(isset($_GET['don_status'])){$don_status = $_GET['don_status']; } else { $don_status = '';};
        if(isset($_GET['rec_number'])){$rec_number = $_GET['rec_number']; } else { $rec_number = '';};
        if(isset($_GET['don_ts'])){$don_ts = $_GET['don_ts']; } else { $don_ts = '';};

        /* définition des champs de recherches sous forme de tableaux que l'on pourra parcourrir*/

        $fields =

        [

            [
                "type_balise"   => 'input',
                "id"            => 'cli_firstname',
                "type"          => 'text',
                "name"          => 'cli_firstname',
                "placeholder"   => 'Prénom',
                "class"         => '4',
                "value"         =>  $cli_firstname
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'cli_lastname',
                "type"          => 'text',
                "name"          => 'cli_lastname',
                "placeholder"   => 'Nom',
                "class"         => '4',
                "value"         =>  $cli_lastname
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'cau_name',
                "type"          => 'text',
                "name"          => 'cau_name',
                "placeholder"   => 'Bénéficiaire',
                "class"         => '4',
                "value"         =>  $cau_name
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'don_ts',
                "type"          => 'text',
                "name"          => 'don_ts',
                "placeholder"   => 'Date',
                "class"         => '4',
                "value"         =>  $don_ts
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'don_status',
                "type"          => 'text',
                "name"          => 'don_status',
                "placeholder"   => 'Statut',
                "class"         => '4',
                "value"         =>  $don_status
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'receipt',
                "type"          => 'text',
                "name"          => 'rec_number',
                "placeholder"   => 'Reçu : 0 ou 1',
                "class"         => '2',
                "value"         =>  $rec_number
            ]


        ];

        /* définition des champs des infos à passées à la vue via un tableau de data */

        $data =[

            "table"             => $list["list_donation"],
            "head"              => $list["head"],
            "count"             => $list["count"][0],
            "title"             => "Dons Association",

        ];

        /***************************************************************************************************************************/

        /**     Synthese des elements à passer a la vue   **/

        /***************************************************************************************************************************/


         return $p_render = [
            "fields"     => $fields ,
            "data"       => $data,
            "id"         => "Table_list_donation",
        ];

    }

}
