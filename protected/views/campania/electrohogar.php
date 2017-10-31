
<?php $this->pageTitle = "ElectroHogar | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
  	<style>
      .margin{margin: 15px 0;}
      .margin-m {
    margin: 5px 10px;
}
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
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/banner-mobile.jpg" alt="ElectroHogar - Nueva lìnea de productos">

<div class="ui-grid-a">
    <div class="ui-block-a">
      <div class="margin-m">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 692)) ?>">
          <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/licuar-mezclar.jpg" alt="Licuar - mezclar">
        </a>
      </div>
    </div>
    <div class="ui-block-b">
      <div class="margin-m">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 693)) ?>">
          <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/cocinar.jpg" alt="Cocinar">
        </a>
      </div>
    </div>
</div>

<div class="ui-grid-a">
    <div class="ui-block-a">
      <div class="margin-m">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 694)) ?>">
          <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/bebidas.jpg" alt="Bebidas">
        </a>
      </div>
    </div>
    <div class="ui-block-b">
      <div class="margin-m">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
          <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/accesorios.jpg" alt="Accesorios">
        </a>
      </div>
    </div>
</div>

<center>
  <div class="margin-m">
    <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 695)) ?>">
      <img  style="width:50%;" class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/aire.jpg" alt="Aire">
    </a>
  </div>
</center>

<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/banner.gif" alt="ElectroHogar - Nueva lìnea de productos">
<div class="container">
  <div class="row menu">
      <div class="col-md-2 col-md-offset-1" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 692)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/ico-licuar-mezclar.png" alt="Licuar y mezclar">
          <strong>Licuar y Mezclar</strong>
        </a>
      </div>
      <div class="col-md-2" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 693)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/ico-cocinar.png" alt="Cocinar">
          <strong>Cocinar</strong>
        </a>
      </div>
      <div class="col-md-2" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 694)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/ico-bebidas.png" alt="Bebidas">
          <strong>Bebidas</strong>
        </a>
      </div>
      <div class="col-md-2" style="border-right: 4px solid;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/ico-accesorios.png" alt="Accesorios">
          <strong>Accesorios</strong>
        </a>
      </div>
      <div class="col-md-2" style="width:21.667%;">
        <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 695)) ?>">
          <img class="img-responsive" style="width: 52%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/ico-aire.png" alt="Aire">
          <strong>Otros productos - Aire</strong>
        </a>
      </div>
  </div>
  <div class="row margin">
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 692)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/licuar-mezclar.jpg" alt="Licuar - mezclar"></a></div>
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 693)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/cocinar.jpg" alt="Cocinar"></a></div>
  </div>
  <div class="row margin">
    <div class="col-md-12">
      <a href="#"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/comprar-online.png" alt="Comprar online"></a>
    </div>
  </div>
  <div class="row margin">
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 694)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/bebidas.jpg" alt="Bebidas"></a></div>
    <div class="col-sm-6 col-md-6"><a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 667)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/accesorios.jpg" alt="Accesorios"></a></div>
  </div>
  <div class="row">
    <center>
      <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => 695)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/electrohogar/aire.jpg" alt="Aire"></a>
    </center>
  </div>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
