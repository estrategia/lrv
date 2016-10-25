<h4>Productos del pedido</h4>
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
        <?php $listCombos = array(); ?>
        
    
        <?php foreach (Yii::app()->shoppingCartNationalSale->getPositions() as $position): ?>
     			 <?php if ($position->getDelivery() == 0 && $position->getShipping() == 0): ?>
                          <?php
								if ($position->isProduct ()) :
									if ($position->getQuantityStored () > 0)
										$listPositionBodega [] = $position;
										$this->renderPartial ( '/carro/_d_carroElementoProducto', array (
												'position' => $position,
											//	'lectura' => $lectura 
									) );
									 elseif ($position->isCombo ()) :
										$this->renderPartial ( '/carro/_d_carroElementoCombo', array (
												'position' => $position,
											//	'lectura' => $lectura 
									) );
								endif;?>
                  <?php else: $listPositionDelivery[] = $position?>
                  <?php endif; ?>
       
		        <?php endforeach; ?>
			        <tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th><strong>Subtotal</strong></th>
						<th style="text-align: right;"><span><?php //echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
					</tr>
				</tbody>
			</table>
			</div>
		</div>