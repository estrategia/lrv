<?php $this->pageTitle = "Klim 1+ deslactosado - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=''>
  <meta name='keywords' content=''>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/ky/fonts/MyriadPro.otf);}
    @font-face {font-family:NewJune-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/chococono/fonts/NewJune-Bold.otf);}
    @font-face {font-family:HelveticaNeueLight;src: url(".Yii::app()->request->baseUrl."/images/contenido/chococono/fonts/HelveticaNeueLight.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .img-responsive-m {width:100%;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}

    .main-bg{padding-top: 40px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/chococono/bg-principal.png);background-size: 100%;}
    .embed-container {position: relative;padding-bottom: 56.25%;height: 0;overflow: hidden;}
    .embed-container iframe {position: absolute;top:0;left: 0;width: 100%;height: 100%;}
  </style>
  ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>

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
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 29915)) ?>">
  <div class="sidebar-cart">
    <div class="button-desplegable">
      <div class='icon2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/circle.png" alt=""></div>
      <div class='text2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/line-circle.png" alt=""></div>
    </div>
  </div>
</a>
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
