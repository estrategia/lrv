<div class="space-3"></div>
<div class="text-center orange">
    <h1>Informaci&oacute;n del pedido</h1>
</div>
<div class="space-3"></div>
        <div class="row">
            <div class="col-sm-4" >
                <div class="iconStep step1"></div>
                <div class="text"><p>1.Despacho</p></div>
                <div class="step-box">
                    <?php $this->renderPartial('/carro/_d_pasoDespacho', array('listDirecciones' => $listDirecciones, 'modelPago' => $modelPago)) ?>
                </div>
            </div>
            <div class="col-sm-4" >
                <div class="iconStep step2"></div>
                <div class="text"><p>&nbsp;2.Entrega</p></div>
                <div class="step-box">
                    <?php $this->renderPartial('/carro/_d_pasoEntrega', array('modelPago' => $modelPago, 'listHorarios' => $listHorarios)) ?>
                </div>

            </div>
            <div class="col-sm-4" >
                <div class="iconStep step3"></div>
                <div class="text"><p>3.Pago</p></div>
                <div class="step-box">
                    <?php $this->renderPartial('/carro/_d_pasoPago', array('modelPago' => $modelPago, 'listFormaPago' => $listFormaPago)) ?>
                </div>
            </div>
        </div>
        <div class="space-3"></div>
        <div class="row">
            <div class="col-sm-4 col-md-offset-2" >
                <div class="iconStep step5"></div>
                <div class="text"><p>4.Bono</p></div>
                <div class="step-box">
                    <?php $this->renderPartial('/carro/_d_pasoBono', array('modelPago' => $modelPago)) ?>
                </div>
            </div>
            <div class="col-sm-4" >
                <div class="iconStep step4"></div>
                <div class="text"><p>&nbsp;5.Comentario</p></div>
                <div class="step-box">
                    <?php $this->renderPartial('/carro/_d_pasoComentario', array('modelPago' => $modelPago)) ?>
                </div>
            </div>
            <!--<div class="col-sm-4" >
                <div class="iconStep"></div>
                <div class="text"><p>&nbsp;</p></div>
            </div>-->
        </div>
        <div class="space-3"></div>
        <div class="bot-button">
            <button data-redirect="confirmacion" data-origin="informacion" id="btn-carropagar-siguiente" class="btn btn-primary">Continuar</button>
        </div>
        <div class="space-3"></div>