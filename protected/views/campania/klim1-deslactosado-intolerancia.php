<?php $this->pageTitle = "Klim 1+ Deslactosado | La Rebaja Virtual"; ?>
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
    .agradecimiento {font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 16px;}
    .agradecimiento span {font-family:HelveticaNeue-BlackCond;letter-spacing:1px;}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    a {text-decoration:none;}    
    @font-face { font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/klim1-deslactosado/fonts/VAGRoundedStd-Bold.otf);}
   
    @font-face { font-family:VAGRoundedStd-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/klim1-deslactosado/fonts/VAGRoundedStd-Light.otf);}


    .animate1 {visibility: hidden;}
    .main-klim {background-size: 100%;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/interna/bg-main.jpg);}
    .content {display:flex;width:100%;flex-direction: row;max-width: 1100px;flex-wrap: wrap;margin: 0 auto;}
    .intro-banner {display:flex;width:100%;flex-direction: row;flex-wrap: wrap;}
    .intro-banner .columna1 {width: 60%;}
    .intro-banner .columna2 {width: 40%;}
    .nuevo {width: 30%;max-width: 180px;}
    .nuevo-alimento {width: 100%;max-width: 660px;margin: 46px auto;}
    .intro-banner .pack {width: 100%;margin: 80px auto 0;max-width: 440px;}
    .intro-banner .columna2 .compra{display:flex;width:100%;flex-direction: row;flex-wrap: wrap;}
    .intro-banner .columna2 .compra .columna1, .intro-banner .columna2 .compra .columna2 {width:50%;}
    .precioproductos-antes{text-decoration: line-through;color:#8E2079;font-family:VAGRoundedStd-Bold;font-size: 25px;margin: 0 auto 5px;line-height: 25px;}
    .precioproductos{color:#8E2079;font-family:VAGRoundedStd-Bold;font-size: 25px;margin: 0;line-height: 25px;}
    .descripcion {font-family:VAGRoundedStd-Bold; color:#8E2079;margin: 50px auto 0;text-align:center;}
    .descripcion h1{font-size: 45px;margin:0;}
    .descripcion h2{font-size: 50px;margin:0;}
    .caracteristicas {padding: 10px 30px;background-color: #fff;border-radius: 25px;display: flex;width: 100%;flex-direction: row;flex-wrap: wrap;max-width: 900px;margin: 40px auto;font-family: VAGRoundedStd-Bold;color: #2E318D;font-size: 18px;}
    .caracteristicas .columna {width: 50%;padding: 0 30px;}
    .caracteristicas .title-special{letter-spacing: 1px;font-family: VAGRoundedStd-Bold;color: #fff;background: url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/interna/bg01.png);text-transform: uppercase;text-align: center;padding: 23px;background-size: contain;width: 100%;line-height: 24px;font-size: 18px;background-repeat: no-repeat;}
    .caracteristicas .title-normal {margin-bottom:20px;margin-top:40px;text-transform: uppercase;background-size: cover;width: 100%;color:#8E2079;line-height: 25px;font-size: 22px;}
    .caracteristicas ol {padding-inline-start:45px;}
    .conoce-mas {background-color: #913D80;padding: 25px 0px;}
    .conoce-mas .content .column {width:50%;}
    .conoce-mas h3 {font-family:VAGRoundedStd-Bold;color:#fff;text-align:center;font-size:30px;}
    .conoce-mas .content .column .accion {display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;}
    .accion .column1{width:70%;}
    .accion .column2{width:30%;}
    .accion .btn-conoce-mas {width: 55%;margin: 12px auto 0;display: block;max-width: 211px;}
    .accion .icono1 {width: 100%;margin: -98px auto;display: block;max-width: 151px;}
    .main-video {background: url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/corazon.png) top right no-repeat, url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/bg-video.jpg) center no-repeat;}
    .main-video h2 {font-family: VAGRoundedStd-Bold;color: #8E2079;font-size: 45px;text-align: center;margin: 75px auto 0;}
    .video{margin: 50px auto 0;width: 100%;max-width: 1100px;}
    .video iframe {border:8px solid #fff;width: 60%;}
    .fot {margin-top: -195px;}
    .icono-m {width: 60px;float: right;margin-top: -55px;right: 30px;position: absolute;}
    .video-m {position: relative;padding-bottom: 56.25%;overflow: hidden;margin: 20px 30px;}
    .video-m iframe {position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
    .main-video-m {padding-top: 30px;background:url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/bg-video.jpg) center no-repeat;}
    @media (min-width: 1800px) and (max-width: 1920px){.fot {margin-top: -335px;}}
    .programa-hora .content .seccion1-m {background-color: #C9C8C6;padding: 15px;text-align: center;}
    .programa-hora .content .seccion2-m {background-color: #BF1A24;width: 100%;padding: 15px;}
    .btn-volver {width: 150px;}
    .nota {background: url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/interna/bg02.png);width: 100%;max-width: 900px;margin: 0px auto;font-family: VAGRoundedStd-Light;color: #fff;font-size: 21px;padding: 40px;background-size: 95%;text-align: center;background-position: center;background-repeat: no-repeat;}
    .nota span {font-family: VAGRoundedStd-Bold;}
    .referencias {font-family: VAGRoundedStd-Light;color: #903D81;width: 100%;max-width: 795px;margin: 25px auto 0;}
    .caracteristicas-m {background-color: #fff;border-radius: 25px;font-family: VAGRoundedStd-Bold;color: #2E318D;margin: 0px 10px;padding: 15px;}
    .caracteristicas-m .title-special{font-family: VAGRoundedStd-Bold;color: #fff;background: url(".Yii::app()->request->baseUrl."/images/contenido/klim1-deslactosado/interna/bg01.png);text-transform: uppercase;text-align: center;padding: 18px;background-size: cover;background-repeat: no-repeat;margin: 0;font-size: 17px;}
    .caracteristicas-m .title-normal {text-align:center;margin-bottom:20px;margin-top:40px;text-transform: uppercase;background-size: cover;width: 100%;color:#8E2079;line-height: 25px;font-size: 22px;}
    .caracteristicas-m ol {padding-inline-start:45px;}
    .nota-m {background-color: #903D80;padding: 1px 20px;color: #fff;text-align: center;border-radius: 15px;border-bottom: 3px solid #411A39;margin: 25px 10px 0;}
    .nota-m span {font-family: VAGRoundedStd-Bold;}
    .referencias-m {font-family: VAGRoundedStd-Light;color: #903D81;margin: 0px 20px;font-size: 13px;}
  </style>

";
?>
<!--LIBRERIA DE ANIMACIONES-->
<link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/animate.min.css">
<script src="<?= Yii::app()->request->baseUrl ?>/images/contenido/cicatricure/wow.min.js"></script>
<script type="text/javascript">wow = new WOW(); wow.init();</script>
<!--PRECIO PRODUCTO-->
<?php $klim1_deslactosado = Producto::consultarPrecio('118997', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Añadir al carro-->
<input type="hidden" id="cantidad-producto-unidad-118997" value="1" >
<section class="main-klim" style="background-size:cover;">
  <img class="nuevo" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo.png" alt="Nuevos deslactosado">
  <img class="img-responsive-m" style="width: 80%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo-alimento-lacteo.png" alt="Nuevos Alimento lacteo">
  <img class="pack" style="width: 70%;margin: 20px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/lata-klim-deslactosado.png" alt="Klim 1+ deslactosado">
  <p class="precioproductos-antes" style="text-align: center;">ANTES: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
  <p class="precioproductos" style="text-align: center;">AHORA: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
  <a data-ajax="false" data-cargar="1" data-producto="118997" data-id="1" href="#">
    <img class="img-responsive-m" style="margin: 20px auto 0;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/btn-comprar.png" alt="Comprar">
  </a>
  <div class="descripcion" style="margin: 35px 20px;">
    <h1 style="font-size: 24px;">¿Cómo saber si mi hijo es intolerante a la lactosa?</h1>
    <h2 style="font-size: 28px;margin-top: 0px;">5 FORMAS DE DETECTARLO</h2>
  </div>
  <div class="caracteristicas-m">
    <h3 class="title-special">¿Qué es la intolerancia <br> a la lactosa?</h3>
      <p>Cualquier alimento que es ingerido por el organismo necesita ser fraccionada en sustancias menores para facilitar la digestión y la obtención de energía.<br>Las encargadas de este fraccionamiento son las enzimas y la lactasa es la enzima encargada de actuar sobre la lactosa, un tipo de azúcar presente en la leche que le das a tu niño.</p>        
      <p>La ausencia de lactasa produce una incapacidad para digerir lactosa, esa incapacidad se manifiesta mediante la aparición de síntomas digestivos molestos, los cuales se harán presentes siempre que tu niño consuma alimentos a base de lácteos. Existen varias formas de disminución de la lactasa. Por ejemplo, puede presentarse desde el nacimiento (deficiencia congénita de lactasa), lo que es muy raro. Lo más frecuente es que la intolerancia a la lactosa ocurra como complicación de una diarrea y generalmente esta intolerancia es transitoria. Es la más frecuente y se denomina deficiencia secundaria de lactasa. Sin embargo, algunos niños, en sus primeros 5 años de edad, pueden tener una intolerancia a la lactosa porque su lactasa se disminuye poco a poco de una manera programada y llega un momento que el niño empieza a presentar los síntomas. Esta se llama deficiencia de la lactasa del tipo adulto. Es la más frecuente en la población general en todo el mundo.</p>
      <h3 class="title-special">Síntomas frecuentes <br> y precauciones generales</h3>
      <p>Los síntomas más comunes que observarás en tu niño, derivados de una intolerancia a la lactosa, son:</p>
        <ul>
          <li>Hinchazón abdominal producida por el exceso de gases acumulados en los intestinos.</li>
          <li>Calambres abdominales y dolor de estómago.</li>
          <li>Flatulencia originada por la excesiva producción de gases.</li>
          <li>Vómitos y diarrea.</li>
          <li>Irritación alrededor del ano.</li>
        </ul>
      <h3 class="title-normal">¿Qué hay que hacer?</h3>
      <p>La intolerancia a la lactosa no es un tema que debería causarte gran preocupación, solo debes ofrecer la alimentación que a tu hijo no le cause las molestias digestivas. <br>Lo primero que debes hacer, si se presenta este problema, es suprimir inmediatamente los productos lácteos en la alimentación de tu niño. Sin embargo, debes tener en cuenta que esta eliminación de alimentos lácteos, puede afectar el crecimiento de tu hijo, por eso es recomendable reemplazar los alimentos lácteos por alimentos lácteos deslactosados o con menor contenido de lactosa que tu hijo pueda digerir sin inconvenientes.</p>
      <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/klim1-deslactosado">
        <img class="btn-volver" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/interna/volver.png" alt="Volver">
      </a>
    </div>
    <div class="nota-m">
      <p>lo más importante de todo y que nunca debes olvidar, es que <span>cuando tu hijo presente algún problema de salud lo primero que tienes que hacer es acudir a un médico, </span> él te dirá qué es lo más aconsejable a realizar.</p>
    </div>
    <div class="referencias-m">
      <p>* Referencias Bibliográficas <br>
      https://www.nestlebebe.es/alergias-alimentarias/como-detectar-la-intolerancia-la-lactosa-en-bebes <br>
      http://www.innatia.com/s/c-dietas-para-ninos/a-intolerancia-a-la-lactosa.html <br>
      http://kidshealth.org/es/parents/lactose-esp.html
      </p>
    </div>
    <img class="img-responsive-m fot" style="margin-top: -35px;" src="/lrv/images/contenido/klim1-deslactosado/footer.png">
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
<!-- Fin Version movil -->
<!--VERSION ESCRITORIO-->
<?php else: ?>
 <!--Añadir al carro-->
<input type="hidden" id="cantidad-producto-unidad-118997-1" value="1" >
<section class="main-klim">
  <div class="content">
    <div class="intro-banner">
      <div class="columna1">
        <img class="nuevo animate1 wow flash" data-wow-offset="200" data-wow-delay="2s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo.png" alt="Nuevos deslactosado">
        <img class="nuevo-alimento animate1 wow fadeInLeft" data-wow-offset="100" data-wow-delay="0.8s" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/nuevo-alimento-lacteo.png" alt="Nuevos Alimento lacteo">
      </div>
      <div class="columna2 animate1 wow fadeIn"  data-wow-offset="200" data-wow-delay="1s">
        <img class="pack" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/lata-klim-deslactosado.png" alt="Klim 1+ deslactosado">
        <div class="compra">
          <div class="columna1">
            <p class="precioproductos-antes">ANTES: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
            <p class="precioproductos">AHORA: <?= ($klim1_deslactosado == null) ? "$00.000" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $klim1_deslactosado["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
          </div>
          <div class="columna2">
            <a data-cargar="1" data-producto="118997" data-id="1" href="#">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/btn-comprar.png" alt="Comprar">
            </a>
          </div>
        </div>                    
      </div>
    </div>
    <div class="descripcion">
      <h1 class="animate1 wow bounceInDown" data-wow-offset="10" data-wow-delay="0.2s">¿Cómo saber si mi hijo es intolerante a la lactosa?</h1>
      <h2 class="animate1 wow fadeIn" data-wow-offset="10" data-wow-delay="0.4s" style="visibility: visible;">5 FORMAS DE DETECTARLO</h2>
    </div>
    <div class="caracteristicas">
      <div class="columna">
        <h3 class="title-special">¿Qué es la intolerancia <br> a la lactosa?</h3>
        <p>Cualquier alimento que es ingerido por <br>
        el organismo necesita ser fraccionada <br>
        en sustancias menores para facilitar la <br>
        digestión y la obtención de energía.<br>
        Las encargadas de este fraccionamiento <br>
        son las enzimas y la lactasa es la enzima<br>
        encargada de actuar sobre la lactosa,<br>
        un tipo de azúcar presente en la leche <br>que le das a tu niño.
        </p>        
        <p>La ausencia de lactasa produce una <br>
        incapacidad para digerir lactosa, esa <br>
        incapacidad se manifiesta mediante <br>
        la aparición de síntomas digestivos<br>
        molestos, los cuales se harán presentes <br>siempre que tu niño consuma alimentos<br>
        a base de lácteos. Existen varias formas  <br>
        de disminución de la lactasa. Por ejemplo,  <br>
        puede presentarse desde el nacimiento  <br>
        (deficiencia congénita de lactasa), lo que <br>
        es muy raro. Lo más frecuente es que la  <br>
        intolerancia a la lactosa ocurra como  <br>
        complicación de una diarrea y <br>
        generalmente esta intolerancia <br>
        es transitoria. Es la más frecuente y se  <br>
        denomina deficiencia secundaria de <br>
        lactasa. Sin embargo, algunos niños, en  <br>
        sus primeros 5 años de edad, pueden tener <br>
        una intolerancia a la lactosa porque su  <br>
        lactasa se disminuye poco a poco de una  <br>
        manera programada y llega un momento  <br>
        que el niño empieza a presentar los  <br>
        síntomas. Esta se llama deficiencia de la  <br>
        lactasa del tipo adulto. Es la más frecuente  <br>
        en la población general en todo el mundo.
        </p>
      </div>
      <div class="columna">
       <h3 class="title-special">Síntomas frecuentes <br> y precauciones generales</h3>
       <p>Los síntomas más comunes que observarás  <br>
        en tu niño, derivados de una intolerancia  <br>
        a la lactosa, son:</p>
        <ol>
          <li>Hinchazón abdominal producida por el exceso de gases acumulados en los intestinos.</li>
          <li>Calambres abdominales y dolor de estómago.</li>
          <li>Flatulencia originada por la excesiva producción de gases.</li>
          <li>Vómitos y diarrea.</li>
          <li>Irritación alrededor del ano.</li>
        </ol>
        <h3 class="title-normal">¿Qué hay que hacer?</h3>
        <p>La intolerancia a la lactosa no es un tema <br>
        que debería causarte gran preocupación, <br>
        solo debes ofrecer la alimentación que a <br>
        tu hijo no le cause las molestias digestivas. <br>
        Lo primero que debes hacer, si se presenta <br>
        este problema, es suprimir inmediatamente <br>
        los productos lácteos en la alimentación <br>
        de tu niño. Sin embargo, debes tener en <br>
        cuenta que esta eliminación de alimentos <br>
        lácteos, puede afectar el crecimiento <br>
        de tu hijo, por eso es recomendable <br>
        reemplazar los alimentos lácteos por <br>
        alimentos lácteos deslactosados o con<br>
        menor contenido de lactosa que tu hijo <br>
        pueda digerir sin inconvenientes.
        </p>
        <a href="<?= Yii::app()->request->baseUrl ?>/klim1-deslactosado">
          <img class="btn-volver" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/interna/volver.png" alt="Volver">
        </a>
      </div>
    </div>
    <div class="nota">
      <p>lo más importante de todo y que nunca debes olvidar, <br>
      es que <span>cuando tu hijo presente algún problema de salud lo primero que tienes <br>
      que hacer es acudir a un médico, </span> él te dirá qué es lo más aconsejable a realizar.</p>
    </div>
    <div class="referencias">
      <p>* Referencias Bibliográficas <br>
      https://www.nestlebebe.es/alergias-alimentarias/como-detectar-la-intolerancia-la-lactosa-en-bebes <br>
      http://www.innatia.com/s/c-dietas-para-ninos/a-intolerancia-a-la-lactosa.html <br>
      http://kidshealth.org/es/parents/lactose-esp.html
      </p>
    </div>
  </div>
  <img class="img-responsive fot" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1-deslactosado/footer.png">
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
