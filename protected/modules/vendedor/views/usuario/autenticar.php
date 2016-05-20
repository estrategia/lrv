<div data-role="collapsibleset">
    <div data-role="collapsible" class="collapse-yellow" data-collapsed="false">
        <h3>Iniciar sesi&oacute;n</h3>
        <?php $this->renderPartial('/usuario/ingreso', array('model' => new LoginVendedorForm)); ?>
    </div>
    <div data-role="collapsible" class="collapse-yellow">
        <h3>Recordar contrase&ntilde;a</h3>
        <?php $this->renderPartial('/usuario/recordar', array('model' => new RecordarVendedorForm)); ?>
    </div>
</div>

