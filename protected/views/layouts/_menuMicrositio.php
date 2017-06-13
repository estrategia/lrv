<?php
$menu = MenuPublicidad::obtenerDatosCampania();

if($menu): ?>
	<img class="img-responsive-m" src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$menu->imagenMovil ?>' />
	<div id='carrusel-menu' class="owl-carousel owl-theme">
		<?php foreach($menu->listMenuItemPublicidad as $itemMenu):?>
			<div class="item">
				<div class="element-menu">
					<a href='<?= CController::createUrl($itemMenu->enlaceMovil) ?>' alt="<?= $itemMenu->titulo?>" title="<?= $itemMenu->titulo?>">
						<img class="img-responsive-m icono-menu" src='<?=  Yii::app()->request->baseUrl."/images/contenido/".$itemMenu->iconoMovil ?>'/>
						<span><?= $itemMenu->titulo?></span>
					</a>
				</div>
			</div>
		<?php endforeach;?>
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
