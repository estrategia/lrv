<?php $this->pageTitle = "Nan optipro - La Rebaja Virtual"; ?>
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



    .space-1 {height: 0px !important;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}

.bg-main {background-size: cover;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/bg-main.jpg);}
.content-princip {margin: 0 7%;}
.sabias-que {width: 580px;margin-top: 90px;}

.txt-intro-banner {
  color: #fff;
font-family: VAGRoundedStd-Bold;
text-align: center;
font-size: 30px;
line-height: 30px;
margin-top: 20px;
}

.line-pie {
    width: 310px;
    margin: 15px auto 18px;
    display: block;
}

.bg-box {background-size: cover;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/bg-box.png);}
  </style>
";
?>

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

  <!-- <section class="programa-hora" style="font-size: 16px;">
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
  </section> -->

<!--FIN Version movil-->

<!--Versión escritorio-->
<?php else: ?>

<div class="bg-main">

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

        <div class="col-sm-6">
          <p>Las proteínas influyen directamente en el desarrollo y crecimiento ya que estructuran, conforman y mantienen los tejidos, músculos y órganos.

  Darle a tu hijo una proteína de excelente calidad, es clave para lograr una adecuada nutrición.

  Compra ahora NAN® OPTIPRO®
  3 Desarrollo en la Rebaja Virtual, alimento lácteo con proteína de calidad.</p>
        </div>
        <div class="col-sm-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/nan-optipro3.png">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/btn-comprar.png">

        </div>
  

    </div>

  </div>

</div>

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
