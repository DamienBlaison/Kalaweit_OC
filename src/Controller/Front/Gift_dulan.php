<?php
namespace Controller\Front;
/**
 *
 */
class Gift_dulan{

    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Gift_dulan())->render($content);

    }

}

 ?>
