<div class="container">
    <div class="row">
        <div class="space-1"></div>
        <section class="selectedUbicacion">
            <div class="center">
                <h3 style="font-size: 19px;">SELECCIONA LA UBICACI&Oacute;N DONDE DESEAS COTIZAR</h3>
            </div>
            <div class="blocktipoentrega">
              <div class="row">
	            	<div class="col-md-12">

			           		<div class="">
			               		<?php echo Select2::dropDownList('select-georeferencia-ciudad', '', $listDataCiudad, array('prompt' => 'Seleccione ciudad', 'id' => 'select-georeferencia-ciudad', 'style' => 'width: 100%;')) ?>
			                </div>

	            	</div>
            	</div>
            	<div class="space-1"></div>
            	<div class="row">
            		<!-- <div class="col-md-12"> -->
		            	<div class="">
			            	<div class="col-md-10">
		                		<input type="text" value="" id="input-georeferencia-direccion" placeholder="direcci&oacute;n" class="form-control input-sm">
		                	</div>
		                	<div class="col-md-2" style="padding: 0;">
		                		<button type="button" style="color: #51a351" class="btn btn-sm" data-role="ubicacion-geodireccion"><i class="glyphicon glyphicon-search"></i> Buscar</button>
		                	</div>
		            	</div>
		            <!-- </div> -->
                </div>
                <div class="row">
            		<!-- <div class="col-md-12"> -->
		            	<div class="" >
			            	<div class="col-md-10">
		                		<input type="text" value="" id="input-georeferencia-barrio" placeholder="barrio" class="form-control input-sm">
		                	</div>
		                	<div class="col-md-2" style="padding: 0;">
		                		<button type="button" style="color: #51a351" class="btn btn-sm" data-role="ubicacion-geobarrio"><i class="glyphicon glyphicon-search"></i> Buscar</button>
		                	</div>
		            	</div>
		            <!-- </div> -->
                </div>
                <div class="space-1"></div>
                 <div class="row">
                  <form id="form-ubicacion"  method="post" action="<?php echo $this->createUrl("/sitio/ubicacionSeleccion") ?>">
	                    <div class="col-md-12">
	                        <?php echo Select2::dropDownList('select-pdv-asignar', null, CHtml::listData($listPdv, 'idComercial', function($model) {
	                                    return "$model->idComercial - $model->nombrePuntoDeVenta";
	                                }), array('prompt' => 'Seleccione punto de venta', 'id' => 'select-pdv-asignar', 'style' => 'width: 100%;')) ?>
	                    </div>
                    </form>
                 </div>
                 <div class="space-1"></div>
                 <div class="row">
                    <div class="col-md-12">
						<button type="button" class="btn btn-primary" style="margin: 0 auto;display: block;" data-role="ubicacion-seleccion-georeferencia">Confirmar ubicaci&oacute;n</button>
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
        </section>
    </div>

</div>

<?php //Yii::app()->clientScript->registerScript('analytics-compra', "$('#select-georeferencia-ciudad').select2();"); ?>
