<div class="container">
    <div class="space-1"></div>
    <section class="selectedUbicacion">
        <div class="center">
            <h3>SELECCIONA LA UBICACI&Oacute;N DONDE DESEAS RECOGER O QUE ENTREGUEMOS TU PEDIDO</h3>
        </div>
        <div class="blocktipoentrega">
            <div id="div-ubicacion-tipoubicacion" class="text-center">
                <div class="tipo-ubicacion">
                    <button class="boton-tipo-ubicacion" data-role="ubicacion-direccion">
                        <img src=" <?php echo Yii::app()->request->baseUrl . '/images/iconos/ubicacion-desktop/direcciones.png' ?> " alt="">
                        <span class="amarillo">Direcciones</span>
                    </button>
                    <button class="boton-tipo-ubicacion" data-role="seleccion-barrio">
                        <img src=" <?php echo Yii::app()->request->baseUrl . '/images/iconos/ubicacion-desktop/barrio.png' ?> " alt="">
                        <span class="azul">Ubicar por barrio</span>
                    </button>
                    <button class="boton-tipo-ubicacion" data-role="ubicacion-gps">
                        <img src=" <?php echo Yii::app()->request->baseUrl . '/images/iconos/ubicacion-desktop/automatica.png' ?> " alt="">
                        <span class="naranja">Ubicación automatica</span>
                    </button>
                    <button class="boton-tipo-ubicacion" data-role="ubicacion-mapa">
                        <img src=" <?php echo Yii::app()->request->baseUrl . '/images/iconos/ubicacion-desktop/ciudad.png' ?> " alt="">
                        <span class="rojo">Selección de ciudad</span>
                    </button>
                </div>
               <!--  <?php if (!Yii::app()->user->isGuest): ?>
                    <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-folder-open"></span>   Usar tus direcciones', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-direccion')); ?>

                <div class="space-3"></div>
                        <?php endif; ?>
                <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-map-marker"></span>  Seleccionar ciudad', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-mapa')); ?>
                
                <div class="space-3"></div>
                <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-globe"></span>  Ubicación automatica', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-gps')); ?>

                <div class="space-3"></div>
                <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-object-align-bottom"></span>  Seleccionar barrio', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'seleccion-barrio')); ?> -->
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