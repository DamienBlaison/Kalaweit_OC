<?php

namespace Manager;

/**

* class des animaux
* blaison Kalaweit
*/


class Asso_cause
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

    public function get_list_export(){

        $param_request = $this->get_param_request();

        $where = '';
        $prepare = [];

        foreach ($param_request[0] as $key => $value) {

            if($value != '' && $key !='export_name'){

                switch ($key) {
                    case 'ac_name':
                    $key = 'asso_cause.cau_name';
                    break;
                    case 'actd_2':
                    $key = 'P2.caud_vals';
                    break;
                    case 'actd_1':
                    $key = 'P1.caud_vals';
                    break;
                    case 'actd_4':
                    $key = 'P4.caud_vals';
                    break;
                    case 'actd_3':
                    $key = 'P3.caud_vals';
                    break;
                    case 'ac_site':
                    $key = 'asso_cause.cau_site';
                    break;
                    case 'actd_8':
                    $key = 'P8.caud_vals';
                    break;
                    case 'actd_9':
                    $key = 'P9.caud_vals';
                    break;
                    case 'actd_7':
                    $key = 'P7.caud_vals';
                    break;
                }

                $where .= 'AND '.$key.' LIKE :'.strtr ($key , '.' , '_' ).' ' ;

                $prepare_loop = array(':'.strtr ($key , '.' , '_' ) => $value );

                $prepare = array_merge($prepare,$prepare_loop);

            }



        }

        $reqprep = $this->bdd->prepare(

            "SELECT asso_cause.cau_id , asso_cause.cau_name,  P2.caud_vals as sexe,P4.caud_vals as naissance, P3.caud_vals as espece, P1.caud_vals as ile, asso_cause.cau_site

            FROM asso_cause

            LEFT JOIN asso_cause_data as P1 on P1.cau_id = asso_cause.cau_id and P1.cautd_id = 1
            LEFT JOIN asso_cause_data as P2 on P2.cau_id = asso_cause.cau_id and P2.cautd_id = 2
            LEFT JOIN asso_cause_data as P3 on P3.cau_id = asso_cause.cau_id and P3.cautd_id = 3
            LEFT JOIN asso_cause_data as P4 on P4.cau_id = asso_cause.cau_id and P4.cautd_id = 4

            LEFT JOIN asso_cause_data as P7 on P7.cau_id = asso_cause.cau_id and P7.cautd_id = 7
            LEFT JOIN asso_cause_data as P8 on P8.cau_id = asso_cause.cau_id and P8.cautd_id = 8
            LEFT JOIN asso_cause_data as P9 on P9.cau_id = asso_cause.cau_id and P9.cautd_id = 9

            WHERE 1=1

            $where

            ORDER BY asso_cause.cau_name

            "
        );

        $reqprep->execute($prepare);

        $data = [
            "content"   => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "head"          => ["Id","Nom","Sexe","Date de naissance","Espèce","Localisation","Visible sur le site"],
        ];

        return $data;

    }


    public function get_list($param_request){

        $where = '';
        $prepare = [];

        foreach ($param_request[0] as $key => $value) {

            if($value != ''){

                switch ($key) {
                    case 'ac_name':
                    $key = 'asso_cause.cau_name';
                    break;
                    case 'actd_2':
                    $key = 'P2.caud_vals';
                    break;
                    case 'actd_1':
                    $key = 'P1.caud_vals';
                    break;
                    case 'actd_4':
                    $key = 'P4.caud_vals';
                    break;
                    case 'actd_3':
                    $key = 'P3.caud_vals';
                    break;
                    case 'ac_site':
                    $key = 'asso_cause.cau_site';
                    break;
                    case 'actd_8':
                    $key = 'P8.caud_vals';
                    break;
                    case 'actd_9':
                    $key = 'P9.caud_vals';
                    break;
                    case 'actd_7':
                    $key = 'P7.caud_vals';
                    break;
                }
            }

            $where .= 'AND '.$key.' LIKE :'.strtr ($key , '.' , '_' ).' ' ;

            $prepare_loop = array(':'.strtr ($key , '.' , '_' ) => $value );

            $prepare = array_merge($prepare,$prepare_loop);

        }


        $filter = (($param_request[1])-1)*10;


        $reqprep = $this->bdd->prepare(

            "SELECT asso_cause.cau_id , asso_cause.cau_name,  P2.caud_vals as sexe,P4.caud_vals as naissance, P3.caud_vals as espece, P1.caud_vals as ile, asso_cause.cau_site

            FROM asso_cause

            LEFT JOIN asso_cause_data as P1 on P1.cau_id = asso_cause.cau_id and P1.cautd_id = 1
            LEFT JOIN asso_cause_data as P2 on P2.cau_id = asso_cause.cau_id and P2.cautd_id = 2
            LEFT JOIN asso_cause_data as P3 on P3.cau_id = asso_cause.cau_id and P3.cautd_id = 3
            LEFT JOIN asso_cause_data as P4 on P4.cau_id = asso_cause.cau_id and P4.cautd_id = 4

            LEFT JOIN asso_cause_data as P7 on P7.cau_id = asso_cause.cau_id and P7.cautd_id = 7
            LEFT JOIN asso_cause_data as P8 on P8.cau_id = asso_cause.cau_id and P8.cautd_id = 8
            LEFT JOIN asso_cause_data as P9 on P9.cau_id = asso_cause.cau_id and P9.cautd_id = 9

            WHERE 1=1

            $where

            ORDER BY asso_cause.cau_name

            LIMIT $filter,10
            "
        );

        $count_reqprep = $this->bdd->prepare(

            " SELECT COUNT(asso_cause.cau_id)

            FROM asso_cause

            LEFT JOIN asso_cause_data as P1 on P1.cau_id = asso_cause.cau_id and P1.cautd_id = 1
            LEFT JOIN asso_cause_data as P2 on P2.cau_id = asso_cause.cau_id and P2.cautd_id = 2
            LEFT JOIN asso_cause_data as P3 on P3.cau_id = asso_cause.cau_id and P3.cautd_id = 3
            LEFT JOIN asso_cause_data as P4 on P4.cau_id = asso_cause.cau_id and P4.cautd_id = 4

            LEFT JOIN asso_cause_data as P7 on P7.cau_id = asso_cause.cau_id and P7.cautd_id = 7
            LEFT JOIN asso_cause_data as P8 on P8.cau_id = asso_cause.cau_id and P8.cautd_id = 8
            LEFT JOIN asso_cause_data as P9 on P9.cau_id = asso_cause.cau_id and P9.cautd_id = 9

            WHERE 1=1

            $where

            "
        );

        $reqprep->execute($prepare);
        $count_reqprep->execute($prepare);

        $data = [
            "list_member"   => $reqprep->fetchAll(\PDO::FETCH_NUM),
            "head"          => ["Id","Nom","Sexe","Date de naissance","Espèce","Localisation","Visible sur le site"],
            "count"         => $count_reqprep->fetch(\PDO::FETCH_NUM)
        ];

        return $data;

    }

    public function get_select(){

        $reqprep = $this->bdd->query("SELECT cau_id, cau_name FROM asso_cause ORDER BY cau_name");
        $data = $reqprep->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    function add(){

        if(isset($_POST['ac_name'])){

            $reqprep_asso_cause = $this->bdd->prepare(

                "INSERT INTO asso_cause

                ( cau_name, cau_site, brk_id, caut_id )

                VALUES
                ( :cau_name, :cau_site, :brk_id, :caut_id )

                ");

                $prepare = [

                    ":cau_name"=> htmlspecialchars($_POST["ac_name"]),
                    ":cau_site"=> htmlspecialchars($_POST["ac_site"]),
                    ":brk_id"  => "2",
                    ":caut_id" => "1"
                ];

                $reqprep_asso_cause->execute($prepare);
                $recup_id = $this->bdd->query("SELECT MAX(cau_id) FROM asso_cause");
                $recup_id = $recup_id->fetch();
                $recup_id = $recup_id[0];

                $insert_data  =[];
                $insert_media =[];

                foreach ($_POST as $key => $value) {

                    $key_loop = substr($key,0,4);

                    if ($key_loop == 'actd'){

                        $key_data = substr($key,5,3);

                        $insert_data_loop = ["$key_data" => htmlspecialchars($value)];

                        $insert_data = array_merge($insert_data,$insert_data_loop);

                    }

                    if ($key_loop == 'acm_'){

                        //$key_media = substr($key,4,3);

                        //    ($key_media);

                        //    $insert_media_loop = ["$key_media" => $value];
                        $insert_media_loop = ["$key" => htmlspecialchars($value)];

                        $insert_media = array_merge($insert_media,$insert_media_loop);

                    }
                }




                foreach ($insert_data as $key => $value) {

                    $reqprep_asso_cause_data = $this->bdd->prepare(

                        "INSERT INTO asso_cause_data

                        ( cau_id, cautd_id, caud_vals )

                        VALUES

                        ( :cau_id, :cautd_id, :caud_vals)

                        ");

                        $prepare = [

                            ":cau_id"    => $recup_id,
                            ":cautd_id"  => $key,
                            ":caud_vals" => htmlspecialchars($value)
                        ];

                        $reqprep_asso_cause_data->execute($prepare);
                    }

                    $media_config = new \Manager\Asso_cause_media;
                    $media_config = $media_config->getAll();

                    foreach ($insert_media as $key => $value) {

                        $reqprep_asso_cause_media = $this->bdd->prepare(

                            "INSERT INTO asso_cause_media

                            ( cau_id, caum_code, caum_type, caum_file, caum_lang )

                            VALUES

                            ( :cau_id, :caum_code, :caum_type, :caum_file, :caum_lang)

                            ");

                            $prepare_media = [

                                ":cau_id"    => $recup_id,
                                ":caum_code" => $media_config[$key]["caum_code"],
                                ":caum_type" => $media_config[$key]["caum_type"],
                                ":caum_file" => htmlspecialchars($value),
                                ":caum_lang" => $media_config[$key]["caum_lang"]
                            ];

                            $reqprep_asso_cause_media->execute($prepare_media);
                        }

                        $redirect = "Location: /www/Kalaweit/asso_cause/get?cau_id=".$recup_id;

                        header($redirect);
                    }

                }

                function update(){

                    if(isset($_POST) and $_POST != array()){

                        $reqprep = $this->bdd->prepare(

                            "UPDATE

                            asso_cause

                            SET

                            cau_name = :cau_name,
                            cau_site = :cau_site

                            WHERE cau_id = :cau_id

                            ");

                            $prepare = [
                                ":cau_id"   => htmlspecialchars($_GET["cau_id"]),
                                ":cau_name" => htmlspecialchars($_POST["ac_name"]),
                                ":cau_site" => htmlspecialchars($_POST["ac_site"])
                            ];


                            $reqprep->execute($prepare);


                        }

                        $insert_media = [];

                        foreach ($_POST as $key => $value) {

                            $key_loop = substr($key,0,4);

                            if ($key_loop == 'actd'){

                                $key_data = substr($key,5,3);

                                $prepare_data =[
                                    ":cau_id" => htmlspecialchars($_GET['cau_id']),
                                ];


                                $reqprep_data = $this->bdd->prepare(

                                    "DELETE FROM

                                    asso_cause_data

                                    WHERE

                                    cau_id = :cau_id AND cautd_id = $key_data
                                    "
                                );

                                $reqprep_data->execute($prepare_data);

                                $prepare_data =[
                                    ":cau_id" => htmlspecialchars($_GET['cau_id']),
                                    ":caud_vals" => htmlspecialchars($_POST["actd_".$key_data]),
                                    ":cautd_id" => $key_data
                                ];

                                $reqprep_data = $this->bdd->prepare(

                                    "INSERT INTO

                                    asso_cause_data (cau_id,caud_vals,cautd_id)

                                    VALUES

                                    (:cau_id, :caud_vals, :cautd_id)

                                    "

                                );

                                $reqprep_data->execute($prepare_data);
                            }



                            if ($key_loop == 'acm_'){

                                $key_media = substr($key,4,1);

                                    $reqprep_media = $this->bdd->prepare(

                                    "DELETE FROM

                                    asso_cause_media

                                    WHERE

                                    cau_id = :cau_id

                                    WHERE caum_type != 'PHOTO'

                                    "

                                );

                                $prepare_media = [
                                    ':cau_id' => htmlspecialchars($_GET['cau_id'])
                                ];

                                $reqprep_media->execute($prepare_media);


                                $insert_media_loop = ["$key" => htmlspecialchars($value)];

                                $insert_media = array_merge($insert_media,$insert_media_loop);

                                $media_config = new \Manager\Asso_cause_media;
                                $media_config = $media_config->getAll();

                                foreach ($insert_media as $key => $value) {

                                    $reqprep_asso_cause_media = $this->bdd->prepare(

                                        "INSERT INTO asso_cause_media

                                        ( cau_id, caum_code, caum_type, caum_file, caum_lang )

                                        VALUES

                                        ( :cau_id, :caum_code, :caum_type, :caum_file, :caum_lang)

                                        ");

                                        $prepare_media = [

                                            ":cau_id"    => htmlspecialchars($_GET['cau_id']),
                                            ":caum_code" => $media_config[$key]["caum_code"],
                                            ":caum_type" => $media_config[$key]["caum_type"],
                                            ":caum_file" => htmlspecialchars($value),
                                            ":caum_lang" => $media_config[$key]["caum_lang"]
                                        ];

                                        $reqprep_asso_cause_media->execute($prepare_media);

                                    }

                                }
                            }

                        }

                        function get($filter){

                            if(isset($_POST)){
                                $this->update();
                            }

                            $reqprep = $this->bdd->prepare(

                                "SELECT

                                asso_cause.cau_id,
                                asso_cause.cau_name as ac_name,
                                asso_cause.cau_site as ac_site,

                                P1.caud_vals as actd_1,
                                P2.caud_vals as actd_2,
                                P3.caud_vals as actd_3,
                                P4.caud_vals as actd_4,
                                P7.caud_vals as actd_7,
                                P8.caud_vals as actd_8,
                                P9.caud_vals as actd_9,

                                M1.caum_file as acm_1,
                                M2.caum_file as acm_2,
                                M3.caum_file as acm_3,
                                M4.caum_file as acm_4,
                                M5.caum_file as acm_5

                                FROM asso_cause

                                LEFT JOIN asso_cause_data as P1 on P1.cau_id = asso_cause.cau_id and P1.cautd_id = 1
                                LEFT JOIN asso_cause_data as P2 on P2.cau_id = asso_cause.cau_id and P2.cautd_id = 2
                                LEFT JOIN asso_cause_data as P3 on P3.cau_id = asso_cause.cau_id and P3.cautd_id = 3
                                LEFT JOIN asso_cause_data as P4 on P4.cau_id = asso_cause.cau_id and P4.cautd_id = 4
                                LEFT JOIN asso_cause_data as P7 on P7.cau_id = asso_cause.cau_id and P7.cautd_id = 7
                                LEFT JOIN asso_cause_data as P8 on P8.cau_id = asso_cause.cau_id and P8.cautd_id = 8
                                LEFT JOIN asso_cause_data as P9 on P9.cau_id = asso_cause.cau_id and P9.cautd_id = 9

                                LEFT JOIN asso_cause_media as M1 on M1.cau_id = asso_cause.cau_id AND M1.caum_code = 'PHOTO1'
                                LEFT JOIN asso_cause_media as M2 on M2.cau_id = asso_cause.cau_id AND M2.caum_code = 'PHOTO2'
                                LEFT JOIN asso_cause_media as M3 on M3.cau_id = asso_cause.cau_id AND M3.caum_code = 'DETAIL' AND M3.caum_lang = 'FR'
                                LEFT JOIN asso_cause_media as M4 on M4.cau_id = asso_cause.cau_id AND M4.caum_code = 'DETAIL' AND M4.caum_lang = 'EN'
                                LEFT JOIN asso_cause_media as M5 on M5.cau_id = asso_cause.cau_id AND M5.caum_code = 'DETAIL' AND M5.caum_lang = 'ES'

                                WHERE asso_cause.cau_id = :id
                                ");

                                $prepare = [":id" => $filter];

                                $reqprep->execute($prepare);

                                $asso_cause = $reqprep->fetch(\PDO::FETCH_ASSOC);

                                return $asso_cause;
                            }

                            function get_info_gallery(){

                                $url = explode('/',$_SERVER['REQUEST_URI']);

                                $page = explode('?',$url[3]);


                                $pagination = (($page[0])-1)*15;

                                $having ='';

                                if(isset($_GET["gift_open"]) && $_GET["gift_open"]=='on'){ $having = 'Having tot_don is NULL or tot_don < 280'; } ;

                                $reqprep = $this->bdd->prepare(

                                    "SELECT asso_cause.cau_id,asso_cause.cau_name,asso_cause_media.caum_file,SUM(T3.tot_don) as tot_don, YEAR(T3.don_ts)
                                    FROM asso_cause
                                    Left join asso_cause_media on asso_cause_media.cau_id=asso_cause.cau_id
                                    left join (
                                        select asso_donation.cau_id,asso_donation.don_ts,sum(asso_donation.don_mnt) as tot_don
                                        from asso_donation where YEAR(asso_donation.don_ts) = :filter
                                        group by asso_donation.cau_id,asso_donation.don_ts
                                    ) as T3 on T3.cau_id = asso_cause.cau_id

                                    WHERE asso_cause_media.caum_code = 'PHOTO1' and asso_cause.cau_site = 1 and asso_cause.cau_name LIKE :cau_name

                                    GROUP BY asso_cause.cau_id,asso_cause.cau_name,asso_cause_media.caum_file,YEAR(T3.don_ts)

                                    $having

                                    ORDER BY asso_cause.cau_name

                                    LIMIT $pagination,15

                                    ");

                                    $reqprep2 = $this->bdd->prepare(

                                        "SELECT asso_cause.cau_id,asso_cause.cau_name,asso_cause_media.caum_file,SUM(T3.tot_don) as tot_don, YEAR(T3.don_ts)
                                        FROM asso_cause
                                        Left join asso_cause_media on asso_cause_media.cau_id=asso_cause.cau_id
                                        left join (
                                            select asso_donation.cau_id,asso_donation.don_ts,sum(asso_donation.don_mnt) as tot_don
                                            from asso_donation where YEAR(asso_donation.don_ts) = :filter
                                            group by asso_donation.cau_id,asso_donation.don_ts
                                        ) as T3 on T3.cau_id = asso_cause.cau_id

                                        WHERE asso_cause_media.caum_code = 'PHOTO1' and asso_cause.cau_site = 1 and asso_cause.cau_name LIKE :cau_name

                                        GROUP BY asso_cause.cau_id,asso_cause.cau_name,asso_cause_media.caum_file,YEAR(T3.don_ts)

                                        $having

                                        ORDER BY asso_cause.cau_name

                                        ");

                                        if(isset($_GET["search"])){$search = '%'.$_GET["search"].'%';} else {$search = '%%';}

                                        $prepare = [
                                            ":filter" => date("Y"),
                                            "cau_name" => $search
                                        ];


                                        $reqprep->execute($prepare);
                                        $reqprep2->execute($prepare);

                                        $data = [
                                            "data" => $reqprep->fetchAll(\PDO::FETCH_ASSOC),
                                            "count" => count($reqprep2->fetchAll(\PDO::FETCH_ASSOC))
                                        ];


                                        return $data;

                                    }

                                    function get_donator(){

                                        $reqprep = $this->bdd->prepare(
                                            "SELECT

                                            asso_donation.cau_id,
                                            crm_client.cli_firstname,
                                            crm_client.cli_lastname

                                            FROM asso_donation

                                            LEFT JOIN crm_client on crm_client.cli_id = asso_donation.cli_id

                                            WHERE cau_id = :cau_id

                                            Group by cau_id,asso_donation.cli_id"
                                        );

                                        $prepare = [ ":cau_id" => htmlspecialchars($_GET["cau_id"])];

                                        $reqprep->execute($prepare);

                                        $data = $reqprep->fetchAll(\PDO::FETCH_ASSOC);

                                        return $data;


                                    }

                                    function get_all_id(){
                                        $reqprep = $this->bdd->prepare("SELECT cau_id FROM asso_cause ORDER BY cau_id");
                                        $prepare =[];
                                        $reqprep->execute($prepare);
                                        $data = $reqprep->fetchAll(\PDO::FETCH_NUM);
                                        return $data;
                                    }

                                }
