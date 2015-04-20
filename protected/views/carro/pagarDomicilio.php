<p>paso 1</p>
<p>paso 2</p>
<p>paso 3</p>
<p>paso 4</p>


<div>
    <?php $this->renderPartial('_paso' . Yii::app()->params->pagar['pasos'][$paso], $parametros); ?>
</div>

<?php if ($pasoAnterior !== null): ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-n">
        Atrás
        <input type="button" data-enhanced="true" value="Atras" id="btn-carropagar-anterior" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoAnterior ?>">
    </div>
<?php endif; ?>

<?php if ($pasoSiguiente !== null): ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Continuar
        <input type="button" data-enhanced="true" value="Continuar" id="btn-carropagar-siguiente" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoSiguiente ?>">
    </div>
<?php endif; ?>

