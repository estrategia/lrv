<?php $modal = isset($modal) ? $modal : false ?>

<?php if ($modal): ?> 
    <div id="div-direcciones-lista">
        <?php $this->renderPartial('_d_direcciones', array('listDirecciones' => $listDirecciones, 'radio'=>true,'editar'=>false)) ?>
    </div>
<?php else: ?>
    <h3>Direcciones de despacho</h3>
    <?php echo CHtml::link('Adicionar direcci&oacute;n', "#", array('data-role' => 'direccion-adicionar-modal', 'data-vista' => 'direcciones', 'class' => 'btn btn-primary')); ?>
    <div id="div-direcciones-lista">
        <?php $this->renderPartial('_d_direcciones', array('listDirecciones' => $listDirecciones)) ?>
    </div>
<?php endif; ?>


