<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CorreosCommand extends CConsoleCommand {

    //put your code here
    public function actionRecordarCorreos() {

        try {
            $client = new SoapClient(Yii::app()->params->webServiceUrl['envioCorreosRecordatorios'], array("trace" => 1, 'cache_wsdl' => WSDL_CACHE_NONE, 'exceptions' => 0));
            $result = $client->recordarCorreos();
            echo $result;
        } catch (Exception $e) {
            $h2 = round(microtime(true) * 1000);
            // echo "Error to calling to webservice".". Time execution: ".($h2-$h1)." miliseconds\n";
            Yii::app()->exit();
        }
        /*
          Yii::import('application.models.*');
          $listasPersonales = ListasPersonales::model()->findAll(array(
          'with' => array('listDetalle' =>
          array('with' =>
          array('objProducto' =>
          array('with' => 'listImagenes'),
          'objCombo' =>
          array('with' => '')
          )
          ),
          'objUsuario',),
          'condition' => "((t.diaRecordar-t.diasAnticipacion <=:diaRecordar  AND :diaRecordar <= t.diaRecordar) OR
          ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d'))-t.diasAnticipacion)%t.diasRecordar) = 0 OR
          ( date_sub(date_add( date_sub(NOW(), INTERVAL ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) DAY) ,
          INTERVAL (CASE WHEN ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) = 0 THEN 0 ELSE t.diasRecordar end) DAY) , INTERVAL t.diasAnticipacion DAY) <= now() AND
          date_format(t.fechaCreacion, '%Y-%m-%d') <= date_add( date_sub(NOW(), INTERVAL ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) DAY) ,
          INTERVAL (CASE WHEN ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) = 0 THEN 0 ELSE t.diasRecordar end) DAY) )
          )
          AND
          t.estadoLista = 1",
          'params' => array(
          'diaRecordar' => Date("d")
          )
          ));

          foreach ($listasPersonales as $listaPersonal) {
          $claveEncriptada = encrypt("$listaPersonal->identificacionUsuario~$listaPersonal->idLista~$listaPersonal->fechaCreacion", Yii::app()->params->claveLista);
          $contenidoCorreo = $this->correoRecordatorio($listaPersonal, $claveEncriptada);
          $htmlCorreo = $this->plantillaCorreo($contenidoCorreo) ;
          $asuntoCorreo = " La rebaja virtual - Recordar lista ";
          try {
          sendHtmlEmail($listaPersonal->objUsuario->correoElectronico, $asuntoCorreo, $htmlCorreo);
          } catch (Exception $ce) {
          Yii::log("Error enviando correo al recordar lista \n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
          }
          } */
    }

    private function correoRecordatorio($listaPersonal, $claveEncriptada) {
        $html = '  <div>
                    <div align = "center"></div>

                    <h1 style = "text-align:left;color:#666666;font-family:Arial;font-size:22px">¡Hola!</h1>
                    <h1 style = "text-align:left;color:#666666;font-family:Arial;font-size:25px">' . utf8_decode($listaPersonal->objUsuario->nombre) . '
                    </h1><br/>
                    <br/>

                    <br>
                    <p style="color:#666666;font-size:14px"> Este es un recordatorio de <b>' . $listaPersonal->nombreLista . '</b> </p>

                    <h4 style="color:#666666">
                        Productos de la <span class="il">lista</span>
                    </h4>
                    <table style="width:80%;border-radius:4px 4px 4px 4px;margin-bottom:20px;border-spacing:0;font-size:14px;border:1px #dddddd solid;color:#666666">
                        <tbody>

                            <tr>
                                <th style="background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center">Producto</th>
                                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Cantidad</th>
                            </tr>.';
        foreach ($listaPersonal->listDetalle as $indice => $position):
            $html.= '<tr style="vertical-align:middle; ' . ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "");

            if ($position->codigoProducto != null && !empty($position->codigoProducto)):
                $html.=$this->correoProducto($position);

            elseif ($position->idCombo != null && !empty($position->idCombo)):
                $html.=$this->correoCombo($position);
            endif;

            $html.= ' <td style="text-align: right; border-top:1px solid #dddddd;">' . $position->unidades . '</td>
                                                        </tr>';
        endforeach;
        $html.=' </tbody>
                    </table>
                    <div style="border-top:1px solid #999999">
                        <div>
                            <br>
                            <h4 style="color:#666666"> Estamos para atenderte</h4>
                            <p style="color:#666666;font-size:14px">
                                Si tienes alg&uacute;n inconveniente con tu
                                <span class="il">pedido</span>
                                comun&iacute;cate con nosotros a trav&eacute;s de los canales que tenemos disponibles:
                                <br>
                            </p>
                            <ul style="color:#666666;font-size:14px;font-family:Arial">
                                <li>
                                    Chat en l&iacute;nea
                                    <a target="_blank" style="color:#ff0000" href="http://<?php echo Yii::app()->params->urlSitio . Yii::app()->params->urlChatLinea ?>"> Clic aqu&iacute; </a>
                                </li>
                                <li>
                                    Sistema PQRS (preguntas, quejas, reclamos y solicitudes)
                                    <a target="_blank" style="color:#ff0000" href="http://www.copservir.com/clubclientefiel/index.php?option=com_wrapper&view=wrapper&Itemid=479">Ingresar</a>
                                </li>
                                <li>Línea de atenci&oacute;n al cliente 01 8000 93 99 00. </li>
                            </ul>
                            <br>
                            <p></p>
                            <p style="padding-top:4px;text-align:left;color:#666666">
                                Para ir a tu 
                                <span class="il">lista</span>
                                <a target="_blank" style="color:#ff0000" href="' . CHtml::normalizeUrl("/usuario/recordarListaPersonal", array('hash' => $claveEncriptada)) . '">Clic aqu&iacute;</a>
                    </p>
                </div>
                <div class="yj6qo"></div>
                <div class="adL"> </div>
            </div>
            <br/>
            <div class="adL"> </div>
            <div class="adL" style="margin:20px"></div>
            <div class="adL"> </div>
            </div>';
    }

    private function correoProducto($position) {
        return '  <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;border-right:1px solid #dddddd;vertical-align:top;padding:8px" >
        <p>
            <a target="_blank" href="' . CHtml::normalizeUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) . '">
                <img class="CToWUd" width="70" height="70" align="left" src="' . CHtml::normalizeUrl('/') . $position->objProducto->rutaImagen() . '" title="" style="margin-right:7px;margin-bottom:13px;float:left">
            </a>
        </p>
        <p style="margin:0">
            <a target="_blank" href="' . CHtml::normalizeUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) . '" style="color:#0088cc;text-decoration:none">
                <b>' . $position->objProducto->descripcionProducto . '</b>
            </a>
        </p>
        <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $position->objProducto->codigoProducto ?></p>
        <p style="color:#666666;font-size:12px;line-height:16px"></p>
    </td>';
    }

    private function correoCombo($position) {
        return '<td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px">
                    <p>
                        <a target="_blank" href="' . CHtml::normalizeUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo, 'descripcion' => $position->objCombo->getCadenaUrl())) . '">
                            <img class="CToWUd" width="70" height="70" align="left" src="' . Yii::app()->createAbsoluteUrl('/') . $position->objCombo->rutaImagen() . '" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                        </a>
                    </p>
                    <p style="margin:0">
                        <a target="_blank" href="' . CHtml::normalizeUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo, 'descripcion' => $position->objCombo->getCadenaUrl())) . '" style="color:#0088cc;text-decoration:none">
                            <b><?php echo $position->objCombo->descripcionCombo ?></b>
                        </a>
                    </p>
                    <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $position->objCombo->idCombo ?></p>
                    <p style="color:#666666;font-size:12px;line-height:16px"></p>
                </td>';
    }

    private function plantillaCorreo($contenido) {
        return '<html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="language" content="es" />
                        <meta content="es" http-equiv="content-language">
                        <meta charset="utf-8">
                    </head>
                    <body>
                        <table align="center" style="width:100%">
                            <tbody style="text-align:justify;font-size:10.5pt;font-family:Helvetica,sans-serif;color:rgb(51,51,51)">
                                <tr>
                                    <td>
                                        <img style="display: block; width: 100%;height: auto;" src="http://www.eiso.co/test/larebajavirtual/images/mailing_header.png">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5%; padding-right: 5%">' . $contenido . '
                                        <div style="height: 20px;"></div>
                                        <p style="font-size:13.5pt;color:rgb(102,102,102)">
                                            <strong>Cordialmente</strong>
                                            <br/>
                                            <span style="color: #888888;"><strong>La Rebaja Virtual</strong></span>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="height: 20px;"></div>
                                        <img style="display: block; width: 100%;height: auto;" src="http://www.eiso.co/test/larebajavirtual/images/mailing_footer.png">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </body>
                </html>';
    }

}
