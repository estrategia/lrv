<?php foreach ($listCiudadesSubsectores as $ciudad): ?>
    <?php foreach ($ciudad->listSubSectores as $subSector): ?>
        <div data-role="panel" data-position-fixed="true" id="subsector-panel-<?php echo $subSector->codigoCiudad.$subSector->codigoSubSector ?>" class="c_ubi_pop" data-position="right" data-display="overlay">
            <div data-role="collapsibleset" data-inset="true" class="ui-nodisc-icon ui-alt-icon">
                <?php foreach ($subSector->listSectorReferencias as $sectorReferencia): ?>
                    <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
                        <h3 class="cubi_txt_til"><?php echo $sectorReferencia->getNombreSector() ?></h3>
                        <ul data-role="listview" data-inset="false" data-icon="false">
                            <?php foreach ($sectorReferencia->listPuntoReferencias as $referencia): ?>
                                <li class="c_lnk_sel">
                                    <a href="#" data-ubicacion="verificacion-domicilio" data-ciudad="<?php echo $sectorReferencia->codigoCiudad ?>" data-sector="<?php echo $sectorReferencia->codigoSector ?>" class="" ><?php echo $referencia->nombreReferencia ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>