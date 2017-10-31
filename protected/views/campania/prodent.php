<?php $this->pageTitle = "Pro-Dent - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, user-scalable=no' />
  <meta name='description' content='Las cremas dentales PRODENT hacen parte del cuidado oral para ti y tu familia. Vienen en diferentes sabores y para cada necesidad.'>
  <meta name='keywords' content='crema dental, crema dental sin fluor, crema dental niños.'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/fonts/MyriadPro.otf);}
    @font-face {font-family:NewJune-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/fonts/NewJune-Bold.otf);}
    @font-face {font-family:Campton-SemiBold;src: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/fonts/Campton-SemiBold.otf);}
    @font-face {font-family:Campton-Light;src: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/fonts/Campton-Light.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .img-responsive-m {width:100%;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .space-1 {height: 0px !important;}
    .programa {background-color:#D7D8DC;font-family:NewJune-Bold;color:#D40209;font-size:25px;text-align: center;padding: 5px;}
    .line-blue {background-color: #5FA098;height: 20px;margin-top: 5px;opacity: 0.25;}
    .menu {margin-top: -40px;margin-bottom: 80px;}
    .item-menu img {max-width: 90%;margin: 0 auto;display: block;min-width: 90%;}
    .item-menu.active img {-webkit-transform: translateY(-5px);transform: translateY(-5px);transition-duration: 0.3s;}
    .item-menu:hover img {-webkit-transform: translateY(-5px);transform: translateY(-5px);transition-duration: 0.3s;}
    .item-menu.active:before {pointer-events: none;position: absolute;z-index: -1;content: '';top: 110%;left: 26%;height: 3px;width: 50%;opacity: 1;background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.25) 0%, transparent 80%);background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.25) 0%, transparent 80%);-webkit-transition-duration: 0.3s;transition-duration: 0.3s;-webkit-transition-property: transform, opacity;transition-property: transform, opacity;}
    .item-menu.active:hover img {-webkit-transform: translateY(-10px);transform: translateY(-10px);transition-duration: 0.3s;}
    .item-menu:before {pointer-events: none;position: absolute;z-index: -1;content: '';top: 100%;left: 26%;height: 3px;width: 50%;opacity: 0;background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.25) 0%, transparent 80%);background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.25) 0%, transparent 80%);-webkit-transition-duration: 0.3s;transition-duration: 0.3s;-webkit-transition-property: transform, opacity;transition-property: transform, opacity;}
    .item-menu:hover, .item-menu:focus, .item-menu:active {-webkit-transform: translateY(-5px);transform: translateY(-5px);}
    .item-menu:hover:before, .item-menu:focus:before, .item-menu:active:before{opacity: 1;-webkit-transform: translateY(5px);transform: translateY(5px);}
    .main-title {font-family:Campton-SemiBold;color:#31549F;margin: 0;font-size: 32px;}
    .name-product {font-family:Campton-Light;color:#008ED7;margin: 0;font-size: 35px;}
    .lista-descrip {font-family: Campton-Light;color: #5B5B5F;font-size: 23px;padding-inline-start: 55px;margin-top: 37px;line-height: 23px;}
    .lista-descrip li {margin-bottom:25px;}
    .bullet-red {list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/bullet-red.png);}
    .bullet-green {list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-verde.png);}
    .button-desplegable {margin-top: 20%;}
    .button-desplegable .icon2 {position: relative;width: 100px;height: 100px;-webkit-transition: .2s color;-o-transition: .2s color;transition: .2s color;z-index: 2;}
    .button-desplegable .text2 {display: none;margin-top: -7px;position: absolute;z-index: 1;}
    .button-desplegable:hover .text2 {width: 165px;display: block;-webkit-animation: appearRight .5s ease-out both ;animation: appearRight .5s ease-out both ;margin-top: -93px;}
    @-webkit-keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(25%);transform: translateX(25%);}}
    @keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(25%);transform: translateX(25%);}}
    .img-product {max-width: 90%;display: block;min-width: 90%;}
    .bg-anticaries{margin-bottom:15px;padding: 60px 0 40px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/bg-anticaries.png);background-size: 100%;}
    .item-menu-m {max-width: 80%;margin: 5px auto;display: block;min-width: 80%;}
  </style>
";?>
<script src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/wow.min.js"></script>
 <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/animate.min.css">
<script type="text/javascript">wow = new WOW(); wow.init();</script>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/banner01.jpg" alt="">
<div style="margin-top: 10px;padding: 0 15px">
  <a href="<?= Yii::app()->request->baseUrl ?>/prodent-cuidado-oral" data-ajax="false"><img class="item-menu-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-crema-dental.png" alt="Pro-dent Crema dental"></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/prodent-cuidado-oral-ninos" data-ajax="false"><img class="item-menu-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-crema-dental-kids.png" alt="Pro-dent Crema dental Kids"></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/prodent-ennjuague-bucal" data-ajax="false"><img class="item-menu-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-enjuague-bucal.png" alt="Pro-dent Crema enjuague bucal"></a>
