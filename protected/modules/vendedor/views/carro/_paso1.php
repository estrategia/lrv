<div class="ui-content c_cont_slc_ntg ">
    <?php if ($modelPago->tieneDomicilio($this->objSectorCiudad)): ?>
        <div class="ui-bar ui-bar-c ui-corner-all center ccont_index<?php echo ($modelPago->tipoEntrega === null ? "" : ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? " activo" : " inactivo")) ?>" data-role="tipoentrega" data-descripcion="entrega a domicilio" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['domicilio']; ?>">
            <a href="#" data-ajax="false" class="ui-btn ui-btn-inline ui-corner-all ui-shadow c_btn_img">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_domicilio.png" alt="Domicilio" class="c_ndx_img"></a>
            <div class="ctxt_pedido bg_yellow">
                <h2><a href="#" data-ajax="false">Entrega<br/> a domicilio</a></h2>
                <p><a href="#panel-info-domicilio" data-role="tipoentrega-info">Conocer más [+]</a></p>
            </div>
        </div>
        <div class="space-1"></div>
    <?php endif; ?>
    <?php if (Yii::app()->shoppingCart->getStoredItemsCount() <= 0): ?>
        <div class="ui-bar ui-bar-c ui-corner-all center ccont_index<?php echo ($modelPago->tipoEntrega === null ? "" : ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? " activo" : " inactivo")) ?>" data-role="tipoentrega" data-descripcion="pasar por el pedido" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>">
            <a href="#" data-ajax="false" class="ui-btn ui-btn-inline ui-corner-all ui-shadow c_btn_img" >
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_recoger.png" alt="Pasa por el pedido" class="c_ndx_img">
            </a>
            <div class="ctxt_pedido bg_red">
                <h2><a href="#" data-ajax="false">Pasar por<br> el pedido</a></h2>
                <p><a href="#panel-info-presencial" data-role="tipoentrega-info">Conocer más [+]</a></p>
            </div>
        </div>
    <?php endif; ?>

    <input type="hidden" id="FormaPagoVendedorForm_tipoEntrega" name="FormaPagoVendedorForm[tipoEntrega]" value="<?php echo $modelPago->tipoEntrega ?>">
    <div id="FormaPagoVendedorForm_tipoEntrega_em_" class="has-error center" style="display: none;"></div>
    <input type="hidden" id="FormaPagoVendedorForm_indicePuntoVenta" name="FormaPagoVendedorForm[indicePuntoVenta]" value="<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? $modelPago->indicePuntoVenta : "") ?>">
    <div id="FormaPagoVendedorForm_indicePuntoVenta_em_" class="has-error center" style="display: none;"></div>
</div>




<?php //CVarDumper::dump($modelPago->attributes, 10, true); ?>
<?php if ($modelPago->tieneDomicilio($this->objSectorCiudad)): ?>
    <?php $this->extraContentList[] = $this->renderPartial('_entregaDomicilio', null, true) ?>
<?php endif; ?>
<?php $this->extraContentList[] = $this->renderPartial('_entregaPresencial', null, true) ?>