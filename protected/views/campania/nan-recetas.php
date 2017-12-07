
<?php $this->pageTitle = "Recetas Nan® Optipro® 3 Desarrollo - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='NAN® OPTIPRO® 3 DESARROLLO de Nestlé trae unas deliciosas recetas fáciles de preparar para que tu hijo consuma proteína de una manera divertida.'>
  <meta name='Recetas para niños, loncheras, proteína para niños.'>
	<style>
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    @font-face { font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nan-optipro/fonts/VAGRoundedStd-Bold.otf);}
    @font-face { font-family:VAGRoundedStd-Thin; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nan-optipro/fonts/VAGRoundedStd-Thin.otf);}
    .space-1 {height: 0px !important;}
    a {outline: none !important;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    .bg-main {background-size: cover;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/bg-interna-recetas.jpg);}
    .content-princip {margin: 0 7%;}
    .sabias-que {width: 580px;margin-top: 90px;}
    .txt-intro-banner {color: #fff;font-family: VAGRoundedStd-Bold;text-align: center;font-size: 30px;line-height: 30px;margin-top: 20px;}
    .line-pie {width: 310px;margin: 15px auto 18px;display: block;}
    .bg-box {background-size: 100% 100%;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/bg-box.png);}
    .bg-box p {line-height: 33px;margin-bottom: 30px;text-align: justify;font-family: VAGRoundedStd-Thin;color: #043C9F;font-size: 30px;}
    .producto {width: 370px;margin: 40px auto 5px;}
    .btn-compra {width: 225px;margin-top: 15px;}
    .bg-videos {background-color:#A5B3DA;padding: 15px;margin: 0 8%;}
    .hide {display:none;-webkit-transition: width 2s linear; transition: width 2s linear;}
    .title-principal { font-family:VAGRoundedStd-Bold;text-align:center;color:#fff;font-size: 30px;margin-bottom:30px;}
    .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
    .video iframe {position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
    .thumb-video:hover {cursor:pointer;-webkit-transition: all 200ms ease-in;-webkit-transform: scale(1.1);-ms-transition: all 200ms ease-in;-ms-transform: scale(1.1);-moz-transition: all 200ms ease-in;-moz-transform: scale(1.1);transition: all 200ms ease-in;transform: scale(1.1);}
    .btn-inicio {margin: 40px auto 0;width: 225px;}
    #paginador {text-align: center;margin: 10px 0 20px;}
    #paginador a {display: inline-block;width: 20px;height: 20px;text-indent: -999em;background: #fff;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;box-shadow: 0 0 1px 1px #707173;margin-right: 10px;cursor:pointer;}
    .precio-antes {color:#fff;text-decoration: line-through;font-family: VAGRoundedStd-Bold !important;margin: 20px auto 0px !important;font-size: 30px !important;}
    .precio {color:#fff;font-family: VAGRoundedStd-Bold !important;margin: 0px auto 20px !important;font-size: 32px !important;}
  </style>
";
?>
<?php $nan = Producto::consultarPrecio('65388', $this->objSectorCiudad)?>
<!-- Funcionamiento de cambio de los videos -->
<script type='text/javascript'>
  $(document).ready(function(){
    $('#receta1').click(function(){
      $('#video-receta1').removeClass('hide');$('#video-receta2').addClass('hide');$('#video-receta3').addClass('hide');
      // para pausar el video
      $("#video-receta2").attr("src", $("#video-receta2").attr("src"));$("#video-receta3").attr("src", $("#video-receta3").attr("src"));
    });
    $('#receta2').click(function(){
      $('#video-receta2').removeClass('hide');$('#video-receta1').addClass('hide');$('#video-receta3').addClass('hide')
      // para pausar el video
      $("#video-receta1").attr("src", $("#video-receta1").attr("src"));$("#video-receta3").attr("src", $("#video-receta3").attr("src"));
    });
    $('#receta3').click(function(){
      $('#video-receta3').removeClass('hide');$('#video-receta1').addClass('hide');$('#video-receta2').addClass('hide');
      // para pausar el video
      $("#video-receta1").attr("src", $("#video-receta1").attr("src"));$("#video-receta2").attr("src", $("#video-receta2").attr("src"));;
    });
  });
</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window,document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
   fbq('init', '1237970366269442');
  fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" src="https://www.facebook.com/tr?id=1237970366269442&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/banner-recetas-mobile.jpg"></a>
<div style="background-color: #013D9F;padding: 15px;margin-top: -6px;">
  <div class="video" id="video-receta1"><iframe  width="560" height="315" src="https://www.youtube.com/embed/T0mduoevXjY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
  <div class="video hide" id="video-receta2"><iframe  width="560" height="315" src="https://www.youtube.com/embed/yCbVoCRm1Ww?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
  <div class="video hide" id="video-receta3" ><iframe width="560" height="315" src="https://www.youtube.com/embed/7ajz8NtX6Zc?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
  <div id="paginador">
    <a id="receta1">1</a>
    <a id="receta2">2</a>
    <a id="receta3">3</a>
  </div>
  <a href="<?= Yii::app()->request->baseUrl ?>/nestle-nan-optipro"><img style="margin: 0px auto 0;width: 150px;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-inicio.png"></a>
</div>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/banner-organos-mobile.jpg">
<section class="programa-hora" style="font-size: 16px;margin-top: -5px;">
  <img width="40" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png"> <br>
  <span style="font-family:HelveticaNeueLight;color:#363636;">Ahora comprando en </span><span style="font-family:HelveticaNeue-BlackCond;color: #BF1A24;letter-spacing: 1px;">larebajavirtual.com</span><span style="color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;">, <br> programa tu hora y lugar de entrega </span>
</section>
<div style="margin-top:30px;padding:0 15px;">
  <div style="padding: 0 25%;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-mobile.png" alt="Chat en linea">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-mobile.png" alt="pqrs">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-mobile.png" alt="Linea gratuita">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
  </div>
</div>
<section style="font-size: 18px;background-color:#BF1A24;font-family: HelveticaNeueLight;color: #fff;text-align: center;padding: 10px;margin-top:30px;">
  Gracias por comprar en <span style="font-family:HelveticaNeue-BlackCond;letter-spacing:1px;">larebajavirtual.com</span>
</section>
<!--Fin version movil-->
<!--Versión escritorio-->
<?php else: ?>
  <div class="bg-main" style="padding-bottom: 50px;">
    <div class="content-princip">
      <div class="row" style="margin-top: 50px;">
        <div class="col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/pack-interno.png">
        </div>
        <div class="col-md-6">
          <img class="img-responsive" style="margin-top: 40px;width: 538px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/sabias-que.png">
          <p class="precio-antes">ANTES: <?= ($nan == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nan["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
          <p class="precio">AHORA: <?= ($nan == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nan["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>"><img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-comprar.png"></a>
        </div>
      </div>
      <div class="row">
        <h1 class="title-principal"><span style="font-size: 40px;">Sorprende a tu hijo</span> con las deliciosas Recetas <br>NAN<sup>®</sup> OPTIPRO<sup>®</sup> 3 Desarrollo</h1>
      </div>
      <div class="bg-videos">
        <div class="row">
          <div class="col-md-9" style="padding-right:0px;">
            <div class="video" id="video-receta1">
              <iframe  width="560" height="315" src="https://www.youtube.com/embed/T0mduoevXjY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video hide" id="video-receta2">
              <iframe  width="560" height="315" src="https://www.youtube.com/embed/yCbVoCRm1Ww?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
            <div class="video hide" id="video-receta3" >
              <iframe width="560" height="315" src="https://www.youtube.com/embed/7ajz8NtX6Zc?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-3">
            <div class="thumb-video" >
              <img id="receta1" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/preview01.png">
            </div>
            <div  class="thumb-video"  style="margin-top: 15px;">
              <img id="receta2" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/preview02.png">
            </div>
            <div  class="thumb-video" style="margin-top: 15px;">
              <img id="receta3" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/preview03.png">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <a href="<?= Yii::app()->request->baseUrl ?>/nestle-nan-optipro"><img class="img-responsive btn-inicio" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-inicio.png"></a>
      </div>
    </div>
  </div>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/banner-organos.jpg">
  <section class="programa-hora">
    <span style="font-family:HelveticaNeueLight;color:#363636;">Ahora comprando en </span><span style="font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 23px;letter-spacing: 1px;">larebajavirtual.com</span><span style="color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;">, programa tu hora y lugar de entrega </span><img width="50" style="margin-left:6px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
  </section>
  <div class="container" style="margin-top:30px;">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-escritorio.png" alt="Chat en linea">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
      </div>
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-escritorio.png" alt="pqrs">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
        <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
      </div>
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-escritorio.png" alt="Linea gratuita">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
        <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
      </div>
    </div>
  </div>
  <section style="background-color:#BF1A24;font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 25px;padding: 10px;margin-top:30px;">
    Gracias por comprar en <span style="font-family:HelveticaNeue-BlackCond;letter-spacing:1px;">larebajavirtual.com</span>
  </section>
<!--Fin versión escritorio-->
<?php endif; ?>
