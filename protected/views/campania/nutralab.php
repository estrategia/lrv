<?php $this->pageTitle = "Healthy Sports - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=': Las proteínas de Healthy Sports, ISO WHEY 100% y ENDURE 12 H, ideales para las personas que se ejercitan y quieren preservar o potenciar masa muscular, entre otros beneficios.'>
  <meta name='keywords' content='proteínas para aumentar masa muscular, batidos de proteínas, proteínas para ganar masa muscular.'>
  <style>
    @font-face {font-family:HelveticaLTStd-BlkCondObl; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nutralab/fonts/HelveticaLTStd-BlkCondObl.otf);}
    @font-face {font-family:HelveticaLTStd-BlkCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nutralab/fonts/HelveticaLTStd-BlkCond.otf);}
    @font-face {font-family:HelveticaLTStd-BoldCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nutralab/fonts/HelveticaLTStd-BoldCond.otf);}
    @font-face {font-family:HelveticaLTStd-Roman; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nutralab/fonts/HelveticaLTStd-Roman.otf);}
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 260px;}
    .section-iso-whey {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nutralab/escritorio/iso-whey/background.jpg); background-size: 100% 100%;}
    .name-product {font-family: HelveticaLTStd-BlkCondObl;color: #fff;font-size: 70px;margin-top: 50px;}
    .gramos {font-family: HelveticaLTStd-BlkCond;font-size: 30px;color: #363634;border-top: 2px solid #363634;display: inline-block;border-bottom: 2px solid #363634;padding: 10px 0;margin: 0;}
    .gramos span {font-size: 36px;}
    .descrip {color: #363634;font-family: HelveticaLTStd-BoldCond;margin-top: 15px;font-size: 17px;line-height: 19px;letter-spacing: -1px;margin-bottom: 30px;}
    .ico {width: 65%;margin: 0 auto;display: block;}
    .ico:hover {transform: scale(0.9);-ms-transform: scale(0.9);-moz-transform: scale(0.9);-webkit-transform: scale(0.9);-o-transform: scale(0.9);transition: all 0.4s ease-in-out 0s;}
    .text-ico {font-family: HelveticaLTStd-BoldCond;letter-spacing: -1px;font-size: 20px;text-align: center;margin-top: 5px;color: #363634;line-height: 17px;}
    .beneficios {margin-left: 43%;float: left;margin-top: 15px;margin-bottom: 23px;}
    .componentes {font-family: HelveticaLTStd-BoldCond;letter-spacing: -1px;color: #363634;margin-top: 32px;font-size: 16px;}
    .componentes span {font-family: HelveticaLTStd-BlkCond;}
    .section-endure-12h{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nutralab/escritorio/endure-12h/background.jpg); background-size: 100% 100%;}
    .section-conoce-mas{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nutralab/escritorio/background.jpg); background-size: 100% 100%;}
    .conoce-mas{margin: 25px auto;width: 35%;}
    .video {position: relative; padding-bottom: 56.25%;overflow: hidden;}
    .video iframe {position: absolute;display: block;top: 0;left: 0;width: 100%;height: 100%;}
    .text-legal {font-family: HelveticaLTStd-Roman;padding: 30px 54px 0px;text-align: center;font-size: 16px;}
    .web {margin: 0 auto;width: 50%;}
    .empaque-iso-whey {margin-top: 25%;}
    .empaque-endure12h {margin-top: 7%;}
    @media (min-width: 1000px) and (max-width: 1199px){.empaque-iso-whey {margin-top: 50%;}.empaque-endure12h {margin-top: 35%;}}
    .section-iso-whey-m {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nutralab/movil/background-iso-whey.jpg); background-size: 100% 100%;}
    .name-product-m {margin-top: -5px;text-align: center;font-size: 38px;padding-top: 22px;color: #fff;font-family: HelveticaLTStd-BlkCondObl;margin-bottom: 0px;}
    .flex-container{display: flex;align-items: center;margin-bottom: 15px;}
    .ico-m {width: 20%;margin: initial;}
    .text-ico.m {text-align: left;margin-left: 15px;}
    .section-endure-12h-m{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nutralab/movil/background-endure.jpg); background-size: 100% 100%;}
    .section-conoce-mas-m{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nutralab/movil/background-conoce-mas.jpg); background-size: 100% 100%;}
    .conoce-mas-m {margin: 25px auto;width: 100%;}
  </style>
  ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Version movil-->
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/movil/banner.jpg" alt="Nutralab">
<section class="section-iso-whey-m">
  <div style="padding: 0 25px;">
    <h2 class="name-product-m">ISO WHEY 100%</h2>
    <h4 class="gramos" style="font-size: 18px;display: inherit;text-align: center;" ><span style="font-size: 22px;">28.6 GR</span> de proteína por servicio</h4>
    <p class="descrip" style="margin-bottom: 5px;">Alimento en polvo a base de proteína aislada de suero:
    Es la forma más pura de la proteína de suero. Se consigue filtrando
    la proteína de leche lo suficiente para que quede libre de lactosa,
    hidratos de carbono, grasas y colesterol.
    </p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/movil/iso-whey.png" alt="Iso whey 100%">
    <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117367)) ?>">
      <img class="img-responsive-m" style="margin:20px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/compra-online.png" alt=" Compra Iso whey 100%">
    </a>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/intolerantes-lactosa.png" alt="Para intoletantes a la lactosa">
      <p class="text-ico m">Para intolerantes a la lactosa</p>
    </div>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/incrementa-masa-muscular.png" alt="Incrementa la masa muscular">
      <p class="text-ico m">Incrementa la masa muscular</p>
    </div>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/bajos-niveles-grasa.png" alt="Mantiene bajos los niveles de grasa">
      <p class="text-ico m">Mantiene bajos los niveles de grasa</p>
    </div>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/incrementa-proteina.png" alt="Incrementa la síntesis de proteína ">
      <p class="text-ico m">Incrementa la síntesis de proteína </p>
    </div>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/acelera-metabolismo.png" alt="Acelera el metabolismo">
      <p class="text-ico m">Acelera el metabolismo</p>
    </div>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/absorcion-rapida.png" alt="Absorción rápida">
      <p class="text-ico m">Absorción rápida</p>
    </div>
    <p class="componentes" style="padding-bottom: 25px;"><span>COMPONENTES ISO WHEY 100%: </span>
      Calorías 114, proteína 28,9 g, colesterol 0 mg,carbohidratos 0g, sodio 105 mg,
       aminoácidos esenciales: Leucina, isoleucina y valina, enzimas digestivas:
       Papaina 52 mg y amilasa 52 mg.</p>
  </div>
