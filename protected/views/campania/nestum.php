<?php $this->pageTitle = "Nestum - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=' Los cereales infantiles NESTUM® están hechos a base de cereales adicionados con nutrientes y probióticos que ayudan al crecimiento y desarrollo del bebé.'>
  <meta name='keywords' content='nestum, nestle nestum, nestum cereales.'>
	<style>
    @font-face { font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Bold.otf);}
    @font-face { font-family:VAGRoundedStd-Thin; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Thin.otf);}
    @font-face { font-family:VAGRoundedStd-Black; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Black.otf);}
    @font-face { font-family:VAGRoundedStd-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/fonts/VAGRoundedStd-Light.otf);}
    .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/bg.png);background-size: cover;}
    .bg-color {background-color: #FEFACD;display: inline-block;margin: 100px 53px 30px;padding: 123px 20px 0;border-radius: 25px;}
    .title-dashed {font-family: VAGRoundedStd-Bold;color: #fff;margin: 116px 49px 0;position: absolute;font-size: 35px;}
    .bg-beneficios {margin-top: 60px;width: 80%;}
    .lista {font-family: VAGRoundedStd-Thin;color: #1B3D7C;font-size: 25px;}
    .lista strong {font-family:VAGRoundedStd-Bold;font-weight: initial;}
    .compra-online {margin: 98px auto 49px;width: 80%;}
    .bg-conoce-como {background-color: #FEFACD;border-radius: 25px;padding: 50px 20px 25px;}
    .title-dashed-know-more {margin-top: -70px !important;font-family: VAGRoundedStd-Bold;color: #fff;font-size: 25px;text-align: center;position: relative;background-image: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/home/divertidas-formas-de.png);padding: 15px;background-repeat: no-repeat;background-size: 85%;background-position: center center;margin: 0;}
    .btn-conoce-como {margin-top: -24px;font-family: VAGRoundedStd-Bold;color: #fff;font-size: 25px;text-align: center;background-image: url(" . Yii::app()->request->baseUrl . "/images/contenido/nestum/home/conoce-mas-aqui.png);padding: 14px 0;background-position: center center;background-size: 44%;background-repeat: no-repeat;}
    .title-principal {text-align: center;font-family: VAGRoundedStd-Black;color: #244B98;-webkit-text-stroke: 2px #fff;font-size: 40px;}
    .video-container {position: relative;padding-bottom: 56.25%;padding-top: 35px;height: 0;overflow: hidden;}
    .video-container iframe { position: absolute;top:0;left: 0;width: 100%;height: 100%;}
    .necesita-hierro {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 25px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/necesita-hierro.png);padding: 15px;background-repeat: no-repeat;background-size: 100%;background-position: center center;margin: 0;}
    .necesita-nutrientes {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 25px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/necesita-nutrientes.png);padding: 15px;background-repeat: no-repeat;background-size: 100%;background-position: center center;margin: 0;}
    .bg-videos {padding: 50px 20px 20px;margin:-35px 20px;background-color: #FEFACD;border-radius: 15px;}
    .estomaguito-de-tu-bebe {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 23px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/el-estomaguito-de-tu-bebe.png);padding: 15px;background-repeat: no-repeat;background-size: 81%;background-position: center center;margin: 0;}
    .cinco-veces-mas {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 23px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/5-veces-mas.png);padding: 15px;background-repeat: no-repeat;background-size: 100%;background-position: center center;margin: 0;}
    .conoce-mas {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 23px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/conoce-mas-aqui.png);padding: 15px;background-repeat: no-repeat;background-size: 47%;background-position: center center;margin: 0;}
    .legal {font-family: VAGRoundedStd-Light;text-align: center;color: #000;font-size: 20px;margin: 45px 0 20px;}
    .footer {background-color:#fff;font-family: VAGRoundedStd-Bold;    font-size: 23px;padding: 35px;}
    .footer span {color:#E57720;}
    .facebook {width: 30px;display: inline-block;height: 22px;}
    .footer .izq {text-align: right;line-height: 27px;margin-top: 8px;border-right: 2px solid #244B98;}
    .footer .der {text-align: left;line-height: 27px;}
    .footer a {color:#04478E;}
    .space-1 {height: 0px !important;}
    .img-responsive-m{width:100%;}
    .title-dashed-m {margin-top: 10px;font-family: VAGRoundedStd-Bold;color: #fff;font-size: 22px;text-align: center;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/conoce-mas-aqui.png);padding: 14px 0;background-position: center center;background-size: 97%;background-repeat: no-repeat;font-weight: initial;}
    .bg-color-m {margin-left: 15px;margin-right: 15px;border-radius: 25px;background-color: #FEFACD;margin-top: 20px;overflow: hidden;}
    .lista-m {font-family:VAGRoundedStd-Thin;color: #1B3D7C;font-size: 19px;}
    .btn-conoce-como-m {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 21px;text-align: center; background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/conoce-mas-aqui.png);padding: 14px 0;background-position: center center;background-size: 81%;background-repeat: no-repeat;position: relative; margin-top: -24px;}
    a {text-decoration:none !important;}
    .title-dashed-know-more-m {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 16px;text-align: center;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/5-veces-mas.png);padding: 15px;background-repeat: no-repeat;background-size: 100%;background-position: center center;margin: 0;}
    .title-principal-m{text-align: center;font-family: VAGRoundedStd-Black;color: #244B98;-webkit-text-stroke: 1px #fff;font-size: 18px;}
    .estomaguito-de-tu-bebe-m {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 14px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/el-estomaguito-de-tu-bebe.png);padding: 14px;background-repeat: no-repeat;background-size: 81%;background-position: center center;margin: 0;margin-top: 0px;font-weight: initial;}
    .cinco-veces-mas-m {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 14px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/5-veces-mas.png);padding: 15px;background-repeat: no-repeat;background-size: 100%;background-position: center center;margin-top: 20px;font-weight: initial;}
    .conoce-mas-m {font-family: VAGRoundedStd-Bold;color: #fff;font-size: 18px;text-align: center;position: relative;background-image: url(".Yii::app()->request->baseUrl."/images/contenido/nestum/home/conoce-mas-aqui.png);padding: 15px;background-repeat: no-repeat;background-size: 66%;background-position: center center;margin-top: 10px;}
    .legal-m {font-family: VAGRoundedStd-Light;text-align: center;color: #000;font-size: 12px;margin: 10px 15px 10px;}
</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<div class="background">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/banner.png">
    <div class="bg-color-m">
      <h2 class="title-dashed-m">Beneficios de NESTUM <sup>®</sup></h2>
      <ul class="lista-m">
        <li>Están enriquecidos con más de <strong>10 Vitaminas y Minerales.</strong></li>
        <li>Son de <strong>fácil digestión.</strong></li>
        <li>Son <strong>instantáneos</strong> (no requiere cocción) y muy <strong>fáciles de preparar.</strong></li>
        <li>No necesitan <strong>adición de azúcar.</strong></li>
        <li>Tienen <strong>variedad de sabores</strong> según la edad del niño.</li>
        <li>únicos con <strong>Probioticos BL</strong> (Bifidobacterium Lactis).</li>
        <li>Ayudan a la buena digestión de los bebés y evitan el estreñimiento y los episodios de diarreas.</li>
        <li>Contribuyen a generar sensación de saciedad, regulando el consumo de otros alimentos.</li>
      </ul>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/bebe.png">
    </div>
    <a href="<?php echo CController::createUrl('/catalogo/buscar?busqueda=nestum') ?>">
      <img class="img-responsive-m" style="margin: 17px auto;width: 87%;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/comprar-online.png">
    </a>
    <div class="bg-color-m">
      <h2 class="title-dashed-know-more-m">Divertidas formas de preparar NESTUM <sup>®</sup></h2>
      <img style="padding: 0 4%;" class="img-responsive-m " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/divertidas-formas.png">
      <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestum-cereales-infantiles">
        <h2 class="btn-conoce-como-m">Conoce cómo, AQUÍ</h2>
      </a>
    </div>
    <h2 class="title-principal-m">¿SABES TODO LO QUE NECESITA LA PEQUEÑA BARRIGUITA DE TU HIJO?</h2>
    <h2 class="necesita-hierro">Necesita Hierro</h2>
    <div class="bg-videos" style="margin-bottom:0px;">
      <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/1Dqs4MjUvuo?&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <h2 class="necesita-nutrientes">Necesita Nutrientes</h2>
    <div class="bg-videos">
      <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/_HH3nWNiHB8?&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <h2 class="title-principal" style="font-size: 30px;margin-top: 55px;">¿SABÍAS QUE?</h2>
    <div class="bg-videos" style="margin: 0px 20px; padding: 0px;">
        <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/estomaguito-de-tu-bebe.png">
    </div>
    <h2 class="estomaguito-de-tu-bebe-m" style="margin-top: -30px;">El estomaguito de tu bebé <br> es tan pequeño como su piecito</h2>

    <h2 class="cinco-veces-mas-m">Un niño necesita hasta 5 veces <br> más nutrientes que un adulto</h2>
    <div class="bg-videos" style="padding: 18px 20px 20px;">
      <img  class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/un-nino-necesita-5-veces-mas.png">
    </div>
    <a href="<?= Yii::app()->request->baseUrl ?>/sabias-que-nestum-cereales-infantiles">
      <h2 class="conoce-mas-m">Conoces más, AQUÍ</h2>
    </a>
    <p class="legal-m">
      <strong>Aviso importante:</strong> La leche materna es el mejor alimento para el niño. Los Cereales Infantiles NESTUM <sup>®</sup> <br>
      son un alimento complementario de la leche materna a partir de los 6 meses o de la edad indicada en el empaque.
    </p>
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
  </div>
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<div class="background">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/banner.png">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <div style="position: absolute;">
          <h2 class="title-dashed">Beneficios de NESTUM <sup>®</sup></h2>
          <img class="img-responsive bg-beneficios " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/beneficios.png">
        </div>
        <div class="bg-color">
          <div class="row">
            <ul class="lista">
              <li>Están enriquecidos con más de <strong>10 Vitaminas y Minerales.</strong></li>
              <li>Son de <strong>fácil digestión.</strong></li>
              <li>Son <strong>instantáneos</strong> (no requiere cocción) y muy <strong>fáciles de preparar.</strong></li>
              <li>No necesitan <strong>adición de azúcar.</strong></li>
              <li>Tienen <strong>variedad de sabores</strong> según la edad del niño.</li>
            </ul>
          </div>
          <div class="row" style="margin-bottom:15px;">
            <div class="col-sm-6 col-md-6" style="padding: 0px;">
              <img style="margin-left: -5px;" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/bebe.png">
            </div>
            <div class="col-sm-6 col-md-6" style="padding: 0px;">
              <ul class="lista">
                <li>únicos con <strong>Probioticos BL</strong> <br> (Bifidobacterium Lactis).</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <ul class="lista">
              <li>Ayudan a la buena digestión de los bebés y evitan el estreñimiento y los episodios de diarreas.</li>
              <li>Contribuyen a generar sensación de saciedad, regulando el consumo de otros alimentos.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
        <a href="<?php echo CController::createUrl('/catalogo/buscar?busqueda=nestum') ?>"><img class="img-responsive compra-online" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/comprar-online.png"></a>
        <div class="bg-conoce-como">
          <h2 class="title-dashed-know-more">Divertidas formas de preparar NESTUM <sup>®</sup></h2>

            <img style="padding: 0 4%;" class="img-responsive " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/divertidas-formas.png">
        </div>
        <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestum-cereales-infantiles">
          <h2 class="btn-conoce-como">Conoce cómo, AQUÍ</h2>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2 class="title-principal">¿SABES TODO LO QUE NECESITA LA PEQUEÑA BARRIGUITA DE TU HIJO?</h2>
      </div>
        <div class="col-sm-offset-1 col-md-offset-1 col-sm-5 col-md-5">
          <h2 class="necesita-hierro">Necesita Hierro</h2>
          <div class="bg-videos">
            <div class="video-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/1Dqs4MjUvuo?&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class=" col-sm-5 col-md-5 ">
          <h2 class="necesita-nutrientes">Necesita Nutrientes</h2>
          <div class="bg-videos">
            <div class="video-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/_HH3nWNiHB8?&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-12">
        <h2 class="title-principal">¿SABÍAS QUE?</h2>
      </div>
      <div class="col-sm-offset-1 col-md-offset-1 col-sm-5 col-md-5">
        <div class="bg-videos" style="margin: 0;padding: 0px;">
            <img style="width: 82%;margin: 0 auto;" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/estomaguito-de-tu-bebe.png">
        </div>
        <h2 class="estomaguito-de-tu-bebe" style="margin-top: -63px;">El estomaguito de tu bebé <br> es tan pequeño como su piecito</h2>
      </div>
      <div class=" col-sm-5 col-md-5 ">
        <h2 class="cinco-veces-mas">Un niño necesita hasta 5 veces <br> más nutrientes que un adulto</h2>
        <div class="bg-videos">
          <img  class="img-responsive " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nestum/home/un-nino-necesita-5-veces-mas.png">
        </div>
        <a href="<?= Yii::app()->request->baseUrl ?>/sabias-que-nestum-cereales-infantiles"><h2 class="conoce-mas">Conoces más, AQUÍ</h2></a>
      </div>
    </div>
    <div class="row">
      <p class="legal">
        <strong>Aviso importante:</strong> La leche materna es el mejor alimento para el niño. Los Cereales Infantiles NESTUM <sup>®</sup> <br>
        son un alimento complementario de la leche materna a partir de los 6 meses o de la edad indicada en el empaque.
      </p>
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
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
