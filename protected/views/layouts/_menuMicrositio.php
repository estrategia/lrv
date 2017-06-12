<?php
$menu = MenuPublicidad::obtenerDatosCampania();

if($menu): ?>

		<img src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$menu->imagenMovil ?>' />

		<?php foreach($menu->listMenuItemPublicidad as $itemMenu):?>
			<a href='<?= CController::createUrl($itemMenu->enlaceMovil) ?>' alt="<?= $itemMenu->titulo?>" title="<?= $itemMenu->titulo?>"> 
				<img src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$itemMenu->iconoMovil ?>'/> <?= $itemMenu->titulo?></a>
		<?php endforeach;?>

<?php endif;