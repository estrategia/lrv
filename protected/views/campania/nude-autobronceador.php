<?php $this->pageTitle = "Nude Autobronceador | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='¿Ya conoces la línea de Autobronceadores NUDE® que te da un color perfecto sin exponerte al sol? ¡Qué esperas para descubrir sus beneficios! Cómprala aquí'>
<meta name='keywords' content='Nude autobronceador, bronceado sin sol, autobronceador, como broncearse sin sol'>
<style>
  @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
  @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
  @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
  @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
  @font-face { font-family:CocogoosePro-thin; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nude/fonts/cocogoosePro-thin-trial.ttf);}
  @font-face { font-family:Cocogoose-DemiBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nude/fonts/cocogoose-DemiBold.ttf);}
  @font-face { font-family:brandon_med; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nude/fonts/brandon_med.otf);}
  a:active, a:active * { outline: none !important; -moz-outline-style: none !important;text-decoration-line: none;; }
  a:focus, a:focus * { outline: none !important; -moz-outline-style: none !important;text-decoration-line: none;; }
  a {text-decoration-line: none;}
  .space-1 {height: 0px !important;}
  .animate1 {visibility: hidden;}
  .img-responsive-m {width:100%;}
  .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
  .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
  .button-desplegable .icon2 {position: relative;width: 100px;height: 100px;-webkit-transition: .2s color;-o-transition: .2s color;transition: .2s color;z-index: 2;}
  .button-desplegable .text2 {display: none;margin-top: -7px;position: absolute;z-index: 1;}
  .button-desplegable:hover .text2 {width: 165px;display: block;-webkit-animation: appearRight .5s ease-out both ;animation: appearRight .5s ease-out both ;margin-top: -93px;}
  @-webkit-keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
  @keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(-45%);transform: translateX(-45);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
  .menu {margin-top:-100px;margin-bottom: 59px;}
  .bg-principal {background-size: 100%;background-attachment: fixed;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nude/bg-v1.jpg);background-size: cover;}
  .carousel .item {max-height: initial !important;}
  .carousel-control .glyphicon-chevron-left {top: 0% !important;background-color: #e3e3e3;border-radius: 50%;}
  .carousel-control .glyphicon-chevron-right {top: 0% !important;background-color: #e3e3e3;border-radius: 50%;}
  .item-menu {margin: 0 auto;width: 185px;-webkit-transform: perspective(1px) translateZ(0);transform: perspective(1px) translateZ(0);-webkit-transition-duration: 0.3s;transition-duration: 0.3s;-webkit-transition-property: transform;transition-property: transform;}
  .item-menu:hover {-webkit-transform: translateY(-5px);transform: translateY(-5px);}
  .bg-bronceadores {border-radius: 30px;font-size: 20px;padding: 50px 0px 30px 75px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nude/bg-bronceador.png);background-size: 100%;}
  .btn-compra {width: 150px;margin-top: 15px;}
  .nombre-producto {font-family:Cocogoose-DemiBold;color:#42210b;font-size: 26px;margin-bottom: 20px;}
  .nombre-producto span {font-family:CocogoosePro-thin;font-size:30px;}
  .nombre-producto span:nth-child(3) {font-size: 23px;font-family:brandon_med;font-weight:bold;margin-top:5px;display:block;}
  .intro-producto {font-weight: bold;font-family:CocogoosePro-thin;color:#42210b;font-size: 18px; }
  .bullet-producto {font-size: 26px; margin-top: 25px;font-family:brandon_med;color:#42210b;list-style-type:none;-webkit-padding-start: 0;-moz-padding-start: 0;padding-inline-start: 0;}
  .bullet-producto li:before {content:'° ';}
  .product-right {width: 360px;position: absolute;top: -120px;left: -68px;}
  .product-left {width: 380px;position: absolute;top: -170px;right: -45px;}
  .section-video {padding: 85px 0;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nude/fondo-video-autobronceadores.png);background-size:cover;}
  .title-video {margin: 0 auto 45px;display: block;width: 35%;}
  .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
  .video iframe{position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
  .menu-mobile {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nude/mobile/bg-menu.png);background-size: cover;padding: 20px;text-align: center;margin-bottom: 5px;color: #42210b;font-family: CocogoosePro-thin;font-weight: bold;-webkit-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.5);-moz-box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.5);box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.5);}
  .bg-principal-m {background-attachment: fixed;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nude/mobile/bg-mobile.jpg);background-size: cover;margin-top: 0px;}
  .owl-theme.slide-banner  .owl-controls {margin-top: -40px !important;left: 25px;position: absolute;}
  .owl-theme.slide-banner .owl-controls .owl-page span {background-color: #fff !important;}
  .producto-m {width: 250px;margin:0 auto,display:inline-block;}
  .btn-compra-m {width: 190px;}
  .patter-white {padding-top: 30px;background-color: rgba(255, 255, 255, 0.6);padding-bottom: 50px;}
  .owl-productodetalle .owl-pagination {margin-top: 45px !important;}
</style>
";
?>
<link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/animate.min.css">
<script src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/wow.min.js"></script>
<script type="text/javascript">wow = new WOW(); wow.init();</script>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme slide-banner">
  <div class="item"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/mobile/banner-autobronceadores.png" alt="Autobronceador NUDE"></div>
  <div class="item"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/mobile/banner-general.png" alt="NUDE sale con el sol todos los días"></div>
</div>
<a href="<?= Yii::app()->request->baseUrl ?>/nude-protectores-solares" data-ajax="false" style="margin-top: -10px;display: block;"><div class="menu-mobile"><span style="font-size: 20px;">NUDE </span>protector Solar</div></a>
<a href="<?= Yii::app()->request->baseUrl ?>/nude-autobronceadores" data-ajax="false"><div class="menu-mobile"><span style="font-size: 20px;">NUDE </span>AUTOBRONCEADOR</div></a>
<a href="<?= Yii::app()->request->baseUrl ?>/nude-repelente-de-insectos" data-ajax="false"><div class="menu-mobile"><span style="font-size: 20px;">NUDE </span>Repelente</div></a>
<div class="bg-principal-m">
  <div class="patter-white">
    <div  id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
      <div class="item">
        <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/bronceador/autobronceador-aerosol.png" alt="">
        <div style="padding:0 30px;">
          <h3 class="nombre-producto" style="font-size: 20px;line-height: 20px;"><span>NUDE</span> AUTOBRONCEADOR<br><span style="font-size: 20px;">Aerosol</span></h3>
          <p class="intro-producto" style="font-size: 15px;">Bronceado uniforme sin exponerse al sol.</p>
          <ul class="bullet-producto " style="font-size: 18px;">
            <li>Fragancia de coco. </li>
            <li>Contenido 177ml. </li>
            <li>Fácil aplicación en cualquier dirección.</li>
          </ul>
          <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104298 )) ?>"><img class="btn-compra-m" style="margin-top: 35px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/btn-comprar.png" alt="Comprar"></a>
        </div>
      </div>
      <div class="item">
        <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/bronceador/autobronceadores-display-y-colapsible.png" alt="">
        <div style="padding:0 30px;">
          <h3 class="nombre-producto" style="font-size: 20px;line-height: 20px;"><span>NUDE</span> AUTOBRONCEADOR CREMA<br><span>Display y Colapsible</span></h3>
          <p class="intro-producto" style="font-size: 15px;">Tu piel con efecto bronceado en pocas horas.</p>
          <ul class="bullet-producto " style="font-size: 18px;">
            <li>Fácil aplicación.</li>
            <li>Color uniforme y duradero.</li>
            <li>Encuéntralo en presentaciones de <br> <span style="margin-left: 15px;">20 ml y 120ml.</span></li>
          </ul>
          <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 4337)) ?>"><img class="btn-compra-m" style="margin-top: 35px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/btn-comprar.png" alt="Comprar"></a>
        </div>
      </div>
      <div class="item">
        <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/bronceador/autobronceadores-crema-exfoliante.png" alt="">
        <div style="padding:0 30px;">
          <h3 class="nombre-producto" style="font-size: 20px;line-height: 20px;"><span>NUDE</span> AUTOBRONCEADOR<br><span>  Crema +Exfoliante</span></h3>
          <p class="intro-producto" style="font-size: 15px;">Tu mejor color los 365 días del año.</p>
          <ul class="bullet-producto " style="font-size: 18px;">
            <li>Exfoliante en gel que suaviza tu piel.</li>
            <li>Fácil aplicación.</li>
            <li>Contenido 120 ml cada uno</li>
          </ul>
          <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104303 )) ?>"><img class="btn-compra-m" style="margin-top: 35px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/btn-comprar.png" alt="Comprar"></a>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="section-video" style="padding: 45px 0;">
  <img class="title-video" style="width: 70%;margin: 0 auto 25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/vive-la-experienia-nude.png" alt="Vive la experiencia NUDE">
  <div style="padding: 0 5%;">
    <div class="video">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/OY-RD5hEPlA?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</section>
