<div class="mi-cuenta interna-cuenta">
  <div class="bg-w ">
    <h3 class="t-change-dir">Tus listas personales</h3>


    <div class="row">
      <div class="col-md-12">
        <?php echo CHtml::link('Nueva lista personal', "#", array('class' => 'btn btn-primary', 'data-toggle'=>"modal", 'data-target'=>"#modal-lista-personal")); ?>
      </div>
    </div>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'pager' => array(
            'header' => '',
            'firstPageLabel' => '&lt;&lt;',
            'prevPageLabel' => '<<',
            'nextPageLabel' => '>>',
            'lastPageLabel' => '&gt;&gt;',
            'maxButtonCount' => 8
        ),
        'id' => 'gridview-listapersonal',
        'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
        'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide();}"),
        'ajaxUpdateError' => new CJavaScriptExpression("function() { Loading.hide(); alert('Error, intente de nuevo');}"),
        'dataProvider' => $model->search(array('order'=> "t.fechaCreacion DESC", 'pageSize' => 5)),
        'columns' => array(
            array(
                'header' => '#',
                'value' => '$data->idLista',
            ),
            array(
                'header' => 'Nombre de lista',
                'value' => '$data->nombreLista',
            ),
            /*array(
                'header' => 'Ver',
                'labelExpression' => '"Ver"',
                'urlExpression' => 'array("listapersonal","lista"=>$data->idLista)',
                'class' => 'CLinkColumn'
            ),*/
            array(
                'header' => 'Detalle',
                'type' => 'raw',
                'value' => array($this, 'gridDetalleLista'),
            ),

            array(
                'header' => 'Agregar',
                'type' => 'raw',
                'value' => ' \'<a href="#" class="center" title="Agregar al carro" data-role="listapersonal" data-lista="\' . $data->idLista  . \'"><span class="glyphicon glyphicon-shopping-cart center-div" aria-hidden="true"></a>\''
            ),

            array(
                'header' => 'Eliminar',
                'type' => 'raw',
                'value' => ' \'<a href="#" class="center" title="Ocultar" data-role="listapersonaleliminar" data-lista="\' . $data->idLista  . \'"><span class="glyphicon glyphicon-remove center-div" aria-hidden="true"></a>\''
            ),
        ),
    ));
    ?>

    <?php echo $this->renderPartial('d_listaForm', array("model" => new ListasPersonales, "modal" => true)); ?>

  </div>
</div>
