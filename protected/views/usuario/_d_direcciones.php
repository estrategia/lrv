<?php $radio = isset($radio) ? $radio : false; ?>
<?php $editar = isset($editar) ? $editar : true; ?>
<?php $idDireccionSeleccionada = isset($idDireccionSeleccionada) ? $idDireccionSeleccionada : 0; ?>

<div class="panel-group" id="collapsibleset-direcciones" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
    <?php foreach ($listDirecciones as $codigoCiudad => $direccion): ?>

        <div class="panel panel-default">
            <div class="panel-heading head-desplegable" role="tab" id="encabezado-direccion-<?php echo $codigoCiudad ?>">
              <h4 class="panel-title">
                <a role="button" class="collapsed" id="" data-toggle="collapse" data-parent="#collapsibleset-direcciones" href="#collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>" aria-expanded="false" aria-controls="collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>">
                  <?php echo ucfirst(strtolower($direccion['ciudad'])) ?>
                </a>
              </h4>
            </div>
            <div id="collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="encabezado-direccion-<?php echo $codigoCiudad ?>">
                <div class="panel-body">
                    <?php $this->renderPartial('/usuario/_d_direccionesLista', array('listDirecciones' => $direccion['direcciones'], 'radio' => $radio, 'editar' => $editar, 'idDireccionSeleccionada' => $idDireccionSeleccionada)) ?>
                </div>
            </div>

        </div>

    <?php endforeach; ?>
</div>
