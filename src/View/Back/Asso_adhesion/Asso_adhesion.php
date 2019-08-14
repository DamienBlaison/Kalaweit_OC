<?php
namespace View\Back\Asso_adhesion;

/**
*
*/

class Asso_adhesion {

    function render_update($param){


        require_once(__DIR__.'/../Head.php');//flag

        $asso_adhesion  = '';
        $asso_adhesion .= '<div class="container-fluid" style="padding-left:0px;">';
        $asso_adhesion .= '<form class="content" method="POST">';

        $asso_adhesion .= '<div class=" container-fluid " >'.$param['add_adhesion']['box_adhesion'].'</div>';

        $asso_adhesion .= '</div>';
        $asso_adhesion .= '</div>';
        $asso_adhesion .= '</form>';
        $asso_adhesion .= '</div>';

        echo $asso_adhesion;

    require_once( __DIR__ .'/../Footer.php');

    echo '

    <script src="/Js/Back/Create_user.js"></script>
    <script src="/Js/Back/Search_member_from_box_add.js"></script>

    ';

    }

    function render_add($param){

        require_once(__DIR__.'/../Head.php');//flag

        $asso_adhesion  = '';
        $asso_adhesion .= '<div class="container-fluid" style="padding-left:0px;">';
        $asso_adhesion .= '<form class="content" method="POST">';

        $asso_adhesion .= '<div class=" container-fluid " >'.$param['box_adhesion'].'</div>';
        $asso_adhesion .= '<div class=" container-fluid " >'.$param['last_adhesion'].'</div>';

        $asso_adhesion .= '</div>';
        $asso_adhesion .= '</div>';

        $asso_adhesion .= '</form>';

        $asso_adhesion .= '</div>';

        echo $asso_adhesion;

    require_once( __DIR__ .'/../Footer.php');

    echo '

    <script src="/Js/Back/Create_user.js"></script>
    <script src="/Js/Back/Search_member_from_box_add.js"></script>

    ';


    }
}
