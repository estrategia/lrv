<?php $this->beginContent('application.modules.callcenter.views.layouts.admin'); ?>
  <div class="row" >
  	  <div class="col-xs-4">
	      <div class="btn-group">
	          <a href="<?php echo $this->createUrl('/callcenter/telefarma/sitio/ubicacion')?>" class="btn btn-primary <?php echo ($this->active == "ubicacion" ? "active" : "") ?>">Seleccionar Ubicaci&oacute;n</a>
	          <a href="<?php echo $this->createUrl('/callcenter/telefarma/catalogo/buscar')?>" class="btn btn-primary <?php echo ($this->active == "buscar" ? "active" : "") ?>">Buscar Productos</a>
	          <a href="<?php echo $this->createUrl('/callcenter/telefarma/carro/')?>" class="btn btn-primary <?php echo ($this->active=="carro" ? "active" : "") ?>">Compra</a>
	      </div>
      </div>
      <div class="col-xs-5">
             <form method="get" action="<?php echo CController::createUrl('/callcenter/telefarma/catalogo/buscar') ?>">
                     <div class="row">
                            <div class="col-xs-12 content-search">
                                  <input type="text" class="form-control vitalcall" placeholder="Escriba el nombre del producto"  autocomplete="off" value="" id="busqueda" name="busqueda" > 
                            </div>
                      </div>
             </form>
      </div>
      <div class="col-xs-3">
          <div class="top_ubicacion">
                     <?php if (!$this->objSectorCiudad == null): ?>
                     <?php echo $this->sectorName ?>
                     <?php endif; ?>
           </div>
      </div>
      
  </div>
  <?php echo $content ?>
<?php $this->endContent(); ?>
<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/telefarma.css");?>