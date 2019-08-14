<?php
namespace Controller\Front;
/**
 *
 */
class Friends{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Friends())->render($content);

    }

}

 ?>
