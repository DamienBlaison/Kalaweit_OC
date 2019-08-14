<?php
namespace Controller\Back\htmlElement;

/**
*
*/
class Box_send_mail
{

    function render()
    {

        $box_send_email  = '';
        $box_send_email .= '<div class="box box-primary">';
        $box_send_email .= '<form class="" action="" method="post">';
        $box_send_email .= '    <div class="box-header widht-boder">';
        $box_send_email .= '    <h3 class="box-title">Rédiger votre mail </h3>';
        $box_send_email .= '    </div>';
        $box_send_email .= '    <div class="box-body">';
        $box_send_email .= '        <div class="form-group">';
        $box_send_email .= '            <input class="form-control" placeholder="Subject:" name="subject">';
        $box_send_email .= '        </div>';
        $box_send_email .= '        <div class="form-group">';
        $box_send_email .= '            <textarea class="mytextarea" name="mail_body"></textarea>';
        $box_send_email .= '        </div>';
        $box_send_email .= '        <div class="pull-left">';
        $box_send_email .= '            <div class="btn btn-default btn-file">';
        $box_send_email .= '                <i class="fa fa-paperclip"></i> Attachment';
        $box_send_email .= '                <input type="file" name="attachment">';
        $box_send_email .= '            </div>';
        $box_send_email .= '        </div>';
        $box_send_email .= '        <div class="pull-right">';
        $box_send_email .= '            <input type="submit" class="btn btn-primary" name="send_message" value="Envoyer">';
        $box_send_email .= '        </div>';
        $box_send_email .= '    </div>';
        $box_send_email .= '</form>';
        $box_send_email .= '</div>';

        return $box_send_email;

    }
}


?>
