<?php $this->pageTitle = "Durex - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=''>
  <meta name='keywords' content=''>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/ky/fonts/MyriadPro.otf);}
    @font-face {font-family:NewJune-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/chococono/fonts/NewJune-Bold.otf);}
    @font-face {font-family:HelveticaNeueLight;src: url(".Yii::app()->request->baseUrl."/images/contenido/chococono/fonts/HelveticaNeueLight.ttf);}
    @font-face {font-family:bebas-neue-regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/durex/fonts/bebas-neue-regular.otf);}
    @font-face {font-family:century-gothic-regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/durex/fonts/century-gothic-regular.ttf);}
    @font-face {font-family:century-gothic-bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/durex/fonts/century-gothic-bold.ttf);}
    @font-face {font-family:bebasNeue-book;src: url(".Yii::app()->request->baseUrl."/images/contenido/durex/fonts/bebasNeue-book.otf);}
    @font-face {font-family:BebasNeueBold;src: url(".Yii::app()->request->baseUrl."/images/contenido/durex/fonts/BebasNeueBold.otf);}
    .space-1 {height: 0px !important;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .img-responsive-m {width:100%;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .programa {background-color:#D7D8DC;font-family:NewJune-Bold;color:#D40209;font-size:25px;text-align: center;padding: 5px;}
    a, a:hover, a:active, a:focus {outline: none !important;cursor:pointer;text-decoration:none !important;}
    .button-desplegable .icon2 {position: relative;width: 100px;height: 100px;-webkit-transition: .2s color;-o-transition: .2s color;transition: .2s color;z-index: 2;}
    .button-desplegable .text2 {display: none;margin-top: -7px;position: absolute;z-index: 1;}
    .button-desplegable:hover .text2 {width: 165px;display: block;-webkit-animation: appearRight .5s ease-out both ;animation: appearRight .5s ease-out both ;margin-top: -93px;}
    @-webkit-keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    @keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(-45%);transform: translateX(-45);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    .titulo-principal {color: #E4267A;font-family: bebas-neue-regular;text-shadow: 2px 2px 2px #8c8c8c;text-align: center;font-size: 50px;font-weight: bold;}
    .bg-menu{padding: 30px 0 70px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/durex/fondo-menu.png);background-size: 100%;}
    .embed-container {position: relative;padding-bottom: 56.25%;height: 0;overflow: hidden;}
    .embed-container iframe {position: absolute;top:0;left: 0;width: 100%;height: 100%;}
    .guia-menu {margin-top: -50px;background-size: cover;height:9px;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/durex/line-menu.png);}
    .guia-menu .item {width:80%;height:19px;}
    @media (min-width: 768px){.seven-cols .col-md-1,.seven-cols .col-sm-1,.seven-cols .col-lg-1  {width: 100%;*width: 100%;padding-right:0px !important;padding-left:0px !important;}}
    @media (min-width: 992px) {.seven-cols .col-md-1,.seven-cols .col-sm-1,.seven-cols .col-lg-1 {width: 14.285714285714285714285714285714%;*width: 14.285714285714285714285714285714%;padding-right:0px !important;padding-left:0px !important;}}
    @media (min-width: 1200px) {.seven-cols .col-md-1,.seven-cols .col-sm-1,.seven-cols .col-lg-1 {width: 14.285714285714285714285714285714%;*width: 14.285714285714285714285714285714%;padding-right:0px !important;      padding-left:0px !important;}}
    .nombre {line-height: 15px;color:#474747;text-align: center;text-transform: uppercase;margin-top: 20px;font-family:century-gothic-regular;}
    .line-active {border-radius: 25px;height: 12px;width: 70%;margin: -1px 25px;z-index: 1;position: absolute;}
    .show {background-color: #0096E2;}
    .name-strong {font-family:century-gothic-bold;}
    .bg-info{padding-bottom: 40px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/durex/fondo-producto.png);background-size: 100%;}
    .contenedor-info {background-color: #fff;padding: 8px;border-radius: 10px;}
    .contenedor-product{box-shadow:inset 0 0 4px #666;border-radius: 10px;padding:25px 50px 50px !important;}
    .pack-product {width: 580px;margin-top: -174px;position: absolute;right: -155px;}
    .bg-video {padding: 40px 0 40px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/durex/fondo-video.png);background-size: 100%;}
    .hide {display:none;}
    .titulo-producto {font-size:45px;font-family:bebasNeue-book;margin-bottom: 0;}
    .descrip-producto {font-family: century-gothic-regular;font-size: 25px;color: #454545;}
    .descrip-producto span {font-family:century-gothic-bold;}
    .compra-producto {width: 135px;position: absolute;bottom: -95px;left: -51px;transition: 0.4s ease-out;}
    .compra-producto:hover {transform: scale(0.9);}
    .titulo-producto sup {font-size: 60%;margin-left: -5px}
    .line-title {width: 60%;margin-bottom: 35px;}
    .titulo-producto.producto1 {color:#0096E0;}.titulo-producto.producto1 span {font-family:BebasNeueBold;}.titulo-producto.producto1 strong {color:#0062BD;}
    .titulo-producto.producto2 {color:#FF0815;}.titulo-producto.producto2 span {font-family:BebasNeueBold;}.titulo-producto.producto2 strong {color:#D9030A;}
    .titulo-producto.producto3 {color:#FF9C00;}.titulo-producto.producto3 span {font-family:BebasNeueBold;}.titulo-producto.producto3 strong {color:#FF5B35;}
    .titulo-producto.producto4 {color:#F06194;}.titulo-producto.producto4 span {font-family:BebasNeueBold;}.titulo-producto.producto4 strong {color:#B80C6A;}
    .titulo-producto.producto6 {color:#FF5C96;}.titulo-producto.producto6 span {font-family:BebasNeueBold;}.titulo-producto.producto6 strong {color:#FF0381;}
    .titulo-producto.producto7 {color:#FF6498;}.titulo-producto.producto7 span {font-family:BebasNeueBold;}.titulo-producto.producto7 strong {color:#820022;}
    .owl-controls {position: absolute;top: 35px;right: 10px;left: 10px;}
    .owl-theme .owl-controls .owl-page span {background-color: #0097E0 !important;}
    .ui-btn-icon-left::after {background-color: #0096E0 !important;}
    .ui-btn-icon-right::after {background-color: #0096E0 !important;}
  </style>
  ";
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#producto1').click(function(){
      $('#producto1 #guia').addClass('show');
      $('#producto1 #nombre').addClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto1').removeClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto2').click(function(){
      $('#producto2 #guia').addClass('show');
      $('#producto2 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto2').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto3').click(function(){
      $('#producto3 #guia').addClass('show');
      $('#producto3 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto3').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto4').click(function(){
      $('#producto4 #guia').addClass('show');
      $('#producto4 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto4').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto5').click(function(){
      $('#producto5 #guia').addClass('show');
      $('#producto5 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto5').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto6').click(function(){
      $('#producto6 #guia').addClass('show');
      $('#producto6 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto6').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto7').click(function(){
      $('#producto7 #guia').addClass('show');
      $('#producto7 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#info-producto7').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
    });
  });
</script>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/banner-durex.jpg">
<div class="bg-menu" style="margin-top:-5px;background-size: cover;padding-bottom: 0;">
<h1 class="titulo-principal" style="margin-top: 0;font-size: 35px;line-height: 35px;margin-bottom: 0px;">EL PRODUCTO IDEAL <br> PARA TU NECESIDAD</h1>
  <a style="position: absolute;left: 25px;top: 20%;" href="" data-role="button" data-icon="arrow-l" data-iconpos="left"></a>
  <a style="position: absolute;right: 25px;top: 20%;" href="" data-role="button" data-icon="arrow-r" data-iconpos="right"></a>
  <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item" style="padding: 0 20px;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/extra-seguro-durex.png" alt="Extra seguro">
      <div class="contenedor-info ">
        <div class="contenedor-product" style="padding: 25px !important;">
          <h2 class="titulo-producto producto1" style="font-size: 30px;margin-top: 0;line-height: 30px;">DUREX <sup>&reg;</sup> <br><span>EXTRA <strong>SEGURO</strong></span></h2>
          <img class="line-title" style="margin: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto" style="font-size: 18px;"><span>Más gruesos</span> y con lubricación <span>extra.</span></p>
          <p class="descrip-producto" style="font-size: 18px;"><span>Mayor seguridad y</span> <span>confianza</span> en la relación.</p>
          <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 103180)) ?>"><img style="width: 100px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
        </div>
      </div>
    </div>
    <div class="item" style="padding: 0 20px;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/sensit-ultra-delgado-durex.png" alt="Sensitivo ultra delgago">
      <div class="contenedor-info ">
        <div class="contenedor-product" style="padding: 25px !important;">
          <h2 class="titulo-producto producto2" style="font-size: 30px;margin-top: 0;line-height: 30px;"><span style="color: #0096E0;font-family: inherit;">DUREX</span><sup style="color: #0096E0;">&reg;</sup> <br><span>SENSITIVO <strong>ULTRA DELGADO</strong></span></h2>
          <img class="line-title" style="margin: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto" style="font-size: 18px;">Con <span>tecnología Sensi-Fit<sup>TM</sup></span>, un látex 20% más delgado.</p>
          <p class="descrip-producto" style="font-size: 18px;"><span>Aumenta la sensibilidad </span>durante la relación y <span>mantiene</span><span>el nivel de protección.</span></p>
          <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 105865)) ?>"><img style="width: 100px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
        </div>
      </div>
    </div>
    <div class="item" style="padding: 0 20px;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/maximo-placer-durex.png" alt="Máximo placer">
        <div class="contenedor-info ">
          <div class="contenedor-product" style="padding: 25px !important;">
            <h2 class="titulo-producto producto3" style="font-size: 30px;margin-top: 0;line-height: 30px;"><span style="color: #0096E0;font-family: inherit;">DUREX</span><sup style="color: #0096E0;">&reg;</sup> <br><span>MÁXIMO <strong>PLACER</strong></span></h2>
            <img class="line-title" style="margin: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
            <p class="descrip-producto" style="font-size: 18px;">Tiene <span>puntos y estrías</span> en el látex.</p>
            <p class="descrip-producto" style="font-size: 18px;">Estimula y aumenta <br>el <span>placer para ella</span>.</p>
            <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 103179)) ?>"><img style="width: 100px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
          </div>
        </div>
      </div>
    <div class="item" style="padding: 0 20px;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/placer-prolongado-durex.png" alt="Placer prolongado">
      <div class="contenedor-info ">
        <div class="contenedor-product" style="padding: 25px !important;">
          <h2 class="titulo-producto producto4" style="font-size: 30px;margin-top: 0;line-height: 30px;"><span style="color: #0096E0;font-family: inherit;">DUREX</span><sup style="color: #0096E0;">&reg;</sup> <br><span>PLACER <strong>PROLONGADO</strong></span></h2>
          <img class="line-title" style="margin: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto" style="font-size: 18px;">Contiene <span>benzocaína</span> para <span>retardar el clímax</span> del hombre e intensificar el de ella.</p>
          <p class="descrip-producto" style="font-size: 18px;">Logra un <span>mejor rendimiento físico.</span></p>
          <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 105872)) ?>"><img style="width: 100px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
        </div>
      </div>
    </div>
    <div class="item" style="padding: 0 20px;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/climax-mutuo-durex.png" alt="Climax mutuo">
        <div class="contenedor-info">
          <div class="contenedor-product" style="padding: 25px !important;">
            <h2 class="titulo-producto producto4" style="font-size: 30px;margin-top: 0;line-height: 30px;"><span style="color: #0096E0;font-family: inherit;">DUREX</span><sup style="color: #0096E0;">&reg;</sup> <br><span>CLÍMAX <strong>MUTUO</strong></span></h2>
            <img class="line-title" style="margin: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
            <p class="descrip-producto" style="font-size: 18px;">Diseñados para <span>acelerar</span> <br><span> el clímax de la mujer</span> por medio de <span>puntos y estrías.</span></p>
            <p class="descrip-producto" style="font-size: 18px;">Con benzocaína que <span>retarda</span> <span>el rendimiento.</span></p>
            <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 110786)) ?>"><img style="width: 100px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
          </div>
        </div>
      </div>
    <div class="item" style="padding: 0 20px;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/anillo-vibrador-durex.png" alt="Anillo vibrador">
        <div class="contenedor-info ">
          <div class="contenedor-product" style="padding: 25px !important;">
            <h2 class="titulo-producto producto6" style="font-size: 30px;margin-top: 0;line-height: 30px;"><span style="color: #0096E0;font-family: inherit;">DUREX</span><sup style="color: #0096E0;">&reg;</sup> <br><span>ANILLO <strong>VIBRADOR</strong></span></h2>
            <img class="line-title" style="margin: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
            <p class="descrip-producto" style="font-size: 18px;">Proporciona hasta <span>20 minutos</span> de <span>palpitante placer </span>para los dos.</p>
            <p class="descrip-producto" style="font-size: 18px;">La experimentación está servida.</p>
            <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 25068)) ?>"><img style="width: 100px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
          </div>
        </div>
    </div>
    <div class="item" style="padding: 0 20px;">
      <img class="img-responsive" style="margin-top: 50px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/gel-cerezas-durex.png" alt="Gel play cerezas">
      <div class="contenedor-info ">
        <div class="contenedor-product" style="padding: 25px !important;">
          <h2 class="titulo-producto producto7" style="font-size: 30px;margin-top: 0;line-height: 30px;"><span style="color: #0096E0;font-family: inherit;">DUREX</span><sup style="color: #0096E0;">&reg;</sup> <br><span>GEL <strong>PLAY CEREZAS</strong></span></h2>
          <img class="line-title" style="margin: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto" style="font-size: 18px;">Brinda a la pareja una experiencia deliciosa con <span>sabor a cereza</span> para complementar a su relación.</p>
          <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 25066)) ?>"><img style="width: 100px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
        </div>
      </div>
    </div>
  </div>
