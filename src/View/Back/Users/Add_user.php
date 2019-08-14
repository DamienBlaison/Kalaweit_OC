<?php namespace View\Back\Users;


class Add_user
{

    function render($param){

        require_once(__DIR__.'/../Head.php');//flag

        ?>

        <div class="content">
            <div class="container-fluid" style="padding-left:0px;">
                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="" method="post">
                            <?php echo $param["box_identification"] ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php

        require_once( __DIR__ .'/../Footer.php');
    }
}
