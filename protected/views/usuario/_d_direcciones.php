<div class="panel-group" id="collapsibleset-direcciones" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
    <?php foreach ($listDirecciones as $codigoCiudad => $direccion): ?>
        
        <div class="panel panel-default">
            <div class="panel-heading head-desplegable" role="tab" id="encabezado-direccion-<?php echo $codigoCiudad ?>">
              <h4 class="panel-title">
                <a role="button" class="collapsed" id="" data-toggle="collapse" data-parent="#collapsibleset-direcciones" href="#collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>" aria-expanded="false" aria-controls="collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>">
                  <?php echo $direccion['ciudad'] ?>
                </a>
              </h4>
            </div>
            <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
            <div id="collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="encabezado-direccion-<?php echo $codigoCiudad ?>">
                <div class="panel-body">
                    <?php $this->renderPartial('/usuario/_d_direccionesLista', array('listDirecciones' => $direccion['direcciones'], 'radio' => false, 'idDireccionSeleccionada' => 0)) ?>
                </div>
            </div>

        </div>

    <?php endforeach; ?>
</div>