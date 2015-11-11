<?php
/* @var $this OperadorController */
/* @var $model Operador */

/* $this->breadcrumbs = array(
  'Operadors' => array('index'),
  'Manage',
  ); */
?>

<h1>Administrar Operadores</h1>

<a href="<?php echo $this->createUrl('create') ?>" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear operador
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
            'name' => 'nombre',
            'value' => '$data->nombre',
            'header' => CHtml::encode($model->getAttributeLabel('nombre')),
            'filter' => CHtml::activeTextField($model, 'nombre', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'usuario',
            'value' => '$data->usuario',
            'header' => CHtml::encode($model->getAttributeLabel('usuario')),
            'filter' => CHtml::activeTextField($model, 'usuario', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'perfil',
            'value' => 'Yii::app()->params->callcenter["perfil"][$data->perfil]',
            'header' => CHtml::encode($model->getAttributeLabel('perfil')),
            'filter' => CHtml::activeTextField($model, 'perfil', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'email',
            'value' => '$data->email',
            'header' => CHtml::encode($model->getAttributeLabel('email')),
            'filter' => CHtml::activeTextField($model, 'email', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'activo',
            'value' => 'Yii::app()->params->callcenter["usuario"]["estadoNombre"][$data->activo]',
            'header' => CHtml::encode($model->getAttributeLabel('activo')),
            'filter' => CHtml::dropDownList('Operador[activo]', $model->activo, Yii::app()->params->callcenter["usuario"]["estadoNombre"], array('class' => 'form-control input-sm', 'prompt' => 'Todo', 'style' => 'text-align: center;')),
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
