<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter/vitalcall'),
    'Clientes',
);
?>

<h1>Administrar Clientes</h1>

<a href="<?php echo $this->createUrl('crear') ?>" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear cliente
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
            'name' => 'identificacionUsuario',
            'value' => '$data->identificacionUsuario',
            'header' => CHtml::encode($model->getAttributeLabel('identificacionUsuario')),
            'filter' => CHtml::activeTextField($model, 'identificacionUsuario', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'nombre',
            'value' => '$data->nombre',
            'header' => CHtml::encode($model->getAttributeLabel('nombre')),
            'filter' => CHtml::activeTextField($model, 'nombre', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'apellido',
            'value' => '$data->apellido',
            'header' => CHtml::encode($model->getAttributeLabel('apellido')),
            'filter' => CHtml::activeTextField($model, 'apellido', array('class' => 'form-control input-sm')),
        ),
        array(
            'name' => 'correoElectronico',
            'value' => '$data->correoElectronico',
            'header' => CHtml::encode($model->getAttributeLabel('correoElectronico')),
            'filter' => CHtml::activeTextField($model, 'correoElectronico', array('class' => 'form-control input-sm')),
        ),
        /*array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
        )*/
        array(
            'class' => 'CButtonColumn',
            'template' => '{ver}{actualizar}',
            'buttons' => array(
                'ver' => array(
                    'label' => '<i class="glyphicon glyphicon-eye-open"></i> ',
                    'url' => 'Yii::app()->createUrl("/callcenter/vitalcall/cliente/ver", array("id"=>$data->identificacionUsuario)) ',
                    'options' => array('title'=>'Ver'),
                ),
                'actualizar' => array(
                    'label' => '<i class="glyphicon glyphicon-edit"></i> ',
                    'url' => 'Yii::app()->createUrl("/callcenter/vitalcall/cliente/actualizar", array("id"=>$data->identificacionUsuario)) ',
                    'options' => array('title'=>'Actualizar'),
                ),
            )
        ),
    ),
));
?>
