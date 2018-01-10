<?php $this->pageTitle = "Fosfodel - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Encuentra en La Rebaja Virtual el suplemento vitamínico Fosfodel® con Borojó que brinda vitalidad y fuerza. También encuentra Flexidel® que ayuda a tratar la inflamación articular. '>
  <meta name='keywords' content='Vitaminas, dolor articular, como quitar dolor articular'>
  <style>
    @font-face {font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face {font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face {font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face {font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {font-size: 15px;}
    .programa-hora .span1 {font-family:HelveticaNeueLight;color:#363636;}
    .programa-hora .span2 {font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 16px;letter-spacing: 1px;margin-left2px;}
    .programa-hora .span3{color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;}
    .programa-hora .content {display: flex;width: 100%;flex-direction: row;max-width: 100%;flex-wrap: wrap;margin: 0 auto;}
    .programa-hora .content .seccion1 {padding-left: 100px;width: 60%;background-color: #C9C8C6;position: relative;}
    .programa-hora .content .seccion1:after {position: absolute;right: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0 23px 28px;border-color: #BF1A24 #BF1A24 #BF1A24 #C9C8C6;top: 0;}
    .programa-hora .content .seccion2 {width: 40%;background-color: #BF1A24;padding-right: 100px;}
    .programa-hora .content .seccion1-m {background-color: #C9C8C6;padding: 15px;text-align: center;}
    .programa-hora .content .seccion2-m {background-color: #BF1A24;width: 100%;padding: 15px;}
    .agradecimiento {font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 16px;}
    .agradecimiento span {font-family:HelveticaNeue-BlackCond;letter-spacing:1px;}
    a:hover, a:active, a:focus {outline: none !important;}

    @font-face {font-family:Lato-Regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/padel/fonts/Lato-Regular.ttf);}
     @font-face {font-family:Lato-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/padel/fonts/Lato-Bold.ttf);}
     @font-face {font-family:Lato-Black; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/padel/fonts/Lato-Black.ttf);}
     .main-bg {padding: 25px 0; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/padel/bg.jpg); background-size:cover;}
     .logo-padel {width: 135px;margin-left: 50px;}
     .contenedor-principal {display: -webkit-box;display: -ms-flexbox;display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -ms-flex-wrap: wrap; flex-wrap: wrap; -webkit-box-pack: justify; -ms-flex-pack: justify; justify-content: space-between; width: 100%; max-width: 600px; margin: auto;}
     .btn-comprar {width: 60%; max-width: 180px; margin: 20px auto; display:block; }
     .contenedor-principal .columna {width:50%;}
     .bg-azul { background-image:url(".Yii::app()->request->baseUrl."/images/contenido/padel/rectangulo-fosfodel.png); background-size: 100% 100%; background-repeat:no-repeat; padding-top: 50px; width: 100%; text-align: center; font-family:Lato-Regular; color:#fff; text-transform: uppercase; font-size: 13px; padding: 62px 15px 5px; }
     .bg-azul span {font-family:Lato-Bold;}
     .row-icons{display: -webkit-box;display: -ms-flexbox;display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -ms-flex-wrap: wrap; flex-wrap: wrap; -webkit-box-pack: justify; -ms-flex-pack: justify; justify-content: space-between; margin: 25px auto 0; }
     .row-icons .column {width: 25%;}
     .ico-beneficios {width: 75%; margin: 0 auto 10px; display: block; }
     .descrip-beneficios {line-height: 15px; font-family:Lato-Regular;color:#fff;text-align:center;font-size: 13px;}
     .descrip-beneficios span {font-family:Lato-Bold; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);}
     .conoce-mas {color:#C00000; text-align:center; margin:0; font-family:Lato-Black; text-transform: uppercase;}
     .img-video-fosfodel { margin: -15px auto 0; display: block; width: 50%; max-width: 300px;}
     .row-flexidel {-webkit-box-align: end;-ms-flex-align: end; align-items: flex-end; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -ms-flex-wrap: wrap; flex-wrap: wrap; -webkit-box-pack: justify; -ms-flex-pack: justify; justify-content: space-between; margin: auto;}
     .row-flexidel .column {width:50%;}
     .bg-azul-flexi {margin-top: 25px; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/padel/rectangulo-flexidel.png); background-size: 100% 100%; background-repeat:no-repeat; width: 100%; text-align: center; font-family:Lato-Regular; color:#fff; text-transform: uppercase; font-size: 13px; padding: 40px 15px 5px; }
     .bg-azul-flexi span {font-family:Lato-Bold;}
     .row-beneficios-flexi {width:100%; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row; -ms-flex-wrap: wrap; flex-wrap: wrap; -webkit-box-pack: justify; -ms-flex-pack: justify; justify-content: space-between; margin: 25px auto 0;}
     .row-beneficios-flexi .column {width:33.333%;}
     .demo-video {width: 75%; margin: 20px auto;}
     @media (min-width: 1500px) and (max-width: 1920px){
         .contenedor-principal {max-width: 900px;}
         .bg-azul {font-size: 14px;}
         .descrip-beneficios {font-size: 17px;line-height: 20px;}
         .row-icons {margin: 60px auto 0;}
         .conoce-mas {margin: 20px 0 0;font-size: 25px;}
         .img-video-fosfodel {max-width: 460px;}
         .row-flexidel {margin: 80px auto 0;}
         .bg-azul-flexi {font-size: 14px;}
         .row-beneficios-flexi .column .ico-beneficios {max-width: 146px;}
     }
     .main-bg-m {padding: 25px 0; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/padel/bg-m.jpg); background-size:cover; background-repeat:no-repeat;}
     .logo-padel-m { width: 99px; display: block; }
     .bg-azul-m { background-color: rgba(13, 107, 252, 0.7); width: 100%; text-align: center; font-family: Lato-Regular; color: #fff; text-transform: uppercase; font-size: 11px; padding: 5px;}
     .bg-azul-m span {font-family:Lato-Bold;}
  </style>
";
?>

<!-- Google Code para etiquetas de remarketing -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 966686026;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/966686026/?guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
  <div class="main-bg-m" style="padding: 25px;">
    <img class="logo-padel-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/logo-padel.png" alt="Logo padel">
    <img class="img-responsive-m" style="width: 70%; margin: 15px auto; display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/titulo-fosfodel.png" alt="Compra online">
    <img class="img-responsive-m" style="width: 70%; margin: 15px auto; display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel-pack.png" alt="Compra online">
    <a href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/btn-comprar.png" alt="Compra online"></a>
    <div class="bg-azul-m">
      <p>No te preocupes, el cansancio es uno de los síntomas más comunes en nuestra
      sociedad y puede ser provocado por el estrés y la falta de <span>ciertas vitaminas
      esenciales para nuestro cerebro que te indican que tienes agotamiento físico y mental.</span> </p>
    </div>
    <div class="row-icons">
      <div class="column" style="width: 50%;">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel02.png" alt="Nutrición y energia">
        <p class="descrip-beneficios">PROPORCIONA <span> <br> LA NUTRICIÓN Y ENERGÍA</span> NECESARIA DURANTE <br> LA LACTANCIA</p>
      </div>
      <div class="column" style="width: 50%;">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel04.png" alt="Suplemento dietario">
        <p class="descrip-beneficios"><span>SUPLEMENTO DIETARIO</span> CON VITAMINAS, MINERALES Y BOROJÓ</p>
      </div>
      <div class="column" style="width: 50%;">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel01.png" alt="Aporta vitalidad">
        <p class="descrip-beneficios"><span>APORTA</span> VITALIDAD <br> Y FUERZA</p>
      </div>
      <div class="column" style="width: 50%;">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel03.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios"><span>MEJORA</span> <br> EL RENDIMIENTO FÍSICO</p>
      </div>
    </div>

    <div class="row-flexidel" style="margin-top: 60px;">
      <img class="img-responsive-m" style="width: 70%; margin: 15px auto; display: block;"src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel-pack.png" alt="Flexidel">
      <a href="#"><img class="btn-comprar" style="max-width: initial; margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/btn-comprar.png" alt="Compra online"></a>
    </div>
    <div class="bg-azul-m" style="margin-top: 20px;">
      <p><span>harpagophytum procumbens,</span> potente antiinflamatorio y analgésico
      no esteroideo. <span>retorna la movilidad articular, mejorando
      la flexibilidad y evitando el dolor.</span> </p>
    </div>
    <div class="row-beneficios-flexi">
      <div class="column" style="width: 50%;">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel01.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios"><span>TRATA EL DOLOR</span> <br> E INFLAMACIÓN ARTICULAR</p>
      </div>
      <div class="column" style="width: 50%;">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel03.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios">MEJORARÁ LOS SIGNOS MÁS COMUNES DE DOLOR <span>Y RIGIDEZ EN LAS ARTICULACIONES</span> </p>
      </div>
      <div class="column" style="width: 50%; margin: 0 auto;">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel02.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios">TOMAR UNA A DOS CÁPSULAS DIARIAS RESULTA MUY EFICAZ <span> A <br> QUIENES PADECEN CUALQUIER TIPO DE DOLOR</span>  </p>
      </div>
    </div>
    <div style="width: 100%;">
     <iframe width="560" height="315" src="https://www.youtube.com/embed/WfL0ttjA6m4?controls=0&amp;showinfo=0&amp;autoplay=!" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  </div>


<section class="programa-hora">
  <div class="content">
    <div class="seccion1-m" style="margin: -5px;">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2-m">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
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
<!--FIN VERSION MOVIL-->


<!--VERSION DE ESCRITORIO-->
<?php else: ?>
<div class="main-bg">
  <img class="logo-padel" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/logo-padel.png" alt="Logo padel">
  <div class="contenedor-principal">
    <div class="columna">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/titulo-fosfodel.png" alt="Compra online">
      <a href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/btn-comprar.png" alt="Compra online"></a>
    </div>
    <div class="columna">
      <img class="img-responsive" style="margin-top: 50px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel-pack.png" alt="Compra online">
    </div>
    <div class="bg-azul">
      <p>No te preocupes, el cansancio es uno de los síntomas más comunes en nuestra <br>
      sociedad y puede ser provocado por el estrés y la falta de <span>ciertas vitaminas <br>
      esenciales para nuestro cerebro que te indican que tienes agotamiento físico y mental.</span> </p>
    </div>
    <div class="row-icons">
      <div class="column">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel01.png" alt="Aporta vitalidad">
        <p class="descrip-beneficios"><span>APORTA</span> VITALIDAD  <br>Y FUERZA</p>
      </div>
      <div class="column">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel02.png" alt="Nutrición y energia">
        <p class="descrip-beneficios">PROPORCIONA <br> <span>LA NUTRICIÓN Y ENERGÍA</span> <br>NECESARIA DURANTE <br>LA LACTANCIA</p>
      </div>
      <div class="column">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel03.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios"><span>MEJORA</span> <br> EL RENDIMIENTO <br>FÍSICO</p>
      </div>
      <div class="column">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/fosfodel04.png" alt="Suplemento dietario">
        <p class="descrip-beneficios"><span>SUPLEMENTO DIETARIO</span> <br> CON VITAMINAS, <br> MINERALES Y BOROJÓ</p>
      </div>
    </div>
    <div style="margin-top: 40px; width:100%;">
      <p class="conoce-mas">Conoce más</p>
      <a href="#">
        <img class="img-video-fosfodel" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/video.png" alt="Conoce más fosfodel">
      </a>
    </div>
    <div class="row-flexidel">

        <div class="column">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel-pack.png" alt="Flexidel">
      </div>

      <div class="column">
        <a href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/btn-comprar.png" alt="Compra online"></a>
      </div>
    
    </div>
    <div class="bg-azul-flexi">
      <p><span>harpagophytum procumbens,</span> potente antiinflamatorio y analgésico <br>
        no esteroideo. <span>retorna la movilidad articular, mejorando <br>
        la flexibilidad y evitando el dolor.</span> </p>
    </div>
    <div class="row-beneficios-flexi">
      <div class="column">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel01.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios"><span>TRATA EL DOLOR</span> <br> E INFLAMACIÓN <br> ARTICULAR</p>
      </div>
      <div class="column">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel02.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios">TOMAR UNA A DOS CÁPSULAS <br> DIARIAS RESULTA MUY EFICAZ <br> <span> A QUIENES PADECEN CUALQUIER <br> TIPO DE DOLOR</span>  </p>
      </div>
      <div class="column">
        <img class="ico-beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/flexidel03.png" alt="Mejora el redimiento">
        <p class="descrip-beneficios">MEJORARÁ LOS SIGNOS MÁS <br> COMUNES DE DOLOR <span>Y RIGIDEZ <br> EN LAS ARTICULACIONES</span> </p>
      </div>
    </div>
    <div style="width: 100%;">
      <img class="img-responsive demo-video" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/padel/demovideo.png">
    </div>
  </div>
</div>
<section class="programa-hora">
  <div class="content">
    <div class="seccion1">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
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
<!--Fin versión escritorio -->
<?php endif; ?>
