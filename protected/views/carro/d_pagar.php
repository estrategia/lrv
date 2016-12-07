<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php $this->renderPartial('_d_paso' . Yii::app()->params->pagar['pasosDesktop'][$paso], $parametros); ?>
            </div>
        </div>
    </div>
</section>
