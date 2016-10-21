
<?php $this->pageTitle = "Corega | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Los productos Corega® le ayudan a cuidar sus prótesis dentales y a sentirse cómodo. Puede usar Corega® todos los días sin importar el estado de su prótesis.'>
    <meta name='keywords' content='prótesis dentales, Corega, adhesivos dentales.'>
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
      .carousel .item { max-height: initial !important;}
      blockquote {border-left:none !important; border-top:2px solid #C7C7C7;border-bottom:2px solid #C7C7C7;}
      .bloque {padding:15px 0px;margin: 15px 0px;}
      blockquote span {color:#00ACAA;}
      .bloque span {color:#00ACAA;}
      blockquote p {color:#8F9092;}
      .bloque p {color:#8F9092;}
      blockquote .primer-parrafo {font-size:76px;font-family: Gotham-Bold;}
      .bloque .primer-parrafo-m {font-size:21px;font-family: Gotham-Bold;margin: 0px;text-align:center;}
      blockquote .segundo-parrafo {font-size: 47px;margin:0px;font-family: Gotham-Bold;}
      .bloque .segundo-parrafo {font-size: 13px;margin:0px;font-family: Gotham-Bold;text-align:center;}
      .title-blue{background:#00ACAA;color:#fff;text-align:center;font-size:43px;font-family:Gotham-Book-Ita;}
      .footer {background-color:#F5F3F4;color:#7D7978;text-align:center;padding: 15px;margin-top: 20px;}
      .space{height:60px;}
      .space-m{height:30px;}
      .img-responsive {display: block;max-width: 100%;height: auto;}
      hr {border-top: 1px solid #C8C8C8 !important;}
      .contenedor {padding:0px 15px 0px 15px;}
      .bloque{border-top: 2px solid #C7C7C7;border-bottom: 2px solid #C7C7C7;}
      .title-blue-m {background: #00ACAA; color: #fff; text-align: center; font-size: 14px; font-family: Gotham-Book-Ita; padding: 15px 0px;}
      .menu-movil .item {font-family: NewJune-Bold;color:#fff;letter-spacing: 1px;font-size: 11px !important;}
      @font-face {
        font-family: NewJune-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/corega/fonts/NewJune-Bold.otf);
      }
      @font-face {
        font-family: Gotham-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/corega/fonts/Gotham-Bold.otf);
      }
      @font-face {
        font-family: Gotham-Book-Ita;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/corega/fonts/Gotham-Book-Ita.otf);
      }
  	</style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
  <section>

      <div data-role="navbar">
        <ul class="menu-movil">
          <li class="sensibilidad"><a class="item"  href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/sensodyne" data-ajax="false">SENSIBILIDAD</a></li>
          <li class="encias"><a class="item" href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/parodontax" data-ajax="false">ENCÍAS</a></li>
          <li class="protesis"><a class="item"  href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/corega" data-ajax="false">PRÓTESIS</a></li>
        </ul>
      </div>

  </section>
  <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle ">
      <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/banner-corega01.jpg" alt=""></div>
      <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/banner-corega02.jpg" alt=""></div>
      <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/banner-corega03.jpg" alt=""></div>
  </div>
  <div class="contenedor">
    <section>
      <div class="space-m"></div>
      <a href="#"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive" alt="Comprar Corega en la rebaja virtual"></a>
    </section>
    <section>
      <div class="bloque">
        <p class="primer-parrafo-m">LA MARCA <span>#1 EN COLOMBIA </span></p>
        <p class="segundo-parrafo">EN EL CUIDADO DE LAS PRÓTESIS DENTALES</p>
      </div>
    </section>
  </div>
  <section>
    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle ">
        <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner1.jpg" alt=""></div>
        <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner2.jpg" alt=""></div>
        <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner3.jpg" alt=""></div>
        <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner4.jpg" alt=""></div>
    </div>
  </section>
  <div class="contenedor">
    <section>
      <div class="space-m"></div>
      <a href="#"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive" alt="Comprar Corega en la rebaja virtual"></a>
      <div class="space-m"></div>
      <iframe width="100%" height="250" src="https://www.youtube.com/embed/Lk20DhBIzHo" frameborder="0" allowfullscreen></iframe>
    </section>
  </div>
  <section>
      <div class="title-blue-m">Con Corega® vuelve a disfrutar cada momento</div>
      <div class="footer">&copy; <?=date('Y')?> Grupo de empresas GSK. Todos los derechos reservados.</div>
  </section>



<!-- Fin Version movil-->

<?php else: ?>
<!--Versión escritorio-->
<div class="container-fluid">
  <div class="row header">
    <div class="col-md-4 cont-sensibilidad ">
      <div class="menu sensibilidad"><a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/sensodyne">SENSIBILIDAD</a></div>
    </div>
    <div class="col-md-4 cont-encias">
        <div class="menu encias"><a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/parodontax">ENCÍAS</a></div>
    </div>
    <div class="col-md-4 cont-protesis">
      <div class="menu protesis"><a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/corega">PRÓTESIS</a></div>
    </div>
  </div>
  <div class="row">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/banner-corega01.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/banner-corega02.jpg" class="img-responsive" alt="Disfruta con toda - Corega de venta en La Rebaja virtual">
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/banner-corega03.jpg" class="img-responsive" alt="Ríe con toda - Corega de venta en La Rebaja virtual">
        </div>
      </div>
      <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev"><i class="prev-slide"></i></a>
      <a class="carousel-control right" href="#carousel-example-generic" data-slide="next"><i class="next-slide"></i></a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="space"></div>
    <a href="#"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive" alt="Comprar Corega en la rebaja virtual"></a>
    <div class="space"></div>
  </div>
  <div class="row">
      <blockquote>
        <p class="primer-parrafo">LA MARCA <span>#1 EN COLOMBIA </span></p>
        <p class="segundo-parrafo">EN EL CUIDADO DE LAS PRÓTESIS DENTALES</p>
      </blockquote>
      <div class="space"></div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div id="sub-banner" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#sub-banner" data-slide-to="0" class="active"></li>
        <li data-target="#sub-banner" data-slide-to="1"></li>
        <li data-target="#sub-banner" data-slide-to="2"></li>
        <li data-target="#sub-banner" data-slide-to="3"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner1.jpg" class="img-responsive" alt="Adhesivos Ultra Corega">
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner2.jpg" class="img-responsive" alt="Corega crema adhesiva sin sabor">
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner3.jpg" class="img-responsive" alt="Corega crema adhesiva sabor Menta">
        </div>
        <div class="item">
          <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/subbanner4.jpg" class="img-responsive" alt="Limpiador Corega Tabs">
        </div>
      </div>
      <a class="carousel-control left" href="#sub-banner" data-slide="prev"><i class="prev-slide"></i></a>
      <a class="carousel-control right" href="#sub-banner" data-slide="next"><i class="next-slide"></i></a>
    </div>
    <hr></hr>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="space"></div>
    <a href="#"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/corega/boton-comprar.png" class="img-responsive" alt="Comprar Corega en la rebaja virtual"></a>
    <div class="space"></div>
    <iframe width="100%" height="450" src="https://www.youtube.com/embed/Lk20DhBIzHo" frameborder="0" allowfullscreen></iframe>
    <div class="space"></div>
    <div class="title-blue">Con Corega® vuelve a disfrutar cada momento</div>
  </div>
</div>
<div class="container-fluid footer">&copy; <?=date('Y')?> Grupo de empresas GSK. Todos los derechos reservados.</div>

    <!--Fin versión escritorio-->
<?php endif; ?>
