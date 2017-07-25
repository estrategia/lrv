<?php $this->pageTitle = "air-lift - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Air Lift® Spray con componentes naturales, ayuda a combatir las causas que producen el mal aliento (halitosis) de la boca hasta por 3 horas.'>
  <meta name='keywords' content='Air lift, mal aliento, halitosis.'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    @font-face {font-family:AzoSans-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/air-lift/fonts/AzoSans-Bold.otf);}
    @font-face {font-family:MyriadPro-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/air-lift/fonts/MyriadPro-Bold.otf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .flecha {margin-top: -5px;animation-duration: 1s;animation-name: slidein;animation-iteration-count: infinite;animation-direction: alternate;width:48px;}
    @keyframes slidein {from {margin-left: 8%;}to {margin-left: 0%;}}
    .producto {width: 80%;margin-top: -65%;margin-bottom: 15px;}
    .intro-producto {color: #5CC3E6;font-family: AzoSans-Bold;text-align: right;font-size: 28px;padding-right: 0 !important;margin-top: 30px;}
    .intro-producto p {line-height: 32px;}
    .intro-producto span {font-family: MyriadPro-Bold;color: #4165AA;font-size: 20px;}
    i{font-style:normal;animation-duration: 0.8s;animation-name: flash;animation-iteration-count: infinite;animation-direction: alternate;font-weight: bold;font-size: 25px;}
    @keyframes flash {from {opacity:0;}to {opacity:100;}}
    .compra {width: 258px;display: inline-block !important;}
    .title-beneficios {font-family:MyriadPro-Bold;color:#4165AA;font-size: 60px;margin:0;line-height: 60px;}
    .title-beneficios i {color: #85C3E7;font-size: 80px;animation-duration: 1s;font-weight: initial;margin-right: 5px;}
    .subtitle-beneficios {font-family: AzoSans-Bold;color: #4165AA;margin: 0 70px;font-size: 28px;}
    .lista li {font-family:MyriadPro;color:#4165AA;font-size:29px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/air-lift/check.png);}
    .lista span {font-family:AzoSans-Bold;color:#265592;text-decoration:underline;font-size:30px;}
    .bg-blue{background-color:rgba(132, 194, 230, 0.2);padding: 40px 0;}
    .lista-m li {font-family:MyriadPro;color:#4165AA;margin-bottom: 20px;font-size: 20px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/air-lift/check-m.png);}
    .lista-m span {font-weight: bold;color:#265592;text-decoration:underline;}
  </style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/banner-air-lift.png" alt="Banner arlift">

<div style="padding:0 15px;">
  <div class="intro-producto" style="text-align: left;margin-left:62px;margin-top: 12px;"><i>[</i><span>Spray</span><i>]</i></div>
  <img class="img-responsive producto" style="margin: -15px auto 35px;width: 70%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/empaque-air-lift.png" alt="air-lift Spray">
  <div class="intro-producto" style="margin-top: -19px;">
    <p style="margin: 0;font-size: 15px;text-align: center;padding: 0 15px;line-height: 19px;">La fórmula patentada de air-lift, encapsula los gases que producen el mal aliento</p>
  </div>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117942)) ?>"><img class="img-responsive-m" style="margin: 15px auto;display: block !important;width: 75%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/compra-online.png" alt="Compra air-lift spray"></a>
  <h3 class="title-beneficios" style="font-size: 40px;"><i style="font-size: 50px;">[</i>Beneficios</h3>
  <h4 class="subtitle-beneficios" style="margin: 0px 0px 0px 24px;font-size: 15px;">air-lift, con sus componentes naturales que combaten la halitosis</h4>
</div>
<section class="bg-blue" style="padding:15px;margin-top: 20px;">
  <ul class="lista-m">
    <li><span>Acción inmediata</span><br>Controla el mal aliento hasta por 3 horas.</li>
    <li><span>Libre de alcohol</span><br>para evitar la irritación bucal.</li>
    <li><span>Portabilidad</span><br>Para que lo lleves a donde vayas.</li>
    <li><span>Libre de azúcar</span></li>
  </ul>
</section>
<section style="padding:15px;">
  <ul class="lista-m">
    <li><span>Formúla con componentes naturales, como los aceites de Oliva y Perejil que atrapan los gases que causan el mal aliento.</span></li>
    <li><span>Agradable y refrescante sabor a menta para que puedas acercarte con toda confianza.</span></li>
  </ul>
</section>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/banner-secundario-mobile.png" alt="Sé tú mismo con toda confianza">

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
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117942)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/denticare/btn-fijo.png" alt="Compra online"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/banner-air-lift.png" alt="Banner arlift">
<div class="container">
  <div class="row">
    <div class="col-sm-8 col-md-8 intro-producto">
      <i>[</i><span>Spray</span><i>]</i>
      <p>La fórmula patentada de air-lift, encapsula <br> los gases que producen el mal aliento</p>
    </div>
    <div class="col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/empaque-air-lift.png" alt="air-lift Spray">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117942)) ?>"><img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/compra-online.png" alt="Compra air-lift spray"></a>
      <img class="flecha" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/flechas.png">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="margin-bottom: 45px;">
      <h3 class="title-beneficios"><i>[</i>Beneficios</h3>
      <h4 class="subtitle-beneficios">air-lift, con sus componentes naturales que combaten la halitosis</h4>
    </div>
  </div>
</div>
<section class="bg-blue">
  <div class="container">
    <div class="col-sm-6 col-md-6">
      <ul class="lista" style="border-right: 3px solid #265592;">
        <li style="margin-bottom: 50px;"><span>Acción inmediata</span><br>Controla el mal aliento <br> hasta por 3 horas.</li>
        <li><span>Libre de alcohol</span><br>para evitar la irritación bucal.</li>
      </ul>
    </div>
    <div class="col-sm-6 col-md-6">
      <ul class="lista" style="margin-left: 50px;">
        <li style="margin-bottom: 50px;"><span>Portabilidad</span><br>Para que lo lleves a <br> donde vayas.</li>
        <li><span>Libre de azúcar</span></li>
      </ul>
    </div>
  </div>
</section>
<section style="padding: 40px 0;">
  <div class="container">
    <div class="col-sm-6 col-md-6">
      <ul class="lista">
        <li><span>Formúla con componentes <br>naturales, como los aceites de <br> Oliva y Perejil que atrapan los <br>gases que causan el mal aliento.</span></li>
      </ul>
    </div>
    <div class="col-sm-6 col-md-6">
      <ul class="lista">
        <li><span>Agradable y refrescante <br> sabor a menta para que <br>puedas acercarte con <br>toda confianza.</span></li>
      </ul>
    </div>
  </div>
</section>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/air-lift/banner-secundario.png" alt="Sé tú mismo con toda confianza">
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
