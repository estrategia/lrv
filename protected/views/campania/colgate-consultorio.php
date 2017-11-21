<?php $this->pageTitle = "Colgate uso en consultorio - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Descubre aquí que productos profesionales de alta tecnología ha diseñado
Colgate para el cuidado oral de sus pacientes.'>
  <meta name='keywords' content='Productos profesionales colgate, colgate periogard, colgate duraphat, colgate
profesional, enjuague antibacteriano colgate, crema dental barniz, productos
para profesionales de la odontología.'>
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
    .title-intro span {font-size:23px;color:#FF0304;}
    .title-intro::before {position: absolute;content: '';top: 110%;left: 32%;height: 6px;width: 35%;opacity: 0.4;background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, transparent 80%);background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, transparent 80%);}
    .img-responsive.producto {width: 350px;margin: 0 auto;}
    .nombre-producto {font-family:ColgateReady-Light;text-align:center;color:#A0A0A0;font-size: 19px;}
    .componente {font-family:ColgateReady-Light;text-align:center;color:#FF0304;font-size: 17px;text-transform: uppercase;font-weight: bold;}
    .descripcion {color:#3C3C3B;text-align:center;font-family:ColgateReady-Light;font-size:14px;margin-top: 25px;}
    .beneficios {padding-inline-start: 120px;color:#3C3C3B;font-family:ColgateReady-Light;font-size:14px;margin-top: 30px;margin-bottom: 25px;}
    .column::before {position: absolute;content: '';top: 105%;height: 6px;width: 80%;opacity: 0.4;background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, transparent 80%);background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, transparent 80%);}
    .btn-compra{margin:0 auto;width: 330px;}
    .texto-legal{font-family:ColgateReady-Light;color:#3C3C3B;text-align:center;font-size: 10px;margin-top: 35px;}
</style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner/banner-consultorio.jpg" alt="Compra online">
<div class="menu-colgate" style="flex-direction: column;padding: 0 5px;">
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-profesional"><img style="margin: 0 auto;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-gingivitis"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-sensibilidad"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-prevencion-caries"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-blanqueamiento-para-pacientes"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-ortodoncia"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-para-pequenos-pacientes"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png';"></a>
</div>
<div style="padding:0 15px;">
<h1 class="title-intro" style="font-size: 20px;">Porque existen condiciones y situaciones clínicas
que usted tiene que manejar con mayor precaución, <br>
<span style="font-size: 17px;">Colgate ha diseñado productos seguros
y eficaces para uso en su consultorio</span></h1>
<img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/1-consultorios/periogard-colgate.png" alt="Periogard colgate">
<h2 class="nombre-producto">ENJUAGUE BUCAL</h2>
<h3 class="componente" style="margin-bottom: 0px;line-height: 17px;">Colgate<sup>®</sup> Periogard<sup>®</sup> <br> Clorhexidina 0,12% <br> &nbsp;</h3>
<p class="descripcion" style="margin-top: 0px;">Enjuague antibacteriano con seguridad y efectividad comprobadas en el control de la gingivitis y prevención de la periodontitis. </p>
<ul class="beneficios" style="padding-inline-start: 40px;">
  <li>Concentración suficientemente efectiva que puede dejar menos pigmentaciones secundarias que concentraciones mayores.</li>
</ul>
<img class="img-responsive-m"  style="margin-top:30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/1-consultorios/duraphat-colgate-mobile.png" alt="Duraphat colgate">
<h2 class="nombre-producto" style="margin-top: -10px;">CREMA DENTAL</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE<sup>®</sup> DURAPHAT<sup>®</sup> Barniz <br>de Fluoruro de Sodio al 5% </h3>
<p class="descripcion" style="margin-top: 0px;">Barniz con 22.600 ppm de fluoruro para  uso profesional  en la clínica  y en programas comunitarios. </p>
<ul class="beneficios" style="padding-inline-start: 40px;" >
  <li>Aplicación fácil y Rápida.</li>
  <li> Permite un control visual durante la aplicación.</li>
  <li>Alta efectividad / bajo costo.</li>
  <li>Seguro (Alta efectividad tópica/bajo riesgo sistémico).</li>
  <li>Cómodo y aceptado por el paciente.</li>
</ul>
<a href="#" data-ajax="false"><img class="img-responsive-m" style="width: 250px;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/compra-online.png" alt="Compra online"></a>
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
 --><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner/banner-consultorio.jpg" alt="Compra online">
<nav class="menu">
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-profesional"><img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-gingivitis"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-sensibilidad"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-prevencion-caries"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-blanqueamiento-para-pacientes"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-ortodoncia"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-para-pequenos-pacientes"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos.png';"></a></item>
</nav>
<div class="container">
  <div class="row">
    <h1 class="title-intro">Porque existen condiciones y situaciones clínicas <br>
    que usted tiene que manejar con mayor precaución, <br>
    <span>Colgate ha diseñado productos seguros <br>
    y eficaces para uso en su consultorio</span></h1>
  </div>
  <div class="row">
    <div class="column col-sm-6 col-md-6">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/1-consultorios/periogard-colgate.png" alt="Periogard colgate">
      <h2 class="nombre-producto">ENJUAGUE BUCAL</h2>
      <h3 class="componente">Colgate<sup>®</sup> Periogard<sup>®</sup> Clorhexidina 0,12% <br> &nbsp;</h3>
      <p class="descripcion">Enjuague antibacteriano con seguridad <br>
        y efectividad comprobadas en el control de <br>
        la gingivitis y prevención de la periodontitis. <br>
      </p>
      <ul class="beneficios">
        <li>Concentración suficientemente efectiva que puede <br>dejar menos pigmentaciones secundarias que <br> concentraciones mayores.</li>
        <br>
      </ul>
    </div>
    <div class="column col-sm-6 col-md-6">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/1-consultorios/duraphat-colgate.png" alt="Duraphat colgate">
      <h2 class="nombre-producto">CREMA DENTAL</h2>
      <h3 class="componente">COLGATE<sup>®</sup> DURAPHAT<sup>®</sup> Barniz de Fluoruro <br>de Sodio al 5% </h3>
      <p class="descripcion">Barniz con 22.600 ppm de fluoruro para  uso <br> profesional  en la clínica  y en programas comunitarios. </p>
      <ul class="beneficios">
        <li>Aplicación fácil y Rápida.</li>
        <li> Permite un control visual durante la aplicación.</li>
        <li>Alta efectividad / bajo costo.</li>
        <li>Seguro (Alta efectividad tópica/bajo riesgo sistémico).</li>
        <li>Cómodo y aceptado por el paciente.</li>
      </ul>
    </div>
  </div>
  <div class="row" style="margin-top: 65px;">
    <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3604)) ?>"><img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/compra-online.png" alt="Compra online"></a>
    <p class="texto-legal">Texto legal: Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid </p>
  </div>
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
