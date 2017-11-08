<?php $this->pageTitle = "Energizer PowerSeal- La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Energizer® MAX® con Power Seal Technology dura hasta un 30% más y mantiene su carga hasta por 10 años, proporcionando una larga vida útil.'>
  <meta name='keywords' content='Pilas energizer, pilas AA, pilas AAA.'>
	<style>
    @font-face { font-family:helvetica-neue-heavy; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy.otf);}
    @font-face { font-family:helvetica-neue-heavy-condObl; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/helvetica-neue-heavy-condObl.otf);}
    @font-face { font-family:omnes; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/energizer/fonts/omnes.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .background-black {background-color:#000;}
    .content {padding: 0 10%;}
    .background-black .content h1 {color:#FFE500;font-family:helvetica-neue-heavy-condObl;font-size: 68px;margin:6px 0;margin-top:20px;}
    .background-black .content h2 {color:#FFF;font-family:helvetica-neue-heavy-condObl;font-size: 21px;margin:6px 0;}
    .background-black .content h3 {color:#FA9000;font-family:helvetica-neue-heavy;font-size: 35px;margin: 12px 0; }
    .lista {color: #E9E9E6;font-size: 20px;margin-top: 60px;font-family:helvetica-neue-heavy; line-height: 35px;}
    .usos {font-family:helvetica-neue-heavy;color:#DFDFDC;font-size: 25px;margin-top: 14%;}
    .text-bg-yellow {z-index: 5;position: absolute;margin-top: 16px;font-family: helvetica-neue-heavy-condObl;font-size: 24px;color: #000;margin: 32px;}
    .text-bg-yellow span {font-size: 32px;}
    .precaucion {font-family:helvetica-neue-heavy;color:#FBDA15;font-size: 25px;margin-top: 27%;}
    .fot-product {margin-top: -10.3%;}
    .btn-compra {margin: 25px 50px;}
    .text-foot {color:#fff; text-align:center;font-family:omnes;font-size: 20px;margin-bottom: 30px;}
    .product{width: 77%;margin: 0 auto;}
    .space-1 {height: 0px !important;}
    .block-yellow {position: absolute;left: 0;margin-top: 16%;width: 33%;margin-top: 14.3%;}
    .img-responsive-movil {width:100%;}
    .btn-menu{font-family: helvetica-neue-heavy;background-repeat: no-repeat;display: inline-block;padding: 15px 25px;background-size: 100% 100%;color: #FFE500;border: 2px solid #fff;}
    .btn-menu:hover{background-color: #FFE500;color:#000;border: 2px solid #FFE500;transition: all 0.2s ease-in-out 0s;}
    .btn-menu.active {background-color: #FFE500;color: #000;border: 2px solid #FFE500;transition: all 0.2s ease-in-out 0s;}
    .menu {margin-bottom: 20px;}
    @media (min-width: 1100px) and (max-width: 1199px) {
      .background-black .content h1 {font-size: 45px;}
      .background-black .content h2 {font-size: 33px;}
      .background-black .content h3 {font-size: 27px;}
      .btn-compra {margin: 20px 0px;}
      .usos {margin-top: 0%;}
      .text-bg-yellow {font-size: 14px;}
      .text-bg-yellow span {font-size: 19px;}
      .precaucion {font-size: 18px;margin-top: 34%;}
    }
    @media (min-width: 1200px) and (max-width: 1299px) {
      .background-black .content h1 { font-size: 49px;}
      .background-black .content h2 {font-size: 33px;}
      .background-black .content h3 {font-size: 27px;}
      .block-yellow {margin-top: 13.2%;}
      .btn-compra {margin: 20px 0px;}
      .usos {margin-top: 0%;}
      .text-bg-yellow {font-size: 14px;}
      .text-bg-yellow span {font-size: 15px;}
      .precaucion {font-size: 18px;margin-top: 34%;}
      .lista {font-size: 22px;margin-top: 29px;}
    }
    @media (min-width: 1300px) and (max-width: 1399px) {
      .background-black .content h1 { font-size: 51px;}
      .background-black .content h3 {font-size: 27px;}
      .block-yellow {margin-top: 13.2%;}
      .btn-compra {margin: -20px 0px;padding: 30px 37px;}
      .usos {margin-top: 0%;}
      .text-bg-yellow {font-size: 16px;}
      .text-bg-yellow span {font-size: 22px;}
      .precaucion {font-size: 18px;margin-top: 34%;}
      .lista {font-size: 19px;margin-top: 29px;}
      .fot-product { margin-top: -10.3%;}
    }
    @media (min-width: 1400px) and (max-width: 1500px) {
      .background-black .content h1 { font-size: 53px;}
      .background-black .content h3 {font-size: 27px;}
      .block-yellow {margin-top: 13.2%;}
      .btn-compra {margin: -20px 0px;padding: 30px 37px;}
      .usos {margin-top: 0%;}
      .text-bg-yellow {font-size: 16px;margin: 38px;}
      .text-bg-yellow span {font-size: 22px;}
      .precaucion {font-size: 18px;margin-top: 34%;}
      .lista {font-size: 19px;margin-top: 29px;}
      .fot-product {margin-top: -9.3%;}
    }
    @media (min-width: 1501px) and (max-width: 1600px) {
      .background-black .content h1 { font-size: 50px;}
      .background-black .content h2 {font-size: 24px;}
      .background-black .content h3 {font-size: 27px;}
      .block-yellow {margin-top: 13.2%;}
      .btn-compra {margin: -20px 0px;padding: 30px 37px;}
      .usos {margin-top: 0%;}
      .text-bg-yellow {font-size: 16px;margin: 38px;}
      .text-bg-yellow span {font-size: 22px;}
      .precaucion {font-size: 18px;margin-top: 34%;}
      .lista {font-size: 20px;margin-top: 29px;}
      .fot-product {margin-top: -9.3%;}
    }
    @media (min-width: 1601px) and (max-width: 1700px) {
      .background-black .content h1 { font-size: 65px;}
      .background-black .content h2 {font-size: 25px;}
      .background-black .content h3 {font-size: 30px;}
      .block-yellow {margin-top: 12.2%;}
      .btn-compra {margin: -20px 0px;padding: 30px 37px;}
      .usos {margin-top: 0%;}
      .text-bg-yellow {font-size: 16px;margin: 38px;}
      .text-bg-yellow span {font-size: 22px;}
      .precaucion {font-size: 18px;margin-top: 34%;}
      .lista {font-size: 20px;margin-top: 29px;}
      .fot-product {margin-top: -9.3%;}
    }
    @media (min-width: 1701px) and (max-width: 1800px) {
      .background-black .content h1 { font-size: 69px;}
      .background-black .content h2 {font-size: 27px;}
      .background-black .content h3 {font-size: 32px;}
      .block-yellow {margin-top: 12.2%;}
      .btn-compra {margin: -20px 0px;padding: 30px 37px;}
      .usos {margin-top: 0%;}
      .text-bg-yellow {font-size: 22px;margin: 45px;}
      .text-bg-yellow span {font-size: 27px;}
      .precaucion {font-size: 18px;margin-top: 34%;}
      .lista {font-size: 20px;margin-top: 29px;}
      .fot-product {margin-top: -9.3%;}
    }
</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/banner.jpg" alt="Energizer max porwer seal">
<div class="background-black" style="padding: 0;margin-top: -11px;">
  <div class="content">
    <center>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4 class="btn-menu active"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas especiales</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-auditivas-energizer"><h4 class="btn-menu "><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Auditivas</h4></a>
      <a href="<?= Yii::app()->request->baseUrl ?>/pilas-recargables-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Línea recargable</h4></a>
    </center>
    <h1 class="first-title" style="font-size: 27px;">Energizer max AA con tecnología PowerSeal plus</h1>
    <h2 style="font-size: 19px;letter-spacing: 1px;">significa que puedes estar seguro de que siempre tendrás energía cuando más la necesitas.</h2>
    <!-- <h3 style="font-size: 16px;">¡Energizer se enorgullece en presentar Power Seal Technology!</h3> -->
    <div class="lista" style="font-size: 17px;margin-top: 30px;line-height: 22px;">
      <ul>
        <li>La tecnología PowerSeal guarda la energía hasta por 10 años*** en almacenamiento.</li>
        <li>Ahora con hasta 30% de mayor duración* que las Energizer Max anteriores en cámaras digitales.</li>
        <li>Protege sus equipos** de las fugas hasta 2 años después del agotamiento total.</li>
      </ul>
    </div>
    <p class="usos">Usos recomendados:</p>
    <img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/usos.png" alt="Usos">
    <p class="text-bg-yellow" style="font-size: 20px;margin: 31px 0px;">Primeras pilas alcalinas AA y AAA <br> <span style="font-size: 27px;">Sin mercurio del mundo</span></p>
    <img class="block-yellow" style="width: 95%;height: 75px;margin-top: -35.7%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/bg-yellow.jpg">
    <center>
      <img class="img-responsive-movil" style="margin-top20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/aa2.png" alt="AA2 Energizer Max PowerSeal">
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15620)) ?>">
        <img style="width: 90%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
      </a>
      <img class="img-responsive product" style="margin-top: 40px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/aaa2.png" alt="AA2 Energizer Max PowerSeal">
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15621)) ?>">
        <img style="width: 90%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
      </a>
    </center>
    <p class="text-foot" style="font-size: 12px;padding-bottom: 30px;margin-bottom: 0;">
      * En comparación con Energizer Max anterior en la prueba de DSC (Cámara Digital Fija) de la norma ANSI. <br>
      ** Del derrame de las pilas usadas hasta 2 años.  <br>
      *** Vida de anaquel.  </p>
  </div>
</div>
<!---FIN VERSIÓN MÓVIL-->

<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/banner.jpg" alt="Energizer max porwer seal">
<div class="container-fluid background-black" style="padding: 0;">
  <div class="content">
    <a href="<?= Yii::app()->request->baseUrl ?>/pilas-energizer"><h4 class="btn-menu active"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas PowerSeal</h4></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/pilas-especiales-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Especiales</h4></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/pilas-auditivas-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Pilas Auditivas</h4></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/pilas-recargables-energizer"><h4 class="btn-menu"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Línea recargable</h4></a>
    <h1 class="first-title">Energizer max AA con tecnología PowerSeal plus</h1>
    <h2>significa que puedes estar seguro de que siempre tendrás energía cuando más la necesitas.</h2>
    <div class="lista" style="margin-bottom: 55px;">
      <ul>
        <li>La tecnología PowerSeal guarda la energía hasta por 10 años*** en almacenamiento.</li>
        <li>Ahora con hasta 30% de mayor duración* que las Energizer Max anteriores en cámaras digitales.</li>
        <li>Protege sus equipos** de las fugas hasta 2 años después del agotamiento total.</li>
      </ul>
    </div>
    <div class="col-sm-4 col-md-4">
      <p class="usos">Usos recomendados:</p>
      <img class="img-responsive" style="margin-top: 30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/usos.png" alt="Usos">
      <p class="text-bg-yellow">Primeras pilas alcalinas AA y AAA <br> <span>Sin mercurio del mundo</span></p>
    </div>
    <div class="col-sm-4 col-md-4" style="z-index:100;">
      <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/aa2.png" alt="AA2 Energizer Max PowerSeal">
      <h3 style="color: #fff;font-size: 15px;margin: 0 auto 15px;text-align: center;">Pila Energizer alkalina AA</h3>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15620)) ?>">
        <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
      </a>
    </div>
    <div class="col-sm-4 col-md-4" style="z-index:100;">
      <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/aaa2.png" alt="AA2 Energizer Max PowerSeal">
      <h3 style="color: #fff;font-size: 15px;margin: 0 auto 15px;text-align: center;">Pila Energizer alkalina AAA</h3>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15621)) ?>">
        <img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/comprar-online.png" alt="Comprar Online">
      </a>
    </div>
    <img class="block-yellow" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/bg-yellow.jpg">
  </div>
  <div class="col-md-12" style="padding: 0;">
    <img class="img-responsive fot-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/energizer/fot-products.jpg">
  </div>
  <div class="content">
    <p class="text-foot">
      * En comparación con Energizer Max anterior en la prueba de DSC (Cámara Digital Fija) de la norma ANSI. <br>
      ** Del derrame de las pilas usadas hasta 2 años.  <br>
      *** Vida de anaquel.  </p>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
