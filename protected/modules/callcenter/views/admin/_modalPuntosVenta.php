<div class="modal fade" id="modal-pdv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog"  style='width:50%' role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Productos por puntos de venta</h4>
          </div>
           <!-- <form id="form-categoria" method="post" name="cargarproducto" enctype="multipart/form-data"> -->
                
          <div class="modal-body" id='pre-contenido-modal'>  
          <table class="table table-input table-bordered table-hover table-striped">
		    <tbody>
		        <tr>
		            <th>Código</th>
		            <th>Producto</th>
		            <th>Cantidad</th>
		            <th>Subtotal</th>
		            <th>Punto de venta</th>
		         </tr>
               <?php foreach($puntosVenta as $pdv):?>
              	<tr>
              		<?php if($pdv->objProducto->fraccionado == 1):?>
              			<td rowspan='2'><?php echo $pdv->codigoProducto?></td>
			            <td rowspan='2'><?php echo $pdv->objProducto->descripcionProducto?></td>
			            <td>
			            	<input id="cantidad-item-unidad-vap-<?php echo $pdv->idCompraPuntoVenta ?>" type="text" 
			            		style="width:100px" value="<?php echo $pdv->cantidadUnidad ?>" > 
			            		<button type="button" data-role="modificarpedidovap" data-action="11" 
			            		data-item="<?php echo $pdv->idCompraPuntoVenta ?>" 
			            		class="btn btn-default btn-sm">
			            	<i class="glyphicon glyphicon-refresh"></i></button> 
			            </td>
			            <td><?php echo $pdv->subTotalUnidades?></td>
			            <td rowspan='2'><?php echo $pdv->idComercial?></td>
			            </tr>
			            	<td>
			            	<input id="cantidad-item-unidad-vap-<?php echo $pdv->idCompraPuntoVenta ?>" type="text" 
			            		style="width:100px" value="<?php echo $pdv->cantidadFraccion ?>" > 
			            		<button type="button" data-role="modificarpedidovap" data-action="12" 
			            		data-item="<?php echo $pdv->idCompraPuntoVenta ?>" 
			            		class="btn btn-default btn-sm">
			            	<i class="glyphicon glyphicon-refresh"></i></button> 
				            </td>
				            <td><?php echo $pdv->subTotalUnidades?></td>
			            <tr>
			            
			            </tr>
              		<?php else:?>
			            <td><?php echo $pdv->codigoProducto?></td>
			            <td><?php echo $pdv->objProducto->descripcionProducto?></td>
			            <td>
			            	<input id="cantidad-item-unidad-vap-<?php echo $pdv->idCompraPuntoVenta ?>" type="text" 
			            		style="width:100px" value="<?php echo $pdv->cantidadUnidad ?>" > 
			            		<button type="button" data-role="modificarpedidovap" data-action="11" 
			            		data-item="<?php echo $pdv->idCompraPuntoVenta ?>" 
			            		class="btn btn-default btn-sm">
			            	<i class="glyphicon glyphicon-refresh"></i></button> 
			            </td>
			            <td><?php echo $pdv->subTotalUnidades?></td>
			            <td><?php echo $pdv->idComercial?></td>
		            <?php endif;?>
		         </tr>
              	<?php endforeach; ?>
              	
              	</tbody>
           </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          <!--  </form> -->
              
        </div>
      </div>
    </div>