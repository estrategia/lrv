<?php $this->pageTitle = "Alimento en polvo Niños - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Renergen ampollas bebibles y Energold cápsulas son suplementos dietarios que aportan vitaminas y minerales necesarios para complementar la alimentación diaria.'>
<meta name='keywords' content='energold capsulas, renergen, energold precio.'>
<style>
  .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;width: 15%;}
  @font-face {font-family:  Montserrat-Regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/fonts/Montserrat-Regular.otf);}
  @font-face {font-family:Montserrat-SemiBold;src: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/fonts/Montserrat-SemiBold.otf);}
  @font-face {font-family:Montserrat-Light;src: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/fonts/Montserrat-Light.otf);}
  .img-responsive-m {width:100%;}
  .section-menu-mobile {background-color:#E5E5E5;padding: 20px 25px;margin-top: 10px;}
  .section-menu-mobile .item {background-color:#2EACD4;border:3px solid #2EACD4;text-align: center;padding: 15px;margin-bottom: 15px;font-family:Montserrat-Regular;border-radius: 15px;}
  .section-menu-mobile .item.active {background-color:#fff;border:3px solid #2EACD4;color:#2EACD4;}
  .section-menu-mobile .item:hover {background-color:#fff;border:3px solid #2EACD4;color:#2EACD4;}
  .section-menu-mobile a {text-decoration:none;color:#fff;}
  .section-m{padding: 20px 15px;}
  .btn-compra {width: 70%;display: block;margin: 0 auto;}
  .almendras {background-color: #F08125;color: #fff;font-weight: inherit;padding: 13px;font-size: 15px;border-radius: 0 0 50px;font-family: Montserrat-SemiBold;}
  .lista-check { padding-inline-start: 18px;}
  .lista-check li{list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/check.png);margin-bottom: 12px;color:#474746;font-family:  Montserrat-Regular;font-size: 13px;}
  .bg-gray {background-color:#F8F8F8;padding: 8px;margin-bottom: 35px;}
  .quinua {background-color: #DA7984;color: #fff;font-weight: inherit;padding: 13px;font-size: 19px;border-radius: 0 0 50px;font-family: Montserrat-SemiBold;}
  .sub-title-quinua {font-family: Montserrat-Regular;color: #DA7984;font-size: 15px;}
  .bg-gray p, u {font-family: Montserrat-Regular;color: #474746;font-size: 13px;}
  .porcion-suplemento-dietario {font-family: Montserrat-SemiBold;color: #F08125;font-size: 12px;margin-top: 30px;}
  .description-porcion-suplemento-dietario {font-family: Montserrat-Light !important;font-size: 12px !important;color: #474746 !important;}
  .registro {font-family: Montserrat-Light !important;text-align: center;color:#474746 !important;}
  .registro.pink::after {content: '';width: 85%;height: 3px;background-color:#DA7984;display: inline-block;}
  .registro.multivitaminas::after {content: '';width: 85%;height: 3px;background-color: #193927;display: inline-block;}
  .suplemento-dietario {background-color: #F4AC34;color: #fff;font-weight: inherit;padding: 13px;font-size: 19px;border-radius: 0 0 35px;font-family: Montserrat-SemiBold;width: 54%;}
  .registro.sup-dietario.desktop::after {width: 53%;}
  .registro.multivitaminas.desktop::after {width: 53%;}
  .section-menu-mobile .item.desktop {background-color: #2EACD4;border: 3px solid #2EACD4;text-align: center;padding: 5px;margin-bottom: 15px;border-radius: 15px;width: 49%;margin: 0 auto;font-size: 16px;font-family: Montserrat-Light;font-weight: bold;}
  .section-menu-mobile .item.desktop:hover {background-color: #fff;border: 3px solid #2EACD4;color: #2EACD4;}
  .section-menu-mobile .item.desktop.active {background-color: #fff;border: 3px solid #2EACD4;color: #2EACD4;}
  .section-menu-mobile a:hover {color:#fff !important;}
  .flavor {color: #DA7984;font-size: 13px;text-align: center;display: block;font-family: Montserrat-SemiBold;}
  .brand-new{width: 25%;margin-top: -6px;position: absolute;right: 8px;}
  .note {font-family: Montserrat-Light;font-size: 11px;color: #474746 !important;text-align: center;margin-top: 8px;}
  .product-m{width: 70%;margin: 0 auto;display: block;}
  .sub-title-vainilla {font-family: Montserrat-Regular;color: #F08125;font-size: 15px;}
  .flavor-vainilla {color: #215AA7;font-size: 13px;text-align: center;display: block;font-family: Montserrat-SemiBold;}
  .registro.vainilla::after {content: '';width: 85%;height: 3px;background-color: #215AA7;display: inline-block;}
  .flavor-diabeticos {color: #F08125;font-size: 13px;text-align: center;display: block;font-family: Montserrat-SemiBold;}
  .registro.diabeticos::after {content: '';width: 85%;height: 3px;background-color: #3D6268;display: inline-block;}
  .registro.plus::after {content: '';width: 85%;height: 3px;background-color: #F08125;display: inline-block;}
  .alto-fibra::after {content: '';width: 85%;height: 3px;background-color: #E761A0;display: inline-block;}
  .registro.calcio::after {content: '';width: 85%;height: 3px;background-color: #903D8F;display: inline-block;}
  .registro.total::after {content: '';width: 85%;height: 3px;background-color: #DAB511;display: inline-block;}
  .separador {margin-top: 10px;margin-bottom: 35px;border-top: 4px solid #E2E2E2;width: 60%;}
  .content-colum {padding: 10px 15px 0px;}
</style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
  <div class="item"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/kids-banner1.jpg" alt="Fresa Kids"></div>
  <div class="item"><img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/kids-banner2.jpg"  alt="Fresa prenatal"></div>
</div>
<section class="section-menu-mobile">
  <!-- <a href="<?= Yii::app()->request->baseUrl ?>/energold-renergen-suplementos-dietarios" data-ajax="false"><div class="item">Suplementos Dietarios</div></a> -->
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-polvo" data-ajax="false"><div class="item">Alimento en polvo Adultos</div></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-ninos" data-ajax="false"><div class="item active">Alimento para Niños</div></a>
</section>
<section class="section-m">
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/energold-kids.png" alt="Energold kids">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100888)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos">FRESA- VAINILLA</span>
      <h2 class="almendras" >ENERGOLD KIDS </h2>
      <span class="sub-title-vainilla">Una buena manera de alimentar a los niños</span>
      <div class="content-colum">
        <ul class="lista-check">
          <li>Recomendado para niños a partir de los 4 años de edad. </li>
          <li>Alimento a base de Maltodextrina con Macronutrientes: Carbohidratos, Proteínas y grasas. Enriquecido con Micronutrientes: Vitaminas y Minerales.</li>
          <li>Un buen complemento para el desarrollo de los niños.</li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="margin-top: 0px;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
            1 cucharada medidora (17 g.)*  <br>
            1 vez al día, por vaso de leche o jugo.<br>
            Cont. neto 440 g.  <br>
            26 porciones. <br>
          </p>
          <p class="note"> (Utilice la cuchara dosificadora que se encuentra en el envase).</p>
        </div>
      </div>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-energold-kids.png" alt="Energold kids">
      <p class="registro plus">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/prenatal.png" alt="Energold prenatal">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100894)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #E761A0;">FRESA – VAINILLA</span>
      <h2 class="almendras" style="background-color: #E761A0;">ENERGOLD PRENATAL  </h2>
      <span class="sub-title-vainilla" style="color: #E761A0;">Ideal antes, durante y después del embarazo.</span>
      <div class="content-colum">
        <ul class="lista-check">
          <!-- <li>No contiene azúcar.</li> -->
          <!-- <li>Con DHA, derivado del Omega 3, que contribuye con el desarrollo y funcionamiento del cerebro del nuevo integrante de la familia. </li> -->
          <li>Alimento en polvo, con Macronutrientes: Carbohidratos, Proteínas y Lípidos, enriquecido con Vitaminas y Minerales. </li>
          <li>Alto aporte de Ácido folico, hierro y calcio para la buena formación y desarrollo del bebé. </li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="color:#E761A0;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
          2 cucharadas medidoras (34 g.)* <br>
            2 veces al día, por vaso de leche o jugo.<br>
          Contenido neto 440 g.  <br>
          por envase 13 porciones.
          </p>
        </div>
      </div>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-prenatal.png" alt="Energold prenatal">
      <p class="note">(Utilice la cuchara dosificadora que se encuentra en el envase).</p>
      <p class="registro alto-fibra">Registro Sanitario No. RSA-001671-2016</p>
    </div>
  </div>
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/energold-jalea.png" alt="Energold jalea">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100877)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #903D8F;">FRESA – VAINILLA</span>
      <h2 class="almendras" style="background-color: #903D8F;">ENERGOLD JALEA   </h2>
      <span class="sub-title-vainilla" style="color: #903D8F;">Una forma diferente de complementar la nutrición de los niños</span>
      <div class="content-colum">
        <ul class="lista-check">
          <li>Alimento con extracto de malta en presentación Jalea recomendado para niños y adolescentes.</li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="color:#903D8F;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
            2 cucharadas 1 vez al día.  <br>
            Contenido neto 300 g.
          </p>
        </div>
      </div>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-energold-jalea.png" alt="Energold jalea">
      <p class="registro calcio">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/energold-jarabe.png" alt="Energold Jarabe">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100886)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #DAB511;">VAINILLA</span>
      <h2 class="almendras" style="background-color: #DAB511;">ENERGOLD JARABE   </h2>
      <span class="sub-title-vainilla" style="color: #DAB511;">Nutrición agradable para todos</span>
      <div class="content-colum">
        <ul class="lista-check">
          <li>Alimento a base de Extracto de Malta con vitaminas y minerales.</li>
          <li>Aporte de energía básica para el normal desarrollo de la actividad diaria. </li>
          <li>Ideal para niños y jóvenes en edad escolar.  </li>
          <li>Desarrollo físico y mental.</li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="color:#DAB511;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
            2 cucharadas al día. <br>
            Contenido neto 180 ml.
          </p>
        </div>
      </div>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-energold-jarabe.png" alt="Energold Jarabe">
      <p class="registro total">Registro Sanitario No. RSAD12I94614</p>
    </div>
  </div>
</section>
<!--Version movil-->
<!--Versión escritorio-->
<?php else: ?>
<!-- <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=ENERGOLD+">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/bnt-sticky.png" alt="Compra online"></div>
</a> -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="item active"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/kids-banner1.jpg" alt="Fresa Kids"></div>
    <div class="item"><img class="img-responsive"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/kids-banner2.jpg"  alt="Fresa prenatal"></div>
  </div>
  <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev"><i class="prev-slide"></i></a>
  <a class="carousel-control right" href="#carousel-example-generic" data-slide="next"><i class="next-slide"></i></a>
</div>
<section class="section-menu-mobile">
  <div class="container">
    <!-- <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-renergen-suplementos-dietarios" data-ajax="false"><div class="item desktop ">Suplementos <br> Dietarios</div></a>
    </div> -->
    <div class="col-sm-4 col-md-4 col-sm-offset-2 col-md-offset-2">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-polvo" data-ajax="false"><div class="item desktop">Alimento en <br> polvo Adultos</div></a>
    </div>
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-ninos" data-ajax="false"><div class="item desktop active">Alimento <br> para Niños</div></a>
    </div>
  </div>
</section>
<div class="container">
  <div class="row" style="margin-top:15px;">
    <div class="col-sm-3 col-md-3">
      <div class="bg-gray">
        <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/energold-kids.png" alt="Energold Kids">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100888)) ?>" data-ajax="false">
          <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
        </a>
        <span class="flavor-diabeticos">FRESA- VAINILLA</span>
        <h2 class="almendras">ENERGOLD KIDS </h2>
        <span class="sub-title-vainilla" style="padding-inline-start: 10px;display: block;">Una buena manera de alimentar a los niños</span>
        <div class="content-colum">
          <ul class="lista-check">
            <li>Recomendado para niños a partir de los 4 años de edad. </li>
            <li>Alimento a base de Maltodextrina con Macronutrientes: Carbohidratos, Proteínas y grasas. Enriquecido con Micronutrientes: Vitaminas y Minerales.</li>
            <li>Un buen complemento para el desarrollo de los niños.</li>
          </ul>
          <div class="content-colum">
            <h4 class="porcion-suplemento-dietario" style="margin-top: 75px;">PORCIÓN RECOMENDADA</h4>
            <p class="description-porcion-suplemento-dietario">
              1 cucharada medidora (17 g.)*  <br>
              1 vez al día, por vaso de leche o jugo.<br>
              Cont. neto 440 g.  <br>
              por envase 26 porciones. <br>
            </p>
          </div>
        </div>
      </div>
      <img class="img-responsive" style="background-color: #F8F8F8;margin-top: -48px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-energold-kids.png" alt="Energold Kids">
      <div class="bg-gray">
        <p class="note">  (Utilice la cuchara dosificadora que se encuentra en el envase).</p>
        <p class="registro plus" style="font-size: 10px;">Registro Sanitario No. RSAD10I84714</p>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="bg-gray">
        <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/prenatal.png" alt="Energold prenatal">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100894)) ?>" data-ajax="false">
          <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
        </a>
        <span class="flavor-diabeticos" style="color: #E761A0;">FRESA – VAINILLA</span>
        <h2 class="almendras" style="background-color: #E761A0;">ENERGOLD PRENATAL  </h2>
        <span class="sub-title-vainilla" style="color: #E761A0;padding-inline-start: 10px;display: block;">Ideal antes, durante y después del embarazo.</span>
        <div class="content-colum">
          <ul class="lista-check">
            <!-- <li>No contiene azúcar.</li> -->
            <!-- <li>Con DHA, derivado del Omega 3, que contribuye con el desarrollo y funcionamiento del cerebro del nuevo integrante de la familia. </li> -->
            <li>Alimento en polvo, con Macronutrientes: Carbohidratos, Proteínas y Lípidos, enriquecido con Vitaminas y Minerales. </li>
            <li>Alto aporte de Ácido folico, hierro y calcio para la buena formación y desarrollo del bebé. </li>
          </ul>
          <div class="content-colum" style="margin-top: 116px;">
            <h4 class="porcion-suplemento-dietario" style="color:#E761A0;margin-top: 10px;">PORCIÓN RECOMENDADA</h4>
            <p class="description-porcion-suplemento-dietario">
              2 cucharadas medidoras (34 g.)*  <br>
              2 veces al día, por vaso de leche o jugo.<br>
              Cont. neto 440 g.  <br>
              por envase 13 porciones. <br>
            </p>
          </div>
        </div>
      </div>
      <img class="img-responsive" style="margin-top: -56px;background-color: #F8F8F8;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-prenatal.png" alt="Energold prenatal">
      <div class="bg-gray">
        <p class="note">(Utilice la cuchara dosificadora que se encuentra en el envase).</p>
        <p class="registro alto-fibra" style="font-size: 10px;margin-top: 15px;">Registro Sanitario No. RSA001671-2016</p>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="bg-gray" style="margin-bottom: 0px;">
        <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/energold-jalea.png" alt="Energold JALEA">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100877)) ?>" data-ajax="false">
          <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
        </a>
        <span class="flavor-diabeticos" style="color: #903D8F;">FRESA – VAINILLA</span>
        <h2 class="almendras" style="background-color: #903D8F;">ENERGOLD JALEA  </h2>
        <span class="sub-title-vainilla" style="color: #903D8F;padding-inline-start: 10px;display: block;">Una forma diferente de complementar la nutrición de los niños</span>
        <div class="content-colum">
          <ul class="lista-check">
            <li>Alimento con extracto de malta en presentación Jalea recomendado para niños y adolescentes.</li>
          </ul>
          <div class="content-colum" style="margin-bottom: 13px;">
            <h4 class="porcion-suplemento-dietario" style="color:#903D8F;margin-top: 230px;">PORCIÓN RECOMENDADA</h4>
            <p class="description-porcion-suplemento-dietario">
              2 cucharadas 1 vez al día. <br>
              Contenido neto 300 g.<br>
            </p>
          </div>
        </div>
        </div>
        <img class="img-responsive" style="margin-top: -8px;background-color: #F8F8F8;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-energold-jalea.png" alt="Energold JALEA">
        <div class="bg-gray">
        <p class="registro calcio" style="font-size: 10px;margin-top: 64px;">Registro Sanitario No. RSAD12I94614</p>
      </div>
    </div>
    <div class="col-sm-3 col-md-3">
      <div class="bg-gray" style="margin-bottom:0px;">
        <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/energold-jarabe.png" alt="Energold Jarabe">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100886)) ?>" data-ajax="false">
          <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
        </a>
        <span class="flavor-diabeticos" style="color: #DAB511;">VAINILLA</span>
        <h2 class="almendras" style="background-color: #DAB511;">ENERGOLD JARABE  </h2>
        <span class="sub-title-vainilla" style="color: #DAB511;padding-inline-start: 10px;display: block;">Nutrición agradable para todos</span>
        <div class="content-colum">
          <ul class="lista-check">
            <li>Alimento a base de Extracto de Malta con vitaminas y minerales.</li>
            <li>Aporte de energía básica para el normal desarrollo de la actividad diaria. </li>
            <li>Ideal para niños y jóvenes en edad escolar.  </li>
            <li>Desarrollo físico y mental.</li>
          </ul>
          <div class="content-colum" style="margin-bottom: 40px;">
            <h4 class="porcion-suplemento-dietario" style="color:#DAB511;margin-top: 124px;">PORCIÓN RECOMENDADA</h4>
            <p class="description-porcion-suplemento-dietario">
              2 cucharadas al día.  <br>
              Contenido neto 180 ml.
            </p>
          </div>
        </div>
      </div>
      <img class="img-responsive"  style="margin-top: -7px;background-color: #F8F8F8;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-kids/forma-energold-jarabe.png" alt="Energold Jarabe">
      <div class="bg-gray">
        <p class="registro total" style="font-size: 10px;margin-top: 66px;">Registro Sanitario No. RSAD12I94614</p>
      </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio -->
<?php endif; ?>
