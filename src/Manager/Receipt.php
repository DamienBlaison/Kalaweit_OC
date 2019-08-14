<?php namespace Manager;
/**
*
*/
class Receipt
{

    use \Controller\Transverse\Get_param_request;

    function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function add($p_don_id){

        $type = $p_don_id["type"];

        if($type == 'adhesion'){

            $recup_adhesion_info = $this->bdd->prepare(" SELECT * FROM asso_adhesion WHERE adhesion_id = :adhesion_id ");

            $prepare = [

                ":adhesion_id" => $p_don_id["adhesion_id"]

            ];

            $recup_adhesion_info->execute($prepare);

            $data = $recup_adhesion_info->fetch(\PDO::FETCH_ASSOC);

            $recup_info_donator = $this->bdd->prepare("SELECT * FROM crm_client WHERE cli_id = :cli_id");

            $prepare0 = [

                ":cli_id" => $data["cli_id"]
            ];

            $recup_info_donator->execute($prepare0);

            $info_donator = $recup_info_donator->fetch(\PDO::FETCH_ASSOC);

            // indexation des numeros de recus

            $suffixe = '_'.str_replace(['/',' '],'_',$info_donator["cli_firstname"]).'_'.str_replace(['/',' '],'_',$info_donator["cli_lastname"]);

            $year = date('Y',strtotime($data["adhesion_ts"]));


            $req = "SELECT MAX(rec_number) FROM asso_receipt WHERE rec_number LIKE '%R_adhesion%' AND rec_year = $year ";

            $date = date('Y',strtotime($data["adhesion_ts"]));

            $prefixe = "R_adhesion_".$date."_";

            var_dump($prefixe);

            $rec_number = ($this->bdd->query($req));

            $receipt_number = $rec_number->fetch(\PDO::FETCH_NUM);

            if($receipt_number[0] != NULL){

                $max = explode('_',$receipt_number[0]);

                $receipt_num = intval($max[3]);


            } else { $receipt_num = 1000; };


        } else {

            $recup_don_info = $this->bdd->prepare(" SELECT * FROM asso_donation WHERE don_id = :don_id ");

            $prepare = [

                ":don_id" => $p_don_id["don_id"]

            ];

            $recup_don_info->execute($prepare);

            $data = $recup_don_info->fetch(\PDO::FETCH_ASSOC);

            $recup_info_donator = $this->bdd->prepare("SELECT * FROM crm_client WHERE cli_id = :cli_id");

            $prepare0 = [

                ":cli_id" => $data["cli_id"]
            ];

            $recup_info_donator->execute($prepare0);

            $info_donator = $recup_info_donator->fetch(\PDO::FETCH_ASSOC);

            // indexation des numeros de recus

            $suffixe = '_'.str_replace(['/',' '],'_',$info_donator["cli_firstname"]).'_'.str_replace(['/',' '],'_',$info_donator["cli_lastname"]);

            $year = date('Y',strtotime($data["don_ts"]));

            switch ($data["cau_id"]) {

                case '700':

                $req = "SELECT MAX(rec_number) FROM asso_receipt WHERE rec_number LIKE '%R_dulan%' AND rec_year = $year";

                $prefixe = "R_dulan_".date('Y',strtotime($data["don_ts"]))."_";


                break;

                case '703':

                $req = "SELECT MAX(rec_number) from asso_receipt WHERE rec_number LIKE '%R_forest%' AND rec_year = $year ";
                $prefixe = "R_forest_".date('Y',strtotime($data["don_ts"]))."_";

                break;

                case '704':

                $req = "SELECT MAX(rec_number) from asso_receipt WHERE rec_number LIKE '%R_asso%' AND rec_year = $year ";
                $prefixe = "R_asso_".date('Y',strtotime($data["don_ts"]))."_";

                break;

                default:

                $req = "SELECT MAX(rec_number) from asso_receipt WHERE rec_number LIKE '%R_gibbon%' AND rec_year = $year ";
                $prefixe = "R_gibbon_".date('Y',strtotime($data["don_ts"]))."_";

                break;
            }

            $rec_number = ($this->bdd->query($req));

            $receipt_number = $rec_number->fetch(\PDO::FETCH_NUM);

            if($receipt_number[0] != NULL){

                $max = explode('_',$receipt_number[0]);

                $receipt_num = intval($max[3]);

            } else { $receipt_num = 1000; };

        }

        $insert = $this->bdd->prepare(" INSERT INTO asso_receipt (brk_id,cli_id,rec_ts,rec_year,rec_number,rec_mnt) VALUES (2,:cli_id,:rec_ts,:rec_year,:rec_number,:rec_mnt)");


        $receipt_num_to_insert = $receipt_num + 1;

        $rec_number = $prefixe.$receipt_num_to_insert.$suffixe;

        if($type == 'adhesion'){

            $prepare2 =[

                ":cli_id" => $data["cli_id"],
                ":rec_ts" => date('Y-m-d G:i:s'),
                ":rec_year" => date('Y',strtotime($data["adhesion_ts"])),
                ":rec_number" => $rec_number,
                ":rec_mnt" => $data["adhesion_mnt"]
            ];
        } else {

            $prepare2 =[

                ":cli_id" => $data["cli_id"],
                ":rec_ts" => date('Y-m-d G:i:s'),
                ":rec_year" => $year,
                ":rec_number" => $rec_number,
                ":rec_mnt" => $data["don_mnt"]
            ];

        }



        $insert->execute($prepare2);

        $new_receipt = $this->bdd->query("SELECT MAX(rec_id) From asso_receipt");
        $new_receipt->execute();


        $return = $new_receipt->fetch(\PDO::FETCH_NUM);

        switch ($type) {
            case 'adhesion':

            $reqprep3 = $this->bdd->prepare("INSERT INTO asso_receipt_adhesion (rec_id,adhesion_id) VALUES (:rec_id,:adhesion_id)");

            $prepare3 = [
                ":rec_id" => $return[0],
                ":adhesion_id" => $p_don_id["adhesion_id"]
            ];

            $reqprep3->execute($prepare3);

            (new \Controller\Back\Receipt())->get($return[0],"close","adhesion");
            break;

            default:

            $reqprep3 = $this->bdd->prepare("INSERT INTO asso_receipt_donation (rec_id,don_id) VALUES (:rec_id,:don_id)");
            $prepare3 = [
                ":rec_id" => $return[0],
                ":don_id" => $p_don_id["don_id"]
            ];

            $reqprep3->execute($prepare3);

            (new \Controller\Back\Receipt())->get($return[0],"close",$type);

            break;
        }

        return $return;

    }

