<?php
/* @var $this ComprasController */
/* @var $model Compras */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->idCompra,
);

?>

<h1>Pedido #<?php echo $model->idCompra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCompra',
		'identificacionUsuario',
		'fechaCompra',
		'codigoCiudad',
	),
)); ?>
<?php //CVarDumper::dump($productos,10,true) ?>
<table class="table">
	<td> 
		<div class="col-md-6">
			<strong>Datos del Remitente</strong> <br>
			
        		<?php if ($objCompra->invitado): ?>
                	<strong>Invitado: </strong>S&iacute;<br>
                	<strong>C&eacute;dula: </strong><?php echo $objCompra->identificacionUsuario ?><br>
                	<strong>Nombre: </strong><?php echo $objCompra->objCompraDireccion->nombre ?><br>
                	<strong>Correo: </strong><?php echo $objCompra->objCompraDireccion->correoElectronico ?> <br/>
            	<?php else: ?>
            		<strong>Invitado: </strong>No<br>
                	<strong>C&eacute;dula: </strong><?php echo $objCompra->identificacionUsuario ?><br>
                	
                	<?php if(isset($objCompra->objUsuario)):?>
                		<strong>Nombre: </strong><?php echo $objCompra->objUsuario->nombre . " " . $objCompra->objUsuario->apellido ?><br>
                		<strong>Correo: </strong><?php echo $objCompra->objUsuario->correoElectronico ?> <br/>
            		<?php endif;?>
            		
                	<?php if(isset($objCompra->objComprasRemitente)):?>
                		<strong>Recogida: </strong> <?php echo $objCompra->objComprasRemitente->recogida == 1 ? "Si":"No"?><br>
                 		<?php if($objCompra->objComprasRemitente->recogida == 1):?>
                 				<strong>Direcci&oacute;n: </strong><?php echo $objCompra->objComprasRemitente->direccionRemitente ?><br>
                 				<strong>Barrio: </strong><?php echo $objCompra->objComprasRemitente->barrioRemitente ?><br>
                 		<?php endif;?>
                 	<strong>Tel&eacute;fono: </strong><?php echo $objCompra->objComprasRemitente->telefonoRemitente ?><br>
                 <?php endif;?>   
            <?php endif; ?>
            <strong>TipoEntrega: </strong><?php echo Yii::app()->params->entrega["tipo"][$objCompra->tipoEntrega] ?> 

        </div>
        <?php if ($objCompra->objCompraDireccion !== null): ?>
            <div class="col-md-6">
                <strong>Datos del Destinatario</strong> <br>
                <strong>Nombre: </strong><?php echo $objCompra->objCompraDireccion->nombre ?> <br>
                <strong>Direcci&oacute;n: </strong><?php echo $objCompra->objCompraDireccion->direccion . " - " . $objCompra->objCompraDireccion->barrio ?><br>
                <strong>Tel&eacute;fono: </strong> <?php echo $objCompra->objCompraDireccion->telefono ?> - <strong>Celular: </strong> <?php echo $objCompra->objCompraDireccion->celular ?><br>
                <?php if ($objCompra->objCompraDireccion->objCiudad != null): ?>
                    <strong>Ciudad: </strong><?php echo $objCompra->objCompraDireccion->objCiudad->nombreCiudad . " - " . $objCompra->objCompraDireccion->objSector->nombreSector ?><br/>
                <?php else: ?>
                    <strong>Ciudad: </strong> NA <br/>
                <?php endif; ?>
                <?php if(isset($objCompra->objComprasRemitente) && isset($objCompra->objComprasRemitente->puntoVentaDestino)):?>
                <?php $puntoVenta = PuntoVenta::model()->find('idComercial ="'.$objCompra->objComprasRemitente->puntoVentaDestino.'"')?>
                	<strong>Destino: </strong> <?php echo $objCompra->objComprasRemitente->puntoVentaDestino ?> - <?php echo $puntoVenta->nombrePuntoDeVenta?>
                <?php endif;?>
            </div>
        <?php else: ?>
            <div class="col-md-6">
                <strong>Datos del Destinatario</strong> <br>
                <strong>Ciudad: </strong><?php echo $objCompra->objCiudad->nombreCiudad . " - " . $objCompra->objSector->nombreSector ?>
            </div>
        <?php endif; ?>
        	
    </td>
</table>
<table class="table">
	<thead>
		<tr>
			<th>
				Codigo Producto
			</th>		
			<th>
				Producto
			</th>
			<th>
				Cantidad
			</th>
			<th>
				Estado
			</th>
			<th>
				Numero de Guía
			</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($productos as $key => $producto): ?>
		<tr>
			<td>
				<?php echo $producto->codigoProducto; ?>
			</td>
			<td>
				<?php echo $producto->descripcion; ?>
			</td>
			<td>
				<?php echo $producto->unidades; ?>
			</td>
			<td>
				<div class="form-inline">
					<select class="form-control input-sm" name="" id=""></select>
					<button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
				</div>
			</td>
			<td>
				<div class="form-inline">
					<input type="text" class="form-control input-sm">
					<button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
				</div>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>


