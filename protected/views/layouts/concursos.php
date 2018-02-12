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
    <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/concursos.css?"); ?>
    <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/concursos.js?"); ?>
</head>
<body>

    <div data-role="page" id="main-page" data-theme="a">

            <div data-role="header" data-theme="h">

</div>
    <nav class="nav">
        <!-- <img class="img img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/barra-sup-ganadores-movil.png" alt=""> -->
        <img class="img img-responsive lrv-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/lrv.png" alt="">
    </nav>

    <div class="banner">
        <img class="img img-responsive banner-image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner-ganadores-movil.png" alt="">
    </div>

    <div class="buttons-section">
        <a href="<?php echo Yii::app()->createUrl('/sitio/ganadores') ?>" data-ajax="false" class="navigation-button">Ganadores del mes</a>
        <a href="<?php echo Yii::app()->createUrl('/sitio/reglamentos') ?>" data-ajax="false" class="navigation-button">Concursos</a>
     <!--    <a href="" class="navigation-button">¿Cómo funciona?</a>
        <a href="" class="navigation-button">Regístrate</a> -->
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
                <p>Copservir Ltda.&#169; Todos los derechos reservados 2014 <br><b>Políticas de Privacidad</b></p>
                <br>
                <p><b>La Rebaja</b> línea de atención al cliente: <br> 01 8000 939 900 y en Cali: (2) 485 2289</p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
