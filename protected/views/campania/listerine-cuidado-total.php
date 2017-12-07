
<?php $this->pageTitle = "Listerine | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Listerine® Cuidado Total puede matar hasta el 99% de los gérmenes que causan la placa bacteriana y el mal aliento mientras protege tus encías.'>
    <meta name='keywords' content='Listerine, enjuague bucal, mal aliento.'>
    <style>
      @font-face {font-family:Knockout-FullLiteweight;src: url(".Yii::app()->request->baseUrl."/images/contenido/listerine/fonts/Knockout-FullLiteweight.otf);}
      @font-face {font-family:Gotham-Book;src: url(".Yii::app()->request->baseUrl."/images/contenido/listerine/fonts/Gotham-Book.otf);}
      @font-face {font-family:Gotham-BlackIta;src: url(".Yii::app()->request->baseUrl."/images/contenido/listerine/fonts/Gotham-BlackIta.otf);}
      @font-face {font-family:GothamMedium;src: url(".Yii::app()->request->baseUrl."/images/contenido/listerine/fonts/GothamMedium.otf);}
      * {padding: 0;margin: 0;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
      .background{background-color:#6657A8;}
      .space {height:32px;}
      .flecha_abajo { width: 0; height: 0;border-left: 30px solid transparent;border-right: 30px solid transparent;border-top: 20px solid #6757A8;margin:0 auto;}
      .col-xs-5ths, .col-sm-5ths, .col-md-5ths, .col-lg-5ths {position: relative; min-height: 1px; padding-right: 10px; padding-left: 10px;}
      .col-xs-5ths { width: 20%;float: left;}
      .bg-redes{background-color:#4a4877;}
      @media (min-width: 768px) {.col-sm-5ths {width: 20%;float: left;}}
      @media (min-width: 992px) {.col-md-5ths {width: 20%;float: left;}}
      @media (min-width: 1200px) {.col-lg-5ths {width: 20%;float: left;}}
      .bg-gray{background-color: #f6f6f6;}
      .bg-gray p{margin:0 !important;text-align:center;}
      .bg-cuidadoTotal{
        padding:0px !important;
        background: rgb(103,87,168);
        /* Old Browsers */background: -moz-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 38%, rgb(103,87,168) 38%, rgb(81,68,134) 100%);
         /* FF3.6+ */background: -webkit-gradient(left top, left bottom, color-stop(0%, rgb(103,87,168)), color-stop(38%, rgb(81,68,134)), color-stop(38%, rgb(103,87,168)), color-stop(100%, rgb(81,68,134)));
        /* Chrome, Safari4+ */background: -webkit-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 38%, rgb(103,87,168)38%, rgb(81,68,134) 100%);
         /* Chrome10+,Safari5.1+ */background: -o-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 38%, rgb(103,87,168) 38%, rgb(81,68,134) 100%);
         /* Opera 11.10+ */background: -ms-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 38%, rgb(103,87,168) 38%, rgb(81,68,134) 100%);
         /* IE 10+ */background: linear-gradient(to bottom, rgb(103,87,168) 0%, rgb(81,68,134) 38%, rgb(103,87,168) 38%, rgb(81,68,134) 100%);
        /* W3C */filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6757a8', endColorstr='#514486', GradientType=0 );
        /* IE6-9 */
      }
      .bg-cuidadoTotal-m{
        padding:0px !important;
        background: rgb(103,87,168);
        /* Old Browsers */background: -moz-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 30%, rgb(103,87,168) 30%, rgb(81,68,134) 100%);
         /* FF3.6+ */background: -webkit-gradient(left top, left bottom, color-stop(0%, rgb(103,87,168)), color-stop(30%, rgb(81,68,134)), color-stop(30%, rgb(103,87,168)), color-stop(100%, rgb(81,68,134)));
        /* Chrome, Safari4+ */background: -webkit-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 30%, rgb(103,87,168)30%, rgb(81,68,134) 100%);
         /* Chrome10+,Safari5.1+ */background: -o-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 30%, rgb(103,87,168) 30%, rgb(81,68,134) 100%);
         /* Opera 11.10+ */background: -ms-linear-gradient(top, rgb(103,87,168) 0%, rgb(81,68,134) 30%, rgb(103,87,168) 30%, rgb(81,68,134) 100%);
         /* IE 10+ */background: linear-gradient(to bottom, rgb(103,87,168) 0%, rgb(81,68,134) 30%, rgb(103,87,168) 30%, rgb(81,68,134) 100%);
        /* W3C */filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6757a8', endColorstr='#514486', GradientType=0 );
        /* IE6-9 */
      }
      .bg-cuidadoTotalZero{
        padding:0px !important;
        background: rgb(109,115,184);
        /* Old Browsers */background: -moz-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 38%, rgb(86,91,148) 38%, rgb(86,91,148) 100%);
         /* FF3.6+ */background: -webkit-gradient(left top, left bottom, color-stop(0%, rgb(109,115,184)), color-stop(38%, rgb(109,115,184)), color-stop(38%, rgb(86,91,148)), color-stop(100%, rgb(86,91,148)));
        /* Chrome, Safari4+ */background: -webkit-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 38%, rgb(86,91,148) 38%, rgb(86,91,148) 100%);
         /* Chrome10+,Safari5.1+ */background: -o-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 38%, rgb(86,91,148) 38%, rgb(86,91,148) 100%);
         /* Opera 11.10+ */background: -ms-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 38%, rgb(86,91,148) 38%, rgb(86,91,148) 100%);
         /* IE 10+ */background: linear-gradient(to bottom, rgb(109,115,184) 0%, rgb(109,115,184) 38%, rgb(86,91,148) 38%, rgb(86,91,148) 100%);
        /* W3C */filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6d73b8', endColorstr='#565b94', GradientType=0 );
        /* IE6-9 */
        margin: 0px 25px !important;
      }
      .bg-cuidadoTotalZero-m{
        padding:0px !important;
        background: rgb(109,115,184);
        /* Old Browsers */background: -moz-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 30%, rgb(86,91,148) 30%, rgb(86,91,148) 100%);
         /* FF3.6+ */background: -webkit-gradient(left top, left bottom, color-stop(0%, rgb(109,115,184)), color-stop(30%, rgb(109,115,184)), color-stop(30%, rgb(86,91,148)), color-stop(100%, rgb(86,91,148)));
        /* Chrome, Safari4+ */background: -webkit-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 30%, rgb(86,91,148) 30%, rgb(86,91,148) 100%);
         /* Chrome10+,Safari5.1+ */background: -o-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 30%, rgb(86,91,148) 30%, rgb(86,91,148) 100%);
         /* Opera 11.10+ */background: -ms-linear-gradient(top, rgb(109,115,184) 0%, rgb(109,115,184) 30%, rgb(86,91,148) 30%, rgb(86,91,148) 100%);
         /* IE 10+ */background: linear-gradient(to bottom, rgb(109,115,184) 0%, rgb(109,115,184) 30%, rgb(86,91,148) 30%, rgb(86,91,148) 100%);
        /* W3C */filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6d73b8', endColorstr='#565b94', GradientType=0 );
        /* IE6-9 */
        margin-top: 20px;
      }
      .bg-cuidadoTotal, img {margin:0 auto;}
      .bg-cuidadoTotalZero img {margin:0 auto;}
      .sidebar-cart {position: fixed;right: 0px;top: 65%;z-index: 2000;}
      .sidebar-cart ul li {list-style:none;}
      .title-banner{font-family:Knockout-FullLiteweight;font-size: 90px;text-transform: uppercase;color: #A092E7;line-height: 76%;margin-top: 39px;}
      .title-banner-m{font-family: Knockout-FullLiteweight;font-size: 60px;text-transform: uppercase;color: #A092E7;}
      .title-banner2{font-family:Knockout-FullLiteweight;font-size: 80px;text-transform: uppercase;color: #fff;line-height: 76%;}
      .title-banner2-m {font-family: Knockout-FullLiteweight;font-size: 60px;text-transform: uppercase;color: #fff;}
      .subTitle-banner{color: #44357A;text-transform: uppercase;font-family: Knockout-FullLiteweight;font-size: 22px;line-height: 20px;}
      .hashtag{color: #fff;font-family: Knockout-FullLiteweight;font-size: 47px;line-height: 63%;}
      .hashtag span{color:#A092E7;}
      .descripcion{font-family:Gotham-Book;color: #fff;font-size: 19px;}
      .descripcion-m {font-family: Gotham-Book;color: #fff;font-size: 15px;}
      .section-icons{padding: 42px 0 15px;}
      .section-icons p {font-family:Gotham-Book;text-align: center;font-size: 19px;}
      .plataforma{color:#fff;text-align:center;padding: 25px;}
      .plataforma span {font-family: Knockout-FullLiteweight;text-transform: uppercase;font-size: 42px;}
      .plataforma p {font-family: Gotham-Book;font-size: 25px;line-height: 25px;}
      .section-products{padding: 30px 0px;}
      .section-products h2{text-align: center;font-family: Gotham-BlackIta;color: #fff;text-transform: uppercase;font-size: 25px;margin-top: 40px;}
      .section-products .bg-gray {padding:27px;}
      .section-products .bg-gray p {font-family: GothamMedium;color: #7d7d7d;font-size: 20px;text-align: left;}
      .section-products .btn-compra{width: 80%;padding: 20px 0px;}
      .section-products .entrega1hora{width: 55%;}
      .section-products-m {padding: 30px 0px;}
      .section-products-m h2{text-align: center;font-family: Gotham-BlackIta;color: #fff;text-transform: uppercase;font-size: 19px;padding-top: 10px;}
      .section-products-m .bg-gray {padding:27px;}
      .section-products-m .bg-gray p {font-family: GothamMedium;color: #7d7d7d;font-size: 19px;text-align: left;}
      .section-products-m .btn-compra{padding: 20px 0px;}
      .section-products-m .entrega1hora{width: 55%;margin: 0 auto;display: block;}
      .embed-responsive-item{width: 87.4%;margin-left: 7.5%;height: 561px;}
      .title-footer{font-family: Knockout-FullLiteweight;font-size: 78px;text-transform: uppercase;color: #A092E7;line-height: 76%;margin: 50px 50px 0px;}
      .title-footer-m {font-family: Knockout-FullLiteweight;font-size: 56px;text-transform: uppercase;color: #A092E7;line-height: 76%;margin: 0px 30px 0px;}
      .subtitle-footer2 {font-family: Knockout-FullLiteweight;font-size: 76px;text-transform: uppercase;color: #fff;line-height: 76%;margin: 0px 50px;}
      .subtitle-footer2-m {font-family: Knockout-FullLiteweight;font-size: 56px;text-transform: uppercase;color: #fff;line-height: 88%;margin: 0px 32px;}
      .foot{color: #fff;font-family: Knockout-FullLiteweight;font-size: 45px;line-height: 63%;text-transform: uppercase;margin: 0px 50px 15px;}
      .footer {color: #7d7d7d;font-size: 26px;font-family: GothamMedium;padding:25px;}
      .footer p{color: #7d7d7d;font-size: 26px;font-family: GothamMedium;line-height: 57px;}
      .line1{font-family: Knockout-FullLiteweight;font-size: 31px;text-transform: uppercase;color: #A092E7;line-height: 76%;margin: 65px 0px 0px;}
      .line2{font-family: Knockout-FullLiteweight;font-size: 31px;text-transform: uppercase;color: #fff;line-height: 76%;margin: 0px 0px 50px;}
      .info-contacto{padding: 65px 0px 0px;text-align:center;text-transform: uppercase;color: #A092E7;font-family: Knockout-FullLiteweight}
      .info-contacto .texto{font-size: 17px;}
      .info-contacto .tel{font-size: 31px;line-height: 21px;}
      .img-responsive{width:100%;}
      .contain{padding: 60px 19px;}
      .ui-grid-a > .ui-block-a {margin-bottom: 15px;}
      .plataforma-m{color:#fff;text-align:center;padding: 25px;}
      .plataforma-m span {font-family: Knockout-FullLiteweight;text-transform: uppercase;font-size: 27px;}
      .foot-m {color: #fff;font-family: Knockout-FullLiteweight;font-size: 33px;line-height: 93%;text-transform: uppercase;margin: 0px 32px 15px;}
      .footer-m p {color: #7d7d7d;font-size: 19px;font-family: GothamMedium;line-height: 57px;}
      .line1-m {font-family: Knockout-FullLiteweight;font-size: 38px;text-transform: uppercase;color: #A092E7;}
      .line2-m {font-family: Knockout-FullLiteweight;font-size: 39px;text-transform: uppercase;color: #fff;line-height: 76%;margin: 0px 0px 15px;}
    </style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>

<section>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/banner-mobile.jpg" alt="">
</section>
<section class="contain background" style="margin-top: 15px;">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/conocelo.png" alt="Principales Beneficios">
  <p class="title-banner-m" style="line-height: 100%;">¿Ya conoces <p>
  <p class="title-banner2-m" style="line-height: 83%;"> sus principales <br>beneficios?</p>
  <p class="descripcion-m">¡Con LISTERINE® Cuidado total, logra una boca más PROTEGIDA en solo dos semanas!</p>
</section>
<section class="section-icons" style="padding: 20px 19px;">
  <fieldset class="ui-grid-a">
    <div class="ui-block-a">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/aliento-fresco.png" class="img-responsive" alt="Aliento fresco Listerine">
      <p>Aliento Fresco</p>
    </div>
    <div class="ui-block-b">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/dientes-fuertes.png" class="img-responsive" alt="Dientes más fuertes Listerine">
      <p>Dientes más <br> fuertes</p>
    </div>
    <div class="ui-block-a">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/encias.png" class="img-responsive" alt="Encías más sanas Listerine">
      <p>Encías más sanas</p>
    </div>
    <div class="ui-block-b">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/esmalte.png" class="img-responsive" alt="Fortalece el esmalte Listerine">
      <p>Fortalece el <br> esmalte </p>
    </div>
    <div class="ui-block-a">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/placa.png" class="img-responsive" alt="Previene la placa y sarro Listerine">
      <p>Previene la <br>  formación de Sarro <br> y placa bacteriana</p>
    </div>
  </fieldset>
</section>
<section style="padding: 15px 19px;">
  <div class="row background plataforma-m">
    <span>Conoce la plataforma avanzada  de LISTERINE<sup style="font-size: 22px !important;top: -17px !important;margin-left: 3px;">®</sup> Cuidado Total</span>
    <p>Con los mismos 6 beneficios <br> ¡Elige el que más te guste!</p>
  </div>
    <div class="flecha_abajo"></div>
</section>
<section class="section-products-m" style="padding: 10px 19px;">
  <div class="bg-cuidadoTotal-m">
    <h2>LISTERINE<sup>®</sup> Cuidado <br>Total</h2>
    <img style="width: 40%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/listerine-cuidado-total.png" alt="">
    <div class="bg-gray">
      <p>Es el más completo y avanzado LISTERINE®. ¡Ofrece 6 beneficios en 1!</p>
      <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3316)) ?>">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/compra-online.png" class="img-responsive btn-compra" alt="">
      </a>
      <!-- <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/entrega-1-hora.png" class="img-responsive entrega1hora" alt=""> -->
    </div>
  </div>
  <div class="bg-cuidadoTotalZero-m">
    <h2>LISTERINE<sup>®</sup> Cuidado <br>Total Zero</h2>
    <img style="width: 40%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/listerine-cuidado-total-zero.png" alt="">
    <div class="bg-gray">
      <p>Es el más completo y avanzado LISTERINE<sup>®</sup>, ahora también sin alcohol.</p>
      <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3318)) ?>">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/compra-online.png" class="img-responsive btn-compra" alt="">
      </a>
      <!-- <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/entrega-1-hora.png" class="img-responsive entrega1hora" alt=""> -->
    </div>
  </div>
</section>
<div style="padding: 10px 19px;">
    <iframe width="100%" height="205" src="https://www.youtube.com/embed/L4XjMuZOBTA?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>
<section style="padding: 10px 19px;">
  <div class="background" style="padding-top: 32px;">
    <p class="title-footer-m">HAY DOCE VARIEDADES <p>
    <p class="subtitle-footer2-m"> DE LISTERINE <sup style="font-size: 25px !important;top: -35px !important;">®</sup> <p>
    <p class="foot-m">¡conoce a toda la familia!</p>
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/familia-listerine.png" class="img-responsive" alt="">
  </div>
  <div class="row bg-gray footer-m" style="padding-bottom: 25px;">
    <div class="col-md-6"><p>Enjuague Bucal LISTERINE<sup>®</sup></p></div>
    <div class="col-md-6">
      <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=listerine"><img style="width: 75%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/compra-online.png" class="img-responsive" alt=""></a>
    </div>
  </div>
</section>
<div class="space"></div>
<section class="background">
  <div style="padding: 10px 19px;">
    <p class="line1-m">Síguenos en nuestras<p>
    <p class="line2-m">redes sociales</p>
    <div class="ui-grid-a">
      <div class="ui-block-a" style="padding-right: 8px;">
        <a href="https://www.facebook.com/ListerineCO/" target="_blank">
          <div class="bg-redes">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/fb.png" alt="">
          </div>
        </a>
      </div>
      <div class="ui-block-b" style="padding-right: 8px;">
        <a href="https://www.instagram.com/listerineco/" target="_blank">
        <div class=" bg-redes">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/ins.png" alt="">
        </div>
        </a>
      </div>
      <div class="ui-block-a" style="padding-right: 8px;">
        <a href="https://www.youtube.com/user/ListerineCO/" target="_blank">
          <div class="bg-redes">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/you.png"  alt="">
          </class>
        </a>
      </div>
    </div>
    <div class="ui-block-b info-contacto" style="margin-top: 20px;">
      <span class="texto">COMUNÍCATE CON NOSOTROS:</span><br>
      <span class="tel" style="font-size: 30px;"> 01-800 05 17000</span>
    </div>
  </div>
</section>
<section style="background-color:#9f9cdf;height:30px;"></section>

<!--Fin Version movil-->

<!--Versión escritorio-->
<?php else: ?>
<!--   <div class="sidebar-cart">
	   <ul><li><a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=listerine"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/comprar-sticky.png" alt=""></a></li></ul>
	</div> -->

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active">
        <section class="background">
          <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <p class="title-banner">listerine <sup style="font-size: 44px;margin-left: -8px;top: -32px;font-weight: bolder;">®</sup><br>cuidado total</p>
                  <p class="title-banner2">boca más protegida <br>en 2 semanas.*</p>
                  <p class="subTitle-banner">*vs solo el cepillado dental</p>
                  <p class="hashtag"><span>#</span>SACA<span>LO</span>MEJOR</p>
                </div>
                <div class="col-md-6">
                  <img  style="width: 89%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/listerineBanner.png" class="img-responsive" alt="Listerine La rebaja virtual">
                </div>
              </div>
          </div>
        </section>
      </div>
      <div class="item">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/banner02.jpg" class="img-responsive" alt="">
      </div>
      <div class="item">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3314)) ?>">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/banner03.jpg" class="img-responsive" alt="">
        </a>
      </div>
    </div>
    <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev"><i class="prev-slide"></i></a>
    <a class="carousel-control right" href="#carousel-example-generic" data-slide="next"><i class="next-slide"></i></a>
  </div>
  <div class="space"></div>
  <div class="container background">
    <div class="row">
      <div class="col-md-6">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/conocelo.png" class="img-responsive" alt="Principales Beneficios">
      </div>
      <div class="col-md-6">
        <p class="title-banner" style="line-height: 100%;">¿Ya conoces <p>
        <p class="title-banner2" style="line-height: 83%;"> sus principales <br>beneficios?</p>
        <p class="descripcion">¡Con LISTERINE® Cuidado total, logra una boca <br>más PROTEGIDA en solo dos semanas!</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row section-icons">
      <div class="col-md-5ths">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/aliento-fresco.png" class="img-responsive" alt="Aliento fresco Listerine">
        <p>Aliento Fresco</p>
      </div>
      <div class="col-md-5ths">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/dientes-fuertes.png" class="img-responsive" alt="Dientes más fuertes Listerine">
        <p>Dientes más <br> fuertes</p>
      </div>
      <div class="col-md-5ths">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/encias.png" class="img-responsive" alt="Encías más sanas Listerine">
        <p>Encías más sanas</p>
      </div>
      <div class="col-md-5ths">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/esmalte.png" class="img-responsive" alt="Fortalece el esmalte Listerine">
        <p>Fortalece el <br> esmalte </p>
      </div>
      <div class="col-md-5ths">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/placa.png" class="img-responsive" alt="Previene la placa y sarro Listerine">
        <p>Previene la <br>  formación de Sarro <br> y placa bacteriana</p>
      </div>
    </div>
    <section>
      <div class="row background plataforma">
        <span>Conoce la plataforma avanzada  de LISTERINE<sup style="font-size: 22px !important;top: -17px !important;margin-left: 3px;">®</sup> Cuidado Total</span>
        <p>Con los mismos 6 beneficios <br> ¡Elige el que más te guste!</p>
      </div>
        <div class="flecha_abajo"></div>
    </section>
    <div class="row section-products">
      <div class="col-md-5 col-md-offset-1 bg-cuidadoTotal">
        <h2>LISTERINE<sup>®</sup> Cuidado <br>Total</h2>
        <img style="margin:0 auto; display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/listerine-cuidado-total.png" alt="">
        <div class="bg-gray">
          <p>Es el más completo y avanzado LISTERINE®. ¡Ofrece 6 beneficios en 1!</p>
          <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3316)) ?>">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/compra-online.png" class="img-responsive btn-compra" alt="">
          </a>
          <!-- <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/entrega-1-hora.png" class="img-responsive entrega1hora" alt=""> -->
        </div>
      </div>
      <div class="col-md-5 bg-cuidadoTotalZero">
        <h2>LISTERINE<sup>®</sup> Cuidado <br>Total Zero</h2>
        <img style="margin:0 auto; display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/listerine-cuidado-total-zero.png" alt="">
        <div class="bg-gray">
          <p>Es el más completo y avanzado LISTERINE<sup>®</sup>, ahora también sin alcohol.</p>
          <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3318)) ?>">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/compra-online.png" class="img-responsive btn-compra" alt="">
          </a>
          <!-- <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/entrega-1-hora.png" class="img-responsive entrega1hora" alt=""> -->
        </div>
      </div>
      <div class="col-md-12">
          <div class="space"></div>
          <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/L4XjMuZOBTA?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <section>
      <div class="row background">
        <p class="title-footer">HAY DOCE VARIEDADES <p>
        <p class="subtitle-footer2"> DE LISTERINE <sup style="font-size: 25px !important;top: -35px !important;">®</sup> <p>
        <p class="foot">¡conoce a toda la familia!</p>
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/familia-listerine.png" class="img-responsive" alt="">
      </div>
      <div class="row bg-gray footer">
        <div class="col-md-6"><p>Enjuague Bucal LISTERINE<sup>®</sup></p></div>
        <div class="col-md-6">
          <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=listerine"><img style="width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/compra-online.png" class="img-responsive" alt=""></a>
        </div>
      </div>
    </section>
    <div class="space"></div>
  </div>
  <section class="background">
    <div class="container">
      <div class="col-md-3">
        <p class="line1-m">Síguenos en nuestras<p>
        <p class="line2-m">redes sociales</p>
      </div>
      <div class="col-md-6" style="padding: 50px 0px;">
        <div class="col-md-4 ">
          <a href="https://www.facebook.com/ListerineCO/" target="_blank"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/fb.png" class="img-responsive bg-redes" alt=""></a>
        </div>
        <div class="col-md-4">
          <a href="https://www.instagram.com/listerineco/" target="_blank"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/ins.png" class="img-responsive bg-redes" alt=""></a>
        </div>
        <div class="col-md-4">
          <a href="https://www.youtube.com/user/ListerineCO/" target="_blank"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/listerine/you.png" class="img-responsive bg-redes" alt=""></a>
        </div>
      </div>
      <div class="col-md-3 info-contacto">
          <span class="texto">COMUNÍCATE CON NOSOTROS:</span><br>
          <span class="tel"> 01-800 05 17000</span>
      </div>
    </div>
  </section>
  <section style="background-color:#9f9cdf;height:30px;"></section>
    <!--Fin versión escritorio-->
<?php endif; ?>