<section class="programa-hora" style="font-size: 16px;">
  <img width="40" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png"> <br>
  <span style="font-family:HelveticaNeueLight;color:#363636;">Ahora comprando en </span><span style="font-family:HelveticaNeue-BlackCond;color: #BF1A24;letter-spacing: 1px;">larebajavirtual.com</span><span style="color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;">, <br> programa tu hora y lugar de entrega </span>
</section>
<div style="margin-top:30px;padding:0 15px;">
  <div style="padding: 0 25%;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-mobile.png" alt="Chat en linea">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-mobile.png" alt="pqrs">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-mobile.png" alt="Linea gratuita">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
  </div>
</div>
<section style="font-size: 18px;background-color:#BF1A24;font-family: HelveticaNeueLight;color: #fff;text-align: center;padding: 10px;margin-top:30px;">
  Gracias por comprar en <span style="font-family:HelveticaNeue-BlackCond;letter-spacing:1px;">larebajavirtual.com</span>
</section>

<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<!-- <a href="#">
  <div class="sidebar-cart animate1 wow rotateInDownRight" data-wow-offset="350">
    <div class="button-desplegable">
      <div class='icon2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/circle.png" alt=""></div>
      <div class='text2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/line-circle.png" alt=""></div>
    </div>
  </div>
