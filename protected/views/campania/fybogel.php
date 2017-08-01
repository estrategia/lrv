<?php $this->pageTitle = "Fybogel - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Fybogel, tratamiento con fibra natural con sabor a naranja que te libera del estreñimiento, ayuda a mejorar el tránsito intestinal y te hace sentir más ligera.'>
  <meta name='keywords' content='fibra para estreñimiento, fybogel, estreñimiento.'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    @font-face {font-family:AvenirLTStd-Black;src: url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/fonts/AvenirLTStd-Black.otf);}
    @font-face {font-family:AvenirLTStd-Book;src: url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/fonts/AvenirLTStd-Book.otf);}
    @font-face {font-family:NewJune-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/fonts/NewJune-Bold.otf);}
    @font-face {font-family:AvenirLTStd-Heavy;src: url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/fonts/AvenirLTStd-Heavy.otf);}
    @font-face {font-family:AvenirLTStd-Black;src: url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/fonts/AvenirLTStd-Black.otf);}
    @font-face {font-family:AvenirLTStd-Roman;src: url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/fonts/AvenirLTStd-Roman.otf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .line {display:flex;align-items: center;padding: 0 12%;margin-bottom: 15px;}
    .list {font-family:AvenirLTStd-Black;color:#00ABEE;font-size:30px;line-height: 20px;background-color: rgba(0, 171, 238, 0.08);width: 100%;padding: 10px 45px;margin: 0;height: 60px;}
    .check {width: 130px;min-width: 130px;}
    .list span {font-family:AvenirLTStd-Book;font-size:20px;}
    .bg-check {padding-bottom: 20px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/bg-check.png);background-size: cover;}
    .programa {background-color:#D7D8DC;font-family:NewJune-Bold;color:#D40209;font-size:25px;text-align: center;padding: 5px;}
    .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
    .video iframe {position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
    .section-video{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/bg-video.jpg);background-size: cover;}
    .bg-title{padding: 20px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/fybogel/bg-title.jpg);background-size: cover;}
    .bg-title h1 {font-size: 28px;margin: 0 auto;text-align: center;color: #fff;font-family:AvenirLTStd-Roman;letter-spacing: -1px;}
    .bg-title h1 span {font-family:AvenirLTStd-Black;font-size: 40px;}
    .list-m {font-family: AvenirLTStd-Black;color: #00ABEE;font-size: 18px;margin: 0;padding-inline-start: 20px;}
  </style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 13750)) ?>"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/banner.jpg" alt="Sin estreñimiento Fybogel"></a>
<img class="img-responsive-m" style="margin-top: -5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/fybogel-tratamiento-fibra-natural-mobile.jpg" alt="Fybogel tratamiento fibra natural">
<section class="bg-check" style="padding: 0 15px 20px;">
  <ul class="list-m" style="padding-top: 20px;">
    <li>Ayuda en el tratamiento del estreñimiento.</li>
    <li>Ayuda a mejorar el transito intestinal.</li>
    <li>Ayuda a sentirte más ligera.</li>
    <li>Ayuda a reducir los niveles del colesterol. <br> <span style="font-family: AvenirLTStd-Book;font-size: 13px;">*acompañado de una dieta baja en grasas saturadas.</span></li>
    <li>Agradable sabor a naranja.</li>
    <li>No contiene azúcar.</li>
  </ul>
</section>
<section class="programa" style="font-size: 17px;padding: 15px;">
  <div class="container">
    <img width="80" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/carrito.png" ><br>
    En la Rebaja Virtual programa tu hora y lugar de entrega
  </div>
</section>
<section><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/mecanismo-de-accion.jpg" alt="Mecanismos de acción"></section>
<section class="section-video" style="margin-top: -5px;padding-bottom: 15px;">
  <div class="bg-title" style="padding: 10px 15px;"><h1 style="font-size: 19px;"><span style="font-size: 33px;">Con Fybogel<sup>®</sup></span><br>ponle fin al estreñimiento y <br>acostúmbrate a estar bien</h1></div>
  <div style="padding: 20px 15px 5px;">
    <div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/MkwjT342CVw?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
  </div>
  <p style="font-family:AvenirLTStd-Heavy;color:#434142;text-align:center;font-size: 12px;padding: 0 15px;">Es un medicamento, no exceder su consumo. Leer indicaciones y contraindicaciones. Indicaciones: Laxante como aporte de fibra natural. <br>
  Coadyuvante a la dieta baja en grasas saturadas y colesterol en pacientes con hiperlipidemia. Si persisten los síntomas consulte a su médico. <br>
  Fybogel® gránulos Registro sanitario INVIMA No. 2016M-006811-R3.</p>
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
<!--Versión escritorio-->
<?php else: ?>
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 13750)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/btn-fijo.png" alt="Compra online"></div></a>
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 13750)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/banner.jpg" alt="Sin estreñimiento Fybogel"></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/fybogel-tratamiento-fibra-natural.jpg" alt="Fybogel tratamiento fibra natural">
<section class="bg-check">
  <div class="container">
    <div class="col-sm-12 col-md-12" style="margin-top: 50px;">
      <div class="line">
        <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/check.png" >
        <ul class="list" style="padding-top: 20px;"><li>Ayuda en el tratamiento del estreñimiento.</li></ul>
      </div>
      <div class="line">
        <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/check.png" >
        <ul class="list" style="padding-top: 20px;"><li>Ayuda a mejorar el transito intestinal.</li></ul>
      </div>
      <div class="line">
        <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/check.png" >
        <ul class="list" style="padding-top: 20px;"><li>Ayuda a sentirte más ligera.</li></ul>
      </div>
      <div class="line">
        <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/check.png" >
        <ul class="list"><li>Ayuda a reducir los niveles del colesterol. <br> <span>*acompañado de una dieta baja en grasas saturadas.</span></li></ul>
      </div>
      <div class="line">
        <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/check.png" >
        <ul class="list" style="padding-top: 20px;"><li>Agradable sabor a naranja.</li></ul>
      </div>
      <div class="line">
        <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/check.png" >
        <ul class="list" style="padding-top: 20px;"><li>No contiene azúcar.</li></ul>
      </div>
    </div>
  </div>
</section>
<section class="programa">
  <div class="container">
    <img width="80" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/carrito.png" > En la Rebaja Virtual programa tu hora y lugar de entrega
  </div>
</section>
<section><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/fybogel/mecanismo-de-accion.jpg" alt="Mecanismos de acción"></section>
<section class="section-video">
  <div class="bg-title"><h1><span>Con Fybogel<sup>®</sup></span><br>ponle fin al estreñimiento y acostúmbrate a estar bien</h1></div>
  <div class="container">
    <div class="row" style="padding: 40px 230px 20px">
      <div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/MkwjT342CVw?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
    </div>
    <div class="row">
      <p style="font-family:AvenirLTStd-Heavy;color:#434142;font-size:14px;text-align:center;">Es un medicamento, no exceder su consumo. Leer indicaciones y contraindicaciones. Indicaciones: Laxante como aporte de fibra natural. <br>
      Coadyuvante a la dieta baja en grasas saturadas y colesterol en pacientes con hiperlipidemia. Si persisten los síntomas consulte a su médico. <br>
      Fybogel® gránulos Registro sanitario INVIMA No. 2016M-006811-R3.</p>
    </div>
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
<!--Fin versión escritorio
<?php endif; ?>
