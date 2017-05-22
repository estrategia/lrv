<?php $this->pageTitle = "Alimento en polvo adultos - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='description' content='Energold es un alimento en polvo con distintos sabores y para cada necesidad. Ideal para complementar la alimentación diaria porque brinda nutrientes.'>
<meta name='keywords' content='energold, energold calcio, energold para que sirve.'>
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
  .almendras {background-color: #215AA7;color: #fff;font-weight: inherit;padding: 13px;font-size: 15px;border-radius: 0 0 50px;font-family: Montserrat-SemiBold;}
  .lista-check { padding-inline-start: 18px;}
  .lista-check li{list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/kyron/check.png);margin-bottom: 12px;color:#474746;font-family:  Montserrat-Regular;font-size: 13px;}
  .bg-gray {background-color:#F8F8F8;padding: 19px;margin-bottom: 35px;}
  .quinua {background-color: #DA7984;color: #fff;font-weight: inherit;padding: 13px;font-size: 19px;border-radius: 0 0 50px;font-family: Montserrat-SemiBold;}
  .sub-title-quinua {font-family: Montserrat-Regular;color: #DA7984;font-size: 15px;}
  .bg-gray p, u {font-family: Montserrat-Regular;color: #474746;font-size: 13px;}
  .porcion-suplemento-dietario {font-family: Montserrat-SemiBold;color: #DA7984;font-size: 12px;margin-top: 30px;}
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
  .note {font-family: Montserrat-Light;font-size: 11px;color: #474746 !important;text-align: center;margin-top: 34px;}
  .product-m{width: 70%;margin: 0 auto;display: block;}
  .sub-title-vainilla {font-family: Montserrat-Regular;color: #215AA7;font-size: 15px;}
  .flavor-vainilla {color: #215AA7;font-size: 13px;text-align: center;display: block;font-family: Montserrat-SemiBold;}
  .registro.vainilla::after {content: '';width: 85%;height: 3px;background-color: #215AA7;display: inline-block;}
  .flavor-diabeticos {color: #3D6268;font-size: 13px;text-align: center;display: block;font-family: Montserrat-SemiBold;}
  .registro.diabeticos::after {content: '';width: 85%;height: 3px;background-color: #3D6268;display: inline-block;}
  .registro.plus::after {content: '';width: 85%;height: 3px;background-color: #931914;display: inline-block;}
  .alto-fibra::after {content: '';width: 85%;height: 3px;background-color: #487D2F;display: inline-block;}
  .registro.calcio::after {content: '';width: 85%;height: 3px;background-color: #2180C2;display: inline-block;}
  .registro.total::after {content: '';width: 85%;height: 3px;background-color: #20934E;display: inline-block;}
  .separador {margin-top: 10px;margin-bottom: 35px;border-top: 4px solid #E2E2E2;width: 60%;}
  .content-colum {padding: 10px 15px 0px;}
</style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item"><img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/banner01.jpg" alt="Quinua Vainilla"></div>
    <div class="item"><img class="img-responsive-m"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/banner02.jpg" alt="Almendras vainilla"></div>
</div>
<section class="section-menu-mobile">
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-renergen-suplementos-dietarios" data-ajax="false"><div class="item">Suplementos Dietarios</div></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-polvo" data-ajax="false"><div class="item active">Alimento en polvo Adultos</div></a>
  <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-ninos" data-ajax="false"><div class="item">Alimento para Niños</div></a>
</section>
<section class="section-m">
  <div class="">
    <img class="brand-new" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nuevo.png" alt="Nuevo">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/quinua.png" alt="Quinua">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 106704)) ?>" data-ajax="false"><img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online"></a>
      <span class="flavor">FRUTOS  ROJOS – VAINILLA</span>
      <h2 class="quinua">ENERGOLD CON QUINUA</h2>
      <span class="sub-title-quinua">Balance adecuado de aminoácidos, para el organismo.</span>
      <ul class="lista-check">
        <li>Alimento a base de Maltodextrina con QUINUA. Macronutrientes: Carbohidratos, Proteínas y grasas; Micronutrientes: Vitaminas y Minerales.</li>
        <li>Por su aporte y componentes nutricionales, la NASA ha seleccionado la QUINUA como componente de la nutrición de los Astronautas.		</li>
        <li>A partir de los 4 años de edad. </li>
        <li>El aporte proteico vegetal de la QUINUA, es similar a la proteína animal, ya que es elevado, y la calidad de sus nutrientes son superiores a la de otros cereales.</li>
      </ul>
      <h4 class="porcion-suplemento-dietario">PORCIÓN RECOMENDADA</h4>
      <p class="description-porcion-suplemento-dietario">1 cucharada medidora (17 gr.)*<br>1 vez al día, por vaso de leche o jugo.<br>Cont. neto 440 gr.<br>por envase 26 porciones<br></p>
    </div>
    <img class="img-responsive-m" style="background-color: #F8F8F8;float: right;margin-top: -80px;margin-bottom: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/quinua-forma.png">
    <div class="bg-gray">
      <p class="note">*(Utilice la cuchara dosificadora que se encuentra en el envase).</p>
      <p class="registro pink">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
  <div class="">
    <img class="brand-new" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nuevo.png" alt="Nuevo">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/almendra.png" alt="Almendra">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 114828)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-vainilla">VAINILLA</span>
      <h2 class="almendras">ENERGOLD CON ALMENDRAS </h2>
      <span class="sub-title-vainilla">Alimento para una sana nutrición</span>
      <ul class="lista-check">
        <li>Alimento en polvo a base de avena para preparar bebida con Almendra enriquecido con Vitaminas y Minerales.</li>
        <li>Ideal para complementar la alimentación diaria, porque brinda elementos nutritivos que el organismo requiere para su normal funcionamiento y desarrollo.</li>
        <li>El aporte de PROTEÍNA VEGETAL de las Almendras es similar a la proteína animal, ya que es elevado y la calidad de sus nutrientes son superiores; por lo tanto, para los partidarios del VEGANISMO, resulta  ser una gran opción en su alimentación.</li>
      </ul>
      <h4 class="porcion-suplemento-dietario" style="color:#215AA7;">PORCIÓN RECOMENDADA</h4>
      <p class="description-porcion-suplemento-dietario">
        1 cucharada por porción <br>
        1 vez al día, por vaso de leche o jugo.<br>
        Cont. neto 440 gr. <br>
        por envase 26 porciones.
      </p>
    </div>
    <img class="img-responsive-m" style="background-color: #F8F8F8;float: right;margin-top: -63px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/almendra-forma.png">
    <div class="bg-gray">
      <p class="registro vainilla">Registro Sanitario No. RSA-001215-2016</p>
    </div>
  </div>
  <div class="">
    <img class="brand-new" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nuevo.png" alt="Nuevo">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/diabeticos.png" alt="Diabeticos">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100882)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos">FRESA – VAINILLA</span>
      <h2 class="almendras" style="background-color: #3D6268;">ENERGOLD DIABÉTICOS  </h2>
      <span class="sub-title-vainilla" style="color: #3D6268;">Alimento en polvo sin azúcar</span>
      <ul class="lista-check">
        <li>Apto para personas con Diabetes, enriquecido con Vitaminas y Minerales.</li>
      </ul>
      <h4 class="porcion-suplemento-dietario" style="color:#3D6268;">PORCIÓN RECOMENDADA</h4>
      <p class="description-porcion-suplemento-dietario">
        1 cucharada medidora (17 gr.)*  <br>
        1 vez al día, por vaso de leche o jugo.<br>
        Cont. neto 440 gr.  <br>
        por envase 26 porciones.
      </p>
    </div>
    <img class="img-responsive-m" style="background-color: #F8F8F8;float: right;margin-top: -63px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/forma-diabeticos.png">
    <div class="bg-gray">
      <p class="note">*(Utilice la cuchara dosificadora que se encuentra en el envase).</p>
      <p class="registro diabeticos">Registro Sanitario No. RSA-001214-2016</p>
    </div>
  </div>
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/plus.png" alt="Plus">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100890)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #931914;">FRUTOS ROJOS - VAINILLA CANELA</span>
      <h2 class="almendras" style="background-color: #931914;">PLUS</h2>
      <span class="sub-title-vainilla" style="color: #931914;">Energía rápida y eficiente.</span>
      <ul class="lista-check">
        <li>Los cereales y leguminosas son fuente de Proteínas, Carbohidratos y Lípidos que permiten recuperar energía después de realizar trabajos pesados.</li>
      </ul>
      <h4 class="porcion-suplemento-dietario" style="color:#931914;">PORCIÓN RECOMENDADA</h4>
      <p class="description-porcion-suplemento-dietario">
        1 cucharada medidora (17 gr.)*  <br>
        1 vez al día, por vaso de leche o jugo.<br>
        Cont. neto 440 gr.  <br>
        26 porciones. <br>
        (Utilice la cuchara dosificadora que se encuentra en el envase).
      </p>
      <p class="registro plus">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/fibra.png" alt="Fibra">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100876)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #487D2F;">FRESA – NARANJA</span>
      <h2 class="almendras" style="background-color: #487D2F;">Alto en FIBRA </h2>
      <span class="sub-title-vainilla" style="color: #487D2F;">El componente imprescindible de la dieta ideal.</span>
      <ul class="lista-check">
        <li>Alimento en polvo que provee las cantidades necesarias de Fibra insoluble  y prebiótica (soluble).</li>
        <li>Contiene FOS (Fructooligosacáridos) y Linaza que aporta Omega 3.</li>
      </ul>
      <h4 class="porcion-suplemento-dietario" style="color:#487D2F;">PORCIÓN RECOMENDADA</h4>
      <p class="description-porcion-suplemento-dietario">
        1 cucharada medidora (17 gr.)*  <br>
        1 vez al día, por vaso de leche o jugo.<br>
        Cont. neto 440 gr.  <br>
        26 porciones. <br>
        (Utilice la cuchara dosificadora que se encuentra en el envase).
      </p>
      <p class="registro alto-fibra">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/calcio.png" alt="Calcio">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 116180)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #2180C2;">FRESA – VAINILLA</span>
      <h2 class="almendras" style="background-color: #2180C2;">Alto en CALCIO  </h2>
      <span class="sub-title-vainilla" style="color: #2180C2;">Nutrición preventiva ideal para después de los 30</span>
      <ul class="lista-check">
        <li>Alto en Calcio que disminuye el riesgo de sufrir Osteoporosis.</li>
      </ul>
      <h4 class="porcion-suplemento-dietario" style="color:#2180C2;">PORCIÓN RECOMENDADA</h4>
      <p class="description-porcion-suplemento-dietario">
        1 cucharada medidora (17 gr.)*  <br>
        1 vez al día, por vaso de leche o jugo.<br>
        Cont. neto 440 gr.  <br>
        26 porciones. <br>
        (Utilice la cuchara dosificadora que se encuentra en el envase).
      </p>
      <p class="registro calcio">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
  <div class="">
    <div class="bg-gray">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nutricion-total.png" alt="Nutrición Total">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100875)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #20934E;">FRESA – VAINILLA</span>
      <h2 class="almendras" style="background-color: #20934E;">ENERGOLD TOTAL   </h2>
      <span class="sub-title-vainilla" style="color: #20934E;">El alimento ideal para toda la familia</span>
      <ul class="lista-check">
        <li>Ideal para complementar la alimentación diaria porque brinda los elementos nutritivos que el organismo requiere para su normal funcionamiento y desarrollo.</li>
      </ul>
      <h4 class="porcion-suplemento-dietario" style="color:#20934E;">PORCIÓN RECOMENDADA</h4>
      <p class="description-porcion-suplemento-dietario">
        1 cucharada medidora (17 gr.)*  <br>
        1 vez al día, por vaso de leche o jugo.<br>
        Cont. neto 440 gr.  <br>
        26 porciones. <br>
        (Utilice la cuchara dosificadora que se encuentra en el envase).
      </p>
      <p class="registro total">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
</section>
<!--Version movil-->

<!--Versión escritorio-->
<?php else: ?>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=ENERGOLD+">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/bnt-sticky.png" alt="Compra online"></div>
</a>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="item active"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/banner01.jpg" alt="Quinua vainilla"></div>
    <div class="item"><img class="img-responsive"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/banner02.jpg"  alt="Almendras vainilla"></div>
  </div>
  <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev"><i class="prev-slide"></i></a>
  <a class="carousel-control right" href="#carousel-example-generic" data-slide="next"><i class="next-slide"></i></a>
</div>

<section class="section-menu-mobile">
  <div class="container">
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-renergen-suplementos-dietarios" data-ajax="false"><div class="item desktop ">Suplementos <br> Dietarios</div></a>
    </div>
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-polvo" data-ajax="false"><div class="item desktop active">Alimento en <br> polvo Adultos</div></a>
    </div>
    <div class="col-sm-4 col-md-4">
      <a href="<?= Yii::app()->request->baseUrl ?>/energold-alimento-ninos" data-ajax="false"><div class="item desktop">Alimento <br> para Niños</div></a>
    </div>
  </div>
</section>
<div class="container">
  <div class="row" style="margin-top: 50px;">
    <div class="col-sm-4 col-md-4">
      <div class="bg-gray">
        <img class="brand-new" style="margin-top: -25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nuevo.png" alt="Nuevo">
          <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/quinua.png" alt="Quinua">
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 106704)) ?>" data-ajax="false">
            <img class="btn-compra" style="width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
          </a>
          <span class="flavor">FRUTOS  ROJOS – VAINILLA</span>
          <h2 class="quinua">ENERGOLD CON QUINUA</h2>
          <span class="sub-title-quinua" style="padding-inline-start: 10px;display: block;">Balance adecuado de aminoácidos, para el organismo.</span>
          <div class="content-colum">
            <ul class="lista-check">
              <li>Alimento a base de Maltodextrina con QUINUA. Macronutrientes: Carbohidratos, Proteínas y grasas; Micronutrientes: Vitaminas y Minerales.</li>
              <li>Por su aporte y componentes nutricionales, la NASA ha seleccionado la QUINUA como componente de la nutrición de los Astronautas.		</li>
              <li>A partir de los 4 años de edad. </li>
              <li>El aporte proteico vegetal de la QUINUA, es similar a la proteína animal, ya que es elevado, y la calidad de sus nutrientes son superiores a la de otros cereales.</li>
            </ul>
            <div class="content-colum">
              <h4 class="porcion-suplemento-dietario" style="margin-top: 0px;">PORCIÓN RECOMENDADA</h4>
              <p class="description-porcion-suplemento-dietario">1 cucharada medidora (17 gr.)*<br>1 vez al día, por vaso de leche o jugo.<br>Cont. neto 440 gr.<br>por envase 26 porciones<br></p>
            </div>
          </div>
        </div>
        <img class="img-responsive" style="float: right;margin-top: -93px;margin-bottom: 42px;background-color: #F8F8F8;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/quinua-forma.png">
        <div class="bg-gray">
          <p class="note" style="font-size: 10px;">*(Utilice la cuchara dosificadora que se encuentra en el envase).</p>
          <p class="registro pink">Registro Sanitario No. RSAD10I84714</p>
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
      <div class="bg-gray">
        <img class="brand-new" style="margin-top: -25px;"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nuevo.png" alt="Nuevo">
        <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/almendra.png" alt="Almendra">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 114828)) ?>" data-ajax="false">
          <img class="btn-compra" style="width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
        </a>
        <span class="flavor-vainilla">VAINILLA</span>
        <h2 class="almendras">ENERGOLD CON ALMENDRAS </h2>
        <span class="sub-title-vainilla" style="padding-inline-start: 10px;display: block;">Alimento para una sana nutrición</span>
        <div class="content-colum">
          <ul class="lista-check">
            <li>Alimento en polvo a base de avena para preparar bebida con Almendra enriquecido con Vitaminas y Minerales.</li>
            <li>Ideal para complementar la alimentación diaria, porque brinda elementos nutritivos que el organismo requiere para su normal funcionamiento y desarrollo.</li>
            <li>El aporte de PROTEÍNA VEGETAL de las Almendras es similar a la proteína animal, ya que es elevado y la calidad de sus nutrientes son superiores; por lo tanto, para los partidarios del VEGANISMO, resulta  ser una gran opción en su alimentación.</li>
          </ul>
          <div class="content-colum">
            <h4 class="porcion-suplemento-dietario" style="color:#215AA7;margin-top: 4px;">PORCIÓN RECOMENDADA</h4>
            <p class="description-porcion-suplemento-dietario">
              1 cucharada por porción <br>
              1 vez al día, por vaso de leche o jugo.<br>
              Cont. neto 440 gr. <br>
              por envase 26 porciones.
            </p>
          </div>
        </div>
      </div>
        <img class="img-responsive" style="float: right;margin-top: -93px;margin-bottom:80px;background-color: #F8F8F8;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/almendra-forma.png">
      <div class="bg-gray">
        <p class="registro vainilla">Registro Sanitario No. RSA-001215-2016</p>
      </div>
    </div>
    <div class="col-sm-4 col-md-4">
      <div class="bg-gray">
        <img class="brand-new" style="margin-top: -25px;"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nuevo.png" alt="Nuevo">
        <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/diabeticos.png" alt="Diabeticos">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100882)) ?>" data-ajax="false">
          <img class="btn-compra" style="width: 50%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
        </a>
        <span class="flavor-diabeticos">FRESA – VAINILLA</span>
        <h2 class="almendras" style="background-color: #3D6268;">ENERGOLD DIABÉTICOS  </h2>
        <span class="sub-title-vainilla" style="color: #3D6268;padding-inline-start: 10px;display: block;">Alimento en polvo sin azúcar</span>
        <div class="content-colum">
          <ul class="lista-check">
            <li>Apto para personas con Diabetes, enriquecido con Vitaminas y Minerales.</li>
          </ul>
          <div class="content-colum">
            <h4 class="porcion-suplemento-dietario" style="color:#3D6268;margin-top: 213px;">PORCIÓN RECOMENDADA</h4>
            <p class="description-porcion-suplemento-dietario">
              1 cucharada medidora (17 gr.)*  <br>
              1 vez al día, por vaso de leche o jugo.<br>
              Cont. neto 440 gr.  <br>
              por envase 26 porciones.
            </p>
          </div>
        </div>
      </div>
        <img class="img-responsive-m" style="float: right;margin-top: -50px;margin-bottom: 50px;background-color: #F8F8F8;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/forma-diabeticos.png">
      <div class="bg-gray">
        <p class="note" style="font-size: 10px;">*(Utilice la cuchara dosificadora que se encuentra en el envase).</p>
        <p class="registro diabeticos">Registro Sanitario No. RSA-001214-2016</p>
      </div>
    </div>
  </div>
  <div class="row">
    <hr class="separador">
  </div>
  <div class="row" style="background-color: #F8F8F8;padding: 25px 5px;margin-bottom: 50px;">
    <div class="col-sm-3 col-md-3">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/plus.png" alt="Plus">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100890)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #931914;">FRUTOS ROJOS - VAINILLA CANELA</span>
      <h2 class="almendras" style="background-color: #931914;">PLUS</h2>
      <span class="sub-title-vainilla" style="color: #931914;padding-inline-start: 10px;display: block;">Energía rápida y eficiente.</span>
      <div class="content-colum">
        <ul class="lista-check">
          <li>Los cereales y leguminosas son fuente de Proteínas, Carbohidratos y Lípidos que permiten recuperar energía después de realizar trabajos pesados.</li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="color:#931914;margin-top: 75px;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
            1 cucharada medidora (17 gr.)*  <br>
            1 vez al día, por vaso de leche o jugo.<br>
            Cont. neto 440 gr.  <br>
            26 porciones. <br>
            (Utilice la cuchara dosificadora que se encuentra en el envase).
          </p>
        </div>
      </div>
      <p class="registro plus" style="font-size: 12px;margin-top: 25px;">Registro Sanitario No. RSAD10I84714</p>
    </div>
    <div class="col-sm-3 col-md-3">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/fibra.png" alt="Fibra">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100876)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #487D2F;">FRESA – NARANJA</span>
      <h2 class="almendras" style="background-color: #487D2F;">Alto en FIBRA </h2>
      <span class="sub-title-vainilla" style="color: #487D2F;padding-inline-start: 10px;display: block;">El componente imprescindible de la dieta ideal.</span>
      <div class="content-colum">
        <ul class="lista-check">
          <li>Alimento en polvo que provee las cantidades necesarias de Fibra insoluble  y prebiótica (soluble).</li>
          <li>Contiene FOS (Fructooligosacáridos) y Linaza que aporta Omega 3.</li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="color:#487D2F;margin-top: 23px;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
            1 cucharada medidora (17 gr.)*  <br>
            1 vez al día, por vaso de leche o jugo.<br>
            Cont. neto 440 gr.  <br>
            26 porciones. <br>
            (Utilice la cuchara dosificadora que se encuentra en el envase).
          </p>
        </div>
      </div>
      <p class="registro alto-fibra" style="font-size: 12px;margin-top: 25px;">Registro Sanitario No. RSAD10I84714</p>
    </div>
    <div class="col-sm-3 col-md-3">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/calcio.png" alt="Calcio">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 116180)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #2180C2;">FRESA – VAINILLA</span>
      <h2 class="almendras" style="background-color: #2180C2;">Alto en CALCIO  </h2>
      <span class="sub-title-vainilla" style="color: #2180C2;padding-inline-start: 10px;display: block;">Nutrición preventiva ideal para después de los 30</span>
      <div class="content-colum">
        <ul class="lista-check">
          <li>Alto en Calcio que disminuye el riesgo de sufrir Osteoporosis.</li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="color:#2180C2;margin-top: 127px;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
            1 cucharada medidora (17 gr.)*  <br>
            1 vez al día, por vaso de leche o jugo.<br>
            Cont. neto 440 gr.  <br>
            26 porciones. <br>
            (Utilice la cuchara dosificadora que se encuentra en el envase).
          </p>
        </div>
      </div>
      <p class="registro calcio" style="font-size: 12px;margin-top: 25px;">Registro Sanitario No. RSAD10I84714</p>
    </div>
    <div class="col-sm-3 col-md-3">
      <img class="product-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/alimento-en-polvo-adulto/nutricion-total.png" alt="Nutrición Total">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100875)) ?>" data-ajax="false">
        <img class="btn-compra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/kyron/compra-online.png" alt="Compra Online">
      </a>
      <span class="flavor-diabeticos" style="color: #20934E;">FRESA – VAINILLA</span>
      <h2 class="almendras" style="background-color: #20934E;">ENERGOLD TOTAL   </h2>
      <span class="sub-title-vainilla" style="color: #20934E;padding-inline-start: 10px;display: block;">El alimento ideal para toda la familia</span>
      <div class="content-colum">
        <ul class="lista-check">
          <li>Ideal para complementar la alimentación diaria porque brinda los elementos nutritivos que el organismo requiere para su normal funcionamiento y desarrollo.</li>
        </ul>
        <div class="content-colum">
          <h4 class="porcion-suplemento-dietario" style="color:#20934E;margin-top: 53px;">PORCIÓN RECOMENDADA</h4>
          <p class="description-porcion-suplemento-dietario">
            1 cucharada medidora (17 gr.)*  <br>
            1 vez al día, por vaso de leche o jugo.<br>
            Cont. neto 440 gr.  <br>
            26 porciones. <br>
            (Utilice la cuchara dosificadora que se encuentra en el envase).
          </p>
        </div>
      </div>
      <p class="registro total" style="font-size: 12px;margin-top: 25px;">Registro Sanitario No. RSAD10I84714</p>
    </div>
  </div>
</div>
<!--Fin versión escritorio
<?php endif; ?>
