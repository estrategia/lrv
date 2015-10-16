<div id="div-pasarela-info" class='ui-content justify'> 
    <h2 class="center">LEA DETENIDAMENTE LAS CONDICIONES DE COMPRA BAJO LA MODALIDAD DE PAGO EN LÍNEA.</h2>
    <p>Políticas para la solicitud de reclamaciones de pagos realizados con tarjetas Débito y Crédito, acorde a la Ley 1480 de 2012 Estatuto del Consumidor.</p>
    <ul>
        <li>Las reclamaciones deben hacerse dentro de los 5 días hábiles siguientes a la compra.</li>
        <li>El cliente debe comunicarse con nuestro Call Center a la Línea 01 8000 93 99 00 o a través de nuestro Chat en el portal www.larebajavirtual.com y realizar la solicitud de reverso de la transacción(total o parcial) para el caso de tarjetas de crédito, o la devolución del dinero(parcial o total) con transferencia electrónica a la misma cuenta desde donde fue debitado por la transacción.</li>
        <li>Una vez recibida la notificación, Copservir Ltda iniciará con la franquicia y/o Entidad financiera el proceso de reversión de la transacción (parcial o total) para el caso de tarjetas de crédito, o la devolución del dinero(parcial o total) con transferencia electrónica a la misma cuenta desde donde fue debitado por la transacció, y los tiempos de respuesta de la misma varían dependiendo de cada franquicia y/o Entidad financiera en un plazo no mayor a 30 días calendario siguientes al recibo de la solicitud.</li>
        <li>En ninguno de los casos se retornara dinero en efectivo.</li>
        <li>Las devoluciones serán válidas cuando el producto se encuentre en buen estado, en sus empaques originales.</li>
        <li>Al dar clic en el boton "Continuar Pago en Línea" se Aceptan los politicas descritas anteriormente..</li>
    </ul>

    <?php if ($isMobil): ?>
        <?php echo CHtml::link('Cambiar Forma Pago', ($pagoExpress ? $this->createUrl('/usuario/pagoexpress') : $this->createUrl('/carro/pagar', array('paso' => 'pago'))), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Continuar Pago en Línea
            <input type="button" data-enhanced="true" value="Continuar Pago en Línea" data-role="pagopasarela">
        </div>
    <?php else: ?>
        <div class="well center-block" style="max-width: 80%;">
            <?php echo CHtml::link('Cambiar Forma Pago', ($pagoExpress ? $this->createUrl('/usuario/pagoexpress') : $this->createUrl('/carro/pagar', array('paso' => 'pago'))), array('class' => 'btn btn-warning btn-lg btn-block', 'role' => 'button')); ?>
            <button type="button" class="btn btn-danger btn-lg btn-block" data-role="pagopasarela">Continuar Pago en Línea</button>
        </div>
    <?php endif; ?>

    <p>Condiciones para solicitar el proceso de reversión del pago:</p>
    <ul>
        <li>Cuando el consumidor sea objeto de fraude.</li>
        <li>Cuando corresponda a una operación no solicitada.</li>
        <li>Cuando el producto adquirido no sea recibido.</li>
        <li>Cuando el producto entregado no corresponda a lo solicitado o</li>
        <li>Cuando el producto entregado se encuentre dañado o defectuoso.</li>
    </ul>
</div>