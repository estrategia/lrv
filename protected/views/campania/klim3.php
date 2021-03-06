<?php $this->pageTitle = "Klim 3+ fortilearn - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='El Alimento Lácteo Klim 3+ FortiLearn contiene nutrientes que contribuyen al desarrollo cognitivo de los niños entre 3 y 5 años. Conozca más información aquí'>
  <meta name='keywords' content='nestle klim 3+, klim 3+ fortilearn, alimento lácteo klim 3+, klim 3+.'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/ky/fonts/MyriadPro.otf);}
    @font-face {font-family:NewJune-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/chococono/fonts/NewJune-Bold.otf);}
    @font-face {font-family:VAGRoundedStd-Black;src: url(".Yii::app()->request->baseUrl."/images/contenido/klim3/fonts/VAGRoundedStd-Black.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .img-responsive-m {width:100%;}
    .button-desplegable .icon2 {position: relative;width: 100px;height: 100px;-webkit-transition: .2s color;-o-transition: .2s color;transition: .2s color;z-index: 2;}
    .button-desplegable .text2 {display: none;margin-top: -7px;position: absolute;z-index: 1;}
    .button-desplegable:hover .text2 {width: 165px;display: block;-webkit-animation: appearRight .5s ease-out both ;animation: appearRight .5s ease-out both ;margin-top: -93px;}
    @-webkit-keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    @keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(-45%);transform: translateX(-45);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    .space-1 {height: 0px !important;}
    .bg-klim {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim3/background.png);background-size: 100%;}
    .bg-nube{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim3/nube.png);background-repeat: no-repeat;background-size: 22%;background-position: left 34%;}
    .txt-intro {color: #006325;font-family: VAGRoundedStd-Black;font-size: 30px;position: absolute;top: -365px;}
    .section-videos {margin-top: -44%;margin-bottom: 70px;}
    .bg-verde {background-color:#9dc02d;padding: 90px 20px 20px;}
    .bg-blanco {background-color:#f0e5dc;padding: 90px 20px 20px;}
    .title-video {margin-top: -130px;z-index: 1;width: 290px;margin-bottom: 20px;}
    .embed-container {position: relative;padding-bottom: 56.25%;height: 0;overflow: hidden;}
    .embed-container iframe {position: absolute;top:0;left: 0;width: 100%;height: 100%;}
    footer {position: absolute;}
    .btn-conoce-mas {margin: 0 auto 0px;width: 235px;}
    @font-face {font-family:VAGRoundedStd-Light ;src: url(".Yii::app()->request->baseUrl."/images/contenido/klim1/font/VAGRoundedStd-Light.otf);}
    .descripcion {position: absolute;color: #fff;right: 0;margin-right: 11%;margin-top: 22%;font-size: 19px;font-family:VAGRoundedStd-Light ;}
    .descripcion sup {top: -0.9em;font-size: 65%;}
    .descripcion span {font-family: VAGRoundedStd-Black;font-size:25px;letter-spacing:1px;}
    .proceso {display:flex;width:40%;margin: 0 50%;align-items: center;}
    .proceso .precios , .proceso .compra{width:50%;}
     {width:50%;}
    .compra img {width:90%;}
    .precioproductos-antes{text-decoration: line-through;color: #049541;font-family: VAGRoundedStd-Black;margin: 25px auto 0;font-size: 25px;line-height: 25px;}
    .precioproductos{color: #049541;font-size: 30px;font-family: VAGRoundedStd-Black;margin: 0px;line-height: 30px;}
    @media (min-width: 1500px) and (max-width: 1799px){
      .txt-intro{top: -469px;font-size: 36px;}
      .section-videos {margin-bottom: 80px;}
      .descripcion  {margin-right: 11%;font-size: 24px;}
    }
    @media (min-width: 1800px) and (max-width: 1920px){
      .txt-intro {top: -485px;font-size: 36px;}
      .section-videos {margin-bottom: 80px;margin-top: -44%;}
      .descripcion {margin-right: 9%;font-size: 27px;}
    }
    .bg-nube-m{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim3/nube-movil.png);background-repeat: no-repeat;background-size: 35%;background-position: left 41%;}
    .container p {position:absolute !important;}
  </style>
  ";
?>
<!--Consulta el precio de los productos-->
<?php $klim3 = Producto::consultarPrecio('47111', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div class="bg-klim">
  <div class="bg-nube-m">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/intro-movil.png" alt="">
    <p class="precioproductos-antes" style="margin: 0;text-align: center;">ANTES:  <?= ($klim3 == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim3["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    <p class="precioproductos" style="margin-bottom:20px;text-align: center;">AHORA: <?= ($klim3 == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim3["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
    <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3947)) ?>">
      <img width="200" style="margin:0 auto;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
    </a>
    <div class="descripcion" style="font-size: 16px;margin: 107% 13%;">
          <p><span style="font-size: 18px;">KLIM<sup>&reg;</sup> 3+ FORTILEARN<sup>&reg;</sup></span> es un Alimento Lácteo instantáneo
          en polvo que tiene Prebio 3, Hierro, Zinc, Magnesio y vitaminas que
          contribuyen al normal desarrollo cerebral en los niños entre 3 y 5 años. <br>
        </p>
        <p>Prebio 3, es una mezcla exclusiva de <span style="font-size: 18px;">NESTLÉ<sup>&reg;</sup></span>, con ácidos grasos
          esenciales EFA (Essential Fatty Acid), calcio y fibras prebióticas (inulina
          y oligofructosa) que contribuyen al adecuado crecimiento, desarrollo
          intelectual y físico.
        </p>
    </div>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/content-movil.png" alt="Prebio 3 el aliado de tu hijo">
  </div>
  <div class="bg-verde" style="padding: 0px 20px 20px;margin-top: -50px;z-index: 10;position: absolute;">
    <img class="img-responsive-m" style="margin-top: -51px;margin-bottom: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/recetas.png" alt="">
    <div class="embed-container">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/PALps6VxQBQ?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
  <div class="bg-blanco" style="margin-top: 285px;padding: 0px 20px 20px;">
    <img class="img-responsive-m" style="margin-top: -51px;margin-bottom: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/desarrollo.png" alt="">
    <div class="embed-container">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/aiE1QhwJjWc?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</div>
<!--Versión escritorio-->
<?php else: ?>
<!-- <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3947)) ?>">
  <div class="sidebar-cart">
    <div class="button-desplegable">
      <div class='icon2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/circle.png" alt=""></div>
      <div class='text2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/line-circle.png" alt=""></div>
    </div>
  </div>
</a> -->
<div class="bg-klim">
  <div class="bg-nube">
    <div class="container-fluid">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/klim-intro.png" alt="">
      <div class="proceso">
        <div class="precios">
          <p class="precioproductos-antes">ANTES:  <?= ($klim3 == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim3["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
          <p class="precioproductos">AHORA: <?= ($klim3 == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim3["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        </div>
        <div class="compra">
          <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3947)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt=""></a>
        </div>
      </div>
      <div class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <p class="txt-intro">Contiene nutrientes que <br> contribuyen al normal <br> desarrollo cognitivo:</p>
      </div>
    </div>
    <div class="descripcion">
          <p><span>KLIM<sup>&reg;</sup> 3+ FORTILEARN<sup>&reg;</sup></span> es un Alimento Lácteo instantáneo <br>
          en polvo que tiene Prebio 3, Hierro, Zinc, Magnesio y vitaminas que <br>
          contribuyen al normal desarrollo cerebral en los niños entre 3 y 5 años. <br>
        </p>
        <p>Prebio 3, es una mezcla exclusiva de <span>NESTLÉ<sup>&reg;</sup></span>, con ácidos grasos <br>
          esenciales EFA (Essential Fatty Acid), calcio y fibras prebióticas (inulina <br>
          y oligofructosa) que contribuyen al adecuado crecimiento, desarrollo <br>
          intelectual y físico.
        </p>
    </div>
    <img class="img-responsive" style="margin-top: 50px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/prebio.png" alt="Prebio 3 el aliado de tu hijo">
    <div class="container-fluid section-videos">
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="bg-verde">
            <center><img class="img-responsive title-video" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/recetas.png" alt=""></center>
            <div class="embed-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/PALps6VxQBQ?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="bg-blanco">
            <center><img class="img-responsive title-video" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim3/desarrollo.png" alt=""></center>
            <div class="embed-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/aiE1QhwJjWc?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
