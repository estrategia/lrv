<?php

/**
 * utils.php   file.
 *
 * Collection of utility functions
 * @author Miguel Sanchez <miguel.sanchez@eiso.com.co>
 */
function sendHtmlEmail($toStr, $subject, $content, $ccStr = null) {
    /* ini_set("SMTP", "mailserver.copservir.com");
      ini_set("smtp_port", "25");
      ini_set("sendmail_from", "mailserver.copservir.com");
      Yii::import('application.extensions.phpmailer.JPhpMailer');
      $mail = new JPhpMailer;
      $mail->isSMTP();
      $mail->Host = 'mailserver.copservir.com';
      $mail->Port = 25;
      $mail->SMTPAuth = false;
      $mail->isHTML(true); 
      $mail->CharSet = "UTF-8";
     */

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
    $mail->CharSet = "UTF-8";

    $mail->From = Yii::app()->params->correoAdmin;
    $mail->FromName = Yii::app()->name;

    if ($toStr === null) {
        throw new Exception("email receiver is empty");
    }

    $toStr = trim($toStr);

    if (empty($toStr)) {
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

function distanciaCoordenadas($lat1, $lon1, $lat2, $lon2, $unit = 'K') {
    $radius = 6378.137; // earth mean radius defined by WGS84
    $dlon = $lon1 - $lon2;
    $distance = acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($dlon))) * $radius;

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

function GSASearch(&$term) {
    $codigosArray = array();

    if ($term != "") {
        GSAResult($term, $result);

        if ($result !== false) {
            require_once (Yii::app()->basePath . DS . 'vendors' . DS . 'XML2Array.php'); //Libreria que convierte el xml a array
            //Se procesa el XML para cambiarle el formato
            $dom = new DOMDocument('1.0', 'utf-8');
            $dom->loadXML($result);

            $array = XML2Array::createArray($dom);

            //Si hay una palabra sugerida se realiza de nuevo busqueda con sugerencia
            if (isset($array["GSP"]) && isset($array["GSP"]["Spelling"]["Suggestion"]) && $array["GSP"]["Spelling"]["Suggestion"] != "") {
                $term = $array["GSP"]["Spelling"]["Suggestion"]["@attributes"]["q"];
                GSAResult($term, $result);
                if ($result !== false) {
                    $dom = new DOMDocument('1.0', 'utf-8');
                    $dom->loadXML($result);
                    $array = XML2Array::createArray($dom);
                } else {
                    $array = array();
                }
            }

            if (isset($array["GSP"])) {
                //Si hay registros
                if (isset($array["GSP"]["RES"]) && isset($array["GSP"]["RES"]["R"])) {
                    $cantidad = (isset($array["GSP"]["RES"]["M"])) ? $array["GSP"]["RES"]["M"] : 0;

                    if ($cantidad == 1) {
                        if (isset($array["GSP"]["RES"]["R"]["S"])) {
                            $cod = obtenerProductoRefe($array["GSP"]["RES"]["R"]["S"]);
                            if ($cod !== null)
                                $codigosArray[] = $cod;
                        }
                    }
                    else {
                        if (sizeof($array["GSP"]["RES"]["R"]) > 0) {
                            foreach ($array["GSP"]["RES"]["R"] as $prod) {
                                if (isset($prod["S"])) {
                                    $cod = obtenerProductoRefe($prod["S"]);
                                    if ($cod !== null)
                                        $codigosArray[] = $cod;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    return $codigosArray;
}

function GSAResult(&$term, &$result) {
    $term = urlencode($term);     //Cadena a buscar
    $site = 'larebaja_collection';   //Coleccion
    $client = 'larebaja_frontend';   //Interfaz de busqueda
    $output = 'xml_no_dtd';    //Formato de salida
    $filter = 0;       //Determina si filtra los resultados y los agrupa
    $num = 200;       //Numero de registros a mostrar
    $ie = 'UTF-8';       //Codificacion de la consulta
    $ulang = 'es';       //Lenguaje de la consulta
    $sort = 'date:D:S:d1';     //Orden
    $entqr = 3;       //Politica de expansion de la consulta (0 = Ninguna, 1 = Estandar, 2 = Local, 3 = Completa)
    $entqrm = 0;       //Controla las expansiones de los meta-tags para la busqueda (0 = Ninguna, 1 = Nombres, 2 = Valores, 3 = Ambas)
    $wc = 20;        //Numero de comodines
    $wc_mc = 1;       //Considerar los comodines (wildcards)
    //Se genera la url de busqueda y se invoca
    $url = 'http://gsa.copservir.com/search?site=' . $site . '&client=' . $client . '&output=' . $output . '&q=' . $term . '&filter=' . $filter . '&num=' . $num . '&ie=' . $ie . '&ulang=' . $ulang . '&sort=' . $sort . '&entqr=' . $entqr . '&entqrm=' . $entqrm . '&wc=' . $wc . '&wc_mc=' . $wc_mc;
    $result = file_get_contents($url);
}

function obtenerProductoRefe($busqueda) {
    //GSA devuelve una cadena antes del codigo del producto, como el codigo sale primero, se extrae con una expresion
    preg_match_all('~[0-9]+~', $busqueda, $arr_cod);

    if (isset($arr_cod[0][0])) {
        $id_prod = $arr_cod[0][0];

        if (strlen($id_prod) >= 5) //El codigo del producto es mayor a 5 caracteres
            return $id_prod;
    }

    return null;
}
