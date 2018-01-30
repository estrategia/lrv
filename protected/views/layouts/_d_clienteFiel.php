<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <meta content="es" http-equiv="content-language">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='author' content='La Rebaja Virtual'>
    <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/desktop-clientefiel.css?"); ?>
</head>
<body>
    <nav class="nav">
        <img class="img img-responsive clientefiel-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/clientefiel.png" alt="">
        <img class="img img-responsive lrv-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/lrv.png" alt="">
    </nav>
    <div class="banner">
        <img class="img img-responsive banner-image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/banner-clientefiel.png" alt="">
        <h3 class="banner-text" align="right">El programa que te da 10% de descuento <br> <span class="emphasis">en todas tus compras*</span></h3>
        <a href="" class="banner-link">* Aplica según términos y condiciones del programa Cliente Fiel</a>
    </div>
    
    <div class="buttons-section">
        <a href="">
            <img class="img img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/boton-funciona.png" alt="">
        </a>
        <a href="">
            <img class="img img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientefiel/boton-registrate.png" alt="">
        </a>
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
</body>
</html>