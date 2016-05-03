<?php if (isset($bonos) && count($bonos) > 0): ?>
    <div data-role="collapsibleset">
        <?php foreach ($bonos as $idx => $bono): ?>
            <div data-role="collapsible">
                <h3>Tipo de bono: <span class="result_bono"><?php echo $bono['concepto'] ?></span></h3>
                <div style="padding-bottom:10px;">
                    <div>Valor de bono: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                    <div>Vigencia inicial del bono: <span class="result_bono"><?php echo $bono['vigenciaInicio'] ?></span></div>
                    <div>Vigencia final del bono: <span class="result_bono"><?php echo $bono['vigenciaFin'] ?></span></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>



<?php endif; ?>
