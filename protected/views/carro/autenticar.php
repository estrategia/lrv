<div data-role="collapsibleset">
    <div data-role="collapsible">
        <h3>Ingreso al sistema</h3>
        <?php $this->renderPartial('/usuario/autenticar', array('model' => new LoginForm)); ?>
    </div>
    <div data-role="collapsible">
        <h3>Pagar como invitado</h3>
        <?php $this->renderPartial('/usuario/registro', array('model' => new RegistroForm('invitado'))); ?>
    </div>
</div>





<?php //echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
