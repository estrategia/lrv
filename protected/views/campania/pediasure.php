<?php $this->pageTitle = "Pediasure - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Pediasure es un alimento nutricional para niños de 2 a 13 años de edad, contiene los 5 grupos de nutrientes claves para su óptimo crecimiento y desarrollo.'>
  <meta name='keywords' content='pediasure, alimentación y nutricion, alimentos nutricionales.'>
	<style>
		@font-face {
		    font-family:BrandonGrotesque-Bold ;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/similac-mama/fonts/BrandonGrotesque-Bold.otf);
		}
    @font-face {
        font-family: helvetica-neue-lt-std;
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/pediasure/fonts/helvetica-neue-lt-std.otf);
    }
    @font-face {
        font-family: brandonGrotesque-regular;
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/abbot/pediasure/fonts/brandonGrotesque-regular.otf);
    }
    .img-responsive-m {width:100%;}
		.sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .gray {background-color:#ECECEC;padding: 30px 0;margin-top: 15px;}
    .space-1 {height: 0px !important;}
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
    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;margin: 0px 0px 15px; }
    .embed-container iframe,
    .embed-container object,
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%;}
    .header-m h2 {font-size: 17px;padding: 0px 18px;}
    .background{
      background: rgba(255,255,255,1);
      background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 47%, rgba(252,252,250,1) 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(255,255,255,1)), color-stop(100%, rgba(252,252,250,1)));
      background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 47%, rgba(252,252,250,1) 100%);
      background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 47%, rgba(252,252,250,1) 100%);
      background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 47%, rgba(252,252,250,1) 100%);
      background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 47%, rgba(252,252,250,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#fcfcfa', GradientType=0 );
      padding-top: 70px;
    }
    .background .product {margin:0 auto;}
    .background .sabores {padding: 0px 49px;}
    .name-product {color:#76279C;  font-family:BrandonGrotesque-Bold ;text-align:center;font-size: 24px;margin-top: 10px;}
    .name-product::before { background: #C8C0D5 none repeat scroll 0 0; bottom: 159px; content: ''; height: 5px; position: absolute; width: 172px;}
    .background .btn-comprar{margin: 50px auto;}
    .background .sabores img:hover {-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    .bg-img {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/abbot/pediasure/banner-secundario.jpg);background-size:cover;}
    .bg-img .princip {font-family: helvetica-neue-lt-std;color:#572F76;margin-top:90px;}
    .princip span:nth-child(1) {font-size: 30px;font-weight: bold;font-style: italic;}
    .princip span:nth-child(3) {font-family: brandonGrotesque-regular;font-size: 22px;margin-left: 55px;}
    .lista {color: #572F76;font-size: 21px;margin-top: 46px;list-style-image: url('".Yii::app()->request->baseUrl."/images/contenido/abbot/pediasure/icono.png');}
    .lista li {margin-bottom: 10px;}
    .nuevos-sabores {z-index: 100;position: absolute;margin-top: -103px;}
    .sub-title {color: #4E2776;font-family: helvetica;margin-left: 67px;margin-top:15px;font-size: 17px;}
    .sub-title span {font-weight: bold;font-style: italic;font-size: 23px;}
    .text-legal {color: #696967;font-size: 11px;margin-bottom: 25px;}
    .nuevos-sabores:hover {-webkit-animation-name: wobble-to-top-right;animation-name: wobble-to-top-right;-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-timing-function: ease-in-out;animation-timing-function: ease-in-out;-webkit-animation-iteration-count: 1;animation-iteration-count: 1;}
    .img-responsive-m {width:100%;}
    .name-product-m { color: #76279C;font-family: BrandonGrotesque-Bold;text-align: center;font-size: 24px;margin-top: 10px;}
    .name-product-m::before {background: #E0D1D8 none repeat scroll 0 0;bottom: 240px;content: '';height: 5px;position: absolute;width: 172px; }
    .btn-comprar-m {initial:100% !important;}
    .princip-m span:nth-child(1) {font-size: 22px;font-weight: bold;font-style: italic;font-family: helvetica-neue-lt-std;color: #572F76;}
    .princip-m span:nth-child(3) {font-family: brandonGrotesque-regular;font-size: 16px;color: #572F76;}
    .productos-m {padding: 0px 35px;background-color:initial;}
    .productos-m img {width: initial;margin: 0 auto;display: block;}
    .img-responsive-m.product{margin: 40px auto 19px;}
    .ui-grid-b.sabores{padding: 0px 50px;}
    .ui-grid-a.sabores{padding: 0px 50px;}
  </style>
    ";
?>
<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<section>
<!--Header-->
<?php require 'headerAbbott-movil.php'; ?>
<!--Banner principal-->
<img class="img-responsive-m bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/banner-principal.jpg" alt="Con pedriasure ayudalos a llegar más alto">
</section>
<!--seccion productos-->
<section class="productos-m">
  <!-- Producto 1-->
  <img class="img-responsive-m product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/400gr-m.jpg" alt="Pediasure 400gr">
  <div class="ui-grid-b sabores">
    <div class="ui-block-a"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/fresa.png"> </div>
    <div class="ui-block-b"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/chocolate.png"> </div>
    <div class="ui-block-c"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/vainilla.png"> </div>
  </div>
  <p class="name-product-m">PediaSure 400 gr</p>
  <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2064)) ?>" data-ajax="false">
     <img  src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/boton.png">
  </a>
  <!-- Producto 2-->
  <img class="img-responsive-m product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/900gr-m.jpg" alt="Pediasure 900gr">
  <div class="ui-grid-a sabores">
    <div class="ui-block-a"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/fresa.png"> </div>
    <div class="ui-block-b"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/vainilla.png"> </div>
  </div>
  <p class="name-product-m">PediaSure 900 gr</p>
  <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2066)) ?>" data-ajax="false">
     <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/boton.png">
  </a>
  <!-- Producto 3-->
  <img class="img-responsive-m product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/237ml-m.jpg" alt="Pediasure 237ml">
  <div class="ui-grid-b sabores">
    <div class="ui-block-a"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/vainilla.png"> </div>
    <div class="ui-block-b"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/fresa.png"> </div>
    <div class="ui-block-c"> <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/chocolate.png"> </div>
  </div>
  <p class="name-product-m">PediaSure 237 ml</p>
<a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2062)) ?>" data-ajax="false">
     <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/boton.png">
  </a>
</section>

<section>
  <img class="img-responsive-m" style="width: 247%;margin-top: 20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/banner-secundario.jpg">
</section>
<section style="padding: 0px 35px;">

  <p class="princip-m">
    <span>Con PediaSure ayúdalos a llegar más alto</span> <br>
    <span>Complemento nutricional para niños de 2 a 13 años de edad.</span>
  </p>
  <ul class="lista" style="font-size: 18px;margin-top: 25px;">
    <li><span style="font-family: helvetica-neue-lt-std;font-style: italic;">Contiene los 5 grupos de nutrientes:</span><br>
    proteínas, carbohidratos, grasas, vitaminas y minerales.</li>
    <li>Contribuye a una nutrición completa y balanceada.</li>
    <li>Es un producto que aporta a los niños nutrientes clave que apoyan su crecimiento y desarrollo.</li>
  </ul>
  <img class="img-responsive-m " src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/nuevos-sabores.png" alt="nuevos sabores pediasure">

  <img class="img-responsive-m" style="margin-top: 30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/complementa-su-nutricion-a-diario-con-pediasure.png">
  <p class="sub-title" style="margin-left:0px;"><span>Pediasure listo para tomar,</span><br>
    es la nueva presentaciòn, puedes llevarlo a donde quieras.
  </p>
</section>

<div class="text-legal" style="padding: 0px 35px;text-align:justify;font-size: 15px;">
  <p>Pediasure® Alimento líquido a base de proteína, lípidos, carbohidratos, vitaminas y minerales para niños en crecimiento, nutrición completa y balanceada. <br>
  Registro Sanitario: RSiA16I188015. Este producto no reemplaza una alimentación adecuada. Complementa a diario su nutrición con Pediasure®. El ejercicio y una dieta balanceada contribuyen a una vida más saludable.</p>
  <p>Pediasure® Polvo. Alimento a base de proteína, lípidos, carbohidratos, vitaminas y minerales para niños en crecimiento nutrición completa y balanceada. <br>
    Registro Sanitario: RSA-000539-2015. Este producto no reemplaza una alimentación adecuada. Complementa a diario su nutrición con Pediasure®. El ejercicio y una dieta balanceada contribuyen a una vida más saludable.
  </p>
</div>
<div class="cont-video" style="padding: 0px 35px;">
    <div class='embed-container'><iframe width="560" height="315" src="https://www.youtube.com/embed/-z9-TvT_eBg?rel=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe></div>
    <!-- <div class='embed-container'><iframe src='https://www.youtube.com/embed/gX95PfdVgVc?rel=0' frameborder='0' allowfullscreen></iframe></div> -->
</div>

<!---FIN VERSIÓN MÓVIL-->


<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<!-- <div class="sidebar-cart">
	<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/general/compra-online.png" alt="Comprar pediasure">
</div> -->
<!--Header-->
<?php require 'headerAbbott.php'; ?>
<!--Banner principal-->
<img class="img-responsive bn-principal" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/banner-principal.jpg" alt="Con pedriasure ayudalos a llegar más alto">
<div class="container background">
  <div class="row ">
      <div class="col-sm-4 sol-md-4">
        <div class="row">
          <div class="col-md-12">
            <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/400gr.jpg" alt="Pediasure 400gr">
          </div>
        </div>
        <div class="row sabores">
          <div class="col-sm-4 sol-md-4">  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/fresa.png"> </div>
          <div class="col-sm-4 sol-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/chocolate.png"> </div>
          <div class="col-sm-4 sol-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/vainilla.png"> </div>
        </div>
        <div class="row">
          <p class="name-product">PediaSure 400 gr</p>
            <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2064)) ?>">
             <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/boton.png">
          </a>
        </div>
      </div>
      <div class="col-sm-4 sol-md-4">
        <div class="row">
          <div class="col-md-12">
            <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/900gr.jpg" alt="Pediasure 900gr">
          </div>
        </div>
        <div class="row sabores">
          <div class="col-sm-6 sol-md-6"> <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/fresa.png"> </div>
          <div class="col-sm-6 sol-md-6"> <img class="img-responsive" style="margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/vainilla.png"> </div>
        </div>
        <div class="row">
          <p class="name-product">PediaSure 900 gr</p>
              <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2066)) ?>">
               <img style="margin-top: 58px;" class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/boton.png">
            </a>
        </div>
      </div>

      <div class="col-sm-4 sol-md-4">
        <div class="row">
          <div class="col-md-12">
            <img class="img-responsive product" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/237ml.jpg" alt="Pediasure 237ml">
          </div>
        </div>
        <div class="row sabores">
          <div class="col-sm-4 sol-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/vainilla.png"> </div>
          <div class="col-sm-4 sol-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/fresa.png">  </div>
          <div class="col-sm-4 sol-md-4"> <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/chocolate.png"> </div>
        </div>
        <div class="row">
          <p class="name-product">PediaSure 237 ml</p>
            <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 2062)) ?>">
               <img class="img-responsive btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/boton.png">
            </a>
        </div>
      </div>
  </div>
  <div class="row bg-img" style="height: 536px;">
    <div class="col-sm-8 col-md-8 col-sm-offset-5 col-md-offset-5">
      <p class="princip">
        <span>Con PediaSure ayúdalos a llegar más alto</span> <br>
        <span>Complemento nutricional para niños de 2 a 13 años de edad.</span>
      </p>
      <ul class="lista">
        <li><span style="font-family: helvetica-neue-lt-std;font-style: italic;">Contiene los 5 grupos de nutrientes:</span><br>
        proteínas, carbohidratos, grasas, vitaminas y minerales.</li>
        <li>Contribuye a una nutrición completa y balanceada.</li>
        <li>Es un producto que aporta a los niños nutrientes clave <br> que apoyan su crecimiento y desarrollo.</li>
      </ul>
    </div>
  </div>
  <div class="row" style="padding: 25px;">
    <div class="col-sm-6 col-md-6">
      <img class="img-responsive" style="margin-top: 30px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/complementa-su-nutricion-a-diario-con-pediasure.png">
      <p class="sub-title"><span>Pediasure listo para tomar,</span><br>
        es la nueva presentaciòn, puedes llevarlo a donde quieras.
      </p>
    </div>
    <div class="col-sm-6 col-md-6">
      <img class="img-responsive nuevos-sabores" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/abbot/pediasure/nuevos-sabores.png" alt="nuevos sabores pediasure">
    </div>
  </div>
  <div class="row" style="padding: 76px 25px 20px;">
    <div class="text-legal">
      <p>Pediasure® Alimento líquido a base de proteína, lípidos, carbohidratos, vitaminas y minerales para niños en crecimiento, nutrición completa y balanceada. <br>
      Registro Sanitario: RSiA16I188015. Este producto no reemplaza una alimentación adecuada. Complementa a diario su nutrición con Pediasure®. El ejercicio y una dieta balanceada contribuyen a una vida más saludable.</p>
      <p>Pediasure® Polvo. Alimento a base de proteína, lípidos, carbohidratos, vitaminas y minerales para niños en crecimiento nutrición completa y balanceada. <br>
        Registro Sanitario: RSA-000539-2015. Este producto no reemplaza una alimentación adecuada. Complementa a diario su nutrición con Pediasure®. El ejercicio y una dieta balanceada contribuyen a una vida más saludable.
      </p>
    </div>
    <div class="row cont-video">
      <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
        <div class='embed-container'>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/-z9-TvT_eBg?rel=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
