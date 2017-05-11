<?php $this->pageTitle = "Suplementos Dietarios - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Energold alimento en polvo para niños y Energold Prenatal, una nutrición agradable para todos.'>
<meta name='keywords' content='Energold kids, energold mama, energold prenatal.'>
<style>
  .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 15%;}
  @font-face {font-family:  Montserrat-Regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/fonts/Montserrat-Regular.otf);}
  @font-face {font-family:Montserrat-SemiBold;src: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/fonts/Montserrat-SemiBold.otf);}
  @font-face {font-family:Montserrat-Light;src: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/fonts/Montserrat-Light.otf);}
  .img-responsive-m {width:100%;}
  .section-menu-mobile {background-color:#E5E5E5;padding: 20px 25px;margin-top: 10px;}
  .section-menu-mobile .item {background-color:#2EACD4;border:3px solid #2EACD4;text-align: center;padding: 15px;margin-bottom: 15px;font-family:Montserrat-Regular;border-radius: 15px;}
  .section-menu-mobile .item.active {background-color:#fff;border:3px solid #2EACD4;color:#2EACD4;}
  .section-menu-mobile .item:hover {background-color:#fff;border:3px solid #2EACD4;color:#2EACD4;}
  .section-menu-mobile a {text-decoration:none;color:#fff;}
  .section-m{padding: 20px 15px;}
  .btn-compra {width: 70%;display: block;margin: 0 auto;}
  .suplemento-dietario-m {background-color: #F4AC34;color: #fff;font-weight: inherit;padding: 13px;font-size: 19px;border-radius: 0 0 50px;font-family: Montserrat-SemiBold;}
  .lista-check { padding-inline-start: 18px;}
  .lista-check li{list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/check.png);margin-bottom: 5px;color:#474746;font-family:  Montserrat-Regular;font-size: 13px;}
  .bg-gray {background-color:#F8F8F8;padding: 19px;margin-bottom: 35px;}
  .sub-title-suplemento-dietario {font-family: Montserrat-Regular;color: #F4AC34;font-size: 13px;}
  .bg-gray p, u {font-family: Montserrat-Regular;color: #474746;font-size: 13px;}
  .porcion-suplemento-dietario {font-family: Montserrat-SemiBold;color: #EA7F19;font-size: 12px;margin-top: 30px;}
  .description-porcion-suplemento-dietario {font-family: Montserrat-Light !important;font-size: 12px !important;color: #474746 !important;}
  .registro {font-family: Montserrat-Light !important;text-align: center;}
  .registro.sup-dietario::after {content: '';width: 85%;height: 3px;background-color: #F4B338;display: inline-block;}
  .registro.multivitaminas::after {content: '';width: 85%;height: 3px;background-color: #193927;display: inline-block;}
  .suplemento-dietario {background-color: #F4AC34;color: #fff;font-weight: inherit;padding: 13px;font-size: 19px;border-radius: 0 0 35px;font-family: Montserrat-SemiBold;width: 54%;}
  .registro.sup-dietario.desktop::after {width: 53%;}
  .registro.multivitaminas.desktop::after {width: 53%;}
  .section-menu-mobile .item.desktop {background-color: #2EACD4;border: 3px solid #2EACD4;text-align: center;padding: 5px;margin-bottom: 15px;border-radius: 15px;width: 49%;margin: 0 auto;font-size: 16px;font-family: Montserrat-Light;font-weight: bold;}
  .section-menu-mobile .item.desktop:hover {background-color: #fff;border: 3px solid #2EACD4;color: #2EACD4;}
  .section-menu-mobile .item.desktop.active {background-color: #fff;border: 3px solid #2EACD4;color: #2EACD4;}
  .section-menu-mobile a:hover {color:#fff !important;}
</style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/banner-suplementos-dietarios.jpg" alt="Suplementos Dietarios">
<section class="section-menu-mobile">
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-renergen-suplementos-dietarios" data-ajax="false"><div class="item active">Suplementos Dietarios</div></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-polvo" data-ajax="false"><div class="item">Alimento en polvo Adultos</div></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-ninos" data-ajax="false"><div class="item">Alimento para Niños</div></a>
</section>
<section class="section-m">
<div class="">
  <div class="bg-gray">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/renergen.png" alt="Renergen">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 103534)) ?>" data-ajax="false">
      <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
    </a>
    <h2 class="suplemento-dietario-m">SUPLEMENTO DIETARIO</h2>
    <span class="sub-title-suplemento-dietario">Vitaminas y minerales en una sola toma</span>
    <p>Las vitaminas del Complejo B, son importantes para los procesos metabólicos
      que usan energía, que se requiere para la formación de glóbulos rojos
      y el mantenimiento del sistema nervioso central.
    </p>
    <u>Es un Suplemento Dietario que contiene en una sola toma, las vitaminas:</u>
    <ul class="lista-check">
      <li>Vitaminas del Complejo B (B1, B2, B6, B12)</li>
      <li>Vitamina A</li>
      <li>Vitamina C</li>
      <li>Vitamina E</li>
      <li>Ácido Fólico</li>
      <li>Ácido Pantoténico</li>
      <li>Nicotinamida</li>
    </ul>
    <h4 class="porcion-suplemento-dietario">PORCIÓN RECOMENDADA</h4>
    <p class="description-porcion-suplemento-dietario">
      1 ampolla diaria (20 mL) <br>
      Cont. neto 200 mL (10 ampollas x 20 mL cada una) <br>
      Vía Oral.
    </p>
  </div>
  <img class="img-responsive-m" style="background-color: #F8F8F8;float: right;margin-top: -63px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/pattern-renergen.png">
  <div class="bg-gray">
    <p class="registro sup-dietario">Registro Sanitario No. SD-2014-0003141</p>
  </div>
</div>
<div class="">
  <div class="bg-gray">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/energold.png" alt="Energold">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100871)) ?>" data-ajax="false">
      <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
    </a>
    <h2 class="suplemento-dietario-m" style="background-color: #193A29;">MULTIVITAMINAS</h2>
    <span class="sub-title-suplemento-dietario" style="color: #193A29;">La manera más fácil de consumir un suplemento dietario</span>
    <p>Es un Suplemento Dietario que aporta las vitaminas y minerales
      necesarios para complementar la alimentación diaria.
    </p>
    <u>Estas Vitaminas y minerales son aptos para:</u>
    <ul class="lista-check">
      <li>Adecuado funcionamiento del sistema inmunológico</li>
    </ul>
    <u>Funcionamiento metabólico que conlleva a:</u>
    <ul class="lista-check">
      <li>Mantener niveles adecuados de fuentes energéticas (ATP)</li>
      <li>Mejora en el desarrollo de la actividad diaria (Deportes, lectura, trabajo, etc.)</li>
    </ul>
    <h4 class="porcion-suplemento-dietario" style="color:#193A29;">PORCIÓN RECOMENDADA</h4>
    <p class="description-porcion-suplemento-dietario">
      1 Cápsula diaria <br>
      Contiene: 30 Cápsulas Softgels
    </p>
  </div>
  <img class="img-responsive-m" style="background-color: #F8F8F8;float: right;margin-top: -63px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/pattern-energold.png">
  <div class="bg-gray">
    <p class="registro multivitaminas">Registro Sanitario No. SD-2010-0001587</p>
  </div>
</div>
</section>
<!--Version movil-->
<!--Versión escritorio-->
<?php else: ?>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=ENERGOLD+">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/bnt-sticky.png" alt="Compra online"></div>
</a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/banner-suplementos-dietarios.jpg" alt="Suplementos Dietarios">
<section class="section-menu-mobile">
  <div class="container">
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-renergen-suplementos-dietarios" data-ajax="false"><div class="item desktop active">Suplementos <br> Dietarios</div></a>
    </div>
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-polvo" data-ajax="false"><div class="item desktop">Alimento en <br> polvo Adultos</div></a>
    </div>
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-ninos" data-ajax="false"><div class="item desktop">Alimento <br> para Niños</div></a>
    </div>
  </div>
</section>
<div class="container">
  <div class="row" style="margin-top: 25px;">
    <div class="col-sm-6 col-md-6">
      <div class="bg-gray">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/renergen.png" alt="Renergen">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 103534)) ?>" data-ajax="false">
          <img class="btn-compra" style="width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
        </a>
        <h2 class="suplemento-dietario">SUPLEMENTO DIETARIO</h2>
        <span class="sub-title-suplemento-dietario" style="margin: 16px 0;display: block;">Vitaminas y minerales en una sola toma</span>
        <p>Las vitaminas del Complejo B, son importantes para los procesos metabólicos
          que usan energía, que se requiere para la formación de glóbulos rojos
          y el mantenimiento del sistema nervioso central.
        </p>
        <u style="display: block;margin-bottom: 15px;">Es un Suplemento Dietario que contiene en una sola toma, las vitaminas:</u>
        <ul class="lista-check">
          <li>Vitaminas del Complejo B (B1, B2, B6, B12)</li>
          <li>Vitamina A</li>
          <li>Vitamina C</li>
          <li>Vitamina E</li>
          <li>Ácido Fólico</li>
          <li>Ácido Pantoténico</li>
          <li>Nicotinamida</li>
        </ul>
        <h4 class="porcion-suplemento-dietario">PORCIÓN RECOMENDADA</h4>
        <p class="description-porcion-suplemento-dietario">
          1 ampolla diaria (20 mL) <br>
          Cont. neto 200 mL (10 ampollas x 20 mL cada una) <br>
          Vía Oral.
        </p>
      </div>
      <img class="img-responsive" style="background-color: #F8F8F8;float: right;margin-top: -63px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/pattern-renergen.png">
      <div class="bg-gray">
        <p class="registro sup-dietario desktop">Registro Sanitario No. SD-2014-0003141</p>
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="bg-gray">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/energold.png" alt="Energold">
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100871)) ?>" data-ajax="false">
            <img class="btn-compra" style="width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
          </a>
          <h2 class="suplemento-dietario" style="background-color: #193A29;">MULTIVITAMINAS</h2>
          <span class="sub-title-suplemento-dietario" style="color: #193A29;margin: 16px 0;display: block;">La manera más fácil de consumir un suplemento dietario</span>
          <p>Es un Suplemento Dietario que aporta las vitaminas y minerales
            necesarios para complementar la alimentación diaria.
          </p>
          <u style="margin-top: 27px;display: block;margin-bottom: 15px;">Estas Vitaminas y minerales son aptos para:</u>
          <ul class="lista-check">
            <li>Adecuado funcionamiento del sistema inmunológico</li>
          </ul>
          <u style="margin: 20px 0;display: block;">Funcionamiento metabólico que conlleva a:</u>
          <ul class="lista-check">
            <li>Mantener niveles adecuados de fuentes energéticas (ATP)</li>
            <li>Mejora en el desarrollo de la actividad diaria (Deportes, lectura, trabajo, etc.)</li>
          </ul>
          <h4 class="porcion-suplemento-dietario" style="color:#193A29;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario" style="margin-bottom: 64px;">
            1 Cápsula diaria <br>
            Contiene: 30 Cápsulas Softgels
          </p>
        </div>
        <img class="img-responsive" style="background-color: #F8F8F8;float: right;margin-top: -56px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/suplementos-dietarios/pattern-energold.png">
        <div class="bg-gray">
          <p class="registro multivitaminas desktop">Registro Sanitario No. SD-2010-0001587</p>
        </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
