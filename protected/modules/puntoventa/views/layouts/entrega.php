<?php $this->beginContent('application.modules.puntoventa.views.layouts.admin'); ?>
  <div class="row" >
  	  <div class="col-xs-4">
	      <div class="btn-group">
	          <a href="<?php echo $this->createUrl('/puntoventa/entreganacional/pedido/ubicacion')?>" class="btn btn-primary <?php echo ($this->active == "ubicacion" ? "active" : "") ?>">Seleccionar Ubicaci&oacute;n</a>
	          <a href="<?php echo $this->createUrl('/puntoventa/entreganacional/catalogo/buscar')?>" class="btn btn-primary <?php echo ($this->active == "buscar" ? "active" : "") ?>">Buscar Productos</a>
	          <a href="<?php echo $this->createUrl('/puntoventa/entreganacional/carro/')?>" class="btn btn-primary <?php echo ($this->active=="carro" ? "active" : "") ?>">Compra</a>
	      </div>
      </div>
      <?php if($this->active == "buscar"):?>
      <div class="col-xs-5">
             <form method="get" action="<?php echo CController::createUrl('/puntoventa/entreganacional/catalogo/buscar') ?>">
                     <div class="row">
                            <div class="col-xs-12 content-search">
                              <div class="col-xs-11" style="padding: 0;">
                                  <input type="text" class="form-control vitalcall" placeholder="Escriba el nombre del producto"  autocomplete="off" value="" id="busqueda" name="busqueda" >
                              </div>
                              <div class="col-xs-1" style="padding: 0;margin-left: -62px;margin-top: -7px;">
                                  <img class="ico-buscar" src="/lrv/images/desktop/ico-buscar.png">
                              </div>
                            </div>
                      </div>
             </form>
      </div>
      <div class="col-xs-3">
          <div class="top_ubicacion">
                     <?php if (!$this->objPuntoVentaDestino == null): ?>
                     <?php echo $this->objPuntoVentaDestino->nombrePuntoDeVenta ?>
                     <?php endif; ?>
           </div>
      </div>
      <?php endif;?>
  </div>
  <?php echo $content ?>
<?php $this->endContent(); ?>
<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/telefarma.css");?>
