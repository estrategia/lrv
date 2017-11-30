<?php $this->pageTitle = "Ni una dieta más - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Los batidos de proteína Ni Una D… Más, contienen proteína whey que ayudan a bajar
de peso ya que reduce la ansiedad por comer. Hay sabor vainilla y chocolate.'>
  <meta name='keywords' content='ni una dieta mas, ni una dieta mas precio, batidos para adelgazar.'>
  <style>

  @font-face { font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
  @font-face { font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
  @font-face { font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}

  @font-face { font-family:HelveticaNeueLTStd-Bd; src: url(" . Yii::app()->request->baseUrl . "/images/ni-una-dieta-mas/fuentes/HelveticaNeueLTStd-Bd.otf);}
  @font-face { font-family:HelveticaNeueLTStd-Roman; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/ni-una-dieta-mas/fuentes/HelveticaNeueLTStd-Roman.otf);}
  @font-face { font-family:Palatino_Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/ni-una-dieta-mas/fuentes/palatinobold.otf);}

    .space-1 {height: 0px !important;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .img-responsive-m {width:100%;}
    .sombradecaja{box-shadow: 0px 9px 10px #888888;}

    a, a:hover, a:active, a:focus {outline: none !important;cursor:pointer;text-decoration:none !important;}
    .button-desplegable .icon2 {position: relative;width: 100px;height: 100px;-webkit-transition: .2s color;-o-transition: .2s color;transition: .2s color;z-index: 2;}
    .button-desplegable .text2 {display: none;margin-top: -7px;position: absolute;z-index: 1;}
    .button-desplegable:hover .text2 {width: 165px;display: block;-webkit-animation: appearRight .5s ease-out both ;animation: appearRight .5s ease-out both ;margin-top: -93px;}
    @-webkit-keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(10%);transform: translateX(10%);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    @keyframes appearRight {from {opacity: 0;-webkit-transform: translateX(-45%);transform: translateX(-45);}to {opacity: 1;-webkit-transform: translateX(-70%);transform: translateX(-70%);}}
    .titulo-principal {color: #e42126;font-family: Palatino_Bold;text-align: center;font-size: 50px;font-weight: bold;}
    .bg-menu{background: #f3f3f3;padding: 30px 0 0px;background-size: 100%;}
    .guia-menu {margin-top: 50px; background-size: cover;height:9px;background: #cdcdcd;border-radius: 20px;}
    .guia-menu .item {width:60%;height:19px;}
    @media (min-width: 768px){.seven-cols .col-md-1,.seven-cols .col-sm-1,.seven-cols .col-lg-1  {width: 100%;*width: 100%;padding-right:0px !important;padding-left:0px !important;}}
    @media (min-width: 992px) {.seven-cols .col-md-1,.seven-cols .col-sm-1,.seven-cols .col-lg-1 {width: 12.285714%;*width: 12.285714%;padding-right:0px !important;padding-left:0px !important;}}
    @media (min-width: 1200px) {.seven-cols .col-md-1,.seven-cols .col-sm-1,.seven-cols .col-lg-1 {width: 12.285714%;*width: 12.285714%;padding-right:0px !important;      padding-left:0px !important;}}
    .nombre {line-height: 15px;color:#e52126;text-align: center;font-size: 1.2em;margin-top: 20px;font-family:Palatino_Bold;width:105%;}
    .line-active {border-radius: 25px;height: 19px;width: 70%;margin: -1px 25px;z-index: 1;position: absolute;}
    .show {background-color: #ff0015;margin-top: 25%;}
    .name-strong {font-family:Palatino_Bold;}
    .bg-info{background: white !important; padding-bottom: 40px;/*background-image:url(".Yii::app()->request->baseUrl."/images/contenido/durex/fondo-producto.png);*/background-size: 100%;}
    .contenedor-info {background-color: #fff;padding: 8px;border-radius: 53px;    border: 5px solid red;}
    .contenedor-product{border-radius: 10px;padding:20px 40px !important;}
    .pack-product {width: 32% !important;margin-top: 9%;right: -1%;}
    .pack-producto-crema{width: 28% !important;margin-top: 3%;right: -4%;}
    .hide {display:none;}
    .titulo-producto {font-size:45px;font-family:Palatino_Bold;line-height: 33px;margin-bottom: 15px;font-weight: bold;}
    .descrip-producto {font-family: HelveticaNeueLTStd-Roman;font-size: 16px;line-height: 22px;color: #454545;text-align:justify;}
    /*.descrip-producto span {font-family:HelveticaNeueLTStd-Bd;}*/
    .compra-producto {width: 23% !important;padding-top: 2%;left: 6%;transition: 0.4s ease-out;}
    .ir-a-producto{width: 17%;position: absolute;bottom: -20%;left: 60%;transition: 0.4s ease-out;}
    .compra-producto-crema {width: 23% !important;padding-top: 2%;left: 6%;transition: 0.4s ease-out;}
    .compra-producto:hover {transform: scale(0.9);}
    .titulo-producto sup {font-size: 60%;margin-left: -5px}
    .line-title {width: 60%;margin-bottom: 35px;}
    .titulo-producto.producto1 {color:#e32120;}.titulo-producto.producto1 span {font-family:Palatino_Bold;font-weight: bold;font-size: 0.8em;}.titulo-producto.producto1 strong {color:#0062BD;}
    .titulo-producto.producto2 {color:#e32120;}.titulo-producto.producto2 span {font-family:Palatino_Bold;font-weight: bold;font-size: 0.8em;}.titulo-producto.producto2 strong {color:#D9030A;}
    .titulo-producto.producto3 {color:#e32120;}.titulo-producto.producto3 span {font-family:Palatino_Bold;font-weight: bold;font-size: 0.8em;}.titulo-producto.producto3 strong {color:#FF5B35;}
    .titulo-producto.producto7 {color:#e32120;}.titulo-producto.producto7 span {font-family:Palatino_Bold;font-weight: bold;font-size: 0.8em;}.titulo-producto.producto7 strong {color:#820022;}
    .owl-controls {position: absolute;top: 35px;right: 10px;left: 10px;}
    .owl-theme .owl-controls .owl-page span {background-color: #f74747 !important;}
    .ui-btn-icon-left::after {background-color: #ff0000 !important;}
    .ui-btn-icon-right::after {background-color: #ff0000 !important;}
    col-md-2{ padding-left: 0px !important; padding-right: 0px !important;}

    .programa-hora {padding: 10px 0;font-size: 21px;background-color:#ecedef;text-align:center;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);-moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.4);}
    .txt-footer {color: #595959;font-family: HelveticaNeueItalic;text-align: center;font-size: 18px;margin-bottom: 30px;}
@media (min-width: 1940px){.img-responsive{margin: 0 auto;} }

/*---------------------------------- estilos del movil ----------------------------------------------------*/

@media (max-width: 600px) {.img-responsive-m{ width: 100%;display: block;}.descrip-producto-m{font-size: 12px !important;line-height: 17px !important;}.owl-productodetalle .item img{max-width: 80% !important;margin-bottom: 8% !important;}}
</style>
  ";
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#producto1').click(function(){
      $('#producto1 #guia').addClass('show');
      $('#producto1 #nombre').addClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto1').removeClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto2').click(function(){
      $('#producto2 #guia').addClass('show');
      $('#producto2 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto3 #guia').removeClass('show');
      $('#producto3 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto2').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
    $('#producto3').click(function(){
      $('#producto3 #guia').addClass('show');
      $('#producto3 #nombre').addClass('name-strong');
      $('#producto1 #guia').removeClass('show');
      $('#producto1 #nombre').removeClass('name-strong');
      $('#producto2 #guia').removeClass('show');
      $('#producto2 #nombre').removeClass('name-strong');
      $('#producto4 #guia').removeClass('show');
      $('#producto4 #nombre').removeClass('name-strong');
      $('#producto5 #guia').removeClass('show');
      $('#producto5 #nombre').removeClass('name-strong');
      $('#producto6 #guia').removeClass('show');
      $('#producto6 #nombre').removeClass('name-strong');
      $('#producto7 #guia').removeClass('show');
      $('#producto7 #nombre').removeClass('name-strong');
      $('#info-producto3').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
      $('#info-producto6').addClass('hide');
      $('#info-producto7').addClass('hide');
    });
  });
</script>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div class="ser-supremo" style="">
  <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3632)) ?>" > <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/banner-movil.jpg"> </a>

<div class="bg-menu" style="margin-top:-5px;background-size: cover;padding-bottom: 0;">
<h1 class="titulo-principal" style="margin-top: 0;font-size: 26px;line-height: 28px;margin-bottom: 0px;">Proteína Whey  <br> para tu necesidad</h1>
  <a style="position: absolute;left: 25px;top: 25%;" href="" data-role="button" data-icon="arrow-l" data-iconpos="left"></a>
  <a style="position: absolute;right: 25px;top: 25%;" href="" data-role="button" data-icon="arrow-r" data-iconpos="right"></a>
  <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item" style="padding: 35px 18px;">
      <!--vainila-------->
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Vainilla.png" alt="sabor vainilla">
      <div class="contenedor-info ">
        <div class="contenedor-product" style="padding: 25px !important;">
          <h2 class="titulo-producto producto1" style="font-size: 28px;margin-top: 0;line-height: 30px;color:#e42126;    ">Batido de Proteína   <br><span>Sabor Vainilla</span></h2>
          <p class="descrip-producto-m" style="font-size: 14px;">Proteína de suero (whey protein) con alto poder de saciedad y ricos sabores
                        especialmente para los que despiertan sin hambre, pero en la tarde sienten ansiedad por
                        carbohidratos.<br><br>Al tener una mayor ingesta de proteína en las comidas disminuye considerablemente la
                        sensación de hambre (Ansiedad por comer).<br><br>Tome un vaso en el desayuno y otro al sentir ansiedad (sin sustituir las comidas) y después
                        de llegar a su peso ideal puede tomarlo solo en caso de sentir ansiedad.</p>
                        <p class="descrip-producto-m"><span style="font-weight: bold;color: red;font-size: 14px;">PRONÓSTICO:</span> en 8 minutos y con solo tres cucharadas en un vaso con agua o leche
                                (semidescremada) disminuirá su apetito.</p>
                        <p class="descrip-producto-m"><span style="font-weight: bold;color: red;font-size: 14px;">ATENCIÓN:</span> el batido de proteína whey <span style="color: red;">Ni Una D... Más,</span> ayuda a la pérdida de peso sin
                                  modificar la dieta y no sustituye las comidas. </p>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>110536)) ?>"><img style="width: 182px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/boton-compra.png" alt="Compra online"></a>
        </div>
      </div>
    </div>   <!-- sabor vainilla ---->

    <!--sabor chocolate-->
    <div class="item" style="padding: 35px 18px;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/chocolate.png" alt="Sensitivo ultra delgago">
      <div class="contenedor-info ">
        <div class="contenedor-product" style="padding: 25px !important;">
          <h2 class="titulo-producto producto1" style="font-size: 28px;margin-top: 0;line-height: 30px;color:#e42126;    ">Batido de Proteína   <br><span>Sabor chocolate</span></h2>
          <p class="descrip-producto-m" style="font-size: 14px;">Proteína de suero (whey protein) con alto poder de saciedad y ricos sabores
                        especialmente para los que despiertan sin hambre, pero en la tarde sienten ansiedad por
                        carbohidratos.<br><br>
                        Al tener una mayor ingesta de proteína en las comidas disminuye considerablemente la
                        sensación de hambre (Ansiedad por comer).<br><br>
                        Tome un vaso en el desayuno y otro al sentir ansiedad (sin sustituir las comidas) y después
                        de llegar a su peso ideal puede tomarlo solo en caso de sentir ansiedad.</p>
                        <p class="descrip-producto-m"><span style="font-weight: bold;color: red;font-size: 14px;">PRONÓSTICO:</span> en 8 minutos y con solo tres cucharadas en un vaso con agua o leche
                                (semidescremada) disminuirá su apetito.</p>
                        <p class="descrip-producto-m"><span style="font-weight: bold;color: red;font-size: 14px;">ATENCIÓN:</span> el batido de proteína whey <span style="color: red;">Ni Una D... Más,</span> ayuda a la pérdida de peso sin
                                  modificar la dieta y no sustituye las comidas. </p>
          <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>110533)) ?>"><img style="width: 182px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/boton-compra.png" alt="Compra online"></a>
        </div>
      </div>
    </div> <!-- sabor chocolate ------>
          <!-- avellana-------->
          <div class="item" style="padding: 35px 18px;">
            <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Crema-de-Avellana.png" alt="Sensitivo ultra delgago">
            <div class="contenedor-info ">
              <div class="contenedor-product" style="padding: 25px !important;">
                <h2 class="titulo-producto producto1" style="font-size: 28px;margin-top: 0;line-height: 30px;color:#e42126;    ">Crema de Avellana    <br><span>Sin Azúcar añadido</span></h2>
                <p class="descrip-producto-m" style="font-size: 14px;">Proteína de suero (whey protein) con alto poder de saciedad, el doble de avellanas y sin azúcar añadido para los que despiertan sin hambre,
                   pero en la tarde sienten ansiedad por carbohidratos.<br><br>
                              Al tener una mayor ingesta de proteína en las comidas
                              disminuye considerablemente la sensación de hambre (Ansiedad por comer).<br><br>
                              </p>
                              <p class="descrip-producto-m"><span style="font-weight: bold;color: red;font-size: 14px;">PRONÓSTICO:</span> se puede acompañar con comidas de cualquier tipo.</p>
                              <p class="descrip-producto-m"><span style="font-weight: bold;color: red;font-size: 14px;">ATENCIÓN:</span> la Crema de Avellanas<span style="color: red;"> Ni Una D... Más,</span> ayuda a la pérdida de peso sin
                                        modificar la dieta y no sustituye las comidas. </p>
                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>110537)) ?>"><img style="width: 182px;margin: 30px auto 0;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/boton-compra.png" alt="Compra online"></a>
              </div>
            </div>
          </div> <!-- sabor avellana ------>

  </div>
  <section class="programa-hora" style="font-size: 16px;">
    <img width="40" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png"> <br>
    <span style="font-family:HelveticaNeueLight;color:#363636;">Ahora comprando en </span><span style="font-family:HelveticaNeue-BlackCond;color: #BF1A24;letter-spacing: 1px;">larebajavirtual.com</span><span style="color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;">, <br> programa tu hora y lugar de entrega </span>
  </section>
  <div style="margin-top:30px;padding:0 15px;">
    <div style="padding: 0 25%;">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-mobile.png" alt="Chat en linea">
      <p style="font-family:HelveticaNeueLTStd-Roman;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-mobile.png" alt="pqrs">
      <p style="font-family:HelveticaNeueLTStd-Roman;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
      <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-mobile.png" alt="Linea gratuita">
      <p style="font-family:HelveticaNeueLTStd-Roman;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
      <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
    </div>
  </div>
  <section style="font-size: 18px;background-color:#BF1A24;font-family: HelveticaNeueLight;color: #fff;text-align: center;padding: 10px;margin-top:30px;">
    Gracias por comprar en <span style="font-family:HelveticaNeue-BlackCond;letter-spacing:1px;">larebajavirtual.com</span>
  </section>
<!--Versión escritorio-->
<?php else: ?>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 3632)) ?>" > <img class="img-responsive sombradecaja" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/banner.jpg"> </a>

<div class="bg-menu">
  <div class="container">
    <h1 class="titulo-principal">Proteína Whey para tu necesidad</h1>
    <div class="row seven-cols" style="margin: 58px auto 0px;width: 96%;">
      <div class="col-md-1 col-md-offset-0"> <!--el que empuja al resto-->
      </div>

      <div class="col-md-2">
        <a id="producto3" href="#batido-de-proteina-sabor-vainilla">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Vainilla.png" alt="batido-de-proteina-sabor-vainilla">
          <div id="nombre" class="nombre">Sabor Vainilla</div>
          <div id="guia" class="line-active "></div>
        </a>
      </div>
      <div class="col-md-1 col-md-offset-0"> <!--el que empuja al resto-->
      </div>
      <div class="col-md-2">
        <a id="producto1" href="#batido-de-proteina-sabor-chocolate" >
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Chocolate.png" alt="Batido de Proteína Sabor Chocolate">
          <div id="nombre" class="nombre name-strong ">Sabor Chocolate</div>
          <div id="guia" class="line-active show "></div>

        </a>
      </div>
      <div class="col-md-1 col-md-offset-0"> <!--el que empuja al resto-->
      </div>

      <div class="col-md-2">
        <a id="producto2" href="#crema-de-avellana-sinazucar-añadido">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Crema-de-Avellana.png" alt="crema-de-avellana-sinazucar-añadido">
          <div id="nombre" class="nombre">Crema de Avellana</div>
          <div id="guia" class="line-active "></div>
        </a>
      </div>


      <div class="col-md-12 guia-menu"></div>

    </div>

  </div>
</div>
<div class="bg-info">
  <div class="container" style="padding: 34px 102px;">
    <div id="info-producto1" class="row contenedor-info ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <!-- producto 1 el sabor chocolate-->
          <h2 class="titulo-producto producto1">Batido de Proteína <br><span>Sabor Chocolate</span></h2>
          <p class="descrip-producto">Proteína de suero (whey protein) con alto poder de saciedad y ricos sabores
                                      especialmente para los que despiertan sin hambre, pero en la tarde sienten ansiedad por
                                      carbohidratos.<br><br>
                                      Al tener una mayor ingesta de proteína en las comidas disminuye considerablemente la
                                      sensación de hambre (Ansiedad por comer).<br><br>
                                      Tome un vaso en el desayuno y otro al sentir ansiedad (sin sustituir las comidas) y después
                                      de llegar a su peso ideal puede tomarlo solo en caso de sentir ansiedad.</p>
          <p class="descrip-producto"><span style="font-weight: bold;color: red;">PRONÓSTICO:</span> en 8 minutos y con solo tres cucharadas en un vaso con agua o leche
                  (semidescremada) disminuirá su apetito.</p>
          <p class="descrip-producto"><span style="font-weight: bold;color: red;">ATENCIÓN:</span> el batido de proteína whey <span style="color: red;">Ni Una D... Más,</span> ayuda a la pérdida de peso sin
                    modificar la dieta y no sustituye las comidas. </p>
        </div>
        <img class="col-sm-2 pack-product img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Chocolate.png" alt="Extra seguro">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>110533)) ?>"><img class="col-sm-2 compra-producto img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/boton-compra.png" alt="Compra online"></a>

      </div>
    </div>
    <!-- seccion de la crema de avellana ---------->
    <div id="info-producto2" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto2">Crema de Avellana <br><span>Sin Azúcar añadido</span></h2>
          <p class="descrip-producto">Proteína de suero (whey protein) con alto poder de saciedad, el doble de avellanas y sin
                                      azúcar añadido para los que despiertan sin hambre, pero en la tarde sienten ansiedad por
                                      carbohidratos.<br><br>
                                      Al tener una mayor ingesta de proteína en las comidas disminuye considerablemente la
                                      sensación de hambre (Ansiedad por comer).</p>
          <p class="descrip-producto"><span style="font-weight: bold;color: red;">RECOMENDACIÓN:</span> se puede acompañar con comidas de cualquier tipo.</p>
          <p class="descrip-producto"><span style="font-weight: bold;color: red;">ATENCIÓN:</span> la Crema de Avellanas <span style="color: red;">Ni Una D... Más,</span> ayuda a la pérdida de peso sin
                    modificar la dieta y no sustituye las comidas. </p>
        </div>
        <img class="col-sm-2 pack-producto-crema img-responsive"  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Crema-de-Avellana.png" alt="Sensitivo ultra delgado">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>110537)) ?>"><img class="col-sm-2 compra-producto-crema img-responsive " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/boton-compra.png" alt="Compra online"></a>

      </div>
    </div>

    <!-- seccion del sabor vainila ---------------------------------------------->
    <div id="info-producto3" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto3">Batido de Proteína <br><span>Sabor Vainilla</span></h2>
          <p class="descrip-producto">Proteína de suero (whey protein) con alto poder de saciedad y ricos sabores
                        especialmente para los que despiertan sin hambre, pero en la tarde sienten ansiedad por
                        carbohidratos.<br><br>
                        Al tener una mayor ingesta de proteína en las comidas disminuye considerablemente la
                        sensación de hambre (Ansiedad por comer).<br><br>
                        Tome un vaso en el desayuno y otro al sentir ansiedad (sin sustituir las comidas) y después
                        de llegar a su peso ideal puede tomarlo solo en caso de sentir ansiedad.</p>
          <p class="descrip-producto"><span style="font-weight: bold;color: red;">PRONÓSTICO:</span> en 8 minutos y con solo tres cucharadas en un vaso con agua o leche
                        (semidescremada) disminuirá su apetito.</p>
          <p class="descrip-producto"><span style="font-weight: bold;color: red;">ATENCIÓN:</span> el batido de proteína whey <span style="color: red;">Ni Una D... Más,</span> ayuda a la pérdida de peso sin
modificar la dieta y no sustituye las comidas.</p>
        </div>
        <img class="col-sm-2 pack-product img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/Vainilla.png" alt="Maximo placer durex">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>110536)) ?>"><img class="col-sm-2 compra-producto img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/ni-una-dieta-mas/img/boton-compra.png" alt="Compra online"></a>

      </div>
    </div>


    <!-- producto 7 ...por si acaso.................................

    <div id="info-producto7" class="row contenedor-info hide ">
      <div class="col-md-12 contenedor-product">
        <div class="col-sm-8">
          <h2 class="titulo-producto producto7"><span style="color: #0096E0;font-family: inherit;">DUREX</span> <sup style="color: #0096E0;">&reg;</sup> <br><span>GEL <strong>PLAY CEREZAS</strong></span></h2>
          <img class="line-title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/line-producto.png">
          <p class="descrip-producto">Brinda a la pareja <span>una experiencia deliciosa con sabor a cereza</span> para complementar su relación.</p>
        </div>
        <img class="pack-product" style="width: 440px;margin-top:-95px;right:-207px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/productos/gel-cerezas-durex.png" alt="Gel cerezas">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' =>25066)) ?>"><img class="compra-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/durex/circle.png" alt="Compra online"></a>
      </div>
    </div>                 final de este producto-->
  </div>
</div>

<section class="programa-hora">
  <span style="font-family:HelveticaNeueLight;color:#363636;">Ahora comprando en </span><span style="font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 23px;letter-spacing: 1px;">larebajavirtual.com</span><span style="color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;">, programa tu hora y lugar de entrega </span><img width="50" style="margin-left:6px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
</section>
<div class="container" style="margin-top:30px;">
  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-escritorio.png" alt="Chat en linea">
      <p style="font-family:HelveticaNeueLTStd-Roman;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
    </div>
    <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-escritorio.png" alt="pqrs">
      <p style="font-family:HelveticaNeueLTStd-Roman;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
      <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
    </div>
    <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-escritorio.png" alt="Linea gratuita">
      <p style="font-family:HelveticaNeueLTStd-Roman;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
      <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
    </div>
  </div>
</div>
<section style="background-color:#BF1A24;font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 25px;padding: 10px;margin-top:30px;">
  Gracias por comprar en <span style="font-family:HelveticaNeueLTStd-Roman;letter-spacing:1px;">larebajavirtual.com</span>
</section>

<!--Fin versión escritorio -->
<?php endif; ?>
