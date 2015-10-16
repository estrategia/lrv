<h3 class="text-center title-desp"><span class="glyphicon glyphicon-map-marker"></span>Direcci&oacute;nes de despacho</h3>
<div class="panel-group" id="accordion-direcciones" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
    <?php foreach ($listDirecciones as $idx => $model): ?>
        <div class="panel panel-default">
            <div class="panel-heading head-desplegable" role="tab" id="heading-direccion-<?php echo $model->idDireccionDespacho ?>">
                <h4 class="panel-title">
                    <input type="radio" name="FormaPagoForm[idDireccionDespacho]" id="direccion-<?php echo $model->idDireccionDespacho ?>" value="<?php echo $model->idDireccionDespacho ?>" <?php echo ($modelPago->idDireccionDespacho == $model->idDireccionDespacho ? "checked" : "") ?>>
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-direcciones" href="#collapse-direccion-<?php echo $model->idDireccionDespacho ?>" aria-expanded="false" aria-controls="collapse-direccion-<?php echo $model->idDireccionDespacho ?>">
                        <?php echo $model->descripcion ?>
                    </a>
                </h4>
            </div>
            <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
            <div id="collapse-direccion-<?php echo $model->idDireccionDespacho ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-direccion-<?php echo $model->idDireccionDespacho ?>">
                <div class="panel-body">
                    <div class="col-md-4 info-oficina">
                        <p>Nombre del destinatario:</p>
                        <p>Ciudad:</p>
                        <p>Dirección:</p>
                        <p>Barrio:</p>
                        <p>Teléfono:</p>
                        <p>Extensión:</p>
                        <p>Celular:</p>
                    </div>
                    <div class="col-md-8 info-oficina">
                        <p><?php echo $model->nombre ?></p>
                        <p><?php echo $model->objCiudad->nombreCiudad . (($model->codigoSector !=0) ? (" - " . $model->objSector->nombreSector) : "") ?></p>
                        <p><?php echo $model->direccion ?></p>
                        <p><?php echo $model->barrio ?></p>
                        <p><?php echo $model->telefono ?></p>
                        <p><?php echo $model->extension ?></p>
                        <p><?php echo $model->celular ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div id="FormaPagoForm_idDireccionDespacho_em_" class="text-danger" style="display: none;"></div>
<div class="col-md-2"><button class="editar">Editar</button></div>
<div class="col-md-4"><button class="adicionar">Adicionar dirección</button></div>