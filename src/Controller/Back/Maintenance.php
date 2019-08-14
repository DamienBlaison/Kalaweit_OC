<?php namespace Controller\Back;

/**
*
*/
class Maintenance
{
    function update(){

        $bdd = (new \Manager\Connexion())->getBdd();


        if(isset($_POST["delete_receipt"]) && $_POST['name_receipt'] != ''){

            $file = $_POST['name_receipt'];
            $folder = explode('_',$file);

            if (file_exists( __DIR__ .'/../../../Ged/Receipt/R_'.$folder[1].'/'.$file)){

                echo '<script> alert("Le fichier a bien été supprimé");</script>';

                (new \Manager\Receipt($bdd))->delete($file);

            } else {

                echo '<script> alert("Le fichier n\'existe pas");</script>';
            }

        };

        $delete_receipt = (new \Controller\Back\htmlElement\Form_group_input_submit(
            'name_receipt',
            'nom du reçu',
            '',
            '',
            'delete_receipt',
            'btn btn-danger w100',
            'Supprimer le reçu'

        ));

        $result_request = '';

        if(isset($_POST["request"]) && $_POST['request'] != ''){

            $request = $_POST["request"];

            $bdd = (new \Manager\Connexion())->getBdd();

            $data = (new \Manager\Request($bdd))->render($_POST["request"]);

            if ($data["error"][2] == NULL){

                $head = [];
                $content = [];

                $result_request = '</br><div class=col-md-12><textarea type="text" class="form-control" style="margin-bottom:20px;" disabled >Nombre de réponse répondant à la requête: '.$data["count"].' enregistrement(s).</textarea></div></br></br>';

                if($data["count"]>0){

                    $result_request .=  (new \Controller\Back\htmlElement\Table_requester($data["data"]))->render();
                }


            } else {

                $result_request = '</br><div class=col-md-12><textarea type="text" class="form-control" style="margin-bottom:20px;" disabled >'.$data["error"][2].'</textarea></div></br></br>';
            }

        }

        else

        {
            $request = '';
        }

        $request = (new \Controller\Back\htmlElement\Form_group_textarea_submit(
            'request',
            'Saisir la requete SQL',
            $request,
            '',
            'request_submmit',
            'btn btn-danger w100',
            'Lancer la requete'

        ));

        $box_maintenance_content = [
            "delete_receipt" => $delete_receipt->render(),
        ];

        $box_request_content = [
            "request" => $request->render(),
            "result_request" => $result_request,
        ];

        $box_maintenance = (new \Controller\Back\htmlElement\Box('Opérations de maintenance','box-primary',$box_maintenance_content,12));
        $box_request =     (new \Controller\Back\htmlElement\Box('Requeteur','box-primary',$box_request_content,12));

        $param = [

            "box_maintenance" => $box_maintenance,
            "box_request" => $box_request

        ];


        return (new \View\Back\Maintenance\Maintenance())->render($param);

    }

    function upload_config(){
        
    }

}
?>
