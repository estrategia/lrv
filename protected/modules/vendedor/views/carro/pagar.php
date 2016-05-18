<div class="steps">
    <ul>
        <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 1 ? "active" : "") ?>">
            <div class="iconStep step1"></div>
            <p>Tipo entrega</p>
        </li>
        <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 2 ? "active" : "") ?>">
            <div class="iconStep step2"></div>
            <p>Despacho</p>
        </li>
        <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 3 ? "active" : "") ?>">
            <div class="iconStep step3"></div>
            <p>Entrega</p>
        </li>
        <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 4 ? "active" : "") ?>">
            <div class="iconStep step4"></div>
            <p>Pago</p>
        </li>
        <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 5 ? "active" : "") ?>">
            <div class="iconStep step5"></div>
            <p>Confirmaci&oacute;n</p>
        </li>
    </ul>
</div>

<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="ui-content content-car">
    <?php $this->renderPartial('_paso' . Yii::app()->params->pagar['pasos'][$paso], $parametros); ?>
    <?php if ($pasoAnterior !== null): ?>
        <div class="ui-input-btn btnAtras ui-btn ui-corner-all ui-shadow ui-btn-n ">
            Atrás
            <span class="caretatras"></span>
            <input type="button" data-enhanced="true" value="Atras" id="btn-carropagar-anterior" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoAnterior ?>">
        </div>
    <?php endif; ?>
    <?php if ($pasoSiguiente !== null): ?>
        <div class="ui-input-btn btnContinuar ui-btn ui-corner-all ui-shadow ui-btn-r btn-wh">
            Continuar
            <span class="caretcontinuar"></span>
            <input type="button" data-enhanced="true" value="Continuar" id="btn-carropagar-siguiente" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoSiguiente ?>">
        </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>

