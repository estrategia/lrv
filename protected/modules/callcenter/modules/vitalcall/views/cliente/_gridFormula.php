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
    //'id' => 'pedidos-grid',
    //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
    //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
    //'ajaxUrl' => $this->createUrl('gridanteriores', array('usuarios' => $model->identificacionUsuario)),
    'dataProvider' => $model->search(),
    'columns' => array(
//         array(
//             'header' => "Pedido #",
//             'type' => 'raw',
//             'value' => array($model, 'gridDetallePedido'),
//         ),
        array(
            'header' => 'Registro m&eacute;dico',
            'value' => '$data->registroMedico',
        ),
        array(
            'header' => 'Nombre m&eacute;dico',
            'value' => '$data->nombreMedico',
        ),
        array(
            'header' => 'Instituci&oacute;n',
            'value' => '$data->institucion',
        ),
        array(
            'header' => "Teléfono",
            'value' => '$data->telefono',
        ),
        array(
            'header' => "Correo electr&oacute;nico",
           'value' =>'$data->correoElectronico',
        ),
        array(
            'header' => "Fecha de creaci&oacute;n",
            'value' =>'$data->fechaCreacion',
        ),
    ),
));
?>