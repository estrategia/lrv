<?php $this->pageTitle = "Nestum Recetas- La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Con NESTUM® puedes preparar deliciosas recetas para tu bebé, escoge el que más se adapte a las necesidades de tu bebé. Gran nutrición para pequeñas barriguitas.'>
  <meta name='keywords' content='nestum preparación, recetas nestum, papillas nestum.'>
	<style>
    @font-face { font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Bold.otf);}
    @font-face { font-family:VAGRoundedStd-Thin; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Thin.otf);}
    @font-face { font-family:VAGRoundedStd-Black; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Black.otf);}
    @font-face { font-family:VAGRoundedStd-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Light.otf);}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 15%;}
    .footer {background-color:#fff;font-family: VAGRoundedStd-Bold;    font-size: 23px;padding: 35px;}
    .footer span {color:#E57720;}
    .facebook {width: 30px;display: inline-block;height: 22px;}
    .footer .izq {text-align: right;line-height: 27px;margin-top: 8px;border-right: 2px solid #244B98;}
    .footer .der {text-align: left;line-height: 27px;}
    .footer a {color:#04478E;}
    .space-1 {height: 0px !important;}
    .img-responsive-m{width:100%;}
    .bg-amarillo {background-color:#FBE659;font-family:VAGRoundedStd-Bold;text-align:center;}
    .bg-amarillo a {color:#fff;}
    .bg-amarillo a:hover {color:#fff;}
    .azul-oscuro {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nestum/recetas/bg-blue.png);padding: 20px;background-size: 100%;font-size: 25px;background-repeat: no-repeat;background-position: center center;margin: 15px;}
    .azul-claro {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nestum/recetas/bg-light-blue.png);padding: 20px;background-size: 100%;font-size: 25px;background-repeat: no-repeat;background-position: center center;margin: 15px;}
    .column {background-color:#FCF4B3;border-radius:25px;margin-top:25px;font-family: VAGRoundedStd-Thin;padding: 20px;font-size: 17px;color: #234B97;}
    .column strong {font-family:VAGRoundedStd-Bold;font-weight: initial;}
    .column p {margin-bottom:0px;}
    .producto {margin: 25px auto;width: 35%;}
    .title-dashed {margin-top: -70px !important;font-family: VAGRoundedStd-Bold;color: #fff;font-size: 25px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/recetas/bg-titulos.png);padding: 25px;background-repeat: no-repeat;background-position: center center;margin: 0;margin-top: 0px;}
    a {text-decoration:none;}
    .title-dashed-m {margin-top: -34px !important;font-family: VAGRoundedStd-Bold;color: #fff;font-size: 17px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/recetas/bg-titulos.png);padding: 16px 0;background-repeat: no-repeat;background-size: 103%;background-position: center center;}
    .producto-m {margin: 35px auto 0;width: 70%;display: block;}
    .compra {margin: 0 auto;width: 80%;display: block;}
</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
  <div class="bg-amarillo" style="padding-bottom: 15px;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/banner.png">
    <a href="<?= Yii::app()->request->baseUrl ?>/nestum-cereales-infantiles"><div class="azul-oscuro">Beneficios</div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestum-cereales-infantiles"><div class="azul-claro">Recetas de NESTUM<sup>®</sup></div></a>
    <a href="<?= Yii::app()->request->baseUrl ?>/sabias-que-nestum-cereales-infantiles"><div class="azul-oscuro">¿Sabías que?</div></a>
  </div>
  <div class="column" style="margin: 15px;">
    <img style="margin: 0 auto;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/crema-de-vegetales.png">
    <h2 class="title-dashed-m">Crema de Vegetales <br> con NESTUM<sup>®</sup> arroz</h2>
    <strong>1 porción  20 minutos</strong> <br>

    <p style="margin-top:15px;"><strong style="margin-top:15px;">INGREDIENTES:</strong></p>
    <p>&#188; zanahoria pequeña</p>
    <p>&#188; manzana verde pequeña</p>
    <p>1 hoja de espinacas</p>
    <p>1 taza de agua</p>
    <p>2 cucharadas soperas de Cereal Infantil NESTUM<sup>®</sup> Arroz</p>

    <p style="margin-top:15px;"><strong>PREPARACIÓN:</strong></p>
    <p>Cocinar en el agua sugerida todos los vegetales por 10 minutos.</p>
    <p>Llevar la preparación a la licuadora y licuar hasta integrar bien.</p>
    <p>Poner la preparación en un tazón y mezclar con el Cereal Infantil NESTUM Arroz, hasta que todo quede bien mezclado.</p>
    <p>Servir enseguida.</p>

    <img class="img-responsive producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/nestum-arroz.png">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 59218)) ?>">
        <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
      </a>
    </div>
  <div class="column" style="margin: 15px;">
    <img  style="margin: 0 auto;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/minicrepe-banano.png">
    <h2 class="title-dashed-m">Minicrepes de banano con<br>NESTUM<sup>®</sup> trigo con frutas</h2>
    <strong>2 porciones  5 minutos</strong> <br>

    <p style="margin-top:15px;"><strong style="margin-top:15px;">INGREDIENTES:</strong></p>
    <p><strong>Para los minicrepes:</strong></p>
    <p>&#190; taza de la formula infantil que actualmente toma el bebé</p>
    <p>&#188; taza de harina de trigo</p>
    <p>2 cucharadas soperas de Cereal Infantil NESTUM Trigo con Frutas</p>

    <p style="margin-top:15px;"><strong>RELLENO:</strong></p>
    <p>Jugo de 1 naranja</p>
    <p>&#189; banano partido en rodajas delgadas</p>

    <p style="margin-top:15px;"><strong>PREPARACIÓN:</strong></p>
    <p>Poner los ingredientes de los crepes en la licuadora y licuar hasta integrar bien.</p>
    <p>En una sartén de teflón que esté bien caliente, poner una cucharada sopera de la mezcla anterior y dejar hasta que salgan burbujitas. Dar la vuelta y dejar por dos minutos hasta que dore bien. </p>
    <p>Seguir así sucesivamente hasta terminar la mezcla.</p>
    <p>En un tazón, mezclar el banano con el jugo de naranja. Reservar.</p>
    <p>Sobre cada crepe poner una porción de banano con su salsa.</p>
    <p>Servir enseguida.</p>

    <img class="img-responsive producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/nestum-trigo-con-frutas.png">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 90835)) ?>">
      <img class="img-responsive compra"src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
    </a>
  </div>

<div style="padding:30px;margin-top: 43px;">
  <h2 class="title-dashed-m" style="background-size: 80%;"><a style="color: #fff;" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/recetario.pdf">Descargar recetario</a> </h2>
</div>

  <div class="footer" style="font-size: 19px;text-align: center;padding: 0;">
        <span>
          DESCUBRE TIPS Y DELICIOSAS RECETAS CON NESTUM<sup>®</sup> EN:
        </span>
        <a href="https://www.comienzosano.nestle.co/" target="_blank">
          <p>www.<span>comienzosano.nestle</span>.co</p>
        </a>
        <a href="https://www.facebook.com/ComienzoSanoColombia/" target="_blank" class="facebook">
          <img  class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/fb.png">
        </a>
        <span>ComienzoSano</span><span style="color:#04478E;">Colombia</span>
    </div>
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<a href="#"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/boton-sticky.png"></div></a>
<div class="bg-amarillo">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/banner.png">
  <div class="container">
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/nestum-cereales-infantiles">
        <div class="azul-oscuro">Beneficios</div>
      </a>
    </div>
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestum-cereales-infantiles">
        <div class="azul-claro">Recetas de NESTUM<sup>®</sup></div>
      </a>
    </div>
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/sabias-que-nestum-cereales-infantiles">
        <div class="azul-oscuro">¿Sabías que?</div>
      </a>
    </div>
  </div>
</div>
<div class="container">
  <div class="col-sm-6 col-md-6">
    <div class="column">
      <img class="img-responsive" style="margin: 0 auto;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/crema-de-vegetales.png">
      <h2 class="title-dashed">Crema de Vegetales <br> con NESTUM<sup>®</sup> arroz</h2>
      <div class="row">
        <div class="col-md-12" style="padding-left: 38px;">
          <strong>1 porción  20 minutos</strong> <br>

          <p style="margin-top:15px;"><strong style="margin-top:15px;">INGREDIENTES:</strong></p>
          <p>&#188; zanahoria pequeña</p>
          <p>&#188; manzana verde pequeña</p>
          <p>1 hoja de espinacas</p>
          <p>1 taza de agua</p>
          <p>2 cucharadas soperas de Cereal Infantil NESTUM<sup>®</sup> Arroz</p>

          <p style="margin-top:15px;"><strong>PREPARACIÓN:</strong></p>
          <p>Cocinar en el agua sugerida todos los vegetales por 10 minutos.</p>
          <p>Llevar la preparación a la licuadora y licuar hasta integrar bien.</p>
          <p>Poner la preparación en un tazón y mezclar con el Cereal Infantil NESTUM Arroz, hasta que todo quede bien mezclado.</p>
          <p>Servir enseguida.</p>

          <img class="img-responsive producto" style="margin-top: 44%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/nestum-arroz.png">
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 59218)) ?>">
            <img class="img-responsive producto" style="width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
          </a>
        </div>

      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-6">
    <div class="column">
      <img class="img-responsive" style="margin: 0 auto;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/minicrepe-banano.png">
      <h2 class="title-dashed">
        Minicrepes de banano con<br>NESTUM<sup>®</sup> trigo con frutas
      </h2>
      <div class="row">
          <div class="col-md-12" style="padding-left: 38px;">
            <strong>2 porciones  5 minutos</strong> <br>

            <p style="margin-top:15px;"><strong style="margin-top:15px;">INGREDIENTES:</strong></p>
            <p><strong>Para los minicrepes:</strong></p>
            <p>&#190; taza de la formula infantil que actualmente toma el bebé</p>
            <p>&#188; taza de harina de trigo</p>
            <p>2 cucharadas soperas de Cereal Infantil NESTUM Trigo con Frutas</p>

            <p style="margin-top:15px;"><strong>RELLENO:</strong></p>
            <p>Jugo de 1 naranja</p>
            <p>&#189; banano partido en rodajas delgadas</p>

            <p style="margin-top:15px;"><strong>PREPARACIÓN:</strong></p>
            <p>Poner los ingredientes de los crepes en la licuadora y licuar hasta integrar bien.</p>
            <p>En una sartén de teflón que esté bien caliente, poner una cucharada sopera de la mezcla anterior y dejar hasta que salgan burbujitas. Dar la vuelta y dejar por dos minutos hasta que dore bien. </p>
            <p>Seguir así sucesivamente hasta terminar la mezcla.</p>
            <p>En un tazón, mezclar el banano con el jugo de naranja. Reservar.</p>
            <p>Sobre cada crepe poner una porción de banano con su salsa.</p>
            <p>Servir enseguida.</p>
          <p>&nbsp;</p>
        </div>
        <img class="img-responsive producto" style="width: 30%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/nestum-trigo-con-frutas.png">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 90835)) ?>">
          <img class="img-responsive producto" style="width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
        </a>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <h2 class="title-dashed" style="padding: 30px;margin-top: 20px !important;background-size: 21%;"><a style="color: #fff;" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/recetario.pdf" target="_blank">Descargar recetario</a> </h2>
</div>


  <div class="row footer">
    <div class="col-sm-6 col-md-6 izq">
      <span>
        DESCUBRE TIPS Y DELICIOSAS<br>
        RECETAS CON NESTUM <sup>®</sup> EN:
      </span>
    </div>
    <div class="col-sm-6 col-md-6 der">
      <a href="https://www.comienzosano.nestle.co/" target="_blank">
        <p>www.<span>comienzosano.nestle</span>.co</p>
      </a>
      <a href="https://www.facebook.com/ComienzoSanoColombia/" target="_blank" class="facebook">
        <img  class="img-responsive " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/fb.png">
      </a>
      <span>ComienzoSano</span><span style="color:#04478E;">Colombia</span>
    </div>
  </div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
