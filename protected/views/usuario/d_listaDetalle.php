
<div class="row">
    <div class="col-md-12">
        <?php echo CHtml::link('Configurar recordación', "#", array('class' => 'btn btn-default', 'data-toggle'=>"modal", 'data-target'=>"#modal-lista-personal")); ?>
        <?php $this->renderPartial('d_listaForm', array('model' => $model, "modal" => true)); ?>
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
<div class="row">
    <div class="col-md-12">
        <?php if (!empty($model->listDetalle)): ?>
            <?php if (Yii::app()->shoppingCart->getSectorCiudad() == null): ?>
                <?php echo CHtml::link('Consultar precio', '#popup-consultarprecio', array('data-rel' => "popup", 'class' => 'btn btn-default')); ?>
            <?php else: ?>
                <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "listapersonal", "data-lista" => $model->idLista, 'class' => 'btn btn-default', 'data-ajax' => "false")); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php echo CHtml::link('Volver a listas personales', CController::createUrl('/usuario/listapersonal'), array('class' => 'btn btn-default', 'data-ajax'=>"false")); ?>
    </div>
</div>
        
<?php /* ?>
<?php if (Yii::app()->shoppingCart->getSectorCiudad() == null): ?>
    <div data-role="popup" id="popup-consultarprecio" data-dismissible="false" data-theme="a" data-position-to="window" class="c_lst_pop_cont">
        <a href="#" data-rel="back" class="btn btn-default">Close</a>
        <div data-role="main">
            <div data-role="content">
                <h2>Seleccionar ubicación para consultar precio</h2>
                <?php echo CHtml::link('Seleccionar ubicación', $this->createUrl('/sitio/ubicacion'), array('class' => 'btn btn-default', 'data-ajax' => 'false')); ?>
                <?php echo CHtml::link('Cerrar', '#', array('class' => 'btn btn-default', 'data-rel' => 'back')); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php */ ?>

