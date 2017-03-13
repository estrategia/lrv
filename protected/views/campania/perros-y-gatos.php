
<?php $this->pageTitle = "Perros & Gatos | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
  	<style>
      @font-face {
        font-family: Nautilus;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/nautilus.otf);
      }
      @font-face {
        font-family: HelveticaNeueLTStd-Lt;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/HelveticaNeueLTStd-Lt.otf);
      }
      @font-face {
        font-family: helvetica-bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/helvetica-bold.otf);
      }
      @font-face {
        font-family: NewJune-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/NewJune-Bold.otf);
      }

      .bg-pattern {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/textura.png);background-repeat: no-repeat;background-size: cover;background-position: center;}
      .bg-pattern  .container-fluid {padding:0px;}
      .logo-perros-gatos {margin: 0px auto 140px !important;width: 33%;padding-top: 80px;}
      .logo-perros-gatos.m { margin: 0 auto 90px !important;width: 63%;padding-top: 10px;display: block;}
      .offset-4 {margin-left: 17.33333333%;}
      .perro, .gato {width: 250px;margin-top: -99px !important;padding-bottom: 20px;}
      .perro {margin:0 auto;}
      .gato {margin: 0 auto ;}
      .bg-orange {background-color:#EC6806;padding-bottom: 105px;}
      .bg-green{background-color:#8CB825;padding-bottom: 105px;}
      .muestra {margin: 40px 0 15px 0;}
      .seccion-entrega {background-color:#E30917;font-family: NewJune-Bold;color:#fff;font-size:35px;line-height: 100px;margin-top: 30px;}
      .space-1 { height: 0px !important;}
      .section-orange {font-family: helvetica-bold;background-color: #E84E0E;color: #fff;text-align: center;font-size: 30px;margin: 15px 0;}
      .contain-muestra { position: relative;}
      .call-to-action {background-color: #E84E0E;padding: 12px 30px;border-radius: 50px;color: #fff;font-family: helvetica-bold;font-size: 25px;position: absolute;bottom: 30%;margin-left: 44%;}
      .call-to-action:hover {background-color:#58170C; color:#fff;}
      .icono{width: 75px;float: left;position: relative;z-index: 1;}
      .item-link {background-color: #fff;font-size: 26px;padding: 5px 33px;border-radius: 0px 30px 30px 0;position: absolute;margin-top: 13px;margin-left: -15px;font-family: NewJune-Bold;width: 77%;text-align: center;}
      .section-button a {color:#58170C !important;}
      .icono {-webkit-transition: width 2s, height 2s, -webkit-transform 2s;transition: width 2s, height 2s, transform 2s;}
      .section-button:hover .icono {    -ms-transform: rotate(360deg);  -webkit-transform: rotate(360deg); transform: rotate(360deg);}
      .hvr-float-shadow {display: inline-block;vertical-align: middle;-webkit-transform: perspective(1px) translateZ(0);transform: perspective(1px) translateZ(0);box-shadow: 0 0 1px transparent;-webkit-transition-duration: 0.3s; transition-duration: 0.3s; -webkit-transition-property: transform;transition-property: transform;}
      .hvr-float-shadow:hover, .hvr-float-shadow:focus, .hvr-float-shadow:active {-webkit-transform: translateY(-5px);transform: translateY(-5px);}
      .hvr-float-shadow:hover::before, .hvr-float-shadow:focus::before, .hvr-float-shadow:active::before {opacity: 1;-webkit-transform: translateY(5px);transform: translateY(5px);}
      .hvr-float-shadow::before { pointer-events: none;position: absolute;z-index: -1; content: ''; top: 100%; left: 5%; height: 10px; width: 90%; opacity: 0; background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, transparent 80%);background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, transparent 80%);-webkit-transition-duration: 0.3s; transition-duration: 0.3s; -webkit-transition-property: transform, opacity; transition-property: transform, opacity;}
      .item-link.m{ background-color: #fff;font-size: 23px;padding: 3px 29px;border-radius: 0px 30px 30px 0;margin-top: 25px;margin-left: -11px;font-family: NewJune-Bold;width: 194px;text-align: center;}
      .icono.m {width: 60px;z-index: 1;margin-top: 14px;}
      .section-orange.m {font-family: helvetica-bold;background-color: #E84E0E;color: #fff;text-align: center;font-size: 19px;margin: 6px 0;padding: 15px;}
      .seccion-entrega.m {background-color: #E30917;font-family: NewJune-Bold;color: #fff;font-size: 19px;margin-top: 10px;text-align: center;padding: 15px 10px;line-height: initial;}
      .seccion-entrega.m span {font-size: 25px;}
      .call-to-action.m {background-color: #E84E0E;padding: 8px 9px;border-radius: 50px;color: #fff;font-family: helvetica-bold;font-size: 19px;display: block;width: 43%;text-decoration: none;text-align: center;margin-top: -96%;position: absolute;margin-left: 25%;bottom: inherit;}

    </style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div class="bg-pattern ">
  <img class="logo-perros-gatos m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perros-y-gatos.png" alt="Perros y gatos la rebaja virtual">
<!-- seccion perro -->
  <section>
    <div class="col-xs-6 col-sm-6 col-md-6 bg-orange">
      <center><img style="width: 42%;margin-top: -60px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perro.png"></center>
      <div style="overflow: hidden;padding: 0 9%;">
          <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorio-perro.png">
          <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/221')?>" style="color: #58170C !important;"><span class="item-link m">Accesorios</span></a>
      </div>
      <div style="overflow: hidden;padding: 0 9%;">
          <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-perros.png">
          <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/224')?>" style="color: #58170C !important;"><span class="item-link m">Aseo</span></a>
      </div>
      <div style="overflow: hidden;padding: 0 9%;">
          <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/a-humedo-perro.png">
          <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/222')?>" style="color: #58170C !important;"><span class="item-link m">Alimento húmedo</span></a>
      </div>
      <div style="overflow: hidden;padding: 0 9%;">
          <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-perros.png">
          <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/222')?>" style="color: #58170C !important;"><span class="item-link m">Alimento seco</span></a>
      </div>
      <div style="overflow: hidden;padding: 0 9%;">
          <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/snacks-perros.png">
          <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/225')?>" style="color: #58170C !important;"><span class="item-link m">Snacks</span></a>
      </div>
      <div style="overflow: hidden;padding: 0 9%;">
        <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/vitaminas-perros.png">
        <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/226')?>" style="color: #58170C !important;"><span class="item-link m">Vitaminas</span></a>
      </div>
    </div>
  </section>
  <!-- seccion Gato -->
    <section style="margin-top: 120px;">
      <div class="col-xs-6 col-sm-6 col-md-6 bg-green" style="padding-bottom: 40px;">
        <center><img style="width: 42%;margin-top: -60px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/gato.png"></center>
        <div style="overflow: hidden;padding: 0 9%;">
            <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorios-gatos.png">
            <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/215')?>" style="color: #58170C !important;"><span class="item-link m">Accesorios</span></a>
        </div>
        <div style="overflow: hidden;padding: 0 9%;">
            <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-gatos.png">
            <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/219')?>" style="color: #58170C !important;"><span class="item-link m">Aseo</span></a>
        </div>
        <div style="overflow: hidden;padding: 0 9%;">
            <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/a-humedo-gato.png">
            <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/217')?>" style="color: #58170C !important;"><span class="item-link m">Alimento húmedo</span></a>
        </div>
        <div style="overflow: hidden;padding: 0 9%;">
            <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-gatos.png">
            <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/217')?>" style="color: #58170C !important;"><span class="item-link m">Alimento seco</span></a>
        </div>
        <div style="overflow: hidden;padding: 0 9%;">
            <img class="icono m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/arena-gatos.png">
            <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/218')?>" style="color: #58170C !important;"><span class="item-link m">Snacks</span></a>
        </div>
      </div>
    </section>
    <img style="margin: 15px 0 0;width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/muestra-gratis-movil.jpg">
    <a class="call-to-action m" href="<?= Yii::app()->request->baseUrl ?>/muestra-gratis-perros-y-gatos">Click aquí</a>
    <div class="section-orange m">Descubre como cuidar a tu mascota</div>
    <img style="width:100%;" style="margin-top: 5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video1.png">
    <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video2.png">
    <div class="seccion-entrega m">
      <img style="width: 45%;display: block;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual">
      En la Rebaja Virtual entregamos <br><span> tu pedido en 1 hora</span>
    </div>
</div>

<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<div class="bg-pattern ">
  <img class="img-responsive logo-perros-gatos" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perros-y-gatos.png" alt="Perros y gatos la rebaja virtual">
  <div class="container-fluid">
    <!-- seccion perro -->
    <div class="col-xs-6 col-sm-6 col-md-6 bg-orange">
      <div class="row">
        <div class="col-md-9 offset-4">
            <img class="img-responsive perro" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perro.png">
        </div>
      </div>
      <div class="col-md-10 col-md-offset-2">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorio-perro.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/221')?>"><span class="item-link">Accesorios</span></a>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-perros.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/224')?>"><span class="item-link">Aseo</span></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/vitaminas-perros.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/226')?>"><span class="item-link">Vitaminas</span></a>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/snacks-perros.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/225')?>"><span class="item-link">Snacks</span></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/a-humedo-perro.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/222')?>"><span class="item-link" style="width: 289px;">Alimento Húmedo</span></a>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-perros.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/222')?>"><span class="item-link" style="width: 289px;">Alimento Seco</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- seccion gato -->
    <div class="col-xs-6 col-sm-6 col-md-6 bg-green">
      <div class="row">
            <img class="img-responsive gato" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/gato.png">
      </div>
      <div class="col-md-9 offset-4">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
                <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorios-gatos.png">
                <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/215')?>"><span class="item-link" style="width: 267px;">Accesorios</span></a>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-gatos.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/219')?>"><span class="item-link">Aseo</span></a>
            </div>
          </div>
        </div>
        <div class="row" >
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/a-humedo-gato.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/217')?>"><span class="item-link" style="width: 267px;padding: 5px 10px;">Alimento húmedo</span></a>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/arena-gatos.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/218')?>"><span class="item-link">Arena</span></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="section-button">
              <img class="img-responsive icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-gatos.png">
              <a href="<?php echo CController::createUrl('/catalogo/categoria/categoria/222')?>"><span class="item-link">Alimento Seco</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="contain-muestra">
      <img class="img-responsive muestra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/muestra-gratis.png">
      <a class="call-to-action hvr-float-shadow" href="<?= Yii::app()->request->baseUrl ?>/muestra-gratis-perros-y-gatos">Click aquí</a>
    </div>
    <div class="section-orange">Descubre como cuidar a tu mascota</div>
    <div class="row">
      <div class="col-md-6">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video1.png">
      </div>
      <div class="col-md-6">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video2.png">
      </div>
    </div>
  </div>
  <div class="seccion-entrega">
    <div class="container ">
      <div class="col-md-2">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual">
      </div>
      <div class="col-md-10">
        En la Rebaja Virtual entregamos tu pedido en 1 hora
      </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
