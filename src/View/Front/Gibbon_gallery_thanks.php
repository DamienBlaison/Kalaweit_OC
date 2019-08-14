<?php namespace View\Front;
/**
*
*/
class Gibbon_gallery_thanks
{

    function render($content){

        include('Head.php');

        if(isset($_GET["gift_open"]) && $_GET["gift_open"] == 'on'){$checked = "checked=checked";} else { $checked = '';};
        $url  = explode('/',$_SERVER["REQUEST_URI"]);
        $current = explode('?',$url[3]);

        if (isset($current[1])){ $search = $current[1]; } else { $search =''; };

        $current_page = $current[0];
        $previous = $current_page-1 .'?'.$search.'#anchor';
        $next = $current_page+1 .'?'.$search.'#anchor';

        ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 animated slideInLeft">
                        <div id="wrapper-gallery">
                            <div class="">
                                <h2>Nous vous remercions pour votre don</h2>
                                <br><br>
                                <h3 id="anchor">Parrainer un autre gibbon ?</h3>
                            </div>
                            <br><br>
                            <form class="form-check" action="/www/Gibbon_gallery/1#anchor" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Tapez votre recherche ici" name="search">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" aria-label="Checkbox for following text input" name="gift_open" <?php echo $checked ?> >
                                                </div>
                                            </div>
                                            <div type="text" class="form-control" aria-label="Text input with checkbox">Uniquement les dons ouverts</div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group ">
                                            <button class="btn btn-outline-secondary col-md-12" type="submit" id="button-addon2">Rechercher</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="tz-gallery">
                            <div class="row">
                                <?php foreach ($content["gallery"]["data"] as $key => $value): ?>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="gallery_item">
                                            <a href="/www/Gibbon?cau_id=<?php echo $value["cau_id"] ?>">
                                                <img src="/Img/Asso_cause/<?php echo $value["caum_file"] ?>" style="height:250px;" class="gallery_img" alt="<?php echo $value["cau_name"] ?>">
                                            </a>
                                            <div class="caption">
                                                <h3><?php echo $value["cau_name"] ?></h3>
                                                <p>Dons collectés : <?php if($value["tot_don"] == NULL){ echo '0';} else { echo $value["tot_don"] ;}?> € / 280 €</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12 nav_gibbons">
                            <nav class="d-flex justify-content-between">
                                <ul class="pagination">
                                    <li class="page-item " id="previous"><a class="page-link" href="/www/Gibbon_gallery/<?php echo $previous ?>">Previous</a></li>
                                    <li class="page-item" id="next"><a class="page-link" href="/www/Gibbon_gallery/<?php echo $next?>">Next</a></li>
                                </ul>
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link">Page </a></li>
                                    <li class="page-item"><a class="page-link"><?php echo $current_page ?></a></li>
                                    <li class="page-item"><a class="page-link">/</a></li>
                                    <li class="page-item"><a class="page-link" id="nb_page"><?php echo ceil(intval($content["gallery"]["count"])/15)?></a></li>
                                </ul>
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link">Nombre de resultat(s) :  </a></li>
                                    <li class="page-item"><a class="page-link" id= "" ><?php echo $content["gallery"]["count"]?></a></li>
                                </ul>
                            </nav>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                    echo $content["aside"];
                    ?>
                </div>
            </div>
        </div>
        <?php

        include("Footer.php");
        echo '<script src="/Js/Front/Gibbon_gallery.js"></script>';

    }

}

?>
