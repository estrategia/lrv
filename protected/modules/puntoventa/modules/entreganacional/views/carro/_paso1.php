<div class="text-center">
    <h1 style="color: #FF6215;font-weight:bold;">Informaci&oacute;n del pedido</h1>
    <hr>
</div>
<div class="row" style="margin-top:25px;">
    <div class="col-sm-4" >
        <div class="iconStep step1"></div>
        <div class="text orange"><p>1.Tipo entrega</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_tipoEntrega', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="iconStep step2"></div>
        <div class="text orange"><p>2.Direcci&oacute;n despacho</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoDespacho', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="iconStep step3"></div>
        <div class="text orange"><p>&nbsp;3.Fecha/hora entrega</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoEntrega', array('modelPago' => $modelPago, 'listHorarios' => $listHorarios)) ?>
        </div>
    </div>
</div>
<div class="space-1"></div>

<div class="row">
    <div class="col-sm-4" >
        <div class="iconStep step4"></div>
        <div class="text orange"><p>4.Forma pago</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoPago', array('modelPago' => $modelPago, 'listFormaPago' => $listFormaPago)) ?>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="iconStep step6"></div>
        <div class="text orange"><p>&nbsp;6.Comentarios</p></div>
        <div class="step-box">
            <?php $this->renderPartial('/carro/_pasoComentario', array('modelPago' => $modelPago)) ?>
        </div>
    </div>
</div>
<div class="space-3"></div>
<div class="space-3"></div>
