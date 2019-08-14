<?php
    namespace Controller\Front;

    /**
     *
     */
    class My_account

        {
        public function render(){



            $bdd = (new \Manager\Connexion())->getBdd();;

            $crm_countryM = new \Manager\Crm_country();
            $client_categoryM  = new \Manager\Crm_client_category();

            $member         = new \Model\Member();
            $memberM        = new \Manager\Member($bdd);

            if(isset($_POST)){$memberM->update($member,htmlspecialchars($_SESSION['cli_id'])); }

            $desc_member    = $memberM->get($member,htmlspecialchars($_SESSION['cli_id']));

            $aside = (new \View\Front\Aside())->render();

            $info_member = [

            "firstname"  => (new \Controller\Front\htmlElement\Form_group_input('cli_lastname','text','Nom',$desc_member['cli_lastname'],'fa fa-user'))->render(),
            "lastname"   => (new \Controller\Front\htmlElement\Form_group_input('cli_firstname','text','Prénom', $desc_member['cli_firstname'],'fa fa-user'))->render(),
            "type"       => (new \Controller\Front\htmlElement\Form_group_select('clic_id', $client_categoryM->getAll($bdd),$desc_member['clic_id'],'fa fa-user',"clic_name"))->render(),
            "email"      => (new \Controller\Front\htmlElement\Form_group_input('clitd_3','Email','email', $desc_member['clitd_3'],'fa fa-at'))->render(),
            "phone1"     => (new \Controller\Front\htmlElement\Form_group_input('clitd_1','tel','Numéro de téléphone 1',$desc_member['clitd_1'],'fa fa-phone'))->render(),
            "phone2"     => (new \Controller\Front\htmlElement\Form_group_input('clitd_2','tel','Numéro de téléphone 2',$desc_member['clitd_2'],'fa fa-phone'))->render(),

            "address"    => (new \Controller\Front\htmlElement\Form_group_input('cli_address1','text','Adresse', $desc_member['cli_address1'],'fa fa-map-marker'))->render(),
            "address2"   => (new \Controller\Front\htmlElement\Form_group_input('cli_address2','text','Complément adresse', $desc_member['cli_address2'],'fa fa-map-marker'))->render(),
            "cp"         => (new \Controller\Front\htmlElement\Form_group_input('cli_cp','text','Code postal', $desc_member['cli_cp'],'fa fa-map'))->render(),
            "town"       => (new \Controller\Front\htmlElement\Form_group_input('cli_town','text','Ville',$desc_member['cli_town'],'fas fa-city'))->render(),
            "country"    => (new \Controller\Front\htmlElement\Form_group_select('cnty_id', $crm_countryM->getAll($bdd),$desc_member['cnty_id'],'fa fa-globe',"cnty_name"))->render(),
            "password"   => (new \Controller\Front\htmlElement\Form_group_input('clitd_6','password','Mot de passe', $desc_member['clitd_6'],'fa fa-lock',"required"))->render(),

            "submit"     => (new \Controller\Front\htmlElement\Form_group_btn('submit','btn-form','','Enregistrer'))->render()


        ];

        $info_receipt_annual = (new \Manager\Receipt($bdd))->get_receipt_by_member_front();

        $info_donation = (new \Manager\Asso_donation($bdd))->get_donation_by_member_front();
        $info_donation_asso = (new \Manager\Asso_donation_asso($bdd))->get_donation_by_member_asso_front();
        $info_adhesion = (new \Manager\Asso_adhesion($bdd))->get_adhesion_by_member_front();
        $info_donation_dulan = (new \Manager\Asso_donation_dulan($bdd))->get_donation_dulan_by_member_front();
        $info_donation_forest = (new \Manager\Asso_donation_forest($bdd))->get_donation_forest_by_member_front();

        $print = '/Receipt/';

        $table = [

            "table_receipt_annual" => (new \Controller\Front\htmlElement\Table($info_receipt_annual,'receipt_table',$print))->render(),
            "table_donation" => (new \Controller\Front\htmlElement\Table($info_donation,'donation_table',$print))->render(),
            "table_adhesion" => (new \Controller\Front\htmlElement\Table($info_adhesion,'adhesion_table',$print))->render(),
            "table_donation_asso" => (new \Controller\Front\htmlElement\Table($info_donation_asso,'donation_asso_table',$print))->render(),
            "table_donation_dulan" => (new \Controller\Front\htmlElement\Table($info_donation_dulan,'donation_dulan_table',$print))->render(),
            "table_donation_forest" => (new \Controller\Front\htmlElement\Table($info_donation_forest,'donation_forest_table',$print))->render()
        ];

        if(empty($info_receipt_annual["content"])){ $table["table_receipt_annual"] = "<p>Aucun reçu disponible</p><br>"; }
        if(empty($info_donation["content"])){ $table["table_donation"] = "<p>Aucun don enregistré </p><br>"; }
        if(empty($info_donation_asso["content"])){ $table["table_donation_asso"] = "<p>Aucun don enregistré </p><br>"; }
        if(empty($info_adhesion["content"])){ $table["table_adhesion"] = "<p>Aucune adhésion enregistrée </p><br>"; }
        if(empty($info_donation_dulan["content"])){ $table["table_donation_dulan"] = "<p>Aucun don enregistré </p><br>"; }
        if(empty($info_donation_forest["content"])){ $table["table_donation_forest"] = "<p>Aucun don enregistré </p><br>"; }

        $content = [

            "param" =>$info_member,
            "table" =>$table,
            "aside" => $aside
        ];



        return (new \View\Front\My_account())->render($content);

        }
    }

 ?>
