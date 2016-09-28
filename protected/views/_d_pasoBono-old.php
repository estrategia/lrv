<?php if (empty($modelPago->bono)): ?>
	
    <div class="sold-out">
        <img class="ajustada" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/sold-out.png" alt="">
    </div>
    
    <!--  Codigos promocionales -->
    <?php if(!Yii::app()->user->isGuest):?>
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
    
   <div class="space-2"></div>
   <div class ="row">
   		<div class="col-md-3">
   			<label> Redimir c&oacute;digo</label>
   		</div>
   		<div class="col-md-8">
   			<?= CHtml::textField('codigoPromocional','',array('class' => 'form-control', 'placeholder' => 'Ingresa tu código aquí'))?>
   			<input type="hidden" id='FormaPagoForm-usoBonoPromocional' name="FormaPagoForm[usoBono][promocional]" value="0">
   		</div>
   </div>
   <div class="space-1"></div>
   <div class="bot-button">
   		<button type="button" id="btn-formas-pago" class="btn btn-danger btn-sm" data-toggle="modal" data-role="codigo-promocional">Usar c&oacute;digo</button>
   </div>
   
   <?php $this->endWidget(); ?>
   
   <?php endif;?>
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
   Tienes bonos promocionales listos para usar, no te quedes sin utilizarlos.
   <div class="space-1"></div>
   <div class="bot-button">
   		<button type="button" id="btn-formas-pago" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalMisBonos">Ver mis Bonos</button>
   </div>
   
   <!--  Codigos promocionales -->
   <div class="space-2"></div>
   <div class ="row">
   		<div class="col-md-3">
   			<label> Redimir c&oacute;digo</label>
   		</div>
   		<div class="col-md-8">
   			<?= CHtml::textField('codigoPromocional','',array('class' => 'form-control', 'placeholder' => 'Ingresa tu código aquí'))?>
   			<input type="hidden" id='FormaPagoForm-usoBonoPromocional' name="FormaPagoForm[usoBono][promocional]" value="0">
   		</div>
   </div>
   <div class="space-1"></div>
   <div class="bot-button">
   		<button type="button" id="btn-formas-pago" class="btn btn-danger btn-sm" data-toggle="modal" data-role="codigo-promocional">Usar c&oacute;digo</button>
   </div>
   
   <div id="modalMisBonos" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Mis bonos</h4>
                    </div>
                    <div class="modal-body">
					    <div class="bono">
					        <div class="scroll-div">
                     <div class="row" style="margin:0px;">
                      <div class="col-md-12">
                        <p class="text-center text-bold">Â¿Utilizar el bono?</p>
                      </div>
                    </div>

                    <?php foreach ($modelPago->bono as $idx => $bono): ?>
                    <div class="row" style="border-top: 1px solid #ccc;margin:0px;padding: 15px 0px 0px;">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <span class="result_bono"><?php echo $bono['concepto'] ?></span>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <span class="result_bono">* </span>Valor: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <span class="result_bono">* </span>V&aacute;lido hasta: <span class="result_bono"><?php echo $bono['vigenciaFin'] ?></span>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        
                      </div>
                    </div>
                    <div class="row" style="margin:0px;">
                      <div class="col-xs-12 col-sm-12 col-md-12" style="text-align:center;padding:10px 0px;">
                        <?php if ($bono['disponibleCompra'] && $bono['modoUso'] == 1): ?>
                           Usar bono en esta compra: <label><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_1" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1" <?php echo ($modelPago->usoBono[$idx] == 1 ? "checked" : "") ?>>Si</label>
                            <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_0" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0" <?php echo ($modelPago->usoBono[$idx] != 1 ? "checked" : "") ?>>No</label>
                         <?php elseif($bono['disponibleCompra'] && $bono['modoUso'] == 2): ?> 
                            <label><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_1" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1" checked disabled>Si</label>
                            <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_0" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0" disabled>No</label>
                            <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1">
                        <?php elseif($bono['modoUso'] == 1): ?>
                            <div style="text-decoration:underline;text-align:center;padding-bottom: 15px;">Disponible por compra superior a <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['minimoCompra'], Yii::app()->params->formatoMoneda['moneda']); ?></div>
                             <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0">
                        <?php else:?>    
                             <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0">
                        <?php endif; ?>                        
                      </div>
                    </div>
                    <?php endforeach; ?>
					      <!--       <table style="width:100%">
					               <tr>
					                    <td colspan="2" style="width:100%" class="text-center text-bold">Â¿Utilizar el bono?</td>
					                </tr> 
					                <?php foreach ($modelPago->bono as $idx => $bono): ?>
					                    <tr style="border-top: 1px solid #ccc;">
					                        <td style="width:60%">
					                            <div style="padding-bottom:10px;">
					                                <div><span class="result_bono"><?php echo $bono['concepto'] ?></span></div>
					                                <div><span class="result_bono">* </span>Valor: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
					                                <div>Vigencia inicial del bono: <span class="result_bono"><?php echo $bono['vigenciaInicio'] ?></span></div>
					                                <div>Vigencia final del bono: <span class="result_bono"><?php echo $bono['vigenciaFin'] ?></span></div>
					                            </div>
					                        </td> 

					                       <td class="text-center" style="width:40%">
					                            <?php if ($bono['disponibleCompra'] && $bono['modoUso'] == 1): ?>
					                                <label><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_1" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1" <?php echo ($modelPago->usoBono[$idx] == 1 ? "checked" : "") ?>>Si</label>
					                                <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_0" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0" <?php echo ($modelPago->usoBono[$idx] != 1 ? "checked" : "") ?>>No</label>
					                             <?php elseif($bono['disponibleCompra'] && $bono['modoUso'] == 2): ?> 
					                                <label><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_1" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1" checked disabled>Si</label>
					                                <label style="margin-left: 15px;"><input type="radio" id="FormaPagoForm_usoBono_<?= $idx ?>_0" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0" disabled>No</label>
					                                <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="1">
					                            <?php elseif($bono['modoUso'] == 1): ?>
					                                <div class="">Disponible por compra superior a <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['minimoCompra'], Yii::app()->params->formatoMoneda['moneda']); ?></div>
					                                 <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0">
					                            <?php else:?>    
					                                 <input type="hidden" name="FormaPagoForm[usoBono][<?= $idx ?>]" value="0">
					                            <?php endif; ?>
					                        </td> 
					                    </tr>
					                <?php endforeach; ?>
					            </table> -->
					        </div>
					        <div class="space-1"></div>
					        <?php echo $form->error($modelPago, 'usoBono', array('class' => 'text-danger')); ?>
					    </div>
    				</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    <?php $this->endWidget(); ?>
<?php endif; ?>


