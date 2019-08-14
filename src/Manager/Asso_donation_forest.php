<?php
namespace Manager;

class Asso_donation_forest
{
    use \Controller\Transverse\Get_param_request;
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

    function add(){
        if(isset($_POST["donation_forest_mnt"])){

            $reqprep = $this->bdd->prepare(

                "INSERT INTO
                asso_donation

                ( brk_id , cli_id , don_mnt , ptyp_id, don_ts, cau_id ,don_status )

                VALUES

                ( :brk_id, :cli_id, :donation_forest_mnt, :ptyp_id , :donation_forest_ts, :cau_id, :don_status)

                "

            );

            $prepare = [

                ":brk_id" => 2,
                ":cli_id" => htmlspecialchars($_POST['cli_id']),
                ":donation_forest_mnt"=> htmlspecialchars($_POST['donation_forest_mnt']),
                ":ptyp_id"=> htmlspecialchars($_POST['ptyp_id']),
                ":donation_forest_ts" => date('Y-m-d G:i:s'),
                ":cau_id" => '703',
                ":don_status" => htmlspecialchars($_POST['don_status'])
            ];

            $insert = $reqprep->execute($prepare);

            $reqprep2 = $this->bdd->prepare("SELECT MAX(don_id) from asso_donation");
            $prepare2 = [];
            $reqprep2->execute($prepare2);
            $p_don_id = $reqprep2->fetch();

            if($_POST["don_status"] == 'OK'){

                (new \Manager\Receipt($this->bdd))->add(["don_id" =>$p_don_id[0],"type"=>"donation_forest"]);
            }

        }
    }

    function add_import_hello_asso($prepare){

            $reqprep = $this->bdd->prepare(

                "INSERT INTO
                asso_donation

                ( brk_id , cli_id , cau_id , don_mnt , ptyp_id, don_ts, don_status  )

                VALUES

                ( :brk_id, :cli_id, :cau_id, :don_mnt, :ptyp_id , :don_ts, :don_status)

                "

            );

            $insert = $reqprep->execute($prepare);

            $reqprep2 = $this->bdd->prepare("SELECT MAX(don_id) from asso_donation");
            $prepare2 = [];
            $reqprep2->execute($prepare2);
            $p_don_id = $reqprep2->fetch();

            (new \Manager\Receipt($this->bdd))->add(["don_id" =>$p_don_id[0],"type"=>"donation_forest"]);



    }

