<?php $this->pageTitle = "Zahara Protector Solar Kids - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=''>
  <meta name='keywords' content=''>
	<style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/zahara/fonts/MyriadPro.otf);}
		@font-face {font-family:GothamRounded-medium;src: url(". Yii::app()->request->baseUrl . "/images/contenido/coaspharma/zahara/fonts/GothamRounded-medium.otf);}
    @font-face {font-family:Gotham-Rounded-Bold;src: url(". Yii::app()->request->baseUrl . "/images/contenido/coaspharma/zahara/fonts/Gotham-Rounded-Bold.ttf);}
    @font-face {font-family:gotham-rounded-light;src: url(". Yii::app()->request->baseUrl . "/images/contenido/coaspharma/zahara/fonts/gotham-rounded-light.otf);}
    @font-face {font-family:romy;src: url(". Yii::app()->request->baseUrl . "/images/contenido/coaspharma/zahara/fonts/romy.ttf);}
    @font-face {font-family:NewJune-Bold;src: url(". Yii::app()->request->baseUrl . "/images/contenido/coaspharma/zahara/fonts/NewJune-Bold.otf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .bg-main {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/zahara/bg-kids.jpg);}
    .menu {display:flex;width: 100%;padding: 0 0 60px;margin-top: -50px;}
    .menu.img {margin: 0 auto;display: block;}
    item {flex-grow: 1;}
    .flecha {animation-duration: 1s;animation-name: slidein;animation-iteration-count: infinite;animation-direction: alternate;}
    @keyframes slidein {from {margin-left: 4%;}to {margin-left: 0%;}}
    .producto {width: 260px;margin-left: -65px;margin-top: -160px;}
    .info-producto {display:flex;}
    .line {display:block;margin-bottom: 14px;margin-left: -16px;}
    .object {margin-bottom: 25px;font-family:GothamRounded-medium;color:#001971;background-color: rgba(255, 255, 255, 0.6);padding: 8px 22px;border-radius: 25px;font-size: 20px;}
    .title-principal{font-family:Gotham-Rounded-Bold;color:#001971;margin: 0;font-size: 33px;}
    .subtitle{font-family:gotham-rounded-light;color: #001971;font-size: 26px;letter-spacing: -1px;margin-bottom: 55px;}
    .compra {float: right;width: 290px;margin-right: 71px;margin-top: -10px;}
    .bg-video {background-color:#FFD13F;padding: 25px 0 40px;}
    .title-video {font-family: romy;color: #001E7E;text-align: center;font-size: 70px;}
    .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
    .video iframe {position: absolute;display: block;top:0;left:0;width: 100%;height: 100%;}
    .programa {font-family:NewJune-Bold;color:#D40209;font-size:25px;text-align: center;padding: 5px;}
  </style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/banner-protector-solar-kids.png" alt="Protector solar Kids">
  <section class="bg-main" style="margin-top: -5px;">
    <nav class="menu" style="display: initial;">
      <item><a href="<?= Yii::app()->request->baseUrl ?>/zahara-protector-solar" data-ajax="false"><img width="250" style="margin: 0 auto;display: block;" src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-adultos.png' alt="Protector solar adultos"></a></item>
      <item><a href="<?= Yii::app()->request->baseUrl ?>/zahara-protector-solar-kids" data-ajax="false"><img width="250" style="margin: 0 auto;display: block;" src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-kids-hover.png' alt="Protector solar kids"></a></item>
      <item><a href="<?= Yii::app()->request->baseUrl ?>/zahara-bronceador" data-ajax="false"><img width="250" style="margin: 0 auto;display: block;" src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador.png' alt="Bronceador"></a></item>
    </nav>
    <div style="padding:25px">
      <h1 class="title-principal" style="font-size: 20px;">PROTECTOR SOLAR ZAHARA KIDS SPF 50</h1>
      <h2 class="subtitle" style="font-size: 18px;margin-bottom: 0;">Te ofrece protección por más tiempo <br> y te da más beneficios</h2>
    </div>
    <img style="margin: 0 auto;width: 200px;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bloqueador-kids-zahara.png">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 48769)) ?>" data-ajax="false"><img style="width: 250px;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/compra-online.png"></a>
    <div style="padding:0 25px">
      <p class="object" style="margin-bottom: 15px;font-size: 15px;letter-spacing:-1px;display: flex;"><img width="20" height="20" style="display: block;margin-right:5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bullet.png">Ideal para niños</p>
      <p class="object" style="margin-bottom: 15px;font-size: 15px;letter-spacing:-1px;display: flex;"><img width="20" height="20" style="display: block;margin-right:5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bullet.png">Con Vitamina E que protege la piel</p>
      <p class="object" style="margin-bottom: 15px;font-size: 15px;letter-spacing:-1px;display: flex;"><img width="20" height="20" style="display: block;margin-right:5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bullet.png">Formúla no grasosa</p>
      <p class="object" style="margin-bottom: 15px;font-size: 15px;letter-spacing:-1px;display: flex;"><img width="20" height="20" style="display: block;margin-right:5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bullet.png">Rápida absorción</p>
      <p class="object" style="margin-bottom: 15px;font-size: 15px;letter-spacing:-1px;display: flex;"><img width="20" height="20" style="display: block;margin-right:5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bullet.png">Con pantalla solar</p>
    </div>
    <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117300)) ?>">
      <img class="img-responsive-m" style="margin-top:25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador-oferta-zahara-mobile.png">
    </a>
  </section>
  <section class="bg-video" style="margin-bottom:15px;">
    <h3 class="title-video" style="font-size: 40px;margin: 0;">Conoce más</h3>
    <center style="padding:0 8%;">
      <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/NofX2FioSOc?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </center>
  </section>
  <section class="programa" style="font-size: 17px;padding:0 25px;">
    <div class="container">
      <img width="60" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/carrito.png" > <br>En la Rebaja Virtual programa tu hora y lugar de entrega
    </div>
  </section>
<div class="datos-contacto" style="padding: 20px 15px;">
      <p class="text-atencion">Si tienes algún inconveniente con tu pedido comunícate con nosotros a través de los canales que tenemos disponibles:</p>
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
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/banner-protector-solar-kids.png" alt="Protector solar Kids">
<section class="bg-main">
  <div class="container">
    <div class="row">
      <nav class="menu">
        <item>
          <a href="<?= Yii::app()->request->baseUrl ?>/zahara-protector-solar">
            <img width="300" style="margin: 0 auto;display: block;" src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-adultos.png' onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-adultos-active.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-adultos.png';" alt="Protector solar adultos"></a>
        </item>
        <item>
          <img width="40" class="flecha" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/flecha-protector-solar-kids.png">
          <a href="<?= Yii::app()->request->baseUrl ?>/zahara-protector-solar-kids"><img width="300" style="margin: 0 auto;" src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-kids-hover.png' onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-kids-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-solar-kids-hover.png';"alt="Protector solar kids"></a>
        </item>
        <item>
          <a href="<?= Yii::app()->request->baseUrl ?>/zahara-bronceador"><img width="300" style="margin: 0 auto;display: block;" src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador.png' onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador.png';" alt="Bronceador"></a>
        </item>
      </nav>
    </div>
    <div class="row" style="padding: 0 60px;">
      <h1 class="title-principal">PROTECTOR SOLAR ZAHARA <br> KIDS SPF 50</h1>
      <h2 class="subtitle">Te ofrece protección por más tiempo <br> y te da más beneficios</h2>
    </div>
    <div class="row" style="padding: 0 100px;">
      <div class="info-producto">
        <div class="item">
          <p class="object">Ideal para niños</p>
          <p class="object">Con Vitamina E que protege la piel</p>
          <p class="object">Formúla no grasosa</p>
          <p class="object">Rápida absorción</p>
          <p class="object">Con pantalla solar</p>
        </div>
        <div class="item">
          <img class="line" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/line-kids.png">
          <img class="line" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/line-kids.png">
          <img class="line" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/line-kids.png">
          <img class="line" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/line-kids.png">
          <img class="line" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/line-kids.png">
        </div>
        <div class="item">
          <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bloqueador-kids-zahara.png">
        </div>
      </div>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 48769)) ?>"><img class="compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/compra-online.png"></a>
    </div>
  </div>
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117300)) ?>">
    <img class="img-responsive" style="margin-top: 70px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador-oferta-zahara.png">
  </a>
</section>
<section class="bg-video">
  <h3 class="title-video">Conoce más</h3>
  <center style="padding:0 25%;">
    <div class="video">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/NofX2FioSOc?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </center>
</section>
<section class="programa">
  <div class="container">
    <img width="60" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/carrito.png" > En la Rebaja Virtual programa tu hora y lugar de entrega
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
<!--Fin versión escritorio-->
<?php endif; ?>
