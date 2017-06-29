<?php $this->pageTitle = "Pomys Piel normal a seca - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Pomys es una marca que ofrece soluciones prácticas, efectivas e innovadoras para el cuidado facial de las mujeres. Soluciones al cansancio y la pereza de desmaquillarse.
'>
  <meta name='keywords' content='toallitas desmaquilladoras, limpiadores faciales, pañitos desmaquilladores.'>
  <style>
    @font-face {font-family:signika-negative; src: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/fonts/signika.negative.ttf);}
    @font-face {font-family:signika-negative-bold; src: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/fonts/signika.negative-bold.ttf);}
    @font-face {font-family:signika-negative-light; src: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/fonts/signika.negative-light.ttf);}
    @font-face {font-family:signika-negative-semibold; src: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/fonts/signika.negative-semibold.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width:20%;}
    .pattern{background-attachment: fixed;background-size: cover;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/pattern.png);}
    .bg-product {background-image: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/normal-a-seca/banner-producto-verde.png);background-size: cover;}
    .flex-container {display: flex;}
    .flex-container.menu {padding: 0 17%;}
    .flex-container .item {flex-grow:1;width:100%;height:73px;;margin: 0 15px;}
    .image-container-mix {display:block;width: 100%;height:100%;background: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/mixta-a-grasa/item-menu-hover.png),url(".Yii::app()->request->baseUrl."/images/contenido/pomys/mixta-a-grasa/item-menu.png);background-size: 0% 0%, 100% 100%;}
    .image-container-mix:hover {background-size:100% 100%, 0% 0%  ;}
    .image-container-seca {display:block;width: 100%;height:100%;background: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/normal-a-seca/item-menu.png),url(".Yii::app()->request->baseUrl."/images/contenido/pomys/normal-a-seca/item-menu-hover.png);background-size:0% 0%, 100% 100%;}
    .image-container-seca:hover {background-size:100% 100%, 0% 0% ;}
    .image-container-all {display:block;width: 100%;height:100%;background: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/todo-tipo-de-piel/item-menu.png),url(".Yii::app()->request->baseUrl."/images/contenido/pomys/todo-tipo-de-piel/item-menu-hover.png);background-size: 100% 100%, 0% 0%;}
    .image-container-all:hover {background-size: 0% 0%, 100% 100%;}
    .flex-container img {width: 15px;margin-right: 9px;height:15px;}
    .bg-product .flex-container {margin-bottom:11px;justify-content: initial;}
    .flex-container span {font-family:signika-negative-bold;color: #A81988;font-size: 16px;}
    .form-round {background-color: #fff;border: 2px solid #A81988;margin-bottom: 27px;padding: 8px 31px;border-radius: 60px 0;font-family: signika-negative;color: #A81988;font-size: 16px;line-height: 17px;width: 88%;}
    .line-dotted {border-bottom: 6px dotted #B5C700;width: 52%;display: block;margin-bottom: 20px;}
    .thumb:hover .producto {-webkit-transform: translateY(-5px);transform: translateY(-5px);-webkit-transition-duration: 0.3s;transition-duration: 0.3s;-webkit-transition-property: transform;transition-property: transform;}
    .check {width: 56px;position: absolute;right: 4px;top: -12px;}
    .check.twoline {top: 69px !important;}
    .bg-round {margin-top: -2px;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/pomys/mixta-a-grasa/bg-round.png);background-size: cover;}
    .hide {display:none !important;-webkit-transition: width 2s linear; transition: width 2s linear;}
    .container.padding {padding: 0 5%;}
    .nombre-producto {color: #B5C700;font-family: signika-negative-semibold;}
    .space {height: 35px;}
    .compra-online {margin: 0 auto;width: 55%;display:block;}
    .producto {margin-top: 12%;}
    .embed-container {position: relative;padding-bottom: 56.25%;height: 0;overflow: hidden;}
    .embed-container iframe {position: absolute;top:0;left: 0;width: 100%;height: 100%;}
    .video {width: 100%;margin: 20px auto 0px;}
    .title_two {font-size: 31px;display: inline-block;color: #fff;font-family: signika-negative-semibold;margin-top: 82px;border-bottom: 2px solid;}
    .title-bullet{margin-top: 30px;color: #fff;font-family: signika-negative-semibold;font-size: 35px;text-shadow: 2px 2px #4c4c4c66;}
    .ico-rose {width: 27px;height: 27px;margin-top: 24px;}
    .descrip {font-family: signika-negative;color: #fff;margin-left: 29px;font-size: 20px;}
    .producto-rueditas {  width: 55%;margin: 30px auto;display:block;}
    .img-responsive-m {width:100%;display:block;}
    .owl-controls.clickable {margin-top: 9px !important;}
    .owl-theme .owl-controls .owl-page span {background-color: #9C248D !important;}
    .col-sm-3.col-md-3 img {cursor:pointer;}
  </style>
  ";
?>
<!-- Funcionamiento de cambio de los videos -->
<script type='text/javascript'>
       $(document).ready(function(){
        $('#receta1').click(function(){
            $('#video-receta1').removeClass('hide');
            $('#video-receta2').addClass('hide');
            $('#video-receta3').addClass('hide');
            $('#video-receta4').addClass('hide');
            $('#video-receta5').addClass('hide');
            $('#video-receta6').addClass('hide');
            $('#video-receta7').addClass('hide');
            $('#video-receta8').addClass('hide');
            $('#video-receta9').addClass('hide');
            // para pausar el video
            $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
            $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
            $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
            $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
            $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
            $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
            $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
            $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
        });
        $('#receta2').click(function(){
            $('#video-receta2').removeClass('hide');
            $('#video-receta1').addClass('hide');
            $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
            $('#video-receta3').addClass('hide');
            $('#video-receta4').addClass('hide');
            $('#video-receta5').addClass('hide');
            $('#video-receta6').addClass('hide');
            $('#video-receta7').addClass('hide');
            $('#video-receta8').addClass('hide');
            $('#video-receta9').addClass('hide');
            // para pausar el video
            $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
            $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
            $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
            $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
            $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
            $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
            $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
            $("#video-receta9").attr("src", $("#video-receta9").attr("src"));

        });
        $('#receta3').click(function(){
            $('#video-receta3').removeClass('hide');
            $('#video-receta1').addClass('hide');
            $('#video-receta2').addClass('hide');
            $('#video-receta4').addClass('hide');
            $('#video-receta5').addClass('hide');
            $('#video-receta6').addClass('hide');
            $('#video-receta7').addClass('hide');
            $('#video-receta8').addClass('hide');
            $('#video-receta9').addClass('hide');
            // para pausar el video
            $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
            $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
            $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
            $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
            $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
            $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
            $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
            $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
        });
        $('#receta4').click(function(){
            $('#video-receta4').removeClass('hide');
            $('#video-receta1').addClass('hide');
            $('#video-receta2').addClass('hide');
            $('#video-receta3').addClass('hide');
            $('#video-receta5').addClass('hide');
            $('#video-receta6').addClass('hide');
            $('#video-receta7').addClass('hide');
            $('#video-receta8').addClass('hide');
            $('#video-receta9').addClass('hide');
            // para pausar el video
            $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
            $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
            $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
            $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
            $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
            $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
            $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
            $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
        });
        $('#receta5').click(function(){
            $('#video-receta5').removeClass('hide');
            $('#video-receta1').addClass('hide');
            $('#video-receta2').addClass('hide');
            $('#video-receta3').addClass('hide');
            $('#video-receta4').addClass('hide');
            $('#video-receta6').addClass('hide');
            $('#video-receta7').addClass('hide');
            $('#video-receta8').addClass('hide');
            $('#video-receta9').addClass('hide');
            // para pausar el video
            $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
            $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
            $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
            $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
            $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
            $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
            $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
            $("#video-receta9").attr("src", $("#video-receta9").attr("src"));

        });
        $('#receta6').click(function(){
            $('#video-receta6').removeClass('hide');
            $('#video-receta1').addClass('hide');
            $('#video-receta2').addClass('hide');
            $('#video-receta3').addClass('hide');
            $('#video-receta4').addClass('hide');
            $('#video-receta5').addClass('hide');
            $('#video-receta7').addClass('hide');
            $('#video-receta8').addClass('hide');
            $('#video-receta9').addClass('hide');
            // para pausar el video
            $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
            $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
            $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
            $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
            $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
            $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
            $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
            $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
        });
    });
</script>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/banner.jpg" alt="Lo que hagas por tu piel, lo verás mañana.">
  <div class="pattern">
    <div style="padding:0 15%;">
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/pomys-toallas-desmaquilladoras-piel-mixta">
        <img class="img-responsive-m" style="margin-bottom:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/mixta-a-grasa/item-menu.png">
      </a>
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/pomys-toallas-desmaquilladoras-piel-seca">
        <img class="img-responsive-m" style="margin-bottom:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/item-menu-hover.png">
      </a>
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/pomys-rueditas-desmaquilladoras">
        <img class="img-responsive-m" style="margin-bottom:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/todo-tipo-de-piel/item-menu.png">
      </a>
    </div>
    <div style="margin-top: 50px;padding:0 8%;">
      <h2 class="nombre-producto">Toallitas húmedas desmaquilladoras piel <br> normal a seca</h2>
      <span class="line-dotted"></span>
      <div class="flex-container">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
        <span> Con vitaminas A,E Y C</span>
      </div>
      <div class="flex-container">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
        <span> Con extracto de flor de porcelana</span>
      </div>
      <div class="flex-container">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
        <span> Con nutripeptides<sup>&reg;</sup> de arroz y alotoina</span>
      </div>
      <div class="flex-container">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
        <span>No dejan sensación grasosa - No requieren enjuague</span>
      </div>
      <div class="flex-container">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
        <span>Limpian, Desmaquillan, Protegen y Humecta la piel de tu rostro.</span>
      </div>
      <div style="margin-top: 40px;">
        <div class="form-round" style="width: 50%;margin: 0px auto 15px;">
          Dermátologicamente <br> Comprobado
        </div>
        <div class="form-round" style="width: 50%;margin: 0px auto 15px;">
          Sin parabenos y <br> sin alcohol etílico
        </div>
        <div class="form-round" style="width: 50%;margin: 0px auto 15px;">
          Hipoalergénico
        </div>
        <div class="form-round" style="width: 50%;margin: 0px auto 15px;">
          Oftalmológicamente <br> comprobado
        </div>
      </div>
      <img class="img-responsive-m producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/toallitas-húmedas-normal-a-seca.png">
      <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2840)) ?>">
        <img class="compra-online" style="width: 80%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/compra-online.png">
      </a>
      <div class="space"></div>
    </div>
    <div style="background-color: #FFA138;border-bottom: 5px solid #ADACAC;">
      <div class="container padding">
        <div class="row" style="margin-bottom: 15px;">
            <h2 class="title_two" style="margin-top: 19px;font-size: 19px;">Usa también en tu rutina de limpieza</h2>
            <div style="display:flex;">
              <img class="ico-rose" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/mixta-a-grasa/icon-white.png">
              <span class="title-bullet" style="margin-top: 31px;font-size: 18px;margin-left: 8px;">Rueditas Desmaquilladoras Pomys <sup>&reg;</sup></span>
            </div>
            <p class="descrip" style="font-size: 16px;margin-top: 4px;">ideales para todo tipo de piel y libres de pelusa</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/pomys-rueditas-desmaquilladoras">
              <img style="width: 55%;margin: 30px auto;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/click-aqui.png">
            </a>
            <img class="producto-rueditas" style="margin: 0 auto;display: block;width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/mixta-a-grasa/rueditas-desmaquilladoras.png" alt="Rueditas desmaquilladoras">
        </div>
      </div>
    </div>
    <img class="img-responsive-m" style="margin: 10% auto;width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/conoce-mas.png" alt="Conoce más">
    <div style="padding:0px 15px 50px;">
      <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
        <div class="item">
          <div class="video">
            <div class="embed-container">
              <iframe id="video-receta1" width="560" height="315" src="https://www.youtube.com/embed/4HBQBXuoPXI?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="video">
            <div class="embed-container">
              <iframe id="video-receta2" style="margin-top: 15px;" width="100%" height="315" src="https://www.youtube.com/embed/KlOzsfd_lts?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="video">
            <div class="embed-container">
              <iframe id="video-receta3" style="margin-top: 15px;" width="100%" height="315" src="https://www.youtube.com/embed/i9p4HkprL5s?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="video">
            <div class="embed-container">
              <iframe id="video-receta4" style="margin-top: 15px;" width="100%" height="315" src="https://www.youtube.com/embed/sfrq7mPNsCY?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="video">
            <div class="embed-container">
              <iframe id="video-receta5" style="margin-top: 15px;" width="100%" height="315" src="https://www.youtube.com/embed/UxFWFfffYok?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="video">
            <div class="embed-container">
              <iframe id="video-receta6" style="margin-top: 15px;" width="100%" height="315" src="https://www.youtube.com/embed/6snEk-LZ8RE?rel=0" frameborder="0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Version movil-->
<!--Versión escritorio-->
<?php else: ?>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2845)) ?>">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/btn-fijo.png" alt="Compra online"></div>
</a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/banner.jpg" alt="Lo que hagas por tu piel, lo verás mañana.">
<div class="pattern">
  <div class="flex-container menu">
    <div class="item"><a href="<?= Yii::app()->request->baseUrl ?>/pomys-toallas-desmaquilladoras-piel-mixta"><div class="image-container-mix"></div></a></div>
    <div class="item"><a href="<?= Yii::app()->request->baseUrl ?>/pomys-toallas-desmaquilladoras-piel-seca"><div class="image-container-seca"></div></a></div>
    <div class="item"><a href="<?= Yii::app()->request->baseUrl ?>/pomys-rueditas-desmaquilladoras"><div class="image-container-all"></div></a></div>
  </div>
 <div class="bg-product">
    <div class="container padding" style="margin-top: 50px;">
        <div class="col-sm-6 col-md-6">
          <h2 class="nombre-producto">Toallitas húmedas desmaquilladoras <br> piel normal a seca</h2>
          <span class="line-dotted"></span>
          <div class="flex-container">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
            <span> Con vitaminas A,E Y C</span>
          </div>
          <div class="flex-container">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
            <span> Con extracto de flor de porcelana</span>
          </div>
          <div class="flex-container">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
            <span> Con Nutripeptides <sup style="margin-left: -3px;">&reg;</sup> de arroz y alatoina</span>
          </div>
          <div class="flex-container">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
            <span>No dejan sensación grasosa - No requieren enjuague</span>
          </div>
          <div class="flex-container">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/icono-bullet.png">
            <span>Limpian, Desmaquillan, Protegen y Humecta la piel de tu rostro.</span>
          </div>
          <div class="row" style="margin-top: 35px;">
            <div class="col-sm-6 col-md-6">
              <div class="form-round">
                Dermátologicamente <br> Comprobado
                <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/check.png">
              </div>
              <div class="form-round">
                Sin parabenos y <br> sin alcohol etílico
                <img class="check twoline" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/check.png">
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-round" style="line-height: 31px;">
                Hipoalergénico
                <img class="check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/check.png">
              </div>
              <div class="form-round">
                Oftalmológicamente <br> comprobado
                <img class="check twoline" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/check.png">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 thumb">
          <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/normal-a-seca/toallitas-húmedas-normal-a-seca.png">
          <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2840)) ?>">
            <img class="compra-online" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/compra-online.png">
          </a>
        </div>
        <div class="col-sm-12"><div class="space"></div></div>
    </div>
  </div>
  <div class="bg-round">
    <div class="container padding">
      <div class="row" style="margin-bottom: 80px;">
        <div class="col-sm-7 col-md-7">
          <h2 class="title_two">Usa también en tu rutina de limpieza</h2>
          <div style="display:flex;">
            <img class="ico-rose" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/mixta-a-grasa/icon-white.png">
            <span class="title-bullet">Rueditas Desmaquilladoras Pomys <sup>&reg;</sup></span>
          </div>
          <p class="descrip">ideales para todo tipo de piel y libres de pelusa</p>
          <a href="<?= Yii::app()->request->baseUrl ?>/pomys-rueditas-desmaquilladoras">
            <img style="width: 45%;margin: 30px auto;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/click-aqui.png">
          </a>
        </div>
        <div class="col-sm-5 col-md-5">
          <img class="producto-rueditas" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/mixta-a-grasa/rueditas-desmaquilladoras.png" alt="Rueditas desmaquilladoras">
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <img class="img-responsive" style="margin: 3% auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/conoce-mas.png" alt="Conoce más">
    </div>
    <div class="row" style="padding: 0 15%;margin-bottom: 50px;">
      <div class="col-sm-3 col-md-3">
           <img id="receta1" class="img-responsive" style="margin-bottom:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/videos/01.png">
           <img id="receta2" class="img-responsive" style="margin-bottom:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/videos/02.png">
           <img id="receta3" class="img-responsive" style="margin-bottom:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/videos/03.png">
       </div>
      <div class="col-sm-6 col-md-6">
        <iframe id="video-receta1" width="100%" height="315" src="https://www.youtube.com/embed/4HBQBXuoPXI?rel=0" frameborder="0" allowfullscreen></iframe>
        <iframe id="video-receta2" class="hide" width="100%" height="315" src="https://www.youtube.com/embed/KlOzsfd_lts?rel=0" frameborder="0" allowfullscreen></iframe>
        <iframe id="video-receta3" class="hide" width="100%" height="315" src="https://www.youtube.com/embed/i9p4HkprL5s?rel=0" frameborder="0" allowfullscreen></iframe>
        <iframe id="video-receta4" class="hide" width="100%" height="315" src="https://www.youtube.com/embed/sfrq7mPNsCY?rel=0" frameborder="0" allowfullscreen></iframe>
        <iframe id="video-receta5" class="hide" width="100%" height="315" src="https://www.youtube.com/embed/UxFWFfffYok?rel=0" frameborder="0" allowfullscreen></iframe>
        <iframe id="video-receta6" class="hide" width="100%" height="315" src="https://www.youtube.com/embed/6snEk-LZ8RE?rel=0" frameborder="0" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="col-sm-3 col-md-3">
            <img id="receta4" class="img-responsive" style="margin-bottom:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/videos/04.png">
            <img id="receta5" class="img-responsive" style="margin-bottom:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/videos/05.png">
            <img id="receta6" class="img-responsive" style="margin-bottom:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pomys/videos/06.png">
        </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio
<?php endif; ?>
