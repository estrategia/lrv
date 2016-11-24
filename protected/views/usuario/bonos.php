<div class="ui-content ui-body-c">
    <h2>Bonos</h2>
    <?php if (empty($bonos)): ?>
        <p>No tiene bonos vigentes</p>
    <?php else: ?>
        <?php foreach ($bonos as $idx => $bono): ?>
            <div class="ui-field-container contentPaso3 ui-bar ui-bar-a ui-corner-all">
                <div><strong>Tipo de bono:</strong> <span class="result_bono"><?php echo $bono['concepto'] ?></span></div>
                <div><strong>Valor de bono:</strong> <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                <div><strong>M&iacute;nimo compra:</strong> <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['minimoCompra'], Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                <div><strong>Vigencia inicial del bono:</strong> <span class="result_bono"><?php echo $bono['vigenciaInicio'] ?></span></div>
                <div><strong>Vigencia final del bono:</strong> <span class="result_bono"><?php echo $bono['vigenciaFin'] ?></span></div>
            </div>
            <div class="space-1"></div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>