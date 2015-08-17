<h3 class="ui-bar ui-bar-h center title_h tpad">
    <?php if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
        Selecciona la ubicación para recoger el pedido
    <?php else: ?>
        Selecciona la ubicación donde deseas que te entreguemos el pedido
    <?php endif; ?>
</h3>

<div class="ui-content">
    <?php echo CHtml::htmlButton('Usar la ubicación de tu dispositivo', array('class' => 'ui-btn ui-corner-all ui-btn-icon-left ui-icon-ubi ui-alt-icon c_btn_ub', 'onclick' => 'ubicacionGPS();')); ?>
    <h3 class="center" style="font-weight:bold;">ó</h3>

    <div data-role="collapsible" data-theme="n" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" class="ui-nodisc-icon cbtn_ub_ciudad">
        <h1 class="cbtn_ubcd_titulo">Seleccionar ciudad</h1>
        <form class="btn_src_bsq_ubi">
            <input type="search" class="c_btn_sr_ubi"  name="password" id="filtro-ciudad" value="" placeholder="Buscar ciudad ...">
        </form>
        <div data-role="collapsibleset" data-filter="true" data-inset="true" id="ubicaciones-set" data-input="#filtro-ciudad" class="ui-nodisc-icon ui-alt-icon">
            <?php foreach ($listCiudadesSectores as $ciudad): ?>
                <?php if (!empty($ciudad->listSectores)): ?>
                    <?php if (isset($idxCiudadesSubSectores[$ciudad->codigoCiudad])): ?>
                        <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-filtertext="<?php echo $ciudad->nombreCiudad ?>" class="lst_ub_cdd">
                            <h3><?php echo $ciudad->nombreCiudad ?></h3>
                            <ul data-role="listview" data-inset="false" class="list_ciud">
                                <?php foreach ($listCiudadesSubsectores[$idxCiudadesSubSectores[$ciudad->codigoCiudad]]->listSubSectores as $subSector): ?>
                                    <li>
                                        <a href="#subsector-panel-<?php echo $subSector->codigoCiudad . $subSector->codigoSubSector ?>" class="ui-btn ui-btn-inline ui-corner-all ui-icon-carat-r ui-btn-icon-right c_btn_sel"><?php echo $subSector->nombreSubSector ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php elseif ($ciudad->listSectores[0]->codigoSector == 0): ?>
                        <div data-role="collapsible"  data-icon="false" data-filtertext="<?php echo $ciudad->nombreCiudad ?>" data-enhanced="true" class="ui-collapsible ui-collapsible-inset ui-corner-all ui-collapsible-collapsed lst_ub_cdd">
                            <!-- class = ui-collapsible-heading -->
                            <h3 class="ubicacion-collapsible-heading ui-collapsible-heading-collapsed">
                                <a href="<?php echo CController::createUrl('/sitio/ubicacionSeleccion', array('ciudad' => $ciudad->codigoCiudad, 'sector' => 0)) ?>" data-ajax="false" class="ui-collapsible-heading-toggle ui-btn ui-btn-icon-false">
                                    <?php echo $ciudad->nombreCiudad ?>
                                </a>
                            </h3>
                        </div>
                    <?php else: ?>
                        <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-filtertext="<?php echo $ciudad->nombreCiudad ?>" class="lst_ub_cdd">
                            <h3><?php echo $ciudad->nombreCiudad ?></h3>
                            <ul data-role="listview" data-inset="false" class="list_ciud">
                                <?php foreach ($ciudad->listSectores as $sector): ?>
                                    <li data-icon="false">
                                        <a href="<?php echo CController::createUrl('/sitio/ubicacionSeleccion', array('ciudad' => $ciudad->codigoCiudad, 'sector' => $sector->codigoSector)) ?>" data-ajax="false"><?php echo $sector->nombreSector ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php if($objSectorCiudad!=null):?>
        <?php echo CHtml::link('Continuar en ' . $this->sectorName, $this->createUrl('/sitio/inicio'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
    <?php endif;?>
</div>

<div data-role="popup" id="popup-ubicacion-gps" data-dismissible="false" data-position-to="window" data-theme="a">
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
    <div data-role="main">
        <div data-role="content">
            <h2></h2>
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-r" data-ajax='false'>Usar esta ubicación</a>
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-n" data-rel='back'>Cerrar</a>
        </div>
    </div>
</div>

<?php $this->extraContentList[] = $this->renderPartial('_ubicacionSectores', array('listCiudadesSubsectores' => $listCiudadesSubsectores), true); ?>