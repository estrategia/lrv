<div class="row">
    <form id="form-busqueda-criterio" class="form-inline" method="post">
        <div class="form-group">
            <label for="FormBusqueda_criterio">Criterio de búsqueda</label>
            <?php echo CHtml::dropDownList('FormBusqueda[criterio]', '', array(1 => 'Nombre del cliente', 2 => 'Cédula del cliente', 3 => '#Pedido', 4=>'Punto de venta'), array('id' => 'FormBusqueda_criterio', 'class' => "form-control input-sm")) ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control input-sm" id="FormBusqueda_valorCriterio" name="FormBusqueda[valorCriterio]">
        </div>
        <input type="hidden" name="FormBusqueda[tipo]" value="criterio">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="glyphicon glyphicon-search"></i>
            Buscar
        </button>
    </form>
</div>

<?php $listDataEstado = CHtml::listData(EstadoCompra::listData(), 'idEstadoCompra', 'compraEstado'); ?>

<div class="row">
    <form id="form-busqueda-operador" class="form-inline" method="post">
        <div class="form-group">
            <label for="FormBusqueda_operador">Búsqueda por operador</label>
            <?php echo CHtml::dropDownList('FormBusqueda[operador]', '', CHtml::listData(Operador::listData(), 'idOperador', 'nombre'), array('id' => 'FormBusqueda_operador', 'class' => "form-control input-sm")) ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::dropDownList('FormBusqueda[estado]', '', $listDataEstado, array('id' => 'FormBusqueda_estado', 'class' => "form-control input-sm")) ?>
        </div>
        <input type="hidden" name="FormBusqueda[tipo]" value="operador">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="glyphicon glyphicon-search"></i>
            Buscar
        </button>
    </form>
</div>

<div class="row">
    <form id="form-busqueda-estado" class="form-inline" method="post">
        <div class="form-group">
            <label for="FormBusqueda_estado">Búsqueda por estado</label>
            <?php echo CHtml::dropDownList('FormBusqueda[estado]', '', $listDataEstado, array('id' => 'FormBusqueda_estado', 'class' => "form-control input-sm")) ?>
        </div>
        <input type="hidden" name="FormBusqueda[tipo]" value="estado">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="glyphicon glyphicon-search"></i>
            Buscar
        </button>
    </form>
</div>

<?php if ($model !== null): ?>
    <div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'pedidos-grid',
                //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
                //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
                //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
                'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
                'ajaxUrl' => $this->createUrl('pedidos', array('parametro' => 'busqueda')),
                'dataProvider' => $model->searchBusqueda($form),
                //'dataProvider' => $model->searchBusqueda(array('order' => 't.seguimiento DESC, t.fechaCompra DESC', 'operadorPedido' => true)),
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
                        'header' => 'Sucursal',
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

<?php endif; ?>

