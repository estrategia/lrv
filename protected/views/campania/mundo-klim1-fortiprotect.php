<?php $this->pageTitle = "Mundo Klim 1+ FortiProtect - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Alimento lácteo KLIM® 1+ FORTIPROTECT® contribuye a desarrollar su sistema digestivo. Especialmente diseñado para niños entre 1 y 3 años. '>
  <meta name='keywords' content='klim 1, leche klim,  leche klim 1.'>
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
    @font-face {font-family:VAGRoundedStd-Thin; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mundo-klim/fonts/VAGRoundedStd-Thin.otf);}
    .banner {max-width: 1500px;margin: 0 auto;width: 100%;display: block;}
    .main-bg {background-size: cover; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/mundo-klim/klim-fortiprotect/main-bg.jpg);}
    .info-producto {padding: 30px 40px; background: #fff; border: 6px solid #EA0001; border-radius: 30px; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between; width: 100%; max-width: 1000px; margin: 80px auto 40px;}
    .info-producto .img-producto {width:40%;}
    .info-producto .txt-producto {width:60%;}
    .info-producto .img-producto img {width:80%; margin: 20px auto 0;display:block;}
    .line-products {background:#fff; padding: 50px 0;}
    .btn-compra-banner { width: 100%; max-width: 1000px; margin: -50px auto 0; position: relative;}
    .btn-compra-banner img {width:190px; max-width:190px; position: absolute; right:0;}
    .content-products {display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;width:100%; max-width: 1000px; margin: 0 auto;}
    .content-products .column {width:33.333%;}
    .content-products .column img {width: 40%; max-width:133px; margin: 0 auto 25px; display:block;}
    .txt-producto .title-producto {font-family: VAGRoundedStd-Bold; color: #E30001; margin-top: 50px; margin-bottom: 0px; font-size: 40px;}
    .txt-producto .subtitle-producto{ color: #FE0001; font-family: VAGRoundedStd-Bold; margin: 0; font-size: 21px;}
    .main-txt {font-family:VAGRoundedStd-Thin; color: #515151; font-size: 23px; margin-top: 35px; line-height: 28px;}
    .main-txt  span { font-family: VAGRoundedStd-Bold;}
    .note {font-family:VAGRoundedStd-Thin;color: #515151; font-size: 12px;margin: 25px 0;}
    .name { color: #333333; text-align: center; font-size: 18px; font-family: HelveticaNeueBold; margin: 0;}
    .cantidad {color: #808080; text-align: center; font-size: 15px; display:block; font-family: HelveticaNeueLight; margin: 0;}
    .precio {font-family: HelveticaNeueBold; color: #FF381C; text-align: center; margin: 10px 0; font-size: 22px; }
    .img-recetas {width:100%; margin-top: 30px;}
    .close-button {overflow: hidden;}
    .modal-body {padding: 0;}
    .modal-content {background-color: transparent !important;box-shadow: none !important; border: none !important;}
    .bmd-modalContent {box-shadow: none; background-color: transparent; border: 0;}
    .bmd-modalContent .close {font-size: 30px; line-height: 30px; padding: 7px 4px 7px 13px; text-shadow: none; opacity: .7; color:#fff;}
    .bmd-modalContent .close span {display: block;}
    .bmd-modalContent .close:hover, .bmd-modalContent .close:focus {opacity: 1; outline: none;}
    .bmd-modalContent iframe {display: block; margin: 0 auto;}
    .title-section-video {font-family: VAGRoundedStd-Bold; color: #DF2129; font-size: 50px; margin: 30px auto; }
    .title-section-video  span { font-size:40px; background-color: #DF3A24; color: #fff; padding: 5px 30px; border-radius: 25px; text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.5);}
    .row-productos {display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;width:100%; max-width: 900px; margin: 25px auto 0;}
    .row-productos .column {width:33.333%; padding: 0 15px;}
    .row-productos .column img {max-width: 276px;}
    .txt-footer {text-align: center; font-family: VAGRoundedStd-Bold; color: #D80D17; margin: 30px auto; font-size: 19px;}
    .foot {width:100%; margin-top: -100px;}
    .line-products .owl-theme .owl-controls {margin-top: 20px !important;}
    .row-productos .owl-theme .owl-controls {margin-top: 10px !important;}
    .video {position: relative; padding-bottom: 56.25%; overflow: hidden; width: 95%; margin: 20px auto;}
    .video iframe{position: absolute;display: block; top: 0; left: 0; width: 100%; height: 100%;}
    @media only screen and (max-width: 1920px) and (min-width: 1700px)  {
      .foot {margin-top: -145px;}
      .programa-hora .content .seccion1 {width: 55%;}
      .programa-hora .content .seccion2 { width: 45%;}
      .programa-hora .content .seccion1 {padding-left: 400px;}
      .programa-hora .content .seccion2 {padding-right: 295px;}
    }
  </style>
";
?>
<!--Consulta el precio de los productos-->
<?php $klim1_1700gr = Producto::consultarPrecio('39646', $this->objSectorCiudad)?>
<?php $klim1_500gr = Producto::consultarPrecio('53059', $this->objSectorCiudad)?>
<?php $klim1_1000gr = Producto::consultarPrecio('97337', $this->objSectorCiudad)?>

<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<div class="main-bg" style="background-size: 100%;">
  <div style="padding: 0 25px 0px 15px;">
    <img class="img-responsive-m" style="margin-top: 30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/banner.png" alt="Nestle klim FortiProtect">
    <a data-ajax="false"  href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 1699)) ?>">
      <img style="margin:25px auto; width:50%; display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar">
    </a>
    <section class="info-producto" style="flex-direction:column; padding: initial;">
      <div class="img-producto" style="width: 55%; margin: 0 auto;">
        <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect.png" alt="Comprar Klim fortiprotect">
      </div>
      <div class="txt-producto" style="width: 100%;">
        <h1 class="title-producto" style="font-size: 25px; text-align: center;">KLIM<sup>&reg;</sup> 1+ FORTIPROTECT<sup>&reg;</sup></h1>
        <h2 class="subtitle-producto" style="text-align: center;">FORTALECE SUS DEFENSAS</h2>
        <p class="main-txt" style="font-size: 18px; padding: 0 15px; text-align:center;">Tu hijo empieza a descubrir el mundo, prepáralo
        con Alimento Lácteo <span> KLIM<sup>&reg;</sup> 1+ FORTIPROTECT<sup>&reg;</sup></span>
        con <span>Zinc, Hierro y Vitaminas A y C  </span> que ayudan
        al funcionamiento normal del sistema de defensas
        mientras juegan y exploran.</p>
        <p class="note" style="padding: 0 25px;">La leche materna es el mejor alimento para el niño, KLIM<sup>&reg;</sup> 1+ es un alimento lácteo complementario
        de la leche materna especialmente diseñado para niños de 1 año en adelante.</p>
        <a data-ajax="false"  href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 39646)) ?>">
          <img width="200" style="margin: 0 auto 25px; display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
      </div>
    </section>
  </div>
  <section class="line-products" style="padding: 20px 0;">
    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
      <div class="item">
        <img width="130" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect-1700g.png" alt="Comprar Klim fortiprotect">
        <h3 class="name">KLIM<sup>&reg;</sup> 1+ MIEL PREBIO</h3>
        <span class="cantidad">LATA X 1700 GRS</span>
        <p class="precio"><?= ($klim1_1700gr == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_1700gr["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 39646)) ?>">
          <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
      </div>
      <div class="item">
        <img width="130" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect-500g.png" alt="Comprar Klim fortiprotect">
        <h3 class="name">KLIM<sup>&reg;</sup> 1+</h3>
        <span class="cantidad">DOY PACK X 500 GRS</span>
        <p class="precio"><?= ($klim1_500gr == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_500gr["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 53059)) ?>">
          <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
      </div>
      <div class="item">
        <img width="130" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect-1000g.png" alt="Comprar Klim fortiprotect">
        <h3 class="name">KLIM<sup>&reg;</sup> 1+ PREBIO</h3>
        <span class="cantidad">BOLSA X 1000 GRS</span>
        <p class="precio"><?= ($klim1_1000gr == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_1000gr["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 97337)) ?>">
          <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
      </div>
    </div>
  </section>
  <div class="video">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/xrHTcWo4iko?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>
  <h3 class="title-section-video" style="font-size: 30px; text-align: center; line-height: 15px;">Conoce todos los productos KLIM<sup>&reg;</sup> <br>
    <a data-ajax="false"  href="<?= Yii::app()->request->baseUrl ?>/mundo-klim" style="text-decoration: none;"><span style="font-size: 20px; display: block; width: 76px; margin: 22px auto 0; padding: 10px 30px;">aquí</span></a>
  </h3>
  <section class="row-productos">
    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
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
  <img class="foot" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/footer.png">
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
  <img class="banner" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/banner.png" alt="Nestle klim FortiProtect">
  <div class="btn-compra-banner">
    <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 1699)) ?>">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar">
    </a>
  </div>
  <section class="info-producto">
    <div class="img-producto">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect.png" alt="Comprar Klim fortiprotect">
    </div>
    <div class="txt-producto">
      <h1 class="title-producto">KLIM<sup>&reg;</sup> 1+ FORTIPROTECT<sup>&reg;</sup></h1>
      <h2 class="subtitle-producto">FORTALECE SUS DEFENSAS</h2>
      <p class="main-txt">Tu hijo empieza a descubrir el mundo, prepáralo <br>
        con Alimento Lácteo <span> KLIM<sup>&reg;</sup> 1+ FORTIPROTECT<sup>&reg;</sup></span> <br>
        con <span>Zinc, Hierro y Vitaminas A y C  </span> que ayudan  <br>
        al funcionamiento normal del sistema de defensas <br>
        mientras juegan y exploran.
      </p>
      <p class="note">La leche materna es el mejor alimento para el niño, KLIM<sup>&reg;</sup> 1+ es un alimento lácteo complementario <br>
        de la leche materna especialmente diseñado para niños de 1 año en adelante.</p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 39646)) ?>">
          <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
    </div>
  </section>
  <section class="line-products">
    <div class="content-products">
      <div class="column" style="border-right: 2px solid #D0D0D0;">
        <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect-1700g.png" alt="Comprar Klim fortiprotect">
        <h3 class="name">KLIM<sup>&reg;</sup> 1+ MIEL PREBIO</h3>
        <span class="cantidad">LATA X 1700 GRS</span>
        <p class="precio"><?= ($klim1_1700gr == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_1700gr["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 39646)) ?>">
          <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
      </div>
      <div class="column" style="border-right: 2px solid #D0D0D0;">
        <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect-500g.png" alt="Comprar Klim fortiprotect">
        <h3 class="name">KLIM<sup>&reg;</sup> 1+</h3>
        <span class="cantidad">DOY PACK X 500 GRS</span>
        <p class="precio"><?= ($klim1_500gr == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_500gr["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 53059)) ?>">
          <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
      </div>
      <div class="column">
        <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/klim-fortiprotect-1000g.png" alt="Comprar Klim fortiprotect">
        <h3 class="name">KLIM<sup>&reg;</sup> 1+ PREBIO</h3>
        <span class="cantidad">BOLSA X 1000 GRS</span>
        <p class="precio"><?= ($klim1_1000gr == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_1000gr["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 97337)) ?>">
          <img width="200" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar Klim fortiprotect">
        </a>
      </div>
    </div>
  </section>
  <section class="content-products">
    <a href="#" class="bmd-modalButton"  data-toggle="modal" data-bmdSrc="https://www.youtube.com/embed/xrHTcWo4iko?rel=0&amp;showinfo=0" data-bmdWidth="800" data-bmdHeight="400" data-target="#myModal"  data-bmdVideoFullscreen="true">
      <img class="img-recetas" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/recetas.png" alt="Recetas Klim fortiprotect">
    </a>
    <h3 class="title-section-video">Conoce todos los productos KLIM<sup>&reg;</sup> <a href="<?= Yii::app()->request->baseUrl ?>/mundo-klim"><span>aquí</span></a> </h3>
  </section>
  <div class="row-productos">
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
  <img class="foot" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/klim-fortiprotect/footer.png">
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
<script type="text/javascript">
  !function(t){t.fn.bmdIframe=function(a){var d=this,e=t.extend({classBtn:".bmd-modalButton",defaultW:800,defaultH:400},a);return t(e.classBtn).on("click",function(a){var i=t(this).attr("data-bmdVideoFullscreen")||!1,n={src:t(this).attr("data-bmdSrc"),height:t(this).attr("data-bmdHeight")||e.defaultH,width:t(this).attr("data-bmdWidth")||e.defaultW};i&&(n.allowfullscreen=""),t(d).find("iframe").attr(n)}),this.on("hidden.bs.modal",function(){t(this).find("iframe").html("").attr("src","")}),this}}(jQuery),jQuery(document).ready(function(){jQuery("#myModal").bmdIframe()});
</script>
<!--Fin versión escritorio -->
<?php endif; ?>
