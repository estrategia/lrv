<?php $listaProductos = $objModulo->getListaProductos($this->objSectorCiudad) ?>
<?php if (count($listaProductos) >= Yii::app()->params->minimoSlideProductos): ?>
    <section>
        <?php if (!empty($objModulo->descripcion)): ?>
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-md-12 title">
                        <h2 class="productos-destacados"><span><i class="glyphicon glyphicon-chevron-right"></i></span> <?php echo $objModulo->descripcion ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div id="owl-carousel" class="owl-carousel slide-productos">
                        <?php foreach ($listaProductos as $objProducto): ?>
                            <div class="item">
                                <ul class="listaProductos">
                                    <?php
                                    $this->renderPartial('//catalogo/_d_productoElemento', array(
                                        'data' => $objProducto,
                                        'vista' => 'slider'
                                    ));
                                    ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-2" >
                    <div  class="btn-ver-todos">
                        <?php echo CHtml::link('<div class="btn btn-primary btn-lg btn-block" style="padding:15px; border-radius:10px; font-size:1.5em;">Ver todos</div>', CController::createURL('catalogo/verTodosProductos', array('opcion' => 'lista', 'item' => $objModulo->idModulo)), array()); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
