<h3>Direcciones de despacho</h3>

<?php echo CHtml::link('Adicionar direcci&oacute;n', "#", array('data-role' => 'direccion-adicionar-modal', 'data-pagoexpress' => false, 'class' => 'btn btn-primary')); ?>

<div id="div-direcciones-lista">
    <?php $this->renderPartial('_d_direcciones', array('listDirecciones' => $listDirecciones)) ?>
</div>