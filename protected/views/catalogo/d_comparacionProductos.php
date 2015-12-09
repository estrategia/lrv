<div class="modal fade" id="modal-comparar-productos" tabindex="-1" role="dialog" aria-labelledby="modalComparar">
    <div class="modal-dialog" role="document" style='width:80%'>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Comparar Productos</h4>
            </div>
            <div class="modal-body body-scroll" id='contenidoCompararProductos'>
                <section>
                    <div class="row">
                        <?php if ($listaProductos == null): ?>
                            <div class="col-md-12 content-txt2" style="text-align:center">
                                No hay productos para comparar
                            </div>
                        <?php else: ?>
                            <ul class="listaProductos center">
                                <div class="items">
                                    <?php
                                    $countComparacion = count($listaProductos);
                                    if ($countComparacion <= 3) {
                                        $numc = 4;
                                    } else {
                                        $numc = 3;
                                    }
                                    foreach ($listaProductos as $codigo => $producto):
                                        ?>
                                        <?php
                                        $this->renderPartial('_d_productoElemento', array(
                                            'data' => $producto,
                                            'vista' => 'comparacion',
                                            'colums' => $numc
                                        ));
                                        ?>

                            <?php endforeach; ?>
                                </div>
                            </ul>
<?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
