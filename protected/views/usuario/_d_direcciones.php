<div class="panel-group" id="collapsibleset-direcciones" role="tablist" aria-multiselectable="true">
    <?php foreach ($listDirecciones as $codigoCiudad => $direccion): ?>
        
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="encabezado-direccion-<?php echo $codigoCiudad ?>">
              <h4 class="panel-title">
                <a role="button" id="" data-toggle="collapse" data-parent="#collapsibleset-direcciones" href="#collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>" aria-expanded="true" aria-controls="collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>">
                  <?php echo $direccion['ciudad'] ?>
                </a>
              </h4>
            </div>
            <div id="collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="encabezado-direccion-<?php echo $codigoCiudad ?>">
                <div class="panel-body">
                <?php foreach ($direccion['direcciones'] as $model): ?>
                    <div class="row">
                        <div id="div-direccion-radio-<?php echo $model->idDireccionDespacho ?>" class="col-md-12">
                            <label for="DireccionesDespacho_idDireccionDespacho_<?php echo $model->idDireccionDespacho ?>"><?php echo $model->descripcion ?></label>
                            <input type="radio" name="DireccionesDespacho[idDireccionDespacho]" id="DireccionesDespacho_idDireccionDespacho_<?php echo $model->idDireccionDespacho ?>" value="<?php echo $model->idDireccionDespacho ?>" >
                            <div id="div-direccion-form-<?php echo $model->idDireccionDespacho ?>"  class="c_form_rgs ui-body-c" style="display: none">
                                <?php $this->renderPartial('/usuario/_d_direccionForm', array('model' => $model)); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>

        </div>

    <?php endforeach; ?>
</div>