<?php $this->pageTitle = "Nutribén crecimiento - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Nutribén® Crecimiento ayuda a que los niños crezcan sanos y fuertes. Contribuye a fortalecer el sistema óseo, favorece el desarrollo mental y visual del niño.'>
  <meta name='keywords' content='nutriben, nutriben crecimiento, nutriben 3'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    @font-face {font-family:GothamRnd-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/nutriben/fonts/GothamRnd-Bold.otf);}
    @font-face {font-family:Gotham-Rounded-Medium;src: url(".Yii::app()->request->baseUrl."/images/contenido/nutriben/fonts/Gotham-Rounded-Medium.otf);}
    @font-face {font-family:gotham-rounded-light;src: url(".Yii::app()->request->baseUrl."/images/contenido/nutriben/fonts/gotham-rounded-light.otf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FF3C00;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .experience{margin: 0 auto;display: block;width: 60%;}
    .main-title {font-family:GothamRnd-Bold;color:#0E4190;text-align: center;margin: 0;font-size: 32px;}
    .pattern {background-size: cover;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nutriben/background.png); }
    .head-table{margin-bottom: 5px;padding: 15px;text-align: center;color: #fff;font-family:Gotham-Rounded-Medium;font-size: 13px;}
    .head-table.blue{background-color:#24598B;}
    .head-table.green{background-color:#6D821B;}
    .head-table.yellow{background-color:#BD8318;}
    .head-table.red{background-color:#A51107;}
    .content-table{height: 105px;border-radius: 0 0 25px 25px;color:#fff;font-family:gotham-rounded-light;padding-inline-start: 83px;font-size: 17px;}
    .embed-container {position: relative;padding-bottom: 56.25%;height: 0;overflow: hidden;}
    .embed-container iframe {position: absolute;top:0;left: 0;width: 100%;height: 100%;}
  </style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Version movil-->
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/banner-nutriben-crecimiento.jpg" alt="Nutribén crecimiento, fórmula láctea de crecimiento en polvo">
<div class="pattern" style="padding: 0 15px;">
  <img class="experience" style="width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/anos-de-experiencia.png" alt="Alter - 75 años de experiencia">
  <h2 class="main-title" style="font-size: 18px;margin: 15px auto;">Especialistas en nutrición infantil <br> para niños entre 1 a 3 años</h2>
  <img style="width: 90%;margin: 35px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/mayor-rendimiento.png" alt="27 Vasos - Mayor rendimiento">
  <h3 style="font-family: Gotham-Rounded-Medium;color: #0E4190;border-bottom: 2px solid #0E4190;display: inline-block;">FORTALECE:</h3>
  <img style="width: 80%;margin: 30px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/sistema.png" alt="Fortalece sistema digestivo, inmune, óseo y función visual">
  <img style="width: 80%;margin: -35px auto;display: block;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/nutriben-crecimiento.png " alt="Nutribén crecimiento disponible en colombia">
  <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3232)) ?>"><img style="width: 80%;margin: 0 auto 85px;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/compra-online.png " alt="Compra online Nutribén"></a>
  <h4 class="head-table blue">Favorece Sistema Digestivo</h4>
  <ul class="content-table" style="height: 60px;background-color:#2A77BB;padding-inline-start: 45px;margin-top: 5px;">
    <li style="padding-top: 12px;">Contiene Maltodextrina</li>
  </ul>
  <h4 class="head-table green">Ayuda a fortalecer el Sistema inmune</h4>
  <ul class="content-table" style="background-color:#93AD25;padding-inline-start: 45px;margin-top: 5px;">
    <li style="padding-top: 12px;">Vitamina A, B6, C y E.</li>
    <li>Zinc &#8226; Cobre &#8226; Hierro</li>
    <li>Ácido Fólico &#8226; Selenio</li>
  </ul>
  <h4 class="head-table yellow">Apoya el Crecimiento Óseo</h4>
  <ul class="content-table" style="background-color:#DE961D;padding-inline-start: 45px;margin-top: 5px;">
    <li style="padding-top: 12px;">Contiene Calcio</li>
    <li>Vitamina D</li>
  </ul>
  <h4 class="head-table red"> Mejor desarrollo mental y visual</h4>
  <ul class="content-table" style="background-color:#E20612;padding-inline-start: 45px;margin-top: 5px;">
    <li style="padding-top: 12px;">Contiene Ácido Alfa Linolénico</li>
    <li>Ácido Linolénico</li>
  </ul>
  <center>
    <h3 style="font-family: Gotham-Rounded-Medium;color: #0E4190;border-bottom: 2px solid #0E4190;display: inline-block;margin: 45px auto 20px;">CONOCE MÁS</h3>
    <div class="embed-container">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/OsjsILeZJzU?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>    </div>
  </center>
  <p style="text-align: center;padding-bottom: 20px;color: #fff;font-family: gotham-rounded-light;font-size: 12px;margin-bottom: 15px;">*La leche materna es el mejor alimento para el niño. El producto promocinado sólo es complementario de la leche
  materna después de los primeros 4 meses de esas del niño. <strong>Registro Sanitario: RSIA02166113</strong></p>
</div>
<div class="datos-contacto" style="padding: 20px 15px;">
    <p class="text-atencion">Si tienes algún inconveniente con tu pedido comunícate con nosotros a través de los canales que tenemos disponibles:</p>
    <img class="img-responsive-m"  style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/chat.png">
    <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Chat en linea</p>
    <img class="img-responsive-m" style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/pqrs.png">
    <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Sistema PQRS</p>
    <p style="font-size:12px;font-family: MyriadPro;">(preguntas, quejas, reclamos y solicitudes)</p>
    <img class="img-responsive-m" style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/linea.png">
    <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Linea gratuita</p>
    <p style="font-family: MyriadPro;">01-8000-939900</p>
  </div>
<div class="bg-red">
  <p style="margin:0;">Gracias por comprar en <a href="https://www.larebajavirtual.com">www.larebajavirtual.com</a></p>
</div>
<!--Versión escritorio-->
<?php else: ?>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3232)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/btn-fijo.png" alt="Compra online"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/banner-nutriben-crecimiento.jpg" alt="Nutribén crecimiento, fórmula láctea de crecimiento en polvo">
<div class="container">
  <div class="pattern col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="margin-top: 50px;">
    <img class="experience" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/anos-de-experiencia.png" alt="Alter - 75 años de experiencia">
    <h2 class="main-title">Especialistas en nutrición infantil <br> para niños entre 1 a 3 años</h2>
    <img class="img-responsive" style="width: 90%;margin: 35px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/mayor-rendimiento.png" alt="27 Vasos - Mayor rendimiento">
    <div class="col-sm-6 col-md-6">
      <h3 style="font-family: Gotham-Rounded-Medium;color: #0E4190;border-bottom: 2px solid #0E4190;display: inline-block;margin-top: 15%;">FORTALECE:</h3>
      <img class="img-responsive" style="width: 80%;margin: 30px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/sistema.png" alt="Fortalece sistema digestivo, inmune, óseo y función visual">
    </div>
    <div class="col-sm-6 col-md-6">
      <img class="img-responsive" style="width: 80%;margin: -35px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/nutriben-crecimiento.png " alt="Nutribén crecimiento disponible en colombia">
      <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3232)) ?>"><img class="img-responsive" style="width: 80%;margin: 25px auto 30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/compra-online.png " alt="Compra online Nutribén"></a>
    </div>
    <div class="row" style="margin-bottom: 20px;padding: 0 30px;">
      <div class="col-sm-6 col-md-6">
        <h4 class="head-table blue">
          <img class="img-responsive" style="width: 97px;position: absolute;top: -17px;left: -17px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/1-sistema-digestivo.png">
          <span>Favorece Sistema Digestivo</span></h4>
        <ul class="content-table" style="background-color:#2A77BB;">
          <li style="padding-top: 12px;">Contiene Maltodextrina</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-6">
        <h4 class="head-table green">
          <img class="img-responsive" style="width: 97px;position: absolute;top: -17px;left: -17px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/2-sistema-inmune.png">
          <span style="margin-left: 42px;">Ayuda a fortalecer el Sistema inmune</span></h4>
        <ul class="content-table" style="background-color:#93AD25;">
          <li style="padding-top: 12px;">Vitamina A, B6, C y E.</li>
          <li>Zinc &#8226; Cobre &#8226; Hierro</li>
          <li>Ácido Fólico &#8226; Selenio</li>
        </ul>
      </div>
    </div>
    <div class="row" style="padding: 0 30px;">
      <div class="col-sm-6 col-md-6">
        <h4 class="head-table yellow">
          <img class="img-responsive" style="width: 97px;position: absolute;top: -17px;left: -17px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/3-crecimiento-oseo.png">
          <span>Apoya el Crecimiento Óseo</span></h4>
        <ul class="content-table" style="background-color:#DE961D;">
          <li style="padding-top: 12px;">Contiene Calcio</li>
          <li>Vitamina D</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-6">
        <h4 class="head-table red">
          <img class="img-responsive" style="width: 97px;position: absolute;top: -17px;left: -17px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutriben/4-snc-y-funcion-visual.png">
          <span style="margin-left: 21px;">Mejor desarrollo mental y visual</span></h4>
        <ul class="content-table" style="background-color:#E20612;">
          <li style="padding-top: 12px;">Contiene Ácido Alfa Linolénico</li>
          <li>Ácido Linolénico</li>
        </ul>
      </div>
    </div>
    <center>
      <h3 style="font-family: Gotham-Rounded-Medium;color: #0E4190;border-bottom: 2px solid #0E4190;display: inline-block;margin: 45px auto 20px;">CONOCE MÁS</h3>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/OsjsILeZJzU?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>    </center>
    <p style="text-align: center;color: #fff;font-family: gotham-rounded-light;font-size: 12px;margin-bottom: 15px;">*La leche materna es el mejor alimento para el niño. El producto promocinado sólo es complementario de la leche <br>
    materna después de los primeros 4 meses de esas del niño. <strong>Registro Sanitario: RSIA02166113</strong></p>
  </div>
</div>
<div class="container datos-contacto">
  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <p class="text-atencion">Si tienes algún inconveniente con tu pedido comunícate con nosotros a través de los canales que tenemos disponibles:</p>
    <div class="col-sm-4 col-md-4" style="border-right: 2px solid #FF3C00;">
        <img class="img-responsive"  style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/chat.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Chat en linea</p>
      </div>
    <div class="col-sm-4 col-md-4" style="border-right: 2px solid #FF3C00;">
        <img class="img-responsive" style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/pqrs.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Sistema PQRS</p>
        <p style="font-size:12px;font-family: MyriadPro;">(preguntas, quejas, reclamos y solicitudes)</p>
      </div>
    <div class="col-sm-4 col-md-4">
        <img class="img-responsive" style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/linea.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Linea gratuita</p>
        <p style="font-family: MyriadPro;">01-8000-939900</p>
      </div>
  </div>
</div>
<div class="bg-red">
  <p style="margin:0;">Gracias por comprar en <a href="https://www.larebajavirtual.com">www.larebajavirtual.com</a></p>
</div>
<!--Fin versión escritorio
<?php endif; ?>
