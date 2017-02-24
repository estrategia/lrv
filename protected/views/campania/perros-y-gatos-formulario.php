
<?php $this->pageTitle = "Perros & Gatos | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
  	<style>
      @font-face {
        font-family: Nautilus;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/nautilus.otf);
      }
      @font-face {
        font-family: HelveticaNeueLTStd-Lt;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/HelveticaNeueLTStd-Lt.otf);
      }
      @font-face {
        font-family: helvetica-bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/helvetica-bold.otf);
      }
      @font-face {
        font-family: NewJune-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/NewJune-Bold.otf);
      }

      .bg-pattern {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/textura.png);background-repeat: no-repeat;background-size: cover;background-position: center;}
      .bg-pattern  .container-fluid {padding:0px;}
      .logo-perros-gatos {margin: 0px auto 90px !important;width: 33%;padding-top: 80px;}
      .logo-perros-gatos.m {margin: 0 auto 30px !important;width: 63%;padding-top: 10px;display: block;}
      .seccion-entrega {background-color:#E30917;font-family: NewJune-Bold;color:#fff;font-size:35px;margin-top: 30px;}
      .space-1 { height: 0px !important;}
      .section-orange {background-color: #EC6806;color: #fff;text-align: center;font-size: 42px;font-family: Nautilus;padding: 10px;}
      .section-orange.m{ font-size: 24px;}
      .section-orange:after {content: '';border-left: 40px solid transparent;border-right: 40px solid transparent;border-top: 50px solid #EC6806;position: absolute;}
      .section-orange.m::after {
    content: '';
    border-left: 40px solid transparent;
    border-right: 40px solid transparent;
    border-top: 30px solid #EC6806;
    position: absolute;
    margin-left: -11%;
}
      .overlay {background-color: rgba(236, 104, 6, 0.1);padding: 60px 0;margin-bottom: 60px;}
      .seccion-entrega.m { background-color: #E30917;font-family: NewJune-Bold;color: #fff;font-size: 19px;margin-top: 10px;text-align: center;padding: 15px 10px;line-height: initial;}
      .seccion-entrega.m span {font-size: 25px;}
      .title {color: #E84E0E;font-family: helvetica-bold;text-align: center;font-size: 60px;font-weight: bold;}
      .sub-title {color: #EC6806;text-align: center;font-family: HelveticaNeueLTStd-Lt;}
      .sub-title span {font-style: italic;font-family: helvetica-bold;}
      .formulario-registro {padding: 0px 50px;margin-top: 40px;}
      .formulario-registro select {margin: 10px 0px;  color: #9D8ACD;font-size: 20px;font-family: HelveticaNeueLTStd-Lt;}
      .formulario-registro option {margin: 10px 0px;  color: #9D8ACD;font-size: 20px;font-family: HelveticaNeueLTStd-Lt;}
      .formulario-registro input[type='text'], select {width: 100%;padding: 10px 20px;border: none;margin: 10px 0;border-radius: 15px;}
      .formulario-registro input[type='submit'] {background-color: #E84E0E;color: #fff;border: none;margin: 0 auto;display: block;border-radius: 15px;padding: 15px 30px;font-weight: bold;margin-top: 35px;}
      .formulario-registro input[placeholder] {color: #482583;font-size: 20px;font-family: HelveticaNeueLTStd-Lt;}
    </style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div class="bg-pattern ">
  <a href="<?= Yii::app()->request->baseUrl ?>/perros-y-gatos">
    <img class="logo-perros-gatos m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perros-y-gatos.png" alt="Perros y gatos la rebaja virtual">
  </a>
  <div class="section-orange m">
    <div class="container">Todo lo que necesitas para consentir a tu mascota</div>
  </div>
  <div class="overlay" style="padding: 25px 0;">
    <div class="container">
      <h1 class="title" style="font-size: 32px;">Registra tu mascota</h1>
      <h2 class="sub-title">y recibe una esencia natural de Pets and Cats de Laboratorios <span>Natural Freshly</span></h2>
      <div class="row">
      <form class="" style="padding: 0px 20px;margin-top: 20px;" action=""  method="">
          <div class="col-sm-6 col-md-6">
            <input type="text" placeholder="nombre del amo">
            <input type="text" placeholder="ciudad">
            <input type="text" placeholder="nombre de la mascota">
          </div>
          <div class="col-sm-6 col-md-6">
            <input type="text" placeholder="dirección">
            <input type="text" placeholder="teléfono o celular de contacto">
            <select>
              <option value="" selected="selected">- tipo de mascota -</option>
              <option value="windows">Perros</option>
              <option value="mac">Gatos</option>
            </select>
          </div>
          <div class="col-md-12">
            <input type="submit" value="ENVIAR">
          </div>
      </form>
      </div>
    </div>
  </div>
  <div class="seccion-entrega m">
      <img style="width: 45%;display: block;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual">
      En la Rebaja Virtual entregamos <br><span> tu pedido en 1 hora</span>
    </div>
</div>


<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<div class="bg-pattern ">
  <a href="<?= Yii::app()->request->baseUrl ?>/perros-y-gatos">
    <img class="img-responsive logo-perros-gatos" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perros-y-gatos.png" alt="Perros y gatos la rebaja virtual">
  </a>
  <div class="section-orange">
    <div class="container">Todo lo que necesitas para consentir a tu mascota</div>
  </div>
  <div class="overlay">
    <div class="container">
      <h1 class="title">Registra tu mascota</h1>
      <h2 class="sub-title">y recibe una esencia natural de Pets and Cats de Laboratorios <span>Natural Freshly</span></h2>
      <div class="row">
      <form class="formulario-registro" action=""  method="">
          <div class="col-sm-6 col-md-6">
            <input type="text" placeholder="nombre del amo"><br>
            <input type="text" placeholder="ciudad"><br>
            <input type="text" placeholder="nombre de la mascota">
          </div>
          <div class="col-sm-6 col-md-6">
            <input type="text" placeholder="dirección"><br>
            <input type="text" placeholder="teléfono o celular de contacto"><br>
            <select>
              <option value="" selected="selected">- tipo de mascota -</option>
              <option value="windows">Perros</option>
              <option value="mac">Gatos</option>
            </select>
          </div>
          <div class="col-md-12">
            <input type="submit" value="ENVIAR">
          </div>
      </form>
      </div>
    </div>
  </div>
  <div class="seccion-entrega">
    <div class="container ">
      <div class="col-sm-2 col-md-2">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual">
      </div>
      <div class="col-sm-10 col-md-10">
        En la Rebaja Virtual entregamos tu pedido en 1 hora
      </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