<img class="img-responsive-m" style="margin-top:20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/comprometidos-con-tu-placer-al-maximo.jpg" alt="Comprometidos con tu placer al máximo">
</div>
<div class="bg-video" style="background-size:cover;margin-top:-5px;padding: 30px 20px;">
  <img class="img-responsive-m" style="margin-bottom:20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/vive-la-experiencia-durex.png" alt="Vive la experiencia durex">
  <div class="embed-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/LT30WpJug2c?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
<section class="programa" style="font-size: 17px;">
  <img width="80" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/carrito.png" > <br>
  En la Rebaja Virtual programa <br>tu hora y lugar de entrega
</section>
<div class="datos-contacto" style="padding: 20px 15px;">
  <p class="text-atencion">Si tienes algún inconveniente con tu pedido <br>
  comunícate con nosotros a través de los canales que tenemos disponibles:</p>
  <img class="img-responsive-m"  style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/chat.png">
  <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Chat en linea</p>
  <img class="img-responsive-m" style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/pqrs.png">
  <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Sistema PQRS</p>
  <p style="font-size:12px;font-family: MyriadPro;">(preguntas, quejas, reclamos y solicitudes)</p>
  <img class="img-responsive-m" style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/linea.png">
  <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Linea gratuita</p>
  <p style="font-family: MyriadPro;">01-8000-939900</p>
</div>
<div class="bg-red">
  <p style="margin:0;">Gracias por comprar en <a href="https://www.larebajavirtual.com">www.larebajavirtual.com</a></p>
</div>
<!--Versión escritorio-->
<?php else: ?>
<!-- <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=durex">
  <div class="sidebar-cart">
    <div class="button-desplegable">
      <div class='icon2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/circle.png" alt=""></div>
      <div class='text2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/line-circle.png" alt=""></div>
    </div>
  </div>
</a> -->
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/banner-durex.jpg">
<div class="bg-menu">
  <div class="container">
    <h1 class="titulo-principal">EL PRODUCTO IDEAL PARA TU NECESIDAD</h1>
    <div class="row seven-cols" style="margin-bottom: 15px;">
      <div class="col-md-1">
        <a id="producto1" href="#extra-seguro" >
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/extra-seguro-durex.png" alt="Extra seguro">
          <div id="guia" class="line-active show "></div><div id="nombre" class="nombre name-strong ">Extra <br> seguro</div>
        </a>
      </div>
      <div class="col-md-1">
        <a id="producto2" href="#sensitivo-ultra-delgado">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/sensit-ultra-delgado-durex.png" alt="Sensitivo ultra delgago">
          <div id="guia" class="line-active "></div><div id="nombre" class="nombre">sensitivo ultra <br> delgado</div>
        </a>
      </div>
      <div class="col-md-1">
        <a id="producto3" href="#maximo-placer">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/maximo-placer-durex.png" alt="Máximo placer">
          <div id="guia" class="line-active "></div><div id="nombre" class="nombre">máximo  <br> placer</div>
        </a>
      </div>
      <div class="col-md-1">
        <a id="producto4" href="#placer-prolongado">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/placer-prolongado-durex.png" alt="Placer prolongado">
          <div id="guia" class="line-active "></div><div id="nombre" class="nombre">placer <br> prolongado</div>
        </a>
      </div>
      <div class="col-md-1">
        <a id="producto5" href="#climax-mutuo">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/climax-mutuo-durex.png" alt="Climax mutuo">
          <div id="guia" class="line-active "></div><div id="nombre" class="nombre">clímax <br> mutuo</div>
        </a>
      </div>
      <div class="col-md-1">
        <a id="producto6" href="#anillo-vibrador">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/anillo-vibrador-durex.png" alt="Anillo vibrador">
          <div id="guia" class="line-active "></div><div id="nombre" class="nombre">anillo <br> vibrador</div>
        </a>
      </div>
      <div class="col-md-1">
        <a id="producto7" href="#gel-play-cerezas">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/gel-cerezas-durex.png" alt="Gel play cerezas">
          <div id="guia" class="line-active "></div><div id="nombre" class="nombre">gel play <br> cerezas</div>
        </a>
      </div>
      <div class="col-md-12 guia-menu"></div>
    </div>
  </div>
