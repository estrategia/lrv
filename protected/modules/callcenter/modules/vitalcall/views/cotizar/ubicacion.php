<div class="row">
    <div class="space-1"></div>
    <section class="selectedUbicacion">
        <div class="center">
            <h3>SELECCIONA LA UBICACI&Oacute;N DONDE DESEAS COTIZAR</h3>
        </div>
        <div class="blocktipoentrega">
            <div id="div-ubicacion-tipoubicacion" class="text-center">
            	<?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-folder-open"></span>  Georeferencia', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-georeferencia')); ?>
                <div class="space-3"></div>
                <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-map-marker"></span>  Seleccionar ciudad', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-mapa')); ?>
            </div>
            <div class="space-2"></div>
            <div class="text-center">
                <?php //echo CHtml::link('Cancelar', $urlRedirect, array('class' => 'btn  btn-primary')); ?>
            </div>
        </div>

        <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
            <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoCiudad) ?>">
            <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoSector) ?>">
        </form>
    </section>
</div>

<?php $this->renderPartial('_georeferencia',array('listDataCiudad'=>$listDataCiudad));?>
<?php //Yii::app()->clientScript->registerScript('analytics-compra', "$('#select-georeferencia-ciudad').select2();"); ?>

