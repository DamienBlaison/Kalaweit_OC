<?php namespace View\Back\Receipt;


class Receipt_annual
{

    function __construct($p_content)
    {
        $this->content = $p_content;
    }

    function render($open)
    {
        //echo '<pre>';
        //var_dump($this->content);
        //echo '</pre>';

        ob_start();
        ?>
        <page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">

            <style media="screen">
            * { font-size: 10px;}
            a {color:gold;font-weight: bold;}
            td {border-style:solid;border-width: :1px;}

            </style>
            <page_header>

            </page_header>
            <table style="width:100%;">
                <tr>
                    <td style="height: 40mm;width:100%;text-align: center;"> <img src="<?php  echo __DIR__?>/logo_kalaweit.jpeg" style="height:20mm;width:50mm;"></td>
                </tr>
            </table >

            <table style="width:100%;">
                <tr>
                    <td style="width:66%;">
                    </td>
                    <td style="width:34%;">
                        <b><?php echo $this->content["cli_info"]["cli_firstname"].' '.$this->content["cli_info"]["cli_lastname"]?></b><br>
                        <?php echo $this->content["cli_info"]["cli_address1"]?><br><?php echo $this->content["cli_info"]["cli_address2"]?><br>
                        <?php echo $this->content["cli_info"]["cli_cp"]?> <?php echo $this->content["cli_info"]["cli_town"]?><br>
                        <?php echo $this->content["country"]["cnty_name"]?><br><br><br><br>
                        Paris, le <?php echo $this->content["date"]?><br><br>
                        <b>N° <?php echo $this->content["receipt_number"]?></b>
                    </td>
                </tr>
            </table>
            <table style="width:100%;">
                <tr>
                    <td style="width:100%; height:30mm;text-align:center; vertical-align:middle;">
                        <b>Reçu fiscal des dons aux oeuvres au titre de l'année <?php echo date("Y") - 1 ?></b><br>
                        Articles 200-5 et 238 bis du code Génaral des Impôts
                    </td>
                </tr>
            </table>
            <table style="width:100%;padding-left:10mm;padding-right:10mm;">

                <tr style="">

                    <td style="width:100%; margin-left:10mm;">

                        Nous confirmons avoir reçu la somme de <?php echo $this->content["resume"][0]["sum(don_mnt)"]?>€ ,
                        qui correspond au montant total des dons que vous avez effectués en notre faveur en <?php echo date("Y") - 1 ?>,
                        et nous vous en remercions.

                        <br><br>

                        Ce reçu, établi sous modèle conforme et attestant de ces dons,
                        vous permettra de bénéficier d'une réduction d'impôts dans la limite des conditions prévues par la loi.

                        <br><br>
                    </td>

                </tr>
            </table>
            <table style="width:100%;padding-left:10mm;padding-right:10mm;">


                <tr style="width:100%;">
                    <td style="width:33%;vertical-align:top;"><b>Bénéficiaire des versements :</b></td>
                    <td style="width:67%;">Association Kalaweit - 69 rue Mouffetard - 75005 Paris
                        Organisme d'intérêt général concourant à la défense de l'environnement</td>
                    </tr>

                </table>

                <br><br>

                <table style="width:100%;padding-left:10mm;padding-right:10mm;">

                    <tr style="width:100%;">
                        <td style="width:33%;vertical-align:top;"><b>Objet :</b></td>
                        <td style="width:67%;">Programme de sauvegarde des gibbons et de leur habitat en Indonésie. Sensibilisation à la disparition des grands singes et de leur habitat.</td>
                    </tr>

                </table>

                <br><br>

                <table style="width:100%;padding-left:10mm;padding-right:10mm;">
                    <tr style="width:100%;">
                        <td style="width:33%;vertical-align:top;"><b>Détail des dons :</b></td>
                        <td style="width:67%;">
                                <?php foreach ($this->content["receipt_details"] as $key => $value) { ?>
                                le <?php echo date('d-m-Y', strtotime($value["don_ts"])) ?> : <?php echo $value["don_mnt"]?> €<br>
                                <?php } ?>
                        </td>
                    </tr>
                </table>

                <br><br>

                <table style="width:100%;padding-left:10mm;padding-right:10mm;">
                    <tr style="width:100%;">
                        <td style="width:100%;vertical-align:top;">Le bénéficiaire reconnait avoir reçu en <?php echo date("Y") - 1 ?>, au titre des versements ouvrant droits à la réduction d'impôts la somme de <?php echo $this->content["resume"][0]["sum(don_mnt)"]?> € .</td>

                    </tr>
                </table>

                <br><br>

                <table style="width:100%;padding-left:10mm;padding-right:10mm;">
                    <tr style="width:100%;">
                        <td style="width:95mm;"></td>
                        <td>Constance Cluset<br>Responsable bureau Kalaweit France</td>
                    </tr>

                    <tr>
                        <td style="width:95mm;"></td>
                        <td style="padding-top:10mm;">image scan signature</td>
                    </tr>


                </table>
            </page>
            <page_footer>
                <table style="width:172mm; margin-left:12mm;">
                    <tr>
                        <td style="width:50%;">Kalaweit : 69 rue Mouffetard - 75005 Paris <br>Email : <a mailto:"kalaweit.france@yahoo.fr">kalaweit.france@yahoo.fr</a> / Tél : 07 86 01 18 87 </td>
                        <td style="width:50%;text-align:right">Association loi 1901<br>Siret 449 804 053 000 30 - RCS Paris</td>
                    </tr>

                </table>
                <table style="width:172mm; margin-left:12mm;">
                    <tr >
                        <td style="width:100%;text-align:center;">Site internet : <a href="www.kalaweit.org">www.kalaweit.org</a></td>
                    </tr>
                </table>
            </page_footer>




            <?php
            $content = ob_get_clean();

            $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4','fr',true,'UTF-8');

            $html2pdf->writeHTML($content);

            $html2pdf->output( __DIR__ . '/../../../../Ged/Receipt/R_fisc/'.$this->content["receipt_number"].'.pdf', 'F');

            echo "\n";
            echo '_______________________________________________________________________________________________';
            echo "\n";

            echo "\e[32mRecu ".$this->content['receipt_number'].".pdf créé avec succès";


            $url = explode("/",$_SERVER['REQUEST_URI']);

            if ($open !== "close" ){

                $html2pdf->output( __DIR__ . '/../../../../Ged/Receipt/R_fisc/'.$this->content["receipt_number"].'.pdf', 'D');

            };



        }

    }
