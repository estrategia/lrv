<?php
/* @var $this BonosController */
/* @var $model BonosTienda */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Bonos' => array('/callcenter/bonos'),
    "Bono #$model->idBonoTienda,"
);
?>

<div class="grid-view">
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idBonoTienda',
        'identificacionUsuario',
        'concepto',
        'valor',
        'vigenciaInicio',
        'vigenciaFin',
        'minimoCompra',
        'tipo',
        'estado',
        'fechaCreacion',
        'idCompra',
        'fechaUso',
        'valorCompra',
    ),
));
?>
</div>