<?php $this->pageTitle = "Mejorflex | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Combate la Fiebre y el Dolor con Mejorflex, Cápsula Rápida y Efectiva que Alivia los Síntomas que Provocan el Malestar General. Conoce Más Información Aquí'>
<meta name='keywords' content='mejorflex, iboprufeno para fiebre y dolor, cápsula rápida para aliviar la fiebre, cápsula rápida para el aliviar el dolor.'>
  <style>
    @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    @font-face { font-family:HelveticaNeueLTStd-Hv; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mejorflex/fonts/HelveticaNeueLTStd-Hv.otf);}
    @font-face { font-family:HelveticaBlackItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mejorflex/fonts/HelveticaBlkIt.ttf);}
    @font-face { font-family:HelveticaLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mejorflex/fonts/HelveticaNeueLTStd-LtCn.otf);}
    @font-face { font-family:HelveticaNeueBoldItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mejorflex/fonts/HelveticaNeueLTStd-BdIt.otf);}
    @font-face { font-family:HelveticaNeueMedium; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mejorflex/fonts/HelveticaNeueLTStd-MdCn_0.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .button-desplegable .icon2 {position: relative;width: 100px;height: 100px;-webkit-transition: .2s color;-o-transition: .2s color;transition: .2s color;z-index: 2;}
    .button-desplegable .text2 {display: none;margin-top: -7px;position: absolute;z-index: 1;}
    .button-desplegable:hover .text2 {width: 165px;display: block;-webkit-animation: appearRight .5s ease-out both ;animation: appearRight .5s ease-out both ;margin-top: -93px;}
    @-webkit-keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    @keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(-45%);transform: translateX(-45);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    a {text-decoration:none;}
    .bg-main {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/mejorflex/bg-desktop.jpg);background-size: cover;}
    .title-principal {font-family:HelveticaNeueLTStd-Hv;text-align:center;color:#333333;font-size: 32px;margin-top: 65px;}
    .title-principal span {font-family:HelveticaBlackItalic;color:#FF0D28;}
    .intro-txt {margin-bottom:60px;font-family:HelveticaLight;color:#1F1F1F;text-align: center;font-weight: 100;font-size: 28px;}
    .descrip-product {margin-bottom:20px;font-family:HelveticaNeueBoldItalic;color: #FF0D28;font-size: 26px;line-height: 35px;}
    .descrip-product span {font-size: 44px;}
    .list-check {display:flex;margin-bottom:15px;line-height: 23px;font-family: HelveticaNeueMedium;font-size: 23px; }
    .border {background-color: #fff;border: 4px solid #6197EC;border-radius: 25px;padding: 20px 45px;-webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.6);-moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.6);box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.6);margin: 0px 30% 60px 0px;}
    .producto {width: 450px;float: right;position: absolute;top: 60px;right: -35px;}
    .boton-compra {width: 200px;margin-top: 10px;}
    .nota {background-color: #B5D2EE;color: #0647E4;font-family: HelveticaLight;text-align: center;padding: 13px;}
    .bg-main-mobile {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/mejorflex/bg-mobile.jpg);background-size: cover;}
  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/banner-mobile.jpg" alt="Mejórate con mejorflex">
<div class="bg-main-mobile" style="padding: 35px 15px;">
  <h1 class="title-principal" style="margin: 0;font-size:25px;">Mejórate con <span>Mejorflex</span></h1>
  <h2 class="intro-txt" style="font-size: 20px;margin-bottom: 150px;">Cápsula de rápida disolución que <br><b>baja la fiebre y alivia el dolor.</b></h2>
    <div class="border" style="margin: 0 auto;padding: 20px 30px;">
      <img class="img-responsive-m" style="margin-top: -155px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/mejorflex-caja.png" alt="Mejorflex 400mg">
      <h3 class="descrip-product">Mejorflex 400mg <br> <span style="font-size: 35px;">cápsula rápida</span></h3>
      <div class="list-check">
        <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
        <div style="margin-left: 10px;">Efectivo y rápido <br> alivio del dolor.</div>
      </div>
      <div class="list-check">
        <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
        <div style="margin-left: 10px;">Analgésico <br>y Antipirético.</div>
      </div>
      <div class="list-check">
        <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
        <div style="margin-left: 10px;">Liquid FAST. <br>Rápida disolución.</div>
      </div>
      <div class="list-check">
        <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
        <div style="margin-left: 10px;">Caja cápsula rápida <br> por 10 unidades.</div>
      </div>
      <a data-ajax="false" href="#"><img class="boton-compra" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/btn-comprar.png" alt=""></a>
    </div>
</div>
<section class="nota">
  <p style="margin-bottom:0px;font-size: 15px;">Es un medicamento analgésico, antipirético. No exceder su consumo. Si los síntomas persisten consultar al médico. <br> Leer indicaciones y  contraindicaciones. Reg.San.No. INVIMA 2013M-0014000.</p>
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
<!-- Fin Version movil -->
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
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/banner-mejorflex.jpg" alt="Mejórate con Mejorflex">
<div class="bg-main">
  <div class="container">
    <h1 class="title-principal">Mejórate con <span>Mejorflex</span></h1>
    <h2 class="intro-txt">Cápsula de rápida disolución que <b>baja la fiebre y alivia el dolor.</b> </h2>
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="border">
          <h3 class="descrip-product">Mejorflex 400mg <br> <span>cápsula rápida</span></h3>
          <div class="list-check">
            <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
            <div style="margin-left: 10px;">Efectivo y rápido <br> alivio del dolor.</div>
          </div>
          <div class="list-check">
            <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
            <div style="margin-left: 10px;">Analgésico <br>y Antipirético.</div>
          </div>
          <div class="list-check">
            <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
            <div style="margin-left: 10px;">Liquid FAST. <br>Rápida disolución.</div>
          </div>
          <div class="list-check">
            <div><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/check.png"></div>
            <div style="margin-left: 10px;">Caja cápsula rápida <br> por 10 unidades.</div>
          </div>
          <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/mejorflex-caja.png" alt="Mejorflex 400mg">
          <a href="#"><img class="boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mejorflex/btn-comprar.png" alt=""></a>
        </div>
      </div>
    </div>
  </div>
  <section class="nota">
    <p style="margin-bottom:0px;">Es un medicamento analgésico, antipirético. No exceder su consumo. Si los síntomas persisten consultar al médico. <br> Leer indicaciones y  contraindicaciones. Reg.San.No. INVIMA 2013M-0014000.</p>
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
