<div data-role="collapsibleset">
    <div data-role="collapsible" class="collapse-yellow">
        <h3>Ingresa aqu&iacute;</h3>
        <?php $this->renderPartial('/usuario/ingreso', array('model' => new LoginVendedorForm)); ?>
    </div>
    <div data-role="collapsible" class="collapse-yellow">
        <h3>Recordar contrase&ntilde;a</h3>
        <?php $this->renderPartial('/usuario/recordar', array('model' => new RecordarVendedorForm)); ?>
    </div>
</div>

