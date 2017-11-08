<?php foreach($objProducto->listDetalleProducto as $objDetalleProducto): ?>
<div class='row line-bottom2'>
	<div class='col-md-12'>
		<span class='glyphicon glyphicon-chevron-right der' aria-hidden='true'></span>&nbsp;<h4 style='display:inline-block;'><?=$objDetalleProducto->titulo?></h4>
		<div><?=$objDetalleProducto->contenidoEscritorio?></div>
	</div>
	
	<?php if(!empty($objDetalleProducto->listProductoDetalleImagenes)):?>
		<div id="owl-producto-detalle-imagenes-<?= $objDetalleProducto->idProductoDetalle?>" class="owl-carousel slide-imagenes">
        	<?php foreach ($objDetalleProducto->listProductoDetalleImagenes as $objProductoDetalleImagen): ?>
				<div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos']['detalleImagenes'] . $objProducto->codigoProducto . "/" . $objProductoDetalleImagen->rutaImagenEscritorio; ?>" alt="detalle-producto-<?= $objProducto->descripcionProducto?>" title="detalle-producto-<?= $objProducto->descripcionProducto?>"></div>
			<?php endforeach; ?>
		</div>
	<?php endif;?>
	
	<?php if(!empty($objDetalleProducto->listProductoDetalleVideos)):?>
		<div id="owl-producto-detale-videos-<?= $objDetalleProducto->idProductoDetalle?>" class="owl-carousel slide-videos">
        	<?php foreach ($objDetalleProducto->listProductoDetalleVideos as $objProductoDetalleVideo): ?>
				<div class="item"><iframe width="80%" src="<?= $objProductoDetalleVideo->urlVideo?>"></iframe></div>
			<?php endforeach; ?>
		</div>
	<?php endif;?>  
</div>
<?php endforeach;?>