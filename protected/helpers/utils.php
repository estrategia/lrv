<?php

/**
 * utils.php   file.
 *
 * Collection of utility functions
 * @author Miguel Sanchez <miguel.sanchez@eiso.com.co>
 */
function sendHtmlEmail($toStr, $subject, $content, $ccStr = null) {
    /*ini_set("SMTP", "mailserver.copservir.com");
    ini_set("smtp_port", "25");
    ini_set("sendmail_from", "mailserver.copservir.com");
    Yii::import('application.extensions.phpmailer.JPhpMailer');
    $mail = new JPhpMailer;
    $mail->isSMTP();
    $mail->Host = 'mailserver.copservir.com';
    $mail->Port = 25;
    $mail->SMTPAuth = false;
    $mail->isHTML(true);*/
    
    Yii::import('application.extensions.phpmailer.JPhpMailer');
    $mail = new JPhpMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 25;
    $mail->SMTPAuth = true;
    $mail->Username = 'miguel.sanchez@eiso.com.co';
    $mail->Password = 'ms4nch3z31s0';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->isHTML(true);

    $mail->From = Yii::app()->params->correoAdmin;
    $mail->FromName = Yii::app()->name;
    
    if($toStr===null){
        throw new Exception("email receiver is empty");
    }
    
    $toStr = trim($toStr);
    
    if(empty($toStr)){
        throw new Exception("email receiver is empty");
    }

    $toArr = explode(",", $toStr);

    if (empty($toArr))
        throw new Exception("email receiver is empty");

    foreach ($toArr as $to) {
        $mail->addAddress($to);
    }

    if ($ccStr !== null) {
        $ccArr = explode(",", $ccStr);

        foreach ($ccArr as $cc) {
            $mail->addCC($cc);
        }
    }

    $mail->Subject = $subject;
    $mail->Body = $content;

    if (!$mail->send()) {
        throw new Exception("Message could not be sent. " . $mail->ErrorInfo);
    }
}

function distanciaCoordenadas($lat1, $lon1, $lat2, $lon2, $unit='K') { 
  $radius = 6378.137; // earth mean radius defined by WGS84
  $dlon = $lon1 - $lon2; 
  $distance = acos( sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($dlon))) * $radius; 

  if ($unit == "K") {
  		return ($distance); 
  } else if ($unit == "M") {
    	return ($distance * 0.621371192);
  } else if ($unit == "N") {
    	return ($distance * 0.539956803);
  } else {
    	return 0;
  }
}


