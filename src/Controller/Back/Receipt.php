<?php
/* classe permettant la génaration des recu au format PDF */

namespace Controller\Back;

class Receipt

{

    /* methode de generation des recu */

    function get($rec_id, $open, $type)
    {

        /* initialisation de tableaux avec la traduction des elements en francais à afficher */

        $mois = array('','janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        $jours = array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');

        /* instanciation de la connexion à la Bdd */

        $bdd = (new \Manager\Connexion())->getBdd();

        /* Récupération des données à implémenter dans le reçu */

        $receipt_data = (new \Manager\Receipt($bdd))->get($rec_id);

        $content = [

            "firstname" => $receipt_data["cli_firstname"],
            "lastname" => $receipt_data["cli_lastname"],
            "adress" =>    $receipt_data["cli_address1"].' '.$receipt_data["cli_address2"].' '.$receipt_data["cli_address3"],
            "zip" => $receipt_data["cli_cp"],
            "town" => $receipt_data["cli_town"],
            "tot_don_mnt" => $receipt_data["rec_mnt"],
            "year" => $receipt_data["rec_year"],
            "receipt_number" => $receipt_data["rec_number"],
            "country" =>$receipt_data["cnty_name"],
            "date" => $jours[date('w')].' '.date('j').' '.$mois[date('n')].' '.date('Y')

        ];


        switch ($type) {

            case 'adhesion':
            return (new \View\Back\Receipt\Receipt_adhesion($content))->render($open);
            break;

            case 'donation':
            return (new \View\Back\Receipt\Receipt($content))->render($open);
            break;

            case 'donation_forest':
            return (new \View\Back\Receipt\Receipt_forest($content))->render($open);
            break;

            case 'donation_dulan':
            return (new \View\Back\Receipt\Receipt_dulan($content))->render($open);
            break;

            case 'donation_asso':
            return (new \View\Back\Receipt\Receipt_asso($content))->render($open);
            break;

            case 'receipt_annual':
            return (new \View\Back\Receipt\Receipt_annual($content))->render($open);
            break;


        }



    }

    

    function add(){

        $bdd = (new \Manager\Connexion())->getBdd();

        $url = $_SERVER["REQUEST_URI"];

        $explode = explode("?" ,$url);
        $param = explode("=" , $explode[1]);


        if ($param[0] == 'adhesion_id'){

            $rec_id = ($receipt = new \Manager\Receipt($bdd))->add(["adhesion" => $_GET["adhesion_id"]]);
            $type = "adhesion";

        } else {

            $rec_id = ($receipt = new \Manager\Receipt($bdd))->add(["donation"=> $_GET["don_id"]]);

            $cau = (new \Manager\Asso_donation($bdd))->get_type_donation();

            switch ($cau[0]) {

                case '700':
                    $type = "donation_dulan";
                break;

                case '703':
                    $type = "donation_forest";
                break;

                case '704':
                    $type = "donation_asso";
                break;

                default:
                    $type = "donation";
                    break;
            }

        }

        $visu_receipt = (new \Controller\Back\Receipt($bdd))->get($rec_id[0],"open",$type);


    }

    function get_list()

    {
        $p_render = (new \Controller\Back\Component\Receipt\Table_list_receipt)->render();

        /* passage des param à la vue et instanciation de cette derniere */

        return (new \View\Back\Table\Table_filter)->render($p_render);

    }

}
