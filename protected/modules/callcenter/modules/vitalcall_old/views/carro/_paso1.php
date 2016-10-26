<div class="text-center">
    <h1 style="color: #FF6215;font-weight:bold;">Informaci&oacute;n del pedido</h1>
    <hr>
</div>
<div class="row" style="margin-top:25px;">
    <div class="col-sm-4" >
        <div class="iconStep step1"></div>
        <div class="text orange"><p>1.Tipo de entrega</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_tipoEntrega', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="iconStep step2"></div>
        <div class="text orange"><p>2.Direcci&oacute;n de despacho</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoDespacho', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="iconStep step3"></div>
        <div class="text orange"><p>&nbsp;3.Fecha y hora de entrega</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoEntrega', array('modelPago' => $modelPago, 'listHorarios' => $listHorarios)) ?>
        </div>
    </div>
</div>
<div class="space-1"></div>

<div class="row">
    <div class="col-sm-4" >
        <div class="iconStep step4"></div>
        <div class="text orange"><p>4.Forma de pago</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoPago', array('modelPago' => $modelPago, 'listFormaPago' => $listFormaPago)) ?>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="iconStep step6"></div>
        <div class="text orange"><p>&nbsp;5.Comentarios</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoComentario', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
</div>
<div class="space-3"></div>

<div class="space-3"></div>

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
                        <h2 class="text font_18">5. En el tiempo indicado pasa por él</h2>
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
