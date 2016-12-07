<?php
/* @var $this BonosController */
/* @var $model BonosTienda */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Bonos' => array('/callcenter/bonos'),
);

?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'bonos-tienda-grid',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide();}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {Loading.hide(); bootbox.alert(errorMessage);}"),
    'dataProvider' => $model->search(),
    'ajaxUrl' => $this->createUrl('/callcenter/bonos/index'),
    'filter' => $model,
    'columns' => array(
        //'idBonoTienda',
        'identificacionUsuario',
    	'concepto',	
        array(
            'header' => 'Tipo Bono', 
            'value' => function($val){return (isset($val->objConcepto->concepto))?$val->objConcepto->concepto:"";},
        	'filter' => CHtml::dropDownList('BonosTienda[idBonoTiendaTipo]', $model->idBonoTiendaTipo, CHtml::listData(BonoTienda::model()->findAll("Tipo = 1"),'idBonoTiendaTipo','concepto' ), array('class' => 'form-control input-sm', 'prompt' => 'Todo', 'style' => '')),
            ),
        'valor',
        'vigenciaInicio',
        'vigenciaFin',
        'minimoCompra',
        array(
            'name' => 'estado',
            'value' => 'Yii::app()->params->callcenter["bonos"]["estadoNombre"][$data->estado]',
            'header' => CHtml::encode($model->getAttributeLabel('estado')),
            'filter' => CHtml::dropDownList('BonosTienda[estado]', $model->estado, Yii::app()->params->callcenter["bonos"]["estadoNombre"], array('class' => 'form-control input-sm', 'prompt' => 'Todo', 'style' => '')),
        ),
        'fechaCreacion',
        'idCompra',
        'correoElectronico',
        array(
            'header' => 'Notificado', 
            'value' => function($val){return ($val->notificado)?"Si":"No";}
            ),
        /*
          'tipo',
          'idCompra',
          'fechaUso',
          'valorCompra',
         */
        array(
            'class' => 'CButtonColumn',
            'template' => '{ver}{actualizar}{desactivar}{reactivar}',
            'buttons' => array(
                'ver' => array(
                    'label' => '<i class="glyphicon glyphicon-eye-open"></i> ', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/callcenter/bonos/ver", array("id"=>$data->idBonoTienda)) ', //A PHP expression for generating the URL of the button.
                    //'imageUrl' => '...', //Image URL of the button.
                    'options' => array('title'=>'Ver'), //HTML options for the button tag.
                    //'click' => '...', //A JS function to be invoked when the button is clicked.
                    //'visible' => '...', //A PHP expression for determining whether the button is visible.
                ),
                'actualizar' => array(
                    'label' => '<i class="glyphicon glyphicon-edit"></i> ', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/callcenter/bonos/actualizar", array("id"=>$data->idBonoTienda)) ', //A PHP expression for generating the URL of the button.
                    //'imageUrl' => Yii::app()->request->baseUrl.'/images/email.png', //Image URL of the button.
                    'options' => array('title'=>'Actualizar'), //HTML options for the button tag.
                    //'click' => '...', //A JS function to be invoked when the button is clicked.
                    'visible' => 'Yii::app()->controller->module->user->profile != 1', //A PHP expression for determining whether the button is visible.
                ),
                'reactivar' => array(
                    'label' => '<i class="glyphicon glyphicon-repeat"></i>', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/callcenter/bonos/reactivar", array("id"=>$data->idBonoTienda)) ', //A PHP expression for generating the URL of the button.
                    //'imageUrl' => Yii::app()->request->baseUrl.'/images/email.png', //Image URL of the button.
                    'options' => array('title'=>'Reactivar', 'data-role'=>"bonotienda-reactivar"), //HTML options for the button tag.
                    //'click' => 'function(){console.log("reactivar bono");}', //A JS function to be invoked when the button is clicked.
                   'visible' => '($data->estado==2 || $data->estado==0) && Yii::app()->controller->module->user->profile != 1', //A PHP expression for determining whether the button is visible.
                ),
                'desactivar' => array(
                    'label' => '<i class="glyphicon glyphicon-remove"></i>', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/callcenter/bonos/desactivar", array("id"=>$data->idBonoTienda)) ', //A PHP expression for generating the URL of the button.
                    //'imageUrl' => Yii::app()->request->baseUrl.'/images/email.png', //Image URL of the button.
                    'options' => array('title'=>'Desactivar', 'data-role'=>"bonotienda-reactivar"), //HTML options for the button tag.
                    //'click' => 'function(){console.log("reactivar bono");}', //A JS function to be invoked when the button is clicked.
                   'visible' => '$data->estado==1 && Yii::app()->controller->module->user->profile != 1', //A PHP expression for determining whether the button is visible.
                ),

            )
        ),
    ),
));
?>
