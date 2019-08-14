<?php
namespace Controller\Front;
/**
 *
 */
class Gift_forest{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Gift_forest())->render($content);

    }

}

 ?>
