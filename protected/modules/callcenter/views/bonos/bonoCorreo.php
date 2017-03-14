<?php  setlocale(LC_TIME, 'es_ES.UTF-8'); ?>
<div>   
    <div style="height: 20px;"></div>
    Hemos emitido un bono para t&iacute; por <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objBono->valor, Yii::app()->params->formatoMoneda['moneda']) ?> por concepto de
    "<?php echo $objBono->objConcepto->concepto ?>", 
    para que lo aproveches realizando tus compras en la <a href='http://www.larebajavirtual.com' style="color:#ff0000" > www.larebajavirtual.com </a>
    <div style="height: 20px;"></div>
    V&aacute;lido entre el <?php echo Date("d", strtotime($objBono->vigenciaInicio))?> de <?php echo Yii::app()->params->meses[Date("n", strtotime($objBono->vigenciaInicio))]?> del <?php echo Date("Y", strtotime($objBono->vigenciaInicio))?> 
    y <?php echo Date("d", strtotime($objBono->vigenciaFin))?> de <?php echo Yii::app()->params->meses[Date("n", strtotime($objBono->vigenciaFin))]?> del <?php echo Date("Y", strtotime($objBono->vigenciaFin))?>  
    por compras superiores a <?php echo 
    Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objBono->minimoCompra, Yii::app()->params->formatoMoneda['moneda']) ?>
    
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
                                <li>L&iacute;nea de atenci&oacute;n al cliente 01 8000 93 99 00. </li>
                            </ul>
                            <br>
                            <p></p>
                        </div>
        <div class="yj6qo"></div>
        <div class="adL"> </div>
    </div>
    <br/>
    <div class="adL"> </div>
    <div class="adL" style="margin:20px"></div>
    <div class="adL"> </div>
</div>