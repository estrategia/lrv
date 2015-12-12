<div class="container">
    <div class="space-1"></div>
    <section class="selectedUbicacion">
        <div class="center">
            <h3>SELECCIONA EL TIPO DE ENTREGA Y LA UBICACI&Oacute;N DONDE DESEAS QUE ENTREGUEMOS TU PEDIDO</h3>
        </div>
        <div class="blocktipoentrega">
            <div class="row">
                <h4>TIPO DE ENTREGA</h4>
                <div class="col-md-6">               
                    <div data-role="tipoentrega" data-descripcion="Quiero pasar por el pedido" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>" class="tipo-entrega inactivo<?php echo ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? " activo" : "") ?>">
                        <div class="ico_ubi icoRecoger"></div>
                        <div class="inner_tipoentrega">Quiero pasar por el pedido <a class="view_more_ubicacion" href="#">Ver m&aacute;s</a></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="col-md-6">  
                    <div data-role="tipoentrega" data-descripcion="Quiero que me lo entreguen a domicilio" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['domicilio']; ?>" class="tipo-entrega<?php echo ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? " activo" : "") ?>">
                        <div class="ico_ubi icoEntrega"></div>
                        <div class="inner_tipoentrega">Quiero que me lo entreguen a domicilio <a class="view_more_ubicacion" href="#">Ver m&aacute;s</a></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="space-3"></div>
            <div class="align_center">
                <h4>UBICACI&Oacute;N DE ENTREGA</h4>

                    <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-screenshot"></span>  Usar la ubicación de tu dispositivo', array('class' => 'btn ico-btn  btn-ciudad activo', 'data-role' => 'ubicacion-gps')); ?>
                    <?php if (!Yii::app()->user->isGuest): ?>
                        <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-folder-open"></span>   Usar tus direcciones', array('class' => 'btn ico-btn  btn-ciudad inactivo', 'data-role' => 'ubicacion-direccion')); ?>
                    <?php endif; ?>
                    <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-map-marker"></span>  Buscar ubicaci&oacute;n', array('class' => 'btn ico-btn  btn-ciudad inactivo', 'data-role' => 'ubicacion-mapa')); ?>

            </div>
        </div>
        <div id="ubicacion-seleccion-resumen" class="display-none">

        </div>
        
        <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
            <input id="ubicacion-seleccion-entrega" type="hidden" name="entrega" value="<?php echo $tipoEntrega ?>">
            <input id="ubicacion-seleccion-direccion" type="hidden" name="direccion" value="<?php echo ($objDireccion == null ? "" : $objDireccion->idDireccionDespacho) ?>">
            <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoCiudad) ?>">
            <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoSector) ?>">
            <div class="center" style="margin-bottom: 40px; margin-top: 70px;">
                <button data-role="ubicacion-seleccion" class="btn btn-default" type="button">Aceptar</button>
                <?php if ($objSectorCiudad != null): ?>
                    <?php echo CHtml::link('<span class="glyphicon glyphicon-ok-sign"></span> Continuar en ' . $this->sectorName, $urlRedirect, array('class' => 'btn  btn-danger')); ?>
                <?php endif; ?>
            </div>
        </form>
    </section>
</div>