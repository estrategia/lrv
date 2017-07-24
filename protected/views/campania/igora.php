<?php $this->pageTitle = "Igora Vital - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='gora Vital, la coloración con tratamiento con Keratina y Serina para un máximo cuidado, una perfecta cobertura de canas y colores luminosos y duraderos.'>
  <meta name='keywords' content='Igora, tintes para el cabello, tintes de cabello.'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    @font-face {font-family:kievit_regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/igora/fonts/kievit_regular.ttf);}
    @font-face {font-family:Kievit_Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/igora/fonts/Kievit_Bold.ttf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FF3C00;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .line-flex{display:flex;margin-bottom: 10px;align-items: start;}
    .line-flex p {font-family: kievit_regular;font-size: 22px;line-height: 22px;color:#000;margin-top: 5px;}
    .item {flex-grow: 1;}
    .number{width:40px;height:40px;margin-right: 8px;}
    .compra-online {width: 75%;margin: 0 auto;}
    .tips{display: flex;margin-bottom: 10px;align-items: start;}
    .tips p {font-family: kievit_regular;color: #1A1E42;font-size: 17px;}
    .tips strong {font-family:Kievit_Bold;}
    .tips .item {padding: 10px;}
    .tips img {width:130px;display:block;margin: 23px auto;}
    .owl-theme .owl-controls .owl-page span {background-color: #AE8D50 !important;}
    .owl-controls {margin-top: 5px !important;}
  </style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Version movil-->
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3242)) ?>" data-ajax="false"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/banner-principal-mobile.jpg" alt="IGORA coloración con tratamiento con keratina y serina para máximo cuidado"></a>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/baneficios-mobile.jpg" alt="Beneficios de igora vital coloración con tratamiento - nuevos tonos rubios">
<div style="padding:30px 15px;">
  <div class="line-flex">
    <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/1.png">
    <p style="margin: 10px 0;font-size: 17px;">Perfecta cobertura de canas.</p>
  </div>
  <div class="line-flex">
    <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/2.png">
    <p style="margin: 10px 0;font-size: 17px;">Coloración con tratamiento con Keratina y Serina para máximo cuidado.</p>
  </div>
  <div class="line-flex">
    <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/3.png">
    <p style="margin: 10px 0;font-size: 17px;">Colores luminosos y duraderos.</p>
  </div>
  <div class="line-flex">
    <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/4.png">
    <p style="margin: 10px 0;font-size: 17px;">Exclusivo post tratamiento con 7 aceites para un brillo instantáneo.</p>
  </div>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/nuevos-tonos-mobile.jpg" alt="nuevos tonos rubios">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/nuevos-tonos-rubios-igora.png" alt="Igora nuevos tonos rubios">
  <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3240)) ?>" data-ajax="false">
    <img class="compra-online" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/compra-online.png" alt="Compra online igora tonos rubios">
  </a>
