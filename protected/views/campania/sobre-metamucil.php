<?php $this->pageTitle = "Sobre Metamucil - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Metamucil es una fibra soluble con muchos beneficios basado en plantago Psyllium, una fuente de fibra de origen 100% natural.'>
  <meta name='keywords' content='plantago Psyllium, fibra de origen de natural, fibra multi-beneficios'>
  <style>
      @font-face {font-family:DINPro-Black;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/DINPro-Black_4.otf);}
      @font-face {font-family:interstate-regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/interstate-regular.ttf);}
      @font-face {font-family:DIN-Alternate-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
      @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
      @font-face {font-family:DINPro-Bold;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/DINPro-Bold_9.otf);}
      .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 20%;}
      .background-pattern{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/bg-internas.jpg);background-size: cover; }
      .line-text {display:flex;margin-bottom: 15px;}
      .line-text img {width:40px;height: 41px;margin-right: 15px;}
      .line-text p {font-family:interstate-regular;color: #750532 !important;font-size: 24px;line-height: 30px;}
      .text-red {background-color: #FF3C00;color: #fff;display: inline-block;padding: 5px 25px;border-radius: 12px;font-family: interstate-regular;font-size: 25px;margin-top: 16px;}
      .bg-products {background-color:#FCE4CE;}
      .section-conoce-mas{background-color:#F2B689;padding: 35px 0;}
      .bg-red {font-size: 20px;background-color:#FF3C00;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
      .bg-red a {text-decoration:underline;color:#fff;}
      .bg-red a:hover {color:#fff;text-decoration:underline;}
      .space-1 {height: 0px !important;}
      .title-principal{margin-bottom: 25px;font-family: DINPro-Black;color:#640C34;text-align: center;font-size: 50px;margin-top: 25px;}
      .subtitle{color: #88113C;font-family: interstate-regular;margin-top: 50px;}
      .img-responsive.hover-producto:hover {-ms-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);-webkit-transition: ease-out 1s;}
      .conoce-mas{font-weight: bold;margin-bottom: 35px !important;font-family: DIN-Alternate-Bold;background-color: #FFA800;color: #fff;margin: 0px auto;padding: 8px;text-align: center;width: 58%;border-radius: 15px;}
      .mod-conoce {background-color: rgba(255, 255, 255, 0.5);border-radius: 25px 25px 0 0;-webkit-box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);-moz-box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);padding: 20px 0;}
      .mod-conoce p {margin: 0;font-family:DIN-Alternate-Bold;color:#640C34;text-align:center;font-size: 22px;font-weight: bold;}
      .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
      .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
      .datos-contacto {padding: 15px 0;}
      .datos-contacto p{text-align: center;margin:0px;}
      .img-responsive-m{width:100%;}
      .item-menu {background-color: #FED09F;-webkit-box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);-moz-box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);box-shadow: 2px 0px 6px 0px rgba(0,0,0,0.2);text-align: center;padding: 7px;margin: 7px;flex-grow: 1;color: #750532;font-size: 18px;font-family:DINPro-Bold;border-radius: 6px;}
      .item-menu:hover {color: #750532;background-color:#fff;}
      .item-menu.active {background-color:#fff;}
      .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
      .video iframe {position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
      .sub{font-family: DINPro-Black;color: #640C34;font-size: 20px;}
      .title3{font-family: DINPro;color: #640C34;font-size: 18px;font-weight: bold;line-height: 18px;margin-top: 7px !important;display: inline-block;}
      .parrafo {color: #444242;font-family: DINPro-bold;margin-left: 16px;font-size: 15px;margin-top: 15px;}
      .block-image {width: 87%;margin: 20px auto;display: block;background-color: #fff;border-radius: 25px;padding: 0;}
      .title-video {font-family: DINPro-Bold;background-color: rgba(255, 255, 255, 0.6);text-align: center;border-radius: 15px;padding: 8px;font-size: 17px;margin-bottom:15px;}
  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil" data-ajax="false"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banner-mobile.png" alt="Metamucil"></a>
<section class="background-pattern">
  <div class="line-text" style="margin: -5px;flex-direction: column;padding: 15px;">
    <a style="text-decoration:none;" href="<?= Yii::app()->request->baseUrl ?>/metamucil-facilita-transito-intestinal" class="item-menu">Beneficios de Metamucil</a>
    <a style="text-decoration:none;" href="<?= Yii::app()->request->baseUrl ?>/sobre-metamucil" class="item-menu active">Sobre Metamucil</a>
    <a style="text-decoration:none;" href="<?= Yii::app()->request->baseUrl ?>/porque-elejir-metamucil" class="item-menu">Porqué elegir Metamucil</a>
  </div>
<div style="padding:0 15px 15px;">
  <h1 class="title-principal" style="font-size: 32px;">Sobre metamucil</h1>
  <span class="sub">Hay muchos productos basados en fibra. </span> <br>
  <span class="title3">¿Pero estos productos usan la fibra qué es multi-beneficios?</span>
  <p class="parrafo">Hay dos tipos de fibras: las solubles y las insolubles.Todas estas fibras son extremamente saludables y deben ser consumidas regularmente. Sin embargo, solamente las fibras solubles viscosas, como las que contiene Metamucil®, le proporciona más beneficios que las demás fibras. Metamucil<sup>®</sup> es basado en Plantago psyllium, una fibra 100% de origen natural. Metamucil<sup>®</sup> le da muchos beneficios, y es por eso que llamamos Plantago psyllium una fibra ¡multi-beneficios!</p>
  <h3 class="sub">Los beneficios de Metamucil®:</h3>
  <strong class="title3" style="font-size: 15px;">1. Ayuda a regular tu intestino</strong><br>
  <p class="parrafo" style="margin-top: 5px;">Su sistema digestivo sale ganando con Plantago psyllium. Una dieta equilibrada, con el uso de Metamucil<sup>®</sup>, ayuda a reducir la sensación de hinchazón. Esto ocurre porque Metamucil<sup>®</sup> viene con la cantidad apropiada de Plantago psyllium para regular el funcionamiento de su intestino, proporcionando más comodidad para su digestión.</p>
  <img class="block-image" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/sobre-metamucil.png">
  <strong class="title3" style="font-size: 15px;">2. Favorece tu proceso natural de limpieza</strong><br>
  <p class="parrafo" style="margin-top: 5px;">natural que funciona de modo distinto a otras fuentes de fibras: al ingresar en tu estómago, Plantago psyllium forma un gel que atrapa y remueve alimentos no procesados que se quedaron en su sistema digestivo. Esto es porque Plantago psyllium es una fibra viscosa.</p>
  <p class="parrafo" style="margin-top: 5px;">3. Te hace sentirte más ligera</p>
  <p class="parrafo" style="margin-top: 5px;">4. Es una fuente de fibra 100% de origen natural</p>
</div>
</section>
<section class="bg-products" style="padding: 20px 15px;">
  <h2 class="subtitle" style="margin: 0;font-size: 20px;">Encuentra las diferentes presentaciones de <strong>Metamucil Naranja:</strong></h2>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111299)) ?>"><img class="img-responsive-m" style="margin-top:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-caja-mobile.png"></a>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111298)) ?>"><img class="img-responsive-m" style="margin-top:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-174g-mobile.png"></a>
  <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111297)) ?>"><img class="img-responsive-m" style="margin-top:15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-425g.png"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><img class="img-responsive-m" style="width: 85%;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/compra-online.png"></a>
</section>
<section class="section-conoce-mas" style="padding:10px 15px;">
  <p class="title-video">Razones para escoger Metamucil</p>
  <div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/s1yNvY-_yPs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
  <p class="title-video">Fibra Psyllium</p>
  <div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/Il6Yqjy-WRM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
  <p class="nota"> Es un medicamento fitoterapéutico. No exceder su consumo.  No. de registro sanitario: PFM2015-0002427. <br>
  Leer indicaciones y contraindicaciones. Si los síntomas persisten, consultar al médico.</p>
</section>
<div class="datos-contacto" style="padding: 20px 15px;">
  <p class="text-atencion">Si tienes algún inconveniente con tu pedido comunícate con nosotros a través de los canales que tenemos disponibles:</p>
  <img class="img-responsive-m"  style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/chat.png">
  <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Chat en linea</p>
  <img class="img-responsive-m" style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/pqrs.png">
  <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Sistema PQRS</p>
  <p style="font-size:12px;font-family: MyriadPro;">(preguntas, quejas, reclamos y solicitudes)</p>
  <img class="img-responsive-m" style="width: 25%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/linea.png">
  <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Linea gratuita</p>
  <p style="font-family: MyriadPro;">01-8000-939900</p>
</div>
<div class="bg-red">
  <p style="margin:0;">Gracias por comprar en <a href="https://www.larebajavirtual.com">www.larebajavirtual.com</a></p>
</div>
<!--Versión movil-->
<!--Versión escritorio-->
<?php else: ?>
  <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/btn-fijo.png" alt="Compra online"></div></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banner-metamucil.jpg" alt="Metamucil"></a>
  <section class="background-pattern">
    <div class="container-fluid" style="padding-bottom: 25px;">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="line-text" style="margin-top: 25px;">
           <a href="<?= Yii::app()->request->baseUrl ?>/metamucil-facilita-transito-intestinal" class="item-menu">Beneficios de Metamucil</a>
           <a href="<?= Yii::app()->request->baseUrl ?>/sobre-metamucil" class="item-menu active">Sobre Metamucil</a>
           <a href="<?= Yii::app()->request->baseUrl ?>/porque-elejir-metamucil" class="item-menu">Porqué elegir Metamucil</a>
        </div>
      </div>
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <h1 class="title-principal">Sobre metamucil</h1>
        <div class="col-sm-6 col-md-6">
          <span class="sub">Hay muchos productos basados en fibra. </span> <br>
          <span class="title3">¿Pero estos productos usan la fibra <br> qué es multi-beneficios?</span>
          <p class="parrafo">Hay dos tipos de fibras: las solubles y las insolubles. <br>
          Todas estas fibras son extremamente saludables y deben  <br>
          ser consumidas regularmente. Sin embargo, solamente <br>
          las fibras solubles viscosas, como las que contiene  <br>
          Metamucil®, le proporciona más beneficios que las demás  <br>
          fibras. Metamucil<sup>®</sup> es basado en Plantago psyllium, una <br>
          fibra 100% de origen natural. Metamucil<sup>®</sup> le da muchos <br>
          beneficios, y es por eso que llamamos Plantago psyllium <br>
          una fibra ¡multi-beneficios!</p>
          <h3 class="sub">Los beneficios de Metamucil®:</h3>
          <strong class="title3" style="font-size: 15px;">1. Ayuda a regular tu intestino</strong><br>
          <p class="parrafo" style="margin-top: 5px;">Su sistema digestivo sale ganando con Plantago  <br>
              psyllium. Una dieta equilibrada, con el uso de <br>
              Metamucil<sup>®</sup>, ayuda a reducir la sensación de <br>
              hinchazón. Esto ocurre porque Metamucil<sup>®</sup> <br>
              viene con la cantidad apropiada de Plantago <br>
              psyllium para regular el funcionamiento de su <br>
              intestino, proporcionando más comodidad para <br> su digestión.</p>
        </div>
        <div class="col-sm-6 col-md-6">
          <img class="block-image" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/sobre-metamucil.png">
          <strong class="title3" style="font-size: 15px;">2. Favorece tu proceso natural de limpieza</strong><br>
          <p class="parrafo" style="margin-top: 5px;">natural que funciona de modo distinto a otras <br>
            fuentes de fibras: al ingresar en tu estómago, <br>
            Plantago psyllium forma un gel que atrapa <br>
            y remueve alimentos no procesados que se quedaron <br>
            en su sistema digestivo. Esto es porque Plantago <br>
            psyllium es una fibra viscosa.</p>
          <p class="parrafo" style="margin-top: 5px;">3. Te hace sentirte más ligera</p>
          <p class="parrafo" style="margin-top: 5px;">4. Es una fuente de fibra 100% de origen natural</p>
        </div>
      </div>
    </div>
  </section>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/banda-promesa-rebaja.png">
  <section class="bg-products">
    <div class="container-fluid">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <h2 class="subtitle">Encuentra las diferentes presentaciones <br> de <strong>Metamucil Naranja:</strong></h2>
          <div style="margin-top: -50px;">
            <div class="col-sm-4 col-md-4">
              <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111299)) ?>"><img class="img-responsive hover-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-caja.png"></a>
            </div>
            <div class="col-sm-4 col-md-4">
              <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111298)) ?>"><img class="img-responsive hover-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-174g.png"></a>
            </div>
            <div class="col-sm-4 col-md-4">
              <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 111297)) ?>"><img class="img-responsive hover-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/metamucil-425g.png"></a>
            </div>
            <div class="col-md-12">
              <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=metamucil"><img class="img-responsive" style="width: 35%;margin: 26px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/compra-online.png"></a>
            </div>
          </div>
        </div>
      </div>
  </section>
  <section class="section-conoce-mas">
    <div class="container">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="col-sm-6 col-md-6">
          <p class="title-video">Razones para escoger Metamucil</p>
            <div class="video">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/s1yNvY-_yPs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <p class="title-video">Fibra Psyllium</p>
            <div class="video">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/Il6Yqjy-WRM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:26px;">
          <p class="nota"> Es un medicamento fitoterapéutico. No exceder su consumo.  No. de registro sanitario: PFM2015-0002427. <br>
          Leer indicaciones y contraindicaciones. Si los síntomas persisten, consultar al médico.</p>
        </div>
      </div>
    </div>
  </section>
  <div class="container datos-contacto">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <p class="text-atencion">Si tienes algún inconveniente con tu pedido comunícate con nosotros a través de los canales que tenemos disponibles:</p>
      <div class="col-sm-4 col-md-4" style="border-right: 2px solid #FF3C00;">
        <img class="img-responsive"  style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/chat.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Chat en linea</p>
      </div>
      <div class="col-sm-4 col-md-4" style="border-right: 2px solid #FF3C00;">
        <img class="img-responsive" style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/pqrs.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Sistema PQRS</p>
        <p style="font-size:12px;font-family: MyriadPro;">(preguntas, quejas, reclamos y solicitudes)</p>
      </div>
      <div class="col-sm-4 col-md-4">
        <img class="img-responsive" style="width: 60%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/linea.png">
        <p style="font-family: MyriadPro;font-size: 16px;font-weight: bold;">Linea gratuita</p>
        <p style="font-family: MyriadPro;">01-8000-939900</p>
      </div>
    </div>
  </div>
  <div class="bg-red">
    <p style="margin:0;">Gracias por comprar en <a href="https://www.larebajavirtual.com">www.larebajavirtual.com</a></p>
  </div>
 <!--Fin versión escritorio-->
<?php endif;?>