    function get_last(){

        $reqprep = $this->bdd->query(
            "SELECT

            asso_donation.don_id as Id_donation_forest,

            asso_donation.cli_id as Id_Parrain,
            P2.cli_firstname as Prénom,
            P2.cli_lastname as Nom,

            asso_donation.don_mnt as Montant,
            asso_donation.don_ts as Date_creation,
            asso_donation.don_status as Statut

            FROM

            asso_donation

            LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id

            WHERE asso_donation.cau_id = 703

            ORDER BY

            asso_donation.don_ts DESC

            LIMIT 0,9

            ");

            //$prepare = [":donation_forest_ts" => $_GET['donation_forest_ts']];

            $data = [
                "content"     => $reqprep->fetchAll(\PDO::FETCH_NUM),
                "head"              => ["Id","Id_membre","Prénom","Nom","Montant","Date enregistrement","Statut","Action"],
            ];

            return $data;

        }

        function get_donation_forest_by_member($p_nb_by_page,$p){

            $start = ($p * $p_nb_by_page) - $p_nb_by_page ;

                        $reqprep = $this->bdd->prepare(
                "SELECT

                asso_donation.don_id as Id_donation_forest,


                asso_donation.don_ts as Date_creation,

                asso_donation.don_mnt as Montant,
                asso_donation.don_status as Statut

                FROM

                asso_donation

                LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id

                WHERE P2.cli_id = :cli_id

                AND asso_donation.cau_id = 703

                ORDER BY

                asso_donation.don_ts DESC

                LIMIT $start,$p_nb_by_page

                ");

                $prepare = [
                    ":cli_id" => htmlspecialchars($_GET['cli_id'])
                ];

                $reqprep->execute($prepare);

                $count_reqprep = $this->bdd->prepare("SELECT COUNT(don_id) FROM asso_donation WHERE cau_id = 703 and cli_id = :cli_id ");

                $count_prepare = [
                    ":cli_id" => htmlspecialchars($_GET['cli_id'])
                ];

                $count_reqprep->execute($count_prepare );

                $count_return = $count_reqprep->fetch(\PDO::FETCH_NUM);

                $return = [
                    "content" => $reqprep->fetchAll(\PDO::FETCH_NUM) ,
                    "count" => $count_return[0],
                    "head"=>["Id","Date création","Montant","Statut","Action"]
                ];

                    return $return ;

                }


                function get_donation_forest_by_member_front(){


                    $reqprep = $this->bdd->prepare(

                        "SELECT

                        asso_receipt.rec_number,
                        asso_donation.don_id as Id,
                        asso_donation.don_ts as Date_creation,
                        asso_donation.don_mnt as Montant,

                        asso_donation.don_status as Statut

                        FROM

                        asso_donation

                        LEFT JOIN asso_cause as P1 ON P1.cau_id = asso_donation.cau_id
                        LEFT JOIN asso_receipt_donation on asso_receipt_donation.don_id = asso_donation.don_id
                        LEFT JOIN asso_receipt on asso_receipt.rec_id = asso_receipt_donation.rec_id

                        WHERE   asso_donation.cli_id = :cli_id

                        AND asso_donation.cau_id = 703

                        ORDER BY

                        asso_donation.don_ts DESC

                        ");

                        $prepare = [
                            ":cli_id" => htmlspecialchars($_SESSION['cli_id'])
                        ];

                        $reqprep->execute($prepare);

                        $return = [
                            "content" => $reqprep->fetchAll(\PDO::FETCH_NUM) ,
                            "head"=>["rec_num","Id","Date création","Montant","Statut","Action"]
                        ];

                            return $return ;

                        }


                function get_donation_forest_by_member_card(){

                if(isset( $_GET['cli_id'])){

                    $reqprep = $this->bdd->prepare(
                    "SELECT SUM(don_mnt)

                    FROM

                    asso_donation

                    WHERE cli_id = :cli_id AND cau_id = 703 AND YEAR(don_ts) = YEAR(NOW())


                    ");

                    $prepare = [
                        ":cli_id" => htmlspecialchars($_GET['cli_id']),
                    ];

                    $reqprep->execute($prepare);

                    $return = $reqprep->fetch(\Pdo::FETCH_NUM);

                }else {$return = [0];}

                return $return ;

                }

                function get_list(){

                    $where = '';

                    $param_request = $this->Get_param_request();

                    foreach ($param_request[0] as $key => $value) {
                        if($value != ''){

                            switch (substr($key,0,3)) {

                                case 'adh':
                                $key_table = 'asso_donation.'.$key;// code...
                                $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...
                                break;

                                case 'cli':
                                $key_table = 'P2.'.$key;// code...
                                $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...
                                break;

                                case 'don':
                                $key_table = 'asso_donation.'.$key;// code...
                                $where .= ' AND '.$key_table.' LIKE :'.$key ;// code..                            break;
                                break;

                                case 'rec':
                                    $key_table = 'P4.'.$key;
                                    if ($value == '%1%'){
                                        $where .= ' AND '.$key_table.' LIKE "%R%"' ;

                                    } else {
                                        $where .= ' AND '.$key_table.' is null' ;

                                    }
                                break;

                            }
                        }
                    }


                    if (isset($param_request[1]) && ($param_request[1] != 'get')){$filter = (($param_request[1])-1)*10;}else{$filter = 0;}


                    $reqprep = $this->bdd->prepare(
                        "SELECT

                        asso_donation.don_id as Id_donation_forest,

                        P2.cli_lastname as Nom,
                        P2.cli_firstname as Prénom,


                        asso_donation.don_mnt as Montant,
                        asso_donation.don_ts as Date_creation,
                        asso_donation.don_status as Statut,

                        P4.rec_number as Receipt

                        FROM

                        asso_donation

                        LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id
                        LEFT JOIN asso_receipt_donation as P3 ON P3.don_id = asso_donation.don_id
                        LEFT JOIN asso_receipt as P4 ON P4.rec_id = P3.rec_id


                        WHERE

                        asso_donation.cau_id='703'

                        $where

                        ORDER BY

                        asso_donation.don_ts DESC

                        LIMIT $filter,10

                        ");

                        $count_reqprep = $this->bdd->prepare("SELECT COUNT(don_id) FROM asso_donation WHERE cau_id='703' $where ");

                        if($param_request[0] != []){

                            foreach ($param_request[0] as $key => $value) {
                                if($value != '' && $key!= 'rec_number' ){

                                    $reqprep->bindValue(":".$key,$value);
                                    $count_reqprep->bindValue(":".$key,$value);

                                }
                            }
                        }

                        $reqprep->execute();

                        $count_result   = $count_reqprep->execute();
                        $count_result   = $count_reqprep->fetch(\PDO::FETCH_NUM);

                        $value = [];


                        $data = [
                            "list_donation_forest"     => $reqprep->fetchAll(\PDO::FETCH_NUM),
                            "head"              => ["Id","Prénom","Nom","Montant","Date enregistrement","Statut"],
                            "count"             => $count_result
                        ];

                        return $data;
                    }

                    function get_list_export(){

                        $where = '';

                        $param_request = $this->Get_param_request();

                        foreach ($param_request[0] as $key => $value) {
                            if($value != ''){

                                switch (substr($key,0,3)) {

                                    case 'adh':
                                    $key_table = 'asso_donation.'.$key;// code...
                                    $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...
                                    break;

                                    case 'cli':
                                    $key_table = 'P2.'.$key;// code...
                                    $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...
                                    break;

                                    case 'don':
                                    $key_table = 'asso_donation.'.$key;// code...
                                    $where .= ' AND '.$key_table.' LIKE :'.$key ;// code..                            break;
                                    break;

                                    case 'rec':
                                        $key_table = 'P4.'.$key;
                                        if ($value == '%1%'){
                                            $where .= ' AND '.$key_table.' LIKE "%R%"' ;

                                        } else {
                                            $where .= ' AND '.$key_table.' is null' ;

                                        }
                                    break;

                                }
                            }
                        }


                        if (isset($param_request[1]) && ($param_request[1] != 'get')){$filter = (($param_request[1])-1)*10;}else{$filter = 0;}


                        $reqprep = $this->bdd->prepare(
                            "SELECT

                            asso_donation.don_id as Id_donation_forest,

                            P2.cli_lastname as Nom,
                            P2.cli_firstname as Prénom,


                            asso_donation.don_mnt as Montant,
                            asso_donation.don_ts as Date_creation,
                            asso_donation.don_status as Statut,

                            P4.rec_number as Receipt

                            FROM

                            asso_donation

                            LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id
                            LEFT JOIN asso_receipt_donation as P3 ON P3.don_id = asso_donation.don_id
                            LEFT JOIN asso_receipt as P4 ON P4.rec_id = P3.rec_id


                            WHERE

                            asso_donation.cau_id='703'

                            $where

                            ORDER BY

                            asso_donation.don_ts DESC

                            ");

                            if($param_request[0] != []){

                            foreach ($param_request[0] as $key => $value) {
                                if($value != '' && $key != 'export_name'){

                                    $reqprep->bindValue(":".$key,$value);

                                    }
                                }
                            }

                            $reqprep->execute();


                            $data = [
                                "content"     => $reqprep->fetchAll(\PDO::FETCH_NUM),
                                "head"              => ["Id","Prénom","Nom","Montant","Date enregistrement","Statut","Numéro de reçu"],
                            ];

                            return $data;
                        }


                        public function delete()
                        {
                            $reqprep = $this->bdd->prepare(
                                "DELETE FROM asso_donation
                                WHERE don_id = :don_id ");
                                $prepare = [":don_id" => htmlspecialchars($_GET["don_id"])];

                                $reqprep->execute($prepare);

                                header("Location: ".$_SERVER['HTTP_REFERER']);

                            }

                        public function update(){

                            $reqprep = $this->bdd->prepare(

                                "UPDATE asso_donation

                                SET

                                cli_id     = :cli_id,
                                don_mnt    = :don_mnt,
                                ptyp_id    = :ptyp_id,
                                don_status = :don_status

                                WHERE   cau_id = '703'
                                AND     don_id = :don_id "
                            );

                            $prepare = [
                                ":cli_id" => htmlspecialchars($_POST["cli_id"]),
                                ":don_mnt" => htmlspecialchars($_POST["donation_forest_mnt"]),
                                ":ptyp_id" => htmlspecialchars($_POST["ptyp_id"]),
                                ":don_id" => htmlspecialchars($_GET["don_id"]),
                                ':don_status' => htmlspecialchars($_POST["don_status"])
                            ];

                            $reqprep->execute($prepare);

                            $reqprep2 = $this->bdd->prepare("SELECT MAX(don_id) from asso_donation");
                            $prepare2 = [];
                            $reqprep2->execute($prepare2);
                            $p_don_id = $reqprep2->fetch();

                            if($_POST["don_status"] == 'OK'){

                                (new \Manager\Receipt($this->bdd))->add(["don_id" =>$p_don_id[0],"type"=>"donation_forest"]);
                            }

                            switch ($_GET["from"]) {
                                case 'add':
                                    header("Location: /www/Kalaweit/asso_donation_forest/add");
                                break;

                                case 'get':
                                    header( "Location: /www/Kalaweit/member/get?cli_id=".htmlspecialchars($_POST['cli_id']));
                            break;

                                default:
                                    header("Location: /www/Kalaweit/asso_donation_forest/list/1");
                                break;
                            }

                        }

                        public function get()
                        {
                            $reqprep = $this->bdd->prepare("SELECT * FROM asso_donation WHERE don_id = :don_id AND cau_id='703'");


                            $prepare = [ ":don_id" => htmlspecialchars($_GET['don_id']) ];

                            $reqprep->execute($prepare);

                            return $data = $reqprep->fetch(\PDO::FETCH_ASSOC);

                        }

                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //charts management//
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        public function get_chart_data_count($year){

                            $begin = $year.'-01-01 00:00:00';
                            $end = $year.'-12-31 23:59:59';

                            $data = [];

                            for ($i=1; $i < 13; $i++) {

                                $sum = $this->bdd->query("SELECT COUNT(don_mnt) FROM asso_donation WHERE cau_id='703' AND YEAR(don_ts)= $year AND MONTH(don_ts)= $i ");

                                array_push($data,$sum->fetch(\PDO::FETCH_NUM ));

                            }

                            return $data;

                        }
                        public function get_chart_data_sum($year){

                            $begin = $year.'-01-01 00:00:00';
                            $end = $year.'-12-31 23:59:59';

                            $data = [];

                            for ($i=1; $i < 13; $i++) {

                                $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE cau_id='703' AND YEAR(don_ts)= $year and MONTH(don_ts)= $i ");

                                array_push($data,$sum->fetch(\PDO::FETCH_NUM ));

                            }

                            return $data;

                        }

                        public function get_chart_data_sum_month($year,$month){

                            $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and MONTH(don_ts) = $month and cau_id = '703'");

                            $data = $sum->fetch(\PDO::FETCH_NUM);

                            return $data;

                        }

                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //resume management//
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        public function get_resume_data_sum($year){

                            $begin = $year.'-01-01 00:00:00';
                            $end = $year.'-12-31 23:59:59';

                            $data = [];

                            for ($i=1; $i < 13; $i++) {

                                $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE cau_id='703' AND YEAR(don_ts)= $year and MONTH(don_ts)= $i ");

                                $temp = $sum->fetch(\PDO::FETCH_NUM );

                                $data[] = $temp[0];
                            }

                            return $data;

                        }

                        public function get_resume_data_count($year){

                            $begin = $year.'-01-01 00:00:00';
                            $end = $year.'-12-31 23:59:59';

                            $data = [];

                            for ($i=1; $i < 13; $i++) {

                                $sum = $this->bdd->query("SELECT COUNT(don_mnt) FROM asso_donation WHERE cau_id='703' AND YEAR(don_ts)= $year and MONTH(don_ts)= $i ");

                                $temp = $sum->fetch(\PDO::FETCH_NUM );

                                $data[] = $temp[0];
                            }

                            return $data;

                        }
                        public function get_year_count($year){

                            $sum = $this->bdd->query("SELECT COUNT(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year AND cau_id='703'");

                            $return = $sum->fetch(\PDO::FETCH_NUM);
                            if ($return[0] == NULL){ $return[0] = '0';}

                            return $return;

                        }

                        public function get_year_sum($year){

                            $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year AND cau_id='703'");
                            $return = $sum->fetch(\PDO::FETCH_NUM);
                            if ($return[0] == NULL){ $return[0] = '0';}

                            return $return;return $sum->fetch(\PDO::FETCH_NUM);

                        }



                    }
