<?php
namespace Controller\Front;
/**
 *
 */
class Team
{
    function render(){

        $aside = (new \View\Front\Aside())->render();

        $content = [ "aside" => $aside];

        return (new \View\Front\Team())->render($content);

    }

}

 ?>
