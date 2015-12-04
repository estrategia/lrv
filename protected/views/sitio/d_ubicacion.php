<div class="container">
    <div class="space-1"></div>
    <section class="selectedUbicacion">
        <div class="center">
            <h3>SELECCIONA EL TIPO DE ENTREGA Y LA UBICACI&Oacute;N DONDE DESEAS QUE ENTREGUEMOS TU PEDIDO</h3>
        </div>
        <div class="blocktipoentrega">
        <div class="row">
            <div class="col-md-6">
                    <h4>TIPO DE ENTREGA</h4>
                    <div data-role="tipoentrega" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>" class="tipo-entrega<?php echo ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? " activo" : "") ?>">
                        <div class="ico_ubi icoRecoger"></div>
                        <div class="inner_tipoentrega">Quiero pasar por el pedido</div>
                        <div class="clear"></div>
                    </div>
                <div class="space-1"></div>
                    <div data-role="tipoentrega" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['domicilio']; ?>" class="tipo-entrega<?php echo ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? " activo" : "") ?>">
                        <div class="ico_ubi icoEntrega"></div>
                        <div class="inner_tipoentrega">Quiero que me lo entreguen a domicilio</div>
                        <div class="clear"></div>
                    </div>
            </div>

            <div class="col-md-6">
                <h4>UBICACI&Oacute;N DE ENTREGA</h4>
                        <?php echo CHtml::htmlButton('Usar la ubicación de tu dispositivo', array('class' => 'btn btn-danger btn-ciudad', 'data-role' => 'ubicacion-gps')); ?>
                <div class="space-1"></div>
                <?php if (!Yii::app()->user->isGuest): ?>
                            <?php echo CHtml::htmlButton('Usar tus direcciones', array('class' => 'btn btn-danger btn-ciudad', 'data-role' => 'ubicacion-direccion')); ?>
                    <div class="space-1"></div>
                <?php endif; ?>
                        <?php echo CHtml::htmlButton('Buscar ubicaci&oacute;n', array('class' => 'btn btn-danger btn-ciudad', 'data-role' => 'ubicacion-mapa')); ?>
                <div class="space-1"></div>
                <?php if ($objSectorCiudad != null): ?>
                    <div class="space-1"></div>
                            <?php echo CHtml::link('Continuar en ' . $this->sectorName, $urlRedirect, array('class' => 'btn btn-warning btn-ciudad', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
                    </div>
                <?php endif; ?>
                <div class="space-1"></div>
            </div>
        </div>
        </div>
            <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
                <input id="ubicacion-seleccion-entrega" type="hidden" name="entrega" value="<?php echo $tipoEntrega ?>">
                <input id="ubicacion-seleccion-direccion" type="hidden" name="direccion" value="">
                <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="">
                <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="">
                <div class="center">
                        <button data-role="ubicacion-seleccion" class="btn btn-default" type="button">Aceptar</button>
                </div>
            </form>
    </section>
</div>

<div class="modal animated bounceIn map" id="modal-ubicacion-map">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title center">Busca tu ubicaci&oacute;n</h1>
                <div id="select-ubicacion-content" style="width: 80%;" class="center-div">
                    <div id="select-ubicacion-psubsector" style="width: 49%;" class="center-div">
                        <select class="form-control ciudades" data-role="ciudad-despacho-map" style="width: 100%">
                            <option value="">Seleccione ...</option>
                            <?php foreach ($listCiudadesSectores as $ciudad): ?>
                                <option data-latitud="<?php #echo $ciudad->latitudGoogle ?>" data-longitud="<?php #echo $ciudad->longitudGoogle ?>" value="<?php echo $ciudad->codigoCiudad ?>-0"><?php echo $ciudad->nombreCiudad ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="modal-body">
                <div class="map-content" id="map"></div>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
                <button type="button" class="btn btn-primary" data-role="ubicacion-seleccion-mapa">Aceptar</button>
            </div>
        </div>
    </div>
</div>
