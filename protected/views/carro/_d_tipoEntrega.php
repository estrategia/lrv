<?php if($modelPago->tieneDomicilio($this->objSectorCiudad)): ?>
<div id="div-ubicacion-tipoentrega" class="center center-verticaly" style="padding:20px; background: #fff;">
    <div>  
        <div data-role="tipoentrega" data-descripcion="entrega a domicilio" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['domicilio']; ?>" class="tipo-entrega<?php echo ($modelPago->tipoEntrega === null ? "" : ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? " activo" : " inactivo")) ?>">
            <div class="ico_ubi icoEntrega"></div>
            <div class="inner_tipoentrega">Quiero que me lo entreguen a domicilio <a class="view_more_ubicacion" href="#" data-toggle="modal" data-target="#info_domicilio">Ver m&aacute;s</a></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="space-1"></div>
    <?php if (Yii::app()->shoppingCart->getStoredItemsCount() <= 0): ?>
    <div>               
        <div data-role="tipoentrega" data-descripcion="pasar por el pedido" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>" class="tipo-entrega<?php echo ($modelPago->tipoEntrega === null ? "" : ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? " activo" : " inactivo")) ?>">
            <div class="ico_ubi icoRecoger"></div>
            <div class="inner_tipoentrega">Quiero pasar por el pedido <a class="view_more_ubicacion" href="#" data-toggle="modal" data-target="#info_recoger">Ver m&aacute;s</a></div>
            <div class="clear"></div>
        </div>
    </div>
    <?php endif;?>
</div>
<?php else: ?>
<div id="div-ubicacion-tipoentrega" class="center center-verticaly" style="padding:20px; background: #fff;">
    <div>               
        <div class="tipo-entrega activo">
            <div class="ico_ubi icoRecoger"></div>
            <div class="inner_tipoentrega">Quiero pasar por el pedido <a class="view_more_ubicacion" href="#" data-toggle="modal" data-target="#info_recoger">Ver m&aacute;s</a></div>
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

<input type="hidden" id="FormaPagoForm_tipoEntrega" name="FormaPagoForm[tipoEntrega]" value="<?php echo $modelPago->tipoEntrega?>">