<?php
$menu = null;
if($this->menuSuperior != null):
	$menu = $this->menuSuperior;
elseif(Yii::app()->session[Yii::app()->params->sesion['mundoSuperior']] != null):
	$menu = Yii::app()->session[Yii::app()->params->sesion['mundoSuperior']];
endif;

if($menu):?>
	<?php $menuPublicidad = $menu->objMenuMundo;?>

 <div class="menuPublicidad" id='menuPublicidad'>
	 <?php /*<a class="close-publicidad" href="#" data-toggle="tooltip" data-role='ocultar-menu' data-placement="left" title="Cerrar"><span class="glyphicon glyphicon-remove"></span></a>
	 <img class="img-responsive" src='<?=  Yii::app()->request->baseUrl.$menuPublicidad->imagenDesktop ?>' />*/ ?>
 	<div class="flex-container">
 	<?php foreach($menuPublicidad->listMenuItemPublicidad as $itemMenu):?>
 		<div class="element-menu">
 			<a href='<?= CController::createUrl($itemMenu->enlace) ?>'  title="<?= $itemMenu->titulo?>">
 				<div class="flex-container">
 					<img class="icono-menu" alt="<?= $itemMenu->titulo?>" src='<?=  Yii::app()->request->baseUrl.$itemMenu->iconoDesktop ?>'/>
 					<span> <?= $itemMenu->titulo?> </span>
 				</div>
 			</a>
 		</div>
 	<?php endforeach;?>
 	</div>
 </div>

<?php endif;
