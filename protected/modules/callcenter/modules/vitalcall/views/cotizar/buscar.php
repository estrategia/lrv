                            <div class="row">
                           		<div class="col-xs-2"></div>
                                <div class="col-xs-4">
                                    <div class="top_ubicacion">
                                        <?php if ($this->objSectorCiudad == null): ?>
                                            <?php echo CHtml::link('<span class="text-center title-desp"><br><span class="glyphicon glyphicon-map-marker" style="margin-right: 5px;"></span> Seleccionar ciudad </span>', CController::createUrl('/callcenter/vitalcall/cotizar/ubicacion'), array()); ?>
                                        <?php else: ?>
                                            <?php echo $this->sectorName ?>
                                            <?php echo CHtml::link('<span class="text-center title-desp"><br><span class="glyphicon glyphicon-map-marker" style="margin-right: 5px;"></span> Cambiar ciudad </span>', CController::createUrl('/callcenter/vitalcall/cotizar/ubicacion'), array()); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <form method="get" action="<?php echo CController::createUrl('/callcenter/vitalcall/cotizar/buscar') ?>">
                                        <div class="row">
                                            <div class="col-xs-7 content-search">
                                                <input type="text" class="form-control" placeholder="Escriba el nombre del producto"  autocomplete="off" value="" id="busqueda" name="busqueda" > 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                             </div>
