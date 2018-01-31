<div class="panel-group" id="collapsibleset-direcciones" role="tablist" aria-multiselectable="true">
    <?php foreach ($listDirecciones as $idx => $objDireccion): ?>
        <div class="panel panel-default">
            <div class="panel-heading head-desplegable" role="tab" id="encabezado-pago-direccion-express-<?php echo $objDireccion->idDireccionDespacho; ?>">
                <h4 class="panel-title">
                    <a role="button" id="enlace-pago-direccion-express-<?php echo $objDireccion->idDireccionDespacho; ?>" class="collapsed" data-toggle="collapse" data-parent="#collapsibleset-direcciones" href="#div-infodireccion-<?php echo $objDireccion->idDireccionDespacho ?>" aria-expanded="false" aria-controls="div-infodireccion-<?php echo $objDireccion->idDireccionDespacho ?>">
                        <input type="radio" name="PagoExpress[idDireccionDespacho]" id="PagoExpress_idDireccionDespacho_<?php echo $objDireccion->idDireccionDespacho ?>" value="<?php echo $objDireccion->idDireccionDespacho ?>" <?php echo ($objPagoExpress->idDireccionDespacho == $objDireccion->idDireccionDespacho ? "checked" : "") ?>>

                        <label for="PagoExpress_idDireccionDespacho_<?php echo $objDireccion->idDireccionDespacho ?>"><?php echo $objDireccion->descripcion . " | " . $objDireccion->objCiudad->nombreCiudad ?></label>
                    </a>
                </h4>
            </div>
            <div class="panel-collapse collapse" id="div-infodireccion-<?php echo $objDireccion->idDireccionDespacho ?>" aria-labelledby="encabezado-pago-direccion-express-<?php echo $objDireccion->idDireccionDespacho; ?>" role="tabpanel">
                <div class="panel-body">
                    <?php $this->renderPartial('/usuario/_d_direccionVista', array('model' => $objDireccion, 'editar' => false)); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
