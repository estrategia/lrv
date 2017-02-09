<div class="modal animated bounceIn" id="modal-ubicacion-barrios">
    <div class="modal-dialog" style="width: 35% !important; min-width:400px">
        <div class="modal-content">
            <div class="modal-body">
            	<form>
                  	<div class="row">
                    	<div class="form-group col-sm-12 col-xs-12">
                      		<select id="selector-ciudad"style="width: 100%;" required>
                          		<option value="">Seleccione ciudad ...</option>
                          		<?php foreach ($ciudades as $ciudad): ?>
                              		<option value="<?php echo $ciudad->codigoCiudad ?>"><?php echo $ciudad->nombreCiudad ?></option>
                          		<?php endforeach; ?>
                      		</select>
                    	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-sm-12 col-xs-12">
	                      <input type="text" class="form-control input-sm" name="barrio" placeholder="Escribe el nombre del barrio">
	                    </div>
                  	</div>
                 	<div id="ubicacion-barrios-respuesta" class="row">
                  		
                  	</div>
                  	
                  	<div class="row">
	                  	<div class="form-group">
		                  	<div class="col-sm-offset-4 col-sm-8 col-xs-offset-4 col-xs-8">
			                  	<button class="btn btn-primary" data-role="ubicacion-barrio">Buscar</button>
			                	<button class="btn btn-default" data-dismiss="modal">Cancelar</button>
		                  	</div>
	                  	</div>
                  	</div>
    			</form>
                
            </div>
        </div>
    </div>
</div>