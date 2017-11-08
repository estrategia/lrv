<?php $this->pageTitle = "Cuidado en casa | La Rebaja Virtual"; ?>
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
    .content-banner {font-size: 16px;margin-top: 60px;margin-left: 60px;font-family:Campton-Book; }
    .bg-color {font-family:Campton-Book;background-color: #00acc8;text-align: center;color: #fff;font-size: 16px;padding: 25px;margin: 15px;}
    .line-categories img {width: 80%;margin: 0 auto; transition: all .2s ease-in-out;}
    .line-categories img:hover {  -ms-transform: scale(0.97, 0.97);-webkit-transform: scale(0.97, 0.97);transform: scale(0.97, 0.97); }
    .line-categories .blank:hover {-ms-transform: scale:(1);-webkit-transform: scale(1);transform: scale(1); }
    .line-categories p {text-align: center;font-family: Campton-ExtraLight;font-size: 20px;letter-spacing: -1px;line-height: 22px;margin-top: 10px; }
  .line-categories p span {font-family:Campton-SemiBold; }
  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/01-banner-cuidado-en-casa.jpg" alt="Cuidado en casa">
<div class="content-banner" style="margin: 0 25px;text-align: center;">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/01-cuidado-en-casa.jpg" alt="Cuidado en casa">
  <p>Tranquilidad y bienestar <br>en tu hogar para que<br>te sientas mejor.​</p>
</div>
<section class="bg-color" style="margin: 0;">
  ​Adquiere aquí en La Rebaja, todos los productos especializados para ​que puedas​ realiza​r​ ​con toda tranquilidad t​u tratamiento médico desde la comodidad de tu casa.
</section>
<div class="ui-grid-a line-categories" style="padding: 0 15px;">
	<div class="ui-block-a" style="padding: 10px;">
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/ayudas-de-movilidad"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/01-ayudas-de-movilidad.jpg" alt=""></a>
    <p>Ayudas <span>de movilidad</span></p>
	</div>
	<div class="ui-block-b" style="padding: 10px;">
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/control-y-prevencion"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/02-cuidado-prevencion.jpg" alt=""></a>
    <p>Control <span>y prevención</span></p>
	</div>
</div>
<div class="ui-grid-a line-categories" style="padding: 0 15px;">
	<div class="ui-block-a" style="padding: 10px;">
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/confort"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/03-confort.jpg" alt=""></a>
    <p><span>Confort</span></p>
	</div>
	<div class="ui-block-b" style="padding: 10px;">
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/equipos-terapia-respiratoria"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/04-equipos-terapia-respiratoria.jpg" alt=""></a>
    <p>Equipos terapia <br> <span>respiratoria</span></p>
	</div>
</div>
<div class="ui-grid-a line-categories" style="padding: 0 15px;">
	<div class="ui-block-a" style="padding: 10px;">
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/equipos-para-profesionales"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/05-equipos-para-profesionales.jpg" alt=""></a>
    <p>Equipos para <br> <span>profesionales</span></p>
	</div>
	<div class="ui-block-b" style="padding: 10px;">
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/productos-hospitalarios-y-quirurgicos"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/06-productos-hospitalarios-quirurgicos.jpg" alt=""></a>
    <p>Productos hospitalarios <br><span> y quirúrgicos</span></p>
	</div>
</div>
<div class="ui-grid-a line-categories" style="padding: 0 15px;">
	<div class="ui-block-a" style="padding: 10px;">
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/rehabilitacion-y-recuperacion"><img class="img-responsive-m" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/07-rehailitacion-recuperacion.jpg" alt=""></a>
    <p>Rehabilitación y <br> <span>recuperación</span></p>
	</div>
	<div class="ui-block-b" style="padding: 10px;">
    <img class="img-responsive-m blank" style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/08-blank.jpg" alt="">
	</div>
</div>
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
<div class="row">
  <div class="col-sm-5 col-md-5">
    <div class="content-banner">
      <img class="img-responsive" width="450" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/01-cuidado-en-casa.jpg" alt="Cuidado en casa">
      <p>Tranquilidad y bienestar <br>en tu hogar para que<br>te sientas mejor.​</p>
    </div>
  </div>
  <div class="col-sm-7 col-md-7">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/banner/01-banner-cuidado-en-casa.jpg" alt="Cuidado en casa">
  </div>
</div>
<section class="row bg-color">
  <div class="container">
    ​Adquiere aquí en La Rebaja, todos los productos especializados para ​que puedas​ realiza​r​ ​con toda tranquilidad t​u tratamiento médico desde la comodidad de tu casa.
  </div>
</section>
<div class="container">
  <div class="row line-categories" style="margin-bottom: 25px;margin-top:25px;">
    <div class="col-sm-3 col-md-3">
      <a href="<?= Yii::app()->request->baseUrl ?>/ayudas-de-movilidad"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/01-ayudas-de-movilidad.jpg" alt=""></a>
      <p>Ayudas <span>de movilidad</span></p>
    </div>
    <div class="col-sm-3 col-md-3">
      <a href="<?= Yii::app()->request->baseUrl ?>/control-y-prevencion"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/02-cuidado-prevencion.jpg" alt=""></a>
      <p>Control <span>y prevención</span></p>
    </div>
    <div class="col-sm-3 col-md-3">
      <a href="<?= Yii::app()->request->baseUrl ?>/confort"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/03-confort.jpg" alt=""></a>
      <p><span>Confort</span></p>
    </div>
    <div class="col-sm-3 col-md-3">
      <a href="<?= Yii::app()->request->baseUrl ?>/equipos-terapia-respiratoria"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/04-equipos-terapia-respiratoria.jpg" alt=""></a>
      <p>Equipos terapia <br> <span>respiratoria</span></p>
    </div>
  </div>
  <div class="row line-categories" style="margin-bottom:50px;">
    <div class="col-sm-3 col-md-3">
      <a href="<?= Yii::app()->request->baseUrl ?>/equipos-para-profesionales"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/05-equipos-para-profesionales.jpg" alt=""></a>
      <p>Equipos para <br> <span>profesionales</span></p>
    </div>
    <div class="col-sm-3 col-md-3">
      <a href="<?= Yii::app()->request->baseUrl ?>/productos-hospitalarios-y-quirurgicos"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/06-productos-hospitalarios-quirurgicos.jpg" alt=""></a>
      <p>Productos hospitalarios <br><span> y quirúrgicos</span></p>
    </div>
    <div class="col-sm-3 col-md-3">
      <a href="<?= Yii::app()->request->baseUrl ?>/rehabilitacion-y-recuperacion"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/07-rehailitacion-recuperacion.jpg" alt=""></a>
      <p>Rehabilitación y <br> <span>recuperación</span></p>
    </div>
    <div class="col-sm-3 col-md-3">
      <img class="img-responsive blank" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cuidado-en-casa/categorias/08-blank.jpg" alt="">
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
