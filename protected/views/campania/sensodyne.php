
<?php $this->pageTitle = "Sensodyne | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='La crema dental Sensodyne recomendada por odontólogos que actúa para aliviar las molestias causadas por dientes sensibles y brindar protección duradera.'>
    <meta name='keywords' content='Dientes sensibles, sensibilidad dental, crema dental.'>
  	<style>
    body{overflow-x: hidden;}
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
      @font-face {
        font-family: futura-light;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/fonts/futura-light.otf);
      }
      @font-face {
        font-family: HelveticaNeue-Thin;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/fonts/HelveticaNeue-Thin.otf);
      }
      @font-face {
        font-family: FuturaStd-Medium;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/fonts/FuturaStd-Medium.otf);
      }
      @font-face {
        font-family: futuraStd-bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/fonts/futuraStd-bold.otf);
      }
      .header{margin-top:30px;}
      .header a {color:#fff;}
      .header-movil a {color:#fff;text-decoration: none;}
      .header a:hover, a:visited , a:active , a:focus {color:#fff !important;}
      .header-movil a:hover, a:visited , a:active , a:focus {color:#fff !important;}
      .menu {text-align:center;font-family: NewJune-Bold;font-size: 42px;border-radius: 0 100px 0 0;border-right: 6px solid #fff;border-top: 6px solid #fff;}
      .menu-m {text-align: center; font-family: NewJune-Bold;font-size: 27px;border-bottom: 2px solid #fff;padding:5px;}
      .menu-movil .item {font-family: NewJune-Bold;color:#fff;letter-spacing: 1px;font-size: 11px !important;}
      .cont-sensibilidad{z-index: 11;padding:0px !important;}
      .sensibilidad{background-color:#01317D;}
      .cont-encias{z-index: 10;padding:0px !important;}
      .encias{background-color:#E3201E;margin-left: -39px;}
      .cont-protesis{z-index: 9;padding:0px !important;}
      .protesis{background-color:#60BAC2;margin-left: -53px;}
      .carousel .item { max-height: initial !important;}
      .img-responsive {display: block;max-width: 100%;height: auto;}
      .contenedor {padding:0px 15px 0px 15px;}
      .space {height:30px;}
      .section-blue{background-color:#222D5B;font-family:futura-light; color:#fff;text-align:center;padding: 70px;}
      .section-blue span {font-size:63px;}
      .section-blue span::before {content:url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/apertura.png);}
      .section-blue span::after {content:url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/cierre.png);}
      .section-blue p {font-size: 62px;line-height: 73px;}
      .section-blue-m{background-color:#222D5B;font-family:futura-light; color:#fff;text-align:center;padding: 20px 8px;}
      .section-blue-m span {font-size:27px;}
      .section-blue-m span::before {content:url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/apertura-m.png);}
      .section-blue-m span::after {content:url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/cierre-m.png);}
      .section-blue-m p {font-size: 26px;line-height: 29px;}
      .video {text-transform:uppercase; font-family: futuraStd-bold;}
      .section-compra{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/sonrrisa.png);background-position: center center;background-size:cover}
      .compra {width: 50%;margin: 0 auto;}
      .footer {background-color:#F5F3F4;color:#7D7978;text-align:center;padding: 15px;margin-top: 20px;}
      .carousel-inner{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/bg-slide.jpg);background-position: center bottom;height: 410px;}
      .caroulsel-inner p,li{color:#686465;}
      .title-slide{color:#085394;font-family: HelveticaNeue-Thin;}
      .title-slide.principal{font-size: 35px;border-bottom: 1px solid #DCDCDC;margin: 50px 19px;}
      .carousel-indicators {right: 50% !important;left: 0% !important;width: 80% !important;}
      .carousel-indicators .active {width: 20px !important;height: 20px !important;margin: 0 !important;background-color: #fff !important;border: 2px solid #525252 !important;}
      .carousel-indicators li {width: 20px !important;height: 20px !important; background-color: #B3B3B3 !important;border: 2px solid #525252 !important;}
      .image {position: relative;width: 100%; }
      .image .m {top: 8% !important;font-size: 16px !important;}
      .image .m2 {top: 25% !important;left: 4%;font-size: 16px !important;}
      .image .m3 {top: 19% !important;left: 20%;font-size: 24px !important;line-height: 24px;}
      .image .pay {top: -2% !important;left: 62%;}
      .image p { position: absolute;top: 24%;left: 15%; width: 100%; font-family: FuturaStd-Medium;color: #162667;font-size: 35px; text-align: center;}
      .two p { position: absolute;top: 40%;left: 8%;width: 100%;font-family: FuturaStd-Medium;color: #162667;font-size: 38px;text-align: left;}
      .three p { position: absolute;top: 37%;left: 19%;width: 100%;font-family: FuturaStd-Medium;color: #162667;font-size: 55px;text-align: center;line-height: 50px;}
      ul { list-style: none }
      ul.ok {list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/sensodyne/check.png);padding: 0px;margin: 0px 10px;}
      .owl-theme .owl-controls .owl-page.active span {background-color: #FFFFFF !important;border:2px solid #535353;}
      .owl-theme .owl-controls .owl-page span {background-color: #B3B3B3 !important;border:2px solid #535353;}
      .owl-pagination {margin: 20px;}
  	</style>
    ";
?>
<!--autoHeight slides productos en movil-->
<script type='text/javascript'>
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        items:1,
        margin:10,
        autoHeight:true
    });
  });
</script>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
  <section>
      <div data-role="navbar">
        <ul class="menu-movil">
          <li class="sensibilidad"><a class="item"  href="<?= Yii::app()->request->baseUrl ?>//sensodyne" data-ajax="false">SENSIBILIDAD</a></li>
          <li class="encias"><a class="item" href="<?= Yii::app()->request->baseUrl ?>/parodontax" data-ajax="false">ENCÍAS</a></li>
          <li class="protesis"><a class="item"  href="<?= Yii::app()->request->baseUrl ?>/corega" data-ajax="false">PRÓTESIS</a></li>
        </ul>
      </div>
  </section>
  <section>
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/banner-sensodyne.jpg" class="img-responsive" alt="Sensodyne La rebaja virtual">
  </section>
  <section>
    <a href="#"><img style="width: 90%;margin: 15px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/boton-compra.png" class="img-responsive" alt="Comprar Corega en la rebaja virtual"></a>
  </section>
  <section>
    <div class="image">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section1.jpg" class="img-responsive" alt="">
      <p class="m"> Si has notado un corrientazo <br>o destemple en tus dientes <br>al hacer esto <strong>no es normal.</strong> </p>
    </div>
    <div class="image two">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section2.jpg" class="img-responsive" alt="">
      <p class="m2"><strong>#Bienvenido</strong><br> a un mundo donde puedes reir,<br> disfrutar y vivir sin destemple</p>
    </div>
    <div class="image three">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section3.jpg" class="img-responsive" alt="">
      <p class="m3"><strong>¡Vive feliz,</strong><br>vive sin<br>corrientazos!</p>
    </div>
  </section>
  <section class="section-blue-m">
    <p>
      <span> Vidas libres de sensibilidad </span>
    </p>
  </section>
  <section>
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section4.jpg" class="img-responsive" alt="">
  </section>
  <section>
    <div class="owl-carousel owl-theme owl-productodetalle ">
        <!--slide1-->
        <div class="item" style="padding:30px;">
          <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/1-blanqueador-repara-proteje.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          <h2 class="title-slide">Sensodyne®<br>Blanqueador, Repara & Protege </h2>
          <p>Sensodyne® Blanqueador Repara & Protege Tecnología NOVAMIN TM Repara las áreas sensibles de los dientes, mientras ayuda a devolverles el blanco natural.  </p>
            <ul class="ok">
              <li>Alivio a la sensibilidad</li>
              <li>Protección anticaries</li>
              <li>Aliento fresco</li>
              <li>Protección prolongada de la sensibilidad</li>
            </ul>
        </div>
        <!--slide2-->
        <div class="item" style="padding:30px;">
          <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/2-repara-proteje-2.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          <h2 class="title-slide">Sensodyne®<br>Repara & Protege </h2>
          <p>Sensodyne® Repara & Protege, fórmula única y clínicamente comprobada que ayuda a reparar* las áreas sensibles del diente, formando una capa protectora encima
          que ayuda a proteger el dientes de la sensibilidad. </p>
            <ul  class="ok">
              <li>Alivio a la sensibilidad</li>
              <li>Protección anticaries</li>
              <li>Aliento fresco</li>
              <li>Protección prolongada de la sensibilidad</li>
            </ul>
        </div>
        <!--slide3-->
        <div class="item" style="padding:30px;">
          <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/3-rapido-alivio.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          <h2 class="title-slide">Sensodyne®<br>Rápido Alivio </h2>
          <p>Sensodyne® Rápido Alivio, proporciona alivio rápido clínicamente comprobado para dientes sensibles, actuando en sólo 60 segundos para aliviar las molestias de los dientes sensibles,
          cuando se aplica directamente con la yema del dedo durante un minuto. Esto debido a que su fórmula crea un sello físico contra los desencadenantes de la sensibilidad.
          Cuando se utiliza dos veces al día, brinda protección duradera contra la sensibilidad.<br>
          *Siguiendo las instrucciones del empaque</p>
            <ul  class="ok">
              <li>Alivio a la sensibilidad en solo 60 segundos</li>
              <li>Protección contra las caries</li>
              <li>Protección duradera de la sensibilidad dental</li>
            </ul>
        </div>
        <!--slide4-->
        <div class="item" style="padding:30px;">
          <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/4-blanqueador-extrafresh.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          <h2 class="title-slide">Sensodyne®<br>Diaria Blanqueadora Extra Fresh</h2>
          <p>Sensodyne® Diaria Blanqueadora Extra Fresh, es una crema dental de uso diario específicamente formulada para personas con dientes sensibles. Contiene Trifosfato
          Pentasódico que  ayuda a devolver el blanco natural de los dientes y flúor que ayuda a fortalecer los dientes y prevenir las caries*. Cepilla tus dientes dos veces al día diariamente con Sensodyne para controlar y ayudar a prevenir la sensibilidad dental.<br>
          *Cepillandose dos veces al día.
          </p>
            <ul  class="ok">
              <li>Alivio a la sensibilidad</li>
              <li>Protección contra las caries</li>
              <li>Blanqueadora</li>
              <li>Protección duradera de la sensibilidad dental</li>
              <li>Ayuda a devolver el blanco natural a los dientes</li>
              <li>Refresca el aliento</li>
            </ul>
        </div>
        <!--slide5-->
        <div class="item" style="padding:30px;">
          <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/5-multiproteccion.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          <h2 class="title-slide">Sensodyne®<br>Diaria Multi Protección</h2>
          <p>Sensodyne® Diaria Multi Protección es una crema dental de uso diario específicamente formulada para personas con dientes sensibles. Contiene flúor para proteger, fortalecer
          y proveer alivio continuo a dientes sensibles* y ayuda a mantener la salud de las encías.<br> Además ayuda a proteger contra las caries. Cepille dos veces al día diariamente para
          ayudar a controlar y prevenir la sensibilidad dental.<br>
          * Cepillándose dos veces al día </p>
            <ul  class="ok">
              <li>Alivio a la sensibilidad</li>
              <li>Protección contra las caries</li>
              <li>Blanqueadora</li>
              <li>Protección duradera de la sensibilidad dental</li>
              <li>Ayuda a devolver el blanco natural a los dientes</li>
              <li>Refresca el aliento</li>
            </ul>
        </div>
        <!--slide6-->
        <div class="item" style="padding:30px;">
          <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/6-original.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          <h2 class="title-slide">Sensodyne®<br>Diaria Multi Protección</h2>
          <p>Sensodyne® Original esta específicamente formulada para dientes sensibles. Contiene cloruro de estroncio y es la fórmula original sin flúor de Sensodyne;
            ideal para personas que no toleran el flúor y necesitan aliviar la sensibilidad dental.<br>
          * Cepillándose dos veces al día </p>
            <ul  class="ok">
              <li>Alivio a la sensibilidad</li>
              <li>Sin flúor</li>
              <li>Protección duradera de la sensibilidad dental</li>
            </ul>
        </div>
    </div>
  </section>
  <section>
    <div class="image">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/sonrrisa.png" class="img-responsive" alt="">
      <p class="pay"><a href="#"><img style="width:30%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/compra-online.png" class="img-responsive" alt=""></a></p>
    </div>
  </section>
  <section style="padding:22px ;">
    <h2 class="video">Videos</h2>
    <div class="col-sm-4 col-md-4">
      <iframe width="100%" height="210" src="https://www.youtube.com/embed/QGicShMZYqM" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="col-sm-4 col-md-4">
      <iframe width="100%" height="210" src="https://www.youtube.com/embed/HOQa34M4E44" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="col-sm-4 col-md-4">
      <video poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/video3.jpg" width="100%" height="210"  controls>
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/sensodyne-repara-y-protege-modo-de acción.webm" type="video/webm">
        Your browser does not support HTML5 video.
      </video>
    </div>
  </section>
  <section class="footer"><p style="font-size:14px ;">&copy; <?=date('Y')?> Grupo de empresas GSK. Todos los derechos reservados.</p></section>

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
  <div class="row">
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/banner-sensodyne.jpg" class="img-responsive" alt="Sensodyne La rebaja virtual">
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="space"></div>
    <a href="#"><img style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/boton-compra.png" class="img-responsive" alt="Comprar Corega en la rebaja virtual"></a>
    <div class="space"></div>
  </div>
</div>
<div class="container-fluid" >
  <div class="row">
    <div class="image">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section1.jpg" class="img-responsive" alt="">
      <p> Si has notado un corrientazo <br>o destemple en tus dientes <br>al hacer esto <strong>no es normal.</strong> </p>
    </div>
    <div class="image two">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section2.jpg" class="img-responsive" alt="">
      <p><strong>#Bienvenido</strong><br> a un mundo donde puedes reir,<br> disfrutar y vivir sin destemple</p>
    </div>
    <div class="image three">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section3.jpg" class="img-responsive" alt="">
      <p><strong>¡Vive feliz,</strong><br>vive sin<br>corrientazos!</p>
    </div>
  </div>
  <div class="row section-blue">
    <p>
      <span>Vidas libres de sensibilidad</span>
    </p>
  </div>
  <div class="row">
    <!-- <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section4.jpg" class="img-responsive" alt=""> -->
    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
      </ol>
      <p class="title-slide principal">Elige tu Sensodyne </p>
      <div class="carousel-inner">
        <!--slide0-->
        <div class="item active">
           <div class="col-sm-12 col-md-12">
              <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/section4.jpg" class="img-responsive" alt="">
          </div>
        </div>
        <!--slide1-->
        <div class="item">
           <div class="col-sm-6 col-md-6">
             <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/1-blanqueador-repara-proteje.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
           </div>
           <div class="col-sm-6 col-md-6">
               <h2 class="title-slide">Sensodyne®<br>Blanqueador, Repara & Protege </h2>
               <p>Sensodyne® Blanqueador Repara & Protege Tecnología NOVAMIN TM <br>Repara las áreas sensibles de los dientes, mientras ayuda a devolverles el blanco natural.  </p>
               <div class="col-md-4">
                 <ul class="ok">
                   <li>Alivio a la sensibilidad</li>
                   <li>Protección anticaries</li>
                 </ul>
               </div>
               <div class="col-md-8">
                 <ul  class="ok">
                   <li>Aliento fresco</li>
                   <li>Protección prolongada de la sensibilidad</li>
                 </ul>
               </div>
           </div>
        </div>
        <!--slide2-->
        <div class="item">
          <div class="col-sm-6 col-md-6">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/2-repara-proteje-2.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          </div>
          <div class="col-sm-6 col-md-6">
              <h2 class="title-slide">Sensodyne®<br>Repara & Protege </h2>
              <p>Sensodyne® Repara & Protege, fórmula única y clínicamente comprobada que ayuda <br>
              a reparar* las áreas sensibles del diente, formando una capa protectora encima <br>
              que ayuda a proteger el dientes de la sensibilidad.  </p>
              <div class="col-md-4">
                <ul  class="ok">
                  <li>Alivio a la sensibilidad</li>
                  <li>Protección anticaries</li>
                </ul>
              </div>
              <div class="col-md-8">
                <ul  class="ok">
                  <li>Aliento fresco</li>
                  <li>Protección prolongada de la sensibilidad</li>
                </ul>
              </div>
          </div>
        </div>
        <!--slide3-->
        <div class="item">
          <div class="col-sm-6 col-md-6">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/3-rapido-alivio.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          </div>
          <div class="col-sm-6 col-md-6">
              <h2 class="title-slide">Sensodyne®<br>Rápido Alivio </h2>
              <p>Sensodyne® Rápido Alivio, proporciona alivio rápido clínicamente comprobado para dientes <br> sensibles, actuando en sólo 60 segundos para aliviar las molestias de los dientes sensibles,<br>
                cuando se aplica directamente con la yema del dedo durante un minuto. Esto debido a que <br> su fórmula crea un sello físico contra los desencadenantes de la sensibilidad.<br>
                Cuando se utiliza dos veces al día, brinda protección duradera contra la sensibilidad.<br>
                *Siguiendo las instrucciones del empaque</p>
              <div class="col-md-6">
                <ul  class="ok">
                  <li>Alivio a la sensibilidad en solo 60 segundos</li>
                  <li>Protección contra las caries</li>
                </ul>
              </div>
              <div class="col-md-5">
                <ul  class="ok">
                  <li>Protección duradera<br>de la sensibilidad dental</li>
                </ul>
              </div>
          </div>
        </div>
        <!--slide4-->
        <div class="item">
          <div class="col-sm-6 col-md-6">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/4-blanqueador-extrafresh.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          </div>
          <div class="col-sm-6 col-md-6">
              <h2 class="title-slide">Sensodyne®<br>Diaria Blanqueadora Extra Fresh</h2>
              <p>Sensodyne® Diaria Blanqueadora Extra Fresh, es una crema dental de uso diario<br> específicamente formulada para personas con dientes sensibles. Contiene Trifosfato <br>
                 Pentasódico que  ayuda a devolver el blanco natural de los dientes y flúor que ayuda <br> a fortalecer los dientes y prevenir las caries*. Cepilla tus dientes dos veces al día <br>
                diariamente con Sensodyne para controlar y ayudar a prevenir la sensibilidad dental.<br>
                *Cepillandose dos veces al día.
                </p>
              <div class="col-md-5">
                <ul  class="ok">
                  <li>Alivio a la sensibilidad</li>
                  <li>Protección contra las caries</li>
                  <li>Blanqueadora</li>
                </ul>
              </div>
              <div class="col-md-7">
                <ul  class="ok">
                  <li>Protección duradera de la sensibilidad dental</li>
                  <li>Ayuda a devolver el blanco natural a los dientes</li>
                  <li>Refresca el aliento</li>
                </ul>
              </div>
          </div>
        </div>
        <!--slide5-->
        <div class="item">
          <div class="col-sm-6 col-md-6">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/5-multiproteccion.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          </div>
          <div class="col-sm-6 col-md-6">
              <h2 class="title-slide">Sensodyne®<br>Diaria Multi Protección</h2>
              <p>Sensodyne® Diaria Multi Protección es una crema dental de uso diario específicamente <br>formulada para personas con dientes sensibles. Contiene flúor para proteger, fortalecer<br>
            y proveer alivio continuo a dientes sensibles* y ayuda a mantener la salud de las encías.<br> Además ayuda a proteger contra las caries. Cepille dos veces al día diariamente para
            ayudar a controlar y prevenir la sensibilidad dental.
            * Cepillándose dos veces al día </p>
              <div class="col-md-5">
                <ul  class="ok">
                  <li>Alivio a la sensibilidad</li>
                  <li>Protección contra las caries</li>
                  <li>Blanqueadora</li>
                </ul>
              </div>
              <div class="col-md-7">
                <ul  class="ok">
                  <li>Protección duradera de la sensibilidad dental</li>
                  <li>Ayuda a devolver el blanco natural a los dientes</li>
                  <li>Refresca el aliento</li>
                </ul>
              </div>
          </div>
        </div>
        <!--slide6-->
        <div class="item">
          <div class="col-sm-6 col-md-6">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/6-original.jpg" class="img-responsive" alt="Ama con toda - Corega de venta en La Rebaja virtual">
          </div>
          <div class="col-sm-6 col-md-6">
              <h2 class="title-slide">Sensodyne®<br>Diaria Multi Protección</h2>
              <p>Sensodyne® Original esta específicamente formulada para dientes sensibles. Contiene <br>
                cloruro de estroncio y es la fórmula original sin flúor de Sensodyne; ideal para personas<br>
                que no toleran el flúor y necesitan aliviar la sensibilidad dental.<br>
                * Cepillándose dos veces al día </p>
              <div class="col-md-4">
                <ul  class="ok">
                  <li>Alivio a la sensibilidad</li>
                  <li>Sin flúor</li>
                </ul>
              </div>
              <div class="col-md-8">
                <ul  class="ok">
                  <li>Protección duradera de la sensibilidad dental</li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="space"></div>
    <div class="space"></div>
  </div>
  <div class="row section-compra">
    <div class="space"></div>
    <div class="col-sm-6 col-md-6"></div>
    <div class="col-sm-6 col-md-6">
      <div class="space"></div>
      <div class="space"></div>
        <center>
          <a href="#">
            <img class="compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/compra-online.png" class="img-responsive" alt="Compra Sensodyne en la Rebaja Virtual">
          </a>
        </center>
      <div class="space"></div>
      <div class="space"></div>
    </div>
  </div>
  <div class="row">
    <div class="container">
    <h2 class="video">Videos</h2>
    <div class="col-sm-4 col-md-4">
      <iframe width="100%" height="210" src="https://www.youtube.com/embed/QGicShMZYqM" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="col-sm-4 col-md-4">
      <iframe width="100%" height="210" src="https://www.youtube.com/embed/HOQa34M4E44" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="col-sm-4 col-md-4">
      <video poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/video3.jpg" width="100%" height="210"  controls>
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sensodyne/sensodyne-repara-y-protege-modo-de acción.webm" type="video/webm">
        Your browser does not support HTML5 video.
      </video>
    </div>
  </div>
  </div>
</div>


<div class="container-fluid footer">&copy; <?=date('Y')?> Grupo de empresas GSK. Todos los derechos reservados.</div>

    <!--Fin versión escritorio-->
<?php endif; ?>
