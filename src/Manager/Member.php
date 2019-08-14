<?php

namespace Manager;

/**
* class des animaux
* blaison Kalaweit
*/

class Member
{
    use \Controller\Transverse\Get_param_request;
    use \Controller\Transverse\Get_param_post;
    /**
    * définition des variables de classe
    */

    private $bdd;

    /**
    * définition du constructeur
    */

    function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    /**
    * définition des getters()
    */

    public function set_bdd(PDO $bdd){
        $this->bdd = $bdd;
    }

    function log_in(){

        if($_POST["login"] == '' || $_POST["password"] == '')

        { echo "<script>alert('Login ou mot de passe manquant(s)')</script>"; }

        else

        {

            $reqprep = $this->bdd->prepare("SELECT cli_id FROM crm_client_data WHERE clitd_id = 3 AND cld_valc = :login");



            $prepare = [

                ":login" => htmlspecialchars($_POST["login"])

            ];

            $reqprep->execute($prepare);

            $cli_id = $reqprep->fetch(\PDO::FETCH_NUM);


            if($cli_id == false){ echo "<script>alert('Ce compte n\'existe pas !')</script>";}

            else {

                if($cli_id != false){

                    $reqprep2 = $this->bdd->prepare("SELECT cld_valc FROM crm_client_data WHERE cli_id = :cli_id and clitd_id = 6");

                    $prepare2 = [
                        ":cli_id" => $cli_id[0]
                    ];

                    $reqprep2->execute($prepare2);

                    $hash = $reqprep2->fetch(\PDO::FETCH_NUM);

                    $check = 0;


                    if(password_verify(htmlspecialchars($_POST["password"]), $hash[0]) == false ){ $check = 1; echo "<script>alert('Mot de passe eronné')</script>";};

                    if($check == 0){

                        $_SESSION["user_login"] = htmlspecialchars($_POST['login']);
                        $_SESSION["cli_id"] = $cli_id[0];

                        header("Location: /www/site");
                    }

                }

                else {
                    echo "<script>alert('Mot de passe manquant ou eronné')</script>";
                }

            }
        }


    }

    public function get_list(){

        $param_request = $this->get_param_request();

        $url = explode('?',$_SERVER['REQUEST_URI']);

        $slice_url = explode('/',$url[0]);

        $page = array_pop($slice_url);

        if($page == 1){ $filter = 0 ;} else { $filter = (($page - 1) * 12); };

        $where = '';
        $prepare =[];

        if(isset($param_request[0])){

            foreach ($param_request[0] as $key => $value) {


                if($value != ''){
                    $where .= ' AND '.$key.' LIKE :'.$key ;
                    $prepare = array_merge($prepare,[':'.$key => '%'.htmlspecialchars($_GET["$key"]).'%']);

                }
            }

        }

        $reqprep = $this->bdd->prepare("SELECT cli_id,cli_lastname,cli_firstname,cli_cp,cli_town FROM crm_client WHERE 1=1 $where ORDER BY cli_lastname LIMIT $filter,12 ");

        $count_reqprep = $this->bdd->prepare("SELECT COUNT(cli_id) FROM crm_client WHERE 1=1 $where");

        $reqprep->execute($prepare);
        $count_reqprep->execute($prepare);


        $data = [
            "list_member"   => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "head"          => ["Id","Nom","Prénom","Cp","Ville"],
            "count"         => $count_reqprep->fetch(\PDO::FETCH_NUM)
        ];

        return $data;

    }

