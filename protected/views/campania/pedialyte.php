<?php $this->pageTitle = "Pedialyte - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Pedialyte es una solución de rehidratación oral que está diseñado para reponer el agua y los electrolitos perdidos durante la diarrea o vómito.'>
  <meta name='keywords' content='Pedialyte, pedialyte suero, suero oral.'>
	<style>
    @font-face { font-family:BrandonGrotesque-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/BrandonGrotesque-Bold.otf);}
    @font-face { font-family:brandon_grotesque_reg; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/pedialyte/fonts/brandon_grotesque_reg.ttf);}
    @font-face { font-family:mercury_text_semibold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/pedialyte/fonts/mercury_text_semibold.ttf);}
    .img-responsive-movil {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .gray {background-color:#ECECEC;padding: 30px 0;margin-top: 15px;}
    .space-1 {height: 0px !important;}
    .header h2 {font-family:BrandonGrotesque-Bold;color:#1D98D3;text-align: center;font-size: 33px;}
    .header-m h2 {font-size: 17px;padding: 0px 18px;}
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
    .seccion-banner {position: relative;width: 100%;}
    .seccion-banner h1 {position: absolute;top: 57%;left: 7%;width: 100%;font-family: BrandonGrotesque-Bold;line-height: 60px;}
    .seccion-banner h1 .first {font-size: 45px;}
    .seccion-banner h1 .second {font-family:brandon_grotesque_reg;font-size: 52px;}
    .seccion-banner h1 .third {color:#D40E27;font-size: 52px;}
    .bg-gradient {
      background: rgba(235,235,235,1);/* Old Browsers */
      background: -moz-linear-gradient(top, rgba(235,235,235,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 85%, rgba(237,237,237,1) 100%); /* FF3.6+ */
      background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(235,235,235,1)), color-stop(19%, rgba(255,255,255,1)), color-stop(85%, rgba(255,255,255,1)), color-stop(100%, rgba(237,237,237,1)));/* Chrome, Safari4+ */
      background: -webkit-linear-gradient(top, rgba(235,235,235,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 85%, rgba(237,237,237,1) 100%); /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(top, rgba(235,235,235,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 85%, rgba(237,237,237,1) 100%); /* Opera 11.10+ */
      background: -ms-linear-gradient(top, rgba(235,235,235,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 85%, rgba(237,237,237,1) 100%); /* IE 10+ */
      background: linear-gradient(to bottom, rgba(235,235,235,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 85%, rgba(237,237,237,1) 100%);/* W3C */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ebebeb', endColorstr='#ededed', GradientType=0 );/* IE6-9 */
      border-bottom-right-radius: 150px;
      border-bottom-left-radius: 150px;
    }
    .title-principal {font-family:BrandonGrotesque-Bold;color:#E50426;font-size: 35pt;text-align: center; }
    .description-text {width: 200px;margin-top: 20px;border-bottom: 5px solid #D7D7D7;margin-bottom: 15px;font-family:BrandonGrotesque-Bold;}
    .description-text p {margin:0;}
    .name-product {color:#D40E29;font-size: 20px;}
    .description-text p:nth-child(3) {margin-bottom: 10px;}
    .sub-title {font-family: mercury_text_semibold;color: #223872;text-align: center;font-size: 50px;}
    .sub-title span {font-size: 60px;}
    .lista-descrip {font-family:brandon_grotesque_reg;color:#D70C29;font-size: 21px;}
    .title-fot {text-align:center;color:#DA0B27;font-family:BrandonGrotesque-Bold;font-size: 42px;margin-top: 90px;}
    .title-fot span {font-family:brandon_grotesque_reg;font-size: 52px; }
    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;margin: 0px 0px 15px; }
    .embed-container iframe,.embed-container object,.embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%;}
    .title-blue {background-color: #4496BB;color: #fff;padding: 14px 30px;width: 35%;border-bottom-right-radius: 45px;text-transform: uppercase;font-family: BrandonGrotesque-Bold;margin-bottom: 30px;}
    .text-blue {color:#2A8EB5;font-family:BrandonGrotesque-Bold}
    .text-red {color: #2E8DBD;font-family: BrandonGrotesque-Bold;text-transform: uppercase;}
    .text-blue p {margin-top: 30px;}
    .text-red p {margin-top: 30px;}
    .title-red {background-color: #DE0B2C;color: #fff;padding: 14px 30px;width: 35%;border-bottom-right-radius: 45px;text-transform: uppercase;font-family: BrandonGrotesque-Bold;margin-bottom: 30px;}
    .out-padding-right {padding-right: 0 !important;}
    .resset {padding: 0 !important;}
    .legal {color: #727272;font-size: 12px;margin-top:15px;}
    .gradient-footer {
      background: rgba(255,255,255,1);
      background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(250,250,250,1) 31%, rgba(242,242,242,1) 76%, rgba(218,218,218,1) 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(31%, rgba(250,250,250,1)), color-stop(76%, rgba(242,242,242,1)), color-stop(100%, rgba(218,218,218,1)));
      background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(250,250,250,1) 31%, rgba(242,242,242,1) 76%, rgba(218,218,218,1) 100%);
      background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(250,250,250,1) 31%, rgba(242,242,242,1) 76%, rgba(218,218,218,1) 100%);
      background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(250,250,250,1) 31%, rgba(242,242,242,1) 76%, rgba(218,218,218,1) 100%);
      background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(250,250,250,1) 31%, rgba(242,242,242,1) 76%, rgba(218,218,218,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#dadada', GradientType=0 );
    }
    @media (min-width: 770px) and (max-width: 1110px) {
      .seccion-banner h1 .first {font-size: 26px;}
      .seccion-banner h1 .second {font-size: 33px;}
      .seccion-banner h1 .third { font-size: 33px;}
      .seccion-banner h1  {top: 53%;line-height: 39px;}
    }
    @media (min-width: 1100px) and (max-width: 1199px) {
      .seccion-banner h1 .first {font-size: 28px;}
      .seccion-banner h1 .second {font-size: 36px;}
      .seccion-banner h1 .third { font-size: 39px;}
      .seccion-banner h1  {top: 53%;line-height: 39px;}
    }
    @media (min-width: 1200px) and (max-width: 1299px) {
      .seccion-banner h1 .first { font-size: 32px;}
      .seccion-banner h1 .second {font-size: 46px;}
      .seccion-banner h1 .third { font-size: 46px;}
      .seccion-banner h1  {top: 53%;line-height: 49px;}
    }
    @media (min-width: 1300px) and (max-width: 1399px) {
      .seccion-banner h1 .first { font-size: 39px;}
      .seccion-banner h1 .second {font-size: 50px;}
      .seccion-banner h1 .third { font-size: 50px;}
      .seccion-banner h1  {top: 53%;line-height: 49px;}
    }
    @media (min-width: 1400px) and (max-width: 1500px) {
      .seccion-banner h1 .first { font-size: 43px;}
      .seccion-banner h1 .second {font-size: 53px;}
      .seccion-banner h1 .third { font-size: 53px;}
      .seccion-banner h1  {top: 53%;line-height: 49px;}
    }
    @media (min-width: 1501px) and (max-width: 1600px) {
      .seccion-banner h1 .first { font-size: 43px;}
      .seccion-banner h1 .second {font-size: 53px;}
      .seccion-banner h1 .third { font-size: 53px;}
      .seccion-banner h1  {top: 53%;line-height: 49px;}
    }
</style>
";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
  <?php require 'headerAbbott-movil.php'; ?>
  <img class="img-responsive-movil bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/banner-movil.jpg" alt="">
    <div class="bg-gradient" style="margin-top: -5px;border-bottom-right-radius: 42px;border-bottom-left-radius: 42px;">
      <h2 class="title-principal" style="margin: 0;font-size: 19pt;padding: 15px;">El que más recomiendan los médicos en Colombia<sup>*</sup></h2>
      <div class="row" style="margin-top: 10px;">
          <img style="margin:0 auto;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/manzana.png" alt="">
          <center>
            <div class="description-text">
              <p class="name-product">Pedialyte 500ml</p>
              <p>Max 60 con Zinc</p>
              <p>MANZANA</p>
            </div>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 91343)) ?>" data-ajax="false">
              <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/btn-compra.png" alt="Compra pedialyte Manzana">
            </a>
          </center>
      </div>
      <div class="row" style="margin-top: 10px;">
        <img style="margin:0 auto;display:block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/uva.png" alt="">
          <center>
            <div class="description-text">
              <p class="name-product">Pedialyte 500ml</p>
              <p>Max 60 con Zinc</p>
              <p>UVA</p>
            </div>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 91342)) ?>" data-ajax="false">
              <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/btn-compra.png" alt="Compra pedialyte UVA">
            </a>
          </center>
      </div>
      <div class="row" style="margin-top: 50px;padding: 0 15px;">
          <img class="img-responsive-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/rounded.png" alt="">
          <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/logo-pedialyte.png" alt="">
          <h2 class="sub-title" style="font-size: 36px;line-height: 40px;">¡Rehidrata rápido <br> <span style="font-size: 45px;">a tu familia!</span></h2>
          <ul class="lista-descrip">
            <li>Tratamiento de la deshidratación moderada <br> a grave por pérdida de líquidos y electrolitos.</li>
            <li>Contiene zinc para ayudar a reponer <br> perdido durante la deshidratación generada por <br> situaciones de vomito y/o diarrea.</li>
            <li>Dependiendo del grado de hidratación, debe <br> tomar 2 botellas de 500 ml en 1 o 2 días.</li>
            <li>TIP: La bebida fría es mejor tolerada.</li>
          </ul>
      </div>
      <h2 class="title-fot" style="margin-top: 35px;font-size: 23px;padding-bottom: 20px;">Recomendaciones cuando alguien <br> <span style="font-size: 29px;">sufre de deshidratación:</span></h2>
    </div>
    <h2 class="title-blue" style="width: 65%;font-size: 17px;border-bottom-right-radius: 33px;"> &#8226; Qué pueden comer</h2>
    <div class="row text-blue" style="padding: 0 15px;">
        <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/manzana-pera-guayaba.png" alt="">
        <p style="text-align: center;margin-top: 10px;">MANZANAS, PERAS, GUAYABAS.</p>
    </div>
    <div class="row text-blue" style="padding: 0 15px;">
        <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/zanahoria-ahuyama.png" alt="">
        <p style="text-align: center;margin-top: 10px;">ZANAHORIA, AHUYAMA. </p>
    </div>
    <div class="row text-blue" style="padding: 0 15px;">
      <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/arroz-platano.png" alt="">
      <p style="text-align: center;margin-top: 10px;">ARROZ, SOPA DE PLÁTANO. </p>
    </div>
    <div class="row text-blue" style="padding: 0 15px;">
      <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/caldo-papa-yuca.png" alt="">
      <p style="text-align: center;margin-top: 10px;">CALDOS, PURÉ DE PAPA O YUCA. </p>
    </div>
    <div class="row text-blue" style="padding: 0 15px;">
      <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/pollo-desmenuzado.png" alt="">
      <p style="text-align: center;margin-top: 10px;">POLLO DESMENUZADO/CARNE MOLIDA COCINADA, BAJA EN SAL Y EN GRASA. </p>
    </div>
    <div class="row text-blue" style="padding: 0 15px;">
      <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/leche.png" alt="">
      <p style="text-align: center;margin-top: 10px;">LECHE DESLACTOSADA DURANTE 8 DÍAS; LUEGO DIETA NORMAL. SIEMPRE SE DEBE CONTINUAR CON LA LACTANCIA MATERNA. </p>
    </div>
    <div class="gradient-footer" style="margin-top: 30px;">
      <h2 class="title-red" style="width: 65%;font-size: 17px;border-bottom-right-radius: 33px;"> &#8226; Qué deben evitar</h2>
      <div class="ui-grid-a">
          <div class="ui-block-a">
            <div class=" text-red" style="padding: 0 15px;">
                <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-01.png" alt="">
                <p style="text-align: center;margin-top: 10px;">Fritos</p>
            </div>
          </div>
          <div class="ui-block-b">
            <div class=" text-red" style="padding: 0 15px;">
                <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-02.png" alt="">
                <p style="text-align: center;margin-top: 10px;">Lácteos completos</p>
            </div>
          </div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a">
            <div class=" text-red" style="padding: 0 15px;">
                <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-03.png" alt="">
                <p style="text-align: center;margin-top: 10px;">caldos de gallina</p>
            </div>
          </div>
          <div class="ui-block-b">
            <div class=" text-red" style="padding: 0 15px;">
                <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-04.png" alt="">
                <p style="text-align: center;margin-top: 10px;">Enlatados</p>
            </div>
          </div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a">
            <div class=" text-red" style="padding: 0 15px;">
              <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-05.png" alt="">
              <p style="text-align: center;margin-top: 10px;">Dulces</p>
            </div>
          </div>
          <div class="ui-block-b">
            <div class=" text-red" style="padding: 0 15px;">
              <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-06.png" alt="">
              <p style="text-align: center;margin-top: 10px;">bebidas prefabricadas y deportivas</p>
            </div>
          </div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a">
            <div class=" text-red" style="padding: 0 15px;">
              <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-07.png" alt="">
              <p style="text-align: center;margin-top: 10px;">Embutidos</p>
            </div>
          </div>
          <div class="ui-block-b">
            <div class=" text-red" style="padding: 0 15px;">
              <img style="margin: 0 auto;display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-08.png" alt="">
              <p style="text-align: center;margin-top: 10px;">Cítricos</p>
            </div>
          </div>
      </div>
      <!--Videos-->
      <div style="padding: 15px 15px;">
          <div class='embed-container'><iframe src='https://www.youtube.com/embed/2__FbqbGPD4?rel=0' frameborder='0' allowfullscreen></iframe></div>
          <div class='embed-container'><iframe src='https://www.youtube.com/embed/2iNp9LacqVA?rel=0' frameborder='0' allowfullscreen></iframe></div>
          <p class="legal" style="text-align: justify;">
            *Reporte IMS CLOSE UP Mayo 2016 PEDIALYTE <sup>&reg;</sup> MAX 60 mEq con Zinc. Registro Sanitario: INVIMA 2016M-0011256-R1.
            Indicaciones: Tratamiento de la deshidratación moderada a grave por pérdida de líquidos y electrolitos. Pedialyte<sup>&reg;</sup> MAX 60 mEq
            contiene zinc para ayudar a reponer el zinc perdido durante la deshidratación por pérdida de líquidos y electrolitos.<br>
            Es un medicamento. No exceder su consumo. Leer indicaciones y contraindicaciones en la etiqueta. Si los síntomas persisten consulte a su médico. Medicamento de venta libre.
          </p>
      </div>
    </div>
<!---FIN VERSIÓN MÓVIL-->

<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
  <!-- <a href="">
    <div class="sidebar-cart">
    	<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/general/compra-online.png">
    </div>
  </a> -->
<!--Header-->
<?php require 'headerAbbott.php'; ?>
<!--Banner principal-->
<div class="seccion-banner">
  <img class="img-responsive bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/banner.jpg" alt="">
  <h1>
    <span class="first">EN EL TRATAMIENTO DE LA DESHIDRATACIÓN</span> <br>
    <span class="second">POR DIARREA Y VÓMITO,</span> <br>
    <span class="third">PEDIALYTE MAX 60 ES IDEAL.</span>
  </h1>
</div>
<div class="container">
  <div class="bg-gradient">
    <div class="row">
      <h2 class="title-principal">El que más recomiendan los médicos en Colombia<sup>*</sup></h2>
    </div>
    <div class="row" style="margin-top: 50px;">
      <div class="col-sm-6 col-md-6" align="right">
        <img class="img-responsive img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/manzana.png" alt="">
        <div class="description-text">
          <p class="name-product">Pedialyte 500ml</p>
          <p>Max 60 con Zinc</p>
          <p>MANZANA</p>
        </div>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 91343)) ?>">
          <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/btn-compra.png" alt="Compra pedialyte Manzana">
        </a>
      </div>
      <div class="col-sm-6 col-md-6">
      <img class="img-responsive img-product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/uva.png" alt="">
        <div class="description-text" style="text-align: right;">
          <p class="name-product">Pedialyte 500ml</p>
          <p>Max 60 con Zinc</p>
          <p>UVA</p>
        </div>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 91342)) ?>">
          <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/btn-compra.png" alt="Compra pedialyte UVA">
        </a>
      </div>
    </div>
    <div class="row" style="margin-top: 100px;">
      <div class="col-sm-7 col-md-7">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/rounded.png" alt="">
      </div>
      <div class="col-sm-5 col-md-5">
        <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/logo-pedialyte.png" alt="">
        <h2 class="sub-title">¡Rehidrata rápido <br> <span>a tu familia!</span></h2>
        <ul class="lista-descrip">
          <li>Tratamiento de la deshidratación moderada <br> a grave por pérdida de líquidos y electrolitos.</li>
          <li>Contiene zinc para ayudar a reponer <br> perdido durante la deshidratación generada por <br> situaciones de vomito y/o diarrea.</li>
          <li>Dependiendo del grado de hidratación, debe <br> tomar 2 botellas de 500 ml en 1 o 2 días.</li>
          <li>TIP: La bebida fría es mejor tolerada.</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <h2 class="title-fot">Recomendaciones cuando alguien <br> <span>sufre de deshidratación:</span></h2>
    </div>
  </div>
  <div class="row">
    <h2 class="title-blue"> &#8226; Qué pueden comer</h2>
  </div>
  <div class="row text-blue">
    <div class="col-sm-6 col-md-6">
      <div class="col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-2 "><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/manzana-pera-guayaba.png" alt=""></div>
      <div class="col-sm-3 col-md-3"><p>MANZANAS <br> PERAS <br> GUAYABAS.</p></div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="col-sm-5 col-md-5"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/zanahoria-ahuyama.png" alt=""></div>
      <div class="col-sm-7 col-md-7"><p>ZANAHORIA <br> AHUYAMA. </p></div>
    </div>
  </div>
  <div class="row text-blue">
    <div class="col-sm-6 col-md-6">
      <div class="col-sm-5 col-md-5 col-sm-offset-2 col-md-offset-2"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/arroz-platano.png" alt=""></div>
      <div class="col-sm-4 col-md-4"><p>ARROZ <br> SOPA DE PLÁTANO. </p></div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="col-sm-5 col-md-5"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/caldo-papa-yuca.png" alt=""></div>
      <div class="col-sm-7 col-md-7"><p>CALDOS <br> PURÉ DE PAPA O YUCA. </p></div>
    </div>
  </div>
  <div class="row text-blue">
    <div class="col-sm-6 col-md-6">
      <div class="col-sm-3 col-md-3 col-sm-offset-2 col-md-offset-2"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/pollo-desmenuzado.png" alt=""></div>
      <div class="col-sm-6 col-md-6"><p>POLLO DESMENUZADO/ <br> CARNE MOLIDA COCINADA <br> BAJA EN SAL Y EN GRASA. </p></div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="col-sm-3 col-md-3"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/leche.png" alt=""></div>
      <div class="col-sm-9 col-md-9"><p>LECHE DESLACTOSADA <br> DURANTE 8 DÍAS; LUEGO <br> DIETA NORMAL. SIEMPRE SE <br> DEBE CONTINUAR CON LA <br> LACTANCIA MATERNA. </p></div>
    </div>
  </div>
<div class="gradient-footer">
  <div class="row">
    <h2 class="title-red"> &#8226; Qué deben evitar</h2>
  </div>
  <div class="row text-red">
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-01.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>Fritos</p></div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-02.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>Lácteos <br>completos</p></div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-03.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>caldos de gallina</p></div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-04.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>Enlatados</p></div>
      </div>
  </div>
  <div class="row text-red">
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-05.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>Dulces</p></div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-06.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>Gaseosas y <br> jugos prefabricados <br>bebidas deportivas </p></div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-07.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>Embutidos</p></div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-6 col-md-6 out-padding-right ">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pedialyte/evitar-08.png" alt="">
        </div>
        <div class="col-sm-6 col-md-6 resset"><p>Cítricos</p></div>
      </div>
  </div>
  <!--Videos-->
  <div class="row" style="padding: 30px 60px;">
    <div class="col-sm-6 col-md-6">
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/2__FbqbGPD4?rel=0' frameborder='0' allowfullscreen></iframe></div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class='embed-container'><iframe src='https://www.youtube.com/embed/2iNp9LacqVA?rel=0' frameborder='0' allowfullscreen></iframe></div>
    </div>
    <div class="col-md-12">
      <p class="legal">
        <sup>*</sup> Reporte IMS CLOSE UP Mayo 2016 PEDIALYTE <sup>&reg;</sup> MAX 60 mEq con Zinc. Registro Sanitario: INVIMA 2016M-0011256-R1.
        Indicaciones: Tratamiento de la deshidratación moderada a grave por pérdida de líquidos y electrolitos. Pedialyte<sup>&reg;</sup> MAX 60 mEq
        contiene zinc para ayudar a reponer el zinc perdido durante la deshidratación por pérdida de líquidos y electrolitos.<br>
        Es un medicamento. No exceder su consumo. Leer indicaciones y contraindicaciones en la etiqueta. Si los síntomas persisten consulte a su médico. Medicamento de venta libre.
      </p>
    </div>
  </div>
</div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
