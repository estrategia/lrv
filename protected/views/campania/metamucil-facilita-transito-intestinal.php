<?php $this->pageTitle = "Metamucil - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Metamucil es una fibra soluble multi-beneficios que facilita el tránsito intestinal ya que contiene Psyllium, el ingrediente activo de la fibra.'>
  <meta name='keywords' content='Facilita transito intestinal, estreñimiento, psyllium, fibra'>
	<style>
    @font-face {font-family:DINPro-Black;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/DINPro-Black_4.otf);}
    @font-face {font-family:interstate-regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/interstate-regular.ttf);}
    @font-face {font-family:DIN-Alternate-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 20%;}
    .background-pattern{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/background.jpg);background-size: cover; }
    .line-text {display:flex;margin-bottom: 15px;}
    .line-text img {width:40px;height: 41px;margin-right: 15px;}
    .line-text p {font-family:interstate-regular;color: #750532 !important;font-size: 24px;line-height: 30px;}
    .text-red {background-color: #FF3C00;color: #fff;display: inline-block;padding: 5px 25px;border-radius: 12px;font-family: interstate-regular;font-size: 25px;margin-top: 16px;}
    .bg-products {background-color:#FCE4CE;}
    .section-conoce-mas{background-color:#F2B689;padding: 35px 0;}
    .bg-red {font-size: 20px;background-color:#FF3C00;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .space-1 {height: 0px !important;}
    .title-principal{margin-bottom: 25px;font-family: DINPro-Black;color: #fff;text-align: center;font-size: 45px;margin-top: 50px;}
    .subtitle{color: #88113C;font-family: interstate-regular;margin-top: 50px;}
    .img-responsive.hover-producto:hover {-ms-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);-webkit-transition: ease-out 1s;}
    .conoce-mas{font-weight: bold;margin-bottom: 35px !important;font-family: DIN-Alternate-Bold;background-color: #FFA800;color: #fff;margin: 0px auto;padding: 8px;text-align: center;width: 58%;border-radius: 15px;}
    .mod-conoce {background-color: rgba(255, 255, 255, 0.5);border-radius: 25px 25px 0 0;-webkit-box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);-moz-box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);padding: 20px 0;}
    .mod-conoce p {margin: 0;font-family:DIN-Alternate-Bold;color:#640C34;text-align:center;font-size: 22px;font-weight: bold;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .img-responsive-m{width:100%;}
  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil" data-ajax="false"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banner-mobile.png" alt="Metamucil"></a>
<section class="background-pattern" style="margin-top: -5px;padding: 20px 15px;">
  <h2 class="title-principal" style="margin:0 0 30px;font-size: 27px;">Beneficios de metamucil</h2>
  <div class="line-text">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
    <p style="font-size: 20px;margin: 0;line-height: 20px;">Ayuda en el tratamiento de <strong>estreñimiento</strong> crónico </p>
  </div>
  <div class="line-text">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
    <p style="font-size: 20px;margin: 0;line-height: 20px;">Ayuda en tu proceso natural de <strong>limpieza</strong></p>
  </div>
  <div class="line-text">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
    <p style="font-size: 20px;margin: 0;line-height: 20px;">Contiene <strong>Psyllium</strong>, el ingrediente activo de una fibra vegetal 100% natural</p>
  </div>
  <div class="line-text">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
    <p style="font-size: 20px;margin: 0;line-height: 20px;">Te hace sentirte <strong>ligera</strong></p>
  </div>
  <div class="line-text">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
    <p style="font-size: 20px;margin: 0;line-height: 20px;"><strong>Atrapa y elimina </strong>residuos que tu cuerpo ya no necesita</p>
  </div>
  <div class="line-text">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
    <p style="font-size: 20px;margin: 0;line-height: 20px;"><strong>No irrita</strong> es suave con tu organismo</p>
  </div>
  <div class="line-text">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
    <p style="font-size: 20px;margin: 0;line-height: 20px;"><strong>Regula</strong> tu intestino sin estimulantes químicos</p>
  </div>
  <p class="text-red" style="font-size: 22px;">Es una fibra, NO un laxante</p>
</section>
<section class="bg-products" style="padding: 20px 15px;">
  <h2 class="subtitle" style="margin: 0;font-size: 20px;">Encuentra las diferentes presentaciones de <strong>Metamucil Naranja:</strong></h2>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111299)) ?>"><img class="img-responsive-m" style="margin-top:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-caja-mobile.png"></a>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111298)) ?>"><img class="img-responsive-m" style="margin-top:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-174g-mobile.png"></a>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111297)) ?>"><img class="img-responsive-m" style="margin-top:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-425g.png"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><img class="img-responsive-m" style="width: 85%;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/compra-online.png"></a>
</section>
<section class="section-conoce-mas" style="padding: 20px 15px;">
  <h2 class="conoce-mas" style="font-size: 20px;width: 80%;">Conoce más de Metamucil</h2>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/sobre-metamucil" style="text-decoration:none;">
    <div class="mod-conoce"><p>Sobre Metamucil</p>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/sobre-metamucil.png">
    </div>
  </a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/porque-elejir-metamucil" style="text-decoration:none;">
    <div class="mod-conoce" style="margin-top:15px;"><p>Porqué elegir Metamucil</p>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/porque-metamucil.png">
    </div>
  </a>
  <p class="nota" style="font-size: 13px;">Es un medicamento fitoterapéutico. No exceder su consumo.  No. de registro sanitario: PFM2015-0002427. <br>
  Leer indicaciones y contraindicaciones. Si los síntomas persisten, consultar al médico.</p>
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
<!--Versión movil-->
<!--Versión escritorio-->
<?php else: ?>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/btn-fijo.png" alt="Compra online"></div></a>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banner-metamucil.jpg" alt="Metamucil"></a>
<section class="background-pattern">
  <div class="container-fluid">
    <div class="col-md-12">
      <h2 class="title-principal">Beneficios de metamucil</h2>
    </div>
    <div class="col-sm-6 col-md-6">
      <img style="width: 67%;margin: 0 auto;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/presentacion.png" alt="Metamucil">
    </div>
    <div class="col-sm-6 col-md-6" style="margin-top: 50px;">
      <div class="line-text">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
        <p>Ayuda en el tratamiento <br> de <strong>estreñimiento</strong> crónico </p>
      </div>
      <div class="line-text">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
        <p>Ayuda en tu proceso <br> natural de <strong>limpieza</strong></p>
      </div>
      <div class="line-text">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
        <p>Contiene <strong>Psyllium</strong>, <br>el ingrediente activo de una <br>fibra vegetal 100% natural</p>
      </div>
      <div class="line-text">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
        <p>Te hace sentirte <strong>ligera</strong><br> &nbsp;</p>
      </div>
      <div class="line-text">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
        <p><strong>Atrapa y elimina </strong>residuos <br>que tu cuerpo ya no necesita</p>
      </div>
      <div class="line-text">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
        <p><strong>No irrita</strong> es suave con <br>tu organismo</p>
      </div>
      <div class="line-text">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/check.png">
        <p><strong>Regula</strong> tu intestino sin <br>estimulantes químicos</p>
      </div>
      <p class="text-red">Es una fibra, NO un laxante</p>
    </div>
  </div>
</section>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banda-promesa-rebaja.png">
<section class="bg-products">
  <div class="container-fluid">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <h2 class="subtitle">Encuentra las diferentes presentaciones <br> de <strong>Metamucil Naranja:</strong></h2>
        <div style="margin-top: -50px;">
          <div class="col-sm-4 col-md-4">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111299)) ?>"><img class="img-responsive hover-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-caja.png"></a>
          </div>
          <div class="col-sm-4 col-md-4">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111298)) ?>"><img class="img-responsive hover-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-174g.png"></a>
          </div>
          <div class="col-sm-4 col-md-4">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111297)) ?>"><img class="img-responsive hover-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-425g.png"></a>
          </div>
          <div class="col-md-12">
            <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><img class="img-responsive" style="width: 35%;margin: 26px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/compra-online.png"></a>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="section-conoce-mas">
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class="col-sm-12"><h2 class="conoce-mas">Conoce más de Metamucil</h2></div>
      <div class="col-sm-6 col-md-6">
        <a href="<?= Yii::app()->request->baseUrl ?>/sobre-metamucil">
          <div class="mod-conoce">
            <p>Sobre Metamucil</p>
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/sobre-metamucil.png">
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-6">
        <a href="<?= Yii::app()->request->baseUrl ?>/porque-elejir-metamucil">
          <div class="mod-conoce">
            <p>Porqué elegir Metamucil</p>
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/porque-metamucil.png">
          </div>
        </a>
      </div>
      <div class="col-md-12" style="margin-top:26px;">
      <p class="nota"> Es un medicamento fitoterapéutico. No exceder su consumo.  No. de registro sanitario: PFM2015-0002427. <br>
        Leer indicaciones y contraindicaciones. Si los síntomas persisten, consultar al médico.</p>
      </div>
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
 <!--Fin versión escritorio-->
<?php endif;?>
