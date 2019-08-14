<?php namespace View\Back\Import;

class Import
{

    function render($data){


        require_once(__DIR__.'/../Head.php');

        ?>

        <div class="content">
            <div class="container-fluid">

                <form class="" action="" method="post" enctype="multipart/form-data">

                <?php echo $data["box_view_import"]?>

                </form>



            </div>
        </div>

        <script src="/Js/Back/Import_hello_asso.js"></script>

        <?php

        require_once(__DIR__.'/../Footer.php');

    }
}
