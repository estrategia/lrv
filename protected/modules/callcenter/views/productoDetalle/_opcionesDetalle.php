<div class=rigth>
	<div class="btn-group">
		<a href="<?php echo $this->createUrl('/callcenter/productoDetalle/editar', array('idProductoDetalle' => $idProductoDetalle)) ?>" class="btn btn-xs btn-primary <?php echo ($opcion=="contenido" ? "active" : "") ?>">Contenido</a>
		<a href="<?php echo $this->createUrl('/callcenter/productoDetalleImagenes/admin', array('idProductoDetalle' => $idProductoDetalle)) ?>" class="btn btn-xs btn-primary <?php echo ($opcion=="imagenes" ? "active" : "") ?>" >Imagenes</a>
		<a href="<?php echo $this->createUrl('/callcenter/productoDetalleVideos/admin', array('idProductoDetalle' => $idProductoDetalle)) ?>" class="btn btn-xs btn-primary <?php echo ($opcion=="videos" ? "active" : "") ?>" >Videos</a>
	</div>
</div>