<?php $this->pageTitle = "Pantene fuerza y reconstrucción | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Descubre aquí la Nueva línea Pantene® Fuerza y Reconstrucción con Pro-Vitaminas que deja tu cabello hasta 10 veces más fuerte de la raíz a las puntas.'>
<meta name='keywords' content='Pantene fuerza y reconstrucción, pantene pro v, pantene.'>
  <style>
    @font-face { font-family:Gotham-Medium; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/Gotham-Medium.otf);}
    @font-face { font-family:Gotham-Book; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/Gotham-Book.otf);}
    @font-face { font-family:bebas-neue-regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/bebas-neue-regular.otf);}
    @font-face { font-family:MyriadPro-Regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/MyriadPro-Regular.otf);}
    @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .title-principal {margin: 35px auto 15px;width: 450px;display: block;}
    .banner{position: relative;}
    .btn-banner {position: absolute;bottom: 20px;right: 20px;border: none;width: 220px;}
    .intro { font-family:Gotham-Medium; text-align:center;}
    .intro-legal {color: #646463;text-align: center;font-family: Gotham-Book;font-size: 10px;display: block;}
    .contenedor-producto {-webkit-box-shadow: 0px 0px 5px 1px rgb(219, 219, 219);-moz-box-shadow: 0px 0px 5px 1px rgb(219, 219, 219);box-shadow: 0px 0px 5px 1px rgb(219, 219, 219);padding: 40px 30px 10px;border-radius: 25px;background: rgba(255,255,255,1);
      background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 78%, rgba(240,240,240,1) 88%, rgba(255,250,255,1) 94%, rgba(255,250,255,1) 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(78%, rgba(255,255,255,1)), color-stop(88%, rgba(240,240,240,1)), color-stop(94%, rgba(255,250,255,1)), color-stop(100%, rgba(255,250,255,1)));
      background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 78%, rgba(240,240,240,1) 88%, rgba(255,250,255,1) 94%, rgba(255,250,255,1) 100%);
      background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 78%, rgba(240,240,240,1) 88%, rgba(255,250,255,1) 94%, rgba(255,250,255,1) 100%);
      background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 78%, rgba(240,240,240,1) 88%, rgba(255,250,255,1) 94%, rgba(255,250,255,1) 100%);
      background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 78%, rgba(240,240,240,1) 88%, rgba(255,250,255,1) 94%, rgba(255,250,255,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#fffaff', GradientType=0 );
    }
    .producto {width: 90px;margin: 0 auto;display: block;}
    .title-producto {font-family: bebas-neue-regular;color: #1F1F1F;text-align: center;letter-spacing: 3px;font-size: 19px;}
    .contenedor-producto p {font-family:MyriadPro-Regular;text-align:center;color:#777777;}
    .contenedor-producto a {font-family:Gotham-Book;color:#957400;text-align:center;display: block;}
    .contenedor-producto a:hover {color:#957400;}
    .boton-compra {width: 160px;margin: 25px auto;}
    .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
    .video iframe{position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    .item {padding: 0 35px;}
    .item .contenedor-producto {margin:5px 0;}
    .owl-pagination {margin-top: 40px;}
    .owl-theme .owl-controls .owl-page span {background-color: #656565 !important;}
    a {text-decoration:none;}
  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/banner-home-mobile.jpg" alt="Pantene, cabello hasta 10 veces más fuerte">
<img class="img-responsive-m" style="margin-top: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/fuerza-es-belleza-mobile.png" alt="Fuerza es belleza">
<div style="padding: 0 15px;">
  <p class="intro" style="font-size: 13px;">Tu cabello se ha vuelto débil y frágil, necesitas <br>
    una solución de fortalecimiento efectiva <br>
    y duradera. El sistema de PANTENE PRO-V® <br>
    con Pro-Vitaminas penetra profundamente <br>
    en el cabello*, para ayudar a dejarlo fuerte** <br>
    de adentro hacia afuera.</p>
  <p class="intro-legal">*Usando Sistema Pantene **Fuerza contra el daño mecánico ***Fuerza contra el daño mecánico vs. Shampoo sin ingredientes acondicionadores. [Cálculo de P&amp;G basado en data de ventas de Julio 2015 a Junio 2016]</p>
</div>
<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
  <div class="item">
    <div class="contenedor-producto">
      <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/shampoo-pantene.png" alt="Shampoo pantene">
      <h3 class="title-producto">SHAMPOO</h3>
      <p>Limpia y elimina los residuos <br>en el cabello</p>
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/shampoo-pantene-fuerza-y-reconstruccion">Ver más información</a>
      <a data-ajax="false" style="margin-top:10px;margin-bottom: 15px;" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119303 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
    </div>
  </div>
  <div class="item">
    <div class="contenedor-producto">
      <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/crema-para-peinar.png" alt="Crema para peiner pantene">
      <h3 class="title-producto">CREMA PARA PEINAR</h3>
      <p>Controla instantáneamente el frizz <br> y el volumen del cabello</p>
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/crema-para-peinar-pantene-fuerza-y-reconstruccion">Ver más información</a>
      <a data-ajax="false" style="margin-top:10px;margin-bottom: 15px;" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119292 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
    </div>
  </div>
  <div class="item">
    <div class="contenedor-producto">
      <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/acondicionador-diario.png" alt="Acondicionador diario pantene">
      <h3 class="title-producto">ACONDICIONADOR DIARIO</h3>
      <p>Actúa en las áreas más débiles <br> &nbsp;</p>
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/acondicionador-diario-pantene-fuerza-y-reconstruccion">Ver más información</a>
      <a data-ajax="false" style="margin-top:10px;margin-bottom: 15px;" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119290 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
    </div>
  </div>
  <div class="item">
    <div class="contenedor-producto">
      <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/acondicionador.png" alt="Acondicionador pantene">
      <h3 class="title-producto">ACONDICIONADOR</h3>
      <p>Penetra* y ayuda a fortalecer** <br> tu cabello hasta las puntas</p>
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/acondicionador-pantene-fuerza-y-reconstruccion">Ver más información</a>
      <a data-ajax="false" style="margin-top:10px;margin-bottom: 15px;" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119298 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
    </div>
  </div>
</div>
<img class="img-responsive-m" style="margin-top: 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/un-cabello-10-veces-mas-fuerte-mobile.png" alt="Un cabello 10 veces más fuerte">
<div style="margin: 25px 20px;">
  <div class="video"><iframe width="640" height="360" src="https://www.youtube.com/embed/ox1n4LpXL-E?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
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
<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<div class="banner">
 <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/banner-home.jpg" alt="Pantene, cabello hasta 10 veces más fuerte">
 <a href="#"><img class="btn-banner" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
</div>
<div class="container">
  <div class="row">
    <img class="img-responsive title-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/fuerza-es-belleza.png" alt="Fuerza es belleza">
    <p class="intro">Tu cabello se ha vuelto débil y frágil, necesitas una solución de fortalecimiento efectiva y duradera. El sistema de PANTENE PRO-V® <br>
    con Pro-Vitaminas penetra profundamente en el cabello*, para ayudar a dejarlo fuerte** de adentro hacia afuera.  </p>
    <span class="intro-legal">*Usando Sistema Pantene **Fuerza contra el daño mecánico ***Fuerza contra el daño mecánico vs. Shampoo sin ingredientes acondicionadores. [Cálculo de P&amp;G basado en data de ventas de Julio 2015 a Junio 2016]</span>
  </div>
  <div class="row" style="margin-top: 60px;margin-bottom: 40px;">
    <div class="col-sm-3 col-md-3">
      <div class="contenedor-producto">
        <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/shampoo-pantene.png" alt="Shampoo pantene">
        <h3 class="title-producto">SHAMPOO</h3>
        <p>Limpia y elimina los residuos <br>en el cabello</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/shampoo-pantene-fuerza-y-reconstruccion">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119303 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="contenedor-producto">
        <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/crema-para-peinar.png" alt="Crema para peiner pantene">
        <h3 class="title-producto">CREMA PARA PEINAR</h3>
        <p>Controla instantáneamente el frizz <br> y el volumen del cabello</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/crema-para-peinar-pantene-fuerza-y-reconstruccion">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119292 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="contenedor-producto">
        <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/acondicionador-diario.png" alt="Acondicionador diario pantene">
        <h3 class="title-producto">ACONDICIONADOR DIARIO</h3>
        <p>Actúa en las áreas más débiles <br> &nbsp;</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/acondicionador-diario-pantene-fuerza-y-reconstruccion">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119290 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="contenedor-producto">
        <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/acondicionador.png" alt="Acondicionador pantene">
        <h3 class="title-producto">ACONDICIONADOR</h3>
        <p>Penetra* y ayuda a fortalecer** <br> tu cabello hasta las puntas</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/acondicionador-pantene-fuerza-y-reconstruccion">Ver más información</a>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 119298 )) ?>"><img class="img-responsive boton-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/btn-comprar.png" alt="Comprar"></a>
      </div>
    </div>
  </div>
</div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/un-cabello-10-veces-mas-fuerte.jpg" alt="Un cabello 10 veces más fuerte">
<div class="container">
  <div style="margin: 35px 25%;">
    <div class="video"><iframe width="640" height="360" src="https://www.youtube.com/embed/ox1n4LpXL-E?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
  </div>
</div>
<section class="programa-hora">
  <span style="font-family:HelveticaNeueLight;color:#363636;">Ahora comprando en </span><span style="font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 23px;letter-spacing: 1px;">larebajavirtual.com</span><span style="color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;">, programa tu hora y lugar de entrega </span><img width="50" style="margin-left:6px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
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