</div>
<div style="margin-bottom:50px; padding:0 20px;margin-top: 50px;" class="wow bounceInLeft" data-wow-offset="90">
  <h2 class="main-title" style="font-size: 25px;">CREMA DENTAL</h2>
  <h3 class="name-product" style="font-size: 25px;margin-top: 2px;line-height: 20px;">Pro-Dent Blanqueadora</h3>
  <ul class="lista-descrip bullet-red" style="padding-inline-start: 40px;margin-top:25px;">
    <li>Fortifica el esmalte dental para reducir la incidencia de caries.</li>
    <li>Su uso continuo ayuda a mantener dientes blancos por más tiempo.</li>
    <li>Ayuda a mantener un aliento fresco y duradero.</li>
  </ul>
  <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/pro-dent-blanqueadora.png" alt="Pro-dent Crema dental blanqueadora">
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 116492)) ?>">
    <img class="img-responsive-m" style="width: 80%;margin: 20px auto 0px;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/compra-online-mobile.png" alt="">
  </a>
</div>
<section class="bg-anticaries" style="padding: 50px 20px 25px;margin-bottom:0px;">
  <div class="wow bounceInRight" data-wow-offset="50">
    <h2 class="main-title" style="font-size: 25px;">CREMA DENTAL</h2>
    <h3 class="name-product" style="font-size: 25px;margin-top: -8px;">Pro-Dent Anticaries</h3>
      <ul class="lista-descrip bullet-green" style="padding-inline-start: 40px;margin-top:15px;">
        <li>Fortifica el esmalte dental.</li>
        <li>Reduce la incidencia de caries.</li>
        <li>Aliento fresco y con sabor a menta por más tiempo.</li>
      </ul>
      <img class="img-product" style="margin-top: -40px;max-width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-menta.png" alt="Pro-dent menta anticaries">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115286)) ?>">
        <img class="img-responsive-m" style="width: 80%;margin: 0px auto 0px;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/compra-online-mobile.png" alt="">
      </a>
    </div>
</section>
<img class="img-responsive-m" style="margin-top:-5px;"src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/banner-secundario.jpg" alt="">
<section class="programa" style="margin-top: -5px;font-size: 18px;padding: 10px 20px 25px;">
  <div class="container">
    <img width="80" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/carrito.png" > <br> En la Rebaja Virtual programa tu hora y lugar de entrega
  </div>
</section>
<div class="datos-contacto" style="padding: 20px 15px;">
  <p class="text-atencion">Si tienes algún inconveniente con tu pedido <br>comunícate con nosotros a través de los canales que tenemos disponibles:</p>
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
<!--Fin version movil-->
<!--Versión escritorio-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/banner01.jpg" alt="">
<section>
  <div class="line-blue"></div>
  <div class="container">
    <div class="row menu">
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/prodent-cuidado-oral" class="item-menu active"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-crema-dental.png" alt="Pro-dent Crema dental"></a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/prodent-cuidado-oral-ninos" class="item-menu" ><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-crema-dental-kids.png" alt="Pro-dent Crema dental Kids"></a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/prodent-ennjuague-bucal" class="item-menu"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-enjuague-bucal.png" alt="Pro-dent Crema enjuague bucal"></a>
      </div>
    </div>
  </div>
</section>
<div class="container wow bounceInLeft" data-wow-offset="90">
  <div class="row  "  style="margin-bottom: 50px;">
    <div class="col-md-12">
      <h2 class="main-title">CREMA DENTAL</h2>
      <h3 class="name-product">Pro-Dent Blanqueadora</h3>
    </div>
    <div class="col-sm-5 col-md-5">
      <ul class="lista-descrip bullet-red">
        <li>Fortifica el esmalte dental para <br> reducir la incidencia de caries.</li>
        <li>Su uso continuo ayuda a mantener <br> dientes blancos por más tiempo.</li>
        <li>Ayuda a mantener un aliento <br> fresco y duradero.</li>
      </ul>
    </div>
    <div class="col-sm-7 col-md-7">
      <div class="col-sm-8 col-md-8">
        <img class="img-product" style="margin-top: -25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/pro-dent-blanqueadora.png" alt="Pro-dent Crema dental blanqueadora">
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 116492)) ?>">
          <div class="button-desplegable">
            <div class='icon2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/circle.png" alt=""></div>
            <div class='text2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/line-circle.png" alt=""></div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<section class="bg-anticaries">
  <div class="container">
    <div class="row wow bounceInRight" data-wow-offset="50">
      <div class="col-md-12">
        <h2 class="main-title">CREMA DENTAL</h2>
        <h3 class="name-product">Pro-Dent Anticaries</h3>
      </div>
      <div class="col-sm-5 col-md-5">
        <ul class="lista-descrip bullet-green">
          <li>Fortifica el esmalte dental.</li>
          <li>Reduce la incidencia de caries.</li>
          <li>Aliento fresco y con sabor <br> a menta por más tiempo.</li>
        </ul>
      </div>
      <div class="col-sm-7 col-md-7">
        <div class="col-sm-8 col-md-8">
          <img class="img-product" style="margin-top: -60px;max-width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-menta.png" alt="Pro-dent menta anticaries">
        </div>
        <div class="col-sm-4 col-md-4">
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115286)) ?>">
            <div class="button-desplegable" style="margin-top: -20px;">
              <div class='icon2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/circle.png" alt=""></div>
              <div class='text2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/line-circle.png" alt=""></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/banner-secundario.jpg" alt="">
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
  </div><!--Fin versión escritorio-->
<?php endif; ?>
