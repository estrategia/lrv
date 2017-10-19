<?php $this->pageTitle = "Gelicart | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Gelicart Colágeno Hidrolizado en Polvo, Ayuda a Mejorar la Funcionalidad de las Articulaciones en el Cuerpo Mejorando la Calidad de Vida. ¡Cómpralo Aquí!'>
<meta name='keywords' content='gelicart, gelicart colageno hidrolizado, colageno hidrolizado para articulaciones'>
  <style>
    @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .button-desplegable .icon2 {position: relative;width: 100px;height: 100px;-webkit-transition: .2s color;-o-transition: .2s color;transition: .2s color;z-index: 2;}
    .button-desplegable .text2 {display: none;margin-top: -7px;position: absolute;z-index: 1;}
    .button-desplegable:hover .text2 {width: 165px;display: block;-webkit-animation: appearRight .5s ease-out both ;animation: appearRight .5s ease-out both ;margin-top: -93px;}
    @-webkit-keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    @keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(-45%);transform: translateX(-45);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    a {text-decoration:none;}
    #main-content {color: #56555A;}
    #main-content h1 {font-family: HelveticaNeueBold;}
    #main-content strong {font-family: HelveticaNeueBold;font-weight:initial;}
    .section-logo {background-color:#F9F7F8;border-bottom:5px solid #C3C3C3;padding: 15px 35px;}
    .content-icons {display:flex;width: 70.222%;margin: 0 auto;text-align:center;}
    .content-icons .item {flex-grow: 1;margin: 0 3px;}
    .section-intro {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/gelicart/bg-que-es.png);background-size: 100% 100%;text-align: center;padding: 8px 0;margin: 20px 0;}
    .txt-naranja {color:#F28552;font-size: 22px;}
    .que-es {background-color: #F8F6FB;text-align: center;padding: 20px 0;margin-bottom: 30px;}
    .que-es h2 {font-family: HelveticaNeueBold;}
    .por-que {padding-bottom: 25px;}
    .item strong {font-size: 14px;}
    .item p {font-size: 13px;}
    .item img {transition: 0.4s ease;}
    .item img:hover {-ms-transform: rotate(5deg);-webkit-transform: rotate(5deg);transform: rotate(5deg);}
    .por-que h2 {font-family: HelveticaNeueBold;text-align:center;color:#F07436;}
    .bg-gray {background-color: #F8F6FB;padding: 20px 0;}
    .img-responsive.img-producto {margin: 40px auto 0;width: 35%;}
    .img-responsive.btn-compra {margin: 30px auto 10px;width: 250px;}
    .bg-video {background-color: #EDAE3A;padding: 20px 0;margin: 35px 0 0;}
    .section-social {padding: 29px 0;font-size: 20px;font-weight: 600;text-align:center;color:#fff;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/gelicart/bg-social.png);background-size: 100% 100%;}
    .legal {padding: 15px 0;background-color:#5B78BA;color:#fff;}
    .bg-video h2 {font-family: HelveticaNeueBold;text-align:center;color:#fff;font-size: 40px;margin-bottom:25px;}
    .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
    .video iframe{position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
    .content-video {margin: 0 20%;padding: 25px;background-color: #fff;border-radius: 25px;}
    .content-video hr {border-top: 4px solid #F18930;}
    .fa {background-color: #fff;color: #DA8A39;padding: 10px;border-radius: 50%;width: 40px;height: 40px;margin-right: 8px;margin-top: 20px;}
    sub, sup {font-size: 60% !important;}
    .section-intro-m {padding:0 15px 25px;text-align: center;}
    .iconos-g{width: 170px;margin: 0 auto;display: block;}
  </style>
";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div class="section-logo"><img width="120" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/logo-sanofi.png" alt="Sanofi"></div>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/mobile/banner.jpg" alt="Gelicart 100% Colágeno hidrolizado">
<section class="section-intro-m">
    <h1>¿Qué es Gelicart<sup>®</sup>?<sup>1</sup></h1>
  <h3 style="font-size: 16px;">Gelicart<sup>®</sup> es <strong>colágeno hidrolizado</strong> en polvo conformado <strong>100% por Fortigel<sup>®</sup>.</strong></h3>
  <p class="txt-naranja" style="margin:0px;font-size: 17px;">El consumo de colágeno hidrolizado<br>
     puede ayudar a mejorar la funcionalidad <br>
     de las articulaciones mejorando la calidad <br>
     de vida, Gelicart 100% colágeno hidrolizado.
  </p>
</section>
<section class="que-es" style="padding: 15px 20px">
  <h2 style="font-size: 20px;">¿Qué es colágeno hidrolizado?<sup>¹</sup></h2>
  <p style="font-size: 17px;">Es una proteína importante que ayuda a mejorar nuestro bienestar y calidad de vida.
     Se obtiene a través de un exclusivo proceso de fabricación a partir de colágeno de origen porcino de alta calidad.</p>
</section>
<section class="por-que">
  <h2>¿Por qué Gelicart?<sup>¹</sup></h2>
  <div style="padding: 0 15px;text-align: center;">
    <img class="iconos-g" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/buena-fuente.png" alt="1 Sobre al fía es buena fuente">
    <strong>Un sobre al día es buena fuente</strong>
    <p style="margin: 0;">de proteína, como complemento <br>de una alimentación balanceada<sup>¹</sup></p>
    <img class="iconos-g" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/origen-natural.png" alt="origen natural">
    <strong>Origen natural</strong>
    <img class="iconos-g" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/mezcla.png" alt="Mézclalo con cualquier líquido">
    <strong>Mézclalo con cualquier líquido</strong>
    <p style="margin: 0;">o alimento de tu preferencia. (No debe <br>
    ser gasificado ni contener alcohol)</p>
    <img class="iconos-g" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/sin-olor.png" alt="No tiene olor ni sabor">
    <strong>No tiene olor ni sabor</strong>
    <img class="iconos-g" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/0-azucar-grasa.png" alt="0% azucar grasa">
    <div style="display:flex;justify-content: center;align-items: center;margin-top: -11px;">
      <strong style="font-size: 45px;margin-right:5px;">0<sup style="font-size: 27px;">%</sup></strong>
      <strong style="line-height: 15px;">Azúcar <br> Grasa</strong>
    </div>
    <img class="iconos-g" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/origen.png" alt="Origen Alemán">
    <strong>Origen Alemán</strong>
    <img class="iconos-g" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/lab-sanofi.png" alt="Laboratorio Sanofi">
    <strong>Gelicart<sup>®</sup> cuenta con el respaldo</strong>
    <p style="margin: 0;">científico que ofrece el laboratorio Sanofi</p>
  </div>
</section>
<section>
  <img style="margin: 0 auto;display: block;width: 225px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/pack-gelicart.png" alt="Gelicart 100% Colágeno Hidrolizado">
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 23893 )) ?>"><img style="margin: 35px auto;display: block;width: 175px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="Comprar - Gelicart 100% Colágeno Hidrolizado"></a>
</section>
<section class="bg-video">
  <h2 style="font-size: 22px;">¿Cómo consumir Gelicart<sup>®</sup>?<sup>¹</sup></h2>
  <div class="content-video" style="margin: 0 5%;border-radius: 15px;">
    <div class="video">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/vmLJmfpcYWE?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <hr>
    <p style="font-size: 12px;margin-bottom:0px;">Sin sabor, sin olor, Gelicart<sup>®</sup> puede ser mezclado en cualquier alimento líquido o alimento de tu preferencia, vierte el contenido total de 1 sobre <br>
    con 10 g de Gelicart<sup>®</sup> en cualquier comida o bebida (No debe ser gasificado ni contener alcohol). Recuerda mezclar bien enseguida.</p>
  </div>
</section>
<section class="legal">
  <img class="img-responsive" style="width: 170px;margin: 0 auto 8px;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/logo-sanofi-w.png" alt="Sanofi">
  <div style="font-size: 11px;padding: 0 15px;">
    <sup>¹</sup>INSERTO DE PRODUCTO.  *IMS MAT DICIEMBRE DE 2016: MERCADO DE COLÁGENOS HIDROLIZADOS DE USO ORAL DENTRO DE LA CLASE TERAPÉUTICA M05X. ESTE PRODUCTO
    NO SIRVE PARA EL TRATAMIENTO, CURA O PREVENCIÓN DE ALGUNA ENFERMEDAD. ESTE PRODUCTO ES UN SUPLEMENTO DIETARIO, NO ES UN MEDICAMENTO Y NO SUPLE UNA
    ALIMENTACIÓN EQUILIBRADA. REGISTRO SANITARIO INVIMA SD2013-0002862.
</section>
<section class="section-social" style="font-size: 13px;">
  Visita nuestra página <u>www.gelicart.com.co </u><br>
  <i class="fa fa-facebook"  style="background-color: #fff;color: #DA8A39;padding: 5px;border-radius: 50%;width: 13px;height: 13px;margin-right: 8px;margin-top: 20px;" aria-hidden="true"></i>gelicartcolombia
  <i class="fa fa-instagram" style="margin-left: 15px;background-color: #fff;color: #DA8A39;padding: 5px;border-radius: 50%;width: 13px;height: 13px;margin-right: 8px;margin-top: 20px;" aria-hidden="true"></i>  @gelicartco
</section>
<section class="programa-hora" style="font-size: 16px;">
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
<!-- Fin Version movil -->
<?php else: ?>
  <!--Versión escritorio-->
<!-- <a href="#">
  <div class="sidebar-cart animate1 wow rotateInDownRight" data-wow-offset="350">
    <div class="button-desplegable">
      <div class='icon2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/circle.png" alt=""></div>
      <div class='text2'><img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/chococono/line-circle.png" alt=""></div>
    </div>
  </div>
</a> -->
<div class="section-logo"><img width="200" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/logo-sanofi.png" alt="Sanofi"></div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/banner.jpg" alt="Gelicart 100% Colágeno hidrolizado">
<section class="section-intro">
  <h1>¿Qué es Gelicart<sup>®</sup>?<sup>1</sup></h1>
  <h3>Gelicart<sup>®</sup> es <strong>colágeno hidrolizado</strong> en polvo conformado <strong>100% por Fortigel<sup>®</sup></strong></h3>
  <p class="txt-naranja">El consumo de colágeno hidrolizado puede ayudar a mejorar <br>
  la funcionalidad de las articulaciones mejorando la calidad <br>
  de vida, Gelicart 100% colágeno hidrolizado.
  </p>
</section>
<section class="que-es">
  <h2>¿Qué es colágeno hidrolizado?<sup>¹</sup></h2>
  <p style="font-size: 20px;">Es una proteína importante que ayuda a mejorar nuestro bienestar y calidad de vida. Se obtiene <br>
  a través de un exclusivo proceso de fabricación a partir de colágeno de origen porcino de alta calidad.</p>
</section>
<section class="por-que">
  <h2>¿Por qué Gelicart?<sup>¹</sup></h2>
  <div class="content-icons">
    <div class="item">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/buena-fuente.png" alt="1 Sobre al fía es buena fuente">
      <strong>Un sobre al día es buena fuente</strong>
      <p>de proteína, como complemento <br>de una alimentación balanceada<sup>¹</sup></p>
    </div>
    <div class="item">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/origen-natural.png" alt="origen natural">
      <strong>Origen natural</strong>
    </div>
    <div class="item">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/mezcla.png" alt="Mézclalo con cualquier líquido">
      <strong>Mézclalo con cualquier líquido</strong>
      <p>o alimento de tu preferencia. (No debe <br>
      ser gasificado ni contener alcohol)</p>
    </div>
    <div class="item">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/sin-olor.png" alt="No tiene olor ni sabor">
      <strong>No tiene olor ni sabor</strong>
    </div>
  </div>
</section>
<section class="bg-gray">
  <div class="content-icons" style="padding: 0 119px;">
    <div class="item">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/0-azucar-grasa.png" alt="0% azucar grasa">
      <div style="display:flex;justify-content: center;align-items: center;margin-top: -11px;">
        <strong style="font-size: 45px;margin-right:5px;">0<sup style="font-size: 27px;">%</sup></strong>
        <strong style="line-height: 15px;">Azúcar <br> Grasa</strong>
      </div>
    </div>
    <div class="item">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/origen.png" alt="Origen Alemán">
      <strong>Origen Alemán</strong>
    </div>
    <div class="item">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/lab-sanofi.png" alt="Laboratorio Sanofi">
      <strong>Gelicart<sup>®</sup> cuenta con el respaldo</strong>
      <p>científico que ofrece el laboratorio Sanofi</p>
    </div>
  </div>
</section>
<section>
  <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/pack-gelicart.png" alt="Gelicart 100% Colágeno Hidrolizado">
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 23893 )) ?>"><img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="Comprar - Gelicart 100% Colágeno Hidrolizado"></a>
</section>
<section class="bg-video">
  <h2>¿Cómo consumir Gelicart<sup>®</sup>?<sup>¹</sup></h2>
  <div class="content-video">
    <div class="video">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/vmLJmfpcYWE?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <hr>
    <p style="font-size: 12px;margin-bottom:0px;">Sin sabor, sin olor, Gelicart<sup>®</sup> puede ser mezclado en cualquier alimento líquido o alimento de tu preferencia, vierte el contenido total de 1 sobre <br>
    con 10 g de Gelicart<sup>®</sup> en cualquier comida o bebida (No debe ser gasificado ni contener alcohol). Recuerda mezclar bien enseguida.</p>
  </div>
</section>
<section class="legal">
  <div class="container">
    <div class="col-sm-2">
      <img class="img-responsive" style="margin-top: 8px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/logo-sanofi-w.png" alt="Sanofi">
    </div>
    <div class="col-sm-10" style="font-size: 11px;">
      <sup>¹</sup>INSERTO DE PRODUCTO.  *IMS MAT DICIEMBRE DE 2016: MERCADO DE COLÁGENOS HIDROLIZADOS DE USO ORAL DENTRO DE LA CLASE TERAPÉUTICA M05X. ESTE PRODUCTO
      NO SIRVE PARA EL TRATAMIENTO, CURA O PREVENCIÓN DE ALGUNA ENFERMEDAD. ESTE PRODUCTO ES UN SUPLEMENTO DIETARIO, NO ES UN MEDICAMENTO Y NO SUPLE UNA
      ALIMENTACIÓN EQUILIBRADA. REGISTRO SANITARIO INVIMA SD2013-0002862.
    </div>
  </div>
</section>
<section class="section-social" style="font-size: 13px;">
  Visita nuestra página <u>www.gelicart.com.co </u><br>
  <i class="fa fa-facebook" aria-hidden="true"></i>gelicartcolombia
  <i class="fa fa-instagram" style="margin-left: 50px;" aria-hidden="true"></i>  @gelicartco
</section>
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