    public function get_list_export(){

        $param_request = $this->get_param_request();

        $where = '';
        $prepare =[];

        if(isset($param_request[0])){

            foreach ($param_request[0] as $key => $value) {

                if($value != '' && $key != 'export_name'){
                    $where .= ' AND '.$key.' LIKE :'.$key ;
                    $prepare = array_merge($prepare,[':'.$key => '%'.htmlspecialchars($_GET["$key"]).'%']);

                }
            }

        }

        $reqprep = $this->bdd->prepare("SELECT cli_id,cli_lastname,cli_firstname,cli_cp,cli_town FROM crm_client WHERE 1=1 $where ORDER BY cli_lastname ");

        $reqprep->execute($prepare);

        $data = [
            "content"   => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "head"          => ["Id","Nom","Prénom","Cp","Ville"]
        ];

        return $data;

    }
    function check_account(){


        $check1 = 0;

        //if ( !preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['clitd_3'])){$check += 1;};
        //if ( !preg_match ( " /^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}/" , $_POST['clitd_1'])){$check += 1;};
        //if ( !preg_match ( " /^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}/" , $_POST['clitd_2'])){$check += 1;};


        if($check1 == 0)

        {

            $reqprepcheck = $this->bdd->prepare("SELECT cli_id from crm_client_data WHERE cld_valc = :cld_valc and clitd_id = 3 ");

            $preparecheck =[

                ":cld_valc" => $_POST["clitd_3"]

            ];

            $reqprepcheck->execute($preparecheck);

            $check = $reqprepcheck->fetch(\PDO::FETCH_NUM);

        } else { echo '<script> alert("Adresse mail non valide");</script>';}


        if(empty($check)){

            return true;
        }

        else
        {
            echo '<script> alert("Un compte utilisateur existe dejà avec cette adresse mail");</script>';
            return false;
        }
    }

    function add($member){

        if(isset($_POST["cli_firstname"])){

            $array_param_post = $this->Get_param_post_add_member();

            $into_cli       = $array_param_post["array_param_post_cli"]['p_into_cli'];
            $set_cli        = $array_param_post["array_param_post_cli"]['p_set_cli'];
            $prepare_cli    = $array_param_post["array_param_post_cli"]["p_prepare_cli"];

            $reqprep = $this->bdd->prepare("INSERT INTO crm_client ($into_cli) VALUES ($set_cli)");

            $reqprep->execute($prepare_cli);

            $query = $this->bdd->query("SELECT MAX(cli_id) FROM crm_client");

            $id_client = $query->fetch(\PDO::FETCH_NUM);
            $id_client = $id_client[0];

            foreach ($array_param_post["array_param_post_clid"] as $key => $value) {

                if ($value["clitd_id"] == 6){

                    $cld_valc = password_hash($value["cld_valc"],PASSWORD_BCRYPT);

                } else {

                    $cld_valc = $value["cld_valc"];

                }

                $clitd_id = $value["clitd_id"];


                $reqprep_data = $this->bdd->prepare("INSERT INTO crm_client_data (cli_id, clitd_id, cld_valc) VALUES (:id_client, :clitd_id, :cld_valc)");

                $prepare_data = [

                    ":id_client" => $id_client,
                    ":clitd_id"  => $clitd_id,
                    ":cld_valc"  => $cld_valc
                ];

                $reqprep_data->execute($prepare_data);
            }

            $_SESSION["cli_id"] = $id_client;

            return $id_client;

        }

    }

    function delete(){

        $checkprep = $this->bdd->prepare("SELECT COUNT(*) FROM asso_donation WHERE cli_id = :cli_id");

        $checkdataprep = $this->bdd->prepare("DELETE FROM crm_client_data WHERE cli_id = :cli_id");

        $reqprep = $this->bdd->prepare("DELETE FROM crm_client WHERE cli_id = :cli_id");

        $prepare = [
            ":cli_id" =>  $_SESSION["cli_id"]
        ];

        $check = $checkprep->execute($prepare);

        $count = $checkprep->fetch(\PDO::FETCH_NUM);


        if($count[0] == 0) {

            $checkdataprep->execute($prepare);

            $reqprep->execute($prepare);

            $_SESSION["info"] = 'L\'utilisateur a bien été supprimé.';

            header("Location: ".$_SERVER['HTTP_REFERER']);

        }
        else {

            $error = 'Impossible de supprimer l\'utilisateur, des mouvements sont associés.';

            $_SESSION["info"] = $error;

            header("Location: ".$_SERVER['HTTP_REFERER']);

        }

    }

