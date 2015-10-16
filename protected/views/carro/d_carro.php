<div class="ui-content">
    <h2>Carro de compras</h2>

    <?php $mensajes = Yii::app()->user->getFlashes(); ?>
    <?php if ($mensajes): ?>
        <ul class="messages">
            <?php foreach ($mensajes as $idx => $mensaje): ?>
                <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (Yii::app()->shoppingCart->isEmpty()): ?>
        <?php $this->renderPartial('carroVacio'); ?>
    <?php else: ?>
        <?php $this->renderPartial('_d_carro', array('lectura'=>false)); ?>
    <?php endif; ?>
</div>