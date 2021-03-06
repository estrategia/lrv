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
    <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/clientefiel_desktop.js?"); ?>
    <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/desktop-clientefiel.css?"); ?>
</head>
<body>
    <nav class="nav">
      <div class="contenedor-flex" style="display: flex; justify-content: center;">
      	<a title="Cliente Fiel - La Rebaja Virtual" href="<?php echo $this->createUrl('/clientefiel') ?>"><img class="img img-responsive clientefiel-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/clientefiel.png" alt=""></a>
      	<a title="Drogueria - La Rebaja Virtual" href="<?php echo $this->createUrl('/') ?>"><img class="img img-responsive lrv-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/lrv.png" alt=""></a>
      </div>
    </nav>

    <div class="banner">
      <div class="contenedor-flex txt-banner">
        <h3 class="banner-text">El programa que te da 10% de descuento <br> <span class="emphasis">en todas tus compras*</span></h3>
        <a href="#modalCondiciones" data-toggle="modal" data-target="#modalCondiciones" class="banner-link">* Aplica según términos y condiciones del programa Cliente Fiel</a>
      </div>
    </div>

    <div class="menu-principal">
      <div class="contenedor-flex">
        <div class="row-flex menu">
          <div class="">
            <a href="<?php echo Yii::app()->createUrl('clientefiel/sitio/index') ?>">
              <img class="img-responsive" width="400" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/boton-funciona.png" alt="Como funciona">
            </a>
          </div>

          <div class="">
            <a href="<?php echo Yii::app()->createUrl('clientefiel/registro/realizarRegistro') ?>">
              <img class="img-responsive" width="400" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/boton-registrate.png" alt="Registrarse">
            </a>
          </div>


        </div>
      </div>
    </div>

    <div class="content">
        <?php echo $content; ?>
    </div>

    <footer class="footer">
        <div class="footer-logos">
            <img class="img img-responsive logos" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/copservir.png" alt="">
        </div>
        <div class="footer-section red-background">
            <div class="footer-text">
                <p>Copservir Ltda.&#169; Todos los derechos reservados 2014 - <b>Políticas de Privacidad</b></p>
                <p><b>La Rebaja</b> línea de atención al cliente 01 8000 939 900 y en Cali: (2) 485 2289</p>
            </div>
        </div>
    </footer>

    <?php $this->renderPartial('/sitio/d_modalCondiciones'); ?>
</body>
</html>
