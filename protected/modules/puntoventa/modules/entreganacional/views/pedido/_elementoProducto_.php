<?php if ($objProducto->fraccionado == 1): ?>
    <tr>
        <td rowspan="2"><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen() ?>" title="<?php echo $objProducto->descripcionProducto ?>"> </td>
        <td rowspan="2"><?php echo $objProducto->codigoProducto ?></td>
        <td rowspan="2"><?php echo $objProducto->descripcionProducto . "<br>" . $objProducto->presentacionProducto ?></td>
        <td><div class="col-xs-8"> 
        	<input type="text" class="form-control" value="1" id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>">
        	</div></td>
        <td>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProducto->objImpuesto->porcentaje) ?> IVA
        </td>
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td><?php echo $saldos; ?></td>
        <td rowspan="2">
            <?php echo CHtml::link('Agregar', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 1, 'class' => 'btn btn-primary')); ?>
        </td>

    </tr>
    <tr>
        <td> 
            <span style="font-size: 10px; "> U.M.V</span>
            <?php if ($objProducto->objMedidaFraccion !== null): ?>
                <br>
                <span style="font-size: 10px; "><?php echo $objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objProducto->unidadFraccionamiento ?></span>
            <?php endif; ?>
            <br>
            <div class="col-xs-8"> 
            	<input type="text" class="form-control" value="0" id="cantidad-producto-fraccion-<?php echo $objProducto->codigoProducto ?>">
            </div>
        </td>
        <td>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProducto->objImpuesto->porcentaje) ?> IVA
        </td>
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_FRACCION), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
<?php else: ?>
    <tr>
        <td><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen() ?>" title="<?php echo $objProducto->descripcionProducto ?>"> </td>
        <td><?php echo $objProducto->codigoProducto ?></td>
        <td><?php echo $objProducto->descripcionProducto . "<br>" . $objProducto->presentacionProducto ?></td>
        <td> <div class="col-xs-8"> 
        		<input type="text" class="form-control" value="1" id="cantidad-producto-unidad-<?php echo $objProducto->codigoProducto ?>"></div></td>
        <td>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objProducto->objImpuesto->porcentaje) ?> IVA
        </td>
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td><?php echo $saldos; ?></td>
        <td>
            <?php echo CHtml::link('Agregar', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 1, 'class' => 'btn btn-primary')); ?>
        </td>
    </tr>
<?php endif; ?>