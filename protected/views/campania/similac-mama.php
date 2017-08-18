<?php $this->pageTitle = "Similac Mamá  - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='SIMILAC® MAMÁ. Alimento a base de leche en polvo descremada, con vitaminas y minerales para mujeres embarazadas y en periodo de lactancia.'>
  <meta name='keywords' content='Similac mamá, similac, suplementos para embarazadas.'>
	<!-- styles -->
	<style>
		@font-face {
		    font-family:BrandonGrotesque-Bold ;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/BrandonGrotesque-Bold.otf);
		}
    @font-face {
        font-family:HelveticaNeueLTStd-Lt_0 ;
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/HelveticaNeueLTStd-Lt_0.otf);
    }
    @font-face {
        font-family: SourceSansPro-It;
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/SourceSansPro-It.otf);
    }
    @font-face {
        font-family: kbreindeergames;
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/kbreindeergames.ttf);
    }
    @font-face {
        font-family: BrandonGrotesque-Regular_0;
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/BrandonGrotesque-Regular_0.otf);
    }
    .img-responsive-m {width:100%;}
		.sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .gray {background-color:#ECECEC;padding: 30px 0;margin-top: 15px;}
    .space-1 {height: 0px !important;}
    .bn-principal {border-top: 10px solid #D3A452;}
    .header h2 {font-family:BrandonGrotesque-Bold;color:#1D98D3;text-align: center;font-size: 33px;}
    .header img {margin:0 auto;}
    .header .marcas img:hover {-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    @-webkit-keyframes wobble-to-top-right {
    	16.65% {-ms-transform: translate(8px, -8px);-webkit-transform: translate(8px, -8px);transform: translate(8px, -8px);}
    	33.3% {-ms-transform: translate(-6px, 6px);-webkit-transform: translate(-6px, 6px);transform: translate(-6px, 6px);}
    	49.95% {-ms-transform: translate(4px, -4px);-webkit-transform: translate(4px, -4px);transform: translate(4px, -4px);}
      66.6% {-ms-transform: translate(-2px, 2px);-webkit-transform: translate(-2px, 2px);transform: translate(-2px, 2px);}
    	83.25% {-ms-transform: translate(1px, -1px);-webkit-transform: translate(1px, -1px);transform: translate(1px, -1px);}
    	100% {-ms-transform: translate(0, 0);-webkit-transform: translate(0, 0);transform: translate(0, 0);}
    }
    .flecha {margin-top: -7% !important;margin-left: 32% !important;}
    .flecha:hover {-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    .content1 {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/abbot/similac-mama/fondo1.png);background-size:cover;}
    .content1 img {margin:0 auto;}
    .content2 {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/abbot/similac-mama/banner-secundario-sin-texto.png);background-size:cover;}
    .content3 {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/abbot/similac-mama/fondo2.png);background-size:cover;padding: 50px 0 0;}
    .txt-fotter{ font-family:HelveticaNeueLTStd-Lt_0; text-align:center;font-size: 16px;color:#fff;margin: 25px 0;}
    .text-footer-b {  font-family: SourceSansPro-It;color: #fff;text-align: center;font-size: 19px}
    .descrip-product {color:#7C3591;text-align:center;  font-family:BrandonGrotesque-Bold;font-size: 20px;}
    .content2 h3 {font-family: kbreindeergames;color: #7D2E8A;font-size: 50px;}
    .conten {padding: 6% 5% 0% !important;}
    .sub {color: #783288;font-style: italic;font-size: 17px;font-family: BrandonGrotesque-Regular_0;font-weight: bold;line-height: 19px;margin-bottom: 20px;}
    .sub-text{  color: #783288;font-size: 28px;font-family: BrandonGrotesque-Regular_0;font-weight: bold;display: inline-block;}
    .conten .list {display: inline-table !important;color:#783288;font-family: BrandonGrotesque-Regular_0;font-size: 24px;list-style: none;padding-left: 20px;}
    .bullet {font-size: 30px;}
    .container.marcas.movil img {width: initial;display: block;}
    .header-m h2 {font-size: 17px;padding: 0px 18px;}
    .flecha-m {margin-top: -9% !important;margin-left: 20% !important;width: 21%;}
    .pack-m {margin-left: 10% !important;width: 90%;}
    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;margin: 0px 0px 15px; }
    .embed-container iframe,
    .embed-container object,
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
	</style>
    ";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<section>
  <!--Header-->
  <?php require 'headerAbbott-movil.php'; ?>
  <!--Banner principal-->
  <img class="img-responsive-m bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/banner-principal.png" alt="Similac Mamá">
</section>
<!-- content 1 -->
<div class="content1" style="margin-top: -5px;padding: 0px 16px;">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/mi-mama-se-cuida-para-cuidarme-1.png" alt="Mi Mamá se cuida para cuidarme">
  <img class="img-responsive-m flecha flecha-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/bajo-en-grasa.png" alt= "Bajo en grasa">
  <img class="img-responsive-m pack-m" style="margin-left: 36%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/pack-similac-mama.png" alt= "Pack Similac Mamá">
  <p class="descrip-product">SIMILAC MAMÁ LATA 400gr</p>
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 19106)) ?>" data-ajax="false">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/boton.png">
  </a>
  <img class="img-responsive-m" style="margin: 35px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/los-nutre-bien-por-que-les-sienta-bien.png" alt="Los nutre bien por que les sienta bien">
</div>
<!-- content 2 -->
<div class="content2" style="padding: 0px 16px;">
  <div class="col-md-12 conten">
    <h3 style="text-align: center;margin-bottom: 10px;">Beneficios:</h3>
    <p class="sub" style="font-size: 18px;text-align: justify;">Ayuda a cubrir las demandas nutricionales específicas de la madre y del bebé en desarrollo, durante el embarazo y en periodo de lactancia.</p>
    <p class="sub-text" style="margin: 0;">Para ti:
      <ul class="list" style="margin: 0;">
        <li style="font-size: 20px;"><span class="bullet">&#8226;</span> Es fuente de vitaminas y minerales, prepara tu cuerpo<br> para las exigencias del embarazo y la lactancia.</li>
        <li style="font-size: 20px;"><span class="bullet">&#8226;</span> Bajo en grasa para un aumento de peso saludable.</li>
        <li style="font-size: 20px;"><span class="bullet">&#8226;</span> Proteína, calcio y fibra prebiótica.</li>
      </ul>
    </p>
    <p class="sub-text" style="margin: 0;">Para tu bebé:
    <ul class="list" style="margin: 0 0 30px 0;">
        <li style="font-size: 20px;"><span class="bullet">&#8226;</span> DHA, ácido fólico y hierro.</li>
    </ul>
    <p>
  </div>
</div>
<!-- content 3 -->
<div class="content3" style="padding:25px 16px;margin-top: -16px;">
  <section>
    <div class='embed-container'><iframe src='https://www.youtube.com/embed/tsdh2IkyQg8?rel=0' frameborder='0' allowfullscreen></iframe></div>
  </section>
  <section>
    <div class='embed-container'><iframe src='https://www.youtube.com/embed/FylpVsPf4Ms?rel=0' frameborder='0'  allowfullscreen></iframe></div>
  </section>
  <section>
    <p class="txt-fotter">
      Similac® MAMÁ. Alimento a base de leche en polvo descremada, con vitaminas y minerales para mujeres embarazadas y en periodo de lactancia.
      Registro Sanitario: RSiA02I51012. Este producto no reemplaza una alimentación adecuada.
    </p>
    <p class="text-footer-b">Conoce más en nuestra página <a style="color:#fff;text-decoration:underline;" href="http://www.similacmama.co" target="_blank">www.similacmama.co</a></p>
  </section>
</div>
<!---FIN VERSIÓN MÓVIL-->


<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<!-- <div class="sidebar-cart">
	<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/general/compra-online.png" alt="Compra online Similac Mamá">
</div> -->
<!--Header-->
<?php require 'headerAbbott.php'; ?>
<!--Banner principal-->
<img class="img-responsive bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/banner-principal.png" alt="Similac Mamá">
<!-- content 1 -->
<div class="container content1">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/mi-mama-se-cuida-para-cuidarme-1.png" alt="Mi Mamá se cuida para cuidarme">
  <img class="img-responsive flecha" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/bajo-en-grasa.png" alt= "Bajo en grasa">
  <img class="img-responsive" style="margin-left: 36%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/pack-similac-mama.png" alt= "Pack Similac Mamá">
  <p class="descrip-product">SIMILAC MAMÁ LATA 400gr</p>
  <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 19106)) ?>">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/boton.png">
  </a>
  <img class="img-responsive" style="margin: 35px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/similac-mama/los-nutre-bien-por-que-les-sienta-bien.png" alt="Los nutre bien por que les sienta bien">
</div>
<!-- content 2 -->
<div class="container content2" style="height:488px;">
  <div class="col-md-12 conten">
    <h3>Beneficios:</h3>
    <p class="sub">Ayuda a cubrir las demandas nutricionales específicas de la madre y del bebé en desarrollo, <br> durante el embarazo y en periodo de lactancia.</p>
    <p class="sub-text">Para ti:
      <ul class="list">
        <li><span class="bullet">&#8226;</span> Es fuente de vitaminas y minerales, prepara tu cuerpo<br> <span style="margin-left: 3.3%;">para las exigencias del embarazo y la lactancia.</span></li>
        <li><span class="bullet">&#8226;</span> Bajo en grasa para un aumento de peso saludable.</li>
        <li><span class="bullet">&#8226;</span> Proteína, calcio y fibra prebiótica.</li>
      </ul>
    </p>
    <p class="sub-text">Para tu bebé:
    <ul class="list">
        <li><span class="bullet">&#8226;</span> DHA, ácido fólico y hierro.</li>
    </ul>
    <p>
  </div>
</div>
<!-- content 3 -->
<div class="container content3">
  <div class="col-sm-6 col-md-6">
    <div class='embed-container'><iframe src='https://www.youtube.com/embed/tsdh2IkyQg8?rel=0' frameborder='0' allowfullscreen></iframe></div>
  </div>
  <div class="col-sm-6 col-md-6">
    <div class='embed-container'><iframe src='https://www.youtube.com/embed/FylpVsPf4Ms?rel=0' frameborder='0'  allowfullscreen></iframe></div>
  </div>
  <div class="col-md-12">
    <p class="txt-fotter">
      Similac® MAMÁ. Alimento a base de leche en polvo descremada, con vitaminas y minerales para mujeres embarazadas y en periodo de lactancia.
      Registro Sanitario: RSiA02I51012. Este producto no reemplaza una alimentación adecuada.
    </p>
    <p class="text-footer-b">Conoce más en nuestra página <a style="color:#fff;text-decoration:underline;" href="http://www.similacmama.co" target="_blank">www.similacmama.co</a></p>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
