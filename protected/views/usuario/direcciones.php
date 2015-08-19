<div class="ui-body-c">
    <h2>Direcciones de despacho</h2>
</div>

<?php echo CHtml::link('Adicionar direcci&oacute;n', "#", array('data-role' => 'direccion-adicionar-modal', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-mini' => 'true')); ?>

<div id="div-direcciones-lista">
    <?php $this->renderPartial('_direcciones', array('listDirecciones' => $listDirecciones)) ?>
</div>