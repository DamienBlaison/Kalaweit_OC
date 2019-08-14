<?php
/* classe  permmettant la création de fichier excel */
namespace Controller\Back;

/* import des traits du package */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


class Import_Excel
{

    /* methode permettant de renvoyer un tableau excel */

    function import_excel()

    {
        include(__DIR__ ."/../../../config/config_import_hello_asso.php");

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        $view_file = '';
        $file_name = '';
        $member_ko = "";
        $member_ok = "";

        if(isset($_FILES['file_import']['tmp_name'])){

            $file_name = $_FILES["file_import"]["name"];

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            $spreadsheet = $reader->load($_FILES['file_import']['tmp_name']);

            $dataArray = $spreadsheet->getActiveSheet()
            ->toArray(
                NULL,        // Value that should be returned for empty cells
                TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                TRUE         // Should the array be indexed by cell row and cell column
            );

            $_SESSION["data_array_import"] = $dataArray;
            //echo '<pre>';
            //var_dump($dataArray);
            //echo '</pre>';

            $data_array_false = [];
            $data_array_true = [];

            $data_array_head = array_shift($dataArray);

            foreach ($dataArray as $key => $value) {

                $check =  (new \Manager\Member($bddM))->get_id_member_import_hello_asso($value[$config_import_hello_asso["cli_id_hello_asso"]]);

                if($check == false){

                    $data_array_false []= $value;

                } else {

                    $data_array_true []= $value;
                }
            }

            if(isset($data_array_false[0])){

                $member_ko = (new \Controller\Back\htmlElement\Table_import([$data_array_head,$data_array_false],"Aucun rattachement trouvé","box-danger",[12],"ko"))->render();

            };

            if(isset($data_array_true[0])){

                $member_ok = (new \Controller\Back\htmlElement\Table_import([$data_array_head,$data_array_true],"Rattachements trouvés , dons prets à être injecter","box-success",[12],"ok"))->render();

            } ;

        };

        if(isset($data_array_false) && empty($data_array_false)){
            $import_donation_btn  = (new \Controller\Back\htmlElement\Form_group_btn('button','btn btn-success col-md-2 pull-right','import_run','Insérer les données'))->render();
            $info_message ='';
        } else {
            $info_message = (new \Controller\Back\htmlElement\Box_info("Information:","Après avoir télécharger un fichier Hello Asso, <br> Vous devez rattacher toutes les lignes de dons à un membre présent dans l'application pour pouvoir injecter le fichier.<br> Si le membre n'existe pas il faudra le créer.",'fa fa-warning'))->render();
            $import_donation_btn ='';}


            include(__DIR__ ."/../../../config/config_import_hello_asso.php");

            $p_box_content = [];

            $donation_type = (new \Manager\Donation_type())->getAll();

            $cli = (new \Manager\Member($bddM))->get_select();

            $list_column = ["A","B","C","D","E","F","G","H","I","J"];

            if (isset($_FILES["file_import"]["name"])){ $name_file = $_FILES["file_import"]["name"];} else { $name_file='';};

            $p_box_content = [

                (new \Controller\Back\htmlElement\Form_group_input_file('file_import','btn btn-default','1000'))->render(),

                (new \Controller\Back\htmlElement\Form_group_input_disabled("name_file","Nom du fichier importé",$name_file,"fa fa-file","col-12"))->render(),

                (new \Controller\Back\htmlElement\Form_group_submit_disabled("Importer","btn btn-primary","Importer"))->render(),
                (new \Controller\Back\htmlElement\Form_group_btn('button','btn btn-default col-md-12','config','Configuration'))->render(),
                '</br>',

                (new \Controller\Back\htmlElement\Form_group_select_label("cli_id_hello_asso","Membre",$list_column,$config_import_hello_asso["cli_id_hello_asso"],'','config_member_id'))->render(),
                (new \Controller\Back\htmlElement\Form_group_select_label("config_don_mnt","Montant",$list_column,$config_import_hello_asso["don_mnt"],'','config_don_mnt'))->render(),
                (new \Controller\Back\htmlElement\Form_group_select_label("config_don_ts","Date",$list_column,$config_import_hello_asso["don_ts"],'','config_don_ts'))->render(),
                (new \Controller\Back\htmlElement\Form_group_select_label("config_cau_id","Cause",$list_column,$config_import_hello_asso["cau_id"],'','config_cau_id'))->render(),
                (new \Controller\Back\htmlElement\Form_group_btn('button','btn btn-success col-md-12','config_save','Enregistrer'))->render(),
                $info_message,
                $member_ko,
                $member_ok,
                $import_donation_btn

            ];

            $box_view_import = (new \Controller\Back\htmlElement\Box('Importation de données Excel',"box-primary",$p_box_content,[2,6,2,2,12,'2 config','2 config','2 config','2 config','2 config pull-right',12,12,'12 mb40','12 mb40',12]))->render();

            $param = [

                "box_view_import" => $box_view_import,

            ];

            if(isset($data_array_true)){

                $json = json_encode($data_array_true);
                echo '<script> var arrayInsert = '.$json.'</script>';
            };

            return (new \View\Back\Import\Import())->render($param);

        }

