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

    <?php echo CHtml::htmlButton('Buscar ubicaci&oacute;n', array('class' => 'ui-btn ui-btn-n ui-corner-all ui-alt-icon', 'data-role' => 'ubicacion-mapa')); ?>

    <?php if ($objSectorCiudad != null): ?>
        <?php echo CHtml::link('Continuar en ' . $this->sectorName, $this->createUrl('/sitio/inicio'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
    <?php endif; ?>
    
    <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
        <input id="ubicacion-seleccion-entrega" type="hidden" name="entrega" value="<?php echo $tipoEntrega ?>">
        <input id="ubicacion-seleccion-direccion" type="hidden" name="direccion" value="">
        <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="">
        <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="">
        
        <?php echo CHtml::link('Aceptar', '#', array('class' => 'ui-btn ui-btn-a ui-corner-all ui-alt-icon', 'data-role' => 'ubicacion-seleccion', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
    </form>
</div>

<div data-role="popup" id="popup-ubicacion-gps" data-dismissible="false" data-position-to="window" data-theme="a">
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
    <div data-role="main">
        <div data-role="content">

        </div>
    </div>
</div>

<?php $this->extraPageList[] = $this->renderPartial('_ubicacionMapa', array('listCiudadesSectores' => $listCiudadesSectores,), true);?>