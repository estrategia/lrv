<?php $this->pageTitle = "Altex Previene el acné - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Altex con su extracto natural del árbol de té previene, elimina y oculta las imperfecciones de tu piel. Altex es efectivo por la acción de la naturaleza.'>
  <meta name='keywords' content='Altex, jabon altex, altex acné.'>
	<style>
    @font-face { font-family:ClaireHand-Bold ; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/altex/fuentes/ClaireHand-Bold.otf);}
    @font-face { font-family:ThrowMyHandsUpintheAir ; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/altex/fuentes/ThrowMyHandsUpintheAir.ttf);}
    @font-face { font-family:SohoGothicPro-Regular ; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/altex/fuentes/SohoGothicPro-Regular.otf);}
    .sidebar-cart {width: 18%;position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/altex/background.png);background-size: cover;background-repeat: no-repeat;background-attachment: fixed;}
    .menu h2 {text-align:center;text-transform:uppercase;font-family:ClaireHand-Bold;font-size:50px;line-height: 115px;}
    .menu {margin-top: 110px;}
    .menu .active {background-position: 35px -8px;background-image: url(/images/contenido/altex/btn-menu.png);background-repeat: no-repeat;text-decoration:none;height: 154px;width: 100%;display: block;color:#fff;}
    .elimina {color:#D52323;text-decoration:none}
    .elimina:hover {background-position: 35px -176px;background-image: url(/images/contenido/altex/btn-menu.png);background-repeat: no-repeat;text-decoration:none;height: 154px;width: 100%;display: block;color:#fff;}
    .oculta {color: #F47B2A;text-decoration:none}
    .oculta:hover {background-position: 35px -344px;background-image: url(/images/contenido/altex/btn-menu.png);text-decoration:none;background-repeat: no-repeat;height: 154px;width: 100%;display: block;color:#fff;}
    .previene h2::before, .elimina h2::before {content: '';width: 4px;height: 65px;background-color: #B0B0B0;float: right;margin-top: 24px;}
    .content-text {margin-top: -130px;padding: 0px 50px;}
    .content-text span {font-family: ThrowMyHandsUpintheAir;color: #A6BF26;font-size: 56px;font-weight: bold;}
    .space {height:100px;}
    .lista {list-style: url(/images/contenido/altex/1-previene/item-list.png) ;font-family:SohoGothicPro-Regular ;font-size:20px;margin: 35px auto;}
    .lista li {margin-bottom: 15px;}
    .videoWrapper {position: relative;padding-bottom: 56.25%;padding-top: 25px;height: 0;}
    .videoWrapper iframe {position: absolute;top: 0;left: 0;width: 100%;height: 100%;}
    .section-video {margin-top: 40px;}
    @media (min-width: 1050px) and (max-width: 1199px) {
      .content-text { margin-top: -105px;}
      .content-text span {font-size: 43px;}
      .menu .active {background-size: 247px;background-position: 22px 0px;height: 140px;}
      .elimina:hover {background-size: 247px;background-position: 22px -139px;height: 140px;}
      .oculta:hover {background-size: 247px;background-position: 22px -280px;height: 140px;}
    }
    .img-responsive-m {width:100%;}
    .content-text-m {margin-top: -50px;padding: 0px 10px;}
    .content-text-m span {font-family: ThrowMyHandsUpintheAir;color: #A6BF26;font-size: 18px;font-weight: bold;}
    .previene-m {background-color:#014ACD;color: #fff;font-size: 25px !important;line-height: initial !important;padding: 15px;margin: 0;}
    .elimina-m {background-color:#CD2525;color: #fff; font-size: 25px !important;line-height: initial !important;padding: 15px;margin: 0;}
    .oculta-m {background-color:#FD782B;color: #fff; font-size: 25px !important;line-height: initial !important;padding: 15px;margin: 0;}
    .separator{background-color: #B1B1B1;height: 2px;border: none;width: 80%;margin: 70px auto;border-radius: 50%;}
</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/banner-previene.png">
  <img class="img-responsive-m" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/post.png" alt="">
  <div class="content-text-m">
    <span> Despreocúpate de las imperfecciones con</span>
    <img style="display: inline-block;width: 50px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/logo-altex.png" alt="ALTEX">
  </div>
  <div class="menu" style="margin-top: 50px;">
    <a style="text-decoration: none;" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/altex-previene-acne"><h2 class="previene-m">Previene</h2></a>
    <a style="text-decoration: none;" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/altex-elimina-acne"><h2 class="elimina-m">Elimina</h2></a>
    <a style="text-decoration: none;" data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/altex-oculta-acne"><h2 class="oculta-m">Oculta</h2></a>
  </div>
  <div style="height:70px;"></div>
  <div style="padding: 0px 20px;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/limpieza-profunda.png">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/jabon-antibrillo-altex.png" alt="Jabón antibrillo Altex">
    <ul class="lista">
      <li>Limpia profundamente y elimina la grasa.</li>
      <li>Elimina el exceso de grasa y así evitarás que los barritos o espinillas se alojen de nuevo en tu cara.</li>
    </ul>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 20831)) ?>"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
  </div>
  <hr class="separator">
  <div style="padding: 0px 20px;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/piel-delicada.png">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/espuma-limpiadora-altex.png" alt="Espuma limpiadora Altex">
    <ul class="lista">
      <li>Cuida mientras previene las imperfecciones.</li>
      <li>Se convierte en una suave espuma que cuando te la aplicas, previene las imperfecciones.</li>
    </ul>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 20830)) ?>"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
  </div>
  <hr class="separator">
  <div style="padding: 0px 20px;">
    <img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/puntos-negros.png">
    <img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/gel-exfoliante.png" alt="Gel exfoliante Altex">
    <ul class="lista">
      <li>Elimina puntos negros y espinillas.</li>
      <li>Gel con microgránulos y extracto natural de árbol de té que exfolia tu casa suavemente, evitando que tus poros se obstruyan.</li>
    </ul>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 47129)) ?>"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
  </div>
  <hr class="separator">
  <div style="padding: 0px 20px;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/piel-brillante.png">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/antibrillo-altex.png" alt="Láminas antibrillo Altex">
    <ul class="lista">
      <li>Estas novedosas Láminas Antibrillo remueven de forma inmediata el exceso de grasa, evitando el molesto brillo en tu rostro.</li>
    </ul>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 106229)) ?>"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
  </div>
    <div style="padding: 0px 20px;">
      <img class="img-responsive-m" style="margin:50px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/beneficios-altex.png" alt="Descubre más beneficios de Altex">
      <div class=" section-video">
          <div class="videoWrapper">
            <iframe width="560" height="349" src="https://www.youtube.com/embed/rORa68jubM4?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="videoWrapper">
            <iframe width="560" height="349" src="https://www.youtube.com/embed/bA-KoBuyJbw?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
      </div>
    </div>
<!---FIN VERSIÓN MÓVIL-->

<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<a href="#"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/btn-sticky.png"></div></a>
<div class="background">
  <div class="container">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/banner-previene.png">
    <div style="background-color:#fff;">
      <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/post.png" alt="">
      <div class="content-text">
       <span> Despreocúpate de las imperfecciones con  </span><img class="img-responsive" style="display: inline-block;margin-top: -60px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/logo-altex.png" alt="ALTEX">
      </div>
      <div class="row menu">
        <div class="col-sm-4 col-md-4"><a href="<?= Yii::app()->request->baseUrl ?>/altex-previene-acne" class="previene active"><h2>Previene</h2></a></div>
        <div class="col-sm-4 col-md-4"><a href="<?= Yii::app()->request->baseUrl ?>/altex-elimina-acne" class="elimina"><h2>Elimina</h2></a></div>
        <div class="col-sm-4 col-md-4"><a href="<?= Yii::app()->request->baseUrl ?>/altex-oculta-acne" class="oculta"><h2>Oculta</h2></a></div>
      </div>
      <div class="space"></div>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/jabon-antibrillo-altex.png" alt="Jabón antibrillo Altex">
        </div>
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/limpieza-profunda.png">
          <ul class="lista">
            <li>Limpia profundamente y elimina la grasa.</li>
            <li>Elimina el exceso de grasa y así evitarás que los barritos o espinillas se alojen de nuevo en tu cara.</li>
          </ul>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 20831)) ?>"><img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
        </div>
      </div>
      <div class="space"></div>
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/espuma-limpiadora-altex.png" alt="Espuma limpiadora Altex">
        </div>
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/piel-delicada.png">
          <ul class="lista">
            <li>Cuida mientras previene las imperfecciones.</li>
            <li>Se convierte en una suave espuma que cuando te la aplicas, previene las imperfecciones.</li>
          </ul>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 20830)) ?>"><img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
        </div>
      </div>
      <div class="space"></div>
      <div class="row">
          <div class="col-sm-6 col-md-6">
            <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/gel-exfoliante.png" alt="Gel exfoliante Altex">
          </div>
          <div class="col-sm-6 col-md-6">
            <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/puntos-negros.png">
            <ul class="lista">
              <li>Elimina puntos negros y espinillas.</li>
              <li>Gel con microgránulos y extracto natural de árbol de té que exfolia tu casa suavemente, evitando que tus poros se obstruyan.</li>
            </ul>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 47129)) ?>"><img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
          </div>
        </div>
      <div class="space"></div>
      <div class="row">
          <div class="col-sm-6 col-md-6">
            <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/antibrillo-altex.png" alt="Láminas antibrillo Altex">
          </div>
          <div class="col-sm-6 col-md-6">
            <img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/1-previene/piel-brillante.png">
            <ul class="lista">
              <li>Estas novedosas Láminas Antibrillo remueven de forma inmediata el exceso de grasa, evitando el molesto brillo en tu rostro.</li>
            </ul>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 106229)) ?>"><img class="img-responsive" style="margin-top: -23px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/compra-online.png"></a>
          </div>
        </div>
      <div class="row">
          <img class="img-responsive" style="margin:50px auto 0;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/altex/beneficios-altex.png" alt="Descubre más beneficios de Altex">
        </div>
      <div class="row section-video">
          <div class="col-sm-6 col-md-6">
            <div class="videoWrapper">
              <iframe width="560" height="349" src="https://www.youtube.com/embed/rORa68jubM4?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="videoWrapper">
              <iframe width="560" height="349" src="https://www.youtube.com/embed/bA-KoBuyJbw?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
