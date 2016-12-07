<?php if($modelPago->tieneDomicilio($this->objSectorCiudad)): ?>
<div id="div-ubicacion-tipoentrega" class="center center-verticaly" style="padding:20px; background: #fff;">
    <div>  
        <div data-role="tipoentrega" data-descripcion="entrega a domicilio" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['domicilio']; ?>" class="tipo-entrega<?php echo ($modelPago->tipoEntrega === null ? "" : ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? " activo" : " inactivo")) ?>">
            <div class="ico_ubi icoEntrega"></div>
            <div class="inner_tipoentrega">Entrega a domicilio</div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="space-3"></div>
    <div>               
        <div data-role="tipoentrega" data-descripcion="pasar por el pedido" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>" class="tipo-entrega<?php echo ($modelPago->tipoEntrega === null ? "" : ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? " activo" : " inactivo")) ?>">
            <div class="ico_ubi icoRecoger"></div>
            <div class="inner_tipoentrega">Pasar por el pedido</div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php else: ?>
<div id="div-ubicacion-tipoentrega" class="center center-verticaly" style="padding:20px; background: #fff;">
    <div>               
        <div class="tipo-entrega activo">
            <div class="ico_ubi icoRecoger"></div>
            <div class="inner_tipoentrega">Pasar por el pedido <a class="view_more_ubicacion" href="#" data-toggle="modal" data-target="#info_recoger">Ver m&aacute;s</a></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="space-2"></div>
    <div>               
        <div data-role="tipoentrega" data-descripcion="pasar por el pedido" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>" style="border: 2px solid #ea0001; padding: 5px; color: #ea0001;border-radius: 5px; cursor: pointer;">
            Seleccione punto de venta
        </div>
    </div>
</div>
<?php endif;?>

<input type="hidden" id="FormaPagoTelefarmaForm_tipoEntrega" name="FormaPagoTelefarmaForm[tipoEntrega]" value="<?php echo $modelPago->tipoEntrega?>">