<?php if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
	<div class="blockPago">
        <div class="ui-content finalCompra no-padding">
            <h2>Recoger en punto de venta</h2>
            <p style="font-size:small"><?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] ?></p>
            <p style="font-size:small"><?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] ?></p>
        </div>
    </div>
    <div class="space-2"></div>
    
    <div class="blockPago">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            //'action' => ($model->isNewRecord ? Yii::app()->createUrl('/usuario/direccionCrear') : Yii::app()->createUrl('/usuario/direccionActualizar', array('id' => $model->idDireccionDespacho))),
            'id' => "form-despacho",
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
        
        <?php if($modelPago->pagoInvitado): ?>
			<div class="ui-field-container">
        	    		<?php echo $form->labelEx($modelPago, 'identificacionUsuario', array('class' => '')); ?>
                <?php echo $form->numberField($modelPago, 'identificacionUsuario', array('maxlength' => 20, 'placeholder' => $modelPago->getAttributeLabel('identificacionUsuario'))); ?>
                <?php echo $form->error($modelPago, 'identificacionUsuario'); ?>
             </div>
			<div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'nombre', array('class' => '')); ?>
                    <?php echo $form->textField($modelPago, 'nombre', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombre'))); ?>
                    <?php echo $form->error($modelPago, 'nombre'); ?>
			</div>
			<div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'correoElectronico', array('class' => '')); ?>
                    <?php echo $form->emailField($modelPago, 'correoElectronico', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoElectronico'))); ?>
                    <?php echo $form->error($modelPago, 'correoElectronico'); ?>
			</div>
			<div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'telefono', array('class' => '')); ?>
                    <?php echo $form->numberField($modelPago, 'telefono', array('maxlength' => 11, 'placeholder' => $modelPago->getAttributeLabel('telefono'))); ?>
                    <?php echo $form->error($modelPago, 'telefono'); ?>
			</div>
        <?php else: ?>
        		
            <div class="ui-field-container">
				<?php echo $form->labelEx($modelPago, 'telefono', array()); ?>
				<?php echo $form->numberField($modelPago, 'telefono', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('telefono'))); ?>
				<?php echo $form->error($modelPago, 'telefono'); ?>
            </div>
        	
        <?php endif;?>
        
        </fieldset>
        
        <?php $this->endWidget(); ?>
        </div>
<?php else: ?>
	<?php if ($modelPago->pagoInvitado): ?>
		<div class="blockPago">
    			<div class="ui-body-c">
                <h2>Direccion de despacho</h2>
            </div>
        		<?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                //'action' => ($model->isNewRecord ? Yii::app()->createUrl('/usuario/direccionCrear') : Yii::app()->createUrl('/usuario/direccionActualizar', array('id' => $model->idDireccionDespacho))),
                'id' => "form-despacho",
                'htmlOptions' => array(
                    'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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
        			<div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'identificacionUsuario', array('class' => '')); ?>
                    <?php echo $form->numberField($modelPago, 'identificacionUsuario', array('maxlength' => 20, 'placeholder' => $modelPago->getAttributeLabel('identificacionUsuario'))); ?>
                    <?php echo $form->error($modelPago, 'identificacionUsuario'); ?>
                </div>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'nombre', array('class' => '')); ?>
                    <?php echo $form->textField($modelPago, 'nombre', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombre'))); ?>
                    <?php echo $form->error($modelPago, 'nombre'); ?>
                </div>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'correoElectronico', array('class' => '')); ?>
                    <?php echo $form->emailField($modelPago, 'correoElectronico', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoElectronico'))); ?>
                    <?php echo $form->error($modelPago, 'correoElectronico'); ?>
                </div>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'direccion', array('class' => '')); ?>
                    <?php echo $form->textField($modelPago, 'direccion', array('maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('direccion'))); ?>
                    <?php echo $form->error($modelPago, 'direccion'); ?>
                </div>

                <div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'barrio', array('class' => '')); ?>
                    <?php echo $form->textField($modelPago, 'barrio', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('barrio'))); ?>
                    <?php echo $form->error($modelPago, 'barrio'); ?>
                </div>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'telefono', array('class' => '')); ?>
                    <?php echo $form->numberField($modelPago, 'telefono', array('maxlength' => 11, 'placeholder' => $modelPago->getAttributeLabel('telefono'))); ?>
                    <?php echo $form->error($modelPago, 'telefono'); ?>
                </div>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'extension', array('class' => '')); ?>
                    <?php echo $form->numberField($modelPago, 'extension', array('maxlength' => 5, 'placeholder' => $modelPago->getAttributeLabel('extension'))); ?>
                    <?php echo $form->error($modelPago, 'extension'); ?>
                </div>
                <div class="ui-field-container">
                    <?php echo $form->labelEx($modelPago, 'celular', array('class' => '')); ?>
                    <?php echo $form->numberField($modelPago, 'celular', array('maxlength' => 20, 'placeholder' => $modelPago->getAttributeLabel('celular'))); ?>
                    <?php echo $form->error($modelPago, 'celular'); ?>
                </div>
            </fieldset>
            <?php $this->endWidget(); ?>
        </div>
    <?php else: ?>
        <div class="blockPago">
                <div class="ui-body-c">
                    <h2>Direcciones de despacho</h2>
                </div>
                <div data-role="collapsibleset" data-theme="a" data-content-theme="a" data-mini="true" id="collapsibleset-direcciones" data-iconpos="right">
                    <?php foreach ($listDirecciones as $idx => $model): ?>
                        <div id="div-direccion-radio-<?php echo $model->idDireccionDespacho ?>" class="direcItem">
                            <input type="radio" data-role="none" id="direccion-<?php echo $model->idDireccionDespacho ?>" name="FormaPagoForm[idDireccionDespacho]" class="checkDriec" value="<?php echo $model->idDireccionDespacho ?>" <?php echo ($modelPago->idDireccionDespacho == $model->idDireccionDespacho ? "checked" : "") ?>>
                            <div data-role="collapsible" id="collapsible-direccion-<?php echo $model->idDireccionDespacho ?>">
                                <h3><?php echo $model->descripcion ?></h3>
                                <div class="ui-content c_form_rgs ui-body-c">
                                    <?php $this->renderPartial('/usuario/_direccionForm', array('model' => $model)); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    <?php endforeach; ?>
                    <div data-role="collapsible" id="collapsible-direccion-crear" data-theme="n">
                        <h3>Adicionar direcci&oacute;n</h3>
                        <div class="ui-content c_form_rgs ui-body-c">
                            <?php $this->renderPartial('/usuario/_direccionForm', array('model' => new DireccionesDespacho)); ?>
                        </div>
                    </div>
                    <div id="FormaPagoForm_idDireccionDespacho_em_" class="has-error" style="display: none;"></div>
                </div>
        </div>
	<?php endif; ?>
<?php endif; ?>