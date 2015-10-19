
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

            <?php if (!empty($model->listDetalle)): ?>
                <?php if (Yii::app()->shoppingCart->getSectorCiudad() == null): ?>
                    <?php echo CHtml::link('Consultar precio', '#popup-consultarprecio', array('data-rel' => "popup", 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
                <?php else: ?>
                    <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "listapersonal", "data-lista" => $model->idLista, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>
                <?php endif; ?>
            <?php endif; ?>
    </div>
</div>
        
    
<?php echo CHtml::link('Volver a listas personales', CController::createUrl('/usuario/listapersonal'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-ajax'=>"false")); ?>

<?php if (Yii::app()->shoppingCart->getSectorCiudad() == null): ?>
    <div data-role="popup" id="popup-consultarprecio" data-dismissible="false" data-theme="a" data-position-to="window" class="c_lst_pop_cont">
        <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
        <div data-role="main">
            <div data-role="content">
                <h2>Seleccionar ubicación para consultar precio</h2>
                <?php echo CHtml::link('Seleccionar ubicación', $this->createUrl('/sitio/ubicacion'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
                <?php echo CHtml::link('Cerrar', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-mini' => 'true', 'data-rel' => 'back')); ?>
            </div>
        </div>
    </div>
<?php endif; ?>


