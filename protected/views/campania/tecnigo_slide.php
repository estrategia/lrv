<?php $this->pageTitle = "Tecnigo - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Lleva la energía contigo a todas partes con los productos Tecnigo, tenemos cargadores, cables auxiliares, audífonos y más. ¡Consiguelos aquí!'>
  <meta name='keywords' content='ni una dieta mas, ni una dieta mas precio, batidos para adelgazar'>
  <style>
    @font-face {font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face {font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face {font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face {font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    @font-face {font-family:Montserrat-Bold; src: url(".Yii::app()->request->baseUrl."/images/contenido/tecnigo/fonts/Montserrat-Bold.otf);}
    @font-face {font-family:Montserrat-Light; src: url(".Yii::app()->request->baseUrl."/images/contenido/tecnigo/fonts/Montserrat-Light.otf);}
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
    .contenedor-principal {width: 100%;max-width: 1100px;margin: auto;}
    .bg-rotor {background-attachment:fixed; background-size: contain;padding: 30px 0; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/tecnigo/bg-dots.png);}
    .titulo-principal {font-size: 34px;text-align:center;color:#5B5A5F;font-family:Montserrat-Light;letter-spacing:-1px;}
    .titulo-principal span {font-family:Montserrat-Bold;}
    .nombre-producto {text-align:center;color:#5B5A5F;font-family:Montserrat-bold;letter-spacing:-1px;font-size: 19px;line-height: 19px;margin-top: 50px;}
    .nombre-producto span {font-family:Montserrat-Light;}
    .bg-descripciones {background-attachment:fixed;background-size: contain;padding: 50px 0 0; background-image:url(".Yii::app()->request->baseUrl."/images/contenido/tecnigo/bg-description.jpg);}
    .carousel-seat .img-product{width:85%;margin:0 auto;display:block;}
    .carousel-seat.active {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/tecnigo/sombra.png); background-repeat: no-repeat;background-position: center 75%;background-size: 90%; }
    .contenedor-info {display:flex;}
    .contenedor-info .column {width:50%;}
    .lista-beneficios {display: flex;font-size: 21px;padding-inline-start: 25px;}
  	.lista-beneficios dt {margin-right: 5px; margin-top:-6px;}
  	.lista-beneficios dd {color:#483A44;font-family:Montserrat-Light;line-height: 21px;}
  	.lista-beneficios span {font-family:Montserrat-bold;font-size: 22px;}
  	.btn-comprar {margin: 25px 0;width: 50%;max-width: 221px;}
    .precioproductos{font-size: 23px;line-height:23px;margin: 0;font-family: Montserrat-Bold;color: #483A44;}
    .precioproductos-antes{margin-top:40px !important;font-size: 20px;line-height:20px;text-decoration: line-through;margin: 0;important;font-family: Montserrat-Bold;color: #483A44;}
    .wrap {width: 100%; margin: 0 auto; overflow: hidden;margin: 60px auto 0;}
		.carousel {display: flex; left: -100%; list-style: none; margin: 0; padding: 0; position: relative; transform: translateX(100%);}
		@media (min-width: 30em) { .carousel {left: -50%; transform: translateX(50%);}}
		@media (min-width: 40em) { .carousel {left: -25%; transform: translateX(25%);}}
		.carousel.is-reversing {transform: translateX(-100%);}
		@media (min-width: 30em) { .carousel.is-reversing {transform: translateX(-50%);}}
		@media (min-width: 40em) { .carousel.is-reversing {transform: translateX(-25%);}}
		.carousel.is-set {transform: none; transition: transform 0.5s ease-in-out;}
		.carousel-seat {flex: 1 0 100%; order: 2;}
		@media (min-width: 30em) {.carousel-seat {flex-basis: 50%;}}
		@media (min-width: 40em) {.carousel-seat {flex-basis: 25%;}}
		.carousel-seat.is-ref {order: 1;}
		.controls {border: none !important;padding: 0 !important; margin: 40px 0 0 !important; text-align: center;font-family: Montserrat-bold; color: #5B5A5F !important;}
    .controls button {margin:0 40px 0;}
    .controls button {border: none;background: none;}
		.controls button img {width:30px; margin: 0px 15px 0;}
    .titulo-producto {margin-bottom: 40px;font-size: 47px;color: #483A44;font-family: Montserrat-Light;letter-spacing: -1px;}
    .titulo-producto  span {font-family: Montserrat-Bold;color:#483A44;}
    .compra {padding-inline-start: 25px;}
    .owl-controls { position: absolute; top: -4%; margin: 0 32%;}
  </style>
";
?>
<!--Consulta el precio de los productos-->
<?php $audifonos_tipo_beats = Producto::consultarPrecio('110094', $this->objSectorCiudad)?>
<?php $bateria_externa = Producto::consultarPrecio('110096', $this->objSectorCiudad)?>
<?php $cable_datos_iphone4 = Producto::consultarPrecio('110100', $this->objSectorCiudad)?>
<?php $cable_datos_iphone_5_6 = Producto::consultarPrecio('110101', $this->objSectorCiudad)?>
<?php $cable_micro_usb = Producto::consultarPrecio('110092', $this->objSectorCiudad)?>
<?php $cable_audio = Producto::consultarPrecio('110095', $this->objSectorCiudad)?>
<?php $cargador_usb_carro = Producto::consultarPrecio('110097', $this->objSectorCiudad)?>
<?php $cargador_usb_pared = Producto::consultarPrecio('110099', $this->objSectorCiudad)?>

<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=tecnigo"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/banner-movil.jpg"></a>
<div class="bg-rotor">
  <a style="position: absolute;left: 25px;top: 25%;" href="" data-role="button" data-icon="arrow-l" data-iconpos="left"></a>
  <a style="position: absolute;right: 25px;top: 25%;" href="" data-role="button" data-icon="arrow-r" data-iconpos="right"></a>
  <div style="margin-top:80px;" id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/audifonos-tipo-beats.png " alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;">Audífonos <span>tipo Beats</span> </h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Con goma que aísla el sonido ambiente</span> para poder escuchar mejor</dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Lo puedes utilizar como manos</span> libres de celular</dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Funciona con cualquier dispositivo</span> que tenga conexión Plug </dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"> Audífonos de <span style="font-size: 18px;">excelente calidad</span> </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($audifonos_tipo_beats == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $audifonos_tipo_beats["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($audifonos_tipo_beats == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $audifonos_tipo_beats["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110094 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/bateria-externa.png" alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;">Batería  <span>externa</span> </h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;">Banco de energía portable que le da <span style="font-size: 18px;">carga extra
              en todo momento a tus</span> dispositivos inteligentes</dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Puerto USB simple</span> con una corriente estable de 1 amperio</dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Diseño minimalista y liviano,</span> será una pieza infaltable a donde vayas  </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($bateria_externa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bateria_externa["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($bateria_externa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bateria_externa["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110096 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-datps-iphone4.png" alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;"> <span>Cable de datos</span> <br> Iphone 4 </h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;">Diseñado para tu celular <span style="font-size: 18px;">iPhone 4 o iPhone 4S</span></dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Sincroniza rápidamente</span> tus archivos mientras carga</dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Compacto y portable,</span> llévalo siempre contigo </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($cable_datos_iphone4 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone4["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($cable_datos_iphone4 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone4["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110100 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-de-datos-iphone-5-6.png" alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;"> <span>Cable de datos</span> <br> iphone 5 y 6</h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;">Diseñado para tu celular <span style="font-size: 18px;"> iPhone 5 o iPhone 6, cuenta con 1 metro de longitud </span></dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Sincroniza rápidamente</span> tus archivos mientras carga</dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Compacto y portable,</span> llévalo siempre contigo </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($cable_datos_iphone_5_6 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone_5_6["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($cable_datos_iphone_5_6 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone_5_6["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110101 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-microUSB-plano.png" alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;"> <span>Cable Micro USB </span> <br>a USB plano </h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;"> Cable de carga USB y de sincronización USB </span>- Micro USB para el PC, te permite sincronizar y cargar tu teléfono </dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Mide 1 metro de longitud</span></dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Ideal y flexible para el uso variado</span> durante la carga en un adaptador de pared  </dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Compatible con la mayoría de dispositivos </span> con puerto USB Micro </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($cable_micro_usb == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_micro_usb["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($cable_micro_usb == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_micro_usb["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110092 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-audio1x1-plano.png" alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;"> Cable <span>audio 1x1 plano</span> </h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;"> Cable auxiliar de audio </span>te permite conectar tu dispositivo (mp3, celular, mp4, mp5, iPod), a un equipo de sonido e incluso a tu carro (si cuenta con entrada auxiliar) para reproducir tu música y disfrutar al máximo de tus reuniones o viajes.  </dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;">Con 1 metro de longitud, el cable te permite un mayor alcance para un mejor manejo. </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($cable_audio == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_audio["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($cable_audio == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_audio["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110095 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cargador-para-carro.png" alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;"> <span>Cargador USB </span> <br>para carro </h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;">Cargador de carro con puerto USB para estar seguro de que tu Smartphone y el de tus amigos siempre estarán <span style="font-size: 18px;">completamente cargados y listos para funcionar</span> </dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;">Recarga al instante</span> tu teléfono, tablet o cámara  </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($cargador_usb_carro == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_carro["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($cargador_usb_carro == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_carro["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110097 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
    <div class="item" style="padding: 0 40px;">
      <img class="img-product" style="width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cargador-pared.png" alt="">
        <h3 class="titulo-producto" style="font-size: 25px;text-align: center;"> <span>Cargador USB </span> <br>de pared </h3>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;"><span style="font-size: 18px;"> Aprovecha al máximo la energía</span> y nunca te quedes sin carga </dd>
            </dl>
            <dl class="lista-beneficios" style="padding-inline-start: 0px;margin-bottom: 35px;font-size: 18px;">
              <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
              <dd style="margin: -10px 5px;">Ideal para teléfonos, reproductores mp3 o <span style="font-size: 18px;">dispositivos electrónicos pequeños que se carguen mediante USB</span> sin necesidad de la Computadora  </dd>
            </dl>
            <p class="precioproductos-antes" style="text-align:center;">ANTES: <?= ($cargador_usb_pared == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_pared["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos" style="text-align:center;">AHORA: <?= ($cargador_usb_pared == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_pared["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110099 )) ?>">
              <img class="btn-comprar" style="margin: 20px auto 45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
    </div>
  </div>
</div>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/banner-footer-movil.jpg" alt="">
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

<!--VERSION DE ESCRITORIO-->
<?php else: ?>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=tecnigo"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/banner.png"></a>
<div class="bg-rotor">
  <div class="contenedor-principal" style="position: relative;">
      <h1 class="titulo-principal"><span>Las 8 mejores soluciones </span>de energía al alcance de tu mano</h1>
      <div class='wrap'>
        <ul class='carousel is-set'>
      	   <li class='carousel-seat' data-id="1">
      	     <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/audifonos-tipo-beats.png " alt="">
             <p class="nombre-producto">Audífonos tipo Beats</p>
            </li>
      	   <li class='carousel-seat' data-id="2">
      	      <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/bateria-externa.png" alt="">
              <p class="nombre-producto">Batería externa</p>
           </li>
      	   <li class='carousel-seat' data-id="3">
      	      <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-datps-iphone4.png" alt="">
              <p class="nombre-producto">Cable de datos <br><span>Iphone 4</span>  </p>
            </li>
      	    <li class='carousel-seat' data-id="4">
      	      <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-de-datos-iphone-5-6.png" alt="">
              <p class="nombre-producto">Cable de datos<br><span>iphone 5 y 6</span>  </p>
            </li>
      	    <li class='carousel-seat' data-id="5">
      	      <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-microUSB-plano.png" alt="">
              <p class="nombre-producto">Cable Micro USB <br> <span>a USB plano</span></p>
            </li>
      	    <li class='carousel-seat ' data-id="6">
      	      <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cable-audio1x1-plano.png" alt="">
              <p class="nombre-producto">Cable audio<span> <br> 1x1 plano</span> </p>
            </li>
      	    <li class='carousel-seat' data-id="7">
      	      <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cargador-para-carro.png" alt="">
              <p class="nombre-producto">Cargador USB <br> <span>para carro</span> </p>
            </li>
      	    <li class='carousel-seat is-ref' data-id="8">
      	      <img class="img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/rotor/cargador-pared.png" alt="">
              <p class="nombre-producto">Cargador USB <br> <span>de pared</span></p>
            </li>
      	  </ul>
      </div>
      <div class='controls'>
        <button class='toggle prev' data-toggle='prev'><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/prev.png" alt="">Anterior</button>
      	<button class='toggle next' data-toggle='next'>Siguiente<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/next.png" alt=""></button>
      </div>
  </div>
</div>
<div class="bg-descripciones">
  <div class="contenedor-principal">
    <div id="info1" class="contenedor-info">
      <div class="column">
        <img class="img-responsive" style="margin-left: -80px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/audifonos-tipo-beats-descrip.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto">Audífonos <span>tipo Beats</span> </h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Con goma que aísla el sonido ambiente</span> <br> para poder escuchar mejor</dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Lo puedes utilizar como manos</span> libres <br> de celular</dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Funciona con cualquier dispositivo</span> <br> que tenga conexión Plug </dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd> Audífonos de <span>excelente calidad</span> </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($audifonos_tipo_beats == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $audifonos_tipo_beats["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($audifonos_tipo_beats == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $audifonos_tipo_beats["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110094 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
      </div>
    </div>
    <div id="info2" class="contenedor-info hidden">
      <div class="column">
        <img class="img-responsive" style="margin-left: -80px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bateria-externa-descrip.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto">Batería <span>externa</span> </h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd>Banco de energía portable que le da<span> carga extra <br> en todo momento a tus</span> dispositivos inteligentes</dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Puerto USB simple</span> con una corriente estable de 1 amperio</dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Diseño minimalista y liviano,</span> <br> será una pieza infaltable a donde vayas </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($bateria_externa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bateria_externa["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($bateria_externa == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bateria_externa["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110096 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
        </div>
    </div>
    <div id="info3" class="contenedor-info hidden">
      <div class="column">
        <img class="img-responsive" style="margin-left: -130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/cable-datos-iphone4-descrip.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto"><span>Cable de datos</span> <br>Iphone 4 </h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd>Diseñado para tu celular <span> iPhone 4 o iPhone 4S</span> </dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Sincroniza rápidamente</span> tus archivos <br> mientras carga</dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Compacto y portable,</span> llévalo siempre contigo </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($cable_datos_iphone4 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone4["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($cable_datos_iphone4 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone4["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110100 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
        </div>
    </div>
    <div id="info4" class="contenedor-info hidden">
      <div class="column">
        <img class="img-responsive" style="margin-left: -130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/cable-datos-iphone5-6-descrip.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto"><span>Cable de datos</span> <br>Iphone 5 y 6 </h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd>Diseñado para tu celular <span> iPhone 5 o iPhone 6, cuenta con 1 metro de longitud </span> </dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Sincroniza rápidamente</span> tus archivos <br> mientras carga</dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Compacto y portable,</span> llévalo siempre contigo </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($cable_datos_iphone_5_6 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone_5_6["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($cable_datos_iphone_5_6 == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_datos_iphone_5_6["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110101 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
        </div>
    </div>
    <div id="info5" class="contenedor-info hidden">
      <div class="column">
        <img class="img-responsive" style="margin-left: -125px; margin-top: 31px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/cable-micro-USB-a-USB-plano.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto"><span>Cable Micro USB </span> <br>a USB plano</h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span> Cable de carga USB y de sincronización USB </span> - Micro USB para el PC, te permite sincronizar y cargar tu teléfono </dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Mide 1 metro de longitud</span> </dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Ideal y flexible para el uso variado</span> durante la carga en un adaptador de pared </dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Compatible con la mayoría de dispositivos</span> con puerto USB Micro </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($cable_micro_usb == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_micro_usb["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($cable_micro_usb == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_micro_usb["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110092 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
        </div>
      </div>
    <div id="info6" class="contenedor-info hidden">
      <div class="column">
        <img class="img-responsive" style="margin-left: -40px;margin-top: -50px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/cable-audio-1x1-plano.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto">Cable <span>audio 1x1 plano</span></h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Cable auxiliar de audio </span>te permite conectar tu dispositivo (mp3, celular,
            mp4, mp5, iPod), a un equipo de sonido e incluso a tu carro (si cuenta con entrada auxiliar) para reproducir tu música y disfrutar al máximo de tus reuniones o viajes.
            </dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd>Con 1 metro de longitud, el cable te permite un mayor alcance para un mejor manejo. </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($cable_audio == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_audio["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($cable_audio == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cable_audio["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110095 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
        </div>
    </div>
    <div id="info7" class="contenedor-info hidden">
      <div class="column">
        <img class="img-responsive" style="margin-left: -40px;margin-top: -50px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/cargador-para-carro.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto"><span>Cargador usb</span> <br> para carro</h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd>Cargador de carro con puerto USB para estar seguro de que tu Smartphone y el de tus amigos siempre estarán <span>completamente cargados y listos para funcionar</span></dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd><span>Recarga al instante</span> tu teléfono, tablet o cámara </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($cargador_usb_carro == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_carro["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($cargador_usb_carro == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_carro["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110097 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
        </div>
    </div>
    <div id="info8" class="contenedor-info hidden">
      <div class="column">
        <img class="img-responsive" style="margin-left: -40px;margin-top: -50px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/cargador-para-pared.png">
      </div>
      <div class="column">
        <h3 class="titulo-producto"><span>Cargador usb</span> <br> de pared</h3>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd> <span>Aprovecha al máximo la energía</span> y nunca te quedes sin carga</dd>
          </dl>
          <dl class="lista-beneficios">
            <dt><img width="13" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/bullet.png"></dt>
            <dd>Ideal para teléfonos, reproductores mp3 o <span>dispositivos electrónicos pequeños que se carguen mediante USB</span> sin necesidad de la Computadora </dd>
          </dl>
          <div class="compra">
            <p class="precioproductos-antes">ANTES: <?= ($cargador_usb_pared == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_pared["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
    				<p class="precioproductos">AHORA: <?= ($cargador_usb_pared == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cargador_usb_pared["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 110099 )) ?>">
              <img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt="">
            </a>
          </div>
        </div>
    </div>
  </div>
</div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/tecnigo/banner-footer.jpg" alt="">
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
function mostrarBanner(r){"anterior"==r&&(mostrar=--mostrar<1?8:mostrar),"siguiente"==r&&(mostrar=++mostrar>8?1:mostrar),$(".contenedor-info").addClass("hidden"),$("#info"+mostrar).removeClass("hidden"),$(".carousel-seat").removeClass("active"),$('li[data-id="'+mostrar+'"]').addClass("active")}$('li[data-id="1"]').addClass("active");var totalBanners=8,mostrar=1,$carousel=$(".carousel"),$seats=$(".carousel-seat");$(".toggle").on("click",function(r){function s(r){return r.next().length?r.next():$seats.first()}mostrarBanner("prev"==$(this).attr("data-toggle")?"anterior":"siguiente");var e,a=$(".is-ref"),t=$(r.currentTarget);a.removeClass("is-ref"),"next"===t.data("toggle")?(e=s(a),$carousel.removeClass("is-reversing")):(e=function(r){return r.prev().length?r.prev():$seats.last()}(a),$carousel.addClass("is-reversing")),e.addClass("is-ref").css("order",1);for(var o=2;o<=$seats.length;o++)e=s(e).css("order",o);return $carousel.removeClass("is-set"),setTimeout(function(){return $carousel.addClass("is-set")},50)});
</script>
<!--Fin versión escritorio -->
<?php endif; ?>
