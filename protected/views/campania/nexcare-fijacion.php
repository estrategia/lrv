<?php $this->pageTitle = "Nexcare fijación | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Los productos Nexcare de 3M, son ideales para ayudarte con tus golpes, raspones y heridas. Encuentra los productos en La Rebaja Virtual.'>
<meta name='keywords' content='micropore, micropore 3m, esparadrapo.'>
  <style>
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

    @font-face {font-family:HelveticaNeueLTStd-BdCn; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nexcare/fonts/HelveticaNeueLTStd-BdCn.otf);}
    @font-face {font-family:Roboto-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nexcare/fonts/Roboto-Bold.ttf);}
    @font-face {font-family: Roboto-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nexcare/fonts/Roboto-Light.ttf);}
    @font-face {font-family: Roboto-Medium; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nexcare/fonts/Roboto-Medium.ttf);}
    .title-principal {font-family:HelveticaNeueLTStd-BdCn; color:#064CA0; text-align:center;font-size: 40px;margin: 20px auto;}
    .title-principal span {color:#F20308;}
    .title-principal span sup {font-size:25px;top: -17px;}
    .main-container {width: 100%; max-width: 1100px; margin: auto;}
    .bg-menu {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nexcare/bg-main.jpg); background-size: cover; padding: 40px 0 0;}
    .contenedor-menu {background-position: center;display: flex;flex-direction: row; flex-wrap: wrap; justify-content: space-between; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nexcare/line.png); background-size: cover; margin: 0 auto;padding: 0 165px 0;}
    .contenedor-menu .item {width:33.333%;}
    .contenedor-menu .item a {color:#fff;}
    .contenedor-menu .item p {font-family:HelveticaNeueLTStd-BdCn; text-align: center;font-size: 20px;text-shadow: 4px 3px 3px rgba(0, 0, 0, 0.6);}
    .contenedor-menu .item .indicative {margin: 0 auto;display: block;}
    .icon-menu {transition: all .2s ease-in-out;width: 60%;margin: 0 auto;}
    .contenedor-menu .item:hover .icon-menu {transform: scale(0.98);}
    .bg-productos {padding: 60px 0 0px;}
    .contenedor-productos { display: flex; flex-direction: row;flex-wrap: wrap; justify-content: space-between;}
    .producto {width: 32%;border: 3px solid #01AFD7;border-radius: 25px;padding: 30px;}
    .producto .imagen-producto {width:80%;margin: 45px auto 20px;display:block;}
    .producto .nombre {color:#004FA5;font-family:Roboto-Bold;font-size: 22px;margin:0;}
    .producto .presentacion {font-family: Roboto-Light;color: #004FA5;font-size: 16px;}
    .lista {font-family: Roboto-Light; color:#606062;font-size: 17px;}
    .lista span {font-family: Roboto-Medium;color:#004D92;}
    .precioproductos-antes{text-decoration: line-through;color: #004FA5;font-family: Roboto-Bold;margin: 25px auto 0;text-align: center;font-size: 18px;line-height: 18px;}
    .precioproductos{color: #004FA5;text-align: center;font-size: 19px;font-family: Roboto-Bold;margin: 0px;line-height: 19px;}
    .btn-comprar {width: 60%;margin:30px auto 0; display:block;max-width:171px;}
    .scotch {margin-top: 45px;font-family: HelveticaNeueLTStd-BdCn; font-size: 40px; text-align: center; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nexcare/linea-scotch-brite.png);background-repeat: no-repeat;background-position: bottom; height: 141px;position: relative;color:#fff;}
    .scotch p {position:relative;top: 45px;text-shadow: 4px 3px 3px rgba(0, 0, 0, 0.6);}
    .bg-menu-m {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nexcare/main-movil.jpg); background-size: cover; padding: 40px 0 0;}
    .owl-controls {position: absolute;top: 8px;right: 10px;left: 10px;}
  </style>
";
?>
<!--Consulta el precio de los productos-->
<?php $micropore_carrete_dispensadorx24 = Producto::consultarPrecio('14866', $this->objSectorCiudad)?>
<?php $micropore_blister = Producto::consultarPrecio('14867', $this->objSectorCiudad)?>
<?php $micropore_cinta_bolsa = Producto::consultarPrecio('31950', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/banner-nexcare.jpg" alt="Nexcare que nada te detenga">
<div class="margin: 0 20px;">
  <h1 class="title-principal" style="font-size: 23px;"><span style="font-size: 30px;">Nexcare<sup>&reg;</sup></span> <br> la solución para cada necesidad</h1>
</div>
<section class="bg-menu-m">
  <div class="contenedor-menu" style="flex-direction: column; padding: 0 50px 20px;background-image: none;">
    <div class="item" style="width: 100%;margin-bottom: 20px;">
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/nexcare-fijacion" style="text-decoration: none;">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/fijacion-movil.png" alt="Fijacion">
        <p class="item-menu" style="margin: 0 auto;;">FIJACIÓN</p>
      </a>
    </div>
    <div class="item" style="width: 100%;margin-bottom: 20px;">
      <a  data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/nexcare-cubrimiento" style="text-decoration: none;">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/cubrimiento-movil.png" alt="Cubrimiento">
        <p class="item-menu" style="margin: 0 auto;">CUBRIMIENTO</p>
      </a>
    </div>
    <div class="item" style="width: 100%;margin-bottom: 20px;">
      <a  data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/nexcare-rehabilitacion" style="text-decoration: none;">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/rehabilitacion-movil.png" alt="Rehabilitacion">
        <p class="item-menu" style="margin: 0 auto;">REHABILITACIÓN</p>
      </a>
    </div>
  </div>
</section>
<div style="margin-top: 30px;" id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
  <div class="item" style="margin: 30px 25px;">
    <div class="producto" style="width: inherit;">
      <p class="nombre" style="text-align: center;">Micropore Nexcare<sup>&reg;</sup></p>
      <span class="presentacion" style="text-align: center;display: block;">X 24 Unds. Carrete dispensador</span>
      <img class="imagen-producto" style="margin: 40px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/productos/fijacion/micropore.png" alt="Rehabilitacion">
      <ul class="lista" style="-webkit-padding-start: 12px;-moz-padding-start: 12px;padding-inline-start: 12px;">
        <li>Permite la respiración de la piel</li>
        <li>Adhesivo <span>Hipoalergénico</span></li>
        <li><span>No deja residuos</span> en la piel</li>
        <li><span>No lastima la piel</span></li>
      </ul>
      <p class="precioproductos-antes">ANTES: <?= ($micropore_carrete_dispensadorx24 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_carrete_dispensadorx24["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
      <p class="precioproductos">AHORA: <?= ($micropore_carrete_dispensadorx24 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_carrete_dispensadorx24["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14866 )) ?>">
        <img class="btn-comprar" style="margin: 20px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/btn-comprar.png">
      </a>
    </div>
  </div>
  <div class="item" style="margin: 30px 25px;">
    <div class="producto" style="width: inherit;">
      <p class="nombre" style="text-align: center;">Micropore Nexcare<sup>&reg;</sup></p>
      <span class="presentacion" style="text-align: center;display: block;">Blister</span>
      <img class="imagen-producto" style="margin: 40px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/productos/fijacion/micropore-blister.png" alt="Rehabilitacion">
      <ul class="lista" style="-webkit-padding-start: 12px;-moz-padding-start: 12px;padding-inline-start: 12px;">
        <li>Permite la respiración de la piel</li>
        <li>Adhesivo <span>Hipoalergénico</span></li>
        <li><span>No deja residuos</span> en la piel</li>
        <li><span>No lastima la piel</span></li>
      </ul>
      <p class="precioproductos-antes">ANTES: <?= ($micropore_blister == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_blister["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
      <p class="precioproductos">AHORA: <?= ($micropore_blister == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_blister["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14867 )) ?>">
        <img class="btn-comprar" style="margin: 20px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/btn-comprar.png">
      </a>
    </div>
  </div>
  <div class="item" style="margin: 30px 25px;">
    <div class="producto" style="width: inherit;">
      <p class="nombre"  style="text-align: center;">Micropore Nexcare<sup>&reg;</sup></p>
      <span class="presentacion"  style="text-align: center;display: block;">X 24 Unds. Cinta en bolsa</span>
      <img class="imagen-producto" style="margin: 40px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/productos/fijacion/micropore-cinta.png" alt="Rehabilitacion">
      <ul class="lista" style="-webkit-padding-start: 12px;-moz-padding-start: 12px;padding-inline-start: 12px;">
        <li>Permite la respiración de la piel</li>
        <li>Adhesivo <span>Hipoalergénico</span></li>
        <li><span>No deja residuos</span> en la piel</li>
        <li><span>No lastima la piel</span></li>
      </ul>
      <p class="precioproductos-antes">ANTES: <?= ($micropore_cinta_bolsa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_cinta_bolsa["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
      <p class="precioproductos">AHORA: <?= ($micropore_cinta_bolsa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_cinta_bolsa["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 31950 )) ?>">
        <img class="btn-comprar" style="margin: 20px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/btn-comprar.png">
      </a>
    </div>
  </div>
</div>
<section class="scotch" style="margin: 0;">
  <p style="font-size: 28px;top: 35px;">Scotch-Brite<sup>&reg;</sup> <br> cada día una historia</p>
</section>
<a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/buscar?busqueda=brite') ?>">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/banner-scotch-brite-movil.jpg" alt="Rehabilitacion">
</a>
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

<!--VERSION ESCRITORIO-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/banner-nexcare.jpg" alt="Nexcare que nada te detenga">
<div class="main-container">
  <h1 class="title-principal"><span>Nexcare<sup>&reg;</sup></span> la solución para cada necesidad</h1>
</div>
<section class="bg-menu">
  <div class="contenedor-menu">
    <div class="item">
      <a href="<?= Yii::app()->request->baseUrl ?>/nexcare-fijacion">
        <img class="img-responsive icon-menu" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/fijacion.png" alt="Fijacion">
        <p class="item-menu" style="margin-left: 15%;">FIJACIÓN</p>
        <img class="indicative" width="40"  style="margin: 0 52% -3px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/select.png">
      </a>
    </div>
    <div class="item">
      <a href="<?= Yii::app()->request->baseUrl ?>/nexcare-cubrimiento">
        <img class="img-responsive icon-menu" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/cubrimiento.png" alt="Cubrimiento">
        <p class="item-menu">CUBRIMIENTO</p>
      </a>
    </div>
    <div class="item">
      <a href="<?= Yii::app()->request->baseUrl ?>/nexcare-rehabilitacion">
        <img class="img-responsive icon-menu" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/rehabilitacion.png" alt="Rehabilitacion">
        <p class="item-menu" style="margin-left: -10%;">REHABILITACIÓN</p>
      </a>
    </div>
  </div>
</section>
<section class="bg-productos">
  <div class="main-container">
    <div class="contenedor-productos">
      <div class="producto">
        <p class="nombre">Micropore Nexcare<sup>&reg;</sup></p>
        <span class="presentacion">X 24 Unds. Carrete dispensador</span>
        <img class="imagen-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/productos/fijacion/micropore.png" alt="Rehabilitacion">
        <ul class="lista">
          <li>Permite la respiración de la piel</li>
          <li>Adhesivo <span>Hipoalergénico</span></li>
          <li><span>No deja residuos</span> en la piel</li>
          <li><span>No lastima la piel</span></li>
        </ul>
        <p class="precioproductos-antes">ANTES: <?= ($micropore_carrete_dispensadorx24 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_carrete_dispensadorx24["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($micropore_carrete_dispensadorx24 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_carrete_dispensadorx24["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14866 )) ?>">
          <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/btn-comprar.png">
        </a>
      </div>
      <div class="producto">
        <p class="nombre">Micropore Nexcare<sup>&reg;</sup></p>
        <span class="presentacion">Blister</span>
        <img class="imagen-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/productos/fijacion/micropore-blister.png" alt="Rehabilitacion">
        <ul class="lista">
          <li>Permite la respiración de la piel</li>
          <li>Adhesivo <span>Hipoalergénico</span></li>
          <li><span>No deja residuos</span> en la piel</li>
          <li><span>No lastima la piel</span></li>
        </ul>
        <p class="precioproductos-antes">ANTES: <?= ($micropore_blister == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_blister["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($micropore_blister == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_blister["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 14867 )) ?>">
          <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/btn-comprar.png">
        </a>
      </div>
      <div class="producto">
        <p class="nombre">Micropore Nexcare<sup>&reg;</sup></p>
        <span class="presentacion">X 24 Unds. Cinta en bolsa</span>
        <img class="imagen-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/productos/fijacion/micropore-cinta.png" alt="Rehabilitacion">
        <ul class="lista">
          <li>Permite la respiración de la piel</li>
          <li>Adhesivo <span>Hipoalergénico</span></li>
          <li><span>No deja residuos</span> en la piel</li>
          <li><span>No lastima la piel</span></li>
        </ul>
        <p class="precioproductos-antes">ANTES: <?= ($micropore_cinta_bolsa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_cinta_bolsa["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($micropore_cinta_bolsa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $micropore_cinta_bolsa["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 31950 )) ?>">
          <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/btn-comprar.png">
        </a>
      </div>
    </div>
  </div>
  <section class="scotch">
    <p>Scotch-Brite<sup>&reg;</sup> cada día una historia</p>
  </section>
</section>
<a href="<?php echo CController::createUrl('/catalogo/buscar?busqueda=brite') ?>">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nexcare/banner-scotch-brite.jpg" alt="Rehabilitacion">
</a>
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
<!--Fin versión escritorio-->
<?php endif; ?>
