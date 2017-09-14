
<?php $this->pageTitle = "Nan optipro - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='NAN® OPTIPRO® 3 DESARROLLO de Nestlé con  proteína optimizada que ayuda a construir bases sólidas para el crecimiento y desarrollo de su hijo'>
<meta name='keywords' content='crecimiento, proteína para niños, desarrollo niños.'>
<style>
  @font-face {font-family:VAGRoundedStd-Light;src: url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/fonts/VAGRoundedStd-Light.otf);}
  @font-face {font-family:Caviar_Dreams_Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/fonts/Caviar_Dreams_Bold.ttf);}
  .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan-optipro/home/bg.png);background-size:cover;}
  .bg-blue{background-color: #BFF4FA;color: #0949A0;padding: 25px;border-radius: 25px;font-family:VAGRoundedStd-Light;font-size: 21px;text-align: center;}
  .recetas {width: 67%;margin: 0 auto;display: block;}
  .title-video {background-color: #2654A1;text-align: center;color: #fff;font-family: Caviar_Dreams_Bold;padding: 10px;border-radius: 0 20px 20px 0px;}
  .content{padding: 0 55px;}
  .compra-online {width: 65%;margin: 0 auto;display: block;}
  .btn-mas-info {background-color: #084A9E;color: #fff;text-align: center;font-family: Caviar_Dreams_Bold;font-size: 22px;border-radius: 25px;padding: 15px;width: 30%;margin: 0 auto;-webkit-box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.37);-moz-box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.37);box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.37);}
  .text-footer {font-family: Caviar_Dreams_Bold;text-align: center;color: #084A9E;margin-top: 40px;margin-bottom: 60px;}
  .foot {margin-top: -178px;float: right;}
  @media (min-width: 1000px) and (max-width: 1199px) {.foot { margin-top: -140px;}}
  .img-responsive-m {width:100%;}
  a {text-decoration:none;}
  .video-container {position: relative;padding-bottom: 56.25%;padding-top: 30px; height: 0; overflow: hidden;}
  .video-container iframe,
  .video-container object,
  .video-container embed {position: absolute;top: 0;left: 0;width: 100%;height: 100%;}
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
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=1237970366269442&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!--Versión movil-->
<?php if ($this->isMobile): ?>

<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/banner.jpg" alt="Banner Nan Optipro">
<section class="background" style="margin-top: -3px;">
<div style="padding:15px;">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/optipro.png" alt="OPTIPRO, proteína optimizada en cantidad y calidad">
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>" data-ajax="false">
    <img class="compra-online" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/compra-online.png" alt="Compra online - NAN OPTIPRO">
  </a>
  <div class="bg-blue" style="font-size: 18px;padding: 8px;margin-top: 25px;">
    <p>Las proteínas influyen directamente en el <br>
    desarrollo y crecimiento ya que estructuran, <br>
    conforman y mantienen los tejidos, músculos y órganos.</p>
    <p>Darle a tu hijo una proteína de excelente calidad, <br>
       es clave para lograr una adecuada nutrición.</p>
  </div>
  <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro">
    <img class="recetas" style="margin-top: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/recetas.png" alt="Recetas con NAN OPTIPRO">
  </a>
  <h4 class="title-video" style="padding: 19px;font-size: 15px;width: 75%;margin: 25px auto;border-radius: 20px;"> PROTEINAS DE CALIDAD  </h4>
  <div class="video-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/yCbVoCRm1Ww?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
  </div>
  <h4 class="title-video" style="padding: 19px;font-size: 15px;width: 75%;margin: 25px auto;border-radius: 20px;"> IMPORTANCIA DE LA PROTEINA EN LOS NIÑOS DESPUES DE 2 AÑOS DE EDAD </h4>
  <div class="video-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/_1K2GhJOV2Y?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
  </div>
  <img class="img-responsive-m" style="margin: 15px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/adecuada-maduracion.png" alt="Contribuye a la adecuada maduración de">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/organos.png">
  <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan">
    <h2 class="btn-mas-info" style="width: 80%;font-size: 15px;margin-top: 15px;">MÁS INFORMACIÓN</h2>
  </a>
  <p class="text-footer" style="margin-bottom: 0px;">Producto a partir de 24 meses. <br>
  *Junto con una alimentación balanceada y ejercicio físico diario.</p>
</div>
  <img class="img-responsive-m" style="margin-top: -80px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/pata.png">
</section>
<!--Version movil-->



<!--Versión escritorio-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/banner.jpg" alt="Banner Nan Optipro">
<div class="container">
  <section class="background">
    <div class="content">
      <div class="row" style="padding: 35px 0;">
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/optipro.png" alt="OPTIPRO, proteína optimizada en cantidad y calidad">
        </div>
        <div class="col-sm-6 col-md-6">
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>">
            <img class="compra-online" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/compra-online.png" alt="Compra online - NAN OPTIPRO">
          </a>
        </div>
      </div>
      <div class="row" style="padding-bottom: 35px;">
        <div class="col-sm-6 col-md-6">
          <div class="bg-blue">
            <p>Las proteínas influyen directamente en el <br>
            desarrollo y crecimiento ya que estructuran, <br>
            conforman y mantienen los tejidos, músculos y órganos.</p>
            <p>Darle a tu hijo una proteína de excelente calidad, <br>
               es clave para lograr una adecuada nutrición.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro">
            <img class="recetas" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/recetas.png" alt="Recetas con NAN OPTIPRO">
          </a>
        </div>
      </div>
      <div class="row" style="padding-bottom: 35px;">
        <div class="col-sm-6 col-md-6">
          <h4 class="title-video" style="padding: 19px;font-size: 21px;"> PROTEINAS DE CALIDAD  </h4>
          <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/yCbVoCRm1Ww?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <h4 class="title-video"> IMPORTANCIA DE LA PROTEINA EN LOS <br> NIÑOS DESPUES DE 2 AÑOS DE EDAD </h4>
          <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/_1K2GhJOV2Y?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <img class="img-responsive" style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/adecuada-maduracion.png" alt="Contribuye a la adecuada maduración de">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/organos.png">
          <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan">
            <h2 class="btn-mas-info">MÁS INFORMACIÓN</h2>
          </a>
          <p class="text-footer">Producto a partir de 24 meses. <br>
          *Junto con una alimentación balanceada y ejercicio físico diario.</p>
        </div>
      </div>
    </div>
    <img class="img-responsive foot" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/home/pata.png">
</section>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
