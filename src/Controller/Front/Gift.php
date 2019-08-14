<?php
namespace Controller\Front;
/**
 *
 */
class Gift{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Gift())->render($content);

    }

}

 ?>
