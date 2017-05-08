<?php $this->pageTitle = "Eucerin facial - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='La gama Eucerin Sun Protection ofrece una protección solar global frente a los daños que provoca la luz solar. Hay un protector solar adecuado para cada tipo de piel.'>
  <meta name='keywords' content='eucerin, eucerin protector solar, eucerin bloqueador solar.'>
	<style>
    @font-face { font-family:Eucerina-Europe-Medium; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/eucerin/fonts/eucerina-europe-medium.otf);}
    @font-face { font-family:Eucerina-Europe-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/eucerin/fonts/eucerina-europe-bold.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 15%;}
    .bg-orange {background: #ffffff;background: -moz-linear-gradient(left, #ffffff 0%, #f7be74 48%, #f49f30 86%, #ffffff 99%, #ffffff 100%);background: -webkit-gradient(left top, right top, color-stop(0%, #ffffff), color-stop(48%, #f7be74), color-stop(86%, #f49f30), color-stop(99%, #ffffff), color-stop(100%, #ffffff));background: -webkit-linear-gradient(left, #ffffff 0%, #f7be74 48%, #f49f30 86%, #ffffff 99%, #ffffff 100%);background: -o-linear-gradient(left, #ffffff 0%, #f7be74 48%, #f49f30    86%, #ffffff 99%, #ffffff 100%);background: -ms-linear-gradient(left, #ffffff 0%, #f7be74 48%, #f49f30 86%, #ffffff 99%, #ffffff 100%);background: linear-gradient(to right, #ffffff 0%, #f7be74 48%, #f49f30 86%, #ffffff 99%, #ffffff 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff', GradientType=1 );width: 90%;padding: 20px 0;margin-top: 50px;}
    .bg-orange h2 {color: #163466;font-family: Eucerina-Europe-Bold;font-size: 30px;text-transform: uppercase;margin-bottom: 0px;}
    .bg-orange h3 {font-family: Eucerina-Europe-Medium;font-weight: bold;color: #E41111;margin-top: 5px;}
    .ico-proteccion {width: 26%;right: 0;position: absolute;margin-top: -170px;}
    .menu {margin-top: 70px;border: 3px solid #F49714;margin-bottom: 30px;}
    .menu .item {background-color:#F49714;text-align:center;color:#fff;text-transform:uppercase;font-family:Eucerina-Europe-Bold;font-size:23px;}
    .menu .item:hover {background-color:#fff;color:#F49714;transition: all 0.4s ease-in-out 0s;}
    .menu .item.active {background-color:#fff;color:#F49714;}
    .bg-product {background: rgba(249,205,148,1);background: -moz-linear-gradient(left, rgba(249,205,148,1) 0%, rgba(255,255,255,1) 100%);background: -webkit-gradient(left top, right top, color-stop(0%, rgba(249,205,148,1)), color-stop(100%, rgba(255,255,255,1)));background: -webkit-linear-gradient(left, rgba(249,205,148,1) 0%, rgba(255,255,255,1) 100%);background: -o-linear-gradient(left, rgba(249,205,148,1) 0%, rgba(255,255,255,1) 100%);background: -ms-linear-gradient(left, rgba(249,205,148,1) 0%, rgba(255,255,255,1) 100%);background: linear-gradient(to right, rgba(249,205,148,1) 0%, rgba(255,255,255,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9cd94', endColorstr='#ffffff', GradientType=1 );padding: 15px 60px;margin-bottom: 35px;}
    .bg-product .name-product {color:#163466;font-family:Eucerina-Europe-Bold;font-size: 27px;}
    .bg-product .lista {color:#163466;font-family:Eucerina-Europe-Medium;font-size: 22px;line-height: 23px;padding-inline-start: 20px;}
    .bg-product .lista li {margin-bottom:15px;}
    .figure {width: 22%;margin-bottom: 15px;}
    .video {width: 70%;margin: 35px auto;}
    .img-responsive-m {width:100%;}
    .bg-orange-m {background-color: #ffd59f;padding: 1px 15px;text-align: center;margin-top: -5px;}
    .bg-orange-m h2 {color: #163466;font-family: Eucerina-Europe-Bold;font-size: 16px;text-transform: uppercase;margin-bottom: 0px;}
    .bg-orange-m h3 {font-family: Eucerina-Europe-Medium;font-weight: bold;color: #E41111;margin-top: 5px;}
    a {text-decoration:none;}
    .figure-m {width: 31%;margin-bottom: 5px;}
  </style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/banner-movil.jpg" alt="Eucerin, Protección solar médica para tu piel">
<div class="bg-orange-m">
  <h2>Protección solar médica para tu piel</h2>
  <h3>Frente a los daños inducidos <br>por los rayos del sol</h3>
</div>
<div class="menu" style="margin-top: 30px;">
    <a href="<?= Yii::app()->request->baseUrl ?>/eucerin-proteccion-solar-facial"><div class="item active">facial </div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/eucerin-proteccion-solar-corporal"><div class="item" style="border-bottom:2px solid #fff;">corporal </div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/eucerin-proteccion-solar-infantil"><div class="item">kids </div></a>
</div>

<div class="bg-product" style="padding: 15px 30px;">
  <h3 class="name-product" style="font-size: 19px;">OIL CONTROL TOQUE SECO 50ml</h3>
  <img class="figure-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/arrow.png">
  <ul class="lista">
    <li>Protección solar con acción antibrillo de <br> larga duración, controla, regula y matifica.</li>
    <li>Textura ultraligera gel-crema en válvula <br> dosificador para mayor higiene y rendimiento.</li>
  </ul>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/oil-toque-seco.png" alt="Oil control toque seco 50ml">
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>104451)) ?>"><img style="width: 70%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/compra-online.png" alt="Compra online"></a>
</div>

<div class="bg-product" style="padding: 15px 30px;">
  <h3 class="name-product" style="font-size: 19px;">CREMA COLOR 50ml</h3>
  <img class="figure-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/arrow.png">
  <ul class="lista">
    <li>Crema solar para la cara, que tiene un ligero tinte, una protección muy elevada<br>frente a los rayos UV así como protección  celular.</li>
    <li>Libre de aceites y ligeramente coloreada es adecuada para todo tipo de pieles.</li>
    <li>Previene los puntos de pigmentación.</li>
  </ul>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/sun-creme.png" alt="Crema color 50ml">
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>115792)) ?>"><img style="width: 70%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/compra-online.png" alt="Compra online"></a>
</div>

<div class="bg-product" style="padding: 15px 30px;">
  <h3 class="name-product" style="font-size: 19px;">FLUIDO FACIAL MATIFICANTE <br> FPS 50+ 50 ml</h3>
  <img class="figure-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/arrow.png">
  <ul class="lista">
    <li>Combina una alta protección frente a los rayos UV y protección celular y del ADN.</li>
    <li>Funciona bien en climas cálidos y húmedos. Ideal para la piel mixta y grasa.</li>
    <li>La textura ultraligera permite que la piel adopte un tono mate. </li>
    <li>Adecuado para el uso en piel sensible o piel propensa al acné.</li>
  </ul>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/sun-fluid.png" alt="Sun fluid 50ml">
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>82598)) ?>"><img style="width: 70%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/compra-online.png" alt="Compra online"></a>
</div>

  <div class="video">
    <video width="100%" height="auto" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/poster.jpg">
      <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/video.mov" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2566)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/boton-sticky.png"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/banner.jpg" alt="Eucerin, Protección solar médica para tu piel">
<div class="container" style="padding: 0 10%;">
  <div class="row">
    <div class="col-md-12">
      <div class="bg-orange">
        <h2>Protección solar médica para tu piel</h2>
        <h3>Frente a los daños inducidos por los rayos del sol</h3>
        <img class="img-responsive ico-proteccion" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/proteccion.png" alt="Protección solar médica para tu piel">
      </div>
    </div>
  </div>
  <div class="row menu">
    <a href="<?= Yii::app()->request->baseUrl ?>/eucerin-proteccion-solar-facial"><div class="col-sm-4 col-md-4 item active">facial </div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/eucerin-proteccion-solar-corporal"><div class="col-sm-4 col-md-4 item" style="border-right: 3px solid;">corporal </div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/eucerin-proteccion-solar-infantil"><div class="col-sm-4 col-md-4 item">kids </div></a>
  </div>
  <div class="row bg-product">
    <div class="col-sm-7 col-md-7">
      <h3 class="name-product">OIL CONTROL TOQUE SECO 50ml</h3>
      <img class="figure" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/arrow.png">
      <ul class="lista">
        <li>Protección solar con acción antibrillo de <br> larga duración, controla, regula y matifica.</li>
        <li>Textura ultraligera gel-crema en válvula <br> dosificador para mayor higiene y rendimiento.</li>
      </ul>
    </div>
    <div class="col-sm-5 col-md-5">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/oil-toque-seco.png" alt="Oil control toque seco 50ml">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>104451)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/compra-online.png" alt="Compra online"></a>
    </div>
  </div>
  <div class="row bg-product">
    <div class="col-sm-7 col-md-7">
      <h3 class="name-product">CREMA COLOR 50ml</h3>
      <img class="figure" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/arrow.png">
      <ul class="lista">
        <li>Crema solar para la cara, que tiene un ligero tinte, una protección muy elevada<br>frente a los rayos UV así como protección  celular.</li>
        <li>Libre de aceites y ligeramente coloreada es adecuada para todo tipo de pieles.</li>
        <li>Previene los puntos de pigmentación.</li>
      </ul>
    </div>
    <div class="col-sm-5 col-md-5">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/sun-creme.png" alt="Crema color 50ml">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>115792)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/compra-online.png" alt="Compra online"></a>
    </div>
  </div>
  <div class="row bg-product" style="margin-bottom:0px;">
    <div class="col-sm-7 col-md-7">
      <h3 class="name-product">FLUIDO FACIAL MATIFICANTE <br> FPS 50+ 50 ml</h3>
      <img class="figure" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/arrow.png">
      <ul class="lista">
        <li>Combina una alta protección frente a los rayos UV y protección celular y del ADN.</li>
        <li>Funciona bien en climas cálidos y húmedos. Ideal para la piel mixta y grasa.</li>
        <li>La textura ultraligera permite que la piel adopte un tono mate. </li>
        <li>Adecuado para el uso en piel sensible o piel propensa al acné.</li>
      </ul>
    </div>
    <div class="col-sm-5 col-md-5">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/sun-fluid.png" alt="Sun fluid 50ml">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>82598)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/compra-online.png" alt="Compra online"></a>
    </div>
  </div>
  <div class="row" style="background-color:#FEF4EA;">
    <div class="video">
      <video width="100%" height="auto" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/poster.jpg">
       <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/eucerin/video.mov" type="video/mp4">
      Your browser does not support the video tag.
      </video>
    </div>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