        function import_excel_ajax(){

            $bddM = new \Manager\Connexion();
            $bddM = $bddM->getBdd();

            $dataArray = $_SESSION["data_array_import"];

            $data_array_false = [];
            $data_array_true = [];

            $data_array_head = array_shift($dataArray);

            foreach ($dataArray as $key => $value) {

                $check =  (new \Manager\Member($bddM))->get_id_member_import_hello_asso($value["A"]);

                if($check == false){

                    $data_array_false []= $value;

                } else {

                    $data_array_true []= $value;
                }
            }

            if(isset($data_array_false[0])){
                $ko = (new \Controller\Back\htmlElement\Table_import_ajax([$data_array_head,$data_array_false],"ko"))->render();
            } else { $ko = "";}
            if(isset($data_array_true[0])){
                $ok = (new \Controller\Back\htmlElement\Table_import_ajax([$data_array_head,$data_array_true],"ok"))->render();
            } else { $ok ="";}

            return $data = json_encode(["ko"=>$ko,"ok"=>$ok]);

        }

        function integration_bdd(){

            $bddM = new \Manager\Connexion();
            $bddM = $bddM->getBdd();

            include(__DIR__ .'/../../../config/config_import_hello_asso.php');

            $content = file_get_contents("php://input", 'r+');

            $data = json_decode($content,true);


            foreach ($data["data"] as $key => $value) {

                $check =  (new \Manager\Member($bddM))->get_id_member_import_hello_asso(htmlspecialchars($value[$config_import_hello_asso["cli_id_hello_asso"]]));

                $prepare = [

                    ":brk_id" => 2,
                    ":cli_id" => $check[0],
                    ":cau_id" => htmlspecialchars($value[$config_import_hello_asso["cau_id"]]),
                    ":don_mnt"=> htmlspecialchars($value[$config_import_hello_asso["don_mnt"]]),
                    ":ptyp_id"=> '2',
                    ":don_ts" => htmlspecialchars($value[$config_import_hello_asso["don_ts"]]),
                    ":don_status" => "OK"
                ];

                switch ($prepare[":cau_id"]) {
                    case '704':
                    (new \Manager\Asso_donation_asso($bddM))->add_import_hello_asso($prepare);
                    break;

                    case '700':
                    (new \Manager\Asso_donation_dulan($bddM))->add_import_hello_asso($prepare);
                    break;

                    case '703':
                    (new \Manager\Asso_donation_forest($bddM))->add_import_hello_asso($prepare);
                    break;

                    default:
                    (new \Manager\Asso_donation($bddM))->add_import_hello_asso($prepare);
                    break;
                }

            }

        }

    }
