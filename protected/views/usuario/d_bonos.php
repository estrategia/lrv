<div class="mi-cuenta interna-cuenta seccion-bonos">
  <div class="bg-w ">
    <h3 class="t-change-dir">Tus bonos promocionales</h3>
    <?php if (empty($bonos)): ?>
        <p>No tiene bonos vigentes</p>
    <?php else: ?>
        <?php foreach ($bonos as $idx => $bono): ?>
            <div class="bonos-promocionales">
                <p>Tipo de bono: <span class="result_bono"><?php echo $bono['concepto'] ?></span></p>
                <p>Valor de bono: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span></p>
                <p>M&iacute;nimo compra: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['minimoCompra'], Yii::app()->params->formatoMoneda['moneda']); ?></span></p>
                <p>Vigencia inicial del bono: <span class="result_bono"><?php echo $bono['vigenciaInicio'] ?></span></p>
                <p>Vigencia final del bono: <span class="result_bono"><?php echo $bono['vigenciaFin'] ?></span></p>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
