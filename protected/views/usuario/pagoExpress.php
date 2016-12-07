<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (empty($listDirecciones)): ?>
    <?php echo CHtml::link('Crear dirección de despacho', CController::createUrl('/usuario/direcciones'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>
<?php else: ?>
    <div class="ui-content finalCompra">
        <h2>Configure un pago rápido con un solo clic. Esta opción saldrá para los pedidos realizados en la dirección seleccionada.</h2>

    </div>
    <div class="ui-content">
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


        <fieldset>
            <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
                <h2>Dirección de despacho</h2>
                <?php foreach ($listDirecciones as $idx => $objDireccion): ?>
                    <label for="PagoExpress_idDireccionDespacho_<?php echo $objDireccion->idDireccionDespacho ?>"><?php echo $objDireccion->descripcion . " | " . $objDireccion->objCiudad->nombreCiudad ?></label>
                    <input type="radio" name="PagoExpress[idDireccionDespacho]" id="PagoExpress_idDireccionDespacho_<?php echo $objDireccion->idDireccionDespacho ?>" value="<?php echo $objDireccion->idDireccionDespacho ?>" <?php echo ($objPagoExpress->idDireccionDespacho == $objDireccion->idDireccionDespacho ? "checked" : "") ?>>
                    <div id="div-infodireccion-<?php echo $objDireccion->idDireccionDespacho ?>">
                        <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
                            <table>
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
                <?php endforeach; ?>
                <?php echo $form->error($objPagoExpress, 'idDireccionDespacho'); ?>
            </div>
            <div class="space-2"></div>
        </fieldset>
        
        <fieldset>
            <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
                <h2>Hora de entrega</h2>
                <div class="txt-h2">La hora de entrega se programará con la hora mas próxima disponible en tu ubicación</div>
            </div>
            <div class="space-2"></div>
        </fieldset>
        
        <fieldset>
            <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
                <h2>Forma de pago</h2>
                <?php $this->renderPartial('/carro/_formaPago', array('form' => $form, 'model' => $objPagoExpress, 'listFormaPago'=>$listFormaPago)) ?>
            </div>
            <div class="space-2"></div>
        </fieldset>

        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Modificar
            <input type="submit" data-enhanced="true" value="1" name="Submit">
        </div>
        <?php if (!$objPagoExpress->isNewRecord): ?>
            <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-n">
                Desactivar
                <input type="submit" data-enhanced="true" value="0" name="Submit">
            </div>
        <?php endif; ?>
        <?php $this->endWidget(); ?>
    </div>
<?php endif; ?>