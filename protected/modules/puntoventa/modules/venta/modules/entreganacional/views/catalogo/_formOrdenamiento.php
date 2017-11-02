<div class="col-md-2">
	<div class="option-list ordering_item">
	    Ordenar por
	    <select id="OrdenamientoForm_orden" class="form-control ciudades" data-role="orden-listaproductos">
	        <?php foreach ($formOrdenamiento->getOpciones($objSectorCiudad == null ? OrdenamientoForm::NO_PRECIO : OrdenamientoForm::SI_PRECIO) as $valor => $nombre): ?>
	            <option name="OrdenamientoForm[orden]" id="OrdenamientoForm_orden_<?php echo $valor ?>" value="<?php echo $valor ?>" <?php echo ($formOrdenamiento->orden == $valor ? "checked='checked'" : "") ?>><?php echo $nombre ?></option>    
	        <?php endforeach; ?>
	    </select>
	</div>
</div>