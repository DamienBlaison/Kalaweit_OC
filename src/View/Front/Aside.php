<?php namespace View\Front;
/**
*
*/
class Aside

{

    function render(){


        $return ='


                <div>
                    <a href="/www/Friends" class="image"><img src="/Img/Front/1-20150114191938.jpg" alt=""></a>
                    <h4 class="lien_aside">Devenir ami</h4>
                </div>
                <div>
                    <a href="/www/Gift" class="image"><img src="/Img/Front/3-20180203113327.png" alt=""></a>
                    <h4 class="lien_aside">Faire un don</h4>
                </div>
                <div>
                    <a href="/www/Gibbon_gallery/1" class="image"><img src="/Img/Front/2-20180203113327.png" alt=""></a>
                    <h4 class="lien_aside">Parrainer un gibbon</h4>
                </div>
                <div>
                    <a href="/www/Gift_forest" class="image"><img src="/Img/Front/c-20190228060208.png" alt=""></a>
                    <h4 class="lien_aside">Faire un don pour la foret</h4>
                </div>
                <div>
                    <a href="/www/Gift_dulan" class="image"><img src="/Img/Front/c-20190228060208.png" alt=""></a>
                    <h4 class="lien_aside">Faire un don pour Dulan</h4>
                </div>

                <div class="media_link">

                <div class="d-flex justify-content-around">
                    <a href="https://www.kalaweit.org/boutique/index.php" target="_blank"><i class="fas fa-cart-arrow-down" style="color:#27636B;"></i></a>
                    <a href="https://www.youtube.com/channel/UC6pGpHOJZqtIQ-0uCCT_G_Q" target="_blank"><i class="fab fa-youtube" style="color:red;"></i></a>
                    <a href="https://www.facebook.com/KalaweitFrance/" target="_blank"><i class="fab fa-facebook-square" style="color:#3b5998;"></i></a>
                </div>
                    <p> </p>
                    <h4 class="lien_aside">Liens réseaux/boutique</h4>
                </div>
                </div>';




        return $return;

    }

}

?>
