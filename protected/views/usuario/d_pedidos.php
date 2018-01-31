<div class="mi-cuenta interna-cuenta">
  <div class="bg-w ">
    <h3 class="t-change-dir" style="margin-bottom:0;">Listado de tus pedidos</h3>
    <?php
      $this->widget('application.widgets.PedidosGridView', array(
          'pager' => array(
              'header' => '',
              'firstPageLabel' => '&lt;&lt;',
              'prevPageLabel' => '<<',
              'nextPageLabel' => '>>',
              'lastPageLabel' => '&gt;&gt;',
              'maxButtonCount' => 8
          ),
          //'template'=>'{pager}\n{items}\n{pager}',
          'id' => 'grid-cuenta-listapedidos',
          'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
          'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide();}"),
          'ajaxUpdateError' => new CJavaScriptExpression("function() { Loading.hide(); alert('Error, intente de nuevo');}"),
          'dataProvider' => $model->search(array('order' => "t.fechaCompra DESC", 'pageSize' => 5)),
          //'columnToggle' => true,
          //'toggleText' => 'Columnas..',
          //'itemsCssClass' => 'items ui-responsive',
          'columns' => array(
              array(
                  'header' => '#',
                  'type' => 'raw',
                  'value' => array($this, 'gridPedido'),
              ),
              array(
                  'header' => 'Total',
                  'type' => 'raw',
                  'value' => ' \'Total de tu compra: <span class="precio-total">\' . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda["patron"], $data->totalCompra, Yii::app()->params->formatoMoneda["moneda"]) . \'</span>\'',
              ),
              /*array(
                  'headerHtmlOptions' => array('data-priority' => 1),
                  'header' => 'Ciudad',
                  'value' => '$data->objCiudad->nombreCiudad',
              ),*/

              /*array(
                  'name' => 'idEstadoCompra',
                  'type' => 'raw',
                  //'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
                  'value' => ' \'<a href="#" class="" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
              ),*/
              array(
            		'header' => 'Ver Rastreo',
            		'type' => 'raw',
            		'value' => array($this, 'gridTracking'),
            	),
              array(
                  'header' => 'Detalle',
                  'type' => 'raw',
                  'value' => array($this, 'gridDetallePedido'),
              ),
              array(
                  'header' => 'Agregar al carro',
                  'type' => 'raw',
                  'value' => ' \'<a href="#" class="center" title="Agregar al carro" data-role="pedidodetalle" data-compra="\' . $data->idCompra  . \'">Añadir al carrito <img class="ico-carrito" src="\' . Yii::app()->request->baseUrl . \' /images/desktop/ico-carrito.png">   </a>\''
              ),
              array(
                  'header' => 'Ocultar',
                  'type' => 'raw',
                  'value' => ' \'<a href="#" class="center" title="Ocultar" data-role="pedidolistaocultar" data-compra="\' . $data->idCompra  . \'">Ocultar <span class="glyphicon glyphicon-remove-circle icono-eliminar" aria-hidden="true"></a>\''
              ),
          ),
      ));
    ?>
  </div>
</div>
