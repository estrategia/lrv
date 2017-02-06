<?php if (empty($modelPago->bono)): ?>

    
        <!--  Codigos promocionales -->
        <?php if (!Yii::app()->user->isGuest): ?>
            <?php
								$form = $this->beginWidget ( 'CActiveForm', array (
										'id' => 'form-pago-bono',
										'enableClientValidation' => true,
										'errorMessageCssClass' => 'has-error',
										'clientOptions' => array (
											'validateOnSubmit' => true,
											'validateOnChange' => true,
											'errorCssClass' => 'has-error',
											'successCssClass' => 'has-success' 
								) 
							) );
			?>
				<div id='uso-codigo-div'>
           			<strong>&iquest;Tienes un c&oacute;digo promocional?</strong>  <a href="#" type="button" class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#modal-promocional">Usalo aqu&iacute;</a>
				</div>
					<!-- Modal -->
					<div id="modal-promocional" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Ingresa tu c&oacute;digo promocional para obtener tu descuento</h4>
					      </div>
					      <div class="modal-body">
					        <div class ="row">
						        
						        <div class="col-md-8 col-md-offset-2">
						            <?= CHtml::textField('codigoPromocional', '', array('class' => 'form-control')) ?>
						            <label id='usoCodigo'></label>
						            <input type="hidden" id='FormaPagoForm-usoBonoPromocional' disabled name="FormaPagoForm[usoBono][promocional]" value="0">
						        </div>
						       
						    </div>
					      </div>
					      <div class="modal-footer">
					           <button type="button" id="btn-formas-pago" class="btn btn-danger btn-sm" data-toggle="modal" data-role="codigo-promocional">Usar c&oacute;digo</button>
						    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					      </div>
					    </div>
					
					  </div>
					</div>	
					<div class="space-2"></div>

            <?php $this->endWidget(); ?>
		<?php else:?>
		 <div class="sold-out">
			<img class="ajustada" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/sold-out.png" alt="">
		</div>		
        <?php endif; ?>

<?php else: ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-pago-bono',
        'enableClientValidation' => true,
        'errorMessageCssClass' => 'has-error',
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
            'errorCssClass' => 'has-error',
            'successCssClass' => 'has-success',
        ))
    );
    ?>
    
					<!-- Modal -->
					<div id="modal-promocional" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Ingresa tu c&oacute;digo promocional para obtener tu descuento</h4>
					      </div>
					      <div class="modal-body">
					        <div class ="row">
						        <div class="col-md-8 col-md-offset-2">
						            <?= CHtml::textField('codigoPromocional', '', array('class' => 'form-control')) ?>
						            <label id='usoCodigo'></label>
						            <input type="hidden" id='FormaPagoForm-usoBonoPromocional' disabled name="FormaPagoForm[usoBono][promocional]" value="0">
						        </div>
						       
						    </div>
					      </div>
					      <div class="modal-footer">
					           <button type="button" id="btn-formas-pago" class="btn btn-danger btn-sm" data-toggle="modal" data-role="codigo-promocional">Usar c&oacute;digo</button>
						    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					      </div>
					    </div>
					
					  </div>
					</div>
				    <!--  Codigos promocionales -->
				 
       				<div class="bono">
                        <div class="<?= (count($modelPago->bono)>3 ? "scroll-div" : "padding-div") ?>">
                            <div class="row" style="margin:0px;">
                                <div class="col-md-12">
                                    <div class="text-center text-bold">
	                                    <div id='uso-codigo-div'>
										 	<strong>&iquest;Tienes un c&oacute;digo promocional?</strong> <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-promocional">Usalo aqu&iacute;</a>
										</div>
									</div>
                                </div>
                            </div>

                            <?php foreach ($modelPago->bono as $idx => $bono): ?>
                                <div class="row" style="border-top: 1px solid #ccc;margin:0px;padding: 1px 0px 0px;">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <span class="result_bono"><?php echo $bono['concepto'] ?></span>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-5">
                                        <span class="result_bono">* </span>Valor: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-7">
                                        <span class="result_bono">* </span>V&aacute;lido hasta: <span class="result_bono"><?php echo $bono['vigenciaFin'] ?></span>
                                    </div>
                                   
                                </div>
                                <div class="row" style="margin:0px;">
                                    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align:center;padding:0px 0px;">
                                        <?php if ($bono['disponibleCompra'] && $bono['modoUso'] == 1): ?>
                                            Usar bono en esta compra: <label><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_1" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1" <?php echo ($modelPago->usoBono[$idx] == 1 ? "checked" : "") ?>>Si</label>
                                            <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_0" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0" <?php echo ($modelPago->usoBono[$idx] != 1 ? "checked" : "") ?>>No</label>
                                        <?php elseif ($bono['disponibleCompra'] && $bono['modoUso'] == 2): ?> 
                                            <label><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_1" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1" checked disabled>Si</label>
                                            <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_0" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0" disabled>No</label>
                                            <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1">
                                        <?php elseif ($bono['modoUso'] == 1): ?>
                                            <div style="text-decoration:underline;text-align:center;padding-bottom: 1px;">Disponible por compra superior a <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['minimoCompra'], Yii::app()->params->formatoMoneda['moneda']); ?></div>
                                            <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0">
                                        <?php else: ?>    
                                            <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0">
                                        <?php endif; ?>                        
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="space-1"></div>
                        <?php echo $form->error($modelPago, 'usoBono', array('class' => 'text-danger')); ?>
                    </div>
    <?php $this->endWidget(); ?>
<?php endif; ?>


