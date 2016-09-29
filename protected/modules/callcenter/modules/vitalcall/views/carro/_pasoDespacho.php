<div data-role="tipoentrega-habilitar" data-habilitar="<?php echo Yii::app()->params->entrega['tipo']['domicilio'] ?>" class="<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? "" : "display-none") ?>">
    <h4 class="grey">Direcci&oacute;n</h4>
    
    <p class="grey"><?= $modelPago->objDireccion->barrio?></p>
    <p class="grey"><?= $modelPago->objDireccion->direccion?></p>
    
</div>

<div data-role="tipoentrega-habilitar" data-habilitar="<?php echo Yii::app()->params->entrega['tipo']['presencial'] ?>" class="center center-verticaly border-gray<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? "" : " display-none") ?>">
    <h4 class="grey">Punto de venta entrega</h4>
    <p class="grey" id="pasoporel-seleccion-pdv-nombre"><?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] && $modelPago->indicePuntoVenta!=null && isset($modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta])? $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] : "") ?></p>
    <p class="grey" id="pasoporel-seleccion-pdv-direccion"><?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] && $modelPago->indicePuntoVenta!=null && isset($modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta])? $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] : "")   ?></p>
</div>

<input type="hidden" id="FormaPagoVitalCallForm_indicePuntoVenta" name="FormaPagoVitalCallForm[indicePuntoVenta]" value="<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ?  $modelPago->indicePuntoVenta : "") ?>">
<div id="FormaPagoVitalCallForm_indicePuntoVenta_em_" class="text-danger text-center" style="display: none;"></div>
