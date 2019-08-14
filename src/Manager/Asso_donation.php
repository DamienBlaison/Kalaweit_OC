<?php
namespace Manager;

class Asso_donation
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

        if(isset($_POST["donation_mnt"])){

            $reqprep = $this->bdd->prepare(

                "INSERT INTO
                asso_donation

                ( brk_id , cli_id , don_mnt , ptyp_id, don_ts, cau_id ,don_status )

                VALUES

                ( :brk_id, :cli_id, :donation_dulan_mnt, :ptyp_id , :donation_dulan_ts, :cau_id, :don_status)

                "
            );

            $prepare = [

                ":brk_id" => 2,
                ":cli_id" => htmlspecialchars($_POST['cli_id']),
                ":donation_dulan_mnt"=> htmlspecialchars($_POST['donation_mnt']),
                ":ptyp_id"=> htmlspecialchars($_POST['ptyp_id']),
                ":donation_dulan_ts" => date('Y-m-d G:i:s'),
                ":cau_id" => htmlspecialchars($_POST['cau_id']),
                ":don_status" => htmlspecialchars($_POST['don_status'])
            ];

            $insert = $reqprep->execute($prepare);

            $reqprep2 = $this->bdd->prepare("SELECT MAX(don_id) from asso_donation");
            $prepare2 = [];
            $reqprep2->execute($prepare2);
            $p_don_id = $reqprep2->fetch();

            if($_POST["don_status"] == 'OK'){

                (new \Manager\Receipt($this->bdd))->add(["don_id" =>$p_don_id[0],"type"=>"donation"]);
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

            (new \Manager\Receipt($this->bdd))->add(["don_id" =>$p_don_id[0],"type"=>"donation"]);


    }

    function add_random($id,$cau,$mnt,$status,$year){

        $reqprep = $this->bdd->prepare(

            "INSERT INTO
            asso_donation

            ( brk_id , cli_id , cau_id , don_mnt , ptyp_id, don_ts ,don_status )

            VALUES

            ( :brk_id, :cli_id, :cau_id, :don_mnt, :ptyp_id , :don_ts, :don_status)

            "

        );

        $min_stamp = mktime(0,0,0,1,1,$year);
        $max_stamp = $min_stamp + (1546214400 - 1515715200);

        $date = rand($min_stamp,$max_stamp);

        $prepare = [

            ":brk_id" => 2,
            ":cli_id" => $id,
            ":cau_id" => $cau,
            ":don_mnt"=> $mnt,
            ":don_status"=> $status,
            ":ptyp_id"=> 1,
            ":don_ts" => date('Y-m-d G:i:s',$date)//, mktime(0, 0, 0, $_timestamp["M"], $_timestamp["D"], $_timestamp["Y"]))
        ];

        $insert = $reqprep->execute($prepare);

        $reqprep2 = $this->bdd->prepare("SELECT MAX(don_id) From asso_donation");
        $prepare2 = [];
        $reqprep2->execute($prepare2);

        $don_id = $reqprep2->fetch(\PDO::FETCH_NUM);

        if($status == 'OK'){

            switch ($cau) {
                case '703':
                    $type = "donation_forest";
                break;
                case '704':
                $type = "donation_asso";
                break;
                case '700':
                $type = "donation_dulan";
                break;
                default:
                $type = "donation";
                break;
            }

            (new \Manager\Receipt($this->bdd))->add(["type"=>$type, "don_id" => $don_id[0]]);

        }

    }

    function get_last(){

        $reqprep = $this->bdd->query(
        "SELECT

        asso_donation.don_id as Id_don,

        asso_donation.cli_id as Id_Parrain,
        P2.cli_firstname as Prénom,
        P2.cli_lastname as Nom,

        P1.cau_name as Béneficiaire,

        asso_donation.don_mnt as Montant,
        asso_donation.don_ts as Date_creation,
        asso_donation.don_status as Statut

        FROM

        asso_donation

        LEFT JOIN asso_cause as P1 ON P1.cau_id = asso_donation.cau_id
        LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id

        WHERE asso_donation.cau_id != '703' and asso_donation.cau_id!= '700' and asso_donation.cau_id != '704'

        ORDER BY

        asso_donation.don_ts DESC

        LIMIT 0,10

        ");

        //$prepare = [":don_ts" => $_GET['don_ts']];

        $data = [
            "content"     => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "head"              => ["Id","Id_membre","Prénom","Nom","Animal","Montant","Date enregistrement","Statut","Action"],

        ];

        return $data;

    }

    function asso_cause_donation($p_nb_by_page,$p){

        $start = ($p * $p_nb_by_page) - $p_nb_by_page ;

        $reqprep = $this->bdd->prepare(

            "SELECT
            asso_donation.don_id,
            crm_client.cli_firstname,
            crm_client.cli_lastname,
            asso_donation.don_mnt,
            asso_donation.don_ts,
            asso_donation.don_status


            FROM asso_donation

            LEFT JOIN crm_client ON crm_client.cli_id=asso_donation.cli_id

            WHERE asso_donation.cau_id = :cau_id

            and cau_id != '703' and cau_id!= '700' and cau_id != '704'

            ORDER BY asso_donation.don_ts DESC

            LIMIT $start, $p_nb_by_page");

        if (isset($_GET["cau_id"])){
            $cau_id = htmlspecialchars($_GET["cau_id"]);
        }
        else
        {
            $cau_id = "";
        };

        $prepare = [":cau_id" => $cau_id];
        $reqprep->execute($prepare);

        $count = $this->bdd->prepare("SELECT count(*) FROM asso_donation WHERE cau_id = :cau_id ORDER BY don_ts DESC");
        $count->execute($prepare);

        $count_return = $count->fetch(\PDO::FETCH_NUM);

        $data = [
            "content" => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "head" => ["Id","Prénom","Nom","Montant","Date du don","Status","Action"],
            "count" => $count_return[0]
        ];

        return $data;
    }

    function get_donation_by_member($p_nb_by_page,$p){

        $start = ($p * $p_nb_by_page) - $p_nb_by_page ;

        $reqprep = $this->bdd->prepare(
        "SELECT

        asso_donation.don_id as Id_don,
        asso_donation.don_ts as Date_creation,
        P1.cau_name as Béneficiaire,

        asso_donation.don_mnt as Montant,
        asso_donation.don_status as Statut

        FROM

        asso_donation

        LEFT JOIN asso_cause as P1 ON P1.cau_id = asso_donation.cau_id
        LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id

        WHERE P2.cli_id = :cli_id AND P1.cau_id != 703 AND P1.cau_id != 700 AND P1.cau_id != 704

        ORDER BY

        asso_donation.don_ts DESC

        LIMIT $start,$p_nb_by_page

        ");

        $prepare = [
            ":cli_id" => htmlspecialchars($_GET['cli_id']),
        ];

        $reqprep->execute($prepare);

        $count_reqprep = $this->bdd->prepare("SELECT COUNT(don_id) FROM asso_donation WHERE 1=1 and cli_id = :cli_id AND cau_id != 703 AND cau_id != 700 and cau_id!=704");

        $count_prepare = [
            ":cli_id" => htmlspecialchars($_GET['cli_id'])
        ];

        $count_reqprep->execute($count_prepare);
        $count_return = $count_reqprep->fetch(\PDO::FETCH_NUM);

        $return = [
            "content" => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "count" => $count_return[0],
            "head"=>["Id","Date création","Bénéficaire","Montant","Statut","action"]
        ];

        return $return ;

    }

    function get_donation_by_member_front(){

        $reqprep = $this->bdd->prepare(
        "SELECT
        asso_receipt.rec_number as rec_num,
        asso_donation.don_id as Id,
        P1.cau_name as Béneficiaire,

        asso_donation.don_ts as Date_creation,
        asso_donation.don_mnt as Montant,
        asso_donation.don_status as Statut

        FROM

        asso_donation

        LEFT JOIN asso_cause as P1 ON P1.cau_id = asso_donation.cau_id
        LEFT JOIN asso_receipt_donation on asso_receipt_donation.don_id = asso_donation.don_id
        LEFT JOIN asso_receipt on asso_receipt.rec_id = asso_receipt_donation.rec_id

        WHERE asso_donation.cli_id = :cli_id AND P1.cau_id != 703 AND P1.cau_id != 700 AND P1.cau_id != 704

        ORDER BY

        asso_donation.don_ts DESC

        ");

        $prepare = [
            ":cli_id" => htmlspecialchars($_SESSION['cli_id']),
        ];

        $reqprep->execute($prepare);

        $return = [
            "content" => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "head"=>["rec_num","Id","Bénéficaire","Date création","Montant","Statut","Action"]
        ];

        return $return ;

    }

    function get_donation_by_member_card(){

        if(isset($_GET['cli_id'])){

        $reqprep = $this->bdd->prepare(
        "SELECT SUM(don_mnt)

        FROM

        asso_donation

        WHERE cli_id = :cli_id AND cau_id != 703 AND cau_id != 704 AND cau_id != 700 AND YEAR(don_ts) = YEAR(NOW())


        ");

        $prepare = [
            ":cli_id" => htmlspecialchars($_GET['cli_id']),
        ];

        $reqprep->execute($prepare);

        $return = $reqprep->fetch(\Pdo::FETCH_NUM);

    } else { $return = [0]; }

    return $return ;

    }

    function get_list(){

        $where = " ";

        $param_request = $this->Get_param_request();

        foreach ($param_request[0] as $key => $value) {
            if($value != ''){

                switch (substr($key,0,3)) {

                    case 'cau':
                        $key_table = 'P1.'.$key;
                        $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...

                        break;
                    case 'don':
                            $key_table = 'asso_donation.'.$key;// code...
                            $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...

                        break;
                    case 'cli':
                            $key_table = 'P2.'.$key;// code...
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


        if (isset($param_request[1]) && ($param_request[1] != 'get')){$filter = (($param_request[1])-1)*10;}else{$filter = 0;}


        $reqprep = $this->bdd->prepare(
        "SELECT

        asso_donation.don_id as Id_don,

        P2.cli_firstname as Prénom,
        P2.cli_lastname as Nom,

        P1.cau_name as Béneficiaire,

        asso_donation.don_mnt as Montant,
        asso_donation.don_ts as Date_creation,
        asso_donation.don_status as Statut,

        P4.rec_number as Receipt

        FROM

        asso_donation

        LEFT JOIN asso_cause as P1 ON P1.cau_id = asso_donation.cau_id
        LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id
        LEFT JOIN asso_receipt_donation as P3 ON P3.don_id = asso_donation.don_id
        LEFT JOIN asso_receipt as P4 ON P4.rec_id = P3.rec_id

        WHERE

        1=1

        AND P1.cau_id != '703' AND P1.cau_id != '700'and P1.cau_id != '704'

        $where

        ORDER BY

        asso_donation.don_ts DESC

        LIMIT $filter,10

        ");

        $count_reqprep = $this->bdd->prepare("SELECT COUNT(don_id) FROM asso_donation WHERE 1=1 $where and cau_id != '700' and cau_id != '703' and cau_id != '704' ");

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

        $result = $reqprep->fetchAll(\PDO::FETCH_NUM);


            $data = [
                "list_donation"     => $result,
                "head"              => ["Id","Prénom","Nom","Animal","Montant","Date enregistrement","Statut"],
                "count"             => $count_result,
            ];

            return $data;
    }

    function get_list_export(){

        $where = " ";

        $param_request = $this->Get_param_request();

        foreach ($param_request[0] as $key => $value) {
            if($value != '' && $key!= 'export_name'){

                switch (substr($key,0,3)) {

                    case 'cau':
                        $key_table = 'P1.'.$key;
                        $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...

                        break;
                    case 'don':
                            $key_table = 'asso_donation.'.$key;// code...
                            $where .= ' AND '.$key_table.' LIKE :'.$key ;// code...

                        break;
                    case 'cli':
                            $key_table = 'P2.'.$key;// code...
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

        asso_donation.don_id as Id_don,

        P2.cli_firstname as Prénom,
        P2.cli_lastname as Nom,

        P1.cau_name as Béneficiaire,

        asso_donation.don_mnt as Montant,
        asso_donation.don_ts as Date_creation,
        asso_donation.don_status as Statut,

        P4.rec_number as Receipt

        FROM

        asso_donation

        LEFT JOIN asso_cause as P1 ON P1.cau_id = asso_donation.cau_id
        LEFT JOIN crm_client as P2 ON P2.cli_id = asso_donation.cli_id
        LEFT JOIN asso_receipt_donation as P3 ON P3.don_id = asso_donation.don_id
        LEFT JOIN asso_receipt as P4 ON P4.rec_id = P3.rec_id

        WHERE

        1=1

        AND P1.cau_id != '703' AND P1.cau_id != '700'and P1.cau_id != '704'

        $where

        ORDER BY

        asso_donation.don_ts DESC


        ");

        if($param_request[0] != []){

            foreach ($param_request[0] as $key => $value) {
                if($value != '' && $key!= 'export_name' && $key!= 'rec_number'){

                    $reqprep->bindValue(":".$key,$value);

                }
            }
        }

        $reqprep->execute();

            $data = [
                "content"     =>  $reqprep->fetchAll(\PDO::FETCH_NUM),
                "head"        => ["Id","Prénom","Nom","Animal","Montant","Date enregistrement", "Statut", "NUméro de reçu"],
            ];

            return $data;
    }



    public function delete()
    {
        $reqprep = $this->bdd->prepare(
            "DELETE FROM asso_donation
             WHERE don_id=:don_id ");
        $prepare = [":don_id" => htmlspecialchars($_GET["don_id"])];

        $reqprep->execute($prepare);

    header("Location: ".$_SERVER['HTTP_REFERER']);

    }

    public function update()
    {
        $reqprep = $this->bdd->prepare(

            "UPDATE asso_donation

             SET
             cli_id     = :cli_id,
             cau_id     = :cau_id,
             don_mnt    = :don_mnt,
             ptyp_id    = :ptyp_id,
             don_status = :don_status

             WHERE

             don_id=:don_id ");

        $prepare = [
            ":don_id" => htmlspecialchars($_GET["don_id"]),
            ":cli_id" => htmlspecialchars($_POST['cli_id']),
            ":cau_id" => htmlspecialchars($_POST['cau_id']),
            ":don_mnt"=> htmlspecialchars($_POST['don_mnt']),
            ":ptyp_id"=> htmlspecialchars($_POST['ptyp_id']),
            ":don_status"=> htmlspecialchars($_POST['don_status'])
        ];

        $reqprep->execute($prepare);

        $reqprep2 = $this->bdd->prepare("SELECT MAX(don_id) from asso_donation");
        $prepare2 = [];
        $reqprep2->execute($prepare2);
        $p_don_id = $reqprep2->fetch();

        if($_POST["don_status"] == 'OK'){

            (new \Manager\Receipt($this->bdd))->add(["don_id" =>$p_don_id[0],"type"=>"donation"]);
        }

        switch ($_GET["from"]) {

            case 'get':

            if(isset($_GET["cli_id"])) { $to = '/www/Kalaweit/member/get?cli_id='.htmlspecialchars($_GET['cli_id']);}

            if(isset($_GET["cau_id"])) { $to = '/www/Kalaweit/asso_cause/get?cau_id='.htmlspecialchars($_GET['cau_id']);}

            header( "Location: ".$to);

            break;

            case 'add':
            header("Location: /www/Kalaweit/asso_donation/add");
            break;

            default:
            header("Location: /www/Kalaweit/asso_donation_dulan/list/1");
            break;

        }



    }

    public function get()
    {
        $reqprep = $this->bdd->prepare("SELECT * FROM asso_donation WHERE don_id = :don_id");


        $prepare = [ ":don_id" => htmlspecialchars($_GET['don_id'])];

        $reqprep->execute($prepare);

        return $data = $reqprep->fetch(\PDO::FETCH_ASSOC);

    }

    function get_mnt_donation_current_year(){
        $reqprep = $this->bdd->prepare("SELECT SUM(don_mnt) From asso_donation WHERe cau_id = :cau_id and YEAR(don_ts) = :Year_current");

        $prepare = [
            ":cau_id" => htmlspecialchars($_GET["cau_id"]),
            ":Year_current" => date("Y")
        ];

        $reqprep->execute($prepare);

        $data = $reqprep->fetch(\PDO::FETCH_NUM);

        $return = [$data[0], 280 - $data[0]];

        return $return ;
    }

    function get_mnt_donation_current_year_post(){
        $reqprep = $this->bdd->prepare("SELECT SUM(don_mnt) From asso_donation WHERe cau_id = :cau_id and YEAR(don_ts) = :Year_current");

        $prepare = [
            ":cau_id" => htmlspecialchars($_POST["cau_id"]),
            ":Year_current" => date("Y")
        ];

        $reqprep->execute($prepare);

        $data = $reqprep->fetch(\PDO::FETCH_NUM);

        $return = [$data[0], 280 - $data[0]];

        return $return ;
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

            $sum = $this->bdd->query("SELECT COUNT(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and MONTH(don_ts)= $i and cau_id != '703' and cau_id!= '700' and cau_id != '704'");

            array_push($data,$sum->fetch(\PDO::FETCH_NUM ));

        }

        return $data;

    }
    public function get_chart_data_sum($year){

        $data = [];

        for ($i=1; $i < 13; $i++) {

            $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and MONTH(don_ts)= $i and cau_id != '703' and cau_id!= '700' and cau_id != '704'");

            array_push($data,$sum->fetch(\PDO::FETCH_NUM ));

        }

        return $data;

    }

    public function get_chart_data_sum_month($year,$month){

        $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and MONTH(don_ts) = $month and cau_id != '703' and cau_id!= '700' and cau_id != '704'");

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

            $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and MONTH(don_ts)= $i and cau_id != '703' and cau_id!= '700' and cau_id != '704'");

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

            $sum = $this->bdd->query("SELECT COUNT(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and MONTH(don_ts)= $i and cau_id != '703' and cau_id!= '700' and cau_id != '704'");

            $temp = $sum->fetch(\PDO::FETCH_NUM );

            $data[] = $temp[0];
        }

        return $data;

    }

    public function get_year_count($year){

        $sum = $this->bdd->query("SELECT COUNT(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and cau_id != '703' and cau_id!= '700' and cau_id != '704'");

        $return = $sum->fetch(\PDO::FETCH_NUM);
        if ($return[0] == NULL){ $return[0] = '0';}

        return $return;

    }

    public function get_year_sum($year){

        $sum = $this->bdd->query("SELECT SUM(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= $year and cau_id != '703' and cau_id!= '700' and cau_id != '704'");

        $return = $sum->fetch(\PDO::FETCH_NUM);
        if ($return[0] == NULL){ $return[0] = '0';}

        return $return;

    }

    /************************************************/

    public function get_year_sum_by_cause($year,$cau_id){

        $reqprep = $this->bdd->prepare("SELECT SUM(don_mnt) FROM asso_donation WHERE YEAR(don_ts)= :year and cau_id = :cau_id");

        $prepare =[
            ":year" => $year,
            ":cau_id" => $cau_id
        ];

        $reqprep->execute($prepare);

        $return = $reqprep->fetch(\PDO::FETCH_NUM);

        if ($return[0] == NULL){ $return[0] = '0';}

        return $return;

    }

    public function get_type_donation(){

        $reqprep = $this->bdd->prepare("SELECT cau_id FROM asso_donation WHERE don_id = :don_id");
        $prepare =[
            ":don_id" => htmlspecialchars($_GET["don_id"])
        ];
        $reqprep->execute($prepare);

        return $reqprep->fetch(\PDO::FETCH_NUM);

    }



}
