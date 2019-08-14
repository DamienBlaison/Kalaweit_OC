<?php namespace View\Back\Users;


class Crop_avatar
{

    function render(){

        require_once(__DIR__.'/../Head.php');//flag

        ?>

        <div class="content">
            <div class="container-fluid" style="padding-left:0px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Mise à jour de l'Avatar</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div id="image_demo" class=""></div>
                                </div>
                                <div class="">
                                    <label for="upload_image" class="btn btn-default ">Choisir un fichier</label>
                                    <input id="upload_image" type="file" name="upload_image"style="display:none;">
                                    <button  id="updload_cropped_image"class="btn btn-primary pull-right "> Enregistrer l'avatar </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    require_once( __DIR__ .'/../Footer.php');
                    ?>
                    
                    <script src="/vendor/Croppie-2.6-2.4/croppie.js"></script>
                    <script src="/Js/Back/Crop_avatar.js"></script>

                <?php         }
            }