</div>
<div class="bg-info">
  <div class="container" style="padding:60px 200px;">
    <div id="info-producto1" class="row contenedor-info ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto1">DUREX <sup>&reg;</sup> <br><span>EXTRA <strong>SEGURO</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto"><span>Más gruesos</span> y con <br> lubricación <span>extra.</span></p>
          <p class="descrip-producto"><span>Mayor seguridad y</span> <br> <span>confianza</span> en la relación.</p>
        </div>
        <img class="pack-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/extra-seguro-durex.png" alt="Extra seguro">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 103180)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>
    <div id="info-producto2" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto2"><span style="color: #0096E0;font-family: inherit;">DUREX</span> <sup style="color: #0096E0;">&reg;</sup> <br><span>SENSITIVO <strong>ULTRA DELGADO</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto">Con <span>tecnologíaSensi-Fit<sup>TM</sup></span>, <br> un látex 20% más delgado.</p>
          <p class="descrip-producto"><span>Aumenta la sensibilidad </span><br>durante la relación y <span>mantiene</span> <br> <span>el nivel de protección.</span></p>
        </div>
        <img class="pack-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/sensit-ultra-delgado-durex.png" alt="Sensitivo ultra delgado">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 105865)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>
    <div id="info-producto3" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto3"><span style="color: #0096E0;font-family: inherit;">DUREX</span> <sup style="color: #0096E0;">&reg;</sup> <br><span>MÁXIMO  <strong>PLACER</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto">Tiene <span>puntos y estrías</span> <br> en el látex.</p>
          <p class="descrip-producto">Estimula y aumenta <br>el <span>placer para ella</span>.</p>
        </div>
        <img class="pack-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/maximo-placer-durex.png" alt="Maximo placer durex">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 103179)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>
    <div id="info-producto4" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto4"><span style="color: #0096E0;font-family: inherit;">DUREX</span> <sup style="color: #0096E0;">&reg;</sup> <br><span>PLACER <strong>PROLONGADO</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto">Contiene <span>benzocaína</span> para <br> <span>retardar el clímax</span> del hombre <br>e intensificar el de ella.</p>
          <p class="descrip-producto">Logra un <span>mejor <br>rendimiento físico.</span></p>
        </div>
        <img class="pack-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/placer-prolongado-durex.png" alt="Placer prolongado">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 105872)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>
    <div id="info-producto5" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto4"><span style="color: #0096E0;font-family: inherit;">DUREX</span> <sup style="color: #0096E0;">&reg;</sup> <br><span>CLÍMAX <strong>MUTUO</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto">Diseñados para <span>acelerar</span> <br><span> el clímax de la mujer</span> por <br> medio de <span>puntos y estrías.</span></p>
          <p class="descrip-producto">Con benzocaína que <span>retarda</span> <br> <span>el rendimiento.</span></p>
        </div>
        <img class="pack-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/climax-mutuo-durex.png" alt="Climax mutuo">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 110786)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>
    <div id="info-producto6" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto6"><span style="color: #0096E0;font-family: inherit;">DUREX</span> <sup style="color: #0096E0;">&reg;</sup> <br><span>ANILLO <strong>VIBRADOR</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto">Proporciona hasta <span>20 minutos</span> <br> de <span>palpitante placer </span><br>para los dos.</p>
          <p class="descrip-producto">La experimentación está servida.</p>
        </div>
        <img class="pack-product" style="width: 500px;margin-top: -135px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/anillo-vibrador-durex.png" alt="Anillo vibrador">
          <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 25068)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>
    <div id="info-producto7" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto7"><span style="color: #0096E0;font-family: inherit;">DUREX</span> <sup style="color: #0096E0;">&reg;</sup> <br><span>GEL <strong>PLAY CEREZAS</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto">Brinda a la pareja <span>una experiencia deliciosa con sabor a cereza</span> para complementar su relación.</p>
        </div>
        <img class="pack-product" style="width: 440px;margin-top:-95px;right:-207px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/gel-cerezas-durex.png" alt="Gel cerezas">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 25066)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>
  </div>
