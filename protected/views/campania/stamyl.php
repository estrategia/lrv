<?php $this->pageTitle = "Stamyl - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Stamyl Forte es un digestivo y antiflatulento que ayuda a mejorar la digestión de proteínas, carbohidratos y grasas y reduce la flatulencia.'>
  <meta name='keywords' content='flatulencia, llenura, inflamación de estómago y gases.'>
  <style>
    @font-face {font-family:gabriel-sans-cond-bold-italic; src: url(".Yii::app()->request->baseUrl."/images/contenido/stamyl/fonts/gabriel-sans-cond-bold-italic.OTF);}
    @font-face {font-family:gabriel-sans-cond-medium-italic; src: url(".Yii::app()->request->baseUrl."/images/contenido/stamyl/fonts/gabriel-sans-cond-medium-italic.OTF);}
    @font-face {font-family:HelveticaNeueLTStd; src: url(".Yii::app()->request->baseUrl."/images/contenido/stamyl/fonts/HelveticaNeueLTStd-MdCn_1.otf);}
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 260px;}
    .degrade {margin-top: -20px;height:70px;background: rgba(240,129,47,0.5);background: -moz-linear-gradient(top, rgba(240,129,47,0.5) 0%, rgba(255,255,255,1) 100%);background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(240,129,47,0.5)), color-stop(100%, rgba(255,255,255,1)));background: -webkit-linear-gradient(top, rgba(240,129,47,0.5) 0%, rgba(255,255,255,1) 100%);background: -o-linear-gradient(top, rgba(240,129,47,0.5) 0%, rgba(255,255,255,1) 100%);background: -ms-linear-gradient(top, rgba(240,129,47,0.5) 0%,rgba(255,255,255,1)100%);background: linear-gradient(to bottom, rgba(240,129,47,0.5) 0%, rgba(255,255,255,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0812f', endColorstr='#ffffff', GradientType=0 );}
    .producto:hover {-ms-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);-webkit-transition: ease-out 1s;}
    .compra-online{width: 40%;margin: 0 auto;display: block;}
    .square {border: 4px solid #EC8332;border-radius: 35px;padding: 35px 35px 15px;width: 80%;margin: 45px auto 20px;-webkit-box-shadow: -1px 1px 6px 1px rgba(0,0,0,0.4);-moz-box-shadow: -1px 1px 6px 1px rgba(0,0,0,0.4);box-shadow: -1px 1px 6px 1px rgba(0,0,0,0.4);}
    .line {display:flex;align-items: center;font-family:gabriel-sans-cond-bold-italic;color: #50884B;font-size: 25px;line-height: 25px;margin-bottom: 18px;}
    .texto {font-family: gabriel-sans-cond-medium-italic;text-align: center;color: #617F50;font-size: 23px;line-height: 24px;margin-top: 38px;}
    .text-legal {font-family: HelveticaNeueLTStd;color: #222220;text-align: center;font-size: 15px;border-top: 1px solid #617F50;border-bottom: 1px solid #617F50;padding: 15px 0;margin-top: 45px;}
    .ico-check {align-self: flex-start;width: 30px;margin-right: 10px;}
    .short-line{width: 15%;height: 1px;background-color: #617F50;margin: 20px auto;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FF3C00;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
  </style>
  ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Version movil-->
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/banner.jpg" alt="Stamyl el digestivo y antiflatulento a la vez">
<div class="degrade" style="height: 50px;"></div>
<div style="padding:0 15px;">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/titulo.png" alt="El places de comer, sin que  nada te pase">
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 106604 )) ?>" data-ajax="false"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/stamyl-forte.png" alt="Stamyl forte"></a>
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 34796 )) ?>" data-ajax="false"><img class="img-responsive-m" style="margin-top: -68px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/stamyl-grajeas.png" alt="Stamyl forte"></a>
</div>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=STAMYL" data-ajax="false"><img class="compra-online" style="width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/compra-online.png" alt="Compra online Stamyl forte"></a>
<div class="square" style="width: 65%;padding: 29px;">
  <div class="line" style="font-size: 19px;">
    <img class="ico-check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/check.png">
    <p style="margin: 0;">Ayuda a mejorar la digestión de proteínas carbohidratos y grasas.</p>
  </div>
  <div class="line" style="font-size: 19px;margin:0px;">
    <img class="ico-check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/check.png">
    <p style="margin: 0;">Reduce la flatulencia.</p>
  </div>
</div>
<div style="padding:0 15px;">
  <p class="texto">Alivio temporal y sintomático de los trastornos digestivos por deficiencia de enzimas digestivas. Anti flatulento.</p>
  <p class="text-legal">
  Es un medicamento. No exceder su consumo. Leer indicaciones y contraindicaciones en la etiqueta. Si los síntomas
  persisten consulte a su médico. Reg. Sanitario INVIMA 2013M-0014182, Stamyl Grageas INVIMA 2008M-000301R3. <br>Material exclusivo para el cuerpo médico.
  </p>
</div>
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
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=STAMYL">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/btn-fijo.png" alt="Compra online"></div>
</a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/banner.jpg" alt="Stamyl el digestivo y antiflatulento a la vez">
<div class="degrade"></div>
  <div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/titulo.png" alt="El places de comer, sin que  nada te pase">
      <div class="col-sm-6 col-md-6">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 106604 )) ?>"><img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/stamyl-forte.png" alt="Stamyl forte"></a>
      </div>
      <div class="col-sm-6 col-md-6">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 34796 )) ?>"><img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/stamyl-grajeas.png" alt="Stamyl forte"></a>
      </div>
      <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=STAMYL"><img class="compra-online" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/compra-online.png" alt="Compra online Stamyl forte"></a>
      <div class="square">
        <div class="line">
          <img class="ico-check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/check.png">
          <p>Ayuda a mejorar la digestión de proteínas<br>carbohidratos y grasas.</p>
        </div>
        <div class="line">
          <img class="ico-check" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/stamyl/check.png">
          <p>Reduce la flatulencia.</p>
        </div>
      </div>
      <p class="texto">Alivio temporal y sintomático de los trastornos digestivos <br>
         por deficiencia de enzimas digestivas. Anti flatulento.</p>
      <div class="short-line"></div>
      <p class="text-legal">
        Es un medicamento. No exceder su consumo. Leer indicaciones y contraindicaciones en la etiqueta. Si los síntomas <br>
         persisten consulte a su médico. Reg. Sanitario INVIMA 2013M-0014182, Stamyl Grageas INVIMA 2008M-000301R3. <br>Material exclusivo para el cuerpo médico.
      </p>
    </div>
  </div>
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
<!--Fin versión escritorio
<?php endif; ?>
