<div class="modal animated bounceIn" id="modal-georeferencia">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title center">Georeferencia</h1>
            </div>
            <div class="modal-body">
            	<div class="row">
	            	<div class="col-md-12">
		            	<div class="center-div" style="width: 50%;">
			           		<div class="center-div">
			               		<?php echo Select2::dropDownList('select-georeferencia-ciudad', '', $listDataCiudad, array('prompt' => 'Seleccione ciudad', 'id' => 'select-georeferencia-ciudad', 'style' => 'width: 100%;')) ?>
			                </div>
		            	</div>
	            	</div>
            	</div>
            	<div class="space-1"></div>
            	<div class="row">
            		<div class="col-md-12">
		            	<div class="center-div" style="width: 70%;">
			            	<div class="col-md-8">
		                		<input type="text" value="" id="input-georeferencia-direccion" placeholder="direcci&oacute;n" class="form-control input-sm">
		                	</div>
		                	<div class="col-md-4">
		                		<button type="button" style="color: #51a351" class="btn btn-sm" data-role="ubicacion-geodireccion"><i class="glyphicon glyphicon-search"></i> Buscar</button>
		                	</div>
		            	</div>
		            </div>
                </div>
                <div class="row">
            		<div class="col-md-12">
		            	<div class="center-div" style="width: 70%;">
			            	<div class="col-md-8">
		                		<input type="text" value="" id="input-georeferencia-barrio" placeholder="barrio" class="form-control input-sm">
		                	</div>
		                	<div class="col-md-4">
		                		<button type="button" style="color: #51a351" class="btn btn-sm" data-role="ubicacion-geobarrio"><i class="glyphicon glyphicon-search"></i> Buscar</button>
		                	</div>
		            	</div>
		            </div>
                </div>
                <div class="space-1"></div>
                <div class="row">
                	<div class="col-md-12">
                		<div id="georeferencia-seleccion-text" class="center-div text-center" style="width: 70%;"></div>
                		<input id="georeferencia-seleccion-ciudad" type="hidden" name="ciudad" value="">
            			<input id="georeferencia-seleccion-sector" type="hidden" name="sector" value="">
                	</div>
                </div>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                <button type="button" class="btn btn-primary" data-role="ubicacion-seleccion-georeferencia">Confirmar ubicaci&oacute;n</button>
            </div>
        </div>
    </div>
</div>