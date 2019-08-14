<?php
namespace Controller\Back\Component\Receipt;

/**
 *
 */
class Table_list_receipt
{
    use \Controller\Transverse\Get_param_request;

    function render(){


        $param_request = $this->Get_param_request();

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        $receipts      = new \Manager\Receipt($bddM);

        $list = $receipts->get_list($param_request);

        $request = '';

        //$fields =

        //[

        //    [
        //        "type_balise"   => 'input',
        //        "id"            => 'cli_firstname',
        //        "type"          => 'text',
        //        "name"          => 'cli_firstname',
        //        "placeholder"   => 'Prénom',
        //        "class"         => '5',
        ////    ]

        //];

        $data =[

            "table"             => $list["content"],
            "head"              => $list["head"],
            "count"             => $list["count"][0],
            "title"             => 'Liste des adhésions'

        ];

         return $p_render = [
            "fields"     => [],
            "data"       => $data,
            "id"         => "Table_list_adhesion"
        ];

    }

}
