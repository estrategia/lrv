<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#compras-items-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="box-inner">
    <div class="box-header well">
        <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
            <h2><i class="glyphicon glyphicon-shopping-cart"></i> Pedidos</h2>
        </div>
        <!-- <div class="box-icon"> -->
        <div class="col-lg-11 col-md-11 col-sm-10 col-xs-9">
            <?php $this->renderPartial('_pedidosCantidad', array('arrCantidadPedidos' => $arrCantidadPedidos)) ?>
        </div>
        </div>
    </div>
    <div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'action'=>Yii::app()->createUrl($this->route),
                'method'=>'get',
            )); ?>
                <?php echo $form->dropDownList($model,'filtroCallcenter', ['1' => 'Pendientes Aceptación', '2' => 'Pendiente despacho', '3' => 'Pediente entrega'], ['class' => 'input-sm', 'empty' => 'Todos']); ?>
                <?php echo CHtml::submitButton('Filtrar'); ?>

            <?php $this->endWidget(); ?>

            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'compras-items-grid',
                'dataProvider'=>$model->searchTercerosCallcenter(),
                'filter'=>$model,
                'columns'=>array(
                    // 'idCompraItem',
                    // 'idCompra',
                    'codigoProducto',
                    'descripcion',
                    'presentacion',
                    'codigoProveedor',
                    [
                        'header' => 'Operador logistico',
                        'value' => function ($model) {
                            return $model->operadorLogisticoTerceros->nombre;
                        },
                        'filter' => CHtml::activeTextField($model, 'idOperadorLogistico')
                    ],

                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{view}',
                        'buttons' => array(
                            'view' => [
                                'label' => 'Detalle',
                                'url' => function($data) {
                                    return Yii::app()->controller->createUrl('admin/detallepedido/', ['pedido' => $data->idCompra]);
                                }
                            ],
                        )
                    ),
                ),
            )); ?>
        </div>
    </div>
</div>