</a> -->
<div class="bg-principal">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/banner-autobronceador.jpg" alt="Autobronceador NUDE">
      </div>
      <div class="item">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/banner2.jpg" alt="NUDE sale con el sol todos los días">
      </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container">
    <div class="row menu">
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/nude-protectores-solares"><img class="img-responsive item-menu animate1 wow pulse" data-wow-offset="50" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/protector-solar.png" alt="Protector solar NUDE"></a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/nude-autobronceadores"><img class="img-responsive item-menu animate1 wow pulse" data-wow-offset="60" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/autobronceador.png" alt="Protector solar NUDE"></a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/nude-repelente-de-insectos"><img class="img-responsive item-menu animate1 wow pulse" data-wow-offset="70" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/repelente.png" alt="Protector solar NUDE"></a>
      </div>
    </div>
    <section class="row wow fadeInLeft" data-wow-offset="40" style="margin-bottom: 100px;margin-bottom: 60px;">
      <div class="col-md-8 col-md-offset-2">
        <h3 class="nombre-producto" style="margin-left: 199px;"><span>NUDE</span> AUTOBRONCEADOR<br><span>Aerosol</span></h3>
        <div class="row bg-bronceadores">
          <div class="col-sm-2 col-md-2">
            <img class="product-left" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/bronceador/autobronceador-aerosol.png" alt="">
          </div>
          <div class="col-sm-8 col-md-8">
            <p class="intro-producto ">Bronceado uniforme sin exponerse al sol. </p>
            <ul class="bullet-producto ">
              <li> Fragancia de coco. </li>
              <li>Contenido 177ml. </li>
              <li>Fácil aplicación en cualquier dirección.</li>
            </ul>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104298 )) ?>"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/btn-comprar.png" alt="Comprar"></a>
          </div>
        </div>
      </div>
    </section>
    <section class="row wow fadeInRight" data-wow-offset="40" style="margin-bottom: 100px;margin-bottom: 60px;">
      <div class="col-md-8 col-md-offset-2">
        <h3 class="nombre-producto" style="margin-left: 75px;"><span>NUDE</span> AUTOBRONCEADOR CREMA<br><span> Display y Colapsible</span></h3>
        <div class="row bg-bronceadores">
          <div class="col-sm-9 col-md-9">
            <p class="intro-producto ">Tu piel con efecto bronceado en pocas horas.</p>
            <ul class="bullet-producto ">
              <li>Fácil aplicación.</li>
              <li>Color uniforme y duradero.</li>
              <li style="line-height: 25px;margin-bottom: 10px;">Encuéntralo en presentaciones <br><span style="margin-left: 16px;">de 20 ml y 120ml.</span></li>
            </ul>
            <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 4337)) ?>"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/btn-comprar.png" alt="Comprar"></a>
          </div>
          <div class="col-sm-3 col-md-3">
            <img class="product-right" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/bronceador/autobronceadores-display-y-colapsible.png" alt="">
          </div>
        </div>
      </div>
    </section>
    <section class="row wow fadeInLeft" data-wow-offset="40" style="margin-bottom: 100px;margin-bottom: 100px;">
      <div class="col-md-8 col-md-offset-2">
        <h3 class="nombre-producto" style="margin-left: 250px;"><span>NUDE</span> AUTOBRONCEADOR<br><span>Crema +Exfoliante</span></h3>
        <div class="row bg-bronceadores">
          <div class="col-sm-3 col-md-3">
            <img class="product-left" style="width: 350px;top: -140px;right: -15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/bronceador/autobronceadores-crema-exfoliante.png" alt="">
          </div>
          <div class="col-sm-8 col-md-8">
            <p class="intro-producto ">Tu mejor color los 365 días del año.</p>
            <ul class="bullet-producto ">
              <li>Exfoliante en gel que suaviza tu piel.</li>
              <li>Fácil aplicación.</li>
              <li>Contenido 120 ml cada uno.</li>
            </ul>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104303 )) ?>"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/btn-comprar.png" alt="Comprar"></a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <section class="section-video">
    <img class="title-video" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nude/vive-la-experienia-nude.png" alt="Vive la experiencia NUDE">
    <div style="padding: 0 25%;">
      <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/OY-RD5hEPlA?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </section>
</div>
<section class="programa-hora">
  <span style="font-family:HelveticaNeueLight;color:#363636;">Ahora comprando en </span><span style="font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 23px;letter-spacing: 1px;">larebajavirtual.com</span><span style="color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;">, programa tu hora y lugar de entrega </span><img width="50" style="margin-left:6px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
</section>
<div class="container" style="margin-top:30px;">
  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-escritorio.png" alt="Chat en linea">
      <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
    </div>
    <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-escritorio.png" alt="pqrs">
      <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
      <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
    </div>
    <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-escritorio.png" alt="Linea gratuita">
      <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
      <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
    </div>
  </div>
</div>
<section style="background-color:#BF1A24;font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 25px;padding: 10px;margin-top:30px;">
  Gracias por comprar en <span style="font-family:HelveticaNeue-BlackCond;letter-spacing:1px;">larebajavirtual.com</span>
</section>
<!--Fin versión escritorio-->
<?php endif; ?>
