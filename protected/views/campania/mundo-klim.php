<?php $this->pageTitle = "Mundo Klim - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='¡Conoce nuestro Mundo KLIM®! Aquí encontrarás los alimentos lácteos para cada etapa, para niños a partir de 1 año, hasta los 5 años en adelante. '>
  <meta name='keywords' content='leche en polvo, leche klim, klim Colombia'>
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

    @font-face {font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mundo-klim/fonts/VAGRoundedStd-Bold.otf);}
    #main-content {background-color: #F3FAFF; }
    .btn-compra-banner { text-align: right; position: absolute; right: 9%; margin-top: -70px;}
    .btn-compra-banner img {width:190px; max-width:190px;}
    .intro-txt { font-family:VAGRoundedStd-Bold; text-align:center; color: #A17401; font-size: 30px; margin-bottom: 25px;}
    .intro-txt  span { color: #FE0000;}
    .row-productos { background-color: #FFC945; padding: 50px 0 25px;}
    .section-products {display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between; width: 100%; max-width: 1200px; margin: 0 auto;}
    .column {width: 23%;}
    .section-products .column img {width: 100%; max-width: 276px;}
    .precioproductos-antes{font-family:VAGRoundedStd-Bold; color:#474747;margin: 0 auto;font-size: 19px;text-align: center; }
    .precioproductos-antes span::before {content: ''; width: 75px; height: 3px; background-color: #D60203; position: absolute; margin-top: 11px;}
    .precioproductos{font-family:VAGRoundedStd-Bold; color: #D60203;margin: 0 auto;font-size: 22px;text-align: center; }
    .txt-footer {  text-align: center;font-family: VAGRoundedStd-Bold;color: #FE0000;margin-top: 40px;font-size: 17px;}
    .owl-pagination {margin-top: 35px;}
    @media only screen and (max-width: 1920px) and (min-width: 1700px)  {
      .btn-compra-banner {margin-top: -92px;}
      .programa-hora .content .seccion1 {width: 55%;}
      .programa-hora .content .seccion2 { width: 45%;}
      .programa-hora .content .seccion1 {padding-left: 400px;}
      .programa-hora .content .seccion2 {padding-right: 295px;}
    }
  </style>
";
?>
<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/banner.png" alt="Nestle klim">
<h1 class="intro-txt" style="font-size: 18px;margin: 0 25px 20px;"> Al igual que tú sabemos que ninguna edad es igual a otra y es vital <br> <span>entregarle los nutrientes necesarios para cada fase de su desarrollo</span> </h1>

<section class="row-productos">
  <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item" style="margin: 0 30px;">
      <img id="Image-Maps-Com-image-maps-2018-01-09-151801" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/01-klim-fortiprotect.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-09-151801" alt="" />
      <map name="image-maps-2018-01-09-151801" id="ImageMapsCom-image-maps-2018-01-09-151801">
        <area alt="Ver más información" title="Ver más información" data-ajax="false"  href="<?= Yii::app()->request->baseUrl ?>/mundo-klim1-fortiprotect" shape="rect" coords="52,369,208,389" style="outline:none;" target="_self"     />
        <area alt="Comprar" title="Comprar" data-ajax="false"  href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 39646)) ?>" shape="rect" coords="69,401,193,428" style="outline:none;" target="_self"     />
      </map>
    </div>
    <div class="item" style="margin: 0 30px;">
      <img id="Image-Maps-Com-image-maps-2018-01-09-153711" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/02-klim-deslactosado.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-09-153711" alt="" />
      <map name="image-maps-2018-01-09-153711" id="ImageMapsCom-image-maps-2018-01-09-153711">
        <area  alt="Ver más información" title="Ver más información" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-klim1-deslactosado" shape="rect" coords="64,369,195,387" style="outline:none;" target="_self"     />
        <area  alt="Comprar" title="Comprar" data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118997)) ?>" shape="rect" coords="68,401,191,428" style="outline:none;" target="_self"     />
      </map>
    </div>
    <div class="item" style="margin: 0 30px;">
      <img id="Image-Maps-Com-image-maps-2018-01-09-154054" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/klim-fortilearn.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-09-154054" alt="Klim3+ fortilearn" />
      <map name="image-maps-2018-01-09-154054" id="ImageMapsCom-image-maps-2018-01-09-154054">
        <area alt="Ver más información" title="Ver más información" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-klim3-fortilearn" shape="rect" coords="63,368,195,387" style="outline:none;" target="_self"     />
        <area alt="Comprar" title="Comprar"  data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3947)) ?>" shape="rect" coords="72,400,194,427" style="outline:none;" target="_self"     />
      </map>
    </div>
    <div class="item" style="margin: 0 30px;">
      <img id="Image-Maps-Com-image-maps-2018-01-09-154808" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/klim-fortifrow.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-09-154808"  alt="Klim fortigrow" />
      <map name="image-maps-2018-01-09-154808" id="ImageMapsCom-image-maps-2018-01-09-154808">
        <area alt="Ver más información" title="Ver más información" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-klim-fortigrow" shape="rect" coords="68,359,197,383" style="outline:none;" target="_self"     />
        <area alt="Comprar" title="Comprar" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/catalogo/producto/producto/114669/" shape="rect" coords="72,392,192,419" style="outline:none;" target="_self"     />
      </map>
    </div>
  </div>
  <p class="txt-footer" style="margin: 25px 30px 0; font-size: 15px;">Como parte de un estilo de vida saludable que incluye alimentación balanceada y actividad física regular</p>
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
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/banner.png" alt="Nestle klim">
<div class="btn-compra-banner">
  <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=klim">
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar">
  </a>
</div>
<h1 class="intro-txt"> Al igual que tú sabemos que ninguna edad es igual a otra y es vital <br> <span>entregarle los nutrientes necesarios para cada fase de su desarrollo</span> </h1>
<section class="row-productos">
  <div class="section-products">
    <div class="column">
      <img id="Image-Maps-Com-image-maps-2018-01-10-112837" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/01-klim-fortiprotect.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-10-112837" alt="" />
      <map name="image-maps-2018-01-10-112837" id="ImageMapsCom-image-maps-2018-01-10-112837">
        <area  alt="" title="" href="<?= Yii::app()->request->baseUrl ?>/mundo-klim1-fortiprotect" shape="rect" coords="23,9,252,391" style="outline:none;" target="_self"     />
        <area  alt="" title="" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 39646)) ?>" shape="rect" coords="76,398,193,425" style="outline:none;" target="_self"     />
      </map>
    </div>
    <div class="column">
      <img id="Image-Maps-Com-image-maps-2018-01-10-111843" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/02-klim-deslactosado.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-10-111843" alt="" />
      <map name="image-maps-2018-01-10-111843" id="ImageMapsCom-image-maps-2018-01-10-111843">
        <area  alt="" title="" href="<?= Yii::app()->request->baseUrl ?>/mundo-klim1-deslactosado" shape="rect" coords="21,10,253,393" style="outline:none;" target="_self"     />
        <area  alt="" title="" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118997)) ?>" shape="rect" coords="76,399,191,424" style="outline:none;" target="_self"     />
      </map>
    </div>
    <div class="column">
      <img id="Image-Maps-Com-image-maps-2018-01-10-112114" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/klim-fortilearn.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-10-112114" alt="" />
      <map name="image-maps-2018-01-10-112114" id="ImageMapsCom-image-maps-2018-01-10-112114">
        <area  alt="" title="" href="<?= Yii::app()->request->baseUrl ?>/mundo-klim3-fortilearn" shape="rect" coords="22,8,254,389" style="outline:none;" target="_self"     />
        <area  alt="" title="" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3947)) ?>" shape="rect" coords="81,400,196,425" style="outline:none;" target="_self"     />
      </map>
    </div>
    <div class="column">
      <img id="Image-Maps-Com-image-maps-2018-01-10-112601" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/home/klim-fortifrow.png" border="0" width="276" height="467" orgWidth="276" orgHeight="467" usemap="#image-maps-2018-01-10-112601" alt="" />
      <map name="image-maps-2018-01-10-112601" id="ImageMapsCom-image-maps-2018-01-10-112601">
        <area  alt="" title="" href="<?= Yii::app()->request->baseUrl ?>/mundo-klim-fortigrow" shape="rect" coords="23,9,252,390" style="outline:none;" target="_self"     />
        <area  alt="" title="" href="<?= Yii::app()->request->baseUrl ?>/catalogo/producto/producto/114669/" shape="rect" coords="80,399,194,426" style="outline:none;" target="_self"     />
      </map>
    </div>
  </div>
  <p class="txt-footer">Como parte de un estilo de vida saludable que incluye alimentación balanceada y actividad física regular</p>
</section>
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
<section style="background-color: #fff;">
  <div class="container" style="padding-top:30px;">
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
</section>
<!--Fin versión escritorio -->
<?php endif; ?>
