<?php $this->pageTitle = "Strepsils - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Strepsils Intensive es el tratamiento ideal para el dolor de garganta que ataca la inflamación. Es de rápida acción, alivia el dolor y combate la inflamación.'>
  <meta name='keywords' content='dolor de gargante, pastillas para el dolor de garganta y quitar dolor de garganta.'>
  <style>
    @font-face {font-family:MyriadPro-Semibold; src: url(".Yii::app()->request->baseUrl."/images/contenido/strepsils/fonts/MyriadPro-Semibold.otf);}
    @font-face {font-family:MyriadPro-Bold; src: url(".Yii::app()->request->baseUrl."/images/contenido/strepsils/fonts/MyriadPro-Bold.otf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 260px;}
    .sidebar-cart-m {position: fixed;right: 0px;top: 30%;z-index: 2000;}
    .title-descrip {letter-spacing: -1px;font-family: MyriadPro-Semibold;text-align: center;color: #000;font-size: 35px;margin-top: 70px;}
    .title-descrip span {font-family:MyriadPro-Bold;color:#DC0912;}
    .bg-inicial {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/strepsils/degradado-debajo-del-banner.png);background-size: cover; }
    .bg-secundario {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/strepsils/degradado-Inferior.png);background-size: cover; }
    .ico-strepsils {margin: 40px auto;width: 35%;display:block;}
    .title-beneficios {text-align:center;color:#fff;font-family:MyriadPro-Bold; background: url(".Yii::app()->request->baseUrl."/images/contenido/strepsils/barra.png);background-size: 100% 100%;padding: 6px;width:80%;margin: 45px auto;}
    .icono {width: 100%;margin: 0 auto;display: block;}
    .ico-num {margin: -43px auto 10px;color: #fff;text-align: center;font-family: MyriadPro-Bold;border-radius: 50%;font-size: 45px;border:2px solid #fff;-webkit-box-shadow: 2px 2px 5px -1px rgba(0,0,0,0.75);-moz-box-shadow: 2px 2px 5px -1px rgba(0,0,0,0.75);box-shadow: 2px 2px 5px -1px rgba(0,0,0,0.75);width: 60px;height: 60px;}
    .purple .ico-num {background-color:#58527B;}
    .green .ico-num {background-color:#025D54;}
    .blue .ico-num {background-color:#004F71;}
    .yellow .ico-num {background-color:#E5D222;}
    .section-info {font-family:MyriadPro-Bold; border-radius: 25px;margin: 45px 0;padding: 10px;text-align: center;-webkit-box-shadow: 2px 2px 5px -1px rgba(0,0,0,0.75);-moz-box-shadow: 2px 2px 5px -1px rgba(0,0,0,0.75);box-shadow: 2px 2px 5px -1px rgba(0,0,0,0.75);}
    .section-info h3 {font-size:20px;letter-spacing: -1px;line-height: 22px;}
    .section-info p {color: #3A3C3B;font-size: 15px;letter-spacing: -1px;}
    .section-info.purple {border: 4px solid #8D9DCD;}
    .section-info.green  {border: 4px solid #61BFBC;}
    .section-info.blue {border: 4px solid #53A9DB;}
    .section-info.yellow {border: 4px solid #F9D65E;}
    .section-info.purple h3 {color: #58527B;}
    .section-info.green h3  {color: #025D54;}
    .section-info.blue h3 {color: #004F71;}
    .section-info.yellow h3 {color: #E5D222;}
    .producto {margin: 0 auto;display:block;width: 80%;}
    .compra {margin:10px auto 30px;display: block;width: 40%;}
    .footer {padding:10px;margin-top:15px;text-align:center;background-color:#E20612;color:#fff;font-family:MyriadPro-Semibold;}
    .video {position: relative;padding-bottom: 56.25%;overflow: hidden;}
    .video iframe {position: absolute;display: block;top:0;left:0;width: 100%;height: 100%;}
  </style>
  ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Version movil-->
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117377)) ?>">
  <div class="sidebar-cart-m"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/btn-fijo-mobile.png" alt="Compra online"></div>
</a>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/banner-movil.jpg" alt="Banner strepsil">
<div class=" bg-inicial" style="padding:0 15px;">
  <h1 class="title-descrip" style="margin-top: -5px;padding-top: 30px;font-size: 23px;">El tratamiento ideal para <br> <span>el dolor de garganta</span><br> que ataca <span>la inflamación</span></h1>
  <img class="ico-strepsils"  style="margin: 25px auto;width: 51%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/icono-Strepsils.png">
  <h2 class="title-beneficios" style="font-size: 16px;width: 100%;">Conoce sus beneficios:</h2>
</div>
<div style="padding:0px;">
  <div class="section-info purple" style="width: 50%;margin: 45px auto;">
    <img class="icono"  style="width: 40%;margin: -45px auto 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/rapida-accion.png" alt="Rápida acción">
    <h3>Rápida <br> Acción</h3>
    <p>Te asegura el rápido alivio del dolor de garganta a partir de dos minutos de consumirlo.</p>
  </div>
  <div class="section-info green" style="width: 50%;margin: 45px auto;">
    <img class="icono" style="width: 40%;margin: -45px auto 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/alivia-el-dolor.png" alt="Alivia el dolor">
      <h3>Alivia <br> el dolor</h3>
      <p>Ofrece una larga duración del alivio del dolor, puede durar hasta 4 horas.</p>
  </div>
  <div class="section-info blue" style="width: 50%;margin: 45px auto;">
    <img class="icono" style="width: 40%;margin: -45px auto 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/combate-la-inflamación.png" alt="Combate la inflamación">
      <h3>Combate <br> la inflamación</h3>
      <p>Contiene flurbioprofeno para tratar la inflamación de la garganta sin importar la causa.</p>
  </div>
  <div class="section-info yellow" style="width: 50%;margin: 45px auto;">
    <img class="icono" style="width: 40%;margin: -45px auto 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/sabor-a-miel-y-limon.png" alt="Sabor a miel y limon">
      <h3>Sabor a miel y <br>limón</h3>
      <p>Se diferencia en el mercado por su delicioso sabor a miel y limón.</p>
  </div>
</div>
<div style="padding:0px;">
  <div class="bg-secundario" >
    <img class="producto" style="width:90%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/strepsils-caja.png" alt="Strepsils caja 16 tabletas">
    <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117377)) ?>">
      <img class="compra" style="margin: 20px auto 30px;width: 65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/compra-online.png" alt="Compra online">
    </a>
    <center style="padding:0 15%;">
      <div class="video">
        <iframe width="640" height="360" src="https://www.youtube.com/embed/8ESfZY5gXPE?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </center>
    <div class="footer" style="margin-top: 20px !important;">
      <p style="font-size: 13px;">Es un medicamento, no exceder su consumo. Leer indicaciones y contraindicaciones. <br>
      Indicaciones: Antiinflamatorio de uso tópico bucofaríngeo. <br>
      Si persisten los síntomas consulte a su médico. Strepsils Intensive Reg. INVIMA 2015M-0016133
      </p>
      <img style="margin: 0 auto;width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/degragado-inferior.png">
    </div>
  </div>
</div>
<!--Versión escritorio-->

<?php else: ?>
<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117377)) ?>">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/btn-fijo.png" alt="Compra online"></div>
</a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/banner.jpg" alt="Banner strepsil">
<div class="container">
  <div class="row ">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 bg-inicial">
      <h1 class="title-descrip">El tratamiento ideal para <span>el dolor de garganta</span><br> que ataca <span>la inflamación</span></h1>
      <img class="ico-strepsils" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/icono-Strepsils.png">
      <h2 class="title-beneficios">Conoce sus beneficios:</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="padding:0px;">
      <div class="col-sm-3 col-md-3">
        <img class="icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/rapida-accion.png" alt="Rápida acción">
        <div class="section-info purple">
            <div class="ico-num">1</div>
            <h3>Rápida <br> Acción</h3>
            <p>Te asegura el rápido <br> alivio del dolor de <br> garganta a partir <br> de dos minutos <br> de consumirlo.</p>
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <img class="icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/alivia-el-dolor.png" alt="Alivia el dolor">
        <div class="section-info green">
            <div class="ico-num ">2</div>
            <h3>Alivia <br> el dolor</h3>
            <p>Ofrece una larga <br> duración del alivio <br> del dolor, puede <br> durar hasta 4 horas. <br> &nbsp;</p>
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <img class="icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/combate-la-inflamación.png" alt="Combate la inflamación">
        <div class="section-info blue">
            <div class="ico-num ">3</div>
            <h3>Combate <br> la inflamación</h3>
            <p>Contiene <br> flurbioprofeno para <br> tratar la inflamación <br> de la garganta <br> sin importar la causa.</p>
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <img class="icono" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/sabor-a-miel-y-limon.png" alt="Sabor a miel y limon">
        <div class="section-info yellow">
            <div class="ico-num ">4</div>
            <h3>Sabor a miel y <br>limón</h3>
            <p>Se diferencia en el  <br> mercado por su delicioso sabor<br> a miel y limón.<br> &nbsp;</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 bg-secundario" style="padding:0px;">
      <img class="producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/strepsils-caja.png" alt="Strepsils caja 16 tabletas">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117377)) ?>">
        <img class="compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/compra-online.png" alt="Compra online">
      </a>
      <center style="padding:0 15%;">
        <div class="video">
          <iframe width="640" height="360" src="https://www.youtube.com/embed/8ESfZY5gXPE?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </center>
      <div class="footer">
        <p>Es un medicamento, no exceder su consumo. Leer indicaciones y contraindicaciones. <br>
        Indicaciones: Antiinflamatorio de uso tópico bucofaríngeo. <br>
        Si persisten los síntomas consulte a su médico. Strepsils Intensive Reg. INVIMA 2015M-0016133
        </p>
        <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/strepsils/degragado-inferior.png">
      </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio -->
<?php endif; ?>
