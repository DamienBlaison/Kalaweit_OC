<?php namespace Controller\Front;
/**
 *
 */
class Gibbon_gallery
{

    function render(){

        $bdd = (new \Manager\Connexion())->getBdd();

        $aside = (new \View\Front\Aside())->render();

        $gallery_gibbon = (new \Manager\Asso_cause($bdd))->get_info_gallery();
        

        $content = [
            "aside" => $aside,
            "gallery" =>$gallery_gibbon
        ];


        return (new \View\Front\Gibbon_gallery())->render($content);
    }
}
 ?>
