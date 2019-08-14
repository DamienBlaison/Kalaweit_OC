<?php
namespace View\Back\Table;

/**
 *
 */
class Table_filter
{

    function render($p_render)
    {
        require_once(__DIR__.'/../Head.php');//flag

        $render  = '';
        $render .= '<div class="container-fluid" style="padding-left:0px;">';
        $render .= '<section class="content">';
        $render .= '<div class="box">';
        $render .= '</br>';

        $render .= (new \Controller\Back\htmlElement\Table_filter)->render($p_render["fields"],$p_render["data"],$p_render["id"]);

        $render .= '</div>';
        $render .= '</div>';
        $render .= '</section>';
        $render .= '</div>';

        echo $render ;

        echo '<script src="/Js/Back/Table_filter.js"></script>';

        require_once( __DIR__ .'/../Footer.php');

    }
}
