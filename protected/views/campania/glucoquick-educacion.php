<?php $this->pageTitle = "¡Edúcate sobre diabetes! | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='-	Edúcate sobre diabetes con Glucoquick, con nuestro programa Vive Feliz y Saludable, te enseñamos cómo. Más información aquí. '>
<meta name='keywords' content='diabetes, que es la diabetes, diabetes control.'>
  <style>
    @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face { font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    @font-face { font-family:FiraSans-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/FiraSans-Bold.otf);}
    @font-face { font-family:FiraSans-SemiBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/FiraSans-SemiBold.otf);}
    @font-face { font-family:HelveticaNeueLTStd-Md; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/HelveticaNeueLTStd-Md.otf);}
    @font-face { font-family:FiraSans-BoldItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/FiraSans-BoldItalic.otf);}
    @font-face { font-family:FiraSans-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/FiraSans-Light.otf);}
    @font-face { font-family:FiraSans-LightItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/glucoquick/fonts/FiraSans-LightItalic.otf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .programa-hora .span1 {font-family:HelveticaNeueLight;color:#363636;}
    .programa-hora .span2 {font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 23px;letter-spacing: 1px;}
    .programa-hora .span3{color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
    a {text-decoration:none;}
    .bg-principal {background-color: #EEF1F8;margin-top: 50px;padding:50px;border-radius: 25px;-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);}
    .title-main {font-family: FiraSans-SemiBold;color: #0142a0;text-align: center;margin-top: 50px;}
    .second-title {color:#0142a0;font-family:HelveticaNeueBold;margin: 0;}
    .list {font-family:HelveticaNeueLTStd-Md;color:#002259;font-size: 30px;margin-top: 35px;padding-inline-start: 25px;}
    .btn-comprar {width: 200px;margin: 0 auto;}
    .subtitle {font-family: FiraSans-SemiBold;text-align: center;color: #0142a0;font-size: 35px;margin-top: 50px;}
    .bg-producto {background-color:#E3E7F3;padding: 25px 50px;border-radius: 25px;-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.2);}
    .section-products {padding: 30px 100px 0;}
    .section-products .btn-comprar {width:150px;margin:0 auto;}
    .section-products p {font-family: HelveticaNeueLTStd-Md;color: #101F52;font-size: 19px;line-height: 20px;margin-bottom: 40px;margin-top: 10px;}
    .img-zoom {overflow: hidden;padding-right: 0 !important;padding-left: 0 !important;}
    .img-zoom img {transform: scale(1);-ms-transform: scale(1);-moz-transform: scale(1);-webkit-transform: scale(1);-o-transform: scale(1);-webkit-transition: all 0.7s ease-in-out;-moz-transition: all 0.7s ease-in-out;-ms-transition: all 0.7s ease-in-out;-o-transition: all 0.7s ease-in-out;}
    .img-zoom:hover img {transform: scale(1.05);-ms-transform: scale(1.05);-moz-transform: scale(1.05);-webkit-transform: scale(1.05);-o-transform: scale(1.05);}
    .owl-controls { margin-top: 0px !important;}
    .cube {border: 1px solid #0142a0;margin: 50px 40px 35px;padding: 20px;border-radius: 15px; font-family:FiraSans-Light;color:#7E7E80;font-size: 18px;}
    .cube span {color: #0142a0;font-size: 30px;}
    .intro-title {background-color: #E4F5FC;font-family: FiraSans-BoldItalic;color: #0142a0;font-size: 27px; display: flex; padding: 10px;border-radius: 10px;}
    .btn-volver {width: 265px;margin: 50px auto 20px;display: block;}
    .promess {text-align:center;margin-bottom: 38px;}
    .parrafo {font-family: FiraSans-Light;color: #7E7E80;padding-inline-start: 50px;font-size: 15px;}
    .parrafo span {font-family: HelveticaNeueItalic;color: #021F5B;font-size: 21px;font-weight: bold;margin-top: 30px;display: block;margin-bottom: 10px;}
    .lista {font-family:HelveticaNeueItalic;color: #021F5B;font-size: 21px;font-weight: bold;padding-inline-start: 70px;margin-top: 25px;}
    .lista li {margin-bottom: 16px;}
    .descuento {width: 100px;position: absolute;right: 55px;top: 33px;}
    .nombre-producto{font-family: FiraSans-Bold !important;margin-bottom: 0 !important;text-align: center;font-size: 22px !important;}
    .descrip-producto {color: #2F4A75 !important;text-align: center;display: block;font-size: 15px;line-height: 15px;margin: 10px 0;font-weight: bold;}
    .sub-title {font-family: HelveticaNeueItalic;color: #0E5D9C;font-size: 45px;letter-spacing: -1px;margin: 0;}
    .sub-title2 {font-family: HelveticaNeueItalic;color: #E41B34;font-size: 20px;margin: 0 0 0px 80px;}
    .sub-title2 span {font-weight: bold;font-size: 26px;}
    .precioproductos{color: #0142a0;font-family: FiraSans-Bold;text-align: center;font-size: 25px;margin: 0 0 15px  !important;line-height: 25px;}
    .precioproductos-antes{text-decoration: line-through;color: #0142a0;font-family: FiraSans-Bold;text-align: center;font-size: 25px;margin: 0 !important;line-height: 25px;}
  </style>
";
?>
<!--Precio productos-->
<?php $tensiometroP30Plus_20dcto = Producto::consultarPrecio('31897', $this->objSectorCiudad)?>
<?php $glucometroG30a_tiras_gratis = Producto::consultarPrecio('73213', $this->objSectorCiudad)?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
  <input type="hidden" id="cantidad-producto-unidad-31897" value="1" >
  <input type="hidden" id="cantidad-producto-unidad-73213" value="1" >
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-educate.jpg" alt="Educate sobre la diabetes">
<div style="margin: 0 20px;">
  <h1 class="title-main" style="font-size: 23px;margin-top: 15px;">PROGRAMA VIVE FELIZ <br>Y SALUDABLE</h1>
    <div class="cube" style="margin: 0;">
      <p style="margin: 0;"><span style="font-family:FiraSans-BoldItalic;margin-bottom: 15px;display: block;font-size: 24px;">¿Qué es la diabetes? </span> Es una enfermedad que no tiene cura, pero que se puede controlar.
      La diabetes se caracteriza por la elevación de los niveles de azúcar en la sangre (hiperglucemia) debido
      a la deficiencia en la producción de la insulina o a la resistencia a su acción en los tejidos del cuerpo.</p>
    </div>
    <div class="intro-title" style="margin-top: 25px;font-size: 25px;">
      <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
      <span>Clases de diabetes</span>
    </div>
    <p class="parrafo" style="padding-inline-start: 15px;"><span>Diabetes tipo I:</span>
    El cuerpo no produce insulina y el paciente debe
    aplicarse insulina como parte de su tratamiento.</p>
    <p class="parrafo" style="padding-inline-start: 15px;"> <span>Diabetes tipo II:</span>
    El cuerpo produce poca insulina o no la usa
    adecuadamente.</p>
    <p class="parrafo" style="padding-inline-start: 15px;"><span>Diabetes gestacional:</span>
    Este tipo de diabetes se puede presentar en cualquier
    momento cuando una mujer está embarazada,
    (usualmente entre la semana 24 y 28 de gestación).
    Lo normal es que después de haber terminado el
    embarazo desaparezca la diabetes, sin embargo, existe
    cierta tendencia a desarrollar diabetes tipo II años
    después.</p>
    <p class="parrafo" style="padding-inline-start: 15px;"><span>Otros tipos de diabetes:</span>
    Diabetes secundaria a efectos de medicamentos,
    desnutrición, infecciones, enfermedades pancreáticas,
    endocrinopatías, algunas patologías de origen genético,
    entre otras causas.
    </p>
    <div class="intro-title" style="line-height: 27px;margin-top: 25px;font-size: 25px;">
      <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
      <span>El manejo de su diabetes comprende:</span>
    </div>
    <ul class="lista" style="padding-inline-start: 25px;">
      <li>Mantener un estilo de vida saludable</li>
      <li>Hábitos de autocuidado</li>
      <li>Comer sano y balanceado</li>
      <li>Aprender todo lo que pueda sobre diabetes</li>
      <li>Hacer del ejercicio físico parte de su vida</li>
      <li>Tomar sus medicamentos de acuerdo con la recomendación <br>médica</li>
      <li> Realizarse automonitoreo (glucometrías) periódicamente</li>
      <li>Asistir a sus controles médicos con su equipo de salud</li>
    </ul>
    <div class="intro-title" style="line-height: 27px;margin-top: 25px;font-size: 25px;">
      <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
      <span>Algunos síntomas <br> asociados:</span>
    </div>
    <ul class="lista" style="padding-inline-start: 25px;">
      <li>Sed excesiva</li>
      <li>Visión borrosa</li>
      <li>Deseo de orinar frecuentemente</li>
      <li>Fatiga, sueño y cansancio</li>
      <li>Pérdida de peso</li>
      <li>Hambre excesiva</li>
      <li>Heridas que no cicatrizan</li>
    </ul>
    <div class="intro-title" style="line-height: 27px;margin-top: 25px;font-size: 25px;">
      <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
      <span>¿Por qué debo controlar mi diabetes?</span>
    </div>
    <p class="parrafo" style="margin-top: 30px;padding-inline-start: 5px;">Si su glucosa en sangre es elevada, usted está en riesgo de desarrollar complicaciones serias en:</p>
    <ul class="lista" style="padding-inline-start: 25px;">
      <li>El corazón</li>
      <li>Los ojos</li>
      <li>Los riñones</li>
      <li>Las extremidades inferiores</li>
    </ul>
    <div class="section-products" style="padding: 0;">
      <div class="bg-producto" style="padding: 25px;">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/tensiometro.png" alt="Tensiometro">
        <p class="nombre-producto" style="margin-bottom: 15px !important;">TENSIÓMETRO <br> P30 PLUS</p>
        <p class="precioproductos-antes">ANTES: <?= ($tensiometroP30Plus_20dcto == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus_20dcto["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($tensiometroP30Plus_20dcto == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus_20dcto["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 31897 )) ?>"><img class="img-responsive btn-comprar" style="width: 200px;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
      </div>
      <div class="bg-producto" style="padding: 25px;margin-top: 30px;">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/glucometro.png" alt="Glucometro">
        <p class="nombre-producto">OFERTA TIRAS GRATIS</p>
        <span class="descrip-producto">GLUCÓMETRO G30a <br> PARA MEDIR LA GLUCOSA.</span>
        <p class="precioproductos-antes">ANTES: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucometroG30a_tiras_gratis["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <p class="precioproductos">AHORA: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucometroG30a_tiras_gratis["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
        <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 73213 )) ?>"><img class="img-responsive btn-comprar" style="width: 200px;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
      </div>
    </div>
    <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/glucoquick-insumos-y-glucometro"><img class="btn-volver"  style="width: 205px;margin: 30px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-regresar.png"></a>
      <div class="promess">
        <h2 class="sub-title" style="font-size: 22px;">¡Nuestro compromiso es ayudarte!</h2>
        <h3 class="sub-title2" style="margin: 0;">Conoce nuestros servicios <span style="font-size: 22px;">de asesoría creados para ti.</span></h3>
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
<!--VERSION ESCRITORIO-->
<?php else: ?>
<input type="hidden" id="cantidad-producto-unidad-31897-1" value="1" >
<input type="hidden" id="cantidad-producto-unidad-73213-2" value="1" >
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/banner-educate.jpg" alt="Educate sobre la diabetes"></div>
<div class="container">
  <div style="margin: 0 100px;">
    <div class="row">
      <h1 class="title-main">PROGRAMA VIVE FELIZ Y SALUDABLE</h1>
      <div class="cube">
        <p><span style="font-family:FiraSans-BoldItalic;">¿Qué es la diabetes? </span> Es una enfermedad que no tiene cura, pero que se puede controlar. <br>
          La diabetes se caracteriza por la elevación de los niveles de azúcar en la sangre (hiperglucemia) debido <br>
          a la deficiencia en la producción de la insulina o a la resistencia a su acción en los tejidos del cuerpo.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="intro-title">
          <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
          <span>Clases de diabetes</span>
        </div>
          <p class="parrafo"><span>Diabetes tipo I:</span>
          El cuerpo no produce insulina y el paciente debe <br>
          aplicarse insulina como parte de su tratamiento.</p>
          <p class="parrafo"> <span>Diabetes tipo II:</span>
          El cuerpo produce poca insulina o no la usa <br>
          adecuadamente.</p>
          <p class="parrafo"><span>Diabetes gestacional:</span>
          Este tipo de diabetes se puede presentar en cualquier <br>
          momento cuando una mujer está embarazada, <br>
          (usualmente entre la semana 24 y 28 de gestación). <br>
          Lo normal es que después de haber terminado el <br>
          embarazo desaparezca la diabetes, sin embargo, existe <br>
          cierta tendencia a desarrollar diabetes tipo II años <br>
          después.</p>
          <p class="parrafo"><span>Otros tipos de diabetes:</span>
          Diabetes secundaria a efectos de medicamentos, <br>
          desnutrición, infecciones, enfermedades pancreáticas, <br>
          endocrinopatías, algunas patologías de origen genético, <br>
          entre otras causas.
          </p>
      </div>
      <div class="col-md-6">
        <div class="intro-title" style="line-height: 27px;">
          <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
          <span>El manejo de su diabetes comprende:</span>
        </div>
        <ul class="lista">
          <li>Mantener un estilo de vida <br> saludable</li>
          <li>Hábitos de autocuidado</li>
          <li>Comer sano y balanceado</li>
          <li>Aprender todo lo que pueda <br> sobre diabetes</li>
          <li>Hacer del ejercicio físico <br>parte de su vida</li>
          <li>Tomar sus medicamentos de <br> acuerdo con la recomendación <br>médica</li>
          <li> Realizarse automonitoreo <br>(glucometrías) periódicamente</li>
          <li>Asistir a sus controles médicos <br>con su equipo de salud</li>
        </ul>
      </div>
    </div>
    <div class="row" style="margin-top: 30px;">
      <div class="col-md-6">
        <div class="intro-title" style="line-height: 27px;">
          <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
          <span>Algunos síntomas <br> asociados:</span>
        </div>
        <ul class="lista">
          <li>Sed excesiva</li>
          <li>Visión borrosa</li>
          <li>Deseo de orinar frecuentemente</li>
          <li>Fatiga, sueño y cansancio</li>
          <li>Pérdida de peso</li>
          <li>Hambre excesiva</li>
          <li>Heridas que no cicatrizan</li>
        </ul>
      </div>
      <div class="col-md-6">
        <div class="intro-title" style="line-height: 27px;">
          <img width="35" height="35" style="margin-right:10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/bullet.png" >
          <span>¿Por qué debo controlar mi diabetes?</span>
        </div>
        <p class="parrafo" style="margin-top: 30px;">Si su glucosa en sangre es elevada, usted está en riesgo de desarrollar complicaciones serias en:</p>
        <ul class="lista">
          <li>El corazón</li>
          <li>Los ojos</li>
          <li>Los riñones</li>
          <li>Las extremidades inferiores</li>
        </ul>
      </div>
    </div>
    <div class="row section-products">
        <div class="col-sm-6 col-md-6">
          <div class="bg-producto">
            <img class="descuento" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/20-descuento.png" alt="20% descuento Tensiometro P30 plus">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/tensiometro.png" alt="Tensiometro">
            <p class="nombre-producto" style="margin-bottom: 50px !important;">TENSIÓMETRO P30 PLUS</p>
            <p class="precioproductos-antes">ANTES: <?= ($tensiometroP30Plus_20dcto == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus_20dcto["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="precioproductos">AHORA: <?= ($tensiometroP30Plus_20dcto == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $tensiometroP30Plus_20dcto["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 31897 )) ?>"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="bg-producto">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/producto/glucometro.png" alt="Glucometro">
            <p class="nombre-producto">OFERTA TIRAS GRATIS</p>
            <span class="descrip-producto">GLUCÓMETRO G30a <br> PARA MEDIR LA GLUCOSA.</span>
            <p class="precioproductos-antes">ANTES: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucometroG30a_tiras_gratis["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="precioproductos">AHORA: <?= ($glucometroG30a_tiras_gratis == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $glucometroG30a_tiras_gratis["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 73213 )) ?>"><img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-comprar.png" alt="GlucoQuick"></a>
          </div>
        </div>
      </div>
      <div class="row">
        <a href="<?= Yii::app()->request->baseUrl ?>/glucoquick-insumos-y-glucometro"><img class="btn-volver" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/glucoquick/btn-regresar.png"></a>
      </div>
      <div class="row promess">
        <h2 class="sub-title">¡Nuestro compromiso es ayudarte!</h2>
        <h3 class="sub-title2">Conoce nuestros servicios <span>de asesoría creados para ti.</span></h3>
      </div>
  </div>
</div>
<section class="programa-hora">
  <span class="span1">Ahora comprando en </span><span class="span2">larebajavirtual.com</span><span class="span3">, programa tu hora y lugar de entrega </span><img width="50" style="margin-left:6px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
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
