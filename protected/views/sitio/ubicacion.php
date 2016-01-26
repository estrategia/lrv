<h3 class="ui-bar ui-bar-h center title_h tpad">
    <?php if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
        Selecciona la ubicación para recoger el pedido
    <?php elseif ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
        Selecciona la ubicación donde deseas que te entreguemos el pedido
    <?php endif; ?>
</h3>

<div class="ui-content">
    <?php echo CHtml::htmlButton('Usar la ubicación de tu dispositivo', array('class' => 'ui-btn ui-corner-all ui-btn-icon-left ui-icon-ubi ui-alt-icon c_btn_ub', 'onclick' => 'ubicacionGPS();')); ?>

    <?php if (!Yii::app()->user->isGuest): ?>
        <?php echo CHtml::htmlButton('Usar tus direcciones', array('class' => 'ui-btn ui-btn-r ui-corner-all ui-alt-icon', 'data-role' => 'ubicacion-direccion')); ?>
    <?php endif; ?>

    <?php echo CHtml::htmlButton('Seleccionar ciudad', array('class' => 'ui-btn ui-btn-n ui-corner-all ui-alt-icon', 'data-role' => 'ubicacion-mapa')); ?>

    <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
        <input id="ubicacion-seleccion-direccion" type="hidden" name="direccion" value="<?php echo ($objDireccion == null ? "" : $objDireccion->idDireccionDespacho) ?>">
        <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoCiudad) ?>">
        <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoSector) ?>">
    </form>

    <?php if ($objSectorCiudad != null): ?>
        <div class="space-2"></div>
        <?php //echo CHtml::link('Continuar con ' . $ubicacionEntregaTxt, $this->createUrl('/sitio/inicio'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr', 'style' => 'white-space:normal;', 'data-ajax' => 'false')); ?>
        <?php echo CHtml::link('Cancelar', $this->createUrl('/sitio/inicio'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => 'false')); ?>
    <?php endif; ?>
</div>