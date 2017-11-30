<?php
/* @var $this ProductoTerceroController */
/* @var $model Producto */

$this->breadcrumbs=array(
    'Productos'=>array('productoTercero/index'),
    $codigoProducto => array('productoTercero/detalle', 'id' => $codigoProducto),
    'Fletes',
);

$this->menu=array(
    array('label'=>'Administrar Productos', 'url'=>array('index')),
);

?>

<a class="btn btn-default" href="<?php echo $this->createUrl('detalle', ['id' => $codigoProducto]) ?>">Producto</a>

<h1>Administrar Fletes Producto: <?php echo $codigoProducto ?></h1>
<a class="btn btn-primary" href="<?php echo $this->createUrl('crear', ['id' => $codigoProducto]) ?>">Crear Flete</a>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'producto-grid',
    'dataProvider'=>$model->searchProducto($codigoProducto),
    'filter'=>$model,
    'columns'=>array(
        'codigoCiudad',
        'valorFlete',
        'tiempoEntregaInicial',
        'tiempoEntregaFinal',
        'unidadesMismoValor',
        // 'idMarca',
        // 'codigoProveedor',
        /*
        'codigoImpuesto',
        'idUnidadNegocioBI',
        'idCategoriaBI',
        'activo',
        'codigoEspecial',
        'fraccionado',
        'numeroFracciones',
        'codigoMedidaFraccion',
        'unidadFraccionamiento',
        'codigoUnidadMedida',
        'cantidadUnidadMedida',
        'fechaCreacion',
        'ventaVirtual',
        'mostrarAhorroVirtual',
        'tercero',
        'orden',
        */
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => [
                    'label' => 'Actualizar',
                    'url' => function($data) {
                        return Yii::app()->controller->createUrl('actualizar', ['id' => $data->idFleteProducto]);
                    }
                ],
                'delete' => [
                    'label' => 'Eliminar',
                    'url' => function($data) {
                        return Yii::app()->controller->createUrl('eliminar', ['id' => $data->idFleteProducto]);
                    }
                ],
            )
        ),
    ),
)); ?>
