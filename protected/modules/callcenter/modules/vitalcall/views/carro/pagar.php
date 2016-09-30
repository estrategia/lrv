<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<section>
    <div class="container-fluid" id="pasos-pago">
        <div class="row">
            <div class="col-md-12">
                <?php $this->renderPartial('_paso' . Yii::app()->params->vitalCall['pagar']['pasos'][$paso], $parametros); ?>
            </div>
        </div>
    </div>
</section>
