<div class="container">
    <div class="space-1"></div>
    <section class="selectedUbicacion">
        <div class="center">
            <h3>SELECCIONA EL TIPO DE ENTREGA Y LA UBICACI&Oacute;N DONDE DESEAS QUE ENTREGUEMOS TU PEDIDO</h3>
        </div>
        <div class="blocktipoentrega">
            <div id="div-ubicacion-tipoentrega" class="row">
                <h4>TIPO DE ENTREGA</h4>
                <div class="col-md-6">               
                    <div data-role="tipoentrega" data-descripcion="Quiero pasar por el pedido" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>" class="tipo-entrega<?php echo ($tipoEntrega === null ? "" : ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? " activo" : " inactivo")) ?>">
                        <div class="ico_ubi icoRecoger"></div>
                        <div class="inner_tipoentrega">Quiero pasar por el pedido <a class="view_more_ubicacion" href="#" data-toggle="modal" data-target="#info_recoger">Ver m&aacute;s</a></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="col-md-6">  
                    <div data-role="tipoentrega" data-descripcion="Quiero que me lo entreguen a domicilio" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['domicilio']; ?>" class="tipo-entrega<?php echo ($tipoEntrega === null ? "" : ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? " activo" : " inactivo")) ?>">
                        <div class="ico_ubi icoEntrega"></div>
                        <div class="inner_tipoentrega">Quiero que me lo entreguen a domicilio <a class="view_more_ubicacion" href="#" data-toggle="modal" data-target="#info_domicilio">Ver m&aacute;s</a></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="space-3"></div>
            <div id="div-ubicacion-tipoubicacion" class="text-center<?php echo ($objSectorCiudad == null ? " display-none" : "") ?>">
                <h4>UBICACI&Oacute;N DE ENTREGA</h4>
                <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-screenshot"></span>  Usar la ubicación de tu dispositivo', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-gps')); ?>
                <?php if (!Yii::app()->user->isGuest): ?>
                    <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-folder-open"></span>   Usar tus direcciones', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-direccion')); ?>
                <?php endif; ?>
                <?php echo CHtml::htmlButton('<span class="glyphicon glyphicon-map-marker"></span>  Buscar ubicaci&oacute;n', array('class' => 'btn ico-btn  btn-ciudad', 'data-role' => 'ubicacion-mapa')); ?>
            </div>
        </div>
        <div class="space-1"></div>
        <div class="center">
            <div disabled="disabled" id="ubicacion-seleccion-resumen" data-role="ubicacion-seleccion" data-entrega="<?php echo $tipoEntregaTxt ?>" data-ubicacion="<?php echo ($objSectorCiudad == null ? "" : $this->sectorName) ?>" class="display-none text-center btn btn-default" style="cursor: pointer; margin: 10px 20px;">

            </div>
        </div>


        <?php //echo CHtml::link('<span class="glyphicon glyphicon-ok-sign"></span> Continuar en ' . $this->sectorName, $urlRedirect, array('data-role'=> 'ubicacion-seleccion', 'class' => 'btn  btn-default')); ?>

        <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
            <input id="ubicacion-seleccion-entrega" type="hidden" name="entrega" value="<?php echo $tipoEntrega ?>">
            <input id="ubicacion-seleccion-direccion" type="hidden" name="direccion" value="<?php echo ($objDireccion == null ? "" : $objDireccion->idDireccionDespacho) ?>">
            <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoCiudad) ?>">
            <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="<?php echo ($objSectorCiudad == null ? "" : $objSectorCiudad->codigoSector) ?>">
            <div class="center" style="margin: 10px 0;">

                <!--<button data-role="ubicacion-seleccion" class="btn btn-primary display-none" type="button">Aceptar</button>-->

                <?php if ($objSectorCiudad != null): ?>
                    <?php echo CHtml::link('<span class="glyphicon glyphicon-ok-sign"></span> Continuar en ' . $this->sectorName, $urlRedirect, array('class' => 'btn  btn-default')); ?>
                <?php endif; ?>
            </div>
        </form>
    </section>
</div>

<!-- modal info recoger -->

<div class="modal fade" id="info_recoger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Quiero pasar por el pedido</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4  center">
                        <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/1_ubicacion.png" alt="">
                        <h2 class="text font_18">1. Selecciona la ciudad</h2>
                    </div>
                    <div class="col-sm-4 not_padding center">
                        <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/2_productos.png" alt="">
                        <h2 class="text font_18">2. Encuentra lo que estás buscando</h2>
                    </div>
                    <div class="col-sm-4 center">
                        <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/3_puntoventa.png" alt="">
                        <h2 class="text font_18">3. Selecciona el punto de venta de tu conveniencia</h2>
                    </div>
                </div>
                <div class="space-3"></div>
                <div class="row">
                    <div class="col-sm-4 center col-sm-offset-2">
                        <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/4_alistar_pedido.png" alt="">
                        <h2 class="text font_18">4. Alistamos tu pedido</h2>
                    </div>
                    <div class="col-sm-4 center">
                        <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/5_tiempo_recoger.png" alt="">
                        <h2 class="text font_18">5. En el tiempo indicado pasa por él</h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- fin modal info recoger -->

<!-- modal info domicilio -->

<div class="modal fade" id="info_domicilio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Quiero que me lo entreguen a domicilio</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3 not_padding center">
                        <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/a_ubicacion.png" alt="">
                        <h2 class="text font_18">1. Selecciona la ciudad</h2>
                    </div>
                    <div class="col-sm-3 not_padding center">
                        <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/b_productos.png" alt="">
                        <h2 class="text font_18">2. Encuentra lo que estás buscando</h2>
                    </div>
                    <div class="col-sm-3 not_padding center">
                        <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/c_confirmacion.png" alt="">
                        <h2 class="text font_18">3. 3. Confirma tu pedido.<span class="font_14">(Despacho - Entrega - Pago)</span></h2>
                    </div>
                    <div class="col-sm-3 not_padding center">
                        <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/d_tiempo_entrega.png" alt="">
                        <h2 class="text font_18">4. En el tiempo indicado entregamos tu pedido</h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- fin modal info recoger -->

<?php if ($objSectorCiudad != null): ?>
    <?php //Yii::app()->clientScript->registerScript('update_resumen_ubicacion', "textoResumenUbicacionSeleccionada();", CClientScript::POS_END); ?>
<?php endif; ?>