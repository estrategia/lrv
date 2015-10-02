<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="box-inner">
    <div class="box-header well">
        <div class="col-lg-1">
            <h2><i class="glyphicon glyphicon-shopping-cart"></i> Pedidos</h2>
        </div>
        <!-- <div class="box-icon"> -->
        <div class="col-lg-11">
            <?php $this->renderPartial('_pedidosCantidad', array('arrCantidadPedidos' => $arrCantidadPedidos)) ?>
        </div>
    </div>
    <div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'pager' => array(
                    'header' => '',
                    'firstPageLabel' => '&lt;&lt;',
                    'prevPageLabel' => 'Anterior',
                    'nextPageLabel' => 'Siguiente',
                    'lastPageLabel' => '&gt;&gt;',
                    'maxButtonCount' => 10
                ),
                'id' => 'pedidos-grid',
                //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
                //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
                //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
                'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
                'ajaxUrl' => $this->createUrl('pedidos', array('parametro' => $model->idEstadoCompra)),
                'dataProvider' => $dataProvider,
                //'rowCssClass'=>array('odd','even'),
                'rowCssClassExpression' => array($this, 'rowCssClassFunction'), //'$data->seguimiento==1?"seguimiento":"jajaj"',
                //'filter' => $model,
                'columns' => array(
                    array(
                        'header' => "",
                        'type' => 'raw',
                        'value' => array($this, 'gridDetallePedido'),
                    //'cssClassExpression' => '$data->seguimiento==1?"seguimiento":"jajaj"',
                    ),
                    array(
                        'header' => 'Agente',
                        'value' => '$data->objOperador == null ? "Sin Asignar" : $data->objOperador->nombre',
                    ),
                    array(
                        'header' => 'Origen',
                        'type' => 'raw',
                        'value' => array($this, 'gridOrigenPedido'),
                    ),
                    array(
                        'header' => 'Destino',
                        'type' => 'raw',
                        'value' => array($this, 'gridDestinoPedido'),
                    ),
                    array(
                        'header' => 'Fecha Compra',
                        'value' => '$data->fechaCompra',
                    ),
                    array(
                        'header' => 'Fecha Entrega',
                        'value' => '$data->fechaEntrega',
                    ),
                    array(
                        'header' => 'Ciudad',
                        'value' => '$data->objCiudad->nombreCiudad',
                    ),
                    array(
                        'header' => 'Tipo Venta',
                        'value' => '$data->objTipoVenta->tipoVenta',
                    ),
                    array(
                        'header' => 'Tipo Entrega',
                        'value' => 'Yii::app()->params->entrega["tipo"][$data->tipoEntrega]',
                    ),
                    array(
                        'header' => 'Pago',
                        'type' => 'raw',
                        'value' => array($this, 'gridPagoPedido'),
                    ),
                    array(
                        'header' => 'Tipo Usuario',
                        'value' => '$data->identificacionUsuario == null ? "Invitado" : "Registrado"',
                    ),
                    array(
                        'header' => 'PDV',
                        'value' => '$data->idComercial == null ? "Sin Asignar" : $data->idComercial',
                    ),
                    array(
                        'header' => 'Estado',
                        'type' => 'raw',
                        'value' => array($this, 'gridEstadoPedido'),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>

<?php
if ($model->idEstadoCompra == 1)
    Yii::app()->clientScript->registerScript(uniqid(), "setTimeout(function(){ location.reload(); }, " . Yii::app()->params->callcenter['pedidos']['tiempoRecargarPagina'] . ");"); ?>