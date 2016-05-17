
<br/><br/><br/>
<table class="table table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Valor</th>
            <th>Vigencia</th>
            <th>Comentario</th>
            <th>Estado bono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bono as $row): ?>
            <tr>
                <td ><?php echo $row->CEDULA ?></td>
                <td><?php echo $row->NOMBRE ?></td>
                <td style="text-align: right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $row->VALOR_BONO, Yii::app()->params->formatoMoneda['moneda']);  ?></td>
                <td><?php echo $row->VIGENCIA_INICIO . " - " . $row->VIGENCIA_FINA ?></td>
                <td><?php echo (($row->BONO_ACTIVO == 0 && $row->ESTADO == 1) ? CHtml::textArea('comentario', '', array( 'class' => 'form-control')): '') ?></td>
                <td><?php echo ($row->BONO_ACTIVO == 1 ? 'Activo' : 'Inactivo') ?></td>
                <td><?php echo (($row->BONO_ACTIVO == 0 && $row->ESTADO == 1) ?  CHtml::link('Activar','#', array( 'class' => 'btn btn-success', 'data-role' => 'activar-bono', 'data-identificacion' => $row->CEDULA, 'data-valor' => $row->VALOR_BONO) )
              : '' )?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>