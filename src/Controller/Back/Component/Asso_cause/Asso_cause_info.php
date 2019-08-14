<?php

/** classe permettant de gérer le contenu de la fiche cause **/

namespace Controller\Back\Component\Asso_cause;

class Asso_cause_info
{
    function render()
    {

        /*récupération des elements du fichier de config*/

        $config = \Core\Config::getInstance();

        /* instanciation de la connexion à la bdd */

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        /* instanciation de l'objet asso_cause */

        $asso_causeM           = new \Manager\Asso_cause($bddM);

        /* lecture de l'url pour définir le traitement à lancer */

        $url = explode('/',$_SERVER['REQUEST_URI']);

        /* si url du type www/Kalaweit/asso_cause/add  alors on lance une création via la méthode add sinon on lit les infos via la méthode get */

        if ($url[4]=='add'){
            $desc_asso_cause    = $asso_causeM->add();
        } else {
            $desc_asso_cause    = $asso_causeM->get($_GET['cau_id']);
        };

        /**
        *      box info générale sur la cause
        */

        /* instanciation des différents composant HTML */

        $ac_sexeM = (new \Manager\Sexe)->getAll();
        $ac_specieM = (new \Manager\Specie)->getAll();

        $name = (new \Controller\Back\htmlElement\Form_group_input("ac_name","Nom",$desc_asso_cause['ac_name'],'fa fa-user'));
        $sexe = (new \Controller\Back\htmlElement\Form_group_select("actd_2",$ac_sexeM,$desc_asso_cause['actd_2'],'fa fa-user',"config"));
        $year_birth = (new \Controller\Back\htmlElement\Form_group_input("actd_4","yyyy",$desc_asso_cause['actd_4'],"fa fa-calendar"));
        $year_death = (new \Controller\Back\htmlElement\Form_group_input("actd_7","yyyy",$desc_asso_cause['actd_7'], 'fa  fa-plus-square'));
        $specie = (new \Controller\Back\htmlElement\Form_group_select("actd_3",$ac_specieM,$desc_asso_cause['actd_3'],'fa fa-paw',"config"));

        /* intégration des resultats au sein d'un array */

        $content_info_1 =
        [
            $name->render(),
            $sexe->render(),
            $year_birth->render(),
            $year_death->render(),
            $specie->render()

        ];

        /* paramétrage des classes boostrap pour l'agencement des élements */

        $bootstrap_info_1 = [6,6,6,6,12];

        /* instanciation de la Box des informations générales de la cause*/


        $box_asso_cause_info    = new \Controller\Back\htmlElement\Box('Informations animal','box-primary',$content_info_1,$bootstrap_info_1);


        /**
        *      box autres infos sur la cause
        */

        /* instanciation des différents composant HTML */

        $localisationM = (new \Manager\Ile)->getAll();
        $captivityM = (new \Manager\Captivity)->getAll();
        $adoptionM = (new \Manager\Adoption)->getAll();
        $visibilityM = (new \Manager\Visibility)->getAll();

        $localisation = (new \Controller\Back\htmlElement\Form_group_select("actd_1",$localisationM,$desc_asso_cause['actd_1'],'fa fa-map',"config"));
        $captivity = (new \Controller\Back\htmlElement\Form_group_select("actd_9",$captivityM,$desc_asso_cause['actd_9'],'fa fa-chain',"config"));
        $adoption = (new \Controller\Back\htmlElement\Form_group_select("actd_8",$adoptionM,$desc_asso_cause['actd_8'],'fa fa-users',"config"));
        $visibility = (new \Controller\Back\htmlElement\Form_group_select("ac_site",$visibilityM,$desc_asso_cause['ac_site'],'fa  fa-internet-explorer',"config"));

        /* intégration des resultats au sein d'un array */

        $content_box_autres_infos =

        [
            $localisation->render(),
            $captivity->render(),
            $adoption->render(),
            $visibility->render(),
        ];

        /* paramétrage des classes boostrap pour l'agencement des élements */

        $bootstrap_info_2 = [6,6,6,6,6,6];

        /* instanciation de la Box des utres informations de la cause*/

        $box_asso_cause_autres_infos = new \Controller\Back\htmlElement\Box('Autres infos','box-primary',$content_box_autres_infos,$bootstrap_info_2);






        /**
        *      boxs description
        */

        //francais

        $description_fr = (new \Controller\Back\htmlElement\Form_group_textarea('acm_3',$desc_asso_cause['acm_3']));
        $description_en = (new \Controller\Back\htmlElement\Form_group_textarea('acm_4',$desc_asso_cause['acm_4']));
        $description_es = (new \Controller\Back\htmlElement\Form_group_textarea('acm_5',$desc_asso_cause['acm_5']));

        // box francais

        $content_box_desc_fr = [
            $description_fr->render()
        ];

        $box_description_fr = (new \Controller\Back\htmlElement\Box('Description en français','box-primary',$content_box_desc_fr,[12]));

        // box anglais

        $content_box_desc_en = [
            $description_en->render()
        ];

        $box_description_en = (new \Controller\Back\htmlElement\Box('Description en anglais','box-primary',$content_box_desc_en,[12]));

        // box en espagnol

        $content_box_desc_es = [
            $description_es->render()
        ];

        $box_description_es = (new \Controller\Back\htmlElement\Box('Description en espagnol','box-primary',$content_box_desc_es,[12]));

        //info dons récoltés

        $donation_mnt = (new \Controller\Back\Component\Asso_cause\Donation_current_year())->get();
        $p_data2 = $donation_mnt[0].' €';
        $p_title = 'Dons récoltés cette année';
        $p_icon = 'fa fa-euro';

        $box_donation_mnt = (new \Controller\Back\htmlElement\Box_info($p_data2,$p_title,$p_icon,$p_color = 'bg-aqua'))->render();



        /***************************************************************************************************************************/

        /**     Synthese des elements à passer a la vue   **/

        /***************************************************************************************************************************/


        $param = [

            "info_générale" => $box_asso_cause_info,
            "autres_infos"  => $box_asso_cause_autres_infos,
            "dons_récoltés" => $box_donation_mnt,
            "description_fr" => $box_description_fr,
            "description_en" => $box_description_en,
            "description_es" => $box_description_es,
        ];

        return (new \View\Back\Asso_cause\Asso_cause_info)->render($param);
    }

}
