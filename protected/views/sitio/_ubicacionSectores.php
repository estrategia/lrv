<?php foreach ($listCiudadesSubsectores as $ciudad): ?>
    <?php foreach ($ciudad->listSubSectores as $subSector): ?>
        <div data-role="panel" data-position-fixed="true" id="subsector-panel-<?php echo $subSector->codigoSubSector ?>" class="ui-content c_ubi_pop" data-position="right" data-display="overlay">
            <div data-role="collapsibleset" data-inset="true" class="ui-nodisc-icon ui-alt-icon">
                <?php foreach ($subSector->listReferencias as $referencia): ?>
                    <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                        <h3 class="cubi_txt_til"><?php echo $referencia->nombreReferencia ?></h3>
                        <ul data-role="listview" data-inset="false" data-icon="false">
                            <?php foreach ($referencia->listSectores as $sector): ?>
                                <li class="c_lnk_sel">
                                    <p>
                                        <a href="<?php echo CController::createUrl('/sitio/ubicacionSeleccion', array('ciudad' => $ciudad->codigoCiudad, 'sector' => $sector->codigoSector, 'subsector' => $subSector->codigoSubSector)) ?>" data-ajax="false" class="ui-mini" ><?php echo $sector->nombreSector ?></a>
                                    </p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>