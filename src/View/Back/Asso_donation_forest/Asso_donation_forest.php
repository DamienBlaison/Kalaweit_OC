<?php
namespace View\Back\Asso_donation_forest;

/**
*
*/

class Asso_donation_forest {


    function render_update($param){

        require_once(__DIR__.'/../Head.php');//flag

        $asso_donation_forest  = '';
        $asso_donation_forest .= '<div class="container-fluid" style="padding-left:0px;">';
        $asso_donation_forest .= '<form class="content" method="POST">';

        $asso_donation_forest .= '<div class=" container-fluid " >'.$param['add_donation_forest']['box_donation_forest'].'</div>';

        $asso_donation_forest .= '</div>';
        $asso_donation_forest .= '</div>';
        $asso_donation_forest .= '</form>';
        $asso_donation_forest .= '</div>';

        echo $asso_donation_forest;

    require_once( __DIR__ .'/../Footer.php');

    echo '

    <script src="/Js/Back/Create_user.js"></script>
    <script src="/Js/Back/Search_member_from_box_add.js"></script>

    ';


    }

    function render_add($param){

        require_once(__DIR__.'/../Head.php');//flag

        $asso_donation_forest  = '';
        $asso_donation_forest .= '<div class="container-fluid" style="padding-left:0px;">';
        $asso_donation_forest .= '<form class="content" method="POST">';

        $asso_donation_forest .= '<div class=" container-fluid " >'.$param['box_donation_forest'].'</div>';
        $asso_donation_forest .= '<div class=" container-fluid " >'.$param['last_donation_forest'].'</div>';

        $asso_donation_forest .= '</div>';
        $asso_donation_forest .= '</div>';

        $asso_donation_forest .= '</form>';

        $asso_donation_forest .= '</div>';

        echo $asso_donation_forest;

    require_once( __DIR__ .'/../Footer.php');

    echo '

    <script src="/Js/Back/Create_user.js"></script>
    <script src="/Js/Back/Search_member_from_box_add.js"></script>

    ';


    }
}
