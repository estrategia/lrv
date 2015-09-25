<div data-role="collapsibleset">
    <div data-role="collapsible">
        <h3>Ingreso al sistema</h3>
        <?php $this->renderPartial('/usuario/autenticar', array('model' => new LoginForm)); ?>
    </div>
    <div class="ui-collapsible ui-collapsible-inset ui-corner-all ui-collapsible-themed-content ui-last-child ui-collapsible-collapsed">
        <h3><?php echo CHtml::link('Pagar como invitado', $this->createUrl("/carro/pagoinvitado"), array('class'=>'ui-collapsible-heading-toggle ui-btn ui-btn-icon-left ui-btn-inherit ui-icon-plus', 'data-role' => 'none', 'data-ajax' => 'false', 'onclick'=>'return true;')); ?></h3>
        <?php //echo CHtml::link('Pagar como invitado', $this->createUrl("/carro/pagoinvitado"), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
        <?php //$this->renderPartial('/usuario/registro', array('model' => new RegistroForm('invitado'))); ?>
    </div>
</div>
<!--
<div data-role="collapsible" class="ui-collapsible ui-collapsible-inset ui-corner-all ui-collapsible-themed-content ui-collapsible-collapsed ui-first-child">
    <h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed">
        <a class="ui-collapsible-heading-toggle ui-btn ui-icon-plus ui-btn-icon-left ui-btn-inherit" href="#">Ingreso al sistema<span class="ui-collapsible-heading-status"> click to expand contents</span></a>
    </h3>
    <div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
        <div class="ui-content ui-body-c">
            <h2>Ingreso al sistema</h2>
            

        </div>    
    </div>
</div>
-->

<?php //echo CHtml::link('Pagar como invitado', $this->createUrl("/carro/pagoinvitado"), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-a')); ?>





<?php //echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
