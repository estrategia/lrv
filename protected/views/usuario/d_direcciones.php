<h3>Direcciones de despacho</h3>

<?php echo CHtml::link('Adicionar direcci&oacute;n', "#", array('data-role' => 'direccion-adicionar-modal', 'data-vista' => 'direcciones', 'class' => 'btn btn-primary adicionar')); ?>

<div id="div-direcciones-lista">
    <?php $this->renderPartial('_d_direcciones', array('listDirecciones' => $listDirecciones)) ?>
</div>