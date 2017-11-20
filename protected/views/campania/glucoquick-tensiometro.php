<?php $this->pageTitle = "Tensiómetro GlucoQuick | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='-	Cuídate en casa con el tensiómetro P30 Plus de Glucoquick, te ayuda a medir y monitorear tu presión arterial en todo momento y todo lugar. '>
<meta name='keywords' content='tensiometro, tensiometro digital, tensiometro digital de brazo.'>
  <style>
    @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    @font-face { font-family:FiraSans-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/FiraSans-Bold.otf);}
    @font-face { font-family:FiraSans-SemiBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/FiraSans-SemiBold.otf);}
    @font-face { font-family:HelveticaNeueLTStd-Md; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/HelveticaNeueLTStd-Md.otf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .programa-hora .span1 {font-family:HelveticaNeueLight;color:#363636;}
    .programa-hora .span2 {font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 23px;letter-spacing: 1px;}
    .programa-hora .span3{color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    a {text-decoration:none;}
    .bg-principal {background-color: #EEF1F8;margin-top: 50px;padding:50px;border-radius: 25px;-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);}
    .title-main {color: #0142a0;font-family: FiraSans-Bold;font-size: 45px;margin: 0;}
    .second-title {color:#0142a0;font-family:HelveticaNeueBold;margin: 0;}
    .list {font-family:HelveticaNeueLTStd-Md;color:#002259;font-size: 30px;margin-top: 35px;padding-inline-start: 25px;}
    .btn-comprar {width: 200px;margin: 0 auto;}
    .subtitle {font-family: FiraSans-SemiBold;text-align: center;color: #0142a0;font-size: 35px;margin-top: 50px;}
    .bg-producto {padding: 25px 50px;border-radius: 25px;-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);}
    .section-products {padding: 30px 100px 0;}
    .section-products .btn-comprar {width:150px;margin:0 auto;}
    .section-products p {font-family: HelveticaNeueLTStd-Md;color: #101F52;font-size: 19px;line-height: 20px;margin-bottom: 40px;margin-top: 10px;}
    .img-zoom {overflow: hidden;padding-right: 0 !important;padding-left: 0 !important;}
    .img-zoom img {transform: scale(1);-ms-transform: scale(1);-moz-transform: scale(1);-webkit-transform: scale(1);-o-transform: scale(1);-webkit-transition: all 0.7s ease-in-out;-moz-transition: all 0.7s ease-in-out;-ms-transition: all 0.7s ease-in-out;-o-transition: all 0.7s ease-in-out;}
    .img-zoom:hover img {transform: scale(1.05);-ms-transform: scale(1.05);-moz-transform: scale(1.05);-webkit-transform: scale(1.05);-o-transform: scale(1.05);}
    .owl-controls { margin-top: 0px !important;}
    .list li {line-height: 32px; margin-bottom: 15px;}
    .precioproductos{color: #0142a0;font-family: FiraSans-Bold;text-align: center;font-size: 25px;margin: 0 0 15px;line-height: 25px;}
    .precioproductos-antes{text-decoration: line-through;color: #0142a0;font-family: FiraSans-Bold;text-align: center;font-size: 25px;margin: 0;line-height: 25px;}
  </style>
";
?>
<!--Precio productos-->
<?php $tensiometroP30Plus = Producto::consultarPrecio('31897', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<input type="hidden" id="cantidad-producto-unidad-31897" value="1" >
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-glucometro-tensiometro.jpg" alt="Yo me cuido en casa con glucoQuick">
<div class="bg-principal" style="margin: 25px;padding: 29px;">
  <h1 class="title-main" style="font-size: 25px;line-height: 26px;">TENSIÓMETRO <br> P30 PLUS </h1>
  <ul class="list" style="font-size: 17px;-webkit-padding-start: 15px !important;-moz-padding-start: 15px !important;padding-inline-start: 15px !important;margin-top: 15px;">
    <li style="margin-bottom:5px;line-height: initial;">Pantalla y caracteres grandes</li>
    <li style="margin-bottom:5px;line-height: initial;">Medición auscultatoria  </li>
    <li style="margin-bottom:5px;line-height: initial;">Banda ajustable a brazos   de talla media y grande  </li>
    <li style="margin-bottom:5px;line-height: initial;">Detección de arritmias </li>
    <li style="margin-bottom:5px;line-height: initial;">60 memorias </li>
    <li style="margin-bottom:5px;line-height: initial;">Sistema de medición de presión   arterial multi-modo </li>
    <li style="margin-bottom:5px;line-height: initial;">Registra el nivel promedio   de tres mediciones </li>
  </ul>
  <img class="img-responsive-m" style="margin: -25px auto 0px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/tensiometro.png" alt="Tensiómetro">
  <p class="precioproductos-antes">ANTES: <?= ($tensiometroP30Plus == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
  <p class="precioproductos">AHORA: <?= ($tensiometroP30Plus == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
  <a data-ajax="false" data-cargar="1" data-producto="31897" data-id="1" href="#"><img class="img-responsive btn-comprar" style="display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
</div>
<div class="img-zoom" style="margin-top:20px;">
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/glucoquick-insumos-y-glucometro">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-inferior/glucometro.jpg" alt="Glucometro">
  </a>
</div>
<div class="img-zoom">
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/glucoquick-educacion">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-inferior/educate.jpg" alt="Edúcate sobre la diabetes">
  </a>
</div>
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
<!--VERSION ESCRITORIO-->
<?php else: ?>
<input type="hidden" id="cantidad-producto-unidad-31897-1" value="1" >
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-glucometro-tensiometro.jpg" alt="Yo me cuido en casa con glucoQuick"></div>
<div class="container">
  <div class="row bg-principal">
      <div class="col-sm-6 col-md-6">
        <h1 class="title-main">TENSIÓMETRO P30 PLUS</h1>
        <ul class="list">
          <li>Pantalla y caracteres grandes </li>
          <li>Medición auscultatoria  </li>
          <li>Banda ajustable a brazos <br> de talla media y grande </li>
          <li>Detección de arritmias</li>
          <li>60 memorias </li>
          <li>Sistema de medición de presión <br> arterial multi-modo </li>
          <li>Registra el nivel promedio <br> de tres mediciones</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-6">
        <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/tensiometro.png" alt="Tensiómetro">
        <p class="precioproductos-antes" style="margin-top: -50px;">ANTES: <?= ($tensiometroP30Plus == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($tensiometroP30Plus == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a data-cargar="1" data-producto="31897" data-id="1" href="#"><img class="img-responsive btn-comprar" style="margin: 0px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
      </div>
    </div>
</div>
<div class="row" style="margin-top:50px;">
  <div class="col-sm-6 col-md-6 img-zoom">
    <a href="<?= Yii::app()->request->baseUrl ?>/glucoquick-insumos-y-glucometro">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-inferior/glucometro.jpg" alt="Tensiometro">
    </a>
  </div>
  <div class="col-sm-6 col-md-6 img-zoom">
    <a href="<?= Yii::app()->request->baseUrl ?>/glucoquick-educacion">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-inferior/educate.jpg" alt="Edúcate sobre la diabetes">
    </a>
  </div>
</div>
<section class="programa-hora">
  <span class="span1">Ahora comprando en </span><span class="span2">larebajavirtual.com</span><span class="span3">, programa tu hora y lugar de entrega </span><img width="50" style="margin-left:6px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
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
