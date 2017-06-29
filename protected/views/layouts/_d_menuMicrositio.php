<?php
$menu = MenuPublicidad::obtenerDatosCampania();
if($menu): ?>
<img class="img-responsive" src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$menu->imagenDesktop ?>' />
<div class="flex-container">
<?php foreach($menu->listMenuItemPublicidad as $itemMenu):?>
	<div class="element-menu">
		<a href='<?= CController::createUrl($itemMenu->enlace) ?>'  title="<?= $itemMenu->titulo?>">
			<div class="flex-container">
				<img class="icono-menu" alt="<?= $itemMenu->titulo?>" src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$itemMenu->iconoDesktop ?>'/>
				<span> <?= $itemMenu->titulo?> </span>
			</div>

		</a>
	</div>
<?php endforeach;?>
</div>
<?php endif;
