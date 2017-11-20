<?php $this->pageTitle = "Cuidado en casa - Productos hospitalarios y quirúrgicos | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=''>
  <meta name='keywords' content=''>
  <style>
    @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}

    @font-face { font-family:Campton-ExtraLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cuidado-en-casa/fonts/Campton-ExtraLight.otf);}
    @font-face { font-family:Campton-SemiBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cuidado-en-casa/fonts/Campton-SemiBold.otf);}
    @font-face { font-family:Campton-Book; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/cuidado-en-casa/fonts/Campton-Book.otf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    a,a:hover,a:active,a:focus {text-decoration:none !important;outline: none !important;}
    .title-main {color:#F27A2A;font-family: Campton-ExtraLight;letter-spacing: -2px;}
    .title-main span {font-family:Campton-SemiBold; }
    .title-main:after {content: '';width: 50px;height: 3px;background-color: #F27A2A;position: absolute;left: 76px;top: 97px;}
    .content-banner {font-size: 16px;margin-top: 60px;margin-left: 60px;font-family:Campton-Book; }
    .bg-color {font-family:Campton-Book;background-color: #C3AFB9;text-align: center;color: #3F3730;font-size: 16px;padding: 25px;margin: 15px;}
    .line-categories img {width: 80%;margin: 0 auto; transition: all .2s ease-in-out;}
    .line-categories img:hover {  -ms-transform: scale(0.97, 0.97);-webkit-transform: scale(0.97, 0.97);transform: scale(0.97, 0.97); }
    .line-categories .blank:hover {-ms-transform: scale:(1);-webkit-transform: scale(1);transform: scale(1); }
    .line-categories p {text-align: center;font-family: Campton-ExtraLight;font-size: 20px;letter-spacing: -1px;line-height: 22px;margin-top: 10px; }
    .line-categories p span {font-family:Campton-SemiBold; }
    .border {border: 3px solid #D2D0CD;border-radius: 25px;padding: 25px 0px;margin: 0 25px;}
    .roll-back {background-color: #F1F0EE;color: #3F3730;border-radius: 25px;padding: 25px 0px;margin: 0 25px;height: 320px;max-height: 320px;min-height: 320px;position: relative;}
    .roll-back p {position: absolute;top: 32%;left: 25%;right: 25%;}
    .title-main.mobile::after {content: ''; width: 50px;height: 3px; background-color: #F27A2A; position: absolute;left: 30px;top: 306px;}
    .border-m {border: 3px solid #D2D0CD;border-radius: 25px;padding: 15px 8px;margin: 0;}
    .roll-back-m {background-color: #F1F0EE;color: #3F3730;border-radius: 25px;padding: 25px 0px;height:239px;}
    .roll-back-m p {margin-top: 50%;}
  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/07-banner-hospitalarios.jpg" alt="Productos hospitalarios">
<div class="content-banner" style="margin: -10px 25px;">
  <h2 class="title-main mobile" style="margin-bottom: 0;">Cuidado <span>en casa</span></h2>
  <img width="320"  style="margin-top: 15px;margin-bottom: 15px;"src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/07-productos-hospitalarios-quirurgicos.jpg" alt="Productos hospitalarios">
  <p style="text-align: center;margin-top: 0px;margin-bottom: 30px;"> La confianza de trabajar con productos seguros <br>para situaciones específicas.</p>
</div>
<section class="row bg-color" style="margin: 0 0 20px;">
  ​Aquí en La Rebaja puedes adquirir todos los productos ​indispensable​s​ para realizar procedimientos seguros.
</section>
<div class="ui-grid-a line-categories" style="padding: 0 15px;">
	<div class="ui-block-a" style="padding: 10px;">
    <div class="roll-back-m">
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/cuidado-en-casa" style="color: #3F3730;">
        <p><span>Volver a las <br> categorías <br> principales</span></p>
      </a>
    </div>
	</div>
	<div class="ui-block-b" style="padding: 10px;">
    <div class="border-m">
      <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5120)) ?>"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/productos/guantes-quirurgicos.png" alt="Guantes quirurgicos"></a>
      <p><span>Guantes cirugía <br> &nbsp;</span></p>
      <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5120)) ?>"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/referencias.jpg" alt=""></a>
    </div>
  </div>
</div>
<div class="ui-grid-a line-categories" style="padding: 0 15px;">
	<div class="ui-block-a" style="padding: 10px;">
    <div class="border-m">
      <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5122)) ?>"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/productos/prendas-quirurgicas.png" alt="Prendas quirurgicas"></a>
      <p><span>Prendas <br> quirúrgicas</span></p>
      <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5122)) ?>"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/referencias.jpg" alt=""></a>
    </div>
	</div>
	<div class="ui-block-b" style="padding: 10px;">
    <div class="border-m">
      <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5124)) ?>"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/productos/tapabocas.png" alt="Tapabocas"></a>
      <p><span>Tapabocas <br> &nbsp;</span></p>
      <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5124)) ?>"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/referencias.jpg" alt=""></a>
    </div>
  </div>
</div>
<section class="programa-hora" style="font-size: 16px;margin-top:30px;">
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
<div class="row">
  <div class="col-sm-5 col-md-5">
    <div class="content-banner">
      <h2 class="title-main">Cuidado <span>en casa</span></h2>
      <img class="img-responsive" width="500" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/07-productos-hospitalarios-quirurgicos.jpg" alt="Productos hospitalarios">
      <p> La confianza de trabajar con productos seguros <br>para situaciones específicas. </p>
    </div>
  </div>
  <div class="col-sm-7 col-md-7">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/07-banner-hospitalarios.jpg" alt="hospitalarios">
  </div>
</div>
<section class="row bg-color">
  <div class="container">
​Aquí en La Rebaja puedes adquirir todos los productos ​indispensable​s​ para realizar procedimientos seguros.
  </div>
</section>
<div class="container">
  <div class="row line-categories" style="margin-bottom: 60px;margin-top:25px;">
    <div class="col-sm-3 col-md-3">
      <div class="roll-back">
        <a href="<?= Yii::app()->request->baseUrl ?>/cuidado-en-casa" style="color: #3F3730;">
          <p><span>Volver a las <br> categorías <br> principales</span></p>
        </a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="border">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5120)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/productos/guantes-quirurgicos.png" alt="Guantes quirurgicos"></a>
        <p><span>Guantes cirugía <br> &nbsp;</span></p>
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5120)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/referencias.jpg" alt=""></a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="border">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5122)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/productos/prendas-quirurgicas.png" alt="Prendas quirurgicas"></a>
        <p><span>Prendas <br> quirúrgicas</span></p>
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5122)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/referencias.jpg" alt=""></a>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="border">
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5124)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/productos/tapabocas.png" alt="Tapabocas"></a>
        <p><span>Tapabocas <br> &nbsp;</span></p>
        <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5124)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/referencias.jpg" alt=""></a>
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