</div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/comprometidos-con-tu-placer-al-maximo.jpg" alt="Comprometidos con tu placer al máximo">
<div class="bg-video">
  <div class="container">
    <img style="margin: 0 auto;width: 515px;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/vive-la-experiencia-durex.png" alt="Vive la experiencia durex">
    <div style="padding: 50px 20% 0;">
      <div class="embed-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/LT30WpJug2c?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<section class="programa">
  <div class="container">
    <img width="80" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/carrito.png" > En la Rebaja Virtual programa tu hora y lugar de entrega
  </div>
</section>
<div class="container datos-contacto">
  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <p class="text-atencion">Si tienes algún inconveniente con tu pedido comunícate con nosotros a través de los canales que tenemos disponibles:</p>
    <div class="col-sm-4 col-md-4" style="border-right: 2px solid #FF3C00;">
        <img class="img-responsive"  style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/chat.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Chat en linea</p>
      </div>
    <div class="col-sm-4 col-md-4" style="border-right: 2px solid #FF3C00;">
        <img class="img-responsive" style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/pqrs.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Sistema PQRS</p>
        <p style="font-size:12px;font-family: MyriadPro;">(preguntas, quejas, reclamos y solicitudes)</p>
      </div>
    <div class="col-sm-4 col-md-4">
        <img class="img-responsive" style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/linea.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Linea gratuita</p>
        <p style="font-family: MyriadPro;">01-8000-939900</p>
      </div>
  </div>
</div>
<div class="bg-red">
  <p style="margin:0;">Gracias por comprar en <a href="https://www.larebajavirtual.com">www.larebajavirtual.com</a></p>
</div>
<!--Fin versión escritorio -->
<?php endif; ?>
