<?php
namespace Controller\Front;
/**
 *
 */
class Gibbon
{
    function render(){

        $bdd = (new \Manager\Connexion())->getBdd();

        $aside = (new \View\Front\Aside())->render();

        if(isset($_GET["cau_id"])){

            $info_gibbon = (new \Manager\Asso_cause($bdd))->get(htmlspecialchars($_GET["cau_id"]));

        } else {

            header("Location:/www/home");
        };

        $list_donator = (new \Manager\Asso_cause($bdd))->get_donator();

        $list_donator_string = '';

        foreach ($list_donator as $key => $value) {

            $list_donator_string .= $value["cli_lastname"].' '.$value["cli_firstname"].' - ';
            // code...
        }

        $list_donator_string = substr($list_donator_string,0,-3);

        $mnt_dispo = (new \Manager\Asso_donation($bdd))->get_mnt_donation_current_year();

        $content = [
            "aside" => $aside,
            "info_gibbon" =>$info_gibbon,
            "species" => $ac_specieM = (new \Manager\Specie)->getAll(),
            "donator" => $list_donator_string,
            "donation" => $mnt_dispo
        ];



        return (new \View\Front\Gibbon())->render($content);

    }

}

 ?>
