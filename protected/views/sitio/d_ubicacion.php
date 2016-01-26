<div class="container">
    <div class="space-1"></div>
    <section class="selectedUbicacion">
        <div class="center">
            <h3>SELECCIONA LA UBICACI&Oacute;N DONDE DESEAS QUE ENTREGUEMOS TU PEDIDO</h3>
        </div>
        <div class="blocktipoentrega">
            <div id="div-ubicacion-tipoubicacion" class="text-center">
                <?php //echo CHtml::htmlButton('<span class="glyphicon glyphicon-screenshot"></span>  Usar la ubicación de tu dispositivo', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-gps')); ?>
                <?php if (!Yii::app()->user->isGuest): ?>
                    <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-folder-open"></span>   Usar tus direcciones', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-direccion')); ?>
                <div class="space-3"></div>
                        <?php endif; ?>
                <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-map-marker"></span>  Seleccionar ciudad', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-mapa')); ?>
            </div>
            <div class="space-2"></div>
            <div class="text-center">
                <?php echo CHtml::link('Cancelar', $urlRedirect, array('class' => 'btn  btn-primary')); ?>
            </div>
        </div>

        <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
            <input id="ubicacion-seleccion-direccion" type="hidden" name="direccion" value="<?php echo ($objDireccion == null ? "" : $objDireccion->idDireccionDespacho) ?>">
            <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoCiudad) ?>">
            <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoSector) ?>">
        </form>
    </section>
</div>