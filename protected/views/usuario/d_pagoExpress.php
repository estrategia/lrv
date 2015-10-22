<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <div class="alert alert-dismissable alert-<?php echo $idx; ?>"><?php echo $mensaje; ?></div>
        <?php endforeach; ?>
<?php endif; ?>

<?php if (empty($listDirecciones)): ?>
    <?php echo CHtml::link('Crear dirección de despacho', "#", array('data-role' => 'direccion-adicionar-modal', 'data-pagoexpress' => 1, 'class' => 'btn btn-primary')); ?>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <h4>Configure un pago rápido con un solo clic. Esta opción saldrá para los pedidos realizados en la dirección seleccionada.</h4>
        </div>
    </div>

    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'form-pagoexpess',
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'class' => "", 'data-ajax' => "false"
            ),
            'errorMessageCssClass' => 'has-error',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'errorCssClass' => 'has-error',
                'successCssClass' => 'has-success',
            ))
        );
    ?>

    <div class="row">
        <div class="col-md-12">
            <h3>Hora de entrega</h3>
            <p>La hora de entrega se programará con la hora mas próxima disponible en tu ubicación</p>
        </div>
    </div>    

    <div class="row">
        <div class="col-md-8">
            <h4>Dirección de despacho</h4>
        </div>
        <div class="col-md-4">
            <h4>Forma de pago</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
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
                        <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>

                        <div class="panel-collapse collapse" id="div-infodireccion-<?php echo $objDireccion->idDireccionDespacho ?>" aria-labelledby="encabezado-pago-direccion-express-<?php echo $objDireccion->idDireccionDespacho; ?>" role="tabpanel">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <tr>
                                        <td>Nombre destinatario</td>
                                        <td><?php echo $objDireccion->nombre ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ciudad</td>
                                        <td><?php echo $objDireccion->objCiudad->nombreCiudad ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dirección</td>
                                        <td><?php echo $objDireccion->direccion ?></td>
                                    </tr>
                                    <tr>
                                        <td>Barrio</td>
                                        <td><?php echo $objDireccion->barrio ?></td>
                                    </tr>
                                    <tr>
                                        <td>Teléfono</td>
                                        <td><?php echo $objDireccion->telefono ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php echo $form->error($objPagoExpress, 'idDireccionDespacho'); ?>
        </div>
        <div class="col-md-4">
            <?php $this->renderPartial('/carro/_d_formaPago', array('form' => $form, 'model' => $objPagoExpress, 'listFormaPago'=>$listFormaPago)) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <input type="submit" class="btn btn-default" data-enhanced="true" value="Modificar" name="Submit">
        
            <?php if (!$objPagoExpress->isNewRecord): ?>
                <input type="submit" class="btn btn-default" data-enhanced="true" value="Desactivar" name="Submit">
            <?php endif; ?>
        </div>
    </div>
        
    <?php $this->endWidget(); ?>
<?php endif; ?>