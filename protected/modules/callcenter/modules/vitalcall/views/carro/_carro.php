<?php $listFormulas = array(); ?>
<!-- Vista Carro -->
<section>
    <div class="row">
        <div class="col-md-9 border-right">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="space-1"></div>
                            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar-vitalcall', 'class' => 'btn btn-default vitalcall', 'role' => "button")); ?>
                        </div>
                    </div>
                </div>
                <div class="space-1"></div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped tabla-carro">
                        <thead class="cabecera-tabla">
                            <tr>
                                <th  style="width: 27%;">Producto</th>
                                <th  style="width: 25%;">Cantidad</th>
                                <th  style="width: 15%;">Antes</th>
                                <th>Ahorro</th>
                                <th>Ahora</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (Yii::app()->shoppingCartVitalCall->getPositions() as $position): ?>
                                    <?php
                                    if ($position->isProduct()):
                                        $this->renderPartial('_carroElementoProducto', array(
                                            'position' => $position,
                                            'lectura' => false
                                        ));
                                    elseif ($position->isFormula()):
                                        $listFormulas[$position->objProductoFormula->idFormula]['objProductoFormula'] = $position->objProductoFormula;
                                        $listFormulas[$position->objProductoFormula->idFormula]['listPositions'][] = $position;
                                    endif;
                                    ?>
                            <?php endforeach; ?>
                            <?php foreach ($listFormulas as $arrFormula):?>
                            	<tr>
                            		<td colspan="6"><?= $arrFormula['objProductoFormula']->objFormulaVC->nombreMedico ?> - <?= $arrFormula['objProductoFormula']->objFormulaVC->institucion ?></td>
                            	</tr>
                            	<?php foreach ($arrFormula['listPositions'] as $position): ?>
                            		<?php
   	                                    $this->renderPartial('_carroElementoProducto', array(
                                            'position' => $position,
                                            'lectura' => false
                                        ));
                                    ?>
                            	<?php endforeach; ?>
                            <?php endforeach;?>
                        </tbody>
                    </table>




                    
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="space-1"></div>
                            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar-vitalcall', 'class' => 'btn btn-default vitalcall', 'role' => "button")); ?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-3 detalles">
            <h3>Detalles de la compra</h3>
            <span>Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></span><br>
            <span>Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></span><br>
            <?php if (Yii::app()->shoppingCartVitalCall->getExtraShipping() > 0): ?>
                <span>Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></span>
            <?php endif; ?>
            <h3>Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></h3>
            <?php if (Yii::app()->shoppingCartVitalCall->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCartVitalCall->getTaxPrice() > 0): ?>
                <span>Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></span><br/>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCartVitalCall->getDiscountPrice(true) > 0): ?>
                <span style="color:#EA0001;">Su ahorro  <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></span>
            <?php endif; ?>

                <div class="center">
                    <div class="space-1"></div>
                    <?php echo CHtml::link('Comprar', $this->createUrl('/callcenter/vitalcall/carro/pagar'), array('class' => 'btn btn-primary', 'role' => "button")); ?>
                </div>
        </div>
    </div>
</section>
