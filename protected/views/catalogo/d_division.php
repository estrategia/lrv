<?php //solucion versionamiento ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 menu-categorias">
			<h3 style="margin-left:42px;"><?php echo $categorias->nombreCategoriaTienda?></h3>
			<ul>
                            <?php foreach($categorias->listCategoriasHijas as $categoriaHija):?>
				<?php echo CHtml::link('<li><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;'.$categoriaHija->nombreCategoriaTienda.'</li>', 
                                        CController::createUrl('catalogo/categoria',array('categoria' => $categoriaHija->idCategoriaTienda)))?>
                            <?php endforeach;?>
			</ul>
		</div>
		<div class="col-md-10 ressete">
			<?php $this->renderPartial('/sitio/d_modulosTienda',array(
                                        'modulosTienda' => $modulos
                        ));?>
		</div>
	</div>
</div>

<!-- productos destacados -->






