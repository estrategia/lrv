                        <div class="container">
                            <div class="row" style="margin-top:60px;">
                           		<div class="col-xs-2"></div>
                                <div class="col-xs-3">
                                    <div class="top_ubicacion">
                                        <?php if ($this->objSectorCiudad == null): ?>
                                            <?php echo CHtml::link('<span class="text-center title-desp"><br><span class="glyphicon glyphicon-map-marker" style="margin-right: 5px;"></span> Seleccionar ciudad </span>', CController::createUrl('/callcenter/telefarma/sitio/ubicacion'), array()); ?>
                                        <?php else: ?>
                                            <?php echo $this->sectorName ?>
                                            <?php echo CHtml::link('<span class="text-center title-desp"><br><span class="glyphicon glyphicon-map-marker" style="margin-right: 5px;"></span> Cambiar ciudad </span>', CController::createUrl('/callcenter/telefarma/sitio/ubicacion'), array()); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <form method="get" action="<?php echo CController::createUrl('/callcenter/telefarma/catalogo/buscar') ?>">
                                        <div class="row">
                                            <div class="col-xs-12 content-search">
                                                <input type="text" class="form-control vitalcall" placeholder="Escriba el nombre del producto"  autocomplete="off" value="" id="busqueda" name="busqueda" > 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                             </div>                            
                        </div>