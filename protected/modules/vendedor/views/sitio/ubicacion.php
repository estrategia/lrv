<h3 class="ui-bar ui-bar-h center title_h tpad">
    Selecciona la ubicación donde el cliente desea recoger o que le entreguemos el pedido.
</h3>

<div class="ui-content">
    <?php echo CHtml::htmlButton('Usar la ubicación de tu dispositivo', array('class' => 'ui-btn ui-corner-all ui-btn-icon-left ui-icon-ubi ui-alt-icon c_btn_ub btn-y', 'onclick' => 'ubicacionGPSVendedor();')); ?>
    <?php if (Yii::app()->controller->module->user->getClienteLogueado()): ?>
        <?php echo CHtml::htmlButton('Usar las direcciones del cliente', array('class' => 'ui-btn ui-btn-r ui-corner-all ui-alt-icon btn-wh', 'data-role' => 'ubicacion-direccion-cliente')); ?>
    <?php endif; ?>
    <?php  echo CHtml::htmlButton('Seleccionar ciudad', array('class' => 'ui-btn ui-btn-n ui-corner-all ui-alt-icon btn-y ', 'data-role' => 'ubicacion-mapa')); ?>

    <?php if ($objSectorCiudad != null): ?>
        <div class="space-2"></div>
        <?php echo CHtml::link('Cancelar', $this->createUrl('/sitio/inicio'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r btn-wh ', 'data-ajax' => 'false')); ?>
    <?php endif; ?>
</div>