<?php $this->pageTitle = "Nestogeno 3 Kids - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='NESTOGENO® 3 Kids es un alimento lácteo para niños desde los dos años en adelante. Con el exclusivo probiótico Lcomfortis®, DHA-ARA y 19 vitaminas y minerales.'>
  <meta name='keywords' content='Nestogeno, nestogeno 3, leche nestogeno.'>
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

    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 100;width: 200px;}
    .precioproductos-antes{font-family:VAGRoundedStd-Bold; color:#474747;margin: 0 auto;font-size: 19px;text-align: center; }
    .precioproductos-antes span::before {content: ''; width: 75px; height: 3px; background-color: #D60203; position: absolute; margin-top: 11px;}
    .precioproductos{font-family:VAGRoundedStd-Bold; color: #D60203;margin: 0 auto;font-size: 22px;text-align: center; }
    @font-face { font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/klim1-deslactosado/fonts/VAGRoundedStd-Bold.otf);}
    @font-face { font-family:VAGRoundedStd-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/klim1-deslactosado/fonts/VAGRoundedStd-Light.otf);}
    .intro-title {font-family:VAGRoundedStd-Bold;color:#B6038C;text-align: center;padding: 30px 0 80px;background-color: #fff;}
    .intro-title h1 {margin-bottom: 20px;}
    .close-button {overflow: hidden;}
    .modal-body {padding: 0;}
    .modal-content {background-color: transparent !important;box-shadow: none !important; border: none !important;}
    .bmd-modalContent {box-shadow: none; background-color: transparent; border: 0;}
    .bmd-modalContent .close {font-size: 30px; line-height: 30px; padding: 7px 4px 7px 13px; text-shadow: none; opacity: .7; color:#fff;}
    .bmd-modalContent .close span {display: block;}
    .bmd-modalContent .close:hover, .bmd-modalContent .close:focus {opacity: 1; outline: none;}
    .bmd-modalContent iframe {display: block; margin: 0 auto;}
    .section-info {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nestogeno/bg-beneficios.png); background-size: 100%; background-repeat: no-repeat; background-position: bottom; padding-bottom: 30px; }
    .contenedor-info {max-width: 944px; margin-bottom: 80px !important; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between; width: 70%; margin: -60px auto 0; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nestogeno/cuadro.png); background-size: 100%; padding: 70px 50px; background-repeat: no-repeat;}
    .contenedor-info .columna-imagen , .contenedor-info .columna-info {width:50%;}
    .proceso-compra {align-items: center;  margin-top: 30px; display: flex; width: 90%; flex-direction: row; flex-wrap: wrap; justify-content: space-between;}
    .pack-nestogeno {width: 80%; margin: 0 auto; display: block; max-width: 337px; height: 348px; max-height: 348px;}
    .nombre-producto {font-family:VAGRoundedStd-Bold;color: #B6038C;font-size: 23px;margin-top: 40px;}
    .note {margin-left: 16px;margin-top: -40px;}
    .txt-description{font-family:VAGRoundedStd-Light;font-size: 17px;margin-top: 25px;}
    .txt-description span {font-family:VAGRoundedStd-Bold;}
    .btn-compra {width: 90%;margin: 0 auto;display: block;max-width: 180px;}
    @media (min-width: 1900px) and (max-width: 1920px){
        .contenedor-info {margin-bottom: 100px !important;}
    }
    .bg-texture {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nestogeno/movil/franja-morada.jpg); background-size: 100%;background-position: bottom; background-repeat: repeat-y;}
    .bg-blanco {border: 10px double #026838; background-color:#fff; border-radius: 45px; margin: 0 25px 30px; padding: 25px; -webkit-box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.5); -moz-box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.5); box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.5);}
    .bg-video-movil {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nestogeno/movil/amarillo-video.jpg); background-size: cover; padding: 20px 25px 30px;}
    .video {position: relative; padding-bottom: 56.25%; overflow: hidden;}
    .video iframe {position: absolute; display: block; top: 0; left: 0; width: 100%; height: 100%;}
  </style>
";
?>
<!--Consulta el precio de los productos-->
<?php $nestogeno = Producto::consultarPrecio('104212', $this->objSectorCiudad)?>

<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104212)) ?>">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/movil/banner.jpg">
</a>
<div class="bg-texture" style="padding-bottom: 40px;">
  <section class="intro-title" style="padding: 0 20px 80px; font-size: 12px; margin-top: 20px;">
    <h1>NESTOGENO<sup>&reg;</sup> 3 Kids <br> es un alimento lácteo para niños sanos desde los dos años en adelante</h1>
  </section>
  <div class="bg-blanco" style="margin-top: -70px; margin-bottom: 0;">
    <img width="150" style="margin: 0 auto; display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/felicidad-que-se-nota.png" >
    <h2 class="nombre-producto" style="margin: 15px 0 0; font-size: 19px; text-align: center;">NESTOGENO<sup>&reg;</sup> 3 Kids </h2>
    <p class="txt-description" style="color:#4F4F4F;">
      Exclusivo probiótico <span>Lcomfortis<sup>&reg;</sup></span> que ayuda
      a que la barriguita de tu bebé esté feliz,
      además contiene <span>DHA-ARA, 19 vitaminas
      y minerales</span> que junto con una alimentación
      balanceada y ejercicio físico contribuyen al adecuado
      desarrollo y crecimiento de tu hijo.
    </p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/pack-nestogeno.png" alt="Compra Nestogeno Kids">
    <p class="precioproductos-antes">ANTES: <span><?= ($nestogeno == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nestogeno["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </span> </p>
    <p class="precioproductos">AHORA: <?= ($nestogeno == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nestogeno["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104212)) ?>">
      <img class="btn-compra" style="margin-top:20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/btn-comprar.png" alt="Compra Nestogeno Kids">
    </a>
  </div>
</div>
<section class="bg-video-movil">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/movil/txt-video.png" alt="Recetas nestogeno">
  <div class="video">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/smcrg8Ly_LM?rel=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
  </div>
</section>
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
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 5826)) ?>">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/btn-fijo.png" alt="Compra online"></div>
</a>
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104212)) ?>">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/banner.jpg">
</a>
<section class="section-info">
  <section class="intro-title">
    <h1>NESTOGENO<sup>&reg;</sup> 3 Kids es un alimento lácteo <br>para niños sanos desde los dos años en adelante</h1>
  </section>
  <div class="contenedor-info">
    <div class="columna-imagen">
      <img class="pack-nestogeno" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/pack-nestogeno.png" alt="Compra Nestogeno Kids">
    </div>
    <div class="columna-info">
      <h2 class="nombre-producto">NESTOGENO<sup>&reg;</sup> 3 Kids <img width="150" class="note" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/felicidad-que-se-nota.png" ></h2>
      <p class="txt-description">
        Exclusivo probiótico <span>Lcomfortis<sup>&reg;</sup></span> que ayuda <br>
        a que la barriguita de tu bebé esté feliz, <br>
        además contiene <span>DHA-ARA, 19 vitaminas <br>
        y minerales</span> que junto con una alimentación <br>
        balanceada y ejercicio físico contribuyen al adecuado <br>
        desarrollo y crecimiento de tu hijo.
      </p>
      <div class="proceso-compra">
        <div style="width: 50%;">
          <p class="precioproductos-antes">ANTES: <span><?= ($nestogeno == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nestogeno["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </span> </p>
          <p class="precioproductos">AHORA: <?= ($nestogeno == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nestogeno["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        </div>
        <div style="width: 50%;">
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 104212)) ?>">
            <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/btn-comprar.png" alt="Compra Nestogeno Kids">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section style="margin-top: -53px;">
  <a href="#" class="bmd-modalButton"  data-toggle="modal" data-bmdSrc="https://www.youtube.com/embed/smcrg8Ly_LM?rel=0&amp;showinfo=0" data-bmdWidth="800" data-bmdHeight="400" data-target="#myModal"  data-bmdVideoFullscreen="true">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestogeno/banner-video.png">
  </a>
</section>
<!--Modal-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content bmd-modalContent">
      <div class="modal-body">
          <div class="close-button">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" frameborder="0"></iframe>
        </div>
      </div>
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
<script type="text/javascript">
  !function(t){t.fn.bmdIframe=function(a){var d=this,e=t.extend({classBtn:".bmd-modalButton",defaultW:800,defaultH:400},a);return t(e.classBtn).on("click",function(a){var i=t(this).attr("data-bmdVideoFullscreen")||!1,n={src:t(this).attr("data-bmdSrc"),height:t(this).attr("data-bmdHeight")||e.defaultH,width:t(this).attr("data-bmdWidth")||e.defaultW};i&&(n.allowfullscreen=""),t(d).find("iframe").attr(n)}),this.on("hidden.bs.modal",function(){t(this).find("iframe").html("").attr("src","")}),this}}(jQuery),jQuery(document).ready(function(){jQuery("#myModal").bmdIframe()});
</script>
<!--Fin versión escritorio -->
<?php endif; ?>
