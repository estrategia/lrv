
<?php $this->pageTitle = "ElectroHogar | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
  	<style>
      .margin{margin: 15px 0;}
      .menu {margin: 45px;text-align: center;}
      .menu .ui-link {text-decoration:none;}
      .menu .col-md-2 {text-align:center;color:#000;}
      .menu strong {color: #000;font-size: 22px;font-family: arial;letter-spacing: -1px;}
      .menu img {width: 72%;margin: 0 auto;}
      .img-responsive-m {width:100%;}
      .producto-m {display: block;width: 40% !important;}
    </style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/banner.gif" alt="ElectroHogar - Nueva lìnea de productos">
    <div class="menu" style="border-bottom: 4px solid;">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
        <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-licuar-mezclar.png" alt="Licuar y mezclar">
        <strong>Licuar y Mezclar</strong>
      </a>
    </div>
    <div class="menu" style="border-bottom: 4px solid;">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 659)) ?>">
        <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-cocinar.png" alt="Cocinar">
        <strong>Cocinar</strong>
      </a>
    </div>
    <div class="menu" style="border-bottom: 4px solid;">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 664)) ?>">
        <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-bebidas.png" alt="Bebidas">
        <strong>Bebidas</strong>
      </a>
    </div>
    <div class="menu" style="border-bottom: 4px solid;">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
        <img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-accesorios.png" alt="Accesorios">
        <strong>Accesorios</strong>
      </a>
    </div>
    <div class="menu" style="border-bottom: 4px solid;">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 668)) ?>">
        <img class="producto-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-aire.png" alt="Aire">
        <strong>Otros productos - Aire</strong>
      </a>
    </div>

    <div class="margin">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/licuar-mezclar.jpg" alt="Licuar - mezclar">
      </a>
    </div>

    <div class="margin">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 659)) ?>">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/cocinar.jpg" alt="Cocinar">
      </a>
    </div>

    <div class=" margin">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/comprar-online.png" alt="Comprar online">
    </div>

    <div class="margin">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 664)) ?>">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/bebidas.jpg" alt="Bebidas">
      </a>
    </div>

    <div class="margin">
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/accesorios.jpg" alt="Accesorios">
      </a>
    </div>

    <center>
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 668)) ?>">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/aire.jpg" alt="Aire">
      </a>
    </center>

<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/banner.gif" alt="ElectroHogar - Nueva lìnea de productos">
<div class="container">
  <div class="row menu">
      <div class="col-md-2 col-md-offset-1" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-licuar-mezclar.png" alt="Licuar y mezclar">
          <strong>Licuar y Mezclar</strong>
        </a>
      </div>
      <div class="col-md-2" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 659)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-cocinar.png" alt="Cocinar">
          <strong>Cocinar</strong>
        </a>
      </div>
      <div class="col-md-2" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 664)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-bebidas.png" alt="Bebidas">
          <strong>Bebidas</strong>
        </a>
      </div>
      <div class="col-md-2" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-accesorios.png" alt="Accesorios">
          <strong>Accesorios</strong>
        </a>
      </div>
      <div class="col-md-2" style="width:21.667%;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 668)) ?>">
          <img class="img-responsive" style="width: 52%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/ico-aire.png" alt="Aire">
          <strong>Otros productos - Aire</strong>
        </a>
      </div>
  </div>
  <div class="row margin">
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/licuar-mezclar.jpg" alt="Licuar - mezclar"></a></div>
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 659)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/cocinar.jpg" alt="Cocinar"></a></div>
  </div>
  <div class="row margin">
    <div class="col-md-12">
      <a href="#"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/comprar-online.png" alt="Comprar online"></a>
    </div>
  </div>
  <div class="row margin">
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 664)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/bebidas.jpg" alt="Bebidas"></a></div>
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/accesorios.jpg" alt="Accesorios"></a></div>
  </div>
  <div class="row">
    <center>
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 668)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electroHogar/aire.jpg" alt="Aire"></a>
    </center>
  </div>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
