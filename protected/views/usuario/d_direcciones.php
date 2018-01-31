<?php $modal = isset($modal) ? $modal : false ?>

<?php if ($modal): ?>
    <div id="div-direcciones-lista">
        <?php $this->renderPartial('_d_direcciones', array('listDirecciones' => $listDirecciones, 'radio'=>true,'editar'=>false)) ?>
    </div>
<?php else: ?>
  <div class="mi-cuenta interna-cuenta">
    <div class="bg-w ">
      <h3 class="t-change-dir">Tus direcciones de despacho</h3>
      <?php echo CHtml::link('Adiciona direcci&oacute;n', "#", array('data-role' => 'direccion-adicionar-modal', 'data-vista' => 'direcciones', 'class' => 'btn btn-primary')); ?>
      <div id="div-direcciones-lista">
          <?php $this->renderPartial('_d_direcciones', array('listDirecciones' => $listDirecciones)) ?>
      </div>
    </div>
  </div>
<?php endif; ?>
