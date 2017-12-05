<?php $this->pageTitle = "Klim 1+ Deslactosado | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Llega el nuevo alimento lácteo KLIM® 1+ DESLACTOSADO, especialmente diseñado para niños con intolerancia a la lactosa. Más fácil de digerir.'>
<meta name='keywords' content='leche klim deslactosada, leche klim 1 deslactosada, leche deslactosada en polvo.'>
  <style>
    @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
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
    .agradecimiento {font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 16px;}
    .agradecimiento span {font-family:HelveticaNeue-BlackCond;letter-spacing:1px;}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    a {text-decoration:none;}
    @font-face { font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/klim1-deslactosado/fonts/VAGRoundedStd-Bold.otf);}
    .animate1 {visibility: hidden;}
    .main-klim {background-size: 100%;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/bg-main.jpg);}
    .content {display:flex;width:100%;flex-direction: row;max-width: 1100px;flex-wrap: wrap;margin: 0 auto;}
    .intro-banner {display:flex;width:100%;flex-direction: row;flex-wrap: wrap;}
    .intro-banner .columna1 {width: 60%;}
    .intro-banner .columna2 {width: 40%;}
    .nuevo {width: 30%;max-width: 180px;}
    .nuevo-alimento {width: 100%;max-width: 660px;margin: 46px auto;}
    .intro-banner .pack {width: 100%;margin: 80px auto 0;max-width: 440px;}
    .intro-banner .columna2 .compra{display:flex;width:100%;flex-direction: row;flex-wrap: wrap;}
    .intro-banner .columna2 .compra .columna1, .intro-banner .columna2 .compra .columna2 {width:50%;}
    .precioproductos-antes{text-decoration: line-through;color:#8E2079;font-family:VAGRoundedStd-Bold;font-size: 25px;margin: 0 auto 5px;line-height: 25px;}
    .precioproductos{color:#8E2079;font-family:VAGRoundedStd-Bold;font-size: 25px;margin: 0;line-height: 25px;}
    .descripcion {font-family:VAGRoundedStd-Bold; color:#8E2079;margin: 50px auto 0;text-align:center;}
    .descripcion h1{font-size: 50px;}
    .descripcion h2{font-size: 50px;margin-top:30px;}
    .caracteristicas {padding-bottom: 70px;display:flex;width:100%;flex-direction: row;flex-wrap: wrap;margin-top:40px;}
    .caracteristicas p {text-align:center;font-family:VAGRoundedStd-Bold; color:#2E318D;font-size: 28px;line-height:29px;margin: 20px auto 40px;}
    .caracteristicas .columna {width: 50%;padding: 0 30px;}
    .conoce-mas {background-color: #913D80;padding: 25px 0px;}
    .conoce-mas .content .column {width:50%;}
    .conoce-mas h3 {font-family:VAGRoundedStd-Bold;color:#fff;text-align:center;font-size: 28px;letter-spacing: 1px;}
    .conoce-mas .content .column .accion {display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;}
    .accion .column1{width:70%;}
    .accion .column2{width:30%;}
    .accion .btn-conoce-mas {width: 55%;margin: 12px auto 0;display: block;max-width: 211px;}
    .accion .icono1 {width: 100%;margin: -98px auto;display: block;max-width: 151px;}
    .main-video {background: url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/corazon.png) top right no-repeat, url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/bg-video.jpg) center no-repeat;}
    .main-video h2 {font-family: VAGRoundedStd-Bold;color: #8E2079;font-size: 45px;text-align: center;margin: 75px auto 0;}
    .video{margin: 50px auto 0;width: 100%;max-width: 1100px;}
    .video iframe {border:8px solid #fff;width: 60%;}
    .fot {margin-top: -190px;}
    .icono-m {width: 60px;float: right;margin-top: -55px;right: 30px;position: absolute;}
    .video-m {position: relative;padding-bottom: 56.25%;overflow: hidden;margin: 20px 30px;}
    .video-m iframe {position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
    .main-video-m {padding-top: 30px;background:url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/bg-video.jpg) center no-repeat;}
    @media (min-width: 1800px) and (max-width: 1920px){.fot {margin-top: -280px;}}
    .programa-hora .content .seccion1-m {background-color: #C9C8C6;padding: 15px;text-align: center;}
    .programa-hora .content .seccion2-m {background-color: #BF1A24;width: 100%;padding: 15px;}
  </style>
";
?>
<!--LIBRERIA DE ANIMACIONES-->
<link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/animate.min.css">
<script src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/wow.min.js"></script>
<script type="text/javascript">wow = new WOW(); wow.init();</script>

<!--PRECIO PRODUCTO-->
<?php $klim1_deslactosado = Producto::consultarPrecio('118997', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Añadir al carro-->
<section class="main-klim" style="background-size:cover;">
  <img class="nuevo" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo.png" alt="Nuevos deslactosado">
  <img class="img-responsive-m" style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo-alimento-lacteo.png" alt="Nuevos Alimento lacteo">
  <img class="pack" style="width: 70%;margin: 20px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/lata-klim-deslactosado.png" alt="Klim 1+ deslactosado">
  <p class="precioproductos-antes" style="text-align: center;">ANTES: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
  <p class="precioproductos" style="text-align: center;">AHORA: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118997 )) ?>">
    <img class="img-responsive-m" style="margin: 20px auto 0;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/btn-comprar.png" alt="Comprar">
  </a>
  <div class="descripcion" style="margin: 0 auto;">
    <h1 style="font-size: 24px;">Especialmente diseñado para niños a partir de 1 año con INTOLERANCIA A LA LACTOSA.</h1>
    <h2 style="font-size: 28px;margin-top: 0px;">MÁS FÁCIL DE DIGERIR</h2>
  </div>
  <div style="margin: 0 30px;font-family: VAGRoundedStd-Bold;color: #262C92;text-align: center;font-size: 18px;">
    <img class="img-responsive-m" style="margin: 0 auto;display: block;width: 60%;max-width: 216px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/advanced-protection.png" alt="ADVANCED PROTECTUS">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/probioticos.png" alt="Probioticos">
    <p>Probióticos de la cepa L. Paracasei <br> exclusiva de Nestlé</p>
    <img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/sistema-inmune.png" alt="Sistema inmune">
    <p >Contiene Hierro, Zinc, Vitaminas A y C <br> que contribuyen al funcionamiento <br> normal del sistema inmune</p>
    <img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/prebio1.png" alt="Prebio 1">
    <p>PREBIO 1<sup>&reg;</sup> es una exclusiva mezcla <br> de fibras solubles Prebióticas, <br> Inulina y Oligofructosa </p>
  </div>
  <div class="conoce-mas" style="margin-top: 45px;">
    <img class="icono-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/1.png">
    <h3 style="margin: 30px auto 0;font-size: 22px;">¿Qué debo hacer si mi hijo es intolerante a la lactosa? 5 formas de detectarlo</h3>
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/que-hacer-ante-la-intolerancia-a-la-lactosa-en-ninos"><img class="btn-conoce-mas" style="width: 50%;margin: 15px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/conoce-mas.png" alt="Conoce más"></a>
  </div>
</section>
<section class="main-video-m">
  <h2 style="font-family: VAGRoundedStd-Bold;color: #8D2079;font-size: 25px;margin: 0px;text-align: center;">Sorprende a tu hijo con una deliciosa receta</h2>
    <div class="video-m">
      <iframe width="640" height="360" src="https://www.youtube.com/embed/rtLT3M09UP4?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <img class="img-responsive-m fot" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/footer.png">
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
<!-- Fin Version movil -->
<!--VERSION ESCRITORIO-->
<?php else: ?>
 <!--Añadir al carro-->
<input type="hidden" id="cantidad-producto-unidad-118997-1" value="1" >
<section class="main-klim">
  <div class="content">
    <div class="intro-banner">
      <div class="columna1">
        <img class="nuevo animate1 wow flash" data-wow-offset="200" data-wow-delay="2s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo.png" alt="Nuevos deslactosado">
        <img class="nuevo-alimento animate1 wow fadeInLeft" data-wow-offset="100" data-wow-delay="0.8s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo-alimento-lacteo.png" alt="Nuevos Alimento lacteo">
      </div>
      <div class="columna2 animate1 wow fadeIn"  data-wow-offset="200" data-wow-delay="1s">
        <img class="pack" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/lata-klim-deslactosado.png" alt="Klim 1+ deslactosado">
        <div class="compra">
          <div class="columna1">
            <p class="precioproductos-antes">ANTES: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos">AHORA: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
          </div>
          <div class="columna2">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118997 )) ?>">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/btn-comprar.png" alt="Comprar">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="descripcion">
      <h1 class="animate1 wow bounceInDown" data-wow-offset="10" data-wow-delay="0.2s">Especialmente diseñado para niños a partir <br> de 1 año con INTOLERANCIA A LA LACTOSA.</h1>
      <h2 class="animate1 wow fadeIn" data-wow-offset="10" data-wow-delay="0.3s">MÁS FÁCIL DE DIGERIR</h2>
    </div>
    <div class="caracteristicas">
      <div class="columna">
        <img class="img-responsive animate1 wow bounceInLeft" data-wow-offset="10" data-wow-delay="0.2s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/advanced-protection.png" alt="ADVANCED PROTECTUS">
      </div>
      <div class="columna">
        <img class="img-responsive animate1 wow bounceInLeft" data-wow-offset="10" data-wow-delay="0.3s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/probioticos.png" alt="Probioticos">
        <p class="animate1 wow bounceInLeft" data-wow-offset="10" data-wow-delay="0.3s">Probióticos de la cepa L. Paracasei <br> exclusiva de Nestlé</p>
        <img class="img-responsive animate1 wow bounceInLeft" data-wow-offset="10" data-wow-delay="0.4s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/sistema-inmune.png" alt="Sistema inmune">
        <p class="animate1 wow bounceInLeft" data-wow-offset="10" data-wow-delay="0.4s">Contiene Hierro, Zinc, Vitaminas A y C <br> que contribuyen al funcionamiento <br> normal del sistema inmune</p>
        <img class="img-responsive animate1 wow bounceInLeft" data-wow-offset="10" data-wow-delay="0.5s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/prebio1.png" alt="Prebio 1">
        <p class="animate1 wow bounceInLeft" data-wow-offset="10" data-wow-delay="0.5s">PREBIO 1<sup>&reg;</sup> es una exclusiva mezcla <br> de fibras solubles Prebióticas, <br> Inulina y Oligofructosa </p>
      </div>
    </div>
  </div>
  <div class="conoce-mas animate1 wow flipInX" data-wow-offset="10" data-wow-delay="0.1s">
    <div class="content">
      <div class="column">
        <h3>¿Qué debo hacer si mi hijo es intolerante <br> a la lactosa? 5 formas de detectarlo</h3>
      </div>
      <div class="column">
        <div class="accion">
          <div class="column1">
            <a href="<?= Yii::app()->request->baseUrl ?>/que-hacer-ante-la-intolerancia-a-la-lactosa-en-ninos"><img class="btn-conoce-mas" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/conoce-mas.png" alt="Conoce más"></a>
          </div>
          <div class="column2">
            <img class="icono1" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/1.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="main-video">
  <div class="content">
    <h2 class="animate1 wow zoomIn" data-wow-offset="10" data-wow-delay="0.3s">Sorprende a tu hijo con una deliciosa receta</h2>
    <div class="video">
      <center>
        <iframe width="640" height="360" src="https://www.youtube.com/embed/rtLT3M09UP4?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </center>
    </div>
  </div>
  <img class="img-responsive fot" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/footer.png">
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
