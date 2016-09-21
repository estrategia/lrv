<div class="row">     
    <div class="col-md-12">  
        <div class="border col-md-6">
            <h3> Observaciones del Pedido</h3>
            <?php $this->renderPartial('_formObservacion', array('model' => new ObservacionForm($objCompra->idCompra),'objCompra' => $objCompra)); ?>
            <br/>
        </div>

        <div class="border col-md-5">
            <h3> Notificar al Cliente</h3>
            <?php $this->renderPartial('_formNotificacion', array('model' => new NotificacionForm($objCompra->idCompra),'objCompra' => $objCompra)); ?>
            <br/>
        </div>   
    </div>
</div>  
<hr>
<div id="div-pedido-observaciones">
    <?php $this->renderPartial('_observaciones', array('objCompra' => $objCompra)); ?>
</div>
