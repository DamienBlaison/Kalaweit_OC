<?php
namespace Controller\Back\Component\Asso_adhesion;

/**
 *
 */
class Table_list_adhesion
{
    use \Controller\Transverse\Get_param_request;

    function render(){


        $param_request = $this->Get_param_request();

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        $asso_adhesion       = new \Manager\Asso_adhesion($bddM);

        $list = $asso_adhesion->get_list($param_request);

        $request = '';

        if(isset($_GET['adhesion_id'])){$adhesion_id = $_GET['adhesion_id']; } else { $adhesion_id = '';};
        if(isset($_GET['cli_id'])){$cli_id = $_GET['cli_id']; } else { $cli_id = '';};
        if(isset($_GET['cli_firstname'])){$cli_firstname = $_GET['cli_firstname']; } else { $cli_firstname = '';};
        if(isset($_GET['cli_lastname'])){$cli_lastname = $_GET['cli_lastname']; } else { $cli_lastname = '';};
        if(isset($_GET['adhesion_status'])){$adhesion_status= $_GET['adhesion_status']; } else { $adhesion_status = '';};
        if(isset($_GET['rec_number'])){$receipt = $_GET['rec_number']; } else { $receipt = '';};
        if(isset($_GET['adhesion_ts'])){$adhesion_ts = $_GET['adhesion_ts']; } else { $adhesion_ts = '';};

        $fields =

        [

            [
                "type_balise"   => 'input',
                "id"            => 'cli_firstname',
                "type"          => 'text',
                "name"          => 'cli_firstname',
                "placeholder"   => 'Prénom',
                "class"         => '2',
                "value"         =>  $cli_firstname
            ]

            ,

            [
                "type_balise"   => 'input',
                "id"            => 'cli_lastname',
                "type"          => 'text',
                "name"          => 'cli_lastname',
                "placeholder"   => 'Nom',
                "class"         => '2',
                "value"         =>  $cli_lastname
            ]
            ,

            [
                "type_balise"   => 'input',
                "id"            => 'adhesion_ts',
                "type"          => 'text',
                "name"          => 'adhesion_ts',
                "placeholder"   => 'Date',
                "class"         => '2',
                "value"         =>  $adhesion_ts
            ]
            ,

            [
                "type_balise"   => 'input',
                "id"            => 'adhesion_status',
                "type"          => 'text',
                "name"          => 'adhesion_status',
                "placeholder"   => 'Statut',
                "class"         => '2',
                "value"         =>  $adhesion_status
            ],

            [
                "type_balise"   => 'input',
                "id"            => 'receipt',
                "type"          => 'text',
                "name"          => 'rec_number',
                "placeholder"   => 'Reçu : 0 ou 1',
                "class"         => '2',
                "value"         =>  $receipt
            ]

        ];

        $data =[

            "table"             => $list["list_adhesion"],
            "head"              => $list["head"],
            "count"             => $list["count"][0],
            "title"             => 'Liste des adhésions'

        ];

         return $p_render = [
            "fields"     => $fields ,
            "data"       => $data,
            "id"         => "Table_list_adhesion"
        ];

    }

}
