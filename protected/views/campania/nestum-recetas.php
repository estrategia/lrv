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
    .producto {margin: 0 auto;width: 50%;}
    .title-dashed {margin-top: -70px !important;font-family: VAGRoundedStd-Bold;color: #fff;font-size: 25px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/recetas/bg-titulos.png);padding: 25px;background-repeat: no-repeat;background-size: 73%;background-position: center center;margin: 0;margin-top: 0px;}
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
    <img style="margin: 0 auto;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/postre-de-ahuyama.png">
    <h2 class="title-dashed-m">Postre de ahuyama y banano <br> con NESTUM<sup>®</sup> Trigo Miel</h2>
    <strong>Dificultad:</strong> Fácil
    <strong>Porciones:</strong> 2
    <strong>Tiempo de cocción:</strong>  10mn
    <strong>Tiempo total:</strong> 10mn
    <strong>Ingredientes</strong> <br>
    <p>1/2 taza de ahuyama cocinada y triturada</p>
    <p>1 yema de huevo.</p>
    <p>4 cucharadas soperas de Cereal infantil Nestum<sup>®</sup> Trigo Miel.</p>
    <strong>Relleno:</strong>
    <p>1/2 banano maduro triturado.</p>
    <strong>Preparación:</strong>
    <p>Mezcla todos los ingredientes hasta integrar bien,
    en moldes individuales en mantequillados y enharinados
    pon la mezcla y llena al horno precalentado a 180°C por
    10 minutos aprox. o hasta que al introducir un palillo este
    salga limpio. Retira y deja enfriar un poco. Sirve enseguida.</p>
    <img class="img-responsive producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/nestum-trigo-y-miel.png">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 59216)) ?>">
        <img class="img-responsive compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
      </a>
    </div>
  <div class="column" style="margin: 15px;">
    <img  style="margin: 0 auto;width: 60%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/tortica-de-pan.png">
    <h2 class="title-dashed-m">Tortica de pan <br> con NESTUM<sup>®</sup> vainilla</h2>
    <strong>Dificultad:</strong> Media
    <strong>Tiempo de cocción:</strong> 20mn
    <strong>Tiempo de preparación:</strong>  30mn
    <strong>Tiempo total:</strong> 50mn
    <strong>Ingredientes</strong><br>
    <p>2 Tazas de pan</p>
    <p>1 Taza de leche (la que actualmente toma el niño)</p>
    <p>12 Cucharadas de Cereal infantil NESTUM<sup>®</sup> Vainilla</p>
    <p>1 Bocadito cortado en cuadritos pequeños</p>
    <p>1 Huevo</p>
    <strong>Preparación</strong> <br>
    <p>
      Precalienta el horno a 350°F. Remoja el pan en la lecha
      sugerida. Agrega el resto de los ingredientes y sírvelos
      en moldecitos engrasados y enharinados.
      Hornea-durante 20 minutos aproximadamente.
    </p>
    <img class="img-responsive producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/vainilla.png">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 57955)) ?>">
      <img class="img-responsive compra"src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
    </a>
  </div>
  <div class="footer" style="font-size: 19px;text-align: center;">
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
      <img class="img-responsive" style="margin: 0 auto;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/postre-de-ahuyama.png">
      <h2 class="title-dashed">Postre de ahuyama y banano <br> con NESTUM<sup>®</sup> Trigo Miel</h2>
      <div class="row">
        <div class="col-md-6">
          <strong>Dificultad:</strong> Fácil
          <strong>Porciones:</strong> 2
        </div>
        <div class="col-md-6">
          <strong>Tiempo de cocción:</strong>  10mn
          <strong>Tiempo total:</strong> 10mn
        </div>
        <div class="col-md-12">
          <strong>Ingredientes</strong> <br>
          <p>1/2 taza de ahuyama cocinada y triturada</p>
          <p>1 yema de huevo.</p>
          <p>4 cucharadas soperas de Cereal infantil Nestum<sup>®</sup> Trigo Miel.</p>
          <strong>Relleno:</strong>
          <p>1/2 banano maduro triturado.</p>
          <strong>Preparación:</strong>
          <p>Mezcla todos los ingredientes hasta integrar bien,
          en moldes individuales en mantequillados y enharinados
          pon la mezcla y llena al horno precalentado a 180°C por
          10 minutos aprox. o hasta que al introducir un palillo este
          salga limpio. Retira y deja enfriar un poco. Sirve enseguida.</p>
        </div>
        <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/nestum-trigo-y-miel.png">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 59216)) ?>">
          <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-6">
    <div class="column">
      <img class="img-responsive" style="margin: 0 auto;width: 60%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/tortica-de-pan.png">
      <h2 class="title-dashed">
        Tortica de pan <br> con NESTUM<sup>®</sup> vainilla
      </h2>
      <div class="row">
        <div class="col-md-6">
          <strong>Dificultad:</strong> Media
          <strong>Tiempo de cocción:</strong> 20mn
        </div>
        <div class="col-md-6">
          <strong>Tiempo de preparación:</strong>  30mn
          <strong>Tiempo total:</strong> 50mn
        </div>
        <div class="col-md-12">
          <strong>Ingredientes</strong><br>
          <p>2 Tazas de pan</p>
          <p>1 Taza de leche (la que actualmente toma el niño)</p>
          <p>12 Cucharadas de Cereal infantil NESTUM<sup>®</sup> Vainilla</p>
          <p>1 Bocadito cortado en cuadritos pequeños</p>
          <p>1 Huevo</p>
          <strong>Preparación</strong> <br>
          <p>
            Precalienta el horno a 350°F. Remoja el pan en la lecha
            sugerida. Agrega el resto de los ingredientes y sírvelos
            en moldecitos engrasados y enharinados.
            Hornea-durante 20 minutos aproximadamente.
          </p>
          <p>&nbsp;</p>
        </div>
        <img class="img-responsive producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/recetas/vainilla.png">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 57955)) ?>">
          <img class="img-responsive producto"src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/compra-online.png">
        </a>
      </div>
    </div>
  </div>
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
