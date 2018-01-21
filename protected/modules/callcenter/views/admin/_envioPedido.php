<div class="row">
<div class="col-md-12">

<div class="space-1"></div>

<?php foreach($arrayTrack as $track):?>
		<?php if(count($track['Despacho']) > 0):?>
	
       <table class="table table-bordered table-striped">
       		<thead>
		          	<th >Guia: <br/><span id='No-<?php echo $track['Despacho']->idCompraDespacho?>' >
		          			<?php echo $track['Despacho']->numeroGuia?>
		          		</span>
		          	<?php if(empty($track['Despacho']->numeroGuia)):?>
		          		<input class='form-control'  id='guia-<?php echo $track['Despacho']->idCompraDespacho?>'/>
		          	<?php endif;?>
		          	
		          	</th>
		          	
		          	<th>Valor Flete: <br/>$ <?php echo $track['Despacho']->valorFlete?></th>
		          	<th>Fecha Entrega Inicial: <br/><?php echo $track['Despacho']->fechaMinimaEntrega?></th>
		          	<th>Fecha Entrega Final: <br/><?php echo $track['Despacho']->fechaMaximaEntrega?></th>
		       		<th>Lugar de Despacho: <br/><?php echo $track['Despacho']->objBodega->nombreBodega?></th>
		       		<th>Ciudad de Despacho:<br/><?php echo $track['Despacho']->objBodega->objCiudad->nombreCiudad?></th>
		       		<?php if(empty($track['Despacho']->numeroGuia)):?>
		       		<th id='update-guia-<?php echo $track['Despacho']->idCompraDespacho?>'>
		       			<a data-role='actualizar-guia' class='btn btn-info' data-guia='<?php echo $track['Despacho']->idCompraDespacho?>' >
		       				Actualizar Gu&iacute;a
		       			</a>	
		       		</th>
		       		<?php endif;?>
		    </thead>
       </table>
       
	       <?php if(isset($track['Rastreo'])):?>
	        <div class="row">
	        
	        
	            <div class="col-md-12">
	                <table class="table table-bordered table-striped">
	                    
	                        <thead>
		                        <th   class="text-center">Movimiento</th>
		                        <th   class="text-center">Ubicaci&oacute;n</th>
		                        <th   class="text-center">Fecha de Movimiento</th>
	                        </thead>
	                        <tbody>
	                        
	                        	<?php foreach($track['Rastreo'] as $rastreo):?>
	                        	<tr>
		                           <td> <?php echo $rastreo->NomMov?></td>
		                           <td> <?php echo $rastreo->DesMov ?></td>
		                           <td> <?php  echo $rastreo->FecMov?></td>
	                           </tr>
	                           <?php endforeach;?>
	                        </tbody>
	                        <thead>
	                </table>
	            </div>
	        </div>
	        <?php endif;?>
        <?php endif;?>
	<?php endforeach;?>
	
	
    </div>
</div>

<label>Productos con despacho de Bodega:</label>

<?php if(isset($productosBodega)):?>
	        <div class="row">
	        
	        
	            <div class="col-md-12">
	                <table class="table table-bordered table-striped">
	                    
	                        <thead>
		                        <th   class="text-center">Codigo Producto</th>
		                        <th   class="text-center">Producto</th>
		                        <th   class="text-center">Bodega virtual</th>
		                        <th   class="text-center">Unidades</th>
	                        </thead>
	                        <tbody>
	                        
	                        	<?php foreach($productosBodega as $producto):?>
	                        	<tr>
		                           <td> <?php echo $producto->codigoProducto?></td>
		                           <td> <?php echo $producto->objProducto->descripcionProducto ?></td>
		                           <td> <?php  echo $producto->objBodega->nombreBodega?></td>
		                           <td> <?php  echo $producto->cantidad?></td>
	                           </tr>
	                           <?php endforeach;?>
	                        </tbody>
	                        <thead>
	                </table>
	            </div>
	        </div>
	        <?php endif;?>

<div class="space-1"></div>
