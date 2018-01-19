<?php $this->pageTitle = "Promoción tinte Happy new look - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Aprovecha los descuentos que Schwarzkopf tiene para ti y puedas crear tu nuevo estilo. ¡Descuentos del 40%, 30% y 20% para tu happy new look!'>
  <meta name='keywords' content='Schwarzkopf, tintes igora, palette.'>
  <style>
    /* Default micrositio */
    @font-face {font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face {font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face {font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face {font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {font-size: 15px;}
    .programa-hora .span1 {font-family:HelveticaNeueLight;color:#363636;}
    .programa-hora .span2 {font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 16px;letter-spacing: 1px;margin-left2px;}
    .programa-hora .span3{color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;}
    .programa-hora .content {display: flex;width: 100%;flex-direction: row;max-width: 100%;flex-wrap: wrap;margin: 0 auto;}
    .programa-hora .content .seccion1 {padding-left: 100px;width: 60%;background-color: #C9C8C6;position: relative;}
    .programa-hora .content .seccion1:after {position: absolute;right: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0 23px 28px;border-color: #BF1A24 #BF1A24 #BF1A24 #C9C8C6;top: 0;}
    .programa-hora .content .seccion2 {width: 40%;background-color: #BF1A24;padding-right: 100px;}
    .programa-hora .content .seccion1-m {background-color: #C9C8C6;padding: 15px;text-align: center;}
    .programa-hora .content .seccion2-m {background-color: #BF1A24;width: 100%;padding: 15px;}
    .agradecimiento {font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 16px;}
    .agradecimiento span {font-family:HelveticaNeue-BlackCond;letter-spacing:1px;}
    a:hover, a:active, a:focus {outline: none !important;}
    @media only screen and (max-width: 1920px) and (min-width: 1700px)  {
      .programa-hora .content .seccion1 {width: 55%;}
      .programa-hora .content .seccion2 { width: 45%;}
      .programa-hora .content .seccion1 {padding-left: 400px;}
      .programa-hora .content .seccion2 {padding-right: 295px;}
    }

    /* Estilos Henkel */
    @font-face {font-family: Roboto-BlackItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/henkel/fonts/roboto-blackItalic.ttf);}
    @font-face {font-family: Roboto-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/henkel/fonts/roboto-light.ttf);}
    .background {padding-bottom: 3em; background: #fff url(".Yii::app()->request->baseUrl."/images/contenido/henkel/bg.jpg); background-size: cover;}
    .titulo-henkel {font-family: Roboto-Light; text-align: center; color:#010101; line-height: 35px; letter-spacing: -1px; margin-top: 1.7em;}
    .titulo-henkel .bold {font-family: Roboto-BlackItalic;}
    .titulo-henkel .segunda-linea {font-size: 29px;}
    .content .col-xs-4 {padding-left: 0 !important; padding-right: 0 !important;}
    .content .detalle {margin-top:-30px;}
    .image-title {margin-left: 2.5em;}
    .btn-compra {width:45%; margin:0 auto; display:block; max-width: 175px;}
    .legales {background:#32A7DD; color:#fff; text-align:center; font-family: Roboto-Light; font-size:12px; padding: 1.3em;}
    .owl-pagination {margin-top: 40px;}
  </style>
";
?>
<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/banner.jpg" alt="Banner promocion happy new look">
<div class="background" style="padding-bottom: 2em;">
  <div class="container" style="margin: 0 15px;">
    <h1 class="titulo-henkel" style="margin-top: 1em;font-size:20px; line-height: 24px; letter-spacing:0;">Conoce todos los <span class="bold">súper descuentos</span> <br> <span class="segunda-linea" style="font-size: 18px;">que te trae Schwarzkopf y crea tu estilo</span> </h1>
    <div class="owl-carousel owl-theme owl-productodetalle content" style="margin-top: 3em;" id="owl-productodetalle-inicio">
      <div class="item" style="margin: 0 15px;">
        <img style="margin-left: 24px;" class="img-responsive image-title" width="140" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/palette.png" alt="">
        <img class="img-responsive detalle" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/-40.png" alt="">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6073)) ?>" data-ajax="false"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/compra-online.png" alt="Comprar online"></a>
      </div>
      <div class="item" style="margin: 0 15px;">
        <img style="margin-left: 24px;" class="img-responsive image-title" width="280"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/igora-vital.png" alt="">
        <img class="img-responsive detalle" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/-30.png" alt="">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6075)) ?>" data-ajax="false"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/compra-online.png" alt="Comprar online"></a>
      </div>
      <div class="item" style="margin: 0 15px;">
        <img style="margin-left: 24px;" class="img-responsive image-title" width="250"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/champu-color-.png" alt="">
        <img class="img-responsive detalle" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/-20.png" alt="">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6077)) ?>" data-ajax="false" ><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/compra-online.png" alt="Comprar online"></a>
      </div>
    </div>
  </div>
</div>
<section class="legales">
  <div class="container">
    <div class="row">
        <div class="col-xs-12">
          <p style="margin:0;">*Vigencia: 22 de Enero al 4 de Febrero de 2018. Aplica a máximo cuatro unidades por referencia, por compra. Sujeto a disponibilidad de productos en el punto de venta. <br>
          Descuento no acumulable con otras ofertas y/o promociones. Descuento válido solo por compras realizadas www.larebajavirtual.com (en puntos de ventas y domicilio si aplica).
          Los precios ofrecidos en www.larebajavirtual.com. son diferentes a los de los puntos de venta y pueden variar según la ciudad y sector definido para la entrega o recogida del pedido.
          El servicio de entrega del pedido tendrá un costo adicional dependiendo de la ciudad. Si por su ubicación geográfica en determinado territorio no es posible entregar el pedido a domicilio
          Copservir Ltda., se puede negar a la aceptación de la oferta de compra. Conozca reglamento del descuento en www.clientefiel.co</p>
        </div>
    </div>
  </div>
</section>

<section class="programa-hora">
  <div class="content">
    <div class="seccion1-m" style="margin: -5px;">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2-m">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
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
<!--FIN VERSION MOVIL-->
<!--VERSION DE ESCRITORIO-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/banner.jpg" alt="Banner promocion happy new look">
<div class="background">
  <div class="container">
    <h1 class="titulo-henkel">Conoce todos los <span class="bold">súper descuentos</span> <br> <span class="segunda-linea">que te trae Schwarzkopf y crea tu estilo</span> </h1>
    <div class="row content" style="margin-top: 3em;">
  		<div class="col-xs-4">
        <img class="img-responsive image-title" width="140" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/palette.png" alt="">
        <img class="img-responsive detalle" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/-40.png" alt="">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6073)) ?>"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/compra-online.png" alt="Comprar online"></a>
      </div>
  		<div class="col-xs-4">
        <img class="img-responsive image-title" width="300"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/igora-vital.png" alt="">
        <img class="img-responsive detalle" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/-30.png" alt="">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6075)) ?>"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/compra-online.png" alt="Comprar online"></a>
      </div>
      <div class="col-xs-4">
        <img class="img-responsive image-title" width="250"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/champu-color-.png" alt="">
        <img class="img-responsive detalle" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/-20.png" alt="">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6077)) ?>"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/henkel/compra-online.png" alt="Comprar online"></a>
      </div>
  	</div>
  </div>
</div>
<section class="legales">
  <div class="container">
    <div class="row">
        <div class="col-xs-12">
          <p style="margin:0;">*Vigencia: 22 de Enero al 4 de Febrero de 2018. Aplica a máximo cuatro unidades por referencia, por compra. Sujeto a disponibilidad de productos en el punto de venta. <br>
          Descuento no acumulable con otras ofertas y/o promociones. Descuento válido solo por compras realizadas www.larebajavirtual.com (en puntos de ventas y domicilio si aplica). <br>
          Los precios ofrecidos en www.larebajavirtual.com. son diferentes a los de los puntos de venta y pueden variar según la ciudad y sector definido para la entrega o recogida del pedido. <br>
          El servicio de entrega del pedido tendrá un costo adicional dependiendo de la ciudad. Si por su ubicación geográfica en determinado territorio no es posible entregar el pedido a domicilio <br>
          Copservir Ltda., se puede negar a la aceptación de la oferta de compra. Conozca reglamento del descuento en www.clientefiel.co</p>
        </div>
    </div>
  </div>
</section>

<section class="programa-hora">
  <div class="content">
    <div class="seccion1">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
</section>
<section style="background-color: #fff;">
  <div class="container" style="padding-top:30px;">
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
</section>
<!--Fin versión escritorio -->
<?php endif; ?>
