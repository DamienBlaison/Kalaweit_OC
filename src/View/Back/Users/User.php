<?php namespace View\Back\Users;


class User
{

    function render($param){

        require_once(__DIR__.'/../Head.php');//flag
        ?>

        <div class="content">
            <div class="container-fluid" style="padding-left:0px;">
                <div class="row">
                    <div class="col-md-9">
                        <form class="" action="" method="post">
                            <?php echo $param["box_identification"] ?>
                        </form>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Envoyer un nouveau Message</h3>
                            </div>
                            <form class="" action="" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Subject:" name="subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="mytextarea" name="mail_body"></textarea>
                                    </div>
                                    <div class="pull-left">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> Attachment
                                            <input type="file" name="attachment">
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-primary" name="send_message" value="Envoyer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $param["box_init_avatar"]?>
                                </div>
                                <form class="col-md-12" action="" method="post">
                                    <?php echo $param["box_activation"] ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php

        require_once( __DIR__ .'/../Footer.php');
        
    }
}
