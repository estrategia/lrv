<?php
$menu = null;
if($this->menuSuperior != null):
	$menu = $this->menuSuperior;
elseif(Yii::app()->session[Yii::app()->params->sesion['mundoSuperior']] != null):
	$menu = Yii::app()->session[Yii::app()->params->sesion['mundoSuperior']];
endif;

if($menu): ?>
	<?php $menuPublicidad = $menu->objMenuMundo;?>
	<div class="menuPublicidad">
		<a href="#" class="ui-btn ui-icon-delete ui-btn-icon-left close-publicidad"></a>
		<img class="img-responsive-m" src='<?=  Yii::app()->request->baseUrl.$menuPublicidad->imagenMovil ?>' />
		<div id='carrusel-menu' class="owl-carousel owl-theme">
			<?php foreach($menuPublicidad->listMenuItemPublicidad as $itemMenu):?>
				<div class="item">
					<div class="element-menu">
						<a href='<?= CController::createUrl($itemMenu->enlaceMovil) ?>' alt="<?= $itemMenu->titulo?>" title="<?= $itemMenu->titulo?>">
							<img class="img-responsive-m icono-menu" src='<?=  Yii::app()->request->baseUrl.$itemMenu->iconoMovil ?>'/>
							<span><?= $itemMenu->titulo?></span>
						</a>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
<script type="text/javascript">
	$('#carrusel-menu').owlCarousel({
		items:2, //10 items above 1000px browser width
		itemsTablet: [600, 2], //2 items between 600 and 0
		itemsMobile: [300, 2], // itemsMobile disabled - inherit from itemsTablet option

		navigation: true,
		pagination: false,
		loop:true,
		navigationText: [
				"&lt;",
				"&gt;"
		],
	})
</script>

<?php endif;
