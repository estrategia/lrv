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
        'idBonoTiendaTipo',
        'concepto',
        'cuenta',
        'formaPago',
        'tipo',
        'estado',
        'fechaIni',
        'fechaFin',
        'cantidadUso',
        'valorBono',
        'valorMinCompra',
        'codigoUso',
        array(
            'class' => 'CButtonColumn',
            'template' => '{actualizar}',
            'buttons' => array(
                'actualizar' => array(
                    'label' => '<i class="glyphicon glyphicon-edit"></i> ', //Text label of the button.
                    'url' => 'Yii::app()->createUrl("/callcenter/bonos/bonoTienda", array("bono"=>$data->idBonoTiendaTipo, "opcion" => "editar")) ', //A PHP expression for generating the URL of the button.
                    //'imageUrl' => Yii::app()->request->baseUrl.'/images/email.png', //Image URL of the button.
                    'options' => array('title'=>'Actualizar'), //HTML options for the button tag.
                    //'click' => '...', //A JS function to be invoked when the button is clicked.
                  //  'visible' => 'Yii::app()->controller->module->user->profile != 1', //A PHP expression for determining whether the button is visible.
                ),
            )
        ),
    ),
));
?>