    function update($member){

        $array_param_post = $this->get_param_post_update_member();

        $set_cli_array_key = [];
        $set_cli_array_key = explode(",",$array_param_post["array_param_post_cli"]["p_into_cli"]);
        $set_cli_array_value = [];
        $set_cli_array_value = explode(",",$array_param_post["array_param_post_cli"]["p_set_cli"]);

        $count = count($set_cli_array_key) - 1;

        $set = '';
        $prepare = [];

        for ($i=0; $i < $count ; $i++) {

            $set        .= $set_cli_array_key[$i]." = ".$set_cli_array_value[$i]." , ";

        }

        $set = rtrim($set,", ");

        $prepare =  array_merge($array_param_post["array_param_post_cli"]["p_prepare_cli"],[":cli_id"=> $_SESSION['cli_id']]);

        $reqprep = $this->bdd->prepare("UPDATE crm_client SET $set WHERE cli_id = :cli_id");



        $reqprep->execute($prepare);

        foreach ($array_param_post["array_param_post_clid"] as $key => $value) {

            $reqprep_check_data = $this->bdd->prepare("SELECT cld_id from crm_client_data where clitd_id = :clitd_id and cli_id = :cli_id");

            $reqprep_check_data_prepare = [
                ":clitd_id" => $value["clitd_id"],
                ":cli_id" => $_SESSION["cli_id"]
            ];

            $reqprep_check_data->execute($reqprep_check_data_prepare);
            $return  = $reqprep_check_data->fetch(\PDO::FETCH_NUM);

            if ($return[0] == NULL) {

                $reqprep_data_insert = $this->bdd->prepare("INSERT INTO crm_client_data (cli_id, clitd_id, cld_valc) VALUES (:id_client, :clitd_id, :cld_valc)");
                $prepare_data_insert = [

                    ":id_client" =>  $_SESSION["cli_id"],
                    ":clitd_id"  => $value["clitd_id"],
                    ":cld_valc"  => $value["cld_valc"]
                ];

                $reqprep_data_insert->execute($prepare_data_insert);

            } else {

                $reqprep_data = $this->bdd->prepare("UPDATE crm_client_data SET cld_valc = :cld_valc WHERE cli_id = :cli_id AND clitd_id = :clitd_id");

                $prepare_data = [":cld_valc" =>$value["cld_valc"], ":cli_id" => $_SESSION["cli_id"], "clitd_id" => $value["clitd_id"] ] ;

                $reqprep_data;
                $reqprep_data->execute($prepare_data);

            }

        }

    }


