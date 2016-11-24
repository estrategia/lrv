
<?php $this->pageTitle = "Parodontax | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='La crema dental Parodontax® Flúor es para uso diario que con su fórmula única, ayuda a prevenir y proteger contra el sangrado de encías.'>
    <meta name='keywords' content='encías inflamadas, Sangrado de encías, gingivitis.'>
  	<style>
      .header{margin-top:30px;}
      .header a {color:#fff;}
      .header-movil a {color:#fff;text-decoration: none;}
      .header a:hover, a:visited , a:active , a:focus {color:#fff !important;}
      .header-movil a:hover, a:visited , a:active , a:focus {color:#fff !important;}
      .menu {text-align:center;font-family: NewJune-Bold;font-size: 42px;border-radius: 0 100px 0 0;border-right: 6px solid #fff;border-top: 6px solid #fff;}
      .menu-m {text-align: center; font-family: NewJune-Bold;font-size: 27px;border-bottom: 2px solid #fff;padding:5px;}
      .cont-sensibilidad{z-index: 11;padding:0px !important;}
      .sensibilidad{background-color:#01317D;}
      .cont-encias{z-index: 10;padding:0px !important;}
      .encias{background-color:#E3201E;margin-left: -39px;}
      .cont-protesis{z-index: 9;padding:0px !important;}
      .protesis{background-color:#60BAC2;margin-left: -53px;}
      .img-responsive {display: block;max-width: 100%;height: auto;}
      .space{height:60px;}
      .space-m{height:30px;}
      .menu-movil .item {font-family: NewJune-Bold;color:#fff;letter-spacing: 1px;font-size: 11px !important;}
      .footer {background-color:#F5F3F4;color:#7D7978;text-align:center;padding: 15px;margin-top: 20px;}
      .title-principal{font-family: FrutigerLTStd-Black;color:#E30618;font-size: 50px}
      .title-principal-m {font-family: FrutigerLTStd-Black;color: #E30618 !important;font-size: 33px;text-align: center;margin:0;}
      .compra-online{width: 70%;margin: 0 auto;}
      .compra-online-m {width: 95%; margin: 0 auto;}
      .logo-parodontax{width: 50%;padding: 44px 0px;}
      .logo-parodontax-m{width: 60%;margin: 20px 40px;}
      .intro{text-align: right;}
      .intro .parrafos {font-size: 32px;}
      .parrafos{font-family: FrutigerLTStd-Light;color:#414140;}
      .parrafos-m{font-family: FrutigerLTStd-Light;color:#414140;margin:0;}
      .copy{font-family: FrutigerLTStd-BoldItalic;color: #E30618;text-align: right;font-size: 25px;margin-top: 18%;}
      .copy-m {font-family: FrutigerLTStd-BoldItalic; color: #E30618; text-align: center; font-size: 14px; margin-top: 4%;}
      .carousel .item {max-height: initial !important;}
      .carousel-caption {top: 144px;font-size: 70px !important;font-family: Frutiger-Bold;right: 4% !important;left: 27% !important;top: 12% !important;}
      .carousel-caption span {font-family: Frutiger-Black;font-size: 75px !important;}
      .bg-line {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/Parodontax/bg-line.jpg);background-size: 100% 100%;}
      .bg-line-m {background-color: #E0E4E7;border-bottom: 5px solid #E40C19;}
      .titulo {font-family: FrutigerLTStd-Black;color: #696866;font-size: 48px;}
      .titulo-m {font-family: FrutigerLTStd-Black;color: #696866;font-size: 24px;}
      .descripcion{text-align: right;font-size: 30px;margin-top: 12%;color:#E30618;margin-right: 35px;}
      .descripcion-m{text-align: center;font-size: 18px;color: #E30618;margin: 0 auto;padding: 42px 21px;}
      .formula {font-family: FrutigerLTStd-BoldItalic;color: #E70519;text-align: center;font-size: 39px;margin-top: 10%;}
      .videos{font-family: Frutiger-Bold;color: #243259;font-size: 30px;font-weight: bold;margin-top: 30px;}
      .image {position: relative;width: 100%;}
      .txt-banner {font-family: Frutiger-Black;position: absolute;color: #fff;right: 11%;top: 8%;font-size: 22px;text-align: center;}
      .contenedor{margin: 30px 15px;}
      @font-face {
        font-family: NewJune-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/corega/fonts/NewJune-Bold.otf);
      }
      @font-face {
        font-family: FrutigerLTStd-Black;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/parodontax/fonts/FrutigerLTStd-Black.otf);
      }
      @font-face {
        font-family: FrutigerLTStd-Light;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/parodontax/fonts/FrutigerLTStd-Light.otf);
      }
      @font-face {
        font-family: FrutigerLTStd-BoldItalic;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/parodontax/fonts/FrutigerLTStd-BoldItalic.otf);
      }
      @font-face {
        font-family: Frutiger-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/parodontax/fonts/Frutiger-Bold.otf);
      }
      @font-face {
        font-family: Frutiger-Black;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/parodontax/fonts/Frutiger-Black.otf);
      }
  	</style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
  <section>
      <div data-role="navbar">
        <ul class="menu-movil">
          <li class="sensibilidad"><a class="item"  href="<?= Yii::app()->request->baseUrl ?>/sensodyne" data-ajax="false">SENSIBILIDAD</a></li>
          <li class="encias"><a class="item" href="<?= Yii::app()->request->baseUrl ?>/parodontax" data-ajax="false">ENCÍAS</a></li>
          <li class="protesis"><a class="item"  href="<?= Yii::app()->request->baseUrl ?>/corega" data-ajax="false">PRÓTESIS</a></li>
        </ul>
      </div>
  </section>
  <section>
      <img class="logo-parodontax-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/logo-parodontax.png" alt="">
  </section>
  <section>
    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle ">
        <div class="item">
          <div class="image">
            <p class="txt-banner">¿Has visto <br> <span>sangre</span> cuando <br> te <span>cepillas</span>?</p>
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/banner-parodontax.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="image">
            <p class="txt-banner">Deberías <br>saber que <br>el <span>sangrado</span>...</p>
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/banner-parodontax.png" alt="">
          </div>
        </div>
        <div class="item">
          <div class="image">
            <p class="txt-banner">Es un signo <br> de problemas <br> <span>en las encias</span></p>
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/banner-parodontax.png" alt="">
          </div>
        </div>
    </div>
  </section>
  <section>
    <div class="space-m"></div>
    <a href="#"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive compra-online-m" alt="Comprar Parodontax en la rebaja virtual"></a>
  </section>
  <section class="contenedor">
    <h1 class="title-principal-m">Parodontax ®</h1>
    <p class="parrafos-m">Utilizarla diariamente ayuda a remover la placa, prevenir y controlar el sangrado de encías.</p>
  </section>
  <section class="contenedor">
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/empaque-parodontax.png" class="img-responsive" alt="Comprar Parodontax en la rebaja virtual">
    <p class="copy-m">*Ayuda a prevenir la aparición de caries,<br>ya que combina sus ingredientes con flúor. </p>
  </section>
  <section class="bg-line-m">
    <p class="descripcion-m"><span class="titulo-m">Parodontax® Whitening </span> <br>
    Es una crema dental de uso diario que ayuda a prevenir<br>
    y proteger contra el sangrado de encías, mientras ayuda<br>
    a devolver el blanco natural de los dientes, eliminando<br>
    suavemente las manchas superficiales.</p>
  </section>
  <section>
    <img style="width: 75%;margin: -40px 10%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/parodontax.png" class="img-responsive" alt="">
  </section>
  <section class="row">
    <p class="formula" style="font-size: 20px;margin-top: 18%;">*Posee una fórmula con 70% <br>de ingredientes especializados</p>
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/mujer.jpg" class="img-responsive" alt="">
  </section>
  <section class="row">
    <a href="#"><img style="margin: 35px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive compra-online-m" alt="Comprar Parodontax en la rebaja virtual"></a>
  </section>
  <section class="row">
    <iframe width="100%" height="210" src="https://www.youtube.com/embed/A9Dbnbk_P_s" frameborder="0" allowfullscreen></iframe>
  </section>
  <section>
    <p class="videos contenedor">VIDEOS</p>
    <video width="100%" height="210" poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video1.jpg" controls>
      <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video1.webm" type="video/webm">
    </video>
    <video width="100%" height="210" poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video2.jpg" controls>
      <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video2.webm" type="video/webm">
    </video>
  </section>

  <section>
      <div class="footer">&copy; <?=date('Y')?> Grupo de empresas GSK. Todos los derechos reservados.</div>
  </section>


<!-- Fin Version movil-->













<?php else: ?>
<!--Versión escritorio-->
<div class="container-fluid">
  <div class="row header">
    <div class="col-md-4 cont-sensibilidad ">
      <div class="menu sensibilidad"><a href="<?= Yii::app()->request->baseUrl ?>/sensodyne">SENSIBILIDAD</a></div>
    </div>
    <div class="col-md-4 cont-encias">
        <div class="menu encias"><a href="<?= Yii::app()->request->baseUrl ?>/parodontax">ENCÍAS</a></div>
    </div>
    <div class="col-md-4 cont-protesis">
      <div class="menu protesis"><a href="<?= Yii::app()->request->baseUrl ?>/corega">PRÓTESIS</a></div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/logo-parodontax.png" class="img-responsive logo-parodontax" alt="Parodontax">
  </div>
  <div class="row">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/banner-parodontax.png" class="img-responsive" alt="¿Has visto sangre cuando te cepillas?">
          <div class="carousel-caption">
              <p>¿Has visto <br> <span>sangre</span> cuando <br> te <span>cepillas</span>?</p>
          </div>
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/banner-parodontax.png" class="img-responsive" alt="¿Has visto sangre cuando te cepillas?">
          <div class="carousel-caption">
              <p>Deberías <br>saber que <br>el <span>sangrado</span>...</p>
          </div>
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/banner-parodontax.png" class="img-responsive" alt="¿Has visto sangre cuando te cepillas?">
          <div class="carousel-caption">
              <p>Es un signo <br> de problemas <br> <span>en las encias</span></p>
          </div>
        </div>
      </div>
      <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev"><i class="prev-slide"></i></a>
      <a class="carousel-control right" href="#carousel-example-generic" data-slide="next"><i class="next-slide"></i></a>
    </div>
  </div>
  <div class="row">
    <a href="#"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive compra-online" alt="Comprar Parodontax en la rebaja virtual"></a>
  </div>
  <div class="row" style="margin: 30px 0px;">
    <div class="col-md-4"></div>
    <div class="col-md-8 intro">
      <h1 class="title-principal">Parodontax ®</h1>
      <p class="parrafos">Utilizarla diariamente ayuda a remover la placa, <br> prevenir y controlar el sangrado de encías.</p>
    </div>
  </div>

    <div class="row bg-line" style="margin: 45px 0px;">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/empaque-parodontax.png" class="img-responsive" alt="Comprar Parodontax en la rebaja virtual">
        </div>
        <div class="col-md-6">
          <p class="copy">*Ayuda a prevenir la aparición de caries,<br>ya que combina sus ingredientes con flúor. </p>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-12">
          <p class="descripcion"><span class="titulo">Parodontax® Whitening </span> <br>
          Es una crema dental de uso diario que ayuda a prevenir<br>
          y proteger contra el sangrado de encías, mientras ayuda<br>
          a devolver el blanco natural de los dientes, eliminando<br>
          suavemente las manchas superficiales.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <img style="width: 41%;margin: 0 10%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/parodontax.png" class="img-responsive" alt="">
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-7">
        <p class="formula">*Posee una fórmula con 70% <br>de ingredientes especializados</p>
      </div>
        <div class="col-md-5">
          <img style="width: 80%;margin-top: -15%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/Parodontax/mujer.jpg" class="img-responsive" alt="">

        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <a href="#"><img style="margin: 35px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive compra-online" alt="Comprar Parodontax en la rebaja virtual"></a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <center>
          <iframe width="100%" height="600" src="https://www.youtube.com/embed/A9Dbnbk_P_s" frameborder="0" allowfullscreen></iframe>
        </center>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12"><p class="videos">VIDEOS</p></div>
      <div class="col-md-6">
        <video width="100%" height="320" poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video1.jpg" controls>
          <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video1.webm" type="video/webm">
        </video>
      </div>
      <div class="col-md-6">
        <video width="100%" height="320" poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video2.jpg" controls>
          <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/parodontax/video2.webm" type="video/webm">
        </video>
      </div>
    </div>


</div>

<div class="container footer">&copy; <?=date('Y')?> Grupo de empresas GSK. Todos los derechos reservados.</div>
    <!--Fin versión escritorio-->
<?php endif; ?>
