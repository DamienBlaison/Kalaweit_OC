<?php namespace View\Back\Receipt;


class Receipt_asso
{

    function __construct($p_content)
    {
        $this->content = $p_content;
    }

    function render($open)
    {


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
                        <b><?php echo $this->content["firstname"].' '.$this->content["lastname"]?></b><br>
                        <?php echo $this->content["adress"]?><br>
                        <?php echo $this->content["zip"]?> <?php $this->content["town"]?><br>
                        <?php echo $this->content["country"]?><br><br><br><br>
                        Paris, le <?php echo $this->content["date"]?><br><br>
                        <b>N° <?php echo $this->content["receipt_number"]?></b>
                    </td>
                </tr>
            </table>
            <table style="width:100%;">
                <tr>
                    <td style="width:100%; height:30mm;text-align:center; vertical-align:middle;">
                        <b>Reçu des dons aux oeuvres année <?php echo $this->content["year"]?></b><br>
                        Articles 200-5 et 238 bis du code Génaral des Impôts
                    </td>
                </tr>
            </table>
            <table style="width:100%;padding-left:10mm;padding-right:10mm;">

                <tr style="">

                    <td style="width:100%; margin-left:10mm;">

                        Nous confirmons avoir reçu la somme de <?php echo $this->content["tot_don_mnt"]?>€ ,
                        qui correspond au montant total des dons que vous avez effectués en notre faveur en <?php echo $this->content["year"]?>,
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
                        <td style="width:33%;vertical-align:top;"><b>Nom et adresse du donateur :</b></td>
                        <td style="width:67%;"><?php echo $this->content["firstname"].' '.$this->content["lastname"].' - '.$this->content["adress"].' '. $this->content["zip"].' '. $this->content["town"]?></td>
                    </tr>
                </table>

                <br><br>

                <table style="width:100%;padding-left:10mm;padding-right:10mm;">
                    <tr style="width:100%;">
                        <td style="width:33%;vertical-align:top;"><b>Détail des dons :</b></td>
                        <td style="width:67%;"> <?php echo $this->content["tot_don_mnt"]?> € <?php echo $this->content["date"]?></td>
                    </tr>
                </table>

                <br><br>

                <table style="width:100%;padding-left:10mm;padding-right:10mm;">
                    <tr style="width:100%;">
                        <td style="width:100%;vertical-align:top;">Le bénéficiaire reconnait avoir reçu en <?php echo $this->content["year"]?>, au titre des versements ouvrant droits à la réduction d'impôts la somme de <?php echo $this->content["tot_don_mnt"]?> € .</td>

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

            $html2pdf->output( __DIR__ . '/../../../../Ged/Receipt/R_asso/'.$this->content["receipt_number"].'.pdf', 'F');

            $url = explode("/",$_SERVER['REQUEST_URI']);

            if ($open !== "close" ){

                $html2pdf->output( __DIR__ . '/../../../../Ged/Receipt/R_asso/'.$this->content["receipt_number"].'.pdf', 'D');

            };

        }

    }