    public function get($rec_id){

        $reqprep = $this->bdd->prepare(

            "SELECT

            asso_receipt.rec_id,
            asso_receipt.cli_id,
            asso_receipt.rec_year,
            asso_receipt.rec_number,
            asso_receipt.rec_mnt,

            crm_client.cli_firstname,
            crm_client.cli_lastname,
            crm_client.cli_address1,
            crm_client.cli_address2,
            crm_client.cli_address3,
            crm_client.cli_cp,
            crm_client.cli_town,
            crm_client.cnty_id,

            crm_country.cnty_name


            FROM

            asso_receipt

            LEFT JOIN crm_client ON asso_receipt.cli_id = crm_client.cli_id
            LEFT JOIN crm_country ON crm_client.cnty_id = crm_country.cnty_id

            WHERE asso_receipt.rec_id = :rec_id

            ");

            $prepare = [
                //":rec_id" => $_GET["receipt_id"]
                ":rec_id" => $rec_id
            ];

            $reqprep->execute($prepare);

            $return = $reqprep->fetch(\PDO::FETCH_ASSOC);

            return $return;
        }

        function name_receipt($id_don){

            $reqprep = $this->bdd->prepare(
                "   SELECT

                asso_receipt.rec_number

                From asso_receipt_donation

                LEFT JOIN asso_receipt ON asso_receipt_donation.rec_id = asso_receipt.rec_id

                WHERE asso_receipt_donation.don_id = :id_don

                ");

                $prepare = [
                    ":id_don" => $id_don
                ];

                $reqprep->execute($prepare);

                return $return = $reqprep->fetch(\PDO::FETCH_ASSOC);


            }
            function name_receipt_annual(){

                $reqprep = $this->bdd->prepare(
                    "   SELECT

                    asso_receipt.rec_number

                    From asso_receipt

                    WHERE asso_receipt.rec_number like 'R_fisc%' and rec_year = :year and cli_id = :cli_id

                    ");

                    $prepare = [
                        ":cli_id" => $_GET["cli_id"],
                        ":year" => date('Y')
                    ];

                    $reqprep->execute($prepare);

                    return $return = $reqprep->fetch(\PDO::FETCH_ASSOC);

                }


            function name_receipt_adhesion($id_adhesion){

                $reqprep = $this->bdd->prepare(
                    "   SELECT

                    asso_receipt.rec_number

                    From asso_receipt

                    LEFT JOIN asso_receipt_adhesion ON asso_receipt_adhesion.rec_id = asso_receipt.rec_id

                    WHERE asso_receipt_adhesion.adhesion_id = :id_adhesion

                    ");

                    $prepare = [
                        ":id_adhesion" => $id_adhesion
                    ];

                    $reqprep->execute($prepare);

                    return $return = $reqprep->fetch(\PDO::FETCH_ASSOC);


                }

                function get_list(){

                    $where = " ";

                    $param_request = $this->Get_param_request();

                    foreach ($param_request[0] as $key => $value) {
                        if($value != ''){

                            switch (substr($key,0,3)) {

                                case 'cau':
                                $key_table = 'P1.'.$key;
                                break;
                                case 'don':
                                $key_table = 'asso_donation.'.$key;// code...
                                break;
                                case 'cli':
                                $key_table = 'P2.'.$key;// code...
                                break;

                            }

                            $where .= ' AND '.$key_table.' LIKE :'.$key ;

                        }
                    }

                    if (isset($param_request[1]) && ($param_request[1] != 'get')){$filter = (($param_request[1])-1)*10;}else{$filter = 0;}


                    $reqprep = $this->bdd->prepare(
                        "SELECT

                        asso_receipt.rec_ts as 'Date du reçu',
                        asso_receipt.rec_number as 'Référence',
                        asso_receipt.rec_mnt as 'Montant',

                        crm_client.cli_firstname as 'Prénom',
                        crm_client.cli_lastname as 'Nom'

                        FROM

                        asso_receipt

                        LEFT JOIN crm_client  ON crm_client.cli_id = asso_receipt.cli_id

                        WHERE

                        1=1

                        $where

                        ORDER BY

                        asso_receipt.rec_ts DESC

                        LIMIT $filter,10

                        ");

                        $count_reqprep = $this->bdd->prepare("SELECT COUNT(don_id) FROM asso_donation WHERE 1=1 $where ");

                        if($param_request[0] != []){

                            foreach ($param_request[0] as $key => $value) {
                                if($value != ''){

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
                            "content"     => $result,
                            "head"              => ["Id","Prénom","Nom","Animal","Montant","Date enregistrement"],
                            "count"             => $count_result,
                        ];

                        return $data;
                    }

                    function generate(){

                        $req = $this->bdd->query("SELECT don_id From asso_donation");

                        $list = $req->fetchAll(\PDO::FETCH_NUM);

                        foreach ($list as $key => $value) {

                            $don_id = $value[0];

                            $reqprep = $this->bdd->query("SELECT * FROM asso_receipt_donation WHERE don_id = $don_id " );

                            $response = $reqprep->fetch();

                            if ($response === false){

                                $this->add($don_id);

                                $recup_rec_id = $this->bdd->query("SELECT MAX(rec_id) FROM asso_receipt");

                                $rec_id = $recup_rec_id->fetch(\PDO::FETCH_NUM);


                                (new \Controller\Back\Receipt)->get($rec_id[0],'close');

                            }

                        }

                    }

                    function delete($receipt_name){

                        $name_receipt = explode('.', $receipt_name);

                        $prepare = [":rec_number" => $name_receipt[0]];

                        $reqprep = $this->bdd->prepare("SELECT rec_id from asso_receipt WHERE rec_number = :rec_number");
                        $reqprep->execute($prepare);

                        $rec_id = $reqprep->fetch(\PDO::FETCH_NUM);

                        $this->bdd->exec("DELETE FROM asso_receipt_donation WHERE rec_id = $rec_id[0] ");
                        $this->bdd->exec("DELETE FROM asso_receipt_adhesion WHERE rec_id = $rec_id[0] ");

                        $reqprep2= $this->bdd->prepare("DELETE FROM asso_receipt WHERE rec_number = :rec_number ");
                        $reqprep2->execute($prepare);

                        $folder = explode('_',$receipt_name);

                        $file = __DIR__ .'/../../Ged/Receipt/R_'.$folder[1].'/'.$receipt_name;

                        unlink($file);

                    }

                    function get_receipt_annual_by_member(){

                        $prepare = [":cli_id" => htmlspecialchars($_GET['cli_id'])];

                        $reqprep = $this->bdd->prepare("SELECT rec_year,rec_number,rec_mnt FROM asso_receipt WHERE cli_id = :cli_id AND rec_number LIKE 'R_fisc%'");

                        $reqprep->execute($prepare);

                        $reqprep2 = $this->bdd->prepare(" SELECT COUNT(rec_mnt) from asso_receipt WHERE cli_id = :cli_id ");

                        $reqprep2->execute($prepare);

                        $count =$reqprep2->fetch(\PDO::FETCH_NUM);

                        return $data = [
                            "head" => ["Année","Numéro du recu","Montant","Action"],
                            "content" =>  $reqprep->fetchAll(\PDO::FETCH_NUM),
                            "count" => $count[0]
                        ];

                    }

                    function details_donations_year_by_member($id){

                        $reqprep = $this->bdd->prepare("SELECT * FROM asso_donation WHERE cli_id = :id AND YEAR(don_ts) = :year AND don_status='OK'");
                        $prepare = [":id" => $id,":year" => date("Y") - 1 ];
                        $reqprep->execute($prepare);

                    return $reqprep->fetchAll(\Pdo::FETCH_ASSOC);

                    }

                    function resume_donations_year_by_member($id){

                        $reqprep = $this->bdd->prepare("SELECT sum(don_mnt) FROM asso_donation WHERE cli_id = :id AND YEAR(don_ts) = :year AND don_status='OK'");
                        $prepare = [":id"=>$id,":year"=> date("Y") - 1 ];
                        $reqprep->execute($prepare);

                    return $reqprep->fetchAll(\Pdo::FETCH_ASSOC);

                    }

                    function get_receipt_by_member_front(){

                        $reqprep = $this->bdd->prepare("SELECT rec_id,rec_year,rec_number, rec_mnt FROM asso_receipt WHERE cli_id = :cli_id AND rec_number LIKE 'R_fisc%'");
                        $prepare = [":cli_id" => $_SESSION["cli_id"]];
                        $reqprep->execute($prepare);

                        return  [
                            "content" => $reqprep->fetchAll(\PDO::FETCH_NUM),
                            "head"=>["Id","Année","Nom du reçu","Montant","Action"]
                        ];


                    }

                }
