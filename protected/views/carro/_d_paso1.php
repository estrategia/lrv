<?php if(Yii::app()->shoppingCart->hasInternalProductos(true)): ?>
<div class="row">
    <div class="col-sm-6">
        <div class="iconStep step1"></div>
        <div class="text orange"><p>Tipo de entrega</p></div>
        <div class="step-box<?php echo ($modelPago->pagoInvitado ? ' invitado' : '') ?>">
            <?php $this->renderPartial('/carro/_d_tipoEntrega', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="iconStep step3"></div>
        <div class="text orange"><p>Fecha y hora de entrega</p></div>
        <div class="step-box<?php echo ($modelPago->pagoInvitado ? ' invitado' : '') ?>">
            <?php $this->renderPartial('/carro/_d_pasoEntrega', array('modelPago' => $modelPago, 'listHorarios' => $listHorarios)) ?>
        </div>
    </div>
</div>
<?php endif;?>


<div class="row">
    <div class="col-sm-6" >
        <div class="iconStep step2"></div>
        <div class="text orange"><p>Direcci&oacute;n de despacho</p></div>
        <div class="step-box<?php echo ($modelPago->pagoInvitado ? ' invitado' : '') ?>">
            <?php $this->renderPartial('/carro/_d_pasoDespacho', array('listDirecciones' => isset($listDirecciones) ? $listDirecciones : null, 'modelPago' => $modelPago)) ?>
        </div>
    </div>
    <div class="col-sm-6" >
        <div class="iconStep step4"></div>
        <div class="text orange"><p>Forma de pago</p></div>
        <div class="step-box<?php echo ($modelPago->pagoInvitado ? ' invitado' : '') ?>">
            <?php $this->renderPartial('/carro/_d_pasoPago', array('modelPago' => $modelPago, 'listFormaPago' => $listFormaPago)) ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6" >
        <div class="iconStep step6"></div>
        <div class="text orange"><p>Comentarios</p></div>
        <div class="step-box<?php echo ($modelPago->pagoInvitado ? ' invitado' : '') ?>">
            <?php $this->renderPartial('/carro/_d_pasoComentario', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
</div>

<?php if(Yii::app()->shoppingCart->hasMixedProducts()): ?>
<div class="space-1"></div>
<div class="row">
    <div class="col-sm-6">
        <div class="iconStep step1"></div>
        <div class="text orange"><p>Tipo de entrega</p></div>
        <div class="step-box<?php echo ($modelPago->pagoInvitado ? ' invitado' : '') ?>">
            <?php $this->renderPartial('/carro/_d_tipoEntrega', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="iconStep step3"></div>
        <div class="text orange"><p>Fecha y hora de entrega</p></div>
        <div class="step-box<?php echo ($modelPago->pagoInvitado ? ' invitado' : '') ?>">
            <?php $this->renderPartial('/carro/_d_pasoEntrega', array('modelPago' => $modelPago, 'listHorarios' => $listHorarios)) ?>
        </div>
    </div>
</div>
<?php endif;?>

<div class="bot-button">
    <button data-redirect="confirmacion" data-origin="informacion" id="btn-carropagar-siguiente" class="btn btn-primary">Siguiente</button>
</div>


<?php if (Yii::app()->shoppingCart->hasInternalProductos()): ?>
	<!-- modal info recoger -->
    <div class="modal fade" id="info_recoger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Quiero pasar por el pedido</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4  center">
                            <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/1_ubicacion.png" alt="">
                            <h2 class="text font_18">1. Selecciona la ciudad</h2>
                        </div>
                        <div class="col-sm-4 not_padding center">
                            <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/2_productos.png" alt="">
                            <h2 class="text font_18">2. Encuentra lo que estás buscando</h2>
                        </div>
                        <div class="col-sm-4 center">
                            <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/3_puntoventa.png" alt="">
                            <h2 class="text font_18">3. Selecciona el punto de venta de tu conveniencia</h2>
                        </div>
                    </div>
                    <div class="space-3"></div>
                    <div class="row">
                        <div class="col-sm-4 center col-sm-offset-2">
                            <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/4_alistar_pedido.png" alt="">
                            <h2 class="text font_18">4. Alistamos tu pedido</h2>
                        </div>
                        <div class="col-sm-4 center">
                            <img class="red-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/5_tiempo_recoger.png" alt="">
                            <h2 class="text font_18">5. En el tiempo indicado pasa por &eacute;l</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal info recoger -->

    <!-- modal info domicilio -->
    <div class="modal fade" id="info_domicilio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Quiero que me lo entreguen a domicilio</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3 not_padding center">
                            <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/a_ubicacion.png" alt="">
                            <h2 class="text font_18">1. Selecciona la ciudad</h2>
                        </div>
                        <div class="col-sm-3 not_padding center">
                            <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/b_productos.png" alt="">
                            <h2 class="text font_18">2. Encuentra lo que estás buscando</h2>
                        </div>
                        <div class="col-sm-3 not_padding center">
                            <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/c_confirmacion.png" alt="">
                            <h2 class="text font_18">3. 3. Confirma tu pedido.<span class="font_14">(Despacho - Entrega - Pago)</span></h2>
                        </div>
                        <div class="col-sm-3 not_padding center">
                            <img class="yellow-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/d_tiempo_entrega.png" alt="">
                            <h2 class="text font_18">4. En el tiempo indicado entregamos tu pedido</h2>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal info domicilio -->
<?php endif;?>
