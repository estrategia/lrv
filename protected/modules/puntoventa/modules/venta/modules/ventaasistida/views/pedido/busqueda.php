<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="box-inner">
    <div class="box-header well">
        <div class="col-lg-1">
            <h2><i class="glyphicon glyphicon-shopping-cart"></i> Pedidos</h2>
        </div>
        <!-- <div class="box-icon"> -->
        <div class="col-lg-11">
            <?php $this->renderPartial('_pedidosCantidad', array('arrCantidadPedidos' => $arrCantidadPedidos)) ?>
        </div>
    </div>
    <div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <?php $this->renderPartial('_busqueda', array('model' => $model, 'form' => $form)) ?>
        </div>
    </div>
</div>
