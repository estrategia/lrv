<?php $pagar = isset($pagar) ? $pagar : false ?>

<div data-role="collapsibleset">
    <div data-role="collapsible">
        <h3>Ingreso al sistema</h3>
        <?php $this->renderPartial('/usuario/ingreso', array('model' => new LoginForm)); ?>
    </div>
    <div data-role="collapsible">
        <h3>Recordar contrase&ntilde;a</h3>
        <?php $this->renderPartial('/usuario/recordar', array('model' => new RecordarForm)); ?>
    </div>
    <div data-role="collapsible">
        <h3>Crear una cuenta</h3>
        <?php $this->renderPartial('/usuario/registro', array('model' => new RegistroForm('registro'))); ?>
    </div>
    <?php if ($pagar): ?>
        <div class="ui-collapsible ui-collapsible-inset ui-corner-all ui-collapsible-themed-content ui-last-child ui-collapsible-collapsed">
            <h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><?php echo CHtml::link('Pagar como invitado', $this->createUrl("/carro/pagoinvitado"), array('class' => 'ui-collapsible-heading-toggle ui-btn ui-icon-plus ui-btn-icon-left ui-btn-inherit', 'data-role' => 'none', 'data-ajax' => 'false')); ?></h3>
        </div>
    <?php endif; ?>
</div>