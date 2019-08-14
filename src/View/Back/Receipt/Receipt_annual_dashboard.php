<?php namespace View\Back\Receipt;

class Receipt_annual_dashboard
{
    function render($content){

        require_once(__DIR__.'/../Head.php');//flag

        ?>

        <section class="content">
            <form name="member" action="" method="post">
                <div class="container-fluid" style="padding-left:0px;">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Génération des recus fiscaux</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <button id="receipt_generator" type="button" name="button" class="btn btn-primary col-md-2">Lancer le traitement</button>
                            <div id="progress_receipt_annual" class="col-md-10">
                                <?php echo $content["Receipt_generation_progress"] ?>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    </div>
            </form>
        </section>

        <?php

        require_once( __DIR__ .'/../Footer.php');

        ?>

        <script src="/Js/Back/Receipt_annual_dashboard.js"></script>

        <?php
    }

}
