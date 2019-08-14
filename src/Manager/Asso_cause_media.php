<?php  namespace Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Asso_cause_media
{

    /**
     * Retourne toutes les config media
     *
     * @return array(\Model\media_config)
     */
    public function getAll()
    {
        $ret    = [];
        $config = \Core\Config::getInstance();
        $config_media   = $config->get('media');

        return $config_media;
    }

    public function get_picture_1($bdd){

        $url = explode('/',$_SERVER['REQUEST_URI']);

        if($url[4] !== "add"){

            $reqprep = $bdd->prepare("SELECT * FROM asso_cause_media WHERE cau_id= :cau_id && caum_code = 'PHOTO1' ");

            $prepare = [":cau_id" => htmlspecialchars($_GET["cau_id"])];
            $reqprep->execute($prepare);

            return $data = $reqprep->fetch(\PDO::FETCH_ASSOC);

        }





    }

    public function get_picture_2($bdd){

        $url = explode('/',$_SERVER['REQUEST_URI']);

        if($url[4] !== "add"){

        $reqprep = $bdd->prepare("SELECT * FROM asso_cause_media WHERE cau_id= :cau_id && caum_code = 'PHOTO2' ");
        $prepare = [":cau_id" => htmlspecialchars($_GET["cau_id"])];
        $reqprep->execute($prepare);
        return $data = $reqprep->fetch(\PDO::FETCH_ASSOC);

        }
    }
}
