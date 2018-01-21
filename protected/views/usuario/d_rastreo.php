<div class="row">
    <div class="col-md-12">

        <div class="space-1"></div>

	<?php foreach($arrayTrack as $track):?>
		<?php if(count($track['Despacho']) > 0):?>
	
       <div class="row">
       		<label>Guia:</label> <?php echo $track['Despacho']->numeroGuia?><br/>
       		<label>Despacho:</label><?php echo $track['Despacho']->objBodega->nombreBodega?><br/>
       		<label>Ciudad:</label><?php echo $track['Despacho']->objCiudad->nombreCiudad?><br/>
       </div>
       
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

<div class="space-1"></div>
