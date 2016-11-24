<div class="form-group">
     <form id="form-busqueda-criterio" class="form-inline" method="post">
      <div class="row">
            <div class="col-xs-2">
                <label for="FormBusqueda_criterio">Criterio de búsqueda</label>
            </div>
            <div class="col-xs-2">
                <?php echo CHtml::dropDownList('FormBusqueda[criterio]', isset($form['criterio'])?$form['criterio']:'', array(1 => 'Nombre del cliente', 2 => 'Cédula del cliente', 3 => '#Pedido', 4=>'Punto de venta'), array('id' => 'FormBusqueda_criterio', 'class' => "form-control",'style'=>'width:100%')) ?>
            </div>
            <div class="col-xs-2">
                <input type="text" style="width:100%" class="form-control input-sm" id="FormBusqueda_valorCriterio" name="FormBusqueda[valorCriterio]" value='<?php echo isset($form['valorCriterio'])?$form['valorCriterio']:''?>'>
            </div>
                <input type="hidden" name="FormBusqueda[tipo]" value="criterio">
            <div class="col-xs-1">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-search"></i>
                    Buscar
                </button>
            </div>  
      </div>
      </form>
</div>

<?php $listDataEstado = CHtml::listData(EstadoCompra::listData(), 'idEstadoCompra', 'compraEstado'); ?>
<div class="form-group">
    <form id="form-busqueda-operador" class="form-inline" method="post">
        <div class="row">
            <div class="col-xs-2">
                <label for="FormBusqueda_operador">Búsqueda por operador</label>
            </div>
            <?php 
                $estado=$operador="";
                if($form!=null){
                    if($form['tipo']=="operador"){
                        $estado=$form['estado'];
                        $operador=$form['operador'];
                    }
                }
            ?>
            <div class="col-xs-2">
                <?php echo CHtml::dropDownList('FormBusqueda[operador]', $operador, CHtml::listData(Operador::listData(), 'idOperador', 'nombre'), array('id' => 'FormBusqueda_operador', 'class' => "form-control",'style'=>'width:100%')) ?>
            </div>
            <div class="col-xs-2">
                <?php echo CHtml::dropDownList('FormBusqueda[estado]', $estado, $listDataEstado, array('id' => 'FormBusqueda_estado', 'class' => "form-control",'style'=>'width:100%')) ?>
            </div>
            <div class="col-xs-1">
                <input type="hidden" name="FormBusqueda[tipo]" value="operador">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-search"></i>
                    Buscar
                </button>
            </div>
        </div>
    </form>
</div>
<div class="form-group">
    <form id="form-busqueda-estado" class="form-inline" method="post">
    <div class="row">
            <div class="col-xs-2">
                <label for="FormBusqueda_estado">Búsqueda por estado</label>
            </div>
             <?php 
                $estado="";
                if($form!=null){
                    if($form['tipo']=="estado"){
                        $estado=$form['estado'];
                    }
                }
            ?>
            <div class="col-xs-2">
                <?php echo CHtml::dropDownList('FormBusqueda[estado]', $estado, $listDataEstado, array('id' => 'FormBusqueda_estado', 'class' => "form-control",'style'=>'width:100%')) ?>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-1">
                <input type="hidden" name="FormBusqueda[tipo]" value="estado">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-search"></i>
                    Buscar
                </button>    
            </div>
    </div>
    </form>
</div>

<?php if ($model !== null): ?>
    <div class="row">
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
                'ajaxUrl' => $this->createUrl('pedidos', array('parametro' => 'busqueda')),
                'dataProvider' => $model->searchBusqueda($form),
                //'dataProvider' => $model->searchBusqueda(array('order' => 't.seguimiento DESC, t.fechaCompra DESC', 'operadorPedido' => true)),
                //'rowCssClass'=>array('odd','even'),
                'rowCssClassExpression' => array($model, 'gridRowCssClassFunction'), //'$data->seguimiento==1?"seguimiento":"jajaj"',
                //'filter' => $model,
                'columns' => array(
                    array(
                        'header' => "",
                        'type' => 'raw',
                        'value' => array($model, 'gridDetallePedido'),
                    //'cssClassExpression' => '$data->seguimiento==1?"seguimiento":"jajaj"',
                    ),
                    array(
                        'header' => 'Agente',
                        'value' => '$data->objOperador == null ? "Sin Asignar" : $data->objOperador->nombre',
                    ),
                    array(
                        'header' => 'Origen',
                        'type' => 'raw',
                        'value' => array($model, 'gridOrigenPedido'),
                    ),
                    array(
                        'header' => 'Destino',
                        'type' => 'raw',
                        'value' => array($model, 'gridDestinoPedido'),
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
                        'value' => array($model, 'gridPagoPedido'),
                    ),
                    array(
                        'header' => 'PDV',
                        'value' => '$data->idComercial == null ? "Sin Asignar" : $data->idComercial',
                    ),
                    array(
                        'header' => 'Estado',
                        'type' => 'raw',
                        'value' => array($model, 'gridEstadoPedido'),
                    ),
                ),
            ));
            ?>
    </div>

<?php endif; ?>

