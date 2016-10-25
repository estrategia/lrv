<tr>
    <td><img src="<?php echo Yii::app()->request->baseUrl . $objCombo->rutaImagen() ?>" title="<?php echo $objCombo->descripcionCombo ?>"> </td>
    <td><?php echo $objCombo->idCombo ?></td>
    <td><?php echo $objCombo->descripcionCombo ?></td>
    <td><input type="text" class="inputmini" value="1" id="cantidad-combo-<?php echo $objCombo->idCombo ?>"></td>
    <td>
        <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?>
    </td>
    <td>NA</td>
    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td>
        <?php echo CHtml::link('Agregar', '#', array('data-combo' => $objCombo->idCombo, 'data-cargar' => 2, 'class' => 'btn btn-primary')); ?>
    </td>
</tr>