<div class="container">
    <div class="space-1"></div>
    <section>
        <div class="row center">
            <h3>Selecciona tipo de entrega y ubicaci&oacute;n </h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div data-role="tipoentrega" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['presencial']; ?>" class="tipo-entrega<?php echo ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? " activo" : "") ?>">
                        Quiero pasar por el pedido
                    </div>
                </div>
                <div class="space-1"></div>
                <div class="row">
                    <div data-role="tipoentrega" data-tipo="<?php echo Yii::app()->params->entrega['tipo']['domicilio']; ?>" class="tipo-entrega<?php echo ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] ? " activo" : "") ?>">
                        Quiero que me lo entreguen a domicilio
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12" >
                        <?php echo CHtml::htmlButton('Usar la ubicación de tu dispositivo', array('class' => 'btn btn-primary btn-ciudad', 'data-role' => 'ubicacion-gps')); ?>
                    </div>
                </div>
                <div class="space-1"></div>
                <?php if (!Yii::app()->user->isGuest): ?>
                    <div class="row">
                        <div class="col-md-12" >
                            <?php echo CHtml::htmlButton('Usar tus direcciones', array('class' => 'btn btn-primary btn-ciudad', 'data-role' => 'ubicacion-direccion')); ?>
                        </div>
                    </div>
                    <div class="space-1"></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12" >
                        <?php echo CHtml::htmlButton('Buscar ubicaci&oacute;n', array('class' => 'btn btn-primary btn-ciudad', 'data-role' => 'ubicacion-mapa')); ?>
                    </div>
                </div>
                <div class="space-1"></div>
                <?php if ($objSectorCiudad != null): ?>
                    <div class="space-1"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo CHtml::link('Continuar en ' . $this->sectorName, $urlRedirect, array('class' => 'btn btn-warning btn-ciudad', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="space-1"></div>
            </div>
        </div>
        <div class="row">
            <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
                <input id="ubicacion-seleccion-entrega" type="hidden" name="entrega" value="<?php echo $tipoEntrega ?>">
                <input id="ubicacion-seleccion-direccion" type="hidden" name="direccion" value="">
                <input id="ubicacion-seleccion-ciudad" type="hidden" name="ciudad" value="">
                <input id="ubicacion-seleccion-sector" type="hidden" name="sector" value="">
                <div class="row center">
                    <div class="col-md-12">
                        <button data-role="ubicacion-seleccion" class="btn btn-default" type="button">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
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
                                <?php if (!empty($ciudad->listSectorCiudad)): ?>
                                    <?php if (isset($idxCiudadesSubSectores[$ciudad->codigoCiudad])): ?>
                                        <optgroup label="<?php echo $ciudad->nombreCiudad ?>">
                                            <?php foreach ($listCiudadesSubsectores[$idxCiudadesSubSectores[$ciudad->codigoCiudad]]->listSubSectores as $subSector): ?>
                                                <option data-latitud="<?php echo $subSector->latitudGoogle ?>" data-longitud="<?php echo $subSector->longitudGoogle ?>" data-tipo="1" value="<?php echo $subSector->codigoCiudad . "-" . $subSector->codigoSubSector ?>"><i><?php echo $subSector->nombreSubSector ?></option>
                                            <?php endforeach; ?>
                                        </optgroup> 
                                    <?php elseif ($ciudad->listSectorCiudad[0]->codigoSector == 0): ?>
                                        <option data-latitud="<?php echo $ciudad->listSectorCiudad[0]->latitudGoogle ?>" data-longitud="<?php echo $ciudad->listSectorCiudad[0]->longitudGoogle ?>" data-tipo="2" value="<?php echo $ciudad->listSectorCiudad[0]->codigoCiudad ?>"><?php echo $ciudad->nombreCiudad ?></option>   
                                    <?php endif; ?>
                                <?php endif; ?> 
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