</section>
<section class="section-endure-12h-m" style="margin-top: -16px;">
  <div style="padding: 0 25px;">
    <h2 class="name-product-m">ENDURE 12H</h2>
    <h4 class="gramos" style="font-size: 18px;display: inherit;text-align: center;"><span style="font-size: 22px;">26 GR</span> de proteína por servicio</h4>
    <p class="descrip" style="margin-bottom: 5px;">La fórmula endure contiene proteínas que se digieren más lentamente
    y son absorbidas de manera gradual. Ideal para cuando el cuerpo deba mantenerse sin
    ingerir alimentos y así tener un suministro continúo de proteína.
    </p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/movil/endure-12h.png" alt="Endure 12H">
    <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117028)) ?>">
      <img class="img-responsive-m" style="margin:20px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/compra-online.png" alt=" Compra Iso whey 100%">
    </a>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/endure-12h/previene-catabolismo.png" alt="previene catabolismo muscular">
      <p class="text-ico m">Previene <br> el catabolismo muscular</p>
    </div>
    <div class="flex-container">
      <img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/endure-12h/favorece-recuperacion-muscular.png" alt="Favorece la recuperación muscular">
      <p class="text-ico m">Favorece la síntesis <br> y recuperación de <br> la masa muscular</p>
    </div>
    <p class="componentes" style="padding-bottom: 25px;"><span>COMPONENTES ENDURE 12H: </span>
       L-glutamina: aminoácido que participa en la reconstrucción y formación de los tejidos
       y BCAA’s que estimulan la síntesis de proteína conllevando al crecimiento muscular.
    </p>
  </div>
</section>
<section class="section-conoce-mas-m" style="margin-top: -16px;">
  <div style="padding: 0 25px;">
    <img class="img-responsive-m conoce-mas-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/conoce-mas.png" alt="Conoce más">
    <div class="video" style="margin-bottom: 30px;">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/tSavcPEjb-I?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="video">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/FQLQvR1DArs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <p class="text-legal" style="margin-top: 15px;padding: 0;font-size: 12px;">Iso whey 100% por 908 gramos - 27 servicios. Registro INVIMA: RSA INVIMA 000440-2015.
     Alimento en polvo a base de proteína aislada de suero. Endure 12 h por 910 gramos y- 22
     servicios. Registro INVIMA: RSA INVIMA 000442-2015. Alimento en polvo a base de proteína.
    </p>
    <a href="https://www.healthysports.com.co/" target="_blank">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/www.healthysports.com.png" alt="www.healthysports.com">
    </a>
  </div>
