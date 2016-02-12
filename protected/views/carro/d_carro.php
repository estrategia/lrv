<div class="container">
    <h2>Carro de compras</h2>

    <?php $mensajes = Yii::app()->user->getFlashes(); ?>
    <?php if ($mensajes): ?>
        <ul class="messages">
            <?php foreach ($mensajes as $idx => $mensaje): ?>
                <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (Yii::app()->shoppingCart->isEmpty()): ?>
        <?php $this->renderPartial('carroVacio'); ?>
    <?php else: ?>
        <?php $this->renderPartial('_d_carro', array('lectura'=>false, 'opcion' => (isset($opcion)? $opcion: null))); ?>
    <?php endif; ?>
    <div class="row">
        <?php if (isset($opcion) && $opcion == 1): ?>
                <?php if (isset(Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']]) && count(Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']]) > 0): ?>
                    <div class="col-md-12">
                        <div class="detalles"> <h3>Estos productos no se agregaron porque se encuentran agotados</h3> </div>
                      
                        <div class="row">
                            <div class="col-md-12 side">
                                <div class="list_cuadricula">
                                    <section>
                                        <div>
                                            <ul class="listaProductos">
                                                <div class="items items5">
                                                    <?php foreach (Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']] as $objProducto): ?>

                                                        <?php
                                                        $this->renderPartial('//catalogo/_d_productoElemento', array(
                                                            'data' => $objProducto,
                                                            'vista' => 'grid'
                                                        ));
                                                        ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </ul>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
    </div>
</div>