</div>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3244)) ?>" data-ajax="false">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/banner-secundario-mobile.jpg" alt="24 tonos en doble tubo ¡Para que escojas el tuyo!">
</a>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/5-tips-de-cuidado-mobile.jpg" alt="5 tips de cuidado">
<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle" style="padding:30px 15px;">
  <div class="item">
    <img  style="width: 40%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip01.png">
    <p style="font-family: kievit_regular;color: #1A1E42;font-size: 16px;text-align: center;width: 90%;"><strong>El cepillado estimula tu cuero cabelludo,</strong>  si lo haces por lo menos 3 veces al día se verá hermoso.</p>
  </div>
  <div class="item">
    <img  style="width: 40%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip02.png">
    <p style="font-family: kievit_regular;color: #1A1E42;font-size: 16px;text-align: center;width: 90%;">Para una <strong>coloración perfecta, </strong> utiliza la totalidad de la crema colorante con la loción reveladora.</p>
  </div>
  <div class="item">
    <img style="width: 40%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip03.png">
    <p style="font-family: kievit_regular;color: #1A1E42;font-size: 16px;text-align: center;width: 90%;">Después de la coloración aplica el tratamiento con proteína de almendras y aceite de albaricoque que <strong>nutre y protege tu cabello.</strong></p>
  </div>
  <div class="item">
    <img  style="width: 40%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip04.png">
    <p style="font-family: kievit_regular;color: #1A1E42;font-size: 16px;text-align: center;width: 90%;">Aplica el exclusivo post-tratamiento con aceites nutritivos que <strong>fortalecen y dan a tu pelo un brillo instantáneo.</strong></p>
  </div>
  <div class="item">
    <img style="width: 40%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip05.png">
    <p style="font-family: kievit_regular;color: #1A1E42;font-size: 16px;text-align: center;width: 90%;">Agua fría al finalizar tu baño diario, es el <strong>secreto de sellar las cutículas</strong> del pelo, haciéndolo que se vea <strong>brillante y sedoso.</strong></p>
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
<a href="#">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/btn-fijo.png" alt="Compra online"></div>
</a>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3242)) ?>">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/banner-principal.jpg" alt="IGORA coloración con tratamiento con keratina y serina para máximo cuidado">
</a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/beneficios.jpg" alt="Beneficios de igora vital coloración con tratamiento - nuevos tonos rubios">

<div style="background-color:#FEF0EF;padding-bottom: 30px;">
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="margin-top: 5%;">
      <div class="col-sm-6">
        <div class="line-flex">
          <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/1.png">
          <p>Perfecta cobertura de canas.</p>
        </div>
        <div class="line-flex">
          <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/2.png">
          <p>Coloración con tratamiento con Keratina y Serina para máximo cuidado.</p>
        </div>
        <div class="line-flex">
          <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/3.png">
          <p>Colores luminosos y duraderos.</p>
        </div>
        <div class="line-flex">
          <img class="number" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/4.png">
          <p>Exclusivo post tratamiento con 7 aceites para un brillo instantáneo.</p>
        </div>
      </div>
      <div class="col-sm-6">
        <img class="img-responsive"  style="margin-top: -35px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/nuevos-tonos-rubios-igora.png" alt="Igora nuevos tonos rubios">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3240)) ?>">
          <img class="img-responsive compra-online" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/compra-online.png" alt="Compra online igora tonos rubios">
        </a>
      </div>
    </div>
  </div>
</div>


<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3244)) ?>">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/banner-secundario.jpg" alt="24 tonos en doble tubo ¡Para que escojas el tuyo!">
</a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/5-tips-de-cuidado.jpg" alt="5 tips de cuidado">
<div style="background-color:#FEF0EF;">
  <div class="container">
    <div class="col-md-12">
      <div class="tips">
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip01.png">
          <p style="border-right: 1px solid #CBB079;"><strong>El cepillado estimula  <br>tu cuero cabelludo,</strong>  si <br> lo haces por lo menos <br> 3 veces al día se verá <br> hermoso.</p>
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip02.png">
          <p style="border-right: 1px solid #CBB079;">Para una <strong>coloración <br> perfecta, </strong> utiliza la <br>totalidad de la crema <br>colorante con la loción <br>reveladora.</p>
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip03.png">
          <p style="border-right: 1px solid #CBB079;">Después de la coloración <br>aplica el tratamiento con <br>proteína de almendras y <br> aceite de albaricoque <br> que <strong>nutre y protege tu <br> cabello.</strong></p>
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip04.png">
          <p style="border-right: 1px solid #CBB079;">Aplica el exclusivo <br> post-tratamiento <br> con aceites nutritivos <br> que <strong>fortalecen y dan a <br> tu pelo un brillo <br> instantáneo.</strong></p>
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/tip05.png">
          <p>Agua fría al finalizar <br> tu baño diario, es el <br> <strong>secreto de sellar las <br> cutículas</strong> del pelo, <br> haciéndolo que se <br> vea <strong>brillante y <br>sedoso.</strong></p>
        </div>
      </div>
    </div>
  </div>
</div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/igora/banda-promesa-rebaja.png" alt="En la rebaja virtual programa tu hora y lugar de entrega">
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
