<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <meta content="es" http-equiv="content-language">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='author' content='La Rebaja Virtual'>
    <?php  if(isset($this->metaTags) && !empty($this->metaTags)):?>
        <?php echo $this->metaTags ?>
    <?php else: ?>
        <meta name="description" content="Pide tus domicilios de farmacia y drogueria de manera rapida y segura. La Rebaja Drogueria despacha tus domicilios con nuestra planta propia de mensajeros. Compra seguro."/>
    <?php endif;?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>";</script>
    <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/clientefiel.css?"); ?>
    <?php //Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/clientefiel.js?"); ?>
</head>
<body>

    <div data-role="page" id="main-page" data-theme="a">
		<div data-role="header" data-position="absolute" data-theme="a">
        		<nav class="nav">
    <!--             <a href="#panel-01" class="menu-button">
                    <div></div>
                    <div></div>
                    <div></div>
                </a> -->
                <a title="Cliente Fiel - La Rebaja Virtual" href="<?php echo $this->createUrl('/clientefiel') ?>" data-ajax=false><img class="img img-responsive clientefiel-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/clientefiel.png" alt=""></a>
                <a class="lrv-logo" title="Drogueria - La Rebaja Virtual" href="<?php echo $this->createUrl('/') ?>" data-ajax=false><img class="img img-responsive lrv-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/lrv.png" alt=""></a>
            </nav>
		</div>
		
		<div data-role="main" id="main-content">
			<div class="ui-content ui-body-a">
    			 	<div class="center-div">
                    <img class="img img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/banner-clientefiel-movil.png" >
                    <!-- <h3 class="banner-text" align="right">El programa que te da 10% de descuento <br> <span class="emphasis">en todas tus compras*</span></h3> -->
                    <div class="banner-link-container">
                        <a href="#dialog-condiciones" data-transition="flip" class="banner-link">* Aplica según términos y condiciones del programa Cliente Fiel</a>
                    </div>
                 </div>
                 <div class="buttons-section">
                    <a data-ajax="false" class="navigation-button <?php echo $this->menuActivo == 'index' ? 'active' : ''  ?>" href="<?php echo Yii::app()->createUrl('clientefiel/sitio/index') ?>">¿Comó funciona?</a>
                    <a data-ajax="false" class="navigation-button <?php echo $this->menuActivo == 'cuenta' ? 'active' : ''  ?>" href="<?php echo Yii::app()->createUrl('clientefiel/registro/realizarRegistro') ?>">Registrate</a>
                 </div>
            	<div class="content">
                    <?php echo $content; ?>
                </div>
            </div>
    		
		</div>
        
        <div data-role="footer">
			<div class="footer-logos">
				<img class="img img-responsive logos" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/copservir.png" alt="">
            </div>
            <div class="footer-section">
                <div class="red-background">
                    <p>Copservir Ltda.&#169; Todos los derechos reservados 2014 <br><b>Políticas de Privacidad</b></p>
                    <br>
                    <p><b>La Rebaja</b> línea de atención al cliente: <br> 01 8000 939 900 y en Cali: (2) 485 2289</p>
                </div>
            </div>
		</div>
	</div>
    
    <?php $this->renderPartial('/sitio/modalCondiciones'); ?>
    <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/clientefiel.js?"); ?>
</body>
</html>
