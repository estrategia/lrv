<ul data-role="listview" data-inset="true" class="ui-alt-icon">
	<?php foreach ($listBarrios as $barrio => $datos): ?>
		<li data-icon="action" data-role="ubicacion-barriosOpciones" data-ciudad="<?= $datos['ciudad'] ?>" data-sector="<?= $datos['sector'] ?>"><a href="#" data-ajax="false" data-role="ubicacion-barriosOpciones" data-ciudad="<?= $datos['ciudad'] ?>" data-sector="<?= $datos['sector'] ?>"><?= $barrio ?></a></li>
	<?php endforeach;?>
</ul>