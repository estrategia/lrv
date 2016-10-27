
<?php $this->beginContent('application.modules.callcenter.views.layouts.admin'); ?>
			<div class="container">
    			<div id="content">
					<div class="form-group">
		                <div class="center">
		                    <?php if(!empty($params['model']->titulo)):?>
		                    <strong><?php echo $params['model']->titulo ?></strong>
		                    <br/>
		                    <?php endif;?>
		                    <div class="btn-group">
		                        <a href="<?php echo $this->createUrl('/callcenter/telefarma/sitio/ubicacion')?>" class="btn btn-primary <?php echo ($this->active == "ubicacion" ? "active" : "") ?>">Seleccionar Ubicaci&oacute;n</a>
		                        <a href="<?php echo $this->createUrl('/callcenter/telefarma/catalogo/buscar')?>" class="btn btn-primary <?php echo ($this->active == "buscar" ? "active" : "") ?>">Buscar Productos</a>
		                        <a href="<?php echo $this->createUrl('/callcenter/telefarma/carro/')?>" class="btn btn-primary <?php echo ($this->active=="carro" ? "active" : "") ?>">Compra</a>
		                    </div> 
		                </div>
		                <?php echo $content ?>
		            </div>
		        </div>
		      </div>
<?php $this->endContent(); ?>