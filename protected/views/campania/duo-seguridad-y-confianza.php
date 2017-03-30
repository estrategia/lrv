<?php $this->pageTitle = "Condones DUO Seguridad y confianza - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Los Condones Duo llegan con una nueva imagen y también con nuevas sensaciones para brindarte la mejor experiencia en tus momentos más íntimos. '>
  <meta name='keywords' content='condones duo, preservativos duo, sanamed duo.'>
	<style>
    @font-face { font-family:  graviton-gubiaBlack; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/duo/fonts/graviton-gubiaBlack.otf);}
    @font-face { font-family:Graviton-GubiaBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/duo/fonts/graviton-gubiaBold.otf);}
    @font-face { font-family:graviton-gubiaRegular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/duo/fonts/graviton-gubiaRegular.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .bg-gray {background-color:#F3F3F1;}
    .colum-white {background-color:#fff;border-left: 1px solid #F3F3F1;}
    .colum-black {background-image: url(" . Yii::app()->request->baseUrl . "/images/contenido/duo/bg-general.jpg);padding: 45px 34px !important;}
    .new-image{position: absolute;right: 12%;width: 36%;margin-top: -10%;}
    .producto{margin: 50px 17% 0px;}
    .colum-white:hover .new-image {-webkit-animation-name: pulse;animation-name: pulse;-webkit-animation-duration: 1s;animation-duration: 1s;}
    .item-menu {background-color: #000;color: #fff;display: block;text-align: center;padding: 8px;font-family: Graviton-GubiaBold;font-size: 33px;border-radius: 0px 0px 15px 15px;margin-top: -4px;}
    .item-menu:hover {background-color: #fff;color: #000;border-left: 3px solid #000;border-right: 3px solid #000;border-bottom: 3px solid #000;  transition: all 0.3s ease-in-out 0s;}
    .item-menu.active {background-color: #fff;color: #000;border-left: 3px solid #000;border-right: 3px solid #000;border-bottom: 3px solid #000;}
    a {text-decoration: none;}
    @media (max-width: 1199px){
      .item-menu {font-size: 28px;}
    }
    @-webkit-keyframes pulse {
      from {-webkit-transform: scale3d(1, 1, 1);transform: scale3d(1, 1, 1);}
      50% {-webkit-transform: scale3d(1.05, 1.05, 1.05);transform: scale3d(1.05, 1.05, 1.05);}
      to {-webkit-transform: scale3d(1, 1, 1);transform: scale3d(1, 1, 1);}
    }
    @keyframes pulse {
      from {-webkit-transform: scale3d(1, 1, 1);transform: scale3d(1, 1, 1);}
      50% {-webkit-transform: scale3d(1.05, 1.05, 1.05);transform: scale3d(1.05, 1.05, 1.05);}
      to {-webkit-transform: scale3d(1, 1, 1);transform: scale3d(1, 1, 1);}
     }
     .name-product {color:#fff;text-align:center;font-family:  graviton-gubiaBlack;font-size: 55px;margin: 0px 0px 10px !important;}
     .descrip-product {color:#fff;text-align:center;font-family:graviton-gubiaRegular;font-size: 28px;font-weight: bold;line-height: 32px;}
     .btn-comprar{margin: 30px auto 10px;}
     video {width: 100%    !important;height: auto   !important;margin-top: 15px;}
     .textos-legales{font-family: graviton-gubiaRegular;font-size: 18px;padding: 19px;color:#787876;text-align: justify;}
     .img-responsive-m {width:100%;}
     .producto-m {margin: 0 auto;display: block;}
</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/banner.jpg" alt="Condones DUO">
<div class="container bg-gray">
  <div class="row">
    <div style="padding: 0 15px;margin-bottom: 15px;margin-top: -5px;">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/sensaciones-extremas/line-color.jpg">
      <a href="<?= Yii::app()->request->baseUrl ?>/condones-duo-sensaciones-extremas" data-ajax="false">
        <span class="item-menu" style="margin-top: -5px;">SENSACIONES EXTREMAS</span>
      </a>
    </div>
    <div style="padding: 0 15px;margin-bottom: 15px;">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/maxima-sensacion/line-color.jpg">
      <a href="<?= Yii::app()->request->baseUrl ?>/condones-duo-maxima-sensacion" data-ajax="false">
        <span class="item-menu" style="margin-top: -5px;">MÁXIMA SENSACIÓN</span>
      </a>
    </div>
    <div style="padding: 0 15px;margin-bottom: 15px;">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/line-color.jpg">
      <a href="<?= Yii::app()->request->baseUrl ?>/condones-duo-seguridad-y-confianza" data-ajax="false">
        <span class="item-menu active" style="margin-top: -5px;">SEGURIDAD Y CONFIANZA</span>
      </a>
    </div>
  </div>
  <div style="height:70px;"></div>
  <div class="colum-white">
    <img class="img-responsive new-image" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/nueva-imagen.png">
    <img class="img-responsive producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/duo-lubricado.png">
    <div class="colum-black" style="margin-left: -1px;">
      <h2 class="name-product" style="font-size: 42px;">DUO LUBRICADO</h2>
      <p class="descrip-product">Lubricado y con una superficie lisa para una placentera sensación natural.</p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15759)) ?>" data-ajax="false"><img class="img-responsive-m " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/btn-duo-lubricado.png"></a>
    </div>
  </div>
  <div style="height:70px;"></div>
  <div class="colum-white">
    <img class="img-responsive new-image" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/nueva-imagen.png">
    <img class="img-responsive producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/duo-retardante.png">
    <div class="colum-black" style="margin-left: -1px;">
      <h2 class="name-product" style="font-size: 42px;">DUO RETARDANTE</h2>
      <p class="descrip-product">Un condón más grueso que ayuda a prolongar el placer de ambos. Ideal para los que quieren durar más.</p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15760)) ?>" data-ajax="false"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/btn-duo-retardante.png"></a>
    </div>
  </div>
  <div style="height:20px;"></div>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/line-general.jpg">
      <video width="100%" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/poster-duo-tornado.jpg">
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-tornado.m4v" type="video/m4v">
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-tornado.webm" type="video/webm">
        Your browser does not support HTML5 video.
      </video>
      <video width="100%" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/poster-duo-hot.jpg">
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-hot.m4v" type="video/m4v">
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-hot.webm" type="video/webm">
        Your browser does not support HTML5 video.
      </video>
    <p class="textos-legales">
      <span style="font-weight:bold;color:#000;">Textos legales:</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
      veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
      fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
</div>
<!---FIN VERSIÓN MÓVIL-->

<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<a href="#"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/boton-sticky.png"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/banner.jpg" alt="Condones DUO">
  <div class="container bg-gray">
    <div class="row">
      <div class="col-sm-4 col-md-4" style="padding: 0 25px;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/sensaciones-extremas/line-color.jpg">
        <a href="<?= Yii::app()->request->baseUrl ?>/condones-duo-sensaciones-extremas">
          <span class="item-menu">SENSACIONES EXTREMAS</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-4" style="padding: 0 25px;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/maxima-sensacion/line-color.jpg">
        <a href="<?= Yii::app()->request->baseUrl ?>/condones-duo-maxima-sensacion">
          <span class="item-menu">MÁXIMA SENSACIÓN</span>
        </a>
      </div>
      <div class="col-sm-4 col-md-4" style="padding: 0 25px;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/line-color.jpg">
        <a href="<?= Yii::app()->request->baseUrl ?>/condones-duo-seguridad-y-confianza">
          <span class="item-menu active">SEGURIDAD Y CONFIANZA</span>
        </a>
      </div>
    </div>
    <div style="height:180px;"></div>
    <div class="row colum-white">
      <div class="col-sm-6 col-md-6">
        <img class="img-responsive new-image" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/nueva-imagen.png">
        <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/duo-lubricado.png">
      </div>
      <div class="col-sm-6 col-md-6 colum-black">
        <h2 class="name-product">DUO LUBRICADO</h2>
        <p class="descrip-product">Lubricado y con una superficie lisa para una placentera sensación natural.</p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15759)) ?>"><img class="img-responsive btn-comprar" style="margin-top: 60px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/btn-duo-lubricado.png"></a>
      </div>
    </div>
    <div style="height:130px;"></div>
    <div class="row colum-white">
      <div class="col-sm-6 col-md-6">
        <img class="img-responsive new-image" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/nueva-imagen.png">
        <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/duo-retardante.png">
      </div>
      <div class="col-sm-6 col-md-6 colum-black">
        <h2 class="name-product">DUO RETARDANTE</h2>
        <p class="descrip-product">Un condón más grueso que ayuda a prolongar el placer de ambos. Ideal para los que quieren durar más.</p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 15760)) ?>"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/seguridad-y-confianza/btn-duo-retardante.png"></a>
      </div>
    </div>
    <div style="height:85px;"></div>
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/line-general.jpg">
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <video width="100%" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/poster-duo-tornado.jpg">
          <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-tornado.m4v" type="video/m4v">
          <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-tornado.webm" type="video/webm">
          Your browser does not support HTML5 video.
        </video>
      </div>
      <div class="col-sm-6 col-md-6">
        <video width="100%" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/poster-duo-hot.jpg">
          <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-hot.m4v" type="video/m4v">
          <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/duo/videos/duo-hot.webm" type="video/webm">
          Your browser does not support HTML5 video.
        </video>
      </div>
    </div>
    <div class="row">
      <p class="textos-legales">
        <span style="font-weight:bold;color:#000;">Textos legales:</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
