<div class="ui-body-c">
    <h2>Direcciones de despacho</h2>
</div>

<div data-role="collapsibleset" data-theme="a" data-content-theme="a" data-mini="true" id="collapsibleset-direcciones" data-iconpos="right">
    <?php foreach ($models as $idx => $model): ?>
		<div class="direcItem">
			<?php if (isset($modelPago)): ?>
				<input type="radio" data-role="none" id="direccion-<?php echo $model->idDireccionDespacho ?>" name="FormaPagoForm[idDireccionDespacho]" class="checkDriec" value="<?php echo $model->idDireccionDespacho ?>" <?php echo ($modelPago->idDireccionDespacho==$model->idDireccionDespacho ? "checked" : "") ?>>
			<?php endif; ?>
			<div data-role="collapsible" id="collapsible-direccion-<?php echo $model->idDireccionDespacho ?>">
				<h3><?php echo $model->descripcion ?></h3>
				<div class="ui-content c_form_rgs ui-body-c">
					<?php $this->renderPartial('/usuario/_direccionForm', array('model' => $model, 'listUbicacion' => $listUbicacion, 'modelPago' => (isset($modelPago) ? $modelPago : null))); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
    <?php endforeach; ?>
    <div data-role="collapsible" id="collapsible-direccion-crear" data-theme="n">
        <h3>Adicionar direcci&oacute;n</h3>
        <div class="ui-content c_form_rgs ui-body-c">
            <?php $this->renderPartial('/usuario/_direccionForm', array('model' => new DireccionesDespacho, 'listUbicacion' => $listUbicacion, 'modelPago' => (isset($modelPago) ? $modelPago : null))); ?>
        </div>
    </div>
    <?php if (isset($modelPago)): ?> 
        <div id="FormaPagoForm_idDireccionDespacho_em_" class="has-error" style="display: none;"></div>
    <?php endif; ?>
</div>
