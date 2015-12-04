<?php $editar = isset($editar) ? $editar : true; ?>

<div id="collapsibleset-direcciones" data-role="collapsibleset" data-theme="a" data-content-theme="a" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right">
    <?php foreach ($listDirecciones as $codigoCiudad => $direccion): ?>
        <div data-role="collapsible" id="collapsible-direccion-ciudad-<?php echo $codigoCiudad ?>">
            <h3><?php echo $direccion['ciudad'] ?></h3>
            <?php foreach ($direccion['direcciones'] as $model): ?>
                <div id="div-direccion-radio-<?php echo $model->idDireccionDespacho ?>">
                    <label for="DireccionesDespacho_idDireccionDespacho_<?php echo $model->idDireccionDespacho ?>"><?php echo $model->descripcion ?></label>
                    <input type="radio" name="DireccionesDespacho[idDireccionDespacho]" id="DireccionesDespacho_idDireccionDespacho_<?php echo $model->idDireccionDespacho ?>" value="<?php echo $model->idDireccionDespacho ?>" >
                    <div id="div-direccion-form-<?php echo $model->idDireccionDespacho ?>"  class="c_form_rgs ui-body-c" style="display: none">
                        <?php if ($editar): ?>
                            <?php $this->renderPartial('/usuario/_direccionForm', array('model' => $model)); ?>
                        <?php else: ?>
                            <?php $this->renderPartial('/usuario/_direccionVista', array('model' => $model)); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
