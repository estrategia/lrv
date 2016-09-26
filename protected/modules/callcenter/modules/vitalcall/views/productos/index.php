<?php

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter/vitalcall'),
    'Productos',
);
?>

<h1>Administrar Productos</h1>

<a href="<?php echo $this->createUrl('crear') ?>" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear producto
</a>

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
    'id' => 'operador-grid',
    //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
    //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
    'ajaxUrl' => $this->createUrl('admin'),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
         array(
            'name' => 'codigoProducto',
            'value' => '$data->codigoProducto',
            'header' => CHtml::encode($model->getAttributeLabel('codigoProducto')),
            'filter' => CHtml::activeTextField($model, 'codigoProducto', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'descripcion',
            'value' => '$data->descripcion',
            'header' => CHtml::encode($model->getAttributeLabel('descripcion')),
            'filter' => CHtml::activeTextField($model, 'descripcion', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'fechaInicio',
            'value' => '$data->fechaInicio',
            'header' => CHtml::encode($model->getAttributeLabel('fechaInicio')),
            'filter' => CHtml::activeTextField($model, 'fechaInicio', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'fechaFin',
            'value' => '$data->fechaFin',
            'header' => CHtml::encode($model->getAttributeLabel('fechaFin')),
            'filter' => CHtml::activeTextField($model, 'fechaFin', array('class' => 'form-control input-sm')),
        ),
        /*array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
        )*/
        array(
            'class' => 'CButtonColumn',
            'template' => '{actualizar}',
            'buttons' => array(
                'actualizar' => array(
                    'label' => '<i class="glyphicon glyphicon-edit"></i> ',
                    'url' => 'Yii::app()->createUrl("/callcenter/vitalcall/productos/actualizar", array("id"=>$data->idProductoVitalCall)) ',
                    'options' => array('title'=>'Actualizar'),
                ),
            )
        ),
    ),
));