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
    <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/desktop_concursos.js?"); ?>
    <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/desktop-concursos.css?"); ?>
</head>
<body>

<div class="bg-header">
  <a title="Drogueria - La Rebaja Virtual" href="<?php echo $this->createUrl('/') ?>">
    <img class="lrv-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/lrv.png" alt="">
  </a>
</div>
<img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner-ganadores.png">

<div class="menu-principal">
  <div class="contenedor-flex" style="justify-content: space-around; align-items: center; padding: 20px 0 0;">
    <a href="<?php echo Yii::app()->createUrl('/sitio/reglamentos') ?>">
      <img width="400" src="<?php echo Yii::app()->request->baseUrl; ?>/images/btn-reglamentos.png" alt="">
    </a>
    <a href="<?php echo Yii::app()->createUrl('/sitio/ganadores') ?>">
      <img width="400" src="<?php echo Yii::app()->request->baseUrl; ?>/images/btn-ganadores.png" alt="">
    </a>
  </div>
</div>

<div class="content">
  <?php echo $content; ?>
</div>

    <footer class="footer">
        <div class="footer-section red-background">
            <div class="footer-text">
                <p>Copservir Ltda.&#169; Todos los derechos reservados 2014 - <b>Políticas de Privacidad</b></p>
                <p><b>La Rebaja</b> línea de atención al cliente 01 8000 939 900 y en Cali: (2) 485 2289</p>
            </div>
        </div>
    </footer>

</body>
</html>
