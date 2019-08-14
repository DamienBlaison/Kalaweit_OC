<?php

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

function send_mail($p_to,$p_subject,$p_body){

    /**
    * This example shows settings to use when sending via Google's Gmail servers.
    * This uses traditional id & password authentication - look at the gmail_xoauth.phps
    * example to see how to use XOAUTH2.
    * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
    */
    //Import PHPMailer classes into the global namespace

    require(__DIR__ .'/../../vendor/autoload.php');
    require_once(__DIR__ .'/../../config/config_mail.php');


    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Set the hostname of the mail server
    $mail->Host = $mail_config["Host"];
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = $mail_config["Port"];
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = $mail_config["SMTPSecure"];
    //Whether to use SMTP authentication
    $mail->SMTPAuth = $mail_config["SMTPAuth"];
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $mail_config["Username"];
    //Password to use for SMTP authentication
    $mail->Password = $mail_config["Password"];
    //Set who the message is to be sent from
    $mail->setFrom($mail_config["setFrom"],'Kalaweit-admin');
    //Set an alternative reply-to address
    $mail->addReplyTo($mail_config["addReplyTo"],'Kalaweit-admin');
    //Set who the message is to be sent to
    $mail->addAddress($p_to);
    //Set the subject line
    $mail->Subject = $p_subject;
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($p_body);
    //Replace the plain text body with one created manually
    $mail->AltBody = $p_body;
    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    if (!$mail->send()) {
        echo '<script>
        alert("Le Message n\'a pas pu être envoyé. \nErreur:\n'. $mail->ErrorInfo.'");
        </script>';
    } else {
        echo '<script>alert("Le message a bien été envoyé")</script>';
        //Section 2: IMAP
        ///Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
}
