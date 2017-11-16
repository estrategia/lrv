<?php $this->pageTitle = "Glucómetro GlucoQuick | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Encuentra en La Rebaja Virtual, los insumos y glucómetro Glucoquick para que puedas estar monitoreado siempre. ¡Cuídate en casa con Glucoquick!'>
<meta name='keywords' content='glucometro, glucometro precio, tirillas glucoquick.'>
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
    .section-products p {font-family: HelveticaNeueLTStd-Md;color: #101F52;font-size: 19px;line-height: 20px;margin-bottom: 20px;margin-top: 10px;}
    .img-zoom {overflow: hidden;padding-right: 0 !important;padding-left: 0 !important;}
    .img-zoom img {transform: scale(1);-ms-transform: scale(1);-moz-transform: scale(1);-webkit-transform: scale(1);-o-transform: scale(1);-webkit-transition: all 0.7s ease-in-out;-moz-transition: all 0.7s ease-in-out;-ms-transition: all 0.7s ease-in-out;-o-transition: all 0.7s ease-in-out;}
    .img-zoom:hover img {transform: scale(1.05);-ms-transform: scale(1.05);-moz-transform: scale(1.05);-webkit-transform: scale(1.05);-o-transform: scale(1.05);}
    .owl-controls { margin-top: 0px !important;}
    .precioproductos{color: #0142a0;font-family: FiraSans-Bold;text-align: center;font-size: 25px;margin: 0 0 15px;line-height: 25px;}
    .precioproductos-antes{text-decoration: line-through;color: #0142a0;font-family: FiraSans-Bold;text-align: center;font-size: 25px;margin: 0 !important;line-height: 25px;}
  </style>
";
?>
<!--Precio productos-->
<?php $glucometroG30a_tiras_gratis = Producto::consultarPrecio('73213', $this->objSectorCiudad)?>
<?php $glucoquickTiras_gratis_lancetasx50 = Producto::consultarPrecio('73214', $this->objSectorCiudad)?>
<?php $glucoquickTiras_2x3_cajax50 = Producto::consultarPrecio('26906', $this->objSectorCiudad)?>
<?php $glucoquickTiras_cajax50 = Producto::consultarPrecio('99369', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Añadir al carro-->
<input type="hidden" id="cantidad-producto-unidad-73213" value="1" >
<input type="hidden" id="cantidad-producto-unidad-73214" value="1" >
<input type="hidden" id="cantidad-producto-unidad-26906" value="1" >
<input type="hidden" id="cantidad-producto-unidad-99369" value="1" >
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-glucometro-tensiometro.jpg" alt="Yo me cuido en casa con glucoQuick">
<div class="bg-principal" style="margin: 25px;padding: 29px !important ;">
  <h1 class="title-main" style="font-size: 25px;">OFERTA TIRAS GRATIS </h1>
  <h2 class="second-title" style="font-size: 20px;">Glucómetro G30a <br> para medir la glucosa.</h2>
  <ul class="list" style="font-size: 17px;-webkit-padding-start: 15px !important;-moz-padding-start: 15px !important;padding-inline-start: 15px !important;margin-top: 15px;">
    <li>Pantalla y caracteres grandes</li>
    <li>Registro pre y post comidas</li>
    <li>Eyector de tiras</li>
    <li> Sin codificación - Sin chip</li>
    <li>Universal TONE</li>
    <li>Asesoría permanente en la línea gratuita 01 8000 510 361</li>
  </ul>
  <img class="img-responsive-m" style="margin: -45px auto 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/glucometro.png" alt="Glucómetro">
  <p class="precioproductos-antes">ANTES: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucometroG30a_tiras_gratis["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
  <p class="precioproductos">AHORA: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $$glucometroG30a_tiras_gratis["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
  <a data-ajax="false" data-cargar="1" data-producto="73213" data-id="1" href="#"><img class="img-responsive btn-comprar" style="display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
</div>
<h3 class="subtitle" style="font-size: 23px;line-height: 15px;">Conoce nuestros insumos Glucoquick<sup>®</sup> </h3>
<div id="owl-productodetalle-inicio"  style="padding:0px;" class="owl-carousel owl-theme owl-productodetalle section-products">
    <div class="item" style="margin:0 35px 15px;">
      <div class="bg-producto">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/oferta-compra-tiras-lancetas.jpg" alt="Oferta compra tiras gratis lancetas">
        <p>Oferta Glucoquick<sup>®</sup> <br> Tiras Gratis Lancetas x 50 caja x 1 und.</p>
        <p class="precioproductos-antes">ANTES: <?= ($glucoquickTiras_gratis_lancetasx50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_gratis_lancetasx50["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($glucoquickTiras_gratis_lancetasx50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_gratis_lancetasx50["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a data-ajax="false" data-cargar="1" data-producto="73214" data-id="2" href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
      </div>
    </div>
    <div class="item" style="margin:0 35px 15px;">
      <div class="bg-producto">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/oferta-pague-2-lleve-3-tiras.jpg" alt="Ofertapage 2 lleve 3 tiras">
        <p>Oferta Glucoquick<sup>®</sup> <br> Tiras Pague 2 lleve 3 Caja x 50 und.</p>
        <p class="precioproductos-antes">ANTES: <?= ($glucoquickTiras_2x3_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_2x3_cajax50["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($glucoquickTiras_2x3_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_2x3_cajax50["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a data-ajax="false" data-cargar="1" data-producto="26906" data-id="3" href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
      </div>
    </div>
    <div class="item"  style="margin:0 35px 15px;">
      <div class="bg-producto">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/caja-tiras-50.jpg" alt="Caja tiras x 50 unds">
        <p>Glucoquick<sup>®</sup> Tiras <br> Caja x 50 und. <br> &nbsp;</p>
        <p class="precioproductos-antes">ANTES: <?= ($glucoquickTiras_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_cajax50["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($glucoquickTiras_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_cajax50["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a data-ajax="false" data-cargar="1" data-producto="99369" data-id="4" href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
      </div>
    </div>
</div>
<div class="img-zoom" style="margin-top:20px;">
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/glucoquick-tensiometro">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-inferior/tensiometro.jpg" alt="Tensiometro">
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
<!--Añadir al carro-->
<input type="hidden" id="cantidad-producto-unidad-73213-1" value="1" >
<input type="hidden" id="cantidad-producto-unidad-73214-2" value="1" >
<input type="hidden" id="cantidad-producto-unidad-26906-3" value="1" >
<input type="hidden" id="cantidad-producto-unidad-99369-4" value="1" >
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-glucometro-tensiometro.jpg" alt="Yo me cuido en casa con glucoQuick"></div>
<div class="container">
  <div class="row bg-principal">
      <div class="col-sm-6 col-md-6">
        <h1 class="title-main">OFERTA TIRAS GRATIS </h1>
        <h2 class="second-title">Glucómetro G30a <br> para medir la glucosa.</h2>
        <ul class="list">
          <li>Pantalla y caracteres grandes</li>
          <li>Registro pre y post comidas</li>
          <li>Eyector de tiras</li>
          <li> Sin codificación - Sin chip</li>
          <li>Universal TONE</li>
          <li>Asesoría permanente en la línea gratuita 01 8000 510 361</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-6">
        <img class="img-responsive" style="width: 80%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/glucometro.png" alt="Glucómetro">
        <p class="precioproductos-antes">ANTES: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucometroG30a_tiras_gratis["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucometroG30a_tiras_gratis["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a data-cargar="1" data-producto="73213" data-id="1" href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
      </div>
    </div>
  <div class="row">
    <h3 class="subtitle">Conoce nuestros insumos Glucoquick<sup>®</sup> </h3>
  </div>
  <div class="row section-products">
      <div class="col-sm-4 col-md-4">
        <div class="bg-producto">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/oferta-compra-tiras-lancetas.jpg" alt="Oferta compra tiras gratis lancetas">
          <p>Oferta Glucoquick<sup>®</sup> <br>
          Tiras Gratis Lancetas <br>
          x 50 caja x 1 und.</p>
          <p class="precioproductos-antes">ANTES: <?= ($glucoquickTiras_gratis_lancetasx50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_gratis_lancetasx50["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
          <p class="precioproductos">AHORA: <?= ($glucoquickTiras_gratis_lancetasx50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_gratis_lancetasx50["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
          <a data-cargar="1" data-producto="73214" data-id="2" href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="bg-producto">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/oferta-pague-2-lleve-3-tiras.jpg" alt="Ofertapage 2 lleve 3 tiras">
          <p>Oferta Glucoquick<sup>®</sup> <br>
          Tiras Pague 2 lleve 3 <br>
          Caja x 50 und.</p>
          <p class="precioproductos-antes">ANTES: <?= ($glucoquickTiras_2x3_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_2x3_cajax50["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
          <p class="precioproductos">AHORA: <?= ($glucoquickTiras_2x3_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_2x3_cajax50["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
          <a data-cargar="1" data-producto="26906" data-id="3" href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="bg-producto">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/caja-tiras-50.jpg" alt="Caja tiras x 50 unds">
          <p>Glucoquick<sup>®</sup> Tiras <br>
            Caja x 50 und. <br> &nbsp;</p>
            <p class="precioproductos-antes">ANTES: <?= ($glucoquickTiras_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_cajax50["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="precioproductos">AHORA: <?= ($glucoquickTiras_cajax50 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucoquickTiras_cajax50["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <a data-cargar="1" data-producto="99369" data-id="4" href="#"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
        </div>
      </div>
    </div>
</div>
<div class="row" style="margin-top:50px;">
  <div class="col-sm-6 col-md-6 img-zoom">
    <a href="<?= Yii::app()->request->baseUrl ?>/glucoquick-tensiometro">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-inferior/tensiometro.jpg" alt="Tensiometro">
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
