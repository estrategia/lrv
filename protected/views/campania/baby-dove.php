<?php $this->pageTitle = "Baby Dove - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Descubre el nuevo Baby Dove, para el cuidado completo de la delicada piel de tu bebé. Encuentra shampoo, jabón líquido, entre otros.'>
  <meta name='keywords' content='baby dove, cremas para bebes, shampoo para bebe'>
  <style>
    @font-face {font-family:MyriadPro;src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/MyriadPro.otf);}
    @font-face {font-family:GothamRnd-Medium;src: url(".Yii::app()->request->baseUrl."/images/contenido/baby-dove/fonts/GothamRnd-Medium.otf);}
    @font-face {font-family:gotham-rounded-light;src: url(".Yii::app()->request->baseUrl."/images/contenido/baby-dove/fonts/gotham-rounded-light.otf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width:260px;}
    .nota {font-family:interstate-regular;color: #74183D;text-align: center;font-size: 16px;letter-spacing: -1px;}
    .text-atencion {font-family: MyriadPro;margin-bottom: 20px !important;text-decoration: underline;font-size: 14px;font-weight: bold;font-style: italic;}
    .datos-contacto {padding: 15px 0;}
    .datos-contacto p{text-align: center;margin:0px;}
    .bg-red {font-size: 20px;background-color:#FE0000;color:#fff;text-align: center;font-family: MyriadPro;padding: 15px;}
    .bg-red a {text-decoration:underline;color:#fff;}
    .bg-red a:hover {color:#fff;text-decoration:underline;}
    .header-dove{width:100%;display: flex;align-items: center;justify-content: center;background-color:#fff;height:87px;position: absolute;z-index: 1;-webkit-box-shadow: 0px 10px 4px -10px rgba(0,0,0,0.5);-moz-box-shadow: 0px 10px 4px -10px rgba(0,0,0,0.5);box-shadow: 0px 10px 4px -10px rgba(0,0,0,0.5);}
    .logo-dove{margin: 50px 8% 0;width: 148px;}
    .bg-enriquecido {background-attachment: fixed;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/baby-dove/background-humectacion-enriquecida.jpg);background-size: 100%;background-repeat:no-repeat;}
    .bg-sensible {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/baby-dove/background-humectacion-sensible.png);background-size: 100%;background-repeat:no-repeat;}
    .title-blue {font-family: GothamRnd-Medium;color: #0390C5;text-align: center;font-size: 29px;letter-spacing: -1px;margin-top: -5px;}
    .bullets-dove{font-family: gotham-rounded-light;color: #666867;font-size: 20px;margin-top: 30px;padding-inline-start: 15px;}
    .bullets-dove li {list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/baby-dove/bullet.png);margin-bottom: 15px;}
    .compra{width: 32%;margin: 0 auto;display:block;}
    #humectacion-sensible {margin-top: 16%;}
    .item-menu{background-color: #00B5E0;color: #fff;font-family: GothamRnd-Medium;font-size: 20px;padding: 9px 20px;margin-top: 20px;-webkit-box-shadow: 0px 10px 4px -10px rgba(0,0,0,0.5);-moz-box-shadow: 0px 10px 4px -10px rgba(0,0,0,0.5);box-shadow: 0px 10px 4px -10px rgba(0,0,0,0.5);border-radius: 25px;}
    .header-dove-m {width: 100%;background: #e7f3fc;background: -moz-linear-gradient(top, #e7f3fc 0%, #e7f3fc 55%, #ffffff 63%, #ffffff 100%);background: -webkit-gradient(left top, left bottom, color-stop(0%, #e7f3fc), color-stop(55%, #e7f3fc), color-stop(63%, #ffffff), color-stop(100%, #ffffff));background: -webkit-linear-gradient(top, #e7f3fc 0%, #e7f3fc 55%, #ffffff 63%, #ffffff 100%);background: -o-linear-gradient(top, #e7f3fc 0%, #e7f3fc 55%, #ffffff 63%, #ffffff 100%);background: -ms-linear-gradient(top, #e7f3fc 0%, #e7f3fc 55%, #ffffff 63%, #ffffff 100%);background: linear-gradient(to bottom, #e7f3fc 0%, #e7f3fc 55%, #ffffff 63%, #ffffff 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e7f3fc', endColorstr='#ffffff', GradientType=0 );}
  </style>
  ";
?>

<!-- Google Code para etiquetas de remarketing -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 861857907;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/861857907/?guid=ON&amp;script=0"/>
</div>
</noscript>

<script type="text/javascript">
  $(document).ready(function(){$('a[href^="#"]').on("click",function(o){o.preventDefault();var n=this.hash,t=$(n);$("html, body").stop().animate({scrollTop:t.offset().top},900,"swing",function(){window.location.hash=n})})});
</script>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div class="bg-enriquecido">
  <header class="header-dove-m">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/header-mobile.png" alt="Logo Baby Dove">
    <a data-ajax="false" style="text-decoration:none;" href="#humectacion-enriquecida"><span class="item-menu" style="text-align:center;display: block;width: 72%;margin: 25px auto 20px;">Humectación Enriquecida</span></a>
    <a data-ajax="false" style="text-decoration:none;" href="#humectacion-sensible"><span class="item-menu" style="text-align:center;background-color:#01C3C2;display: block;width: 72%;margin: 0px auto 35px;">Humectación Sensible</span></a>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/banner-mobile.png" alt="Baby Dove">
  </header>
<div class="pattern" style="padding: 0 15px;">
  <h1 class="title-blue" style="font-size: 19px;">Baby Dove cree que no existen <br> mamás perfectas solo mamás reales.</h1>
  <p style="font-family: gotham-rounded-light;color: #666867;text-align: center;font-size: 16px;margin-top: 30px;">La maternidad es un viaje increíble, apasionante y hermoso <br>
  Pero como en todos los principios siempre existe cierto grado de ansiedad. <br>
  Sin importar cómo lo hagas queremos acompañarte en este hermoso camino <br>
  del cuidado de tu bebé, para hacer de esta experiencia un momento inolvidable.</p>
  <div id="humectacion-enriquecida">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/baby-dove-humectacion-enriquecida.png " alt="Baby Dove Humectacion enriquecida">
    <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3236)) ?>" data-ajax="false"><img class="compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/compra-online.png " alt="Compra online Baby Dove Humectacion enriquecida"></a>
    <h2 class="title-blue" style="text-align:left;font-size: 22px;margin-top: 24px;">Baby Dove Humectación <br> Enriquecida</h2>
    <ul class="bullets-dove" style="font-size: 16px;padding-inline-start: 27px;">
      <li>Con una fórmula hipoalergénica que ayuda a mantener la piel de tu bebé suave y humectada.</li>
      <li>Con un pH neutro para cuidar delicadamente <br>la piel de tu bebé y dejarla hidratada.</li>
      <li>Con &frac14; de crema humectante para mentener la piel protegida del bebé durante el baño.</li>
    </ul>
  </div>
</div>
<div class="bg-sensible" style="margin-top: -63px;padding: 0 15px;">
  <div class="pattern">
    <div id="humectacion-sensible">
      <div style="height:80px;"></div>
      <h2 class="title-blue" style="text-align:left;font-size: 22px;margin-top: 24px;">Baby Dove Humectación <br> Sensible</h2>
      <ul class="bullets-dove" style="font-size: 16px;padding-inline-start: 27px;">
        <li>Línea hipoalergénica que cuida, protege  <br>y humecta la piel sensible de tu bebé.</li>
        <li>Ayuda a minimizar los riesgos de alergias en la piel. <br> De hecho, son tan suaves que pueden ser usados en bebés recién nacidos.</li>
        <li>Con fórmula que contiene una fragancia delicada <br> y suave diseñada para pieles sensibles.</li>
      </ul>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/baby-dove-humectacion-sensible.png " alt="Baby Dove Humectacion Sensible">
      <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3234)) ?>" data-ajax="false"><img class="compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/compra-online.png " alt="Compra online Baby Dove Humectacion sensible"></a>
    </div>
  </div>
</div>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3238)) ?>" data-ajax="false"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/baby-dove-productos-mobile.png" alt="Compra online Baby Dove"></a>
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
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3238)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/btn-fijo.png" alt="Compra online"></div></a>
<div class="bg-enriquecido">
  <header class="header-dove">
    <a href="#humectacion-enriquecida"><span class="item-menu">Humectación Enriquecida</span></a>
    <img class="logo-dove" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/logo-baby-dove.png" alt="Logo Baby Dove">
    <a href="#humectacion-sensible"><span class="item-menu" style="background-color:#01C3C2;">Humectación Sensible</span></a>
  </header>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/banner.png" alt="Banner Baby Dove">
  <div class="container">
    <div class="pattern col-md-12">
      <div class="row" style="margin-bottom:60px;">
        <h1 class="title-blue">Baby Dove cree que no existen mamás <br> perfectas solo mamás reales.</h1>
        <p style="font-family: gotham-rounded-light;color: #666867;text-align: center;font-size: 16px;margin-top: 30px;">La maternidad es un viaje increíble, apasionante y hermoso <br>
        Pero como en todos los principios siempre existe cierto grado de ansiedad. <br>
        Sin importar cómo lo hagas queremos acompañarte en este hermoso camino <br>
        del cuidado de tu bebé, para hacer de esta experiencia un momento inolvidable.</p>
      </div>
      <div class="row" id="humectacion-enriquecida">
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/baby-dove-humectacion-enriquecida.png " alt="Baby Dove Humectacion enriquecida">
          <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3236)) ?>"><img class="compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/compra-online.png " alt="Compra online Baby Dove Humectacion enriquecida"></a>
        </div>
        <div class="col-sm-6 col-md-6">
          <h2 class="title-blue" style="text-align:left;">Baby Dove Humectación <br> Enriquecida</h2>
          <ul class="bullets-dove">
            <li>Con una fórmula hipoalergénica que ayuda a mantener la piel de tu bebé suave y humectada.</li>
            <li>Con un pH neutro para cuidar delicadamente <br>la piel de tu bebé y dejarla hidratada.</li>
            <li>Con &frac14; de crema humectante para mentener la piel protegida del bebé durante el baño.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-sensible" style="margin-top: -100px;">
    <div class="container">
    <div class="pattern col-md-12">
      <div class="row" id="humectacion-sensible">
        <div class="col-sm-6 col-md-6">
          <h2 class="title-blue"  style="text-align:left;">Baby Dove Humectación <br> Sensible</h2>
          <ul class="bullets-dove">
            <li>Línea hipoalergénica que cuida, protege  <br>y humecta la piel sensible de tu bebé.</li>
            <li>Ayuda a minimizar los riesgos de alergias en la piel. <br> De hecho, son tan suaves que pueden ser usados en bebés recién nacidos.</li>
            <li>Con fórmula que contiene una fragancia delicada <br> y suave diseñada para pieles sensibles.</li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/baby-dove-humectacion-sensible.png " alt="Baby Dove Humectacion Sensible">
          <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3234)) ?>"><img class="compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/compra-online.png " alt="Compra online Baby Dove Humectacion sensible"></a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3238)) ?>"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/baby-dove-productos.png" alt="Compra online Baby Dove"></a>
</div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/baby-dove/banda-promesa-rebaja.png" alt="Compra online Baby Dove en la Rebaja virtual">
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