</section>
<!--Versión escritorio-->
<?php else: ?>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2778)) ?>"><div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/bnt-fijo.png" alt="Compra online"></div></a>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/banner-nutralab.jpg" alt="Nutralab">
<section class="section-iso-whey">
  <div class="container">
    <div class="col-sm-6 col-md-6">
      <div class="row">
        <h2 class="name-product">ISO WHEY 100%</h2>
        <h4 class="gramos"><span>28.6 GR</span> de proteína por servicio</h4>
        <p class="descrip">Alimento en polvo a base de proteína aislada de suero:
          Es la forma más pura de la proteína de suero. Se consigue filtrando
          la proteína de leche lo suficiente para que quede libre de lactosa,
          hidratos de carbono, grasas y colesterol.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/intolerantes-lactosa.png" alt="Para intoletantes a la lactosa">
          <p class="text-ico">Para intolerantes <br> a la lactosa</p>
        </div>
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/incrementa-masa-muscular.png" alt="Incrementa la masa muscular">
          <p class="text-ico">Incrementa <br> la masa muscular</p>
        </div>
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/bajos-niveles-grasa.png" alt="Mantiene bajos los niveles de grasa">
          <p class="text-ico">Mantiene bajos <br> los niveles de grasa</p>
        </div>
      </div>
      <div class="row" style="margin-top: 25px;">
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/incrementa-proteina.png" alt="Incrementa la síntesis de proteína ">
          <p class="text-ico">Incrementa la síntesis <br> de proteína </p>
        </div>
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/acelera-metabolismo.png" alt="Acelera el metabolismo">
          <p class="text-ico">Acelera <br> el metabolismo</p>
        </div>
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/absorcion-rapida.png" alt="Absorción rápida">
          <p class="text-ico">Absorción rápida</p>
        </div>
      </div>
      <div class="row">
        <img class="img-responsive beneficios" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/beneficios-tecnicos.png" alt="Beneficios técnicos ">
          <p class="componentes"><span>COMPONENTES ISO WHEY 100%: </span>
            Calorías 114, proteína 28,9 g, colesterol 0 mg,<br>
            carbohidratos 0g, sodio 105 mg, aminoácidos esenciales: Leucina, isoleucina <br>
            y valina, enzimas digestivas: Papaina 52 mg y amilasa 52 mg.
          </p>
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
      <img class="img-responsive empaque-iso-whey" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/iso-whey/iso-whey.png" alt="Iso whey 100%">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117367)) ?>">
        <img class="img-responsive" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/compra-online.png" alt=" Compra Iso whey 100%">
      </a>
    </div>
  </div>
</section>
<section class="section-endure-12h">
  <div class="container">
    <div class="col-sm-6 col-md-6">
      <div class="row">
        <h2 class="name-product">ENDURE 12H</h2>
        <h4 class="gramos"><span>26 GR</span> de proteína por servicio</h4>
        <p class="descrip">La fórmula endure contiene proteínas que se digieren más lentamente
          y son absorbidas de manera gradual. Ideal para cuando el cuerpo deba mantenerse sin
          ingerir alimentos y así tener un suministro continúo de proteína.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/endure-12h/previene-catabolismo.png" alt="previene catabolismo muscular">
          <p class="text-ico">Previene <br> el catabolismo muscular</p>
        </div>
        <div class="col-sm-4 col-md-4">
          <img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/endure-12h/favorece-recuperacion-muscular.png" alt="Favorece la recuperación muscular">
          <p class="text-ico">Favorece la síntesis <br> y recuperación de <br> la masa muscular</p>
        </div>
      </div>
      <div class="row">
        <img class="img-responsive beneficios" style="margin-left: 35%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/endure-12h/beneficios.png" alt="Beneficios técnicos ">
          <p class="componentes"><span>COMPONENTES ENDURE 12H: </span>
             L-glutamina: aminoácido que participa <br>
            en la reconstrucción y formación de los tejidos y BCAA’s que estimulan <br>
            la síntesis de proteína conllevando al crecimiento muscular.
          </p>
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
      <img class="img-responsive empaque-endure12h" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/escritorio/endure-12h/endure-12h.png" alt="Endure 12H">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 117028)) ?>">
        <img class="img-responsive" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/compra-online.png" alt=" Compra Iso whey 100%">
      </a>
    </div>
  </div>
</section>
<section class="section-conoce-mas">
  <div class="container">
    <div class="row">
      <img class="img-responsive conoce-mas" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/conoce-mas.png" alt="Conoce más">
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <div class="video">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/tSavcPEjb-I?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
        <div class="video">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/FQLQvR1DArs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="row">
      <p class="text-legal">Iso whey 100% por 908 gramos - 27 servicios. Registro INVIMA: RSA INVIMA 000440-2015.
         Alimento en polvo a base de proteína aislada de suero. Endure 12 h por 910 gramos y- 22
         servicios. Registro INVIMA: RSA INVIMA 000442-2015. Alimento en polvo a base de proteína.
       </p>
       <a href="https://www.healthysports.com.co/" target="_blank">
         <img class="img-responsive web" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nutralab/www.healthysports.com.png" alt="www.healthysports.com">
       </a>
    </div>
  </div>
</section>
<!--Fin versión escritorio
<?php endif; ?>
