<?php $this->pageTitle = "Ensure - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Nutrición Especializada que te ayuda a recuperar la fuerza que necesitas fortaleciendo tus músculos para que sigas con tu rutina sin que tu cuerpo te detenga.'>
  <meta name='keywords' content='Ensure, Ensure Advance, ensure liquido.'>
	<style>
		@font-face { font-family:BrandonGrotesque-Bold ; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/BrandonGrotesque-Bold.otf);}
    @font-face {font-family: brandonGrotesque-regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/ensure/fonts/brandonGrotesque-regular.otf);}
    @font-face {font-family: brandon_grotesque_bold_italic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/ensure/fonts/brandon_grotesque_bold_italic.ttf);}
    @font-face {font-family: mercury-text-italic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/ensure/fonts/mercury-text-italic.ttf);}
    @font-face {font-family:helvetica-neue-LT-Std-medium-italic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/ensure/fonts/helvetica-neue-LT-Std-medium-italic.otf);}
    @font-face {font-family:helvetica-neue-LT-std-light-italic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/ensure/fonts/helvetica-neue-LT-std-light-italic.otf);}
    @font-face {font-family:myriadPro-regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/ensure/fonts/myriadPro-regular.otf);}
    .img-responsive-m {width:100%;}
		.sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .gray {background-color:#ECECEC;padding: 30px 0;margin-top: 15px;}
    .space-1 {height: 0px !important;}
    .header h2 {font-family:BrandonGrotesque-Bold;color:#1D98D3;text-align: center;font-size: 33px;}
    .header img {margin:0 auto;}
    .header .marcas img:hover {-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    .col-sm-2.col-md-2 img {margin: 50px auto 0;}
    .col-sm-2.col-md-2 img:hover {-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    @-webkit-keyframes wobble-to-top-right {
    	16.65% {-ms-transform: translate(8px, -8px);-webkit-transform: translate(8px, -8px);transform: translate(8px, -8px);}
    	33.3% {-ms-transform: translate(-6px, 6px);-webkit-transform: translate(-6px, 6px);transform: translate(-6px, 6px);}
    	49.95% {-ms-transform: translate(4px, -4px);-webkit-transform: translate(4px, -4px);transform: translate(4px, -4px);}
      66.6% {-ms-transform: translate(-2px, 2px);-webkit-transform: translate(-2px, 2px);transform: translate(-2px, 2px);}
    	83.25% {-ms-transform: translate(1px, -1px);-webkit-transform: translate(1px, -1px);transform: translate(1px, -1px);}
    	100% {-ms-transform: translate(0, 0);-webkit-transform: translate(0, 0);transform: translate(0, 0);}
    }
    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;margin: 0px 0px 15px; }
    .embed-container iframe,.embed-container object,.embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%;}
    .header-m h2 {font-size: 17px;padding: 0px 18px;}
    .bn-principal {border-top:15px solid #162F4D;}
    .cont-banner {position: relative;width: 100%;}
    .cont-banner p {position: absolute;top: 58%;left: 36%;color: #fff;text-align: right;}
    .cont-banner span:nth-child(1) {text-transform:uppercase;font-family: brandon_grotesque_bold_italic;font-size: 55px;}
    .cont-banner span:nth-child(1) sup {font-size: 34px;}
    .cont-banner span:nth-child(3) {font-family: mercury-text-italic;font-size: 55px;line-height: 26px;}
    .cont-banner span:last-child {font-family: brandonGrotesque-regular;font-size: 24px;line-height: 60px;}
    .pie-foto {background-color: #162F4D;color: #fff;text-align: center;padding: 15px;font-family: brandonGrotesque-regular;font-size:22px;}
    .section-gray {background-color:#F1F1F1;text-align:right;color: #1A3455;padding: 60px 0px;}
    .section-gray span:nth-child(1) {font-family:helvetica-neue-LT-std-light-italic; font-size: 43px;font-style: oblique;}
    .section-gray span:nth-child(3) {font-family:helvetica-neue-LT-Std-medium-italic;font-size: 54px;}
    .forma {border-radius: 0 51px 51px 0;padding: 0px 60px;}
    .forma p {color:#fff;padding-top: 40px;font-family:helvetica-neue-LT-Std-medium-italic;}
    .forma.one {background-color:#162F4D;height: 234px;text-align: right;margin-top: 45px;}
    .forma.two {background-color:#951962;height: 234px;text-align: left;margin-top: 45px;}
    .forma.three { background-color: #054A8F; height: 234px; text-align: right; margin-top: 45px;}
    .forma.one p {font-size: 27px;}
    .forma.two p {font-size: 25px;margin-left: 40px;}
    .forma.three p {font-size: 24px;}
    .forma.fourth p {font-size: 27px;}
    .forma.five p {font-size: 27px;}
    .forma.one .flotante {margin-left: -93px;margin-top: -53px;float: left;}
    .forma.three .flotante {margin-left: -93px;margin-top: -73px;float: left;}
    .forma.fourth { background-color: #E3AA29; height: 246px; text-align: left; margin-top: 45px;}
    .forma.five {background-color: #0C4A85; height: 246px; text-align: left;  margin-top: 45px;}
    .btn-comprar {float: right;}
    .section-video {padding: 25px 50px;background: rgba(255,255,255,1);background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(221,221,221,1) 50%, rgba(255,255,255,1) 90%);background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(50%, rgba(221,221,221,1)), color-stop(90%, rgba(255,255,255,1)));background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(221,221,221,1) 50%, rgba(255,255,255,1) 90%);background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(221,221,221,1) 50%, rgba(255,255,255,1) 90%);background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(221,221,221,1) 50%, rgba(255,255,255,1) 90%);background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(221,221,221,1) 50%, rgba(255,255,255,1) 90%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff', GradientType=0 );}
    .section-video p {color: #777575;font-size: 13px;font-family:myriadPro-regular;}
    @media (max-width:1199px) {
      .cont-banner p {left: 26%; }.cont-banner span:nth-child(1) {font-size: 40px;}.cont-banner span:nth-child(3) {font-size: 37px;}
      .cont-banner span:last-child {font-size: 20px;}.section-gray span:nth-child(1) {font-size: 35px;}.section-gray span:nth-child(3) {font-size: 27px;}
      .forma.one p {font-size: 22px;}.forma.two p {  font-size: 19px;}.forma.three p {  font-size: 21px;}.forma.three .flotante {margin-top: -46px;}
      .forma.fourth p {font-size: 22px;}.forma.five p { font-size: 21px;}
    }
    .producto-m {width: 50%;display: block;margin: 0 auto;}
    .forma-m {text-align: left;padding: 0px 15px 20px;border-radius: 0px 0px 25px 25px;margin: 0 25px;height: initial;color:#fff;}
    .forma-m.one {background-color: #162F4D;}
    .forma-m.two {background-color: #951962;padding: 10px 15px;}
    .forma-m.three {background-color: #054A8F; padding: 10px 15px;}
    .forma-m.fourth {background-color: #E3AA29; padding: 10px 15px;}
    .forma-m.five {background-color: #0C4A85; padding: 10px 15px;}

</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>

<!--Header-->
<?php require 'headerAbbott-movil.php'; ?>
<!--Banner principal-->
<img class="img-responsive-m bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/banner-m.png" alt="Ensure Advance">
<div class="pie-foto" style="font-size: 14px;">
  Este producto no reemplaza una alimentación adecuada. El ejercicio y una dieta balanceada contribuyen a una vida más saludable.
</div>
<div class="section-gray" style="text-align: center;padding: 20px;">
   <span style="font-size: 18px;"> Un Ensure diseñado para cada necesidad de nutrición. </span> <br>
   <span style="font-size: 17px;"> Descubre cuál es el mejor para tí.</span>
</div>
<!--Producto1-->
<section style="padding:20px 0;">
    <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance.jpg" alt="Ensure Advance">
    <div class="forma-m one" style="">
      <img style="width: 41%;margin-top: -50px;margin-left: -28px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance-liquido.png" alt="Ensure Advance liquido">
      <p style="font-size: 17px;text-align:center;padding: 0;margin: 0px 0px 15px;">Alimento completo y balanceado con altos niveles de proteína. HMB para recuperar la fibra muscular, fuerza y vitalidad.</p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110478)) ?>" data-ajax="false">
        <img class="img-responsive-m" style="margin: 0 auto;width: 95%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
      </a>
    </div>
</section>
<!--Producto2-->
<section style="padding:20px 0;">
  <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance-bajo-en-calorias-liquido.jpg" alt="Ensure Advance bajo en calorias liquido">
    <div class="forma-m two">
      <p style="text-align: center;">32% MENOS CALORÍAS QUE EL ENSURE ADVANCE REGULAR <br> Para aquellos que prefieren menor aporte calórico, con los mismos beneficios de Ensure Advance Regular.</p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 114783 )) ?>" data-ajax="false">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
      </a>
    </div>
</section>
<!--Producto3-->
<section style="padding:20px 0;">
    <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance-base.jpg" alt="Ensure Advance Base">
    <div class="forma-m three" style="">
      <img style="width: 41%;margin-top: -50px;margin-left: -28px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-base-liquida.png" alt="Ensure Advance liquido">
      <p style="font-size: 17px;text-align:center;padding: 0;margin: 0px 0px 15px;">Contiene Fructooligosacáridos de cadena corta, una fuente de fibra prebiótica e inulina para apoyar la salud del sistema inmune, calcio que es esencial para construir y mantener huesos fuertes.</p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 43640  )) ?>" data-ajax="false">
        <img class="img-responsive-m" style="margin: 0 auto;width: 95%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
      </a>
    </div>
</section>
<!--Producto4-->
<section style="padding:20px 0;">
  <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-clinical-liquida.jpg" alt="Ensure clinical liquido">
    <div class="forma-m fourth">
      <p style="text-align: center;color:#162F4D;">Alimento hiperprotéico, densamente calórico con HMB para uso especial en adulto mayor con desnutrición moderadaa severa en condición de hospitalización y/o con reciente alta hospitalaria.</p>
      <!-- <a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance"></a> -->
    </div>
</section>
<!--Producto5-->
<section style="padding:20px 0;">
  <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-compact.jpg" alt="Ensure Compact">
    <div class="forma-m five">
      <p style="text-align: center;">Alimento completo, hiperprotéico, densamente calórico para uso especial en personas con restricción de volumen y/o saciedad temprana.</p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115102 )) ?>" data-ajax="false">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
      </a>
    </div>
</section>
<!-- Section video -->
<section class="row section-video" style="padding: 25px 20px;">
  <div class='embed-container'><iframe src='https://www.youtube.com/embed/UyhbRfMK1Jc?rel=0' frameborder='0' allowfullscreen></iframe></div>
  <div class='embed-container'><iframe src='https://www.youtube.com/embed/F_s3ff7VWic?rel=0' frameborder='0' allowfullscreen></iframe></div>
  <p style="text-align: justify;">
    Ensure® Polvo. Alimento a base de proteína, vitaminas y minerales. Nutrición completa y balanceada. Registro Sanitario: RSiA10I114515. <br>
    Ensure®. Alimento líquido con proteína, buena fuente de vitaminas y minerales, nutrición completa y balanceada. Registro Sanitario: RSiA16I186115. <br>
    Ensure® Advance. Alimento en polvo, completo y balanceado con HMB, Proteína y vitamina D. Registro Sanitario: RSiA16186615. Producto diseñado para las necesidades nutricionales de la población adulta. <br>
    Ensure® Advance. Alimento líquido completo y balanceado con HMB, proteína y vitamina D. Registro Sanitario: RSiA16I178915. Producto diseñado para las necesidades nutricionales de la población adulta.<br>
    Ensure® Advance menos calorías. Alimento líquido completo y balanceado con HMB, proteína y vitamina D. Registro Sanitario: RSA-000617-2016. Producto diseñado para las necesidades nutricionales de la población adulta.<br>
    ENSURE® COMPACT. Alimento completo, hiperproteico, densamente calórico para uso especial en personas con restricción de volumen y/o saciedad temprana. Registro Sanitario: RSA-000929-2016.<br>
    ENSURE® CLINICAL. Alimento hiperprotéico, densamente calórico con HMB y alto contenido de Vitamina D, para uso especial en adulto mayor con desnutrición moderada a severa en condición de hospitalización y/o con reciente alta hospitalaria. Registro Sanitario: RSA-001241-2016.
  </p>
</section>
<!---FIN VERSIÓN MÓVIL-->

<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<div class="sidebar-cart">
	<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/general/compra-online.png" alt="">
</div>
<!--Header-->
<?php require 'headerAbbott.php'; ?>
<!--Banner principal-->
<div class="cont-banner">
  <img class="img-responsive bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/banner.jpg" alt="Ensure Advance">
  <p>
    <span>Ensure<sup>®</sup>Advance,</span> <br>
   <span>mantente fuerte, mantente bien.</span><br>
  <span>Producto diseñado para las necesidades nutricionales de la población adulta.</span>
  </p>
</div>
<div class="pie-foto">
  Este producto no reemplaza una alimentación adecuada. El ejercicio y una dieta balanceada contribuyen a una vida más saludable.
</div>
<div class="section-gray">
  <div class="container">
   <span> Un Ensure diseñado para cada necesidad de nutrición. </span> <br>
   <span> Descubre cuál es el mejor para tí.</span>
  </div>
</div>
<div class="container">
  <!--Producto1-->
  <div class="row">
    <div class="col-sm-2 col-md-2">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance.jpg" alt="Ensure Advance">
    </div>
    <div class="col-sm-10 col-md-10">
      <div class="forma one">
        <p>Alimento completo y balanceado con altos niveles de proteína. <br>HMB para recuperar la fibra muscular, fuerza y vitalidad.</p>
        <img class="img-responsive flotante" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance-liquido.png" alt="Ensure Advance liquido">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110478   )) ?>">
          <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
        </a>
      </div>
    </div>
  </div>
  <!--Producto2-->
  <div class="row">
    <div class="col-sm-2 col-md-2">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance-bajo-en-calorias-liquido.jpg" alt="Ensure Advance bajo en calorias liquido">
    </div>
    <div class="col-sm-10 col-md-10">
      <div class="forma two">
        <p>32% MENOS CALORÍAS QUE EL ENSURE ADVANCE REGULAR <br> Para aquellos que prefieren menor aporte calórico, con los mismos <br> beneficios de Ensure Advance Regular.</p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 114783 )) ?>">
          <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
        </a>
      </div>
    </div>
  </div>
  <!--Producto3-->
  <div class="row">
    <div class="col-sm-2 col-md-2">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-advance-base.jpg" alt="Ensure Advance Base">
    </div>
    <div class="col-sm-10 col-md-10">
      <div class="forma three">
        <p>Contiene Fructooligosacáridos de cadena corta, una fuente de fibra <br> prebiótica e inulina para apoyar la salud del sistema inmune, calcio <br> que es esencial para construir y mantener huesos fuertes.</p>
        <img class="img-responsive flotante" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-base-liquida.png" alt="Ensure Advance liquido">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 43640  )) ?>">
          <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
        </a>
      </div>
    </div>
  </div>
  <!--Producto4-->
  <div class="row">
    <div class="col-sm-2 col-md-2">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-clinical-liquida.jpg" alt="Ensure clinical liquido">
    </div>
    <div class="col-sm-10 col-md-10">
      <div class="forma fourth">
        <p style="color:#162F4D;">Alimento hiperprotéico, densamente calórico con HMB para uso <br> especial en adulto mayor con desnutrición moderadaa severa en <br> condición de hospitalización y/o con reciente alta hospitalaria.</p>
        <!-- <a href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance"></a> -->
      </div>
    </div>
  </div>
  <!--Producto5-->
  <div class="row">
    <div class="col-sm-2 col-md-2">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/ensure-compact.jpg" alt="Ensure Compact">
    </div>
    <div class="col-sm-10 col-md-10">
      <div class="forma five">
        <p >Alimento completo, hiperprotéico, densamente calórico para uso <br> especial en personas con restricción de volumen <br> y/o saciedad temprana.</p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115102 )) ?>">
          <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/ensure/boton.png" alt="Comprar Ensure Advance">
        </a>
      </div>
    </div>
  </div>
  <div class="row section-video">
    <div class="col-sm-6 col-md-6">
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/UyhbRfMK1Jc?rel=0' frameborder='0' allowfullscreen></iframe></div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/F_s3ff7VWic?rel=0' frameborder='0' allowfullscreen></iframe></div>
    </div>
    <div class="col-md-12">
      <p>
        Ensure® Polvo. Alimento a base de proteína, vitaminas y minerales. Nutrición completa y balanceada. Registro Sanitario: RSiA10I114515. <br>
        Ensure®. Alimento líquido con proteína, buena fuente de vitaminas y minerales, nutrición completa y balanceada. Registro Sanitario: RSiA16I186115. <br>
        Ensure® Advance. Alimento en polvo, completo y balanceado con HMB, Proteína y vitamina D. Registro Sanitario: RSiA16186615. Producto diseñado para las necesidades nutricionales de la población adulta. <br>
        Ensure® Advance. Alimento líquido completo y balanceado con HMB, proteína y vitamina D. Registro Sanitario: RSiA16I178915. Producto diseñado para las necesidades nutricionales de la población adulta.<br>
        Ensure® Advance menos calorías. Alimento líquido completo y balanceado con HMB, proteína y vitamina D. Registro Sanitario: RSA-000617-2016. Producto diseñado para las necesidades nutricionales de la población adulta.<br>
        ENSURE® COMPACT. Alimento completo, hiperproteico, densamente calórico para uso especial en personas con restricción de volumen y/o saciedad temprana. Registro Sanitario: RSA-000929-2016.<br>
        ENSURE® CLINICAL. Alimento hiperprotéico, densamente calórico con HMB y alto contenido de Vitamina D, para uso especial en adulto mayor con desnutrición moderada a severa en condición de hospitalización y/o con reciente alta hospitalaria. Registro Sanitario: RSA-001241-2016.
      </p>
    </div>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
