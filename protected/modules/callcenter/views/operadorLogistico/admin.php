<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Operadores Logisticos',
);
?>

<h1>Administrar Operadores</h1>

<a href="<?php echo $this->createUrl('create') ?>" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear operador logistico
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
            'name' => 'nombreOperadorLogistico',
            'value' => '$data->nombreOperadorLogistico',
            'header' => CHtml::encode($model->getAttributeLabel('nombreOperadorLogistico')),
            'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'estado',
            'value' => 'Yii::app()->params->callcenter["usuario"]["estadoNombre"][$data->estado]',
            'header' => CHtml::encode($model->getAttributeLabel('estado')),
            'filter' => CHtml::dropDownList('OperadorLogistico[estado]', $model->estado, Yii::app()->params->callcenter["usuario"]["estadoNombre"], array('class' => 'form-control input-sm', 'prompt' => 'Todo', 'style' => 'text-align: center;')),
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
        /* 'buttons' => array(
          'update' => array(
          'label' => 'Update',
          'options' => array(
          'class' => 'btn btn-small update'
          )
          ),
          'delete' => array(
          'label' => 'Delete',
          'options' => array(
          'class' => 'btn btn-small delete'
          )
          )
          ), */
        // 'htmlOptions' => array('style' => 'width: 80px'),
        )
    ),
));
?>
