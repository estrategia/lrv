<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta charset="utf-8" />

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon_16.ico" type="image/x-icon" /> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>"; gmapKey = "<?php echo Yii::app()->params['google']['llaveMapa']; ?>"; tipoEntrega = {presencial:<?=Yii::app()->params->entrega['tipo']['presencial']?>,domicilio:<?=Yii::app()->params->entrega['tipo']['domicilio']?>}</script>
        <link id="bs-css" href="<?php echo Yii::app()->request->baseUrl; ?>/libs/charisma/css/bootstrap-simplex.min.css" rel="stylesheet" />

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/operator.css"); ?>
        <link id="bs-css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vitalcall.css" rel="stylesheet" />
    </head>

    <body>
        <div id="container" class="ch-container">
            <div class="col-lg-12">
                <img class="center" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_lrv.png" alt="La Rebaja Virtual Logo" />
            </div>
            <div class="col-lg-12">
            <div class="box-content row" id='botones-modulos'>
		        <div class="col-md-12">
		            <div class="form-group">
		                <div class="center">
		                    <?php if(!empty($params['model']->titulo)):?>
		                    <strong><?php echo $params['model']->titulo ?></strong>
		                    <br/>
		                    <?php endif;?>
		                    <div class="btn-group">
		                        <a href="<?php echo $this->createUrl('/callcenter/telefarma/sitio/ubicacion')?>" class="btn btn-primary <?php echo ($this->active=="ubicacion" ? "active" : "") ?>">Seleccionar Ubicaci&oacute;n</a>
		                        <a href="<?php echo $this->createUrl('/callcenter/telefarma/catalogo/buscar')?>" class="btn btn-primary <?php echo ($this->active=="buscar" ? "active" : "") ?>">Buscar Productos</a>
		                        <a href="<?php echo $this->createUrl('/callcenter/telefarma/carro/')?>" class="btn btn-primary <?php echo ($this->active=="carro" ? "active" : "") ?>">Compra</a>
		                    </div> 
		                </div>
		
		                <?php echo $content ?>
		                
		            </div>
		        </div>
		    </div>
                
            </div>
        </div>
    </body>
</html>