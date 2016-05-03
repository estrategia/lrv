<div data-role="collapsibleset">
    <div data-role="collapsible">
        <h3>Ingreso al sistema</h3>
        <?php $this->renderPartial('/usuario/ingreso', array('model' => new LoginVendedorForm)); ?>
    </div>
    <div data-role="collapsible">
        <h3>Recordar contrase&ntilde;a</h3>
        <?php $this->renderPartial('/usuario/recordar', array('model' => new RecordarVendedorForm)); ?>
    </div>
</div>

