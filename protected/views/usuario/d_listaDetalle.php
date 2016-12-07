<?php $this->renderPartial('d_listaForm', array('model' => $model, "modal" => true)); ?>

<div class="row">
    <div class="col-md-12">
        <?php if (!empty($model->listDetalle)): ?>
            <?php if ($this->objSectorCiudad == null): ?>
                <?php echo CHtml::link('Consultar precio', $this->createUrl('/sitio/ubicacion'), array('class' => 'btn btn-primary')); ?>
            <?php else: ?>
                <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "listapersonal", "data-lista" => $model->idLista, 'class' => 'btn btn-primary')); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php echo CHtml::link('Configurar recordación', "#", array('class' => 'btn btn-default', 'data-toggle' => "modal", 'data-target' => "#modal-lista-personal")); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Productos de la lista</h3>

        <div id="div-listadetalle">
            <?php $this->renderPartial('_d_listaDetalle', array('model' => $model)); ?>
        </div>
    </div>
</div>