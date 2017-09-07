<?php $this->pageTitle = "Colgate para pequeños pacientes - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Conozca aquí la variedad de productos que ofrece Colgate para motivar a los niños a cepillarse y promoverles buenos hábitos de higiene oral.'>
  <meta name='keywords' content='Productos profesionales colgate, productos para motivar a los niños a cepillarse, colgate smiles,  colgate minions,  productos para profesionales de la odontología.'>
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
    .texto-legal{font-family:ColgateReady-Light;color:#3C3C3B;text-align:center;font-size: 10px;}
    sup {font-size: 10px !important;top: -.9em !important;}
</style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner/banner-pequenos.png" alt="Compra online">
<div class="menu-colgate" style="flex-direction: column;padding: 0 5px;">
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-profesional"><img style="margin: 0 auto;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-gingivitis"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-sensibilidad"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-prevencion-caries"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-blanqueamiento-para-pacientes"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-ortodoncia"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png';"></a>
  <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/colgate-para-pequenos-pacientes"><img style="margin: 0 auto;display: block;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';"></a>
</div>
<div style="padding:0 15px;">
<h1 class="title-intro" style="font-size: 20px;">PROMUEVA EN SUS <br>PEQUEÑOS PACIENTES<br>
<span style="font-size: 17px;">LOS BUENOS HÁBITOS DE HIGIENE ORAL<br>¡Diseñados para motivar a los niños <br>a cepillarse!</span></h1>
<img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/colgate-smiles-bob-esponja.png">
<h2 class="nombre-producto">CEPILLO DE DIENTES</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE<sup>®</sup> SMILES<br>BOB ESPONJA<sup>TM</sup> 2-5 AÑOS</h3>
<p class="descripcion" style="margin-top: 0px;">  Recomendado para niños de 2-5 años.</p>
<ul class="beneficios" style="padding-inline-start: 20px;">
  <li style="margin-bottom:15px;">Cerdas extra suaves en varios niveles que alcanzan todos los dientes, incluyendo las molares difíciles de alcanzar.</li>
  <li  style="margin-bottom:15px;">Cerdas coloridas en el centro que indican la cantidad recomendada de crema dental.</li>
  <li> Cabeza pequeña y con forma ovalada, con suaves materiales que protegen la encía de los niños.</li>
</ul>
<img class="img-responsive-m"  style="margin-top:30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/colgate-smiles-barbie.png" >
<h2 class="nombre-producto">CEPILLO DE DIENTES</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE<sup>®</sup> SMILES<br>BARBIE<sup>TM</sup> 2-5 AÑOS</h3>
<p class="descripcion" style="margin-top: 0px;">Recomendado para niños de 2-5 años.</p>
<ul class="beneficios" style="padding-inline-start: 40px;" >
  <li style="margin-bottom:15px;">Cerdas extra suaves en varios niveles que alcanzan todos los dientes, incluyendo las molares difíciles de alcanzar.</li>
  <li  style="margin-bottom:15px;">Cerdas coloridas en el centro que indican la cantidad recomendada de crema dental.</li>
  <li> Cabeza pequeña y con forma ovalada, con suaves materiales que protegen la encía de los niños.</li>
</ul>
<img class="img-responsive-m"  style="margin-top:30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/colgate-smiles-ninos.png">
<h2 class="nombre-producto" style="margin-top: 10px;">CEPILLO DE DIENTES</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE® MINIONSTM  6+ AÑOS </h3>
<p class="descripcion" style="margin-top: 0px;">Especialmente diseñado para niños <br>que tienen una combinación <br>de dientes temporales y permanentes.</p>
<ul class="beneficios" style="padding-inline-start: 40px;" >
  <li style="margin-bottom:15px;">Limpiador de lengua suave en la parte posterior de la cabeza del cepillo, para ayudar a crear buenos hábitos de salud bucal desde una edad temprana.</li>
  <li style="margin-bottom:15px;">Cabeza pequeña con materiales suaves y cerdas extra suaves que ayudan a proteger la encía de los niños.</li>
  <li style="margin-bottom:15px;"> Cerdas multi-nivel para limpiar dientes pequeños y grandes.</p>
  <li>Cómodo mango y base de succión divertida para poder poner de pie el cepillo.</li>
</ul>
<img style="margin-top:20px;" class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/crema-dientes-smile-barbie.png">
<h2 class="nombre-producto">CREMA DENTAL</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE<sup>®</sup> SMILES<br>BARBIE<sup>TM</sup> 2-5 AÑOS</h3>
<p class="descripcion" style="margin-top: 0px;">  Recomendado para niños de 2 a 5 años.</p>
<ul class="beneficios" style="padding-inline-start: 20px;">
  <li style="margin-bottom:15px;">Con flúor para niños.</li>
  <li  style="margin-bottom:15px;">Delicioso sabor Tutti-Frutti.</li>
  <li> Con el personaje de Barbie que motiva a las niñas a cepillarse.</li>
</ul>
<img class="img-responsive-m"  style="margin-top:30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/crema-dientes-smile-bobs-sponja.png" >
<h2 class="nombre-producto">CREMA DENTAL</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE<sup>®</sup> SMILES<br>BOB ESPONJA<sup>TM</sup> 2-5 AÑOS</h3>
<p class="descripcion" style="margin-top: 0px;">  Recomendado para niños de 2 a 5 años.</p>
<ul class="beneficios" style="padding-inline-start: 20px;">
  <li style="margin-bottom:15px;">Con flúor para niños.</li>
  <li  style="margin-bottom:15px;">Delicioso sabor Tutti-Frutti.</li>
  <li> Con el personaje de  Bob Esponja que motiva a las niños a cepillarse.</li>
</ul>
<img class="img-responsive-m"  style="margin-top:30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/enjuague-colgate-minions.png">
<h2 class="nombre-producto" style="margin-top: 10px;">ENJUAGUE BUCAL</h2>
<h3 class="componente" style="line-height: 17px;">COLGATE® MINIONS<sup>TM</sup></h3>
<p class="descripcion" style="margin-top: 0px;">Enjuague bucal con flúor que ayuda a fortalecer el esmalte y brinda protección anti caries. Ahora presentado por los personajes favoritos de sus pequeños pacientes, los minions!.</p>
<ul class="beneficios" style="padding-inline-start: 40px;" >
  <li style="margin-bottom:15px;">Limpia toda la boca, eliminando las partículas que pudieron haber quedado después del cepillado.</li>
  <li style="margin-bottom:15px;">Fun Bello™ Bubble Fruit®, con sabor a chicle de frutas que los niños disfrutarán.</li>
</ul>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3602)) ?>" data-ajax="false"><img class="img-responsive-m" style="width: 250px;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/compra-online.png" alt="Compra online"></a>
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
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3602)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/btn-fijo.png" alt="Compra online"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/banner/banner-pequenos.png" alt="Compra online">
<nav class="menu">
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-profesional"><img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio-active.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/uso-consultorio.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-gingivitis"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/gingivitis.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-sensibilidad"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/sensibilidad.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-prevencion-caries"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/caries.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-blanqueamiento-para-pacientes"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/blanqueamiento.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-pacientes-con-ortodoncia"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/ortodoncia.png';"></a></item>
  <item><a href="<?= Yii::app()->request->baseUrl ?>/colgate-para-pequenos-pacientes"><img class="img-responsive" style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png" onmouseover="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';" onmouseout="this.src='<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/pequenos-hover.png';"></a></item>
</nav>
<div class="container">
  <div class="row">
    <h1 class="title-intro">PROMUEVA EN SUS PEQUEÑOS PACIENTES <br>
    <span>LOS BUENOS HÁBITOS DE HIGIENE ORAL <br>¡Diseñados para motivar a los niños a cepillarse!</span></h1>
  </div>
  <div class="row">
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/colgate-smiles-bob-esponja.png" alt="Colgate-smiles-bob-esponja">
      <h2 class="nombre-producto">CEPILLO DE DIENTES</h2>
      <h3 class="componente">COLGATE<sup>®</sup> SMILES<br>BOB ESPONJA<sup>TM</sup> 2-5 AÑOS</h3>
      <p class="descripcion">Recomendado para niños de 2-5 años.</p>
      <ul class="beneficios" style="padding-inline-start: 64px;margin-bottom: 137px;">
        <li style="margin-bottom: 10px;">Cerdas extra suaves en varios niveles <br>que alcanzan todos los dientes, <br>incluyendo las molares difíciles de alcanzar.</li>
        <li style="margin-bottom: 10px;">Cerdas coloridas en el centro que indican <br>la cantidad recomendada de crema dental.</li>
        <li>Cabeza pequeña y con forma ovalada, <br>con suaves materiales que protegen <br>la encía de los niños.</li>
      </ul>
    </div>
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/colgate-smiles-barbie.png" alt="colgate-plaxsoftmint-sin-alcohol">
      <h2 class="nombre-producto">CEPILLO DE DIENTES</h2>
      <h3 class="componente">COLGATE<sup>®</sup> SMILES<br>BARBIE <sup>TM</sup> 2-5 AÑOS</h3>
      <p class="descripcion">Recomendado para niños de 2-5 años.</p>
      <ul class="beneficios" style="padding-inline-start: 83px;margin-bottom: 136px;">
        <li style="margin-bottom: 10px;">Cerdas extra suaves en varios niveles <br>que alcanzan todos los dientes, <br>incluyendo las molares difíciles de alcanzar.</li>
        <li style="margin-bottom: 10px;">Cerdas coloridas en el centro que indican <br>la cantidad recomendada de crema dental.</li>
        <li>Cabeza pequeña y con forma ovalada, <br>con suaves materiales que protegen <br>la encía de los niños.</li>
      </ul>
    </div>
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/colgate-smiles-ninos.png" alt="colgate-smiles-ninos">
      <h2 class="nombre-producto">CEPILLO DE DIENTES</h2>
      <h3 class="componente">COLGATE<sup>®</sup> MINIONS<sup>TM</sup> 6+ AÑOS <br> &nbsp; </h3>
      <p class="descripcion">Especialmente diseñado para niños <br>que tienen una combinación <br>de dientes temporales y permanentes.</p>
      <ul class="beneficios" style="padding-inline-start: 53px;">
        <li style="margin-bottom: 10px;">Limpiador de lengua suave en la parte <br>posterior de la cabeza del cepillo, para  <br>ayudar a crear buenos hábitos de salud <br>bucal desde una edad temprana. </li>
        <li style="margin-bottom: 10px;"> Cabeza pequeña con materiales suaves <br>y cerdas extra suaves que ayudan <br>a proteger la encía de los niños.</li>
        <li style="margin-bottom: 10px;">Cerdas multi-nivel para limpiar dientes <br> pequeños y grandes.</li>
        <li>Cómodo mango y base de succión <br>divertida para poder poner de pie el cepillo.</li>
      </ul>
    </div>
  </div>
  <div class="row" style="margin-top: 10%;">
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/crema-dientes-smile-barbie.png" alt="crema-dientes-smile-barbie">
      <h2 class="nombre-producto">CREMA DENTAL</h2>
      <h3 class="componente">COLGATE<sup>®</sup> SMILES BARBIE<sup>TM</sup> 2-5 AÑOS</h3>
      <p class="descripcion">Recomendado para niños de 2-5 años.</p>
      <ul class="beneficios" style="padding-inline-start: 64px;margin-bottom: 96px;">
        <li style="margin-bottom: 10px;">Con flúor para niños.</li>
        <li style="margin-bottom: 10px;">Delicioso sabor Tutti-Frutti.</li>
        <li>Con el personaje de Barbie que motiva <br> a las niñas a cepillarse.</li>
      </ul>
    </div>
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/crema-dientes-smile-bobs-sponja.png" alt="crema-dientes-smile-bobs-sponja">
      <h2 class="nombre-producto">CREMA DENTAL</h2>
      <h3 class="componente">COLGATE<sup>®</sup> SMILES BOB ESPONJA<sup>TM</sup>  2-5 AÑOS</h3>
      <p class="descripcion">Recomendado para niños de 2-5 años.</p>
      <ul class="beneficios" style="padding-inline-start: 83px;margin-bottom: 75px;">
        <li style="margin-bottom: 10px;">Con flúor para niños.</li>
        <li style="margin-bottom: 10px;">Delicioso sabor Tutti-Frutti.</li>
        <li>Con el personaje de Bob Esponja que motiva  a los niños a cepillarse.</li>
      </ul>
    </div>
    <div class="column col-sm-4 col-md-4">
      <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/7-pequenos-pacientes/enjuague-colgate-minions.png" alt="enjuague-colgate-minions">
      <h2 class="nombre-producto">ENJUAGUE BUCAL</h2>
      <h3 class="componente">COLGATE<sup>®</sup> MINIONS<sup>TM</sup></h3>
      <p class="descripcion">Enjuague bucal con flúor que ayuda a <br>fortalecer el esmalte y brinda protección anti caries. <br>Ahora presentado por los personajes <br>favoritos de sus pequeños pacientes, los minions!.</p>
      <ul class="beneficios" style="padding-inline-start: 53px;">
        <li style="margin-bottom: 10px;">Limpia toda la boca, eliminando las partículas que pudieron haber quedado después del cepillado.</li>
        <li style="margin-bottom: 10px;"> Fun Bello™ Bubble Fruit®, con sabor a chicle de frutas que los niños disfrutarán.</li>
      </ul>
    </div>
  </div>
  <div class="row" style="margin-top: 65px;">
    <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3602)) ?>"><img class="img-responsive btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/colgate/compra-online.png" alt="Compra online"></a>
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
