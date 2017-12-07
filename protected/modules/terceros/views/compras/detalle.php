<?php
/* @var $this ComprasController */
/* @var $model Compras */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->idCompra,
);

?>

<h1>Pedido #<?php echo $model->idCompra; ?></h1>

<?php //CVarDumper::dump($productos,10,true) ?>
<table class="table">
	<td> 
		<div class="col-md-6">
			<strong>Datos del Remitente</strong> <br>
			
        		<?php if ($model->invitado): ?>
                	<strong>Invitado: </strong>S&iacute;<br>
                	<strong>C&eacute;dula: </strong><?php echo $model->identificacionUsuario ?><br>
                	<strong>Nombre: </strong><?php echo $model->objCompraDireccion->nombre ?><br>
                	<strong>Correo: </strong><?php echo $model->objCompraDireccion->correoElectronico ?> <br/>
            	<?php else: ?>
            		<strong>Invitado: </strong>No<br>
                	<strong>C&eacute;dula: </strong><?php echo $model->identificacionUsuario ?><br>
                	
                	<?php if(isset($model->objUsuario)):?>
                		<strong>Nombre: </strong><?php echo $model->objUsuario->nombre . " " . $model->objUsuario->apellido ?><br>
                		<strong>Correo: </strong><?php echo $model->objUsuario->correoElectronico ?> <br/>
            		<?php endif;?>
            		
                	<?php if(isset($model->objComprasRemitente)):?>
                		<strong>Recogida: </strong> <?php echo $model->objComprasRemitente->recogida == 1 ? "Si":"No"?><br>
                 		<?php if($model->objComprasRemitente->recogida == 1):?>
                 				<strong>Direcci&oacute;n: </strong><?php echo $model->objComprasRemitente->direccionRemitente ?><br>
                 				<strong>Barrio: </strong><?php echo $model->objComprasRemitente->barrioRemitente ?><br>
                 		<?php endif;?>
                 	<strong>Tel&eacute;fono: </strong><?php echo $model->objComprasRemitente->telefonoRemitente ?><br>
                 <?php endif;?>   
            <?php endif; ?>
            <strong>TipoEntrega: </strong><?php echo Yii::app()->params->entrega["tipo"][$model->tipoEntrega] ?> 

        </div>
        <?php if ($model->objCompraDireccion !== null): ?>
            <div class="col-md-6">
                <strong>Datos del Destinatario</strong> <br>
                <strong>Nombre: </strong><?php echo $model->objCompraDireccion->nombre ?> <br>
                <strong>Direcci&oacute;n: </strong><?php echo $model->objCompraDireccion->direccion . " - " . $model->objCompraDireccion->barrio ?><br>
                <strong>Tel&eacute;fono: </strong> <?php echo $model->objCompraDireccion->telefono ?> - <strong>Celular: </strong> <?php echo $model->objCompraDireccion->celular ?><br>
                <?php if ($model->objCompraDireccion->objCiudad != null): ?>
                    <strong>Ciudad: </strong><?php echo $model->objCompraDireccion->objCiudad->nombreCiudad . " - " . $model->objCompraDireccion->objSector->nombreSector ?><br/>
                <?php else: ?>
                    <strong>Ciudad: </strong> NA <br/>
                <?php endif; ?>
                <?php if(isset($model->objComprasRemitente) && isset($model->objComprasRemitente->puntoVentaDestino)):?>
                <?php $puntoVenta = PuntoVenta::model()->find('idComercial ="'.$model->objComprasRemitente->puntoVentaDestino.'"')?>
                	<strong>Destino: </strong> <?php echo $model->objComprasRemitente->puntoVentaDestino ?> - <?php echo $puntoVenta->nombrePuntoDeVenta?>
                <?php endif;?>
            </div>
        <?php else: ?>
            <div class="col-md-6">
                <strong>Datos del Destinatario</strong> <br>
                <strong>Ciudad: </strong><?php echo $model->objCiudad->nombreCiudad . " - " . $model->objSector->nombreSector ?>
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
			<th>
				Operador Logistico
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
					<?php echo CHtml::dropDownList('estado-producto-tercero', $producto->idEstadoItemTercero, $estadosProducto, ['class' => 'input-sm form-control']); ?>
					<button class="btn btn-default btn-sm" data-codigo-producto-tercero="<?php echo $producto->idCompraItem ?>" data-role="actualizar-estado-producto-tercero"><i class="glyphicon glyphicon-refresh"></i></button>
				</div>
			</td>
			<td>
				<div class="form-inline">
					<?php echo CHtml::textField('numero-guia-producto-tercero', $producto->numeroGuia, ['class' => 'form-control input-sm']); ?>
					<button class="btn btn-default btn-sm" data-codigo-producto-tercero="<?php echo $producto->idCompraItem ?>" data-role="actualizar-numero-guia-producto-tercero"><i class="glyphicon glyphicon-refresh"></i></button>
				</div>
			</td>
			<td>
				<div class="form-inline">
					<?php echo CHtml::textField('operador-logistico-producto-tercero', $producto->operadorLogistico, ['class' => 'form-control input-sm']); ?>
					<button class="btn btn-default btn-sm" data-codigo-producto-tercero="<?php echo $producto->idCompraItem ?>" data-role="actualizar-operador-logistico-producto-tercero"><i class="glyphicon glyphicon-refresh"></i></button>
				</div>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>


