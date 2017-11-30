<?php $this->pageTitle = "Nivea Anti- arrugas | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='La nueva crema Nivea Cuidado Antiarrugas, ayuda a prevenir la aparición de líneas finas y arrugas en la piel de tu rostro. Sin sensación grasosa.'>
<meta name='keywords' content='crema antiarrugas, mejor crema antiarrugas, cremas antiarrugas efectivas.'>
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

    @font-face {font-family:NiveaLightOT; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nivea/fonts/NiveaLightOT.otf);}
    @font-face {font-family:NiveaBoldOT; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nivea/fonts/NiveaBoldOT.otf);}
    .bg-intro { background-color:#F0F3F8;padding: 60px 0;}
    .main-container {width: 100%; max-width: 1100px; margin: auto;}
    .linea-nueva {display: flex;padding: 0 70px 0;justify-content: center;align-items: center;margin: 25px auto 0;}
    .intro {display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between;padding: 0 70px 0;}
    .intro .imagen-producto,
    .intro .descripcion-producto {width:50%;}
    .descripcion-producto .titulo-principal {font-size: 30px;}
    .sub-title {font-family: NiveaBoldOT; color: #00154E; font-size: 17px;}
    .lista {font-family: NiveaLightOT;color: #00154E; padding-inline-start: 15px;font-size: 12px;}
    .lista  li {font-size: 14px;margin-bottom:15px;}
    .lista span{font-family: NiveaBoldOT;}
    .imagen-producto .img-producto {width: 100%; margin: 0 auto; transition: all 0.4s ease-in-out 0s;}
    .imagen-producto:hover .img-producto {transform: translateY(-5px);-ms-transform: translateY(-5px);-webkit-transform: translateY(-5px);}
    .imagen-producto .btn-comprar {margin: 40px auto 0; display: block;}
    .linea-nueva .nuevo {width: 120px;margin-right:20px;}
    .linea-nueva h3 {font-family: NiveaLightOT;color: #00154E;font-size: 35px;}
    .linea-nueva h3 span {font-family: NiveaBoldOT;}
    .intro .imagen-producto {padding-bottom: 30px; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nivea/sombra.png); background-repeat: no-repeat; background-position: center 58%;}
    .contenedor-productos {padding: 0 160px 0;margin: 40px auto;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between;}
    .titulo-principal, .intro-texto, .nombre {font-family:NiveaLightOT; color:#00154E;}
    .titulo-principal span, .intro-texto span, .nombre span, .ver-mas  {font-family:NiveaBoldOT; }
    .intro-texto {font-size: 16px;}
    .imagen-producto {padding-bottom: 30px; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nivea/sombra.png); background-repeat: no-repeat; background-position: center 94%;}
    .producto {text-align: center;padding: 50px 20px 30px;width: 45%;; -webkit-box-shadow: 0px 0px 7px 1px rgb(159, 159, 159); -moz-box-shadow: 0px 0px 7px 1px rgb(159, 159, 159); box-shadow: 0px 0px 7px 1px rgb(159, 159, 159); margin: 0px 5px 0px; border-radius: 25px;
              background: rgba(255,255,255,1);
              background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 58%, rgba(240,240,240,1) 76%, rgba(255,255,255,1) 93%, rgba(255,255,255,1) 100%);
              background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(58%, rgba(255,255,255,1)), color-stop(76%, rgba(240,240,240,1)), color-stop(93%, rgba(255,255,255,1)), color-stop(100%, rgba(255,255,255,1)));
              background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 58%, rgba(240,240,240,1) 76%, rgba(255,255,255,1) 93%, rgba(255,255,255,1) 100%);
              background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 58%, rgba(240,240,240,1) 76%, rgba(255,255,255,1) 93%, rgba(255,255,255,1) 100%);
              background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 58%, rgba(240,240,240,1) 76%, rgba(255,255,255,1) 93%, rgba(255,255,255,1) 100%);
              background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 58%, rgba(240,240,240,1) 76%, rgba(255,255,255,1) 93%, rgba(255,255,255,1) 100%);
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff', GradientType=0 );
    }
    .producto:hover .img-producto {transform: translateY(-5px);-ms-transform: translateY(-5px);-webkit-transform: translateY(-5px);}
    .imagen-producto .img-producto {transition: all 0.4s ease-in-out 0s;}
    .descripcion .texto {font-family:NiveaLightOT; color:#002D64;font-size: 12px;margin: 15px auto;}
    .descripcion .nombre {font-size: 16px;letter-spacing: 1px;line-height: 18px;}
    .descripcion .nombre span {font-size: 18px;}
    .ver-mas { color:#002D64;font-size:16px;text-decoration: underline;}
    .btn-comprar {  width: 45%;margin: 25px auto 0;}
    .precioproductos-antes{margin:20px auto 0;font-family:NiveaBoldOT; text-decoration: line-through;text-align.center;color: #264A7E;}
    .precioproductos{font-size: 16px;margin:0;font-family:NiveaBoldOT;text-align.center;color: #264A7E; }
    .owl-pagination {margin-top: 20px;}
    .owl-theme .owl-controls .owl-page span {background-color: #264A7E !important;}
  </style>
";
?>
<!--Consulta el precio de los productos-->
<?php $nutritivo = Producto::consultarPrecio('118873', $this->objSectorCiudad)?>
<?php $aclarado_natural = Producto::consultarPrecio('118871', $this->objSectorCiudad)?>
<?php $anti_arrugas = Producto::consultarPrecio('118869', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/banner-anti-arrugas.jpg" alt="Nivea anti-arrugas">
<section class="bg-intro" style="padding: 20px 0 30px;margin-top: -5px;">
  <div class="main-container">
  <div class="intro" style="flex-direction: column;padding: 0 20px 0;">
    <div class="descripcion-producto" style="width: 100%;">
      <h1 class="titulo-principal" style="text-align: center;">NIVEA CUIDADO<span> <br> ANTI-ARRUGAS   </span></h1>
      <h2 class="sub-title" style="text-align: center;">PREVIENE LOS PRIMEROS SIGNOS DE LA EDAD Y NUTRE TU PIEL</h2>
      <p class="intro-texto" style="font-size: 14px;">Brinda nutrición intensiva sin sensación grasosa y previene
      los primeros signos del envejecimiento.</p>
      <ul class="lista" style="font-size: 14px;-webkit-padding-start: 10px;-moz-padding-start: 10px;padding-inline-start: 10px;">
        <li><span>Ayuda a prevenir la aparición de líneas finas y arrugas*  </span>  <br>
          *Después de 4 semanas de uso regular. <br>
          Basado en estudio de percepción. Alemania, 2016.
        </li>
        <li> <span>Ayuda a recuperar la firmeza y elasticidad de la piel** </span> <br>
           **Después de cuatro semanas de uso regular. Basado en estudios de percepción. Alemania, 2016.
        </li>
        <li><span>Fórmula con Vitamina E</span>
        </li>
        <li><span>Sin sensación grasosa*** </span><br>
        ***Basado en estudio de percepción hecho en México.
        </li>
        <li><span>Tamaños disponibles: 50 ml, 100 ml.</span></li>
      </ul>
    </div>
    <div class="imagen-producto" style="width: 100%;padding: 0;background-position: center 76%;">
      <img class="img-responsive img-producto" style="margin: 25px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/nivea-anti-arrugas.png" alt="Nivea anti-arrugas">
      <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118869 )) ?>">
        <img class="btn-comprar" style="margin: 30px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/btn-comprar.png" alt="Comprar">
      </a>
    </div>
  </div>
</div>
</section>
<div class="main-container">
  <div class="linea-nueva" style="flex-direction: column;">
    <h3 style="font-size: 20px;text-align: center;line-height: 20px;">CONOZCA TODA LA LÍNEA NIVEA <span>CUIDADO FACIAL</span></h3>
  </div>
  <div class="contenedor-productos" style="flex-direction: column;margin: 20px auto;padding: 0 20px;">
    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
      <div class="item" style="padding: 17px 0">
        <div class="producto" style="width: 75%;margin: 0 auto;">
          <div class="imagen-producto">
            <img class="img-responsive-m img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/nivea-aclarado.png" alt="Nivea cuidado aclarado natural">
          </div>
          <div class="descripcion">
            <p class="nombre">NIVEA CUIDADO <br> <span>ACLARADO NATURAL</span></p>
            <p class="texto">Hidratación intensiva sin sensación grasosa <br>
            en el rostro, además ayuda a prevenir <br>
            manchas y unificar el tono de tu piel.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/nivea-cuidado-aclarado-natural" class="ver-mas">Ver más información</a>
            <p class="precioproductos-antes">ANTES: <?= ($aclarado_natural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $aclarado_natural["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos">AHORA: <?= ($aclarado_natural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $aclarado_natural["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118871 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/btn-comprar.png" alt="Comprar">
            </a>
          </div>
        </div>
      </div>
      <div class="item" style="padding: 17px 0">
        <div class="producto" style="width: 75%;margin: 0 auto;">
          <div class="imagen-producto">
            <img class="img-responsive-m img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/nivea-facial.png" alt="Nivea cuidado nutritivo">
          </div>
          <div class="descripcion">
            <p class="nombre">NIVEA CUIDADO <br> <span>NUTRITIVO</span></p>
            <p class="texto">NIVEA Cuidado - La crema que por primera <br>
            vez ofrece hidratación intensiva sin dejar
            sensación grasosa en el rostro.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/nivea-cuidado-humectacion-profunda" class="ver-mas">Ver más información</a>
            <p class="precioproductos-antes">ANTES: <?= ($nutritivo == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nutritivo["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos">AHORA: <?= ($nutritivo == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nutritivo["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118873 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/btn-comprar.png" alt="Comprar">
            </a>
          </div>
        </div>
      </div>
    </div>
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

<!--VERSION ESCRITORIO-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/banner-anti-arrugas.jpg" alt="Nivea anti-arrugas">
<section class="bg-intro">
  <div class="main-container">
  <div class="intro">
    <div class="imagen-producto">
      <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/nivea-anti-arrugas.png" alt="Nivea anti-arrugas">
      <a data-ajax="false" data-cargar="1" data-producto="118869" data-id="3" href="#">
        <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/btn-comprar.png" alt="Comprar">
      </a>
    </div>
    <div class="descripcion-producto">
      <h1 class="titulo-principal">NIVEA CUIDADO<span> ANTI-ARRUGAS </span></h1>
      <h2 class="sub-title">PREVIENE LOS PRIMEROS SIGNOS DE LA EDAD <br>Y NUTRE TU PIEL</h2>
      <p class="intro-texto">Brinda nutrición intensiva sin sensación grasosa y previene <br>
      los primeros signos del envejecimiento.</p>
      <ul class="lista">
        <li><span>Ayuda a prevenir la aparición de líneas finas y arrugas* </span>  <br>
          *Después de 4 semanas de uso regular. <br>
          Basado en estudio de percepción. Alemania, 2016.
        </li>
        <li> <span>Ayuda a recuperar la firmeza y elasticidad de la piel**</span> <br>
           **Después de cuatro semanas de uso regular. <br>
           Basado en estudios de percepción. Alemania, 2016.
        </li>
        <li><span>Fórmula con Vitamina E</span></li>
        <li><span>Sin sensación grasosa*** </span> <br>
          ***Basado en estudio de percepción hecho en México.
        </li>
        <li><span>Tamaños disponibles: 50 ml, 100 ml.</span></li>
      </ul>
    </div>
  </div>
</div>
</section>
<div class="main-container">
  <div class="linea-nueva">
    <h3>CONOZCA TODA LA LÍNEA NIVEA <span>CUIDADO FACIAL</span></h3>
  </div>
  <div class="contenedor-productos">
    <div class="producto">
      <div class="imagen-producto">
        <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/nivea-aclarado.png" alt="Nivea cuidado aclarado natural">
      </div>
      <div class="descripcion">
        <p class="nombre">NIVEA CUIDADO <br> <span>ACLARADO NATURAL</span></p>
        <p class="texto">Hidratación intensiva sin sensación grasosa <br>
        en el rostro, además ayuda a prevenir <br>
        manchas y unificar el tono de tu piel.</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/nivea-cuidado-aclarado-natural" class="ver-mas">Ver más información</a>
        <p class="precioproductos-antes">ANTES: <?= ($aclarado_natural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $aclarado_natural["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <p class="precioproductos">AHORA: <?= ($aclarado_natural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $aclarado_natural["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118871 )) ?>">
          <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/btn-comprar.png" alt="Comprar">
        </a>
      </div>
    </div>
    <div class="producto">
      <div class="imagen-producto">
        <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/nivea-facial.png" alt="Nivea cuidado nutritivo">
      </div>
      <div class="descripcion">
        <p class="nombre">NIVEA CUIDADO <br> <span>NUTRITIVO</span></p>
        <p class="texto">NIVEA Cuidado - La crema que por primera <br>
        vez ofrece hidratación intensiva sin dejar
        sensación grasosa en el rostro.</p>
        <a href="<?= Yii::app()->request->baseUrl ?>/nivea-cuidado-humectacion-profunda" class="ver-mas">Ver más información</a>
        <p class="precioproductos-antes">ANTES: <?= ($nutritivo == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nutritivo["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <p class="precioproductos">AHORA: <?= ($nutritivo == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $nutritivo["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 118873 )) ?>">
          <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nivea/btn-comprar.png" alt="Comprar">
        </a>
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
<!--Fin versión escritorio-->
<?php endif; ?>
