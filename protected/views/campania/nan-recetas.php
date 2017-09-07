
<?php $this->pageTitle = "Recetas Nan optipro - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='NAN® OPTIPRO® 3 DESARROLLO de Nestlé trae unas deliciosas recetas fáciles de preparar para que tu hijo consuma proteína de una manera divertida.'>
  <meta name='Recetas para niños, loncheras, proteína para niños.'>
	<style>
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 15%;}
    .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/home/bg.png);background-size:cover;}
    @font-face {font-family:Caviar_Dreams_Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/fonts/Caviar_Dreams_Bold.ttf);}
    @font-face {font-family:VAGRoundedStd-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/fonts/VAGRoundedStd-Bold.otf);}
    .section-menu {background-color:#E2F9FD;padding: 25px;}
    .item {background-color: #084A9E;text-align: center;color: #fff;font-family: Caviar_Dreams_Bold;padding: 10px;font-size: 20px;border-radius: 25px;-webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);}
    .item:hover{background-color:#10CAD2;}
    .item.active {background-color: #10CAD2;}
    .content {background-size: cover;background-position: center center;padding: 35px !important;margin-top: 35px;background-color: #64CEDC;border-radius: 35px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/recetas-y-sabias-que/textura-blonque-azul.png);}
    .content h1 {font-family: VAGRoundedStd-Bold;text-align: center;color: #fff;text-transform: uppercase;font-size: 30px;margin-bottom: 0;}
    .content h2 {margin:0;font-family:Caviar_Dreams_Bold;text-align:center;color:#2754a2;font-size: 27px;}
    .video-container {position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden;}
    .video-container iframe, .video-container object, .video-container embed {position:absolute;top:0;left:0;width:100%;height:100%;}
    .title-foot {font-family: Caviar_Dreams_Bold;color: #15a1bb;text-align: center;background-color: rgba(255, 255, 255, 0.6);padding: 14px;width: 80%;margin: 35px auto;border-radius: 50px;}
    .btn-mas-info {background-color: #084A9E;color: #fff;text-align: center;font-family: Caviar_Dreams_Bold;font-size: 22px;border-radius: 25px;padding: 15px;width: 36%;margin: 35px auto;-webkit-box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.37);-moz-box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.37);box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.37);}
    .text-footer {font-family: Caviar_Dreams_Bold;text-align: center;color: #084A9E;margin-top: 40px;margin-bottom: 60px;}
    .foot {margin-top: -220px;float: right;}
    .receta {background-color: #fff;color: #084A9E;border-radius: 50px;padding: 20px;margin-top: 20px;padding: 42px 35px;}
    .receta h4 {font-family: VAGRoundedStd-Bold;text-align: center;margin-bottom: 20px;font-size: 16px;}
    .receta strong {font-family: VAGRoundedStd-Bold;font-weight: initial;text-decoration: underline;}
    .compra {margin: 15px auto;width: 40%;}
    .space-1 {height: 0px !important;}
    @media (min-width: 1000px) and (max-width: 1199px) {.foot { margin-top: -180px;}}
    .img-responsive-m{width:100%;}
    a {text-decoration:none;}
    .video-container {position: relative;padding-bottom: 56.25%;padding-top: 30px; height: 0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position: absolute;top: 0;left: 0;width: 100%;height: 100%;}
	</style>
    ";
?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1237970366269442');
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=1237970366269442&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!--Versión movil-->
<?php if ($this->isMobile): ?>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/banner.png" alt="Banner Nan Optipro">
  <section class="section-menu">
    <a href="<?= Yii::app()->request->baseUrl ?>/nestle-nan-optipro"><div class="item" style="margin-bottom: 10px;">BENEFICIOS</div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro"><div class="item active" style="margin-bottom: 10px;">RECETAS</div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan"><div class="item">¿SABÍAS QUE?</div></a>
  </section>
  <div class="row background">
    <div class="content" style="margin:0px 15px;background-size: 100%;">
      <h1 style="font-size: 23px;">con NAN® OPTIPRO® 3 DESARROLLO</h1>
      <h2 style="font-size: 21px;">Sorprende a tu hijo con deliciosas recetas:</h2>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/gelatina-de-frutas.png" alt="Gelatina de frutas">
      <div class="receta">
        <h4 style="margin-top: 0;">GELATINA DE FRUTAS CON NAN<sup>®</sup> OPTIPRO<sup>®</sup> 3 DESARROLLO</h4>
        <p><strong>Ingredientes</strong> <br>
        1 vaso o pocillo (7 oz, 210 ml) de NAN<sup>®</sup> <br>
        OPTIPRO<sup>®</sup> 3 DESARROLLO.</p>
        <p>Frutas pueden ser mango, fresa, <br>kiwi o duraznos.</p>
        <p>1 porción de gelatina de mandarina <br>o de frambuesa.</p>
        <p><strong>Acompañamiento: </strong> <br>
        4 Galletas SALTINAS<sup>®</sup> TRIS</p>
      </div>
      <div class="video-container" style="margin-top: 35px;">
        <div class="video-container">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/8bckex25LDs?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <img class="img-responsive-m" style="margin-top: 55px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/malteada-de-vainilla.png" alt="Malteada de vainilla">
      <div class="receta">
        <h4 style="margin-top: 0;">MALTEADA DE VAINILLA CON NAN<sup>®</sup> OPTIPRO<sup>®</sup> 3 DESARROLLO</h4>
        <p><strong>Ingredientes</strong> <br>
        1 vaso o pocillo (7 oz, 210 ml) de NAN® <br>OPTIPRO<sup>®</sup> 3 DESARROLLO.</p>
        <p>1 o 2 cucharadas soperas de Cereal <br>infantil NESTUM<sup>®</sup> Vainilla. </p>
        <p><strong>Acompañamiento: </strong> <br>
        2 Galletas MILO<sup>®</sup> Anillos <br>1 Durazno cortado en 4. </p>
      </div>
      <div class="video-container" style="margin-top: 35px;">
        <div class="video-container">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/xu9TM2T3Ylo?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <img class="img-responsive-m" style="width: 80%;margin: 20px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/optipro.png" alt="Nan optipro">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>">
      <img class="img-responsive-m" style="width: 80%;display: block;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/compra-online.png" alt="Comprar Nan optipro">
    </a>
    <img class="img-responsive-m" style="margin: 20px auto 0;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/adecuada-maduracion.png" alt="Contribuye a la adecuada maduración de">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/organos.png">
    <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan"><h2 class="btn-mas-info" style="width: 65%;">MÁS INFORMACIÓN</h2></a>
    <p class="text-footer">Producto a partir de 24 meses. <br>
    *Junto con una alimentación balanceada y ejercicio físico diario.</p>
    <img class="img-responsive-m" style="margin-top: -48px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/pata.png">
  </div>
<!--Version movil-->
<!--Versión escritorio-->
<?php else: ?>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2536)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-sticky.png"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/banner.png" alt="Banner Nan Optipro">
<section class="section-menu">
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="padding: 0;">
      <div class="col-sm-4 col-md-4">
        <a href="nestle-nan-optipro"><div class="item">BENEFICIOS</div></a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro"><div class="item active">RECETAS</div></a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan"><div class="item">¿SABÍAS QUE?</div></a>
      </div>
    </div>
  </div>
</section>
<div class="row background">
<div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 content">
      <h1>con NAN® OPTIPRO® 3 DESARROLLO</h1>
      <h2>Sorprende a tu hijo con deliciosas recetas:</h2>
      <div class="row" style="margin-top: 35px;">
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/gelatina-de-frutas.png" alt="Gelatina de frutas">
            <div class="receta">
              <h4>GELATINA DE FRUTAS CON NAN<sup>®</sup> <br>OPTIPRO<sup>®</sup> 3 DESARROLLO</h4>
              <p><strong>Ingredientes</strong> <br>
                1 vaso o pocillo (7 oz, 210 ml) de NAN<sup>®</sup> <br>
                OPTIPRO<sup>®</sup> 3 DESARROLLO.</p>
              <p>Frutas pueden ser mango, fresa, <br>kiwi o duraznos.</p>
              <p>1 porción de gelatina de mandarina <br>o de frambuesa.</p>
              <p><strong>Acompañamiento: </strong> <br>
                  4 Galletas SALTINAS<sup>®</sup> TRIS</p>
            </div>
          <div class="video-container">
            <div class="video-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/8bckex25LDs?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/malteada-de-vainilla.png" alt="Malteada de vainilla">
          <div class="receta">
            <h4>MALTEADA DE VAINILLA CON NAN<sup>®</sup> <br>OPTIPRO<sup>®</sup> 3 DESARROLLO</h4>
            <p><strong>Ingredientes</strong> <br>
            1 vaso o pocillo (7 oz, 210 ml) de NAN® <br>OPTIPRO<sup>®</sup> 3 DESARROLLO.</p>
            <p>1 o 2 cucharadas soperas de Cereal <br>infantil NESTUM<sup>®</sup> Vainilla. </p>
            <p><strong>Acompañamiento: </strong> <br>
              2 Galletas MILO<sup>®</sup> Anillos <br>1 Durazno cortado en 4. </p>
              <p>&nbsp;</p>
          </div>
          <div class="video-container">
            <div class="video-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/xu9TM2T3Ylo?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 ">
        <img class="img-responsive" style="margin-top: 25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/optipro.png" alt="Nan optipro">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>">
          <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/compra-online.png" alt="Comprar Nan optipro">
        </a>
        <img class="img-responsive-m" style="width:60%;margin: 0px auto;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/adecuada-maduracion.png" alt="Contribuye a la adecuada maduración de">

        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/organos.png">
        <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan"><h2 class="btn-mas-info">MÁS INFORMACIÓN</h2></a>
        <p class="text-footer">Producto a partir de 24 meses. <br>
        *Junto con una alimentación balanceada y ejercicio físico diario.</p>
      </div>
    </div>
</div>
<img class="img-responsive foot" src="/lrv/images/contenido/nan-optipro/home/pata.png">
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
