<?php $this->pageTitle = "Gaviscon - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Gaviscon alivia los síntomas del reflujo gastroesofágico y la indigestión. Gaviscon Rápido Alivio que sentirás en 3 minutos y hasta por 4 horas.'>
  <meta name='keywords' content='gaviscon, gaviscon doble acción, antiácido.'>
  <style>
    @font-face {font-family:HelveticaNeueLight; src: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/fonts/HelveticaNeueLight.ttf );}
    @font-face {font-family:HelveticaNeue-BlackCond; src: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face {font-family:HelveticaNeueItalic; src: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/fonts/HelveticaNeueItalic.ttf);}
    @font-face {font-family:HelveticaNeueBold; src: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/fonts/HelveticaNeueBold.ttf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 15%;}
    .img-responsive-m {width:100%;}
    .bg-gray {background-color:#F3EDF1;}
    .bg-legal {background-color: #00A4A6;color: #fff;text-align: center;padding: 15px;font-size: 13px;}
    video {width: 100%;height: auto;}
    .principal-title {font-family:HelveticaNeueLight;color:#E82A92;text-align:center;font-size: 35px;margin-top: 40px;margin-bottom: 30px;}
    .principal-title span {font-family:HelveticaNeue-BlackCond;}
    .gaviscon-dobleaccion{font-family: HelveticaNeueLight;color: #E82A92;text-align: center;font-size: 55px;line-height: 48px;}
    .gaviscon-dobleaccion span {font-family:HelveticaNeue-BlackCond;}
    .gaviscon-original{font-family: HelveticaNeueLight;color: #12A19A;text-align: center;font-size: 55px;line-height: 48px;}
    .gaviscon-original span {font-family:HelveticaNeue-BlackCond;}
    .description-doble-accion{font-family:HelveticaNeueItalic;color:#12A19A;text-align:center;margin-top: 25px; }
    .description-original{font-family:HelveticaNeueItalic;color:#E82A92;text-align:center;margin-top: 25px; }
    .flecha-doble-accion {width: 9%;top: 65px;position: absolute;right: 0;}
    .flecha-original {width: 9%;top: 65px;position: absolute;left: 0;}
    .bg-doble-accion{float: right;right: 30px;width: 130%;margin-top: -80px;}
    .bg-original{float: left;right: 30px;width: 130%;margin-top: -75px;}
    .presentacion{color: #fff;text-align: center;display: block;font-size: 16px;font-family:HelveticaNeueBold;font-weight: bold;line-height: 18px;}
    .btn-compra {max-width: 100%;margin:40px auto 25px;display:block;}
    .etiqueta {width: 30%;margin: 40px auto 10px;display:block;}
    .gradient {
      background: #ffffff;
      background: -moz-linear-gradient(top, #ffffff 0%, #ffffff 46%, #f3edf1 46%, #f3edf1 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, #ffffff), color-stop(46%, #ffffff), color-stop(46%, #f3edf1), color-stop(100%, #f3edf1));
      background: -webkit-linear-gradient(top, #ffffff 0%, #ffffff 46%, #f3edf1 46%, #f3edf1 100%);
      background: -o-linear-gradient(top, #ffffff 0%, #ffffff 46%, #f3edf1 46%, #f3edf1 100%);
      background: -ms-linear-gradient(top, #ffffff 0%, #ffffff 46%, #f3edf1 46%, #f3edf1 100%);
      background: linear-gradient(to bottom, #ffffff 0%, #ffffff 46%, #f3edf1 46%, #f3edf1 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f3edf1', GradientType=0 );
    }
    .lista {font-family: HelveticaNeueLight;font-size: 19px;color:#434444;}
    .lista span {font-family: HelveticaNeueBold;}
    .doble-accion-1{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-doble-accion/bullet01.png);}
    .doble-accion-2{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-doble-accion/bullet02.png); }
    .doble-accion-3{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-doble-accion/bullet03.png); }
    .doble-accion-4{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-doble-accion/bullet04.png); }
    .original-1{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-original/bullet01.png); }
    .original-2{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-original/bullet02.png); }
    .original-3{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-original/bullet03.png); }
    .original-4{margin-bottom: 15px;list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/gaviscon/gaviscon-original/bullet04.png); }
    .bg-rosado {background-color: #E82A92;width: 100%;height: 80px;margin-top: -68px;}
    .bg-blue {background-color: #12A19A;width: 100%;height: 80px;margin-top: -68px;}
  </style>
  ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<input type="hidden" id="cantidad-producto-unidad-2630" value="1" >
<input type="hidden" id="cantidad-producto-unidad-2628" value="1" >

<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle ">
  <div class="item"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-movil/banner01.jpg" alt="Gaviscon - Rápido alivio de la indigestion y el reflujo"></div>
  <div class="item"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-movil/banner02.jpg" alt="Gaviscon - Rápido alivio del reflujo gastroesofágico"></div>
</div>
<section class="bg-gray" style="padding: 15px;">
    <h3 class="principal-title" style="margin-top: 10px;margin-bottom: 10px;font-size: 14px;">Hay una línea de productos adaptada a los síntomas <br><span style="font-weight: initial;">de la indigestion y del reflujo gastroesofágico</span></h3>
</section>
<section>
  <h2 class="gaviscon-dobleaccion">Gaviscon <br> <span>Doble Acción</span></h2>
  <h4 class="description-original">Rápido alivio de la indigestión <br>y el reflujo gastroesofágico </h4>
  <div class="ui-grid-a">
    <div class="ui-block-a">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/gaviscon-doble-accion-botella.png" alt="Gaviscon doble acción botella">
      <span class="presentacion" style="margin-top: -6px;">Botella <br> 300 ml.</span>
    </div>
    <div class="ui-block-b">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/gaviscon-doble-accion-sachets.png" alt="Gaviscon doble acción Sachets">
      <span class="presentacion" style="margin-top: -6px;">Caja x 12 sachets <br> 10ml C/U</span>
    </div>
  </div>
  <div class="bg-gray" style="padding-bottom: 20px;">
  <div class="bg-rosado"></div>
    <a data-ajax="false" data-cargar="1" data-producto="2630" data-id="1" href="">
      <img class="btn-compra" style="margin-top: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/compra-doble-accion.png" alt="Compra gaviscon doble acción">
    </a>
    <div class="lista" style="padding: 0 5%;font-size: 16px;">
      <div>
        <img style="display: inline-block;margin-top: -30px;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet01.png">
        <p style="display: inline-block;margin-left: 10px;" >Doble Alivio de la <span>indigestión</span><br> y el <span>reflujo</span></p>
      </div>
      <div>
        <img style="display: inline-block;margin-top: -30px;"class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet02.png">
        <p style="display: inline-block;margin-left: 10px;">Alivio rápido y efectivo: <span>3 minutos</span> <br>y hasta por <span>4 horas</span></p>
      </div>
      <div>
        <img style="display: inline-block;"class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet03.png">
        <p style="display: inline-block;margin-left: 10px;"><span>No necesita agua</span> <br> &nbsp;</p>
      </div>
      <div>
        <img style="display: inline-block;"class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet04.png">
        <p style="display: inline-block;margin-left: 10px;"><span>Práctica presentación <br> en sachets</span></p>
      </div>
    </div>
  </div>
</section>
<section>
  <h2 class="gaviscon-original">Gaviscon <br> <span>Original</span></h2>
  <h4 class="description-doble-accion">Rápido alivio del reflujo gastroesofágico.</h4>
  <div class="ui-grid-a">
    <div class="ui-block-a">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/gaviscon-original-botella.png" alt="Gaviscon Original botella">
      <span class="presentacion" style="margin-top: -6px;">Botella <br> 300 ml.</span>
    </div>
    <div class="ui-block-b">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/gaviscon-original-sachet.png" alt="Gaviscon original Sachets">
      <span class="presentacion" style="margin-top: -6px;">Caja x 12 sachets <br> 10ml C/U</span>
    </div>
  </div>
  <div class="bg-gray" style="padding-bottom: 20px;">
  <div class="bg-blue"></div>
  <a data-ajax="false" data-cargar="1" data-producto="2628" data-id="1" href="">
      <img class="btn-compra" style="margin-top: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/compra-original.png" alt="Compra gaviscon original">
  </a>
    <div class="lista" style="padding: 0 5%;font-size: 16px;">
      <div>
        <img style="display: inline-block;margin-top: -30px;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet01.png">
        <p style="display: inline-block;margin-left: 10px;" >Rápido Alivio del <span>reflujo <br> gastroesofágico</span></p>
      </div>
      <div>
        <img style="display: inline-block;margin-top: -30px;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet02.png">
        <p style="display: inline-block;margin-left: 10px;" >Alivio rápido y efectivo: <span>3 minutos</span> <br> y hasta por <span>4 horas</span></p>
      </div>
      <div>
        <img style="display: inline-block;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet03.png">
        <p style="display: inline-block;margin-left: 10px;" ><span>No necesita agua</span></p>
      </div>
      <div>
        <img style="display: inline-block;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet04.png">
        <p style="display: inline-block;margin-left: 10px;" ><span>Es seguro usar en el Embarazo</span></p>
      </div>
    </div>
  </div>
</section>
<img class="etiqueta" style="width: 80%;margin: 20px auto 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/mecanismo-de-accion.png" alt="Mecanismo de acción">
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-movil/banner03.jpg" alt="Gaviscon doble accion">
<img class="etiqueta" style="width: 80%;margin: 20px auto 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/seguro-en-el-embarazo.png" alt="Seguro en el embarazo">
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-movil/banner04.jpg" alt="Gaviscon seguro en el embarazo">
<section class="bg-gray">
  <img class="img-responsive-m" style="margin-top:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-movil/banner05.jpg" alt="Indigestion y reflujo bajo control">
  <div style="padding: 25px;">
    <video controls style="margin-bottom:10px;">
      <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/videos/video01.mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
    <video controls>
      <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/videos/video02.mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
  </div>
  <section class="bg-legal">
    <p>Es un medicamento, no exceder su consumo. Leer indicaciones y contraindicaciones. Indicaciones: Tratamiento coadyuvante del reflujo gastroesofágico, hiperacidez gástrica, flatulencia, indigestión,  dolor epigástrico o retroesternal siempre y cuando la causa subyacente sea el reflujo gastroesofágico. Acidez gástrica durante el embarazo. Si persisten los síntomas consulte a su médico Gaviscon Doble Acción Líquido suspensión Oral con sabor a Menta Reg. INVIMA 2012M-0012808 – Gaviscon Doble Acción Líquido Sachet Reg. INVIMA 2012M-0013657 –  Gaviscon Líiquido Sachet Reg. INVIMA 2010M-0010778 – Gaviscon Líquido suspensión oral con sabor a Menta Reg. INVIMA 2010M-0010777.</p>
  </section>
</section>
<!--Version movil-->
<!--Versión escritorio-->
<?php else: ?>
<input type="hidden" id="cantidad-producto-unidad-2630-1" value="1" >
<input type="hidden" id="cantidad-producto-unidad-2628-2" value="1" >

<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=GAVISCON">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/bnt-sticky.png" alt="Compra online"></div>
</a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-desktop/banner01.jpg" alt="Gaviscon - Rápido alivio de la indigestion y el reflujo">
<section class="bg-gray">
  <div class="row">
    <h3 class="principal-title">Hay una línea de productos adaptada a los síntomas <br><span>de la indigestion y del reflujo gastroesofágico</span></h3>
  </div>
</section>
<div class="gradient">
  <div class="container">
    <div class="col-sm-6 col-md-6">
      <div class="row">
        <h2 class="gaviscon-dobleaccion">Gaviscon <br> <span>Doble Acción</span></h2>
        <h4 class="description-doble-accion">Rápido alivio de la indigestión <br>y el reflujo gastroesofágico </h4>
        <img class="flecha-doble-accion" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/flecha-doble-acción.png">
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/gaviscon-doble-accion-botella.png" alt="Gaviscon doble acción botella">
          <span class="presentacion">Botella <br> 300 ml.</span>
        </div>
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/gaviscon-doble-accion-sachets.png" alt="Gaviscon doble acción Sachets">
          <span class="presentacion">Caja x 12 sachets <br> 10ml C/U</span>
        </div>
      </div>
      <img class="bg-doble-accion" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bg.png">
      <a data-cargar="1" data-producto="2630" data-id="1" href="">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/compra-doble-accion.png" alt="Compra gaviscon doble acción">
      </a>
      <div class="lista" style="padding: 0 15%;">
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;margin-top: -30px;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet01.png">
          <p style="display: inline-block;margin-left: 10px;" >Doble Alivio de la <span>indigestión</span><br> y el <span>reflujo</span></p>
        </div>
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;margin-top: -30px;"class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet02.png">
          <p style="display: inline-block;margin-left: 10px;">Alivio rápido y efectivo: <span>3 minutos</span> <br>y hasta por <span>4 horas</span></p>
        </div>
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;"class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet03.png">
          <p style="display: inline-block;margin-left: 10px;"><span>No necesita agua</span></p>
        </div>
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;"class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/bullet04.png">
          <p style="display: inline-block;margin-left: 10px;"><span>Práctica presentación en sachets</span></p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="row">
        <h2 class="gaviscon-original">Gaviscon <br> <span>Original</span></h2>
        <h4 class="description-original">Rápido alivio del reflujo gastroesofágico.</h4>
        <img class="flecha-original" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/flecha-original.png">
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/gaviscon-original-botella.png" alt="Gaviscon Original botella">
          <span class="presentacion">Botella <br> 300 ml.</span>
        </div>
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/gaviscon-original-sachet.png" alt="Gaviscon original Sachets">
          <span class="presentacion">Caja x 12 sachets <br> 10ml C/U</span>
        </div>
      </div>
      <img class="bg-original" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bg.png">
      <a data-cargar="1" data-producto="2628" data-id="2" href="">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/compra-original.png" alt="Compra gaviscon Original">
      </a>
      <div class="lista" style="padding: 0 15%;">
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;margin-top: -30px;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet01.png">
          <p style="display: inline-block;margin-left: 10px;" >Rápido Alivio del <span>reflujo <br> gastroesofágico</span></p>
        </div>
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;margin-top: -30px;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet02.png">
          <p style="display: inline-block;margin-left: 10px;" >Alivio rápido y efectivo: <span>3 minutos</span> <br> y hasta por <span>4 horas</span></p>
        </div>
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet03.png">
          <p style="display: inline-block;margin-left: 10px;" ><span>No necesita agua</span></p>
        </div>
        <div style="margin-bottom:15px;">
          <img style="display: inline-block;" class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/bullet04.png">
          <p style="display: inline-block;margin-left: 10px;" ><span>Es seguro usar en el Embarazo</span></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12"><img class="etiqueta" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-doble-accion/mecanismo-de-accion.png" alt="Mecanismo de acción"></div>
<section class="bg-gray">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-desktop/banner02.jpg" alt="Gaviscon">
  <div class="col-md-12">
    <img class="etiqueta" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/gaviscon-original/seguro-en-el-embarazo.png" alt="Seguro en el embarazo">
  </div>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-desktop/banner03.jpg" alt="Gaviscon seguro en el embarazo">
  <img class="img-responsive" style="margin-top: 35px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/banner-desktop/banner04.jpg" alt="Indigestion y reflujo bajo control">
  <div class="container" style="margin: 50px auto;">
    <div class="col-sm-6 col-md-6">
      <video controls>
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/videos/video01.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
      </video>
    </div>
    <div class="col-sm-6 col-md-6">
      <video controls>
        <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gaviscon/videos/video02.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
      </video>
    </div>
  </div>
  <section class="bg-legal">
    <div class="container">
      <p>Es un medicamento, no exceder su consumo. Leer indicaciones y contraindicaciones. Indicaciones: Tratamiento coadyuvante del reflujo gastroesofágico, hiperacidez gástrica, flatulencia, indigestión,  dolor epigástrico o retroesternal siempre y cuando la causa subyacente sea el reflujo gastroesofágico. Acidez gástrica durante el embarazo. Si persisten los síntomas consulte a su médico Gaviscon Doble Acción Líquido suspensión Oral con sabor a Menta Reg. INVIMA 2012M-0012808 – Gaviscon Doble Acción Líquido Sachet Reg. INVIMA 2012M-0013657 –  Gaviscon Líiquido Sachet Reg. INVIMA 2010M-0010778 – Gaviscon Líquido suspensión oral con sabor a Menta Reg. INVIMA 2010M-0010777.</p>
    </div>
  </section>
</section>
<!--Fin versión escritorio -->
<?php endif; ?>
