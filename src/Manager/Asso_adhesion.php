<?php
namespace Manager;

class Asso_adhesion
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
        if(isset($_POST["adhesion_mnt"])){

            $reqprep = $this->bdd->prepare(

                "INSERT INTO
                asso_adhesion

                ( brk_id , cli_id , adhesion_mnt , ptyp_id, adhesion_ts , adhesion_status )

                VALUES

                ( :brk_id, :cli_id, :adhesion_mnt, :ptyp_id , :adhesion_ts, :adhesion_status)

                "

            );

            $prepare = [

                ":brk_id" => 2,
                ":cli_id" => htmlspecialchars($_POST['cli_id']),
                ":adhesion_mnt"=> htmlspecialchars($_POST['adhesion_mnt']),
                ":ptyp_id"=> htmlspecialchars($_POST['ptyp_id']),
                ":adhesion_ts" => date('Y-m-d G:i:s'),//, mktime(0, 0, 0, $_timestamp["M"], $_timestamp["D"], $_timestamp["Y"]))
                ":adhesion_status" => htmlspecialchars($_POST['adhesion_status']),
            ];

            $insert = $reqprep->execute($prepare);

            $reqprep2 = $this->bdd->prepare("SELECT MAX(adhesion_id) from asso_adhesion");
            $prepare2 = [];
            $reqprep2->execute($prepare2);
            $p_don_id = $reqprep2->fetch();

            if($_POST["adhesion_status"] == 'OK'){

                (new \Manager\Receipt($this->bdd))->add(["adhesion_id" =>$p_don_id[0],"type"=>"adhesion"]);
            }

        }
    }

    function get_last(){

        $reqprep = $this->bdd->query(
            "SELECT

            asso_adhesion.adhesion_id as Id_adhesion,

            asso_adhesion.cli_id as Id_Parrain,
            P2.cli_firstname as Prénom,
            P2.cli_lastname as Nom,

            asso_adhesion.adhesion_mnt as Montant,
            asso_adhesion.adhesion_ts as Date_creation,
            asso_adhesion.adhesion_status as Status

            FROM

            asso_adhesion

            LEFT JOIN crm_client as P2 ON P2.cli_id = asso_adhesion.cli_id

            ORDER BY

            asso_adhesion.adhesion_ts DESC

            LIMIT 0,10
            ");





            //$prepare = [":adhesion_ts" => $_GET['adhesion_ts']];

            $data = [
                "content"     => $reqprep->fetchAll(\PDO::FETCH_NUM),
                "head"              => ["Id","Id_membre","Prénom","Nom","Montant","Date enregistrement","Status","Action"],
            ];

            return $data;

        }

        function get_adhesion_by_member($p_nb_by_page,$p){

            $start = ($p * $p_nb_by_page) - $p_nb_by_page ;

            $reqprep = $this->bdd->prepare(
                "SELECT

                asso_adhesion.adhesion_id as Id_adhesion,
                asso_adhesion.adhesion_ts as Date_creation,
                asso_adhesion.adhesion_mnt as Montant,
                asso_adhesion.adhesion_status as Statut

                FROM

                asso_adhesion

                LEFT JOIN crm_client as P2 ON P2.cli_id = asso_adhesion.cli_id

                WHERE P2.cli_id = :cli_id

                ORDER BY

                asso_adhesion.adhesion_ts DESC

                LIMIT $start,$p_nb_by_page

                ");

                $prepare = [
                    ":cli_id" => htmlspecialchars($_GET['cli_id'])
                ];

                $reqprep->execute($prepare);

                $count_reqprep = $this->bdd->prepare("SELECT COUNT(adhesion_id) FROM asso_adhesion WHERE 1=1 and cli_id = :cli_id ");

                $count_prepare = [
                    ":cli_id" => htmlspecialchars($_GET['cli_id'])
                ];

                $count_reqprep->execute($count_prepare );


                $list_adhesion_member = $reqprep->fetchAll(\PDO::FETCH_NUM);
                $count_adhesion_member = $count_reqprep->fetch(\PDO::FETCH_NUM);

                $return = [
                    "content" => $list_adhesion_member ,
                    "count" => $count_adhesion_member[0],
                    "head"=>["Id","Date création","Montant","Statut",'Action']];

                    return $return ;

                }

                function get_adhesion_by_member_front(){

                    $reqprep = $this->bdd->prepare(
                        "SELECT

                        asso_receipt.rec_number,

                        asso_adhesion.adhesion_id,
                        asso_adhesion.adhesion_ts,
                        asso_adhesion.adhesion_mnt,
                        asso_adhesion.adhesion_status


                        from

                        asso_adhesion

                        LEFT JOIN asso_receipt_adhesion on asso_receipt_adhesion.adhesion_id = asso_adhesion.adhesion_id
                        LEFT JOIN asso_receipt on asso_receipt.rec_id = asso_receipt_adhesion.rec_id

                        WHERE asso_adhesion.cli_id = :cli_id
                        ");

                        $prepare = [
                            ":cli_id" => htmlspecialchars($_SESSION['cli_id'])
                        ];

                        $reqprep->execute($prepare);

                        $list_adhesion_member = $reqprep->fetchAll(\PDO::FETCH_NUM);

                        $return = [
                            "content" => $list_adhesion_member ,
                            "head"=>["Rec_num","Id","Date de création","Montant","Statut",'Action']
                        ];

                        return $return ;

                    }

                    function get_list(){

                        $where = '';

                        $param_request = $this->Get_param_request();

                        foreach ($param_request[0] as $key => $value) {
                            if($value != '' && $key!='export_name' ){

                                switch (substr($key,0,3)) {

                                    case 'adh':
                                    $key_table = 'asso_adhesion.'.$key;
                                    $where .= ' AND '.$key_table.' LIKE :'.$key ;
                                    break;

                                    case 'cli':
                                    $key_table = 'P2.'.$key;
                                    $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...
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


                        if (isset($param_request[1]) && ($param_request[1] != 'get')){ $filter = ( ($param_request[1]) - 1 ) * 10 ; } else { $filter = 0; }


                        $reqprep = $this->bdd->prepare(
                            "SELECT

                            asso_adhesion.adhesion_id as Id_adhesion,

                           P2.cli_lastname as Nom,
                           P2.cli_firstname as Prénom,

                           asso_adhesion.adhesion_mnt as Montant,
                           asso_adhesion.adhesion_ts as Date_creation,
                           asso_adhesion.adhesion_status as Status,

                           P4.rec_number as Receipt

                           FROM

                           asso_adhesion

                           LEFT JOIN crm_client as P2 ON P2.cli_id = asso_adhesion.cli_id
                           LEFT JOIN asso_receipt_adhesion as P3 ON P3.adhesion_id = asso_adhesion.adhesion_id
                           LEFT JOIN asso_receipt as P4 ON P4.rec_id = P3.rec_id

                            WHERE

                            1=1

                            $where

                            ORDER BY

                            asso_adhesion.adhesion_ts DESC

                            LIMIT $filter,10

                            ");

                            $count_reqprep = $this->bdd->prepare("SELECT COUNT(adhesion_id) FROM asso_adhesion WHERE 1=1 $where ");

                            if($param_request[0] != []){

                                foreach ($param_request[0] as $key => $value) {
                                    if($value != '' && $key!= 'rec_number'){

                                        $reqprep->bindValue(":".$key,$value);
                                        $count_reqprep->bindValue(":".$key,$value);

                                    }
                                }
                            }

                            $reqprep->execute();

                            $count_result   = $count_reqprep->execute();
                            $count_result   = $count_reqprep->fetch(\PDO::FETCH_NUM);



                            $data = [
                                "list_adhesion"     => $reqprep->fetchAll(\PDO::FETCH_NUM),
                                "head"              => ["Id","Nom","Prénom","Montant","Date enregistrement","Statut"],
                                "count"             => $count_result
                            ];

                            return $data;
                        }

                        public function delete()
                        {
                            $reqprep = $this->bdd->prepare(
                                "DELETE FROM asso_adhesion
                                WHERE adhesion_id=:adhesion_id ");
                                $prepare = [":adhesion_id" => htmlspecialchars($_GET["adhesion_id"])];

                                $reqprep->execute($prepare);

                                header("Location: ".$_SERVER['HTTP_REFERER']);

                            }

                            public function update(){

                                $reqprep = $this->bdd->prepare(

                                    "UPDATE asso_adhesion

                                    SET
                                    cli_id     = :cli_id,
                                    adhesion_mnt    = :adhesion_mnt,
                                    ptyp_id    = :ptyp_id,
                                    adhesion_status = :adhesion_status

                                    WHERE
                                    adhesion_id = :adhesion_id "
                                );

                                $prepare = [
                                    ":cli_id" => htmlspecialchars($_POST["cli_id"]),
                                    ":adhesion_mnt" => htmlspecialchars($_POST["adhesion_mnt"]),
                                    ":ptyp_id" => htmlspecialchars($_POST["ptyp_id"]),
                                    ":adhesion_id" => htmlspecialchars($_GET["adhesion_id"]),
                                    ":adhesion_status" =>htmlspecialchars($_POST["adhesion_status"])
                                ];

                                $reqprep->execute($prepare);

                                $reqprep2 = $this->bdd->prepare("SELECT MAX(adhesion_id) from asso_adhesion");
                                $prepare2 = [];
                                $reqprep2->execute($prepare2);
                                $p_adhesion_id = $reqprep2->fetch();

                                
                                if($_POST["adhesion_status"] == 'OK'){

                                    (new \Manager\Receipt($this->bdd))->add(["adhesion_id" =>htmlspecialchars($_GET["adhesion_id"]),"type"=>"adhesion"]);
                                }

                                switch ($_GET["from"]) {

                                    case 'add':
                                    header("Location: /www/Kalaweit/asso_adhesion/add");
                                    break;

                                    case 'get':
                                    header("Location: /www/Kalaweit/member/get?cli_id=".htmlspecialchars($_POST["cli_id"]));
                                    break;

                                    default:
                                    header("Location: /www/Kalaweit/asso_adhesion/list/1");
                                    break;
                                }

                            }

                            public function get()
                            {
                                $reqprep = $this->bdd->prepare("SELECT * FROM asso_adhesion WHERE adhesion_id = :adhesion_id");


                                $prepare = [ ":adhesion_id" => htmlspecialchars($_GET['adhesion_id']) ];

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

                                    $sum = $this->bdd->query("SELECT COUNT(adhesion_mnt) FROM asso_adhesion WHERE YEAR(adhesion_ts)= $year and MONTH(adhesion_ts)= $i ");

                                    array_push($data,$sum->fetch(\PDO::FETCH_NUM ));

                                }

                                return $data;

                            }
                            public function get_chart_data_sum($year){

                                $data = [];

                                for ($i=1; $i < 13; $i++) {

                                    $sum = $this->bdd->query("SELECT SUM(adhesion_mnt) FROM asso_adhesion WHERE YEAR(adhesion_ts)= $year and MONTH(adhesion_ts)= $i ");

                                    array_push($data,$sum->fetch(\PDO::FETCH_NUM ));

                                }

                                return $data;

                            }

                            public function get_chart_data_sum_month($year,$month){

                                $sum = $this->bdd->query("SELECT SUM(adhesion_mnt) FROM asso_adhesion WHERE YEAR(adhesion_ts)= $year and MONTH(adhesion_ts) = $month ");

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

                                    $sum = $this->bdd->query("SELECT SUM(adhesion_mnt) FROM asso_adhesion WHERE YEAR(adhesion_ts)= $year and MONTH(adhesion_ts)= $i ");

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

                                    $sum = $this->bdd->query("SELECT COUNT(adhesion_mnt) FROM asso_adhesion WHERE YEAR(adhesion_ts)= $year and MONTH(adhesion_ts)= $i ");

                                    $temp = $sum->fetch(\PDO::FETCH_NUM );

                                    $data[] = $temp[0];
                                }

                                return $data;

                            }

                            public function get_year_count($year){

                                $sum = $this->bdd->query("SELECT COUNT(adhesion_mnt) FROM asso_adhesion WHERE YEAR(adhesion_ts)= $year ");

                                $return = $sum->fetch(\PDO::FETCH_NUM);
                                if ($return[0] == NULL){ $return[0] = '0';}

                                return $return;

                            }

                            public function get_year_sum($year){

                                $sum = $this->bdd->query("SELECT SUM(adhesion_mnt) FROM asso_adhesion WHERE YEAR(adhesion_ts)= $year ");

                                $return = $sum->fetch(\PDO::FETCH_NUM);
                                if ($return[0] == NULL){ $return[0] = '0';}

                                return $return;

                            }

                            public function get_list_export(){

                                $where = '';

                                $param_request = $this->Get_param_request();

                                foreach ($param_request[0] as $key => $value) {
                                    if($value != ''){

                                        switch (substr($key,0,3)) {

                                            case 'adh':
                                            $key_table = 'asso_adhesion.'.$key;
                                            $where .= ' AND '.$key_table.' LIKE :'.$key ;
                                            break;

                                            case 'cli':
                                            $key_table = 'P2.'.$key;
                                            $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...
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

                                $reqprep = $this->bdd->prepare(
                                    "SELECT

                                    asso_adhesion.adhesion_id as Id_adhesion,

                                   P2.cli_lastname as Nom,
                                   P2.cli_firstname as Prénom,

                                   asso_adhesion.adhesion_mnt as Montant,
                                   asso_adhesion.adhesion_ts as Date_creation,
                                   asso_adhesion.adhesion_status as Status,

                                   P4.rec_number as Receipt

                                   FROM

                                   asso_adhesion

                                   LEFT JOIN crm_client as P2 ON P2.cli_id = asso_adhesion.cli_id
                                   LEFT JOIN asso_receipt_adhesion as P3 ON P3.adhesion_id = asso_adhesion.adhesion_id
                                   LEFT JOIN asso_receipt as P4 ON P4.rec_id = P3.rec_id

                                    WHERE

                                    1=1

                                    $where

                                    ORDER BY

                                    asso_adhesion.adhesion_ts DESC ");

                                    if($param_request[0] != []){

                                        foreach ($param_request[0] as $key => $value) {
                                            if($value != '' && $key != 'export_name' && $key != 'rec_number'){

                                                $reqprep->bindValue(":".$key,$value);

                                            }
                                        }

                                    }

                                    $reqprep->execute();

                                    $data = [
                                        "content"     => $reqprep->fetchAll(\PDO::FETCH_NUM),
                                        "head"              => ["Id","Prénom","Nom","Montant","Date enregistrement","Statut","Numéro de recu", ],
                                    ];

                                    return $data;
                                }

                                function get_adhesion_by_member_card(){

                                    if(isset($_GET['cli_id'])){

                                    $reqprep = $this->bdd->prepare(
                                    "SELECT SUM(adhesion_mnt)

                                    FROM

                                    asso_adhesion

                                    WHERE cli_id = :cli_id and  YEAR(adhesion_ts) = YEAR(NOW())


                                    ");

                                    $prepare = [
                                        ":cli_id" => htmlspecialchars($_GET['cli_id']),
                                    ];

                                    $reqprep->execute($prepare);

                                    $return = $reqprep->fetch(\Pdo::FETCH_NUM);

                                } else { $return = [0]; }

                                return $return ;

                                }

                                function add_random($id,$mnt,$status,$year){

                                    $reqprep = $this->bdd->prepare(

                                        "INSERT INTO
                                        asso_adhesion

                                        ( brk_id , cli_id , adhesion_mnt , ptyp_id, adhesion_ts ,adhesion_status )

                                        VALUES

                                        ( :brk_id, :cli_id, :adhesion_mnt, :ptyp_id , :adhesion_ts, :adhesion_status)

                                        "

                                    );

                                    $min_stamp = mktime(0,0,0,1,1,$year);
                                    $max_stamp = $min_stamp + (1546214400 - 1515715200);


                                    $date = rand($min_stamp,$max_stamp);

                                    $date_insert = date('Y-m-d G:i:s',$date);


                                    $prepare = [

                                        ":brk_id" => 2,
                                        ":cli_id" => $id,
                                        ":adhesion_mnt"=> $mnt,
                                        ":adhesion_status"=> $status,
                                        ":ptyp_id"=> 1,
                                        ":adhesion_ts" => $date_insert//, mktime(0, 0, 0, $_timestamp["M"], $_timestamp["D"], $_timestamp["Y"]))
                                    ];

                                    $insert = $reqprep->execute($prepare);

                                    $reqprep2 = $this->bdd->prepare("SELECT MAX(adhesion_id) From asso_adhesion");
                                    $prepare2 = [];
                                    $reqprep2->execute($prepare2);

                                    $adhesion_id = $reqprep2->fetch(\PDO::FETCH_NUM);

                                    if($status == 'OK'){

                                        (new \Manager\Receipt($this->bdd))->add(["type"=> "adhesion", "adhesion_id" => $adhesion_id[0]]);

                                    }

                                }


                            }
