<?php namespace View\Front;

/**
*
*/
class Make_gift

{

    function render($content){

        include('Head.php');

        if(isset($_SESSION["cli_id"])){
        	$connected = $_SESSION["cli_id"];
        }else{
        	$connected = 'not connected';
        }

        ?>
        <div id="connected" hidden ><?php echo $connected ?></div>

        <div class="wrapper mt50">

            <div class="container-fluid">

                <div class="row">
                            <div  class="col-md-12">
                                <?php
                                echo $content["aside"];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php

            include("Footer.php");
        }

    }
    ?>
