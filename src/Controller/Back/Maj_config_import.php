<?php  namespace Controller\Back;

class Maj_config_import
{

    function maj_config_import_hello_asso(){


        $cli_id_hello_asso = htmlspecialchars($_GET["cli_id_hello_asso"]);
        $dont_ts = htmlspecialchars($_GET["don_ts"]);
        $don_mnt = htmlspecialchars($_GET["don_mnt"]);
        $cau_id = htmlspecialchars($_GET["cau_id"]);

    // voir comment modifier le contenu d'un fichier de config , ouvrir ecrire et enregistrer le fichier;

        $file = fopen(__DIR__ ."/../../../config/config_import_hello_asso.php" , "w");

        $row0 = '<?php ';

        $row1 = '$config_import_hello_asso = [

            "cli_id_hello_asso" => "'.$cli_id_hello_asso.'",
            "don_ts" => "'.$dont_ts.'",
            "don_mnt" => "'.$don_mnt.'",
            "cau_id" => "'.$cau_id.'"

        ];';

        $row2 = 'return $config_import_hello_asso;';

        fwrite($file,$row0);
        fwrite($file,  "\r\n ");
        fwrite($file,  "\r\n ");
        fwrite($file,$row1);
        fwrite($file,  "\r\n ");
        fwrite($file,  "\r\n ");
        fwrite($file,$row2);
        fwrite($file,  "\r\n ");

        fclose($file);

    }
}
