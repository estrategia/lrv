
<?php $this->pageTitle = "Naturales | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content=''>
<meta name='keywords' content=''>
  <style>
    @font-face { font-family:NeutraText-LightAlt; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/naturales/font/NeutraText-LightAlt.ttf);}
    .background-mobile{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/naturales/background-movil.png);background-size: cover;background-repeat: no-repeat;background-position: center center;}
    .img-responsive-m {width:100%;}
    .marca {width: 75%;margin: 0 auto;display: block;padding-top: 45px;}
    .slogan {font-family: NeutraText-LightAlt;color: #006528;background-color: rgba(135, 225, 6, 0.3);text-align: center;font-size: 21px;font-weight: bold;}
    .contain {padding: 92px 30px;}
    .background{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/naturales/background-completo.png);background-size:cover;background-repeat: no-repeat;background-position: top center;}
    .logo-marca {width: 29%;margin: 0 auto;display: block;padding-top: 45px;}
    .titulo {font-family: NeutraText-LightAlt;color: #006528;background-color: rgba(151, 186, 75, 0.31);text-align: center;font-size: 36px;font-weight: bold;margin-top: 10px;}
    .ico-naturales{width: 40%;margin:0 auto;display:block;}
    .vitaminas {margin-left: 46%;}
    .resfriado {margin-right: 46%;}
    .adelgazantes {margin-right: 42%;}
    .inflamacion {margin-left: 42%;}
  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<section class="background-mobile">
  <img class="marca" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/marca-naturales.png" alt="Naturales - La rebaja virtual">
  <p class="slogan">Un mundo de bienestar para ti</p>
  <div class="contain">
    <a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/sistema-nervioso.png" alt="Sistema nervioso"></a>
    <a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/vitaminas-minerales.png" alt="Vitaminas y minerales"></a>
    <a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/resfriado-tos.png" alt="Resfriado y tos"></a>
    <a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/digestion-estomago.png" alt="Digestión y estómago"></a>
    <a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/sistema-circulatorio.png" alt="Sistema circulatorio"></a>
    <a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/adelgazantes-depresores.png" alt="Adelgazantes y depresores"></a>
    <a href="#"><img class="img-responsive-m" style="margin-bottom: 153px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/inflamacion-dolor.png" alt="Inflamación y dolor"></a>
  </div>
</section>
<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<section class="background">
  <img class="logo-marca" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/marca-naturales.png" alt="Naturales - La rebaja virtual">
  <p class="titulo">Un mundo de bienestar para ti</p>
  <div class="container-fluid">
    <div class="row" style="margin-top: 5%;">
      <div class="col-sm-12 col-md-12">
          <a href="#">
            <img class="ico-naturales" style="width: 20%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/sistema-nervioso.png" alt="Sistema nervioso">
          </a>
      </div>
    </div>
    <div class="row" style="margin-top: 3%;">
      <div class="col-sm-6 col-md-6">
        <a href="#"><img class="ico-naturales vitaminas" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/vitaminas-minerales-izq.png" alt="Vitaminas y minerales"></a>
      </div>
      <div class="col-sm-6 col-md-6">
        <a href="#"><img class="ico-naturales resfriado" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/resfriado-tos.png" alt="Resfriado y tos"></a>
      </div>
    </div>
    <div class="row" style="margin-top: 3%;">
      <div class="col-sm-6 col-md-6">
        <a href="#"><img class="ico-naturales" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/digestion-estomago-izq.png" alt="Digestión y estómago"></a>
      </div>
      <div class="col-sm-6 col-md-6">
        <a href="#"><img class="ico-naturales" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/sistema-circulatorio.png" alt="Sistema circulatorio"></a>
      </div>
    </div>
    <div class="row" style="margin-top: 3%;">
      <div class="col-sm-6 col-md-6">
        <a href="#"><img class="ico-naturales adelgazantes" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/adelgazantes-depresores-izq.png" alt="Adelgazantes y depresores"></a>
      </div>
      <div class="col-sm-6 col-md-6">
        <a href="#"><img class="ico-naturales inflamacion" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/naturales/inflamacion-dolor.png" alt="Inflamación y dolor"></a>
      </div>
      <div style="height:150px;"></div>
    </div>
  </div>
</section>
<!--Fin versión escritorio-->
<?php endif; ?>