    function get($member,$id){


        if(isset($_POST['cli_lastname'])){$this->update($id);}

        $reqprep = $this->bdd->prepare("SELECT

            crm_client.cli_id, crm_client.brk_id , crm_client.clic_id , crm_client.clit_id , crm_client.cli_gender ,
            crm_client.cli_firstname , crm_client.cli_lastname , crm_client.cli_address1 , crm_client.cli_address2 ,
            crm_client.cli_address3 , crm_client.cli_cp , crm_client.cli_town , crm_client.cnty_id , crm_client.cli_active ,
            crm_client.cli_lang , crm_client.cli_prefs , crm_client.cli_avatar,

            D1.cld_valc as clitd_1,
            D2.cld_valc as clitd_2,
            D3.cld_valc as clitd_3,
            D4.cld_valc as clitd_4,
            D6.cld_valc as clitd_6,
            D7.cld_valc as clitd_7,
            D8.cld_valc as clitd_8

            FROM crm_client

            LEFT JOIN crm_client_data as D1 on D1.cli_id = crm_client.cli_id and D1.clitd_id = 1
            LEFT JOIN crm_client_data as D2 on D2.cli_id = crm_client.cli_id and D2.clitd_id = 2
            LEFT JOIN crm_client_data as D3 on D3.cli_id = crm_client.cli_id and D3.clitd_id = 3
            LEFT JOIN crm_client_data as D4 on D4.cli_id = crm_client.cli_id and D4.clitd_id = 4
            LEFT JOIN crm_client_data as D6 on D6.cli_id = crm_client.cli_id and D6.clitd_id = 6
            LEFT JOIN crm_client_data as D7 on D7.cli_id = crm_client.cli_id and D7.clitd_id = 7
            LEFT JOIN crm_client_data as D8 on D8.cli_id = crm_client.cli_id and D8.clitd_id = 8

            WHERE crm_client.cli_id = :cli_id

            ");

            $prepare = [':cli_id' => $id ];

            $member = $reqprep->execute($prepare);

            $member = $reqprep->fetch(\PDO::FETCH_ASSOC);

            return $member;

        }

    function get_select(){

        $reqprep = $this->bdd->query("SELECT cli_id, cli_lastname, cli_firstname FROM crm_client ORDER BY cli_lastname");


        $return = [];

        foreach ($reqprep->fetchALL() as $key => $value){

            $cli_loop = ["cli_id" => $value["cli_id"],"cli_identity"=> $value["cli_lastname"]." ".$value["cli_firstname"]];



            $return []= $cli_loop;

        }

        return $return;

    }

    function get_all(){

        $reqprep = $this->bdd->prepare("SELECT cli_id,cli_lastname,cli_firstname,cli_cp,cli_town FROM crm_client ORDER BY cli_id LIMIT 0,15");
        $prepare = [];
        $reqprep->execute($prepare);
        $return = $reqprep->fetchAll(\PDO::FETCH_NUM);
        return $return;
    }

    function get_all_id(){

        $reqprep = $this->bdd->prepare("SELECT cli_id FROM crm_client ORDER BY cli_id");
        $prepare = [];
        $reqprep->execute($prepare);
        $return = $reqprep->fetchAll(\PDO::FETCH_NUM);
        return $return;
    }

    function get_count(){

        $reqprep = $this->bdd->query("SELECT Count(cli_id) FROM crm_client");
        $reqprep->execute();
        $count_member = $reqprep->fetch();
        return $count_member;


    }

    function get_mail(){

        $reqprep = $this->bdd->prepare("SELECT cld_valc from crm_client_data WHERE cli_id = :cli_id and clitd_id = 3 ");
        $prepare =[ ":cli_id" =>  $_SESSION["cli_id"]];
        $reqprep->execute($prepare);
        $return = $reqprep->fetch();
        return $return;
    }

    function get_id_from_Login($login)
    {

        $reqprep = $this->bdd->prepare(
            " SELECT * FROM crm_client_data WHERE cld_valc = :login and clitd_id = 3 ");

            $prepare = ["login" => $login];

            $reqprep->execute($prepare);

            $user = $reqprep->fetch(\PDO::FETCH_ASSOC);

            return $user;
        }

    function maj_password($login,$password){

        $reqprep1 = $this->bdd->prepare(" DELETE FROM crm_client_data WHERE clitd_id = 6  AND cli_id = :cli_id");

        $reqprep2 = $this->bdd->prepare("INSERT INTO crm_client_data (cli_id, clitd_id , cld_valc) VALUES (:cli_id , 6 , :password) ");

        $id = $this->get_id_from_Login($login);

        $prepare1 =[
            ":cli_id"   => $id['cli_id']
        ];

        $prepare2 =[
            ":password" => password_hash($password,PASSWORD_BCRYPT),
            ":cli_id"   => $id['cli_id']
        ];

        $reqprep1->execute($prepare1);
        $reqprep2->execute($prepare2);

    }

    function get_id_member_import_paypal($cld_valc){
        $reqprep = $this->bdd->prepare(" SELECT crm_client.cli_id FROM crm_client LEFT JOIN crm_client_data as D7 on D7.cli_id = crm_client.cli_id and D7.clitd_id = 7 WHERE D7.cld_valc = :cld_valc");
        $prepare = [":cld_valc" => $cld_valc];
        $reqprep->execute($prepare);

        return $reqprep->fetch();
    }

    function get_id_member_import_hello_asso($cld_valc){
        $reqprep = $this->bdd->prepare(" SELECT crm_client.cli_id FROM crm_client LEFT JOIN crm_client_data as D8 on D8.cli_id = crm_client.cli_id and D8.clitd_id = 8 WHERE D8.cld_valc = :cld_valc");
        $prepare = [":cld_valc" => $cld_valc];
        $reqprep->execute($prepare);

        return $reqprep->fetch();
    }

}
