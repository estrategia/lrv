<?php $this->pageTitle = "Cicatricure - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Luce una piel joven y bella con Cicatricure, la ciencia que cuida tu piel. Descubre todos los beneficios de los productos Cicatricure. '>
  <meta name='keywords' content='cicatricure, cicatricure gel, cicatricure beauty care.'>
	<style>
    @font-face { font-family:NeutraText-DemiItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/NeutraText-DemiItalic.otf);}
    @font-face { font-family:OpenSans-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/OpenSans-Light.ttf);}
    @font-face { font-family:NeutraText-BoldItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/NeutraText-BoldItalic.otf);}
    @font-face { font-family:NeutraText-BookItalicAlt; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/NeutraText-BookItalicAlt.otf);}
    @font-face { font-family:NeutraText-LightAlt; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/NeutraText-LightAlt.ttf);}
    @font-face { font-family:NeutraText-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cicatricure/font/NeutraText-Bold.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 15%;}
    .prev-slide {background-image:url('".Yii::app()->request->baseUrl."/images/contenido/cicatricure/flechas-slide.png') !important;background-position: 0px -13px !important;width: 60px !important;height: 60px !important;}
    .next-slide {background-image:url('".Yii::app()->request->baseUrl."/images/contenido/cicatricure/flechas-slide.png') !important;background-position: 0px 66px !important;width: 60px !important;height: 60px !important;}
    .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/cicatricure/background.png);background-size: cover;background-attachment: fixed;background-position:center;}
    .background .container {padding: 0px !important;}
    .bg-beauty {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/cicatricure/bg-beauty.png);background-size: cover;margin-top: 7%;-webkit-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);-moz-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);}
    .bg-cicatrices {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/cicatricure/bg-cicatrices.png);background-size: cover;margin-top: 45px;-webkit-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);-moz-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);}
    .bg-antiedad {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/cicatricure/bg-antiedad.png);background-size: cover;margin-top: 45px;-webkit-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);-moz-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.17);}
    .cicatrices {color:#67337E;margin-top:60px;}
    .antiedad {color:#B92C8C;width: 15% !important;margin: 30px auto 0 !important;}
    .bg-antiedad span {font-family: NeutraText-Bold;text-align: center;display: block;color: #E71B7C;font-size: 20px;}
    .bg-antiedad p {font-family: NeutraText-BookItalicAlt;text-align: center;color: #E71B7C;font-size: 15px;}
    .bg-antiedad .compra {margin-bottom: 25px;}
    .title-principal{font-family: NeutraText-DemiItalic;font-size: 33px;background-color: #fff;border-radius: 15px;padding: 10px 20px;width: 59%;margin-top: 35px;-webkit-box-shadow: -10px 10px 3px -7px rgba(0,0,0,0.22);-moz-box-shadow: -10px 10px 3px -7px rgba(0,0,0,0.22);box-shadow: -10px 10px 3px -7px rgba(0,0,0,0.22);}
    .beauty {color: #DF1A76;}
    .sub {font-family: NeutraText-DemiItalic;color: #E10E77;font-size: 15px;margin-top: 22px;display: block;}
    .lista{font-family: OpenSans-Light; color: #666;padding: 0px 10px;font-size: 14px;margin-top: 15px;}
    .result{font-family: NeutraText-BoldItalic;font-size: 14px;color: #E10E77;}
    .result-note {font-family:NeutraText-BookItalicAlt;color: #E10E77;}
    .compra {margin: 0 auto;width: 70%;display: block;}
    .producto {margin: 0 auto;display: block;}
    .thumbs:hover .producto{-webkit-transform: translateY(-5px);transform: translateY(-5px);-webkit-transition-duration: 0.3s;transition-duration: 0.3s;-webkit-transition-property: transform;transition-property: transform;}
    .beneficios {font-family: NeutraText-LightAlt;font-size: 34px;background-color: #E71B7C;color: #fff;text-align: center;border-radius: 15px;width: 62%;padding: 10px 80px;margin: 55px auto 30px;}
    #carousel-video {padding: 0px 60px;height: 360px !important;}
    .carousel .carousel-control {top: 35% !important;}
    .carousel-control.left {left: -50px !important;}
    .carousel-control.right {right: -50px !important;}
    .videoWrapper {position: relative;padding-bottom: 56.25%;padding-top: 25px;height: 0;}
    .videoWrapper iframe {position: absolute;top: 0;left: 0;width: 100%;height: 100%;}
    .img-responsive-m {width:100%;}
    .shadow{-webkit-box-shadow:0px 10px 5px -4px rgba(0,0,0,0.17);-moz-box-shadow: 0px 10px 5px -4px rgba(0,0,0,0.17);box-shadow: 0px 9px 5px -4px rgba(0,0,0,0.17);padding-bottom: 25px;}
    .shadow span {font-family: NeutraText-Bold;text-align: center;display: block;color: #E71B7C;font-size: 20px;}
    .shadow p {font-family: NeutraText-BookItalicAlt;text-align: center;color: #E71B7C;font-size: 15px;}
    .owl-theme .owl-controls .owl-page span {background-color: #E71B7C !important;border: 1px solid #fff;}
    .baner-principal{height: initial;}
    @media (min-width: 0px) and (max-width: 1100px) {
      .baner-principal{height: 402px;}
    }
    @media (min-width: 1100px) and (max-width: 1150px) {
      .baner-principal{height: 421px;}
    }
    @media (min-width: 1050px) and (max-width: 1200px) {
      .title-principal {font-size: 26px;margin-top: 13px;}
      .sub {margin-top: 17px;}
      .cicatrices {margin-top: 27px !important;}
      .beneficios {width: 75%;}
    }
    @media (min-width: 1150px) and (max-width: 1200px) {
      .baner-principal{height: 439px;}
    }
    @media (min-width: 1640px) and (max-width: 1920px) {
      .baner-principal{height: 689px;}
    }
</style>
";
?>
<!-- Funcionamiento para pausar el video -->
<script type='text/javascript'>
  $(document).ready(function(){
      $('#prev').click(function(){
          $("#video1").attr("src", $("#video1").attr("src"));
          $("#video2").attr("src", $("#video2").attr("src"));
          $("#video3").attr("src", $("#video3").attr("src"));
          $("#video4").attr("src", $("#video4").attr("src"));
          $("#video5").attr("src", $("#video5").attr("src"));
      });
      $('#next').click(function(){
        $("#video1").attr("src", $("#video1").attr("src"));
        $("#video2").attr("src", $("#video2").attr("src"));
        $("#video3").attr("src", $("#video3").attr("src"));
        $("#video4").attr("src", $("#video4").attr("src"));
        $("#video5").attr("src", $("#video5").attr("src"));
      });
  });
</script>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle ">
  <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/1-5beneficios.jpg" alt="5 Beneficios en un solo paso"></div>
  <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>//images/contenido/cicatricure/2-linea-cicabricure.jpg" alt="Conoce la línea cicatricure"></div>
  <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/3-mejora-apariencia.jpg" alt="Mejora la apariencia de las cicatrices y estrías"></div>
</div>
<div class="background" style="background-attachment: initial;padding: 30px 20px;">
  <section class="shadow">
    <h2 class="title-principal beauty" style="margin: 0 auto;font-size: 29px;">Beauty Care</h2>
    <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatricure-crema-de-dia.png" alt="Cream de día - Beauty Care">
    <span class="sub">¡5 cuidados en un solo paso!</span>
    <ul class="lista">
      <li>Crema de día con una exclusiva fórmula que reúne los 5 cuidados que la piel necesita en 1 solo paso.</li>
      <li>Con péptidos y partículas que Mica hidrata por 24 horas, iguala el tono de la piel, previene líneas de expresión, control el brillo y protege de los rayos del sol <strong>(FPS 25)</strong>.</li>
      <li>Dermatológicamente testeada y puede usarse en todos los tonos de piel.</li>
    </ul>
    <span class="result">¿El resultado?</span>
    <p class="result-note" style="margin: 0px 0px 20px;">Una piel uniforme y luminosa todos los días.</p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115890)) ?>" data-ajax="false">
      <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
    </a>
  </section>
  <section class="shadow">
    <h2 class="title-principal cicatrices" style="margin: 38px auto 0;width: 48%;font-size: 29px;">Cicatrices</h2>
    <img class="img-responsive-m producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatrices-y-estrias.png" alt="Cicatricure  cicatrices y estrías">
    <ul class="lista">
      <li>Efectiva para mejorar la apariencia de las cicatrices y las estrías.</li>
      <li>Fórmula comprobada gracias al estudio de eficacia cosmética instrumental, en donde la combinación exclusiva
      de extractos naturales inmersos en una formulación dermocosmética diseñada en concentraciones adecuadas,
      <span style="font-family: NeutraText-BookItalicAlt;font-size:14px;">dan excelentes resultados en cicatrices, marcas por quemaduras o estrías por crecimiento, embarazo o aumento de peso.</span></li>
    </ul>
    <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2401)) ?>" data-ajax="false">
      <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
    </a>
  </section>
  <section class="shadow">
    <h2 class="title-principal antiedad" style="margin: 38px auto 25px !important;width: 44% !important;font-size: 29px;">Antiedad</h2>
    <img class="img-responsive-m producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/contorno-ojos.png" alt="Cicatricure contorno de ojos">
    <span>Contorno de Ojos</span>
    <p>Empieza a ver el futuro con ojos de juventud</p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 68091)) ?>">
      <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
    </a>
    <img class="img-responsive-m producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/microdermoabrasion.png" alt="Cicatricure - Microdermoabrasión">
    <span>Microdermoabrasión</span>
    <p>Renueva tu belleza</p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 92029)) ?>">
      <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
    </a>
    <img class="img-responsive-m producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/lineas-de-expresion-y-arrugas.png" alt="Cicatricure - arrugas y línas de expresión">
    <span>Arrugas y líneas de expresión</span>
    <p>Siempre joven y bella</p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 64629)) ?>">
      <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
    </a>
  </section>
  <section>
    <h2 class="beneficios" style="width: 87%;font-size: 23px;padding: 10px 18px;"> Descubre más beneficios de Cicatricure</h2>
    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
      <div class="item">
        <div class="videoWrapper">
          <iframe width="100%" height="auto"  style="height: 178px;" src="https://www.youtube.com/embed/HdzVVDPBPuA?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="item">
        <div class="videoWrapper">
          <iframe width="100%" height="auto"  style="height: 178px;" src="https://www.youtube.com/embed/pMfJrS29xXQ?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="item">
        <div class="videoWrapper">
          <iframe width="100%" height="auto"  style="height: 178px;" src="https://www.youtube.com/embed/5emFdEHX1fY?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="item">
          <div class="videoWrapper">
            <iframe width="100%" height="auto"  style="height: 178px;" src="https://www.youtube.com/embed/zpqaL06uak0?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
      </div>
      <div class="item">
          <div class="videoWrapper">
            <iframe width="100%" height="auto"  style="height: 178px;" src="https://www.youtube.com/embed/r_plBOpG594?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
      </div>
    </div>
  </section>
</div>
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
  <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=cicatricure"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-sticky.png"></div></a>

<div class="row">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner baner-principal">
      <div class="item active"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/1-5beneficios.jpg" class="img-responsive" alt="5 Beneficios en un solo paso"></div>
      <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/2-linea-cicabricure.jpg" class="img-responsive" alt="Conoce la línea cicatricure"></div>
      <div class="item"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/3-mejora-apariencia.jpg" class="img-responsive" alt="Mejora la apariencia de las cicatrices y estrías"></div>
    </div>
    <ol class="carousel-indicators">
       <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
       <li data-target="#carousel-example-generic" data-slide-to="1"></li>
       <li data-target="#carousel-example-generic" data-slide-to="2"></li>
     </ol>
  </div>
</div>
<div class="background">
  <div class="container">
    <div class="row bg-beauty">
      <div class="col-sm-4 col-md-4" style="padding-left: 0px;">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/mujer-beauty.png" class="img-responsive">
      </div>
      <div class="col-sm-4 col-md-4">
        <h2 class="title-principal beauty">Beauty Care</h2>
        <span class="sub">¡5 cuidados en un solo paso!</span>
        <ul class="lista">
          <li>Crema de día con una exclusiva fórmula que reúne los 5 cuidados que la piel necesita en 1 solo paso.</li>
          <li>Con péptidos y partículas que Mica hidrata por 24 horas, iguala el tono de la piel, previene líneas de expresión, control el brillo y protege de los rayos del sol <strong>(FPS 25)</strong>.</li>
          <li>Dermatológicamente testeada y puede usarse en todos los tonos de piel.</li>
        </ul>
        <span class="result">¿El resultado?</span>
        <p class="result-note">Una piel uniforme y luminosa todos los días.</p>
      </div>
      <div class="col-sm-4 col-md-4 thumbs">
        <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatricure-crema-de-dia.png" alt="Cream de día - Beauty Care">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115890)) ?>">
          <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
        </a>
      </div>
    </div>
    <div class="row bg-cicatrices">
      <div class="col-sm-4 col-md-4" style="padding-left: 0px;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/embarazo.png" >
      </div>
      <div class="col-sm-4 col-md-4">
        <h2 class="title-principal cicatrices">Cicatrices</h2>
        <ul class="lista">
          <li>Efectiva para mejorar la apariencia de las cicatrices y las estrías.</li>
          <li>Fórmula comprobada gracias al estudio de eficacia cosmética instrumental, en donde la combinación exclusiva
          de extractos naturales inmersos en una formulación dermocosmética diseñada en concentraciones adecuadas,
          <span style="font-family: NeutraText-BookItalicAlt;font-size:14px;">dan excelentes resultados en cicatrices, marcas por quemaduras o estrías por crecimiento, embarazo o aumento de peso.</span></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-4 thumbs">
        <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/cicatrices-y-estrias.png" alt="Cicatricure  cicatrices y estrías">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2401)) ?>">
          <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
        </a>
      </div>
    </div>
    <div class="row bg-antiedad">
      <div class="col-md-12">
        <h2 class="title-principal antiedad" style="margin-top:60px;">Antiedad</h2>
      </div>
      <div class="col-md-12">
        <div class="col-sm-4 col-md-4 thumbs">
          <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/contorno-ojos.png" alt="Cicatricure contorno de ojos">
          <span>Contorno de Ojos</span>
          <p>Empieza a ver el futuro con ojos de juventud</p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 68091)) ?>">
            <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
          </a>
        </div>
        <div class="col-sm-4 col-md-4 thumbs">
          <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/microdermoabrasion.png" alt="Cicatricure - Microdermoabrasión">
          <span>Microdermoabrasión</span>
          <p>Renueva tu belleza</p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 92029)) ?>">
            <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
          </a>
        </div>
        <div class="col-sm-4 col-md-4 thumbs">
          <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/lineas-de-expresion-y-arrugas.png" alt="Cicatricure - arrugas y línas de expresión">
          <span>Arrugas y líneas de expresión</span>
          <p>Siempre joven y bella</p>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 64629)) ?>">
            <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/compra-online.png">
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2 class="beneficios"> Descubre más beneficios de Cicatricure</h2>
      </div>
      <div class="col-md-12">
        <div id="carousel-video" class="carousel slide" data-ride="carousel" data-interval="false">
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-md-6">
                <div class="videoWrapper">
                  <iframe id="video1" width="100%" height="auto"  style="height: 278px;" src="https://www.youtube.com/embed/HdzVVDPBPuA?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-md-6">
                <div class="videoWrapper">
                  <iframe id="video2" width="100%" height="auto"  style="height: 278px;" src="https://www.youtube.com/embed/pMfJrS29xXQ?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-6">
                <div class="videoWrapper">
                  <iframe id="video3" width="100%" height="auto"  style="height: 278px;" src="https://www.youtube.com/embed/5emFdEHX1fY?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-md-6">
                <div class="videoWrapper">
                  <iframe id="video4" width="100%" height="auto"  style="height: 278px;" src="https://www.youtube.com/embed/zpqaL06uak0?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-6">
                <div class="videoWrapper">
                  <iframe id="video5" width="100%" height="auto"  style="height: 278px;" src="https://www.youtube.com/embed/r_plBOpG594?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-md-6">
                <div class="videoWrapper">

                </div>
              </div>
            </div>
          </div>
          <a id="prev" class="carousel-control left" href="#carousel-video" data-slide="prev"><i class="prev-slide"></i></a>
          <a id="next" class="carousel-control right" href="#carousel-video" data-slide="next"><i class="next-slide"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
