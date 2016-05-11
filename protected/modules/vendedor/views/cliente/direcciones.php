<?php $editar = isset($editar) ? $editar : true; ?>

<div class="ui-body-c">
    <h2 style="color:#fff;">Direcciones de despacho</h2>
</div>

<?php if ($editar): ?>
    <?php echo CHtml::link('Adicionar direcci&oacute;n', "#", array('data-role' => 'direccion-adicionar-modal', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r btn-y', 'data-mini' => 'true')); ?>
<?php endif; ?>

<div id="div-direcciones-lista">
    <?php $this->renderPartial('_direcciones', array('listDirecciones' => $listDirecciones, 'editar'=>$editar)) ?>
</div>