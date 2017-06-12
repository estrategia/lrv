<?php
$menu = MenuPublicidad::obtenerDatosCampania();

if($menu): ?>

		<img src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$menu->imagenDesktop ?>' />

		<?php foreach($menu->listMenuItemPublicidad as $itemMenu):?>
			<a href='<?= CController::createUrl($itemMenu->enlace) ?>' alt="<?= $itemMenu->titulo?>" title="<?= $itemMenu->titulo?>"> 
				<img src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$itemMenu->iconoDesktop ?>'/> <?= $itemMenu->titulo?></a>
		<?php endforeach;?>

<?php endif;