<div>
    <div align="center"></div>
    
        <h1 style="text-align:left;color:#666666;font-family:Arial;font-size:22px">¡Hola! </h1> 
        <h1 style="text-align:left;color:#666666;font-family:Arial;font-size:25px"><?php echo utf8_decode($listasPersonal->objUsuario->nombre)?></h1><br/>
   <br/>
  
  <br>
  <p style="color:#666666;font-size:14px"> Este es un recordatorio de <b><?php echo $listasPersonal->nombreLista ?></b> </p>

    <h4 style="color:#666666">
        Productos de la <span class="il">lista</span>
    </h4>
    <table style="width:80%;border-radius:4px 4px 4px 4px;margin-bottom:20px;border-spacing:0;font-size:14px;border:1px #dddddd solid;color:#666666">
        <tbody>
         <!--   <tr>
                <td height="3" style="background-color:#a40014;font-size:3px;line-height:3px;padding:0;height:3px;width:100%" colspan="6">
                    <p style="margin:0"> </p>
                </td>
            </tr> -->
            <tr>
                <th style="background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center">Producto</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Cantidad</th>
            </tr>
            <?php foreach ($listasPersonal->listDetalle as $indice => $position): ?>
               <tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                    <?php 
                    if ($position->codigoProducto != null && !empty($position->codigoProducto)):
                        $this->renderPartial('/common/recordarCorreoProducto', array(
                            'position' => $position,
                        ));
                    elseif ($position->idCombo != null && !empty($position->idCombo)):
                        $this->renderPartial('/common/recordarCorreoCombo', array(
                            'position' => $position
                        ));
                    endif;
                    ?>
                  
                  <td style="text-align: right; border-top:1px solid #dddddd;"><?= $position->unidades ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
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
                                    <a target="_blank" style="color:#ff0000" href="http://<?php echo Yii::app()->params->urlSitio.Yii::app()->params->urlChatLinea?>"> Clic aqu&iacute; </a>
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
                                <a target="_blank" style="color:#ff0000" href="<?php echo $this->createAbsoluteUrl("/usuario/recordarListaPersonal", array('hash' => $clave)) ?>">Clic aqu&iacute;</a>
                            </p>
                        </div>
        <div class="yj6qo"></div>
        <div class="adL"> </div>
    </div>
    <br/>
    <div class="adL"> </div>
    <div class="adL" style="margin:20px"></div>
    <div class="adL"> </div>
</div>