<?php

/** classe permettant de gérer le contenu de la fiche cause **/

namespace Controller\Back\Component\Asso_cause;

class Asso_cause_media
{
    function render()
    {

        $bddM = new \Manager\Connexion();
        $bddM = $bddM->getBdd();

        $url = explode('/',$_SERVER['REQUEST_URI']);

        /**
        *      box photos
        */

        $picture1 = (new \Manager\Asso_cause_media())->get_picture_1($bddM);
        $picture2 = (new \Manager\Asso_cause_media())->get_picture_2($bddM);

        /*  gestion du cas de con sultation et d'ajout au niveau des medias
            l id n'etant pas encore defini au moment de l'ajout on desactive cette partie et on met une photo générique
        */

        if ($url[4]!=='add'){

            $pictures1 = new \Controller\Back\htmlElement\Img('/Img/Asso_cause/'.$picture1["caum_file"],$picture1["caum_file"],"img_cau",$p_style ="");
            $pictures2 = new \Controller\Back\htmlElement\Img('/Img/Asso_cause/'.$picture2["caum_file"],$picture2["caum_file"],"img_cau",$p_style ="");
        ;

        } else {

            $pictures1 = new \Controller\Back\htmlElement\Img('/Img/Asso_cause/unknown.png','unknown.png',"img_cau",$p_style ="");
            $pictures2 = new \Controller\Back\htmlElement\Img('/Img/Asso_cause/unknown.png','unknown.png',"img_cau",$p_style ="");

        }

        if ($url[4]!=='add'){
            $content_box_pictures = [
                ($pictures1->render()).'<a href="/www/Kalaweit/asso_cause/crop?cau_id='.$_GET["cau_id"].'&picture=1" class="btn btn-primary col-md-12 w100">Modifier photo 1</a>',
                ($pictures2->render()).'<a href="/www/Kalaweit/asso_cause/crop?cau_id='.$_GET["cau_id"].'&picture=2" class="btn btn-primary col-md-12 w100">Modifier photo 2</a>'
                ];

            $bootstrap_pictures = [6,6];

            $box_pictures = new \Controller\Back\htmlElement\Box('Photos','box-primary',$content_box_pictures,$bootstrap_pictures);

        } else {
            $content_box_pictures = [
                $pictures1->render(),
                '<a href="" class="btn btn-primary col-md-12 disabled">Modifier photo 1</a>',
                $pictures2->render(),
                '<a href="" class="btn btn-primary col-md-12 disabled">Modifier photo 2</a>',
            ];

            $bootstrap_pictures = [6,6,6,6];

            $box_pictures = new \Controller\Back\htmlElement\Box('Photos','box-primary',$content_box_pictures,$bootstrap_pictures);

        }

        /***************************************************************************************************************************/

        /**     Synthese des elements à passer a la vue   **/

        /***************************************************************************************************************************/


        $param = [

            "pictures"      => $box_pictures,

        ];

        return (new \View\Back\Asso_cause\Asso_cause_media)->render($param);
    }

}
