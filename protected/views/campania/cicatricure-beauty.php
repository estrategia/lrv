<?php $this->pageTitle = "Cicatricure beauty care - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Luce una piel joven y bella con Cicatricure, la ciencia que cuida tu piel. Descubre todos los beneficios de los productos Cicatricure. '>
  <meta name='keywords' content='cicatricure, cicatricure gel, cicatricure beauty care.'>
	<style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/cicatricure/font/MyriadPro.otf);}
    @font-face {font-family:NewJune-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/cicatricure/font/NewJune-Bold.otf);}
    @font-face { font-family:Merriweather-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/Merriweather-Light.ttf);}
    @font-face { font-family:OpenSans-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/OpenSans-Light.ttf);}
    @font-face { font-family:OpenSans-SemiBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/OpenSans-SemiBold.ttf);}
    @font-face { font-family:OpenSans-Regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/OpenSans-Regular.ttf);}
    .animate1 {visibility: hidden;}
    .header {background-color:#ff4392;}
    .header .logo {margin:0 auto;}
    .main-title {font-family:Merriweather-Light;color:#333333;text-align:center;margin-bottom: 0px;}
    .main-title::after {content: '';height: 2px;width:550px;margin-top: 25px;background-color:#ff4392;display: block;margin: 5px auto;}
    .parrafo {font-family: OpenSans-Light;color: #666666;text-align: center;margin: 40px 0 20px;}
    .parrafo p {margin-bottom:0px;font-size: 17px;}
    h2 {font-family: OpenSans-SemiBold !important;color: #ff4392 !important;text-align: center;font-size: 20px !important;}
    .nombre-producto { font-family: OpenSans-Light;text-align: center;color: #666666;font-size: 15px !important;font-weight: bold;line-height: 16px !important;}
    .border {border:1px solid #ff4392;padding: 10px 30px;}
    .intro {font-family: OpenSans-Light;color: #666666;font-size: 14px;text-align:center;}
    .more {color: #ff4392;text-decoration: underline;font-family: Merriweather-Light;font-size: 14px;text-align: center;display: block;}
    .more:hover {color: #E91D7B;text-decoration: underline;}
    .comprar {font-family: OpenSans-Light;color: #fff;background-color: #ff4392;border: 1px solid #cccccc;text-align: center;display: block;padding: 7px;margin-top: 15px;}
    .comprar:hover {color:#fff;}
    .texto-p {font-family:OpenSans-Regular; color: #a9a9a9;text-align: center;font-size: 17px;}
    .bg-gray {background-color: #f0f0f0;margin: 50px 0 30px;padding: 30px 0;}
    .reservados {font-family:OpenSans-Regular;text-align:center;color:#000000; font-size:12px;margin-bottom: 15px;}
    .programa {background-color:#D7D8DC;font-family:NewJune-Bold;color:#D40209;font-size:25px;text-align: center;padding: 5px;}
    .img-responsive-m {width:100%;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .space-1 {height: 0px !important;}
    .comprar-large {font-family: OpenSans-Light;color:#ff4392;background-color: #fff;text-align: center;display: block;padding: 7px;width: 200px;margin: -21px auto 0;}
    .comprar-large:hover {color:#ff4392;}
    .title-white {font-family:OpenSans-SemiBold;color:#fff;font-size:15px;margin-bottom: 20px;}
    .text-white{font-family:Merriweather-Light; color:#fff;margin-bottom: 20px;}
    .block-gray {background-color: #f0f0f0;text-align: center;color:#ff4392;font-family: OpenSans-SemiBold;height: 354.6px;font-size: 18px;align-items: center;display: flex;}
    .block-gray p {margin: 0 auto;letter-spacing: 1px;}
    .block-gray:hover{background-color:#ff4392;color: #f0f0f0;-webkit-transition: 0.2s ease;-moz-transition: 0.2s ease;-o-transition: 0.2s ease;transition: 0.2s ease;}
    .owl-pagination { margin-top: 40px !important;}
    .owl-theme .owl-controls .owl-page span {background-color: #E91D7B !important;}
    a {text-decoration:none !important;}
</style>
";
?>
<link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/animate.min.css">
<script src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/wow.min.js"></script>
<script type="text/javascript">wow = new WOW(); wow.init();</script>

<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
  <div class="header">
    <img style="margin: 0 auto;display: block;width: 300px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatricure.png">
  </div>
  <h1 class="main-title" style="padding: 0 15px;font-size: 25px;">¿Quieres verte bien al instante?</h1>
  <img class="img-responsive-m"  style="margin-top: -5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/banner-beauty.jpg">
  <div class="parrafo animate1 wow zoomIn" data-wow-offset="100" style="padding:0 15px;">
    <p>Cicatricure Beauty Care es una crema de día con una exclusiva fórmula que reúne los 5 cuidados que la piel necesita en 1 solo paso. <br>
    Su exclusiva fórmula con péptidos y partículas de Mica hidrata por 24 horas, iguala el tono de la piel, previene líneas de expresión, control el brillo y protege de los rayos del sol (FPS 25).
    </p>
  </div>
  <h2 class="wow rubberBand" data-wow-offset="100" style="margin-top: 30px !important;">CÓMPRALO AHORA EN LAREBAJAVIRTUAL.COM</h2>
  <div style="background-color:#ff4392;margin-top: 60px;padding: 20px;">
    <img class="img-responsive-m" style="margin: 15px 0 30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatricure-crema-de-dia.png">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115890)) ?>" class="comprar-large">COMPRAR</a>
    <h3 class="title-white" style="margin-top:50px;">CICATRICURE BEAUTY CARE</h3>
    <p class="text-white">Tu “toque beauty” todos los días. ¡5 cuidados en un solo paso! Cicatricure Beauty Care es una crema de día con una exclusiva fórmula que reúne los 5 cuidados que la piel necesita en 1 solo paso.
    Su exclusiva fórmula con péptidos y partículas de Mica hidrata por 24 horas, iguala el tono de la piel, previene líneas de expresión, control el brillo y protege de los rayos del sol (FPS 25). Cicatricure Beauty Care está dermatológicamente testeada y puede usarse en todos los tonos de piel. Una piel uniforme y luminosa todos los días.</p>
    <div style="background-color:#fff;text-align: center;color:#ff4392;padding: 5px 70px;">
      <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/reloj-rosado.jpg">
      <p>Aplicar cada mañana.</p>
      <img class="img-responsive"  style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/rostro.png">
      <p>Aplica en la piel <br> del rostro y cuello.</p>
    </div>
  </div>
  <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle" style="margin-top: 35px;">
    <div class="item" style="padding: 0 60px;">
      <div class="border">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatrices-y-estrias.png">
        <h3 class="nombre-producto">CICATRICURE <br> GEL</h3>
        <p class="intro">Gel para aplicar en<br>cicatrices y estrías.</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure-gel" class="more">Ver más información</a>
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2401)) ?>" class="comprar">COMPRAR</a>
      </div>
    </div>
    <div class="item" style="padding: 0 60px;">
      <div class="border">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/contorno-ojos.png">
        <h3 class="nombre-producto">CICATRICURE <br> CONTORNO DE OJOS</h3>
        <p class="intro">Protege tu mirada<br>&nbsp;</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure-contorno-ojos" class="more">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 68091)) ?>" class="comprar">COMPRAR</a>
        </div>
      </div>
    <div class="item" style="padding: 0 60px;">
      <div class="border">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatricure-crema-de-dia.png">
        <h3 class="nombre-producto">CICATRICURE <br> BEAUTY CARE</h3>
        <p class="intro">Tu “toque beauty”<br>todos los días</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure-beauty-care" class="more">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115890)) ?>" class="comprar">COMPRAR</a>
        </div>
      </div>
    <div class="item" style="padding: 0 60px;">
      <div class="border">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/lineas-de-expresion-y-arrugas.png">
        <h3 class="nombre-producto">CICATRICURE<br>CREMA</h3>
        <p class="intro">Siempre joven y bella <br> &nbsp;</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure-crema" class="more">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 64629)) ?>" class="comprar">COMPRAR</a>
      </div>
    </div>
  </div>
  <section class="bg-gray">
    <div class="container wow fadeInUp" data-wow-offset="150">
      <div class="col-sm-4 col-md-4">
        <h2 style="margin-top: 30px !important;">ROSTRO, CUELLO Y ESCOTE</h2>
        <p class="texto-p">Cicatricure es la línea de productos <br>
           especializados en el cuidado de la <br>
           piel. Su línea de cremas ayuda a <br>
           mantener tu piel hidratada y a <br>
           mejorar la apariencia de las arrugas y <br>
           líneas de expresión.</p>
      </div>
      <div class="col-sm-4 col-md-4">
        <h2 style="margin-top: 30px !important;">CUERPO Y CICATRICES</h2>
        <p class="texto-p">Cicatricure ha desarrollado una <br>
        fórmula exclusiva con extractos <br>
        de origen natural para cuidar y <br>
        mejorar la apariencia de <br>
        cicatrices, marcas por <br>
        quemaduras o estrías en la piel.</p>
      </div>
      <div class="col-sm-4 col-md-4">
        <h2 style="margin-top: 30px !important;">OJOS</h2>
        <p class="texto-p">Cicatricure cuida la piel alrededor <br>
        de tus ojos, ayudando a mejorar <br>
        la apariencia de las arrugas y la <br>
        coloración de las ojeras. Ideal<br>
         para tener siempre una mirada <br>
         joven y fresca. </p>
      </div>
    </div>
  </section>
  <hr style="border-top: 1px solid #cccccc;">
  <p class="reservados">2017 GENOMMALAB - Todos los derechos reservados</p>
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
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<div class="header">
  <img class="img-responsive logo" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatricure.png">
</div>
<h1 class="main-title">¿Quieres verte bien al instante?</h1>
<img class="img-responsive"  style="margin-top: -5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/banner-beauty.jpg">
<div class="container">
  <div class="row parrafo animate1 wow zoomIn" data-wow-offset="100">
    <p>Cicatricure Beauty Care es una crema de día con una exclusiva fórmula que reúne los 5 cuidados que la piel necesita en 1 solo paso. <br>
      Su exclusiva fórmula con péptidos y partículas de Mica hidrata por 24 horas, iguala el tono de la piel, previene líneas de expresión, control el brillo y protege de los rayos del sol (FPS 25).
    </p>
  </div>
  <h2 class="wow rubberBand" data-wow-offset="100" style="margin-top: 30px !important;">CÓMPRALO AHORA EN LAREBAJAVIRTUAL.COM</h2>
<div class="row" style="background-color:#ff4392;margin-top: 60px;padding: 20px;">
  <div class="col-sm-5 col-md-5">
    <img class="img-responsive" style="margin: 15px 0 30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatricure-crema-de-dia.png">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115890)) ?>" class="comprar-large">COMPRAR</a>
  </div>
  <div class="col-sm-7 col-md-7">
    <div class="row">
      <h3 class="title-white">CICATRICURE BEAUTY CARE</h3>
      <p class="text-white">
        Tu “toque beauty” todos los días. ¡5 cuidados en un solo paso! <br>
        Cicatricure Beauty Care es una crema de día con una exclusiva fórmula que reúne los 5 cuidados que la piel necesita en 1 solo paso.
        Su exclusiva fórmula con péptidos y partículas de Mica hidrata por 24 horas, iguala el tono de la piel, previene líneas de expresión, control el brillo y protege de los rayos del sol (FPS 25). <br>
        Cicatricure Beauty Care está dermatológicamente testeada y puede usarse en todos los tonos de piel. Una piel uniforme y luminosa todos los días.
      </p>
    </div>
    <div class="row" style="background-color:#fff;text-align: center;color:#ff4392;padding: 5px 70px;">
      <div class="col-sm-6 col-md-6">
        <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/reloj-rosado.jpg">
        <p>Aplicar cada mañana.</p>
      </div>
      <div class="col-sm-6 col-md-6">
        <img class="img-responsive"  style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/rostro.png">
        <p>Aplica en la piel <br> del rostro y cuello.</p>
      </div>
    </div>
  </div>
</div>
<div class="row" style="margin-top: 35px;">
    <div class="col-sm-3 col-md-3 wow fadeIn" data-wow-offset="155">
      <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure">
        <div class="block-gray">
          <p>CONOCE<br>TODOS LOS<br>PRODUCTOS<br>CICATRICURE</p>
        </div>
      </a>
    </div>
    <div class="col-sm-3 col-md-3 wow fadeIn" data-wow-offset="160">
      <div class="border">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatrices-y-estrias.png">
        <h3 class="nombre-producto">CICATRICURE <br> GEL</h3>
        <p class="intro">Gel para aplicar en<br>cicatrices y estrías.</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure-gel" class="more">Ver más información</a>
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2401)) ?>" class="comprar">COMPRAR</a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3 wow fadeIn" data-wow-offset="165">
      <div class="border">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/contorno-ojos.png">
        <h3 class="nombre-producto">CICATRICURE <br> CONTORNO DE OJOS</h3>
        <p class="intro">Protege tu mirada<br>&nbsp;</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure-contorno-ojos" class="more">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 68091)) ?>" class="comprar">COMPRAR</a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3 wow fadeIn" data-wow-offset="170">
      <div class="border">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/lineas-de-expresion-y-arrugas.png">
        <h3 class="nombre-producto">CICATRICURE<br>CREMA</h3>
        <p class="intro">Siempre joven y bella <br> &nbsp;</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/cicatricure-crema" class="more">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 64629)) ?>" class="comprar">COMPRAR</a>
      </div>
    </div>
  </div>
</div>
<section class="bg-gray">
  <div class="container wow fadeInUp" data-wow-offset="150">
    <div class="col-sm-4 col-md-4">
      <h2 style="margin-top: 30px !important;">ROSTRO, CUELLO Y ESCOTE</h2>
      <p class="texto-p">Cicatricure es la línea de productos <br>
         especializados en el cuidado de la <br>
         piel. Su línea de cremas ayuda a <br>
         mantener tu piel hidratada y a <br>
         mejorar la apariencia de las arrugas y <br>
         líneas de expresión.</p>
    </div>
    <div class="col-sm-4 col-md-4">
      <h2 style="margin-top: 30px !important;">CUERPO Y CICATRICES</h2>
      <p class="texto-p">Cicatricure ha desarrollado una <br>
      fórmula exclusiva con extractos <br>
      de origen natural para cuidar y <br>
      mejorar la apariencia de <br>
      cicatrices, marcas por <br>
      quemaduras o estrías en la piel.</p>
    </div>
    <div class="col-sm-4 col-md-4">
      <h2 style="margin-top: 30px !important;">OJOS</h2>
      <p class="texto-p">Cicatricure cuida la piel alrededor <br>
      de tus ojos, ayudando a mejorar <br>
      la apariencia de las arrugas y la <br>
      coloración de las ojeras. Ideal<br>
       para tener siempre una mirada <br>
       joven y fresca. </p>
    </div>
  </div>
</section>
<hr style="border-top: 1px solid #cccccc;">
<p class="reservados">2017 GENOMMALAB - Todos los derechos reservados</p>
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
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
