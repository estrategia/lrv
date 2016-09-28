<div class="container">
    <h2>Carro de compras</h2>
    <?php $mensajes = Yii::app()->user->getFlashes(); ?>
    <?php if ($mensajes): ?>
        <ul class="messages">
            <?php foreach ($mensajes as $idx => $mensaje): ?>
                <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (Yii::app()->shoppingCartVitalCall->isEmpty()): ?>
        Carro vac&iacute;o
    <?php else: ?>
        <?php $this->renderPartial('_carro'); ?>
    <?php endif; ?>
</div>