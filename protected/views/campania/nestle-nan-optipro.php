<?php $this->pageTitle = "Nan® Optipro® 3 Desarrollo - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='NAN® OPTIPRO® 3 DESARROLLO de Nestlé con  proteína optimizada que ayuda a construir bases sólidas para el crecimiento y desarrollo de su hijo'>
  <meta name='keywords' content='crecimiento, proteína para niños, desarrollo niños.'>
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
    .bg-main {background-size: cover;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/bg-main.jpg);}
    .content-princip {margin: 0 7%;}
    .sabias-que {width: 580px;margin-top: 90px;}
    .txt-intro-banner {color: #fff;font-family: VAGRoundedStd-Bold;text-align: center;font-size: 30px;line-height: 30px;margin-top: 20px;}
    .line-pie {width: 310px;margin: 15px auto 18px;display: block;}
    .bg-box {background-size: 100% 100%;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/bg-box.png);}
    .bg-box p {line-height: 33px;margin-bottom: 30px;font-family: VAGRoundedStd-Thin;color: #043C9F;font-size: 30px;}
    .producto {width: 310px;margin: 40px auto 5px;}
    .btn-compra {width: 225px;margin: 0 auto 25px;}
    .recetas {max-height: 167px;min-height: 167px;background-size: 100%;background-repeat: no-repeat;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/recetas.jpg);}
    svg {width: 55px;}
    .play{fill: rgba(255, 255, 255, 0.4);stroke: #fff;stroke-width: 10;stroke-dasharray: 18;animation: line 4s linear alternate infinite;}
    @keyframes line {to {stroke-dashoffset: 800;}}
    .precio-antes {text-decoration: line-through;font-family: VAGRoundedStd-Bold !important;text-align: center !important;margin: 20px auto 0px !important;font-size: 30px !important;}
    .precio {font-family: VAGRoundedStd-Bold !important;text-align: center !important;margin: 0px auto 20px !important;font-size: 32px !important;}
  </style>
";
?>
<?php $nan = Producto::consultarPrecio('65388', $this->objSectorCiudad)?>

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
<noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=1237970366269442&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/banner-mobile-home.jpg">
<div style="background-color: #013D9F;padding: 25px 0;margin-top: -5px;">
  <div style="margin-top: -25px !important;-webkit-box-shadow: inset 8px 8px 5px -6px rgba(0,0,0,0.4);-moz-box-shadow: inset 8px 8px 5px -6px rgba(0,0,0,0.4);box-shadow: inset 8px 8px 5px -6px rgba(0,0,0,0.4);border: 5px solid #EABE46;margin: 0 4%;background-color: #fff;border-radius: 25px;padding: 25px;font-size: 17px;color:#013D9F;">
    <p>Las proteínas influyen directamente
    en el desarrollo y crecimiento ya que
    estructuran, conforman y mantienen
    los tejidos, músculos y órganos.<p>
    <p>Darle a tu hijo una proteína de
    excelente calidad, es clave para
    lograr una adecuada nutrición.</p>
    <p><span style=" font-family:VAGRoundedStd-Bold;">Compra ahora NAN<sup>®</sup> OPTIPRO<sup>®</sup>
    3 Desarrollo </span>en la Rebaja Virtual,
    alimento lácteo con proteína de
    calidad.</p>
    <img style="width: 150px;margin: 0 auto 10px;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/nan-optipro3.png">
    <p class="precio-antes">ANTES: <?= ($nan == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nan["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
    <p class="precio">AHORA: <?= ($nan == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nan["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
    <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6170)) ?>">
      <img style="width: 190px;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-comprar.png">
    </a>
  </div>
</div>
<a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-mobile.jpg"></a>
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
<!--FIN Version movil-->
<!--Versión escritorio-->
<?php else: ?>
<div class="bg-main" style="padding-bottom: 50px;">
  <div class="content-princip">
    <div class="row">
        <div class="col-md-offset-6 col-md-6">
          <img class="sabias-que" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/sabias-que.png" alt="Sabias que">
        </div>
        <div class="col-md-offset-5 col-md-7">
          <p class="txt-intro-banner">  Proteína optimizada en cantidad y calidad <br>para niños a partir de los 24 meses.</p>
          <img class="line-pie" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/border.png">
        </div>
      </div>
    <div class="row bg-box">
      <div class="col-sm-7" style="padding: 70px 0px 0px 70px;">
        <p style="margin-top: 30px;">Las proteínas influyen directamente en el <br>
        desarrollo y crecimiento ya que estructuran,<br>
        conforman y mantienen los tejidos, <br>
        músculos y órganos.</p>
        <p>Darle a tu hijo una proteína de excelente  calidad, es clave para lograr una adecuada nutrición.</p>
        <p><span style=" font-family:VAGRoundedStd-Bold;">Compra ahora NAN<sup>®</sup> OPTIPRO<sup>®</sup>3 Desarrollo </span> <br>
        en la Rebaja Virtual, alimento lácteo <br>
        con proteína de calidad.</p>
      </div>
      <div class="col-sm-5">
        <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/nan-optipro3.png">
        <p class="precio-antes">ANTES: <?= ($nan == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nan["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precio">AHORA: <?= ($nan == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nan["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6170)) ?>"><img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-comprar.png"></a>
      </div>
    </div>
  </div>
</div>
<div class="row recetas">
  <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro">
    <p style="text-align: right;margin-top: 65px;margin-right: 125px;">
      <svg version="1.1" x="0px" y="0px" viewBox="0 0 517.3 517.3" style="enable-background:new 0 0 517.3 517.3;"
         xml:space="preserve">
      <path class="play" d="M258.6,517.3c-69.1,0-134-26.9-182.9-75.7C26.9,392.7,0,327.7,0,258.6c0-69.1,26.9-134,75.8-182.9
        C124.6,26.9,189.5,0,258.6,0c69.1,0,134,26.9,182.9,75.8c48.8,48.8,75.7,113.8,75.7,182.9c0,69.1-26.9,134-75.7,182.9
        C392.7,490.4,327.7,517.3,258.6,517.3z M258.6,35.9c-122.8,0-222.7,99.9-222.7,222.7c0,122.8,99.9,222.7,222.7,222.7
        s222.7-99.9,222.7-222.7C481.3,135.8,381.4,35.9,258.6,35.9z M398.4,243.1L202.2,129.8c-5.6-3.2-12.4-3.2-18,0
        c-5.6,3.2-9,9.1-9,15.6v226.5c0,6.4,3.4,12.4,9,15.6c2.8,1.6,5.9,2.4,9,2.4c3.1,0,6.2-0.8,9-2.4l196.2-113.3c5.6-3.2,9-9.1,9-15.6
        C407.4,252.2,404,246.3,398.4,243.1z"/>
      </svg>
    </p>
  </a>
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
