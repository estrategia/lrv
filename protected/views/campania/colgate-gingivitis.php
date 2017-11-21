<?php $this->pageTitle = "Colgate pacientes con gingivitis - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Encuentra en este link los productos especializados para profesionales de la odontología que ofrece Colgate para el cuidado gingival.'>
  <meta name='keywords' content='Productos profesionales colgate, productos para el cuidado gingival, crema dental colgate total 12, enjuague antibacteriano colgate, cepillo de dientes slimsoft,  productos para profesionales de la odontología.'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/ky/fonts/MyriadPro.otf);}
    @font-face {font-family:Frutiger-LT-Std-Condensed;src: url(".Yii::app()->request->baseUrl."/images/contenido/colgate/fonts/Frutiger-LT-Std-Condensed.ttf);}
    @font-face {font-family:Frutiger-LT-Std-Bold-Condensed;src: url(".Yii::app()->request->baseUrl."/images/contenido/colgate/fonts/Frutiger-LT-Std-Bold-Condensed.ttf);}
    @font-face {font-family:ColgateReady-Light;src: url(".Yii::app()->request->baseUrl."/images/contenido/colgate/fonts/ColgateReady-Light.otf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 200px;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .menu {display: flex;width: 100%;padding: 0px 30px 15px;}
    item {flex-grow: 1;}
    .title-intro {margin-bottom:80px;font-family:Frutiger-LT-Std-Condensed;text-align:center;text-transform:uppercase;color: #A0A0A0;font-size: 28px;font-weight: inherit;margin-top: 60px;position:relative;}
    .title-intro span {font-size: 23px;color: #FF0304;}
    .title-intro::before {position: absolute;content: '';top: 110%;left: 32%;height: 6px;width: 35%;opacity: 0.4;background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, transparent 80%);background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, transparent 80%);}
    .img-responsive.producto {width: 350px;margin: 0 auto;}
    .nombre-producto {font-family:ColgateReady-Light;text-align:center;color:#A0A0A0;font-size: 19px;}
    .componente {font-family:ColgateReady-Light;text-align:center;color:#FF0304;font-size: 17px;text-transform: uppercase;font-weight: bold;}
    .descripcion {color:#3C3C3B;text-align:center;font-family:ColgateReady-Light;font-size:14px;margin-top: 25px;}
    .beneficios {padding-inline-start: 120px;color:#3C3C3B;font-family:ColgateReady-Light;font-size:14px;margin-top: 30px;margin-bottom: 25px;}
    .column::before {position: absolute;content: '';top: 105%;height: 6px;width: 80%;opacity: 0.4;background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, transparent 80%);background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, transparent 80%);}
    .btn-compra{margin:0 auto;width: 330px;}
    .texto-legal{font-family:ColgateReady-Light;color:#3C3C3B;text-align:center;font-size: 10px;}
</style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner/banner-gingivitis.jpg" alt="Compra online">
<div class="menu-colgate" style="flex-direction: column;padding: 0 5px;">
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-profesional"><img style="margin: 0 auto;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-gingivitis"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-sensibilidad"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-prevencion-caries"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-blanqueamiento-para-pacientes"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-ortodoncia"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-para-pequenos-pacientes"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png';"></a>
</div>
<div style="padding:0 15px;">
<h1 class="title-intro" style="font-size: 20px;">OFREZCA A SUS PACIENTES <br>UN PORTAFOLIO <br>
<span style="font-size: 17px;">ESPECIALIZADO PARA EL CUIDADO GINGIVAL </span></h1>
<img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/2-gingivitis/colgate-encias-saludables-mobile.png" alt="Colgate encias saludables">
<h2 class="nombre-producto">CREMA DENTAL</h2>
<h3 class="componente" style="line-height: 17px;">Colgate<sup>®</sup> TOTAL 12 <br>PROFESSIONAL ENCÍAS SALUDABLES</h3>
<p class="descripcion" style="margin-top: 0px;">Científicamente desarrollada para ayudar a los profesionales y a los pacientes a controlar la biopelícula bacteriana y la inflamación gingival. </p>
<ul class="beneficios" style="padding-inline-start: 40px;">
  <li style="margin-bottom:15px;">Combate la causa principal del sangrado gingival reduciendo las bacterias de la placa bacteriana.</li>
  <li>Protección antibacteriana completa para sus pacientes hasta por 12 horas, aun después de comer y beber.</li>
</ul>
<img class="img-responsive-m"  style="margin-top:30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/2-gingivitis/colgate-periogard.png" alt="Colgate periogard">
<h2 class="nombre-producto" style="margin-top: 10px;">ENJUAGUE BUCAL</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE<sup>®</sup> Periogard<sup>®</sup> <br>Clorhexidina 0,12%  </h3>
<p class="descripcion" style="margin-top: 0px;">Enjuague antibacteriano con seguridad y efectividad comprobadas en el control de la gingivitis y prevención de la periodontitis. </p>
<ul class="beneficios" style="padding-inline-start: 40px;" >
  <li>Concentración suficientemente efectiva que puede dejar menos pigmentaciones secundarias que concentraciones mayores.</li>
</ul>
<img class="img-responsive-m"  style="margin-top:30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/2-gingivitis/colgate-slimsoft.png" alt="Colgate slimsoft">
<h2 class="nombre-producto" style="margin-top: 10px;">CEPILLO DE DIENTES</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE<sup>®</sup> SLIMSOFT<sup>TM</sup> COMPACT</h3>
<p class="descripcion" style="margin-top: 0px;">Cerdas cónicas ultrasuaves 17 veces más delgadas*. </p>
<ul class="beneficios" style="padding-inline-start: 40px;" >
  <li style="margin-bottom:15px;">6 veces más acceso subgingival*</li>
  <li style="margin-bottom:15px;">2.5 veces más reducción de placa interproximal*.</li>
  <li style="margin-bottom:15px;">Cabeza pequeña y delgada para alcanzar áreas difíciles.</li>
  <li style="margin-bottom:15px;">Cuello delgado y flexible, absorbe presióncuando el cepillado es fuerte*.</li>
  <p>*vs. un cepillo regular de cerdas de corte plano con puntas redondeadas.</p>
</ul>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3604)) ?>" data-ajax="false"><img class="img-responsive-m" style="width: 250px;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/compra-online.png" alt="Compra online"></a>
<img class="img-responsive-m" style="margin-top: 20px;margin-bottom: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner-segundario.png" alt="Compra online">
<p class="texto-legal">Texto legal: Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid </p>
</div>
<hr>
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
<!--Versión escritorio-->
<?php else: ?>
<!-- <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3604)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/btn-fijo.png" alt="Compra online"></div></a>
 --><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner/banner-gingivitis.jpg" alt="Compra online">
<nav class="menu">
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-profesional"><img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-gingivitis"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-sensibilidad"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-prevencion-caries"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-blanqueamiento-para-pacientes"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-ortodoncia"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-para-pequenos-pacientes"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png';"></a></item>
</nav>
<div class="container">
  <div class="row">
    <h1 class="title-intro">Ofrezca a sus pacientes un portafolio <br>
    <span>especializado para el cuidado gingival</span></h1>
  </div>
  <div class="row">
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/2-gingivitis/colgate-encias-saludables.png" alt="Colgate encias saludables">
      <h2 class="nombre-producto">CREMA DENTAL</h2>
      <h3 class="componente">COLGATE<sup>®</sup> total 12<br>PROFESSIONAL ENCÍAS SALUDABLES</h3>
      <p class="descripcion">Científicamente desarrollada para ayudar <br>
      a los profesionales y a los pacientes a controlar <br>
      la biopelícula bacteriana y la inflamación gingival.
      </p>
      <ul class="beneficios" style="padding-inline-start: 25px;margin-bottom: 87px;">
        <li style="margin-bottom: 10px;">Combate la causa principal del sangrado gingival <br> reduciendo las bacterias de la placa bacteriana.</li>
        <li> Protección antibacteriana completa para sus <br>pacientes hasta por 12 horas, aun después <br> de comer y beber.</li>
      </ul>
    </div>
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/2-gingivitis/colgate-periogard.png" alt="Colgate periogard">
      <h2 class="nombre-producto">ENJUAGUE BUCAL</h2>
      <h3 class="componente">COLGATE<sup>®</sup> Periogard<sup>®</sup><br>Clorhexidina 0,12%  </h3>
      <p class="descripcion">Enjuague antibacteriano con seguridad <br>
        y efectividad comprobadas en el control de <br>
        la gingivitis y prevención de la periodontitis. </p>
      <ul class="beneficios" style="padding-inline-start: 45px;margin-bottom: 137px;">
        <li>Concentración suficientemente efectiva <br>
        que puede dejar menos pigmentaciones <br>
        secundarias que concentraciones mayores.</li>
      </ul>
    </div>
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/2-gingivitis/colgate-slimsoft.png" alt="Colgate Slimsoft">
      <h2 class="nombre-producto">CEPILLO DE DIENTES</h2>
      <h3 class="componente">COLGATE<sup>®</sup> SLIMSOFT<sup>TM</sup> COMPACT <br> &nbsp;</h3>
      <p class="descripcion">Cerdas cónicas ultrasuaves <br>17 veces más delgadas*.</p>
      <ul class="beneficios" style="padding-inline-start: 53px;margin-bottom: 15px;">
        <li>6 veces más acceso subgingival*.</li>
        <li> 2.5 veces más reducción de placa <br>interproximal*.</li>
        <li>Cabeza pequeña y delgada para <br> alcanzar áreas difíciles.</li>
        <li>Cuello delgado y flexible, absorbe <br>presión cuando el cepillado es fuerte*.</li>
      </ul>
      <p class="beneficios" style="padding-inline-start: 42px;font-size: 13px;margin-top: 12px;">*vs. un cepillo regular de cerdas de corte plano <br>con puntas redondeadas.</p>
    </div>
  </div>
  <div class="row" style="margin-top: 65px;">
    <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3604)) ?>"><img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/compra-online.png" alt="Compra online"></a>
  </div>
</div>
<div class="row">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner-segundario.png" alt="Compra online">
</div>
<div class="container">
  <p class="texto-legal">Texto legal: Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid </p>
</div>
<hr>
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
<!--Fin versión escritorio -->
<?php endif; ?>
