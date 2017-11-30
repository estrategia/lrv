<?php $this->pageTitle = "Energizer línea recargable - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Las pilas recargables Energizer® AA brindan energía recargable de alto rendimiento y mantienen la carga hasta 1 año y pueden ser recargadas cientos de veces.'>
  <meta name='keywords' content='Pilas energizer, pilas AA, pilas recargables.'>
	<style>
    @font-face { font-family:helvetica-neue-heavy; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy.otf);}
    @font-face { font-family:helvetica-neue-heavy-condObl; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy-condObl.otf);}
    @font-face { font-family:omnes; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/omnes.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .background-black {background-color:#000;}
    .content {padding:0 10% 50px;}
    .first-title {color:#FFE500;font-family:helvetica-neue-heavy-condObl;font-size: 41px;margin: 25px 0 5px;}
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
    .menu {margin-bottom: 42px;}
  </style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/banner-pilas-recargables.jpg" alt="Energizer Pilas recargables">
<div class="background-black" style="padding: 0;margin-top: -11px;">
  <div class="content">
    <center>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4  style="margin-bottom:0px;" class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 style="margin-bottom: 0px;" class="btn-menu "><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Especiales</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-auditivas-energizer"><h4 style="margin-bottom: 0px;" class="btn-menu "><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Auditivas</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-recargables-energizer"><h4 style="margin-bottom: 0px;" class="btn-menu active"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Línea recargable</h4></a>
    </center>
    <div class="lista" style="font-size: 17px;margin-top: 30px;line-height: 22px;">
      <ul>
        <li>Las Pilas Energizer Recargables Universal Tipo AA y AAA ahora contiene materiales de baterías recicladas.</li>
        <li>Se mantiene cargada hasta 1 año en almacenamiento.</li>
        <li>Primer Pila Recargable AA en el Mundo fabricada con baterías recicladas 4% baterías recicladas.</li>
        <li>Larga Duración.</li>
        <li>Carga hasta 1000 ciclos.</li>
        <li>Calidad, Confiabilidad.</li>
        <li>Responder en cualquier situación.</li>
        <li>Tiene una vida útil hasta de 5 años.</li>
      </ul>
    </div>
    <img style="width: 90%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-aa2.png" alt="Recargables AA2">
    <h3 style="color: #fff;font-size: 15px;margin: 0px auto 15px;text-align: center;">Pila Energizer recargable AA2</h3>
    <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 18654)) ?>">
      <img class="btn-compra" style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
    <img style="width: 90%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-aaa2.png" alt="Recargables AAA2">
    <h3 style="color: #fff;font-size: 15px;margin: 0px auto 15px;text-align: center;">Pila Energizer recargable AAA2</h3>
    <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 18656)) ?>">
      <img class="btn-compra" style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
    <img style="width: 90%;margin: 35px auto 0;display: block;"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-mini.png" alt="Recargables mini">
    <h3 style="color: #fff;font-size: 15px;margin: 0px auto 15px;text-align: center;">Cargador Energizer mini</h3>
    <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 18660)) ?>">
      <img class="btn-compra" style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
    <!-- <img  style="width: 90%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-maxi.png" alt="Recargables maxi">
    <a data-ajax="false" href="#">
      <img class="btn-compra" style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a> -->
  </div>
</div>
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/banner-pilas-recargables.jpg" alt="Energizer Pilas recargables">
<div class="container-fluid background-black" style="padding: 0;">
  <div class="content">
    <div class="menu">
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas especiales</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-auditivas-energizer"><h4 class="btn-menu "><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Auditivas</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-recargables-energizer"><h4 class="btn-menu active"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Línea recargable</h4></a>
    </div>
    <p style="margin-top: 20px;line-height: 30px;"><span class="first-title">Energizer, Líder en la Categoría de Recargables, <br>ofrece una línea completa de Pilas  y Cargadores.</span></p>
    <h2 style="color: #FA9000;">¡La Innovación en Recargables que los Consumidores desean!</h2>
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <div class="lista">
          <ul style="padding-inline-start: 5px;">
            <li>Las Pilas Energizer Recargables Universal Tipo AA y AAA ahora contiene materiales de baterías recicladas.</li>
            <li>Se mantiene cargada hasta 1 año en almacenamiento.</li>
            <li>Primer Pila Recargable AA en el Mundo fabricada con baterías recicladas 4% baterías recicladas.</li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
        <div class="lista">
          <ul>
            <li>Larga Duración.</li>
            <li>Carga hasta 1000 ciclos.</li>
            <li>Calidad, Confiabilidad.</li>
            <li>Responder en cualquier situación.</li>
            <li>Tiene una vida útil hasta de 5 años.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-offset-1 col-sm-offset-3 col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-aa2.png" alt="Recargables AA2">
        <h3 style="color: #fff;font-size: 15px;margin: 0 auto;text-align: center;">Pila Energizer recargable AA2</h3>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 18654)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-aaa2.png" alt="Recargables AAA2">
        <h3 style="color: #fff;font-size: 15px;margin: 0 auto;text-align: center;">Pila Energizer recargable AAA2</h3>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 18656)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-mini.png" alt="Recargables mini">
        <h3 style="color: #fff;font-size: 15px;margin: 0 auto;text-align: center;">Cargador Energizer mini</h3>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 18660)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <!-- <div class="col-sm-3 col-md-3" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-recargables/recargable-maxi.png" alt="Recargables maxi">
        <a href="#">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div> -->
    </div>
  </div>
  <img class="img-responsive fot-product" style="padding: 0;margin-bottom: 50px;display:inline-block" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/fot-products.jpg">
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
