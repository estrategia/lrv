
<?php foreach($objProducto->listDetalleProducto as $objDetalleProducto): ?>
<div data-role='collapsible' data-iconpos='right' data-collapsed-icon='carat-d' data-expanded-icon='carat-u' class='c_cont_dtl_prod ui-nodisc-icon ui-alt-icon'>

	<h3><?= $objDetalleProducto->titulo ?></h3>
	<p><?= $objDetalleProducto->contenidoMovil?></p>
                
	<?php if(!empty($objDetalleProducto->listProductoDetalleImagenes)):?>
	<div id="slide-imagenes-detalleimagenes-<?= $objDetalleProducto->idProductoDetalle?>" class="owl-carousel owl-theme owl-productodetalle">
        <?php foreach ($objDetalleProducto->listProductoDetalleImagenes as $objProductoDetalleImagen): ?>
            <div class="item">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos']['detalleImagenes'] . $objProducto->codigoProducto . "/" . $objProductoDetalleImagen->rutaImagenMovil; ?>" alt="detalle-producto-<?= $objProducto->descripcionProducto?>" title="detalle-producto-<?= $objProducto->descripcionProducto?>">
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif;?>  
	
	
	<?php if(!empty($objDetalleProducto->listProductoDetalleVideos)):?>
		<div id="slide-imagenes-detallevideos-<?= $objDetalleProducto->idProductoDetalle?>" class="owl-carousel owl-theme owl-productodetalle">
        	<?php foreach ($objDetalleProducto->listProductoDetalleVideos as $objProductoDetalleVideo): ?>
				<div class="item"><iframe width="80%" src="<?= $objProductoDetalleVideo->urlVideo?>"></iframe></div>
			<?php endforeach; ?>
		</div>
	<?php endif;?>  
</div>
<?php endforeach;?>

