<?php $this->pageTitle = "Pilas Especiales Energizer - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Energizer® Pilas Especializadas la más elegida por consumidores del mundo, perfectas para aparatos de hogar inteligentes y salud inteligentes.'>
  <meta name='keywords' content='Pilas energizer, pilas de botón, pilas y baterias.'>
	<style>
    @font-face { font-family:helvetica-neue-heavy; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy.otf);}
    @font-face { font-family:helvetica-neue-heavy-condObl; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy-condObl.otf);}
    @font-face { font-family:omnes; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/omnes.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .background-black {background-color:#000;}
    .content {padding: 0 10%;}
    .first-title {color:#FFE500;font-family:helvetica-neue-heavy-condObl;font-size: 68px;margin:6px 0;}
    .background-black .content h2 {color:#FFF;font-family:helvetica-neue-heavy-condObl;font-size: 21px;margin:6px 0;}
    .background-black .content h3 {color:#FA9000;font-family:helvetica-neue-heavy;font-size: 35px;margin: 12px 0; }
    .lista {color: #E9E9E6;font-size: 19px;margin-top: 30px;font-family:helvetica-neue-heavy; line-height: 35px;}
    .usos {font-family:helvetica-neue-heavy;color:#DFDFDC;font-size: 18px;}
    .text-bg-yellow {z-index: 5;position: absolute;margin-top: 16px;font-family: helvetica-neue-heavy-condObl;font-size: 24px;color: #000;margin: 32px;}
    .text-bg-yellow span {font-size: 32px;}
    .precaucion {font-family:helvetica-neue-heavy;color:#FBDA15;font-size: 25px;margin-top: 27%;}
    .fot-product {margin-top: -20.3%;}
    .btn-compra {margin-top: 20px;}
    .text-foot {color:#fff; text-align:center;font-family:omnes;font-size: 20px;margin-bottom: 30px;margin-top: 40px;}
    .product{width: 77%;margin: 0 auto;}
    .space-1 {height: 0px !important;}
    .block-yellow {position: absolute;left: 0;margin-top: 16%;width: 33%;margin-top: 14.3%;}
    .img-responsive-movil {width:100%;}
    .btn-menu{font-family: helvetica-neue-heavy;background-repeat: no-repeat;display: inline-block;padding: 15px 25px;background-size: 100% 100%;color: #FFE500;border: 2px solid #fff;}
    .btn-menu:hover{background-color: #FFE500;color:#000;border: 2px solid #FFE500;transition: all 0.2s ease-in-out 0s;}
    .sub-title {color: #FA9000;font-family: helvetica-neue-heavy-condObl;font-size: 35px;margin: 12px 0;}

</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/banner.jpg" alt="Energizer max porwer seal">
<div class="background-black" style="padding: 0;margin-top: -11px;">
  <div class="content">
    <center>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4  style="margin-bottom:0px;" class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Especiales</h4></a>

    </center>
    <div class="lista" style="font-size: 17px;margin-top: 30px;line-height: 22px;">
      <p>* Tamaño más pequeño, menor consumo de energía.</p>
      <p>* Perfecta para aparatos de hogar inteligentes y salud inteligente.</p>
      <p>* Energizer pilas especializadas la más elegida por consumidores en el mundo.</p>
      <p>* Pequeñas en tamaño grandes en poder.</p>
      <p>* Protege sus equipos de las fugas hasta 2 años después del agotamiento total.</p>
    </div>

    <img style="width: 70%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/CR2032.png" alt="CR2032">
    <p class="usos" style="text-align:center;margin: 0;">Usos recomendados:</p>
    <img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-CR2032.png" alt="CR2032">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21130)) ?>">
      <img class="img-responsive-movil btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>

    <img style="width: 70%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/A23.png" alt="A23">
    <p class="usos" style="text-align:center;margin: 0;">Usos recomendados:</p>
    <img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-A23.png" alt="A23">
    <a href="#">
      <img class="img-responsive-movil btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>

    <img style="width: 70%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/CR2025.png" alt="CR2025">
    <p class="usos" style="text-align:center;margin: 0;">Usos recomendados:</p>
    <img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-CR2025.png" alt="CR2025">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21129)) ?>">
      <img class="img-responsive-movil btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>

    <img style="width: 70%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/CR2016.png" alt="CR2016">
    <p class="usos" style="text-align:center;margin: 0;">Usos recomendados:</p>
    <img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-CR2016.png" alt="CR2016">
    <a href="#">
      <img class="img-responsive-movil btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>

    <img style="width: 70%;margin: 35px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/A76.png" alt="A76">
    <p class="usos" style="text-align:center;margin: 0;">Usos recomendados:</p>
    <img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-A76.png" alt="A76">
    <a href="#">
      <img class="img-responsive-movil btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
    </a>
    <p class="text-foot" style="font-size: 12px;padding-bottom: 30px;margin-bottom: 0;">
      *Del derrame de las pilas usadas hasta 2 años. <br>
      *En comparación con Energizer Max anterior en la prueba de DSC (Cámara Digital Fija) de la norma ANSI.
    </p>
  </div>
</div>
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/banner-pilas-especiales.jpg" alt="Energizer Pilas especiales">
<div class="container-fluid background-black" style="padding: 0;">
  <div class="content">
    <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas especiales</h4></a>

    <p><span class="first-title">Energizer</span><span class="sub-title"> Pilas especiales</span></p>
    <div class="lista">
      <p>* Tamaño más pequeño, menor consumo de energía.</p>
      <p>* Perfecta para aparatos de hogar inteligentes y salud inteligente.</p>
      <p>* Energizer pilas especializadas la más elegida por consumidores en el mundo.</p>
      <p>* Pequeñas en tamaño grandes en poder.</p>
      <p>* Protege sus equipos de las fugas hasta 2 años después del agotamiento total.</p>
    </div>

    <div class="row" style="margin-top: 50px;">
      <div class="col-sm-4 col-md-4" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/CR2032.png" alt="CR2032">
        <p class="usos">Usos recomendados:</p>
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-CR2032.png" alt="CR2032">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21130)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-4 col-md-4" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/A23.png" alt="A23">
        <p class="usos">Usos recomendados:</p>
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-A23.png" alt="A23">
        <a href="#">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-4 col-md-4" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/CR2025.png" alt="CR2025">
        <p class="usos">Usos recomendados:</p>
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-CR2025.png" alt="CR2025">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 21129)) ?>">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-12" style="padding: 0;">
    <img class="img-responsive fot-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/fot-products.jpg">
  </div>
<div class="content">
    <div class="row" style="margin-top: 35px;">
      <div class="col-sm-2 col-md-2"></div>
      <div class="col-sm-4 col-md-4" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/CR2016.png" alt="CR2016">
        <p class="usos">Usos recomendados:</p>
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-CR2016.png" alt="CR2016">
        <a href="#">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-4 col-md-4" style="z-index:100;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/A76.png" alt="A76">
        <p class="usos">Usos recomendados:</p>
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/pilas-especiales/iconos-A76.png" alt="A76">
        <a href="#">
          <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
        </a>
      </div>
      <div class="col-sm-2 col-md-2"></div>
    </div>
  </div>
  <div class="col-md-12" style="padding: 0;">
    <img class="img-responsive fot-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/fot-products.jpg">
  </div>
  <div class="content">
    <p class="text-foot">
      *Del derrame de las pilas usadas hasta 2 años. <br>
      *En comparación con Energizer Max anterior en la prueba de DSC (Cámara Digital Fija) de la norma ANSI.
    </p>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
