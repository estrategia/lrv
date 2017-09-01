<?php $this->pageTitle = "Pilas auditivas Energizer - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Energizer® Pilas Auditivas viene en un envase innovador y práctico que mantiene seguras tus baterías de audiología, con lengüetas más largas que simplifica el manejo.'>
  <meta name='keywords' content='Pilas energizer, pilas auditivas, pilas AAA.'>
	<style>
    @font-face { font-family:helvetica-neue-heavy; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy.otf);}
    @font-face { font-family:helvetica-neue-heavy-condObl; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy-condObl.otf);}
    @font-face { font-family:omnes; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/omnes.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .background-black {background-color:#000;}
    .content {padding:0 10% 50px;}
    .first-title {color:#FFE500;font-family:helvetica-neue-heavy-condObl;font-size: 68px;margin:6px 0;}
    .background-black .content h2 {color:#FFF;font-family:helvetica-neue-heavy-condObl;font-size: 21px;margin:6px 0;}
    .background-black .content h3 {color:#FA9000;font-family:helvetica-neue-heavy;font-size: 35px;margin: 12px 0; }
    .lista {color: #E9E9E6;font-size: 19px;margin-top: 30px;font-family:helvetica-neue-heavy; line-height: 35px;}
    .usos {font-family:helvetica-neue-heavy;color:#DFDFDC;font-size: 18px;}
    .text-bg-yellow {z-index: 5;position: absolute;margin-top: 16px;font-family: helvetica-neue-heavy-condObl;font-size: 24px;color: #000;margin: 32px;}
    .text-bg-yellow span {font-size: 32px;}
    .precaucion {font-family:helvetica-neue-heavy;color:#FBDA15;font-size: 25px;margin-top: 27%;}
    .fot-product {margin-top: -170px;}
    .btn-compra {margin-top: 20px;}
    .text-foot {color:#fff; text-align:center;font-family:omnes;font-size: 20px;margin-bottom: 30px;margin-top: 40px;}
    .product{width: 77%;margin: 0 auto;}
    .space-1 {height: 0px !important;}
    .block-yellow {position: absolute;left: 0;margin-top: 16%;width: 33%;margin-top: 14.3%;}
    .img-responsive-movil {width:100%;}
    .btn-menu{font-family: helvetica-neue-heavy;background-repeat: no-repeat;display: inline-block;padding: 15px 25px;background-size: 100% 100%;color: #FFE500;border: 2px solid #fff;}
    .btn-menu:hover{background-color: #FFE500;color:#000;border: 2px solid #FFE500;transition: all 0.2s ease-in-out 0s;}
    .sub-title {color: #FA9000;font-family: helvetica-neue-heavy-condObl;font-size: 35px;margin: 12px 0;}
    .btn-menu.active {background-color: #FFE500;color: #000;border: 2px solid #FFE500;transition: all 0.2s ease-in-out 0s;}
    .menu {margin-bottom: 20px;}
  </style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/banner-pilas-auditivas.jpg" alt="Energizer Pilas auditivas">
<div class="background-black" style="padding: 0;margin-top: -11px;">
  <div class="content">
    <center>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4  style="margin-bottom:0px;" class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 style="margin-bottom: 0px;" class="btn-menu "><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Especiales</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-auditivas-energizer"><h4 style="margin-bottom: 0px;" class="btn-menu active"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Auditivas</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-recargables-energizer"><h4 style="margin-bottom: 0px;" class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Línea recargable</h4></a>
    </center>
    <div class="lista" style="font-size: 17px;margin-top: 30px;line-height: 22px;">
      <p>* Perfectas para los Aparatos de Oído Inteligentes.</p>
      <p>* Desempeño de Larga Duración y protege los aparatos contra derrame.</p>
      <p>* Equipo para audiología.</p>
    </div>
    <img style="width: 90%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-675.png" alt="Pilas auditivas 675">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21137)) ?>">
      <img class="btn-compra" style="width: 80%;margin: 0 auto;display: block;"src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
    <img style="width: 90%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-az10.png" alt="Pilas auditivas az10">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21132)) ?>">
      <img class="btn-compra"style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
    <img style="width: 90%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-az13.png" alt="Pilas auditivas az13">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21134)) ?>">
      <img class="btn-compra"style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
    <img style="width: 90%;margin: 35px auto 0;display: block;"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-az312.png" alt="Pilas auditivas az312">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21136)) ?>">
      <img class="btn-compra" style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
  </div>
</div>
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/banner-pilas-auditivas.jpg" alt="Energizer Pilas auditivas">
<div class="container-fluid background-black" style="padding: 0;">
  <div class="content">
    <div class="menu">
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas especiales</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-auditivas-energizer"><h4 class="btn-menu active"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Auditivas</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-recargables-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Línea recargable</h4></a>
    </div>
    <p><span class="first-title">Energizer</span><span class="sub-title"> Pilas auditivas</span></p>
    <div class="lista">
      <p>* Perfectas para los Aparatos de Oído Inteligentes.</p>
      <p>* Desempeño de Larga Duración y protege los aparatos contra derrame.</p>
      <p>* Equipo para audiología.</p>
    </div>
    <div class="row" style="margin-top: 50px;">
      <div class="col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-675.png" alt="Pilas auditivas 675">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21137)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-az10.png" alt="Pilas auditivas az10">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21132)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-az13.png" alt="Pilas auditivas az13">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21134)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-auditivas/pilas-auditivas-az312.png" alt="Pilas auditivas az312">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21136)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
    </div>
  </div>
  <img class="img-responsive fot-product" style="padding: 0;margin-bottom: 50px;display:inline-block" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/fot-products.jpg">
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
