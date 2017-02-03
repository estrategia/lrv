<?php foreach ($listBarrios as $barrio => $datos): ?>
	<div data-role="ubicacion-barriosOpciones" data-ciudad="<?= $datos['ciudad'] ?>" data-sector="<?= $datos['sector'] ?>" ><?= $barrio ?></div>
<?php endforeach;?>