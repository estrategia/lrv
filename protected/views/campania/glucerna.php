<?php $this->pageTitle = "Glucerna - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Alimento especializado que es una buena opción para complementar la dieta o reemplazar tu desayuno o cena ayudando a mantener niveles de azúcar en la sangre.'>
  <meta name='keywords' content='Glucerna, alimentos para diabéticos, desayunos para diabeticos'>
	<style>
    @font-face { font-family:BrandonGrotesque-Bold ; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/BrandonGrotesque-Bold.otf);}
    @font-face { font-family:brandonGrotesque-boldItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/glucerna/fonts/brandonGrotesque-boldItalic.woff);}
    @font-face { font-family:brandonGrotesque-regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/glucerna/fonts/brandonGrotesque-regular.woff);}
    @font-face { font-family:helvetica-neue-lt-std-medium-italic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/glucerna/fonts/helvetica-neue-medium-italic.woff);}
    @font-face { font-family:myriadPro-regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/glucerna/fonts/myriadPro-regular.woff);}
    .img-responsive-m.bn-principal {border-top: 5px solid #22609D;}
    .img-responsive.bn-principal {border-top: 10px solid #22609D;}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .gray {background-color:#ECECEC;padding: 30px 0;margin-top: 15px;}
    .space-1 {height: 0px !important;}
    .header h2 {font-family:BrandonGrotesque-Bold;color:#1D98D3;text-align: center;font-size: 33px;}
    .header-m h2 {font-size: 17px;padding: 0px 18px;}
    .header img {margin:0 auto;}
    .header .marcas img:hover {-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    .sabores img:hover{-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    @-webkit-keyframes wobble-to-top-right {
      16.65% {-ms-transform: translate(8px, -8px);-webkit-transform: translate(8px, -8px);transform: translate(8px, -8px);}
      33.3% {-ms-transform: translate(-6px, 6px);-webkit-transform: translate(-6px, 6px);transform: translate(-6px, 6px);}
      49.95% {-ms-transform: translate(4px, -4px);-webkit-transform: translate(4px, -4px);transform: translate(4px, -4px);}
      66.6% {-ms-transform: translate(-2px, 2px);-webkit-transform: translate(-2px, 2px);transform: translate(-2px, 2px);}
      83.25% {-ms-transform: translate(1px, -1px);-webkit-transform: translate(1px, -1px);transform: translate(1px, -1px);}
      100% {-ms-transform: translate(0, 0);-webkit-transform: translate(0, 0);transform: translate(0, 0);}
    }
    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;margin: 0px 0px 15px; }
    .embed-container iframe,.embed-container object,.embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%;}
    .background {
      background: rgba(230,230,230,1);
      background: -moz-linear-gradient(top, rgba(230,230,230,1) 0%, rgba(255,255,255,1) 27%, rgba(251,251,251,1) 59%, rgba(217,217,217,1) 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(230,230,230,1)), color-stop(27%, rgba(255,255,255,1)), color-stop(59%, rgba(251,251,251,1)), color-stop(100%, rgba(217,217,217,1)));
      background: -webkit-linear-gradient(top, rgba(230,230,230,1) 0%, rgba(255,255,255,1) 27%, rgba(251,251,251,1) 59%, rgba(217,217,217,1) 100%);
      background: -o-linear-gradient(top, rgba(230,230,230,1) 0%, rgba(255,255,255,1) 27%, rgba(251,251,251,1) 59%, rgba(217,217,217,1) 100%);
      background: -ms-linear-gradient(top, rgba(230,230,230,1) 0%, rgba(255,255,255,1) 27%, rgba(251,251,251,1) 59%, rgba(217,217,217,1) 100%);
      background: linear-gradient(to bottom, rgba(230,230,230,1) 0%, rgba(255,255,255,1) 27%, rgba(251,251,251,1) 59%, rgba(217,217,217,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e6e6e6', endColorstr='#d9d9d9', GradientType=0 );
    }
    .tit {font-family: helvetica-neue-lt-std-medium-italic;color: #395DA9;font-size: 35px;margin-left: 17%;}
    .sub-tit {color: #3A5DA8;margin-left: 21%;font-size: 32px;line-height: 20px;}
    .products {margin-top: 25px;}
    .sabores {padding: 0px 40px;}
    .btn-comprar{margin:45px auto 0px;}
    .name-product {text-align: center;color: #197CA5;font-family: BrandonGrotesque-Bold;font-size: 28px;margin-top: 10px;}
    .name-product::before {background: #D6D6D6 none repeat scroll 0 0; top: 505px; content: ''; height: 5px; position: absolute; width: 190px;}
    .pie{font-family: brandonGrotesque-boldItalic;font-size: 31px;color: #094D8C;text-transform: uppercase;text-align: right;margin-top: -60px;margin-right: 113px;}
    .what {text-align: center;font-family:brandonGrotesque-boldItalic;margin-top: 64px;}
    .what span:nth-child(1) {color:#258ECF;font-size: 46px;}
    .what span:nth-child(2) {color:#144A79;font-size: 60px;}
    .descrip {color: #0A4B85;text-align: center;}
    .descrip span:nth-child(1){font-family: brandonGrotesque-regular;font-size: 32px;line-height: 32px;}
    .descrip span:nth-child(3){font-family: brandonGrotesque-boldItalic;font-size: 35px;line-height: 30px;}
    .graph {text-align:center;}
    .graph .izq {color: #1D436A;font-family: brandonGrotesque-regular;font-size: 22px;line-height: 25px;margin-left: 149px;}
    .graph .der {color: #1D436A;font-family: brandonGrotesque-regular;font-size: 22px;line-height: 25px;margin-right: 133px;}
    .list {background-color: #0C4A85;color: #fff;font-family: helvetica-neue-lt-std-medium-italic;border-radius: 0 0 100px;padding: 40px 88px;font-size: 23px;}
    .legal {color: #696969;font-family: myriadPro-regular;font-size: 11px;padding: 20px 88px;}
    .tit-m {font-family: helvetica-neue-lt-std-medium-italic;color: #395DA9;font-size: 21px;}
    .sub-tit-m {color: #3A5DA8;font-size: 16px;line-height: 20px;}
    .name-product-m {text-align: center;color: #197CA5;font-family: BrandonGrotesque-Bold;font-size: 25px;margin-top: 5px;margin-bottom: 5px;}
    .btn-comprar-m {margin: 5px auto 0px;width: 87%;display: block;}
    .pie-m {font-family: brandonGrotesque-boldItalic;font-size: 12px;color: #094D8C;text-transform: uppercase;text-align: right;margin-top: 0px;margin-right: 22px;}
    .list-m {background-color: #0C4A85;color: #fff;font-family: helvetica-neue-lt-std-medium-italic;padding: 17px 27px;font-size: 13px;}
    .legal-m {color: #696969;font-family: myriadPro-regular;font-size: 11px;padding: 5px 23px;text-align: justify;}
</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<!--Header-->
<?php require 'headerAbbott-movil.php'; ?>
<!--Banner principal-->
<img class="img-responsive-m bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/banner-principal.jpg" alt="Con Glucerna sigues siendo tú">
<section class="background" style="margin-top: -4px;">
  <div style="padding: 15px 35px;text-align: center;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/glucerna.png" alt="Glucerna">
    <span class="tit-m">Puede ser usado por diabéticos dentro</span> <br>
    <span class="sub-tit-m">de las restricciones de una dieta con supervisión médica. </span>
  </div>
  <div class="products">
    <!--producto 1-->
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/400gr.png" alt="glucerna 400gr">
    <div class="sabores">
      <img style="margin: 0 auto;width: 30%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/vainilla.png">
    </div>
    <p class="name-product-m">Glucerna 400 gr</p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 52835 )) ?>" data-ajax="false">
      <img class="btn-comprar-m " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/boton.png">
    </a>
    <!--producto 2-->
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/900gr.png" alt="Glucerna 900gr">
    <div class="sabores">
      <img style="margin: 0 auto;width: 30%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/vainilla.png">
    </div>
    <p class="name-product-m">Glucerna 900 gr</p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65141  )) ?>" data-ajax="false">
      <img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/boton.png">
    </a>
    <!--producto 3-->
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/liquido.png" alt="Glucerna liquidio">
    <div class="ui-grid-b sabores">
      <div class="ui-block-a"> <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/vainilla.png"> </div>
      <div class="ui-block-b"> <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/fresa.png"> </div>
      <div class="ui-block-c"> <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/chocolate.png"> </div>
    </div>
    <p class="name-product-m">Glucerna 237 ml</p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110371  )) ?>" data-ajax="false">
        <img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/boton.png">
      </a>
  </div>
  <img class="img-responsive-m" style="margin-top: 25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/banner.png">
  <p class="pie-m">Con Glucerna sigue siendo tú </p>
  <p class="what" style="margin-top: 25px;"><span style="font-size:19px;">¿QUÉ ES </span><span style="font-size: 25px;">GLUCERNA? </span></p>
  <p class="descrip" style="padding: 0 15px;">
  <span style="font-size: 18px;line-height: 22px;">Es un alimento científicamente formulado con un sistema de carbohidratos de liberación lenta. Además de tener un gran sabor, </span> <br>
  <span style="font-size: 24px;line-height: 22px;">te ayuda a controlar tus niveles de azúcar y conservar tu energía. </span>
  </p>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/banner-secundario.png">
  <div class="graph" style="padding: 0 20px;">
    <p class="izq" style="margin-left: 0px;font-size: 20px;">Tomarlo despacio, más o menos en un lapso de 20 minutos </p>
    <p class="der" style="margin-right: 0px;font-size: 20px;">Como complemento o como  snack entre comidas, ajustándolo a tu consumodiario de energía. </p>
  </div>
  <div style="padding: 30px 20px 0px;">
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/9HQi2KohGDw?rel=0' frameborder='0' allowfullscreen></iframe></div>
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/L0Ywq4fgmlE?rel=0' frameborder='0' allowfullscreen></iframe></div>
  </div>
  <ul class="list-m">
    <li>Libre de gluten. No usar en personas con galactosemia.</li>
    <li>No destinado para uso en niños a menos que un profesional de la salud así lo indique.</li>
    <li>No usar por vía parenteral.</li>
    <li>Puede ser administrado por sonda bajo supervisión médica.</li>
  </ul>
  <div class="legal-m">
    <p>Glucerna®. Alimento en polvo con carbohidratos de digestión lenta. Registro Sanitario: RSiA10I115415. Este producto puede ser usado por diabéticos dentro
      de las restricciones de una dieta con supervisión médica. Este producto no reemplaza una alimentación adecuada.</p>
    <p>Glucerna® Alimento liquido con carbohidratos de digestión lenta. Registro Sanitario: RSiA16I188215. Este producto puede ser usado por diabéticos dentro de las
      restricciones de una dieta con supervisión médica. Este producto no reemplaza una alimentación adecuada.</p>
  </div>
</section>
<!---FIN VERSIÓN MÓVIL-->

<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<div class="sidebar-cart">
	<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/general/compra-online.png">
</div>
<!--Header-->
<?php require 'headerAbbott.php'; ?>
<!--Banner principal-->
<img class="img-responsive bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/banner-principal.jpg" alt="Con Glucerna sigues siendo tú">
<div class="container background">
  <div style="padding: 60px 70px 0px;">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/glucerna.png" alt="Glucerna">
    <span class="tit">Puede ser usado por diabéticos dentro</span> <br>
    <span class="sub-tit">de las restricciones de una dieta con supervisión médica. </span>
  </div>
  <div class="row">
    <div class="products">
      <div class="col-sm-4 sol-md-4">
        <div class="row">
          <div class="col-md-12">
            <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/400gr.png" alt="glucerna 400gr">
          </div>
        </div>
        <div class="row sabores">
          <div class="col-md-12"> <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/vainilla.png"> </div>
        </div>
        <div class="row">
          <p class="name-product">Glucerna 400 gr</p>
         <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 52835 )) ?>" data-ajax="false">
           <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/boton.png">
         </a>
        </div>
      </div>
      <div class="col-sm-4 sol-md-4">
        <div class="row">
          <div class="col-md-12">
            <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/900gr.png" alt="Glucerna 900gr">
          </div>
        </div>
        <div class="row sabores">
          <div class="col-md-12"> <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/vainilla.png"> </div>
        </div>
        <div class="row">
          <p class="name-product">Glucerna 900 gr</p>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65141  )) ?>">
             <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/boton.png">
          </a>
        </div>
      </div>
      <div class="col-sm-4 sol-md-4">
        <div class="row">
          <div class="col-md-12">
            <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/liquido.png" alt="Glucerna liquidio">
          </div>
        </div>
        <div class="row sabores">
          <div class="col-sm-4 col-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/vainilla.png"> </div>
          <div class="col-sm-4 col-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/fresa.png">  </div>
          <div class="col-sm-4 col-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/chocolate.png"> </div>
        </div>
        <div class="row">
          <p class="name-product">Glucerna 237 ml</p>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110371  )) ?>">
             <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/boton.png">
           </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/banner.png">
    <p class="pie">Con Glucerna sigue siendo tú </p>
  </div>
  <div class="row">
    <p class="what"><span>¿QUÉ ES </span><span>GLUCERNA? </span></p>
    <p class="descrip">
      <span>Es un alimento científicamente formulado con un sistema <br> de carbohidratos de liberación lenta. Además de tener un gran sabor, </span> <br>
      <span>te ayuda a controlar tus niveles de azúcar y conservar tu energía. </span>
    </p>
  </div>
  <div class="row graph">
    <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/glucerna/banner-secundario.png">
    <div class="col-sm-6 col-md-6">
        <p class="izq">Tomarlo despacio,<br> más o menos en un lapso<br> de 20 minutos </p>
    </div>
    <div class="col-sm-6 col-md-6">
      <p class="der">Como complemento o como <br> snack entre comidas, ajustándolo <br>a tu consumodiario de energía. </p>
    </div>
  </div>
  <div class="row" style="padding: 30px 60px;">
    <div class="col-sm-6 col-md-6">
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/9HQi2KohGDw?rel=0' frameborder='0' allowfullscreen></iframe></div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/L0Ywq4fgmlE?rel=0' frameborder='0' allowfullscreen></iframe></div>
    </div>
  </div>
  <div class="row">
    <ul class="list">
      <li>Libre de gluten. No usar en personas con galactosemia.</li>
      <li>No destinado para uso en niños a menos que un profesional de la salud así lo indique.</li>
      <li>No usar por vía parenteral.</li>
      <li>Puede ser administrado por sonda bajo supervisión médica.</li>
    </ul>
  </div>
  <div class="row legal">
    <p>Glucerna®. Alimento en polvo con carbohidratos de digestión lenta. Registro Sanitario: RSiA10I115415. Este producto puede ser usado por diabéticos dentro
      de las restricciones de una dieta con supervisión médica. Este producto no reemplaza una alimentación adecuada.</p>
    <p>Glucerna® Alimento liquido con carbohidratos de digestión lenta. Registro Sanitario: RSiA16I188215. Este producto puede ser usado por diabéticos dentro de las
      restricciones de una dieta con supervisión médica. Este producto no reemplaza una alimentación adecuada.</p>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
