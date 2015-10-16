<section>
    <div class="container">
        <div class="col-md-12">
            <div class="steps">
                <ul>
                    <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 1 ? "active" : "") ?> border-solid-right">
                        <div class="iconStep step1"></div>
                        <div class="text"><p>1.Despacho</p></div>
                    </li>
                    <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 2 ? "active" : "") ?> border-solid-right">
                        <div class="iconStep step2"></div>
                        <div class="text"><p>&nbsp;2.Entrega</p></div>
                    </li>

                    <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 3 ? "active" : "") ?> border-solid-right">
                        <div class="iconStep step3"></div>
                        <div class="text"><p>3.Pago</p></div>
                    </li>

                    <li class="<?php echo (Yii::app()->params->pagar['pasos'][$paso] == 4 ? "active" : "") ?>">
                        <div class="iconStep step4"></div>
                        <div class="text"><p>4.Confirmación</p></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<section>
    <div class="container">
        <div class="col-md-12 desplegables">
            <?php $this->renderPartial('_d_paso' . Yii::app()->params->pagar['pasos'][$paso], $parametros); ?>

            <div class="col-md-12">
                <?php if ($pasoAnterior !== null): ?>
                    <div class="col-md-3"><button class="editar" id="btn-carropagar-anterior" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoAnterior ?>">Anterior</button></div>
                <?php endif; ?>
                <?php if ($pasoSiguiente !== null): ?>
                    <div class="col-md-3"><button class="adicionar" id="btn-carropagar-siguiente" data-origin="<?php echo $paso ?>" data-redirect="<?php echo $pasoSiguiente ?>">Siguiente</button></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="sep2"></div>
        </div>
    </div>
</section>

<div id="div-carro">
    <?php $this->renderPartial('_d_carro', array('lectura' => ($nPasoActual >= Yii::app()->params->pagar['pasos']['pago']) )); ?>
</div>

