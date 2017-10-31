<?php $this->pageTitle = "Milpax - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='MILPAX SUSPENSIÓN® coadyuvante en el manejo del reflujo gastroesofágico.'>
  <meta name='keywords' content='milpax, que tomar para el reflujo, antiácido.'>
  <style>
    @font-face {font-family:HelveticaNeueLTStd; src: url(".Yii::app()->request->baseUrl."/images/contenido/stamyl/fonts/HelveticaNeueLTStd-MdCn_1.otf);}
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    @font-face {font-family:big_noodle_titling;src: url(".Yii::app()->request->baseUrl."/images/contenido/milpax/fonts/big_noodle_titling.ttf);}
    @font-face {font-family:impact;src: url(".Yii::app()->request->baseUrl."/images/contenido/milpax/fonts/impact.ttf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 260px;}
    .titulo{margin-bottom: 9%;color: #2C345C;font-family: Helvetica;text-align: center;line-height: 35px;font-size: 37px;margin-top: 50px;}
    .compra-online {margin: 15px auto;width: 40%;}
    .text-legal {color: #3A3776;font-family: helvetica;text-align: center;font-weight: bold;font-size: 15px;margin-top: 15px;}
    .titulo strong {font-family:big_noodle_titling;}
    .titulo span {font-size: 25.2px;}
    .titulo i {border: 1px solid #C97F2D;font-style: inherit;border-radius: 50px;padding: 0px 5px;}
    .border {border: 1px solid #2D365C;border-radius: 15px;padding: 25px;}
    .title-image{margin-top: -95px;width: 45%;margin-bottom: 20px;}
    .bg-image{padding-bottom: 10px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/milpax/bg-general.jpg);background-size: cover;}
    .border p {color: #2D365C;font-family: helvetica;text-align: center;font-weight: bold;margin: 15px 0px 5px;}
    .border span {background-color: #ef711d;text-align: center;color: #2D365C;font-family: impact;display:block;margin: 0 auto;border-radius: 5px;padding: 5px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .space-1 {height: 0px !important;}
  </style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Version movil-->
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/banner-principal.jpg" alt="Milpax protege y devuelve la calma">
<div class="bg-image">
<div style="padding:0 15px">
<h2 class="titulo" style="line-height: 25px;margin-top: 25px;"><strong>Primera elección</strong> <br><span>del cuerpo médico  <br>
gracias a su gran trayectoria demostrando <i>eficacia</i> y <i>seguridad</i></span></h2>

<img class="title-image" style="margin: 20px auto;display: block;width: 85%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/antirreflujo.png" alt="Milpax antireflujo">

<div class="border" style="border: none;border-radius: 0px;padding: 0px;">
  <img style="width: 100%;margin: 10px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/packs.png" alt="Milpax menta">
  <!-- <div class="ui-grid-b">
  	<div class="ui-block-a">
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14878 )) ?>"><img style="width: 75%;margin: 10px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/milpax-menta.png" alt="Milpax menta"></a>
  	</div>
  	<div class="ui-block-b">
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14877 )) ?>"><img style="width: 75%;margin: 10px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/milpax-cereza.png" alt="Milpax Cereza"></a>
  	</div>
  	<div class="ui-block-c">
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 26078 )) ?>"><img style="width: 75%;margin: 10px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/milpax-chicle.png" alt="Milpax Chicle"></a>
  	</div>
  </div> -->
  <p>SUSPENSIÓN</p>
  <span style="width: 70%;">Menta – Cereza – Chicle</span>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 68071 )) ?>"><img class="img-responsive" style="margin: -40px auto;display: block;width: 75%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/antirreflujo-caja.png" alt="Milpax antireflujo caja"></a>
  <p style="margin-top: 45px;">TABLETAS</p>
  <span style="width: 50%;">Para llevar a todas partes</span>
</div>
<a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=milpax">
  <img class="img-responsive compra-online" style="margin: 30px auto;width: 80%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/compra-online.png" alt="Compra online">
</a>

<div class="border" style="border: none;border-radius: 0px;padding: 0px;">
  <p style="text-align:center;"><img class="title-image" style="width: 100%;margin-top: 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/antiácido.png" alt="Milpax antiácido"></p>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 23514 )) ?>"><img class="img-responsive" style="margin: 0 auto;width: 35%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/menta-fresca.png" alt="Milpax menta fresca"></a>
  <p>SUSPENSIÓN</p>
  <span style="width: 45%;">Plus Menta Fresca</span>
</div>
<a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=milpax">
  <img class="img-responsive compra-online" style="margin: 30px auto;width: 80%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/compra-online.png" alt="Compra online">
</a>
<img class="img-responsive-m" style="margin-top: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/banner-secundario.jpg" alt="Milpax pionero en efecto balsa">
<p class="text-legal">Es un medicamento. No exceder su consumo. Leer indicaciones y contraindicaciones en la etiqueta.
Si los síntomas persisten consulte a su médico. Milpax plus Reg. Sanitario INVIMA 2016M-002763R2,
Milpax suspensión Reg. Sanitario INVIMA 2007M-006932 R1, Milpax® tabletas masticables. <br>
Reg. Sanitario INVIMA 2009M 0009509.</p>
</div>
</div>
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
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=milpax"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/btn-fijo.png" alt="Compra online"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/banner-principal.jpg" alt="Milpax protege y devuelve la calma">
<div class="bg-image">
  <div class="container">
  <h2 class="titulo"><strong>Primera elección</strong> del cuerpo médico gracias <br>
  <span>a su gran trayectoria demostrando <i>eficacia</i> y <i>seguridad</i></span></h2>
  <div class="row">
    <div class="col-sm-8 col-md-8">
      <div class="row border">
        <p style="text-align: center;"><img class="title-image" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/antirreflujo.png" alt="Milpax antireflujo"></p>
        <div class="col-sm-8 col-md-8">
          <div style="display:flex;">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14878 )) ?>"><img class="img-responsive" style="flex-grow: 1;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/milpax-menta.png" alt="Milpax menta"></a>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14877 )) ?>"><img class="img-responsive" style="flex-grow: 1;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/milpax-cereza.png" alt="Milpax Cereza"></a>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 26078 )) ?>"><img class="img-responsive" style="flex-grow: 1;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/milpax-chicle.png" alt="Milpax Chicle"></a>
          </div>
          <div class="row">
            <p>SUSPENSIÓN</p>
            <span style="width: 41%;">Menta – Cereza – Chicle</span>
          </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 68071 )) ?>"><img class="img-responsive" style="margin-top: 19px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/antirreflujo-caja.png" alt="Milpax antireflujo caja"></a>
          <p>TABLETAS</p>
          <span>Para llevar a todas partes</span>
        </div>
      </div>
      <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=milpax">
        <img class="img-responsive compra-online" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/compra-online.png" alt="Compra online">
      </a>
    </div>
    <div class="col-sm-4 col-md-4">
      <div class="border">
        <p style="text-align:center;"><img class="title-image" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/antiácido.png" alt="Milpax antiácido"></p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 23514 )) ?>"><img class="img-responsive" style="margin: 0 auto;width: 133px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/menta-fresca.png" alt="Milpax menta fresca"></a>
        <p>SUSPENSIÓN</p>
        <span style="width: 45%;">Plus Menta Fresca</span>
      </div>
      <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=milpax">
        <img class="img-responsive compra-online" style="width: 85%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/compra-online.png" alt="Compra online">
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <img class="img-responsive" style="margin-top: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/milpax/banner-secundario.jpg" alt="Milpax pionero en efecto balsa">
      <p class="text-legal">Es un medicamento. No exceder su consumo. Leer indicaciones y contraindicaciones en la etiqueta.<br>
      Si los síntomas persisten consulte a su médico. Milpax plus Reg. Sanitario INVIMA 2016M-002763R2, <br>
      Milpax suspensión Reg. Sanitario INVIMA 2007M-006932 R1, Milpax® tabletas masticables.
      <br>Reg. Sanitario INVIMA 2009M 0009509.</p>
    </div>
  </div>
</div>
</div>
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
