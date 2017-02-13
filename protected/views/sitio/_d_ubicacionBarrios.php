<div class="col-md-12 col-xs-12">
	<div class="grid-view">
		<table class="items" style="width:100%">
			<thead>
				<tr>
					<th>Barrio</th>
					<th>Seleccionar</th>
				</tr>
			</thead>
			<tbody>
				<?php $idx=0;?>
				<?php foreach ($listBarrios as $barrio => $datos): ?>
					<tr class="<?= (($idx%2==0) ? "odd" : "even") ?>">
						<td><?= $barrio ?></td>
						<td><a class="center" href="#" title="Seleccionar" data-role="ubicacion-barriosOpciones" data-ciudad="<?= $datos['ciudad'] ?>" data-sector="<?= $datos['sector'] ?>"><span class="glyphicon glyphicon-check center-div" aria-hidden="true"></span></a></td>
					</tr>
					<?php $idx++;?>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>