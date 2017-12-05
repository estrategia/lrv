<?php
/* @var $this UsuarioTerceroController */
/* @var $model UsuarioTercero */

$this->breadcrumbs=array(
    'Terceros'=>array('admin'),
    'Administrar',
);

$this->menu=array(
    array('label'=>'Crear Tercero', 'url'=>array('crear')),
);

?>

<h1>Administrar Terceros</h1>

<a href="<?php echo $this->createUrl('crear') ?>" class="btn btn-primary btn-sm">
    <i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear usuario
</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'usuario-tercero-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'pager' => array(
        'header' => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel' => 'Anterior',
        'nextPageLabel' => 'Siguiente',
        'lastPageLabel' => '&gt;&gt;',
        'maxButtonCount' => 10
    ),
    'columns'=>array(
        array(
            'name' => 'nombreOperador',
            'header' => CHtml::encode($model->getAttributeLabel('nombreOperador')),
            'value' => function ($model) {
                return $model->nombreOperador;
            },
            'filter' => CHtml::activeTextField($model, 'nombreOperador', array('class' => 'form-control input-sm')),
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
        array(
            'name' => 'nombreContacto',
            'header' => CHtml::encode($model->getAttributeLabel('nombreContacto')),
            'value' => function ($model) {
                return $model->nombreContacto;
            },
            'filter' => CHtml::activeTextField($model, 'nombreContacto', array('class' => 'form-control input-sm')),
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
        array(
            'name' => 'telefonoContacto',
            'header' => CHtml::encode($model->getAttributeLabel('telefonoContacto')),
            'value' => function ($model) {
                return $model->telefonoContacto;
            },
            'filter' => CHtml::activeTextField($model, 'telefonoContacto', array('class' => 'form-control input-sm')),
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
        array(
            'name' => 'correoContacto',
            'header' => CHtml::encode($model->getAttributeLabel('correoContacto')),
            'value' => function ($model) {
                return $model->correoContacto;
            },
            'filter' => CHtml::activeTextField($model, 'correoContacto', array('class' => 'form-control input-sm')),
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
        array(
            'name' => 'correoNotificaciones',
            'header' => CHtml::encode($model->getAttributeLabel('correoNotificaciones')),
            'value' => function ($model) {
                return $model->correoNotificaciones;
            },
            'filter' => CHtml::activeTextField($model, 'correoNotificaciones', array('class' => 'form-control input-sm')),
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
        array(
            'value' => 'Yii::app()->params["terceros"]["usuario"]["estadoNombre"][$data->estado]',
            'header' => CHtml::encode($model->getAttributeLabel('estado')),
            'filter' => CHtml::dropDownList('Operador[estado]', $model->estado, Yii::app()->params["terceros"]["usuario"]["estadoNombre"], array('class' => 'form-control input-sm', 'prompt' => 'Todo', 'style' => 'text-align: center;')),
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
        /*
        'codigoProveedor',
        'estado',
        'clave',
        */
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'buttons' => array(
                'update' => [
                    'label' => 'Actualizar',
                    'url' => function($data) {
                        return Yii::app()->controller->createUrl('actualizar', ['id' => $data->idOperador]);
                    }
                ]
            )
        ),
    )
))
?>