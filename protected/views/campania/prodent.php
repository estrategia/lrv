<?php $this->pageTitle = "Pro-Dent - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, user-scalable=no' />
  <meta name='description' content='Las cremas dentales PRODENT hacen parte del cuidado oral para ti y tu familia. Vienen en diferentes sabores y para cada necesidad.'>
  <meta name='keywords' content='crema dental, crema dental sin fluor, crema dental niños.'>
	<style>
		@font-face {
		    font-family: panton-regular;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/coaspharma/prodent/fonts/panton-regular.otf);
		}
    @font-face {
		    font-family: panton-bold;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/coaspharma/prodent/fonts/panton-bold.otf);
		}
    @font-face {
        font-family: corbel
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/coaspharma/prodent/fonts/corbel.ttf);
    }
		.sidebar-cart {position: fixed;right: 0px;top: 49%;z-index: 2000;}
    .space-1 {height: 0px !important;}
    .img-responsive {width:100%;}
    .bg-gray {background-color:#EFF5F3; border-bottom:2px solid #E5E5E5;margin-top:5%;padding-bottom: 40px;}
    .content-info {background-color:#DFEEF1;width: 68%;padding: 10px 0px 0px;border-radius: 15px;text-align: center;margin:0 auto;overflow: hidden;}
    .content-info img {width:100%;}
    .content-info p {line-height: 25px;font-family: panton-regular;font-size: 21px;margin:0;}
    .content-info strong { font-family: panton-bold;ont-size: 25px;}
    .content-info.rosa {color:#FF1085;}
    .content-info.azul-oscuro {color:#0F5296;}
    .content-info.verde {color:#83AF3E;}
    .content-info.rojo {color:#AD1925 !important;width: 47%;margin-top: 5%;}
    .content-info.verde-oscuro {color:#89B32D;width: 47%;margin-top: 5%;}
    .content-info.amarillo {color: #D98F0C !important;width: 47%;margin-left: 26%;}
    .content-info.azul-claro {color: #169DCA;width: 47%;}
    .separator {width: 100%;height: 11px;margin: 0 auto;margin-top: 40px;margin-bottom:30px;}
    .separator.rosa {background-color: #FA4085;}
    .separator.azul-oscuro {background-color: #0F5296;}
    .separator.verde {background-color:#83AF3E;}
    .separator.rojo {background-color:#A31D26;}
    .separator.verde-oscuro {background-color:#88B131;}
    .separator.amarillo {background-color:#D98F0C;}
    .separator.azul-claro {background-color: #169DCA;}
    .lista-descrip {font-family: corbel;color: #666A69;font-size: 17px;padding: 0px 0px 0px 27px;}
    .lista-descrip p {margin-top:10px;}
    .lista-descrip.rosa {list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-rosa.png);}
    .lista-descrip.azul-oscuro { list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-azul-oscuro.png);}
    .lista-descrip.verde { list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-verde.png);}
    .lista-descrip.rojo { list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-rojo.png);color: #666A69 !important;}
    .lista-descrip.verde-oscuro { list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-verde-oscuro.png);}
    .lista-descrip.azul-claro { list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-azul-claro.png);}
    .lista-descrip.amarillo { list-style-image: url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/prodent/more-amarillo.png);}
    .lista-descrip.rosa strong {color:#FA4085;}
    .marca {width: 18%;margin-top: 2%;}
    .bg-kids {position: absolute;margin-top: -32.5%;}
    .bg-prodent01 {position: absolute;margin-top: -25.99%;}
    .bg-prodent02 {position: absolute;margin-top: -29.1%;}

    /* Responsive de la franja azul prodent kids*/
    @media (min-width: 1100px) and (max-width: 1199px) {.bg-kids {margin-top: -51%;}}
    @media (min-width: 1200px) and (max-width: 1299px) {.bg-kids {margin-top: -40%;}}
    @media (min-width: 1300px) and (max-width: 1399px) {.bg-kids {margin-top: -38.3%;}}
    @media (min-width: 1400px) and (max-width: 1500px) {.bg-kids {margin-top: -38.3%;}}
    @media (min-width: 1501px) and (max-width: 1600px) {.bg-kids {margin-top: -36.4%;}}
    @media (min-width: 1601px) and (max-width: 1700px) {.bg-kids {margin-top: -35.5%;}}
    @media (min-width: 1701px) and (max-width: 1800px) {.bg-kids {margin-top: -34.5%;}}

    /* Responsive de la franja azul prodent 01*/
    @media (min-width: 1100px) and (max-width: 1199px) {.bg-prodent01 {margin-top: -35.5%;}}
    @media (min-width: 1200px) and (max-width: 1299px) {.bg-prodent01 {margin-top: -30.4%;}}
    @media (min-width: 1300px) and (max-width: 1399px) {.bg-prodent01 {margin-top: -29.3%;}}
    @media (min-width: 1400px) and (max-width: 1500px) {.bg-prodent01 {margin-top: -28.5%;}}
    @media (min-width: 1501px) and (max-width: 1600px) {.bg-prodent01 {margin-top: -27.5%;}}
    @media (min-width: 1601px) and (max-width: 1700px) {.bg-prodent01 {margin-top: -27.1%;}}
    @media (min-width: 1701px) and (max-width: 1800px) {.bg-prodent01 {margin-top: -26.5%;}}

    /* Responsive de la franja azul prodent 02*/
    @media (min-width: 1100px) and (max-width: 1199px) {.bg-prodent02 {margin-top: -40.5%;}}
    @media (min-width: 1200px) and (max-width: 1299px) {.bg-prodent02 {margin-top: -34.9%;}}
    @media (min-width: 1300px) and (max-width: 1399px) {.bg-prodent02 {margin-top: -33.6%;}}
    @media (min-width: 1400px) and (max-width: 1500px) {.bg-prodent02 {margin-top: -32.5%;}}
    @media (min-width: 1501px) and (max-width: 1600px) {.bg-prodent02 {margin-top: -31.5%;}}
    @media (min-width: 1601px) and (max-width: 1700px) {.bg-prodent02 {margin-top: -30.6%;}}
    @media (min-width: 1701px) and (max-width: 1800px) {.bg-prodent02 {margin-top: -29.9%;}}

	</style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/banner.jpg" alt="Banner prodent">
<!-- PRODENT KIDS -->
<div class="bg-gray" style="margin:0px;">
  <img class="marca" style="width: 80%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/marca-prodent-kids.png">
  <!-- Enjuague bucal kids -->
  <section>
    <img style="width: 45%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-chicle.png" alt="Prodent sabor chicle">
    <div class="content-info rosa">
      <p>Enjuague Bucal <br> <strong>Pro-Dent Kids</strong></p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 10634)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
    </div>
    <div style="width:70%;margin: 0 auto;">
      <div class="separator rosa" style="margin-top: 17px;margin-bottom: 20px;"></div>
        <ul class="lista-descrip rosa">
          <li>Con Fluor.</li>
          <li>Sabor a chicle.</li>
          <li>Úselo después del cepillado haciendo gárgaras por 30 seg.</li>
          <p><strong>Precauciones:</strong><br>
          No usar en niños menores de 5 años sino es recomendado por un Odontólogo o Pediatra.
          </p>
        </ul>
    </div>
  </section>
</div>
<!-- Crema dental pro dent kids -->
<section>
    <img style="width: 45%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-kids.png" alt="Prodent kids">
    <div class="content-info azul-oscuro">
      <p>Crema Dental Pro-Dent<br> <strong>Kids Sin Flúor</strong></p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 114517)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
    </div>
    <div style="width:70%;margin: 0 auto;">
      <div class="separator azul-oscuro" style="margin-top: 17px;margin-bottom: 20px;"></div>
      <ul class="lista-descrip azul-oscuro">
        <li>Suave formula de uso diario.</li>
        <li>Con sabor a Tutti Frutti.</li>
        <li>Ayuda a prevenir las caries.</li>
        <li>Incentiva desde temprana edad el hábito de mantener dientes y boca limpia y saludable.</li>
        <li>Ideal para usar en los niños menores a 6 años.</li>
      </ul>
    </div>
</section>
<!-- Crema dental pro dent kids 6+ -->
<div class="bg-gray" style="margin:0px;">
  <section>
    <img style="width: 45%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-kids-6.png" alt="Prodent kids">
    <div class="content-info verde">
      <p>Crema Dental Pro-Dent<br> <strong>Kids 6+</strong></p>
      <a href="#"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
    </div>
    <div style="width:70%;margin: 0 auto;">
      <div class="separator verde" style="margin-top: 17px;margin-bottom: 20px;"></div>
      <ul class="lista-descrip verde">
        <li>Suave formula de uso diario.</li>
        <li>Con sabor a Tutti Frutti.</li>
        <li>Ayuda a prevenir las caries.</li>
        <li>Incentiva desde temprana edad el hábito de mantener dientes y boca limpia y saludable.</li>
      </ul>
    </div>
  </section>
</div>
<!-- PRODENT CREMA-->
<img class="marca"  style="width:80%;margin-top: 25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/marca-prodent.png">
<!-- Crema blanqueadora -->
<section style="margin-top:20px;">
  <img style="width: 90%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-blanqueador.png" alt="Prodent sabor chicle">
    <div class="content-info rojo" style="width: 67%;">
      <p>Crema Dental Pro-Dent <br> <strong>Blanqueadora</strong></p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 116492)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
    </div>
    <div style="width:70%;margin: 0 auto;">
      <div class="separator rojo" style="margin-top: 17px;margin-bottom: 20px;"></div>
        <ul class="lista-descrip rojo">
          <li>Fortifica el esmalte dental para reducir la incidencia de caries.</li>
          <li>Su uso continuo ayuda a mantener dientes blancos por mas tiempo.</li>
          <li>Ayuda a mantener un aliento fresco y duradero.</li>
        </ul>
    </div>
</section>
<!-- Prodent anticaries-->
<div class="bg-gray" style="margin:0px;">
   <section style="padding-top:20px;">
     <img style="width: 90%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-anticaries.png" alt="Prodent kids">
        <div class="content-info verde-oscuro"  style="width: 67%;">
            <p>Crema Dental Pro-Dent<br> <strong>Anti caries</strong></p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115286)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
        </div>
          <div style="width:70%;margin: 0 auto;">
            <div class="separator verde-oscuro" style="margin-top: 17px;margin-bottom: 20px;"></div>
            <ul class="lista-descrip verde-oscuro">
              <li>Fortifica el esmalte dental.</li>
              <li>Reduce la incidencia de caries.</li>
              <li>Con sabor a menta para dar sensación de frescura, dejando el aliento fresco por más tiempo.</li>
            </ul>
          </div>
    </section>
</div>
<!-- PRODENT ENJUAGUE BUCAL-->
<section>
  <img style="width: 50%;margin: 0 20%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/enjuague-prodent-original.png" alt="Prodent sabor chicle">
  <div class="content-info amarillo" style="width: 60%;margin: 0 auto;">
    <p>Enjuague Bucal <br> <strong>Pro-Dent Original</strong></p>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 46522)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
  </div>
  <div style="width:70%;margin: 0 auto;">
    <div class="separator amarillo" style="margin-top: 17px;margin-bottom: 20px;"></div>
    <ul class="lista-descrip amarillo">
      <li>Previene la acumulación de Sarro.</li>
      <li>Combatern los gérmenes que producen la placa bacteriana y el mal aliento.</li>
    </ul>
  </div>
</section>
<!-- Pro dent fresh mint -->
<div class="bg-gray" style="margin:0px;">
  <section>
    <img style="width: 50%;margin: 0 20%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/enjuague-bucal-fresh.png" alt="Prodent kids">
    <div class="content-info azul-claro" style="width: 60%;margin: 0 auto;">
      <p>Enjuague Bucal<br> <strong>Pro-Dent Fresh Mint</strong></p>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 10636)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
    </div>
    <div style="width:70%;margin: 0 auto;">
      <div class="separator azul-claro" style="margin-top: 17px;margin-bottom: 20px;"></div>
      <ul class="lista-descrip azul-claro">
        <li>Combate los gérmenes que producen el mal aliento y la inflamación de las encías.</li>
        <li>Elimina la placa bacteriana.</li>
        <li>Permite acabar con aquellas bacterias localizadas en zonas de difícil acceso tanto para el cepillo como para el hilo dental.</li>
      </ul>
    </div>
  </section>
</div>
<!--Fin version movil-->

<!--Versión escritorio-->
<?php else: ?>
	<div class="sidebar-cart">
  	<a href="#">
  		<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/compra-online.png" alt="Comprar sol-or">
  	</a>
	</div>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/banner.jpg" alt="">
  <!-- PRODENT KIDS -->
  <div class="bg-gray">
    <img class="marca" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/marca-prodent-kids.png">
    <div class="container" style="z-index: 2;position: relative;">
      <div class="row">
        <div class="col-sm-4 col-md-4">
          <img style="width: 90%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-chicle.png" alt="Prodent sabor chicle">
          <div class="content-info rosa">
            <p>Enjuague Bucal <br> <strong>Pro-Dent Kids</strong></p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 10634)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
          </div>
          <div style="width:70%;margin: 0 auto;">
            <div class="separator rosa"></div>
            <ul class="lista-descrip rosa">
              <li>Con Fluor.</li>
              <li>Sabor a chicle.</li>
              <li>Úselo después del cepillado <br> haciendo gárgaras por 30 seg.</li>
              <p><strong>Precauciones:</strong><br>
                No usar en niños menores <br>
                de 5 años sino es recomendado <br>
                por un Odontólogo o Pediatra.
              </p>
            </ul>
          </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <img style="width: 90%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-kids.png" alt="Prodent kids">
          <div class="content-info azul-oscuro">
            <p>Crema Dental Pro-Dent<br> <strong>Kids Sin Flúor</strong></p>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 114517)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
          </div>
          <div style="width:70%;margin: 0 auto;">
            <div class="separator azul-oscuro"></div>
            <ul class="lista-descrip azul-oscuro">
              <li>Suave formula de uso diario.</li>
              <li>Con sabor a Tutti Frutti.</li>
              <li>Ayuda a prevenir las caries.</li>
              <li>Incentiva desde temprana edad <br>el hábito de mantener dientes y<br> boca limpia y saludable.</li>
              <li>Ideal para usar en los niños <br> menores a 6 años.</li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <img style="width: 90%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-kids-6.png" alt="Prodent kids">
          <div class="content-info verde">
            <p>Crema Dental Pro-Dent<br> <strong>Kids 6+</strong></p>
            <a href="#"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
          </div>
          <div style="width:70%;margin: 0 auto;">
            <div class="separator verde"></div>
            <ul class="lista-descrip verde">
              <li>Suave formula de uso diario.</li>
              <li>Con sabor a Tutti Frutti.</li>
              <li>Ayuda a prevenir las caries.</li>
              <li>Incentiva desde temprana edad <br>el hábito de mantener dientes y<br> boca limpia y saludable.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <img class="img-responsive bg-kids" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/bg-kids.jpg">
  <!-- PRODENT CREMA-->
  <img class="marca" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/marca-prodent.png">
  <div class="container" style="z-index: 2;position: relative;">
    <div class="row">
      <div class="col-sm-6 col-md-6">
            <img style="width: 90%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-blanqueador.png" alt="Prodent sabor chicle">
            <div class="content-info rojo">
              <p>Crema Dental Pro-Dent <br> <strong>Blanqueadora</strong></p>
              <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 116492)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
            </div>
            <div style="width:70%;margin: 0 auto;">
              <div class="separator rojo"></div>
              <ul class="lista-descrip rojo">
                <li>Fortifica el esmalte dental para reducir<br> la incidencia de caries.</li>
                <li>Su uso continuo ayuda a mantener dientes <br> blancos por mas tiempo.</li>
                <li>Ayuda a mantener un aliento fresco y duradero.</li>
              </ul>
            </div>
          </div>
      <div class="col-sm-6 col-md-6">
            <img style="width: 90%;margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/prodent-anticaries.png" alt="Prodent kids">
            <div class="content-info verde-oscuro">
              <p>Crema Dental Pro-Dent<br> <strong>Anti caries</strong></p>
              <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115286)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
            </div>
            <div style="width:70%;margin: 0 auto;">
              <div class="separator verde-oscuro"></div>
              <ul class="lista-descrip verde-oscuro">
                <li>Fortifica el esmalte dental.</li>
                <li>Reduce la incidencia de caries.</li>
                <li>Con sabor a menta para dar sensación de frescura,<br>dejando el aliento fresco por más tiempo.</li>
              </ul>
            </div>
          </div>
    </div>
  </div>
  <img class="img-responsive bg-prodent01" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/bg-prodent.jpg">
  <!-- PRODENT ENJUAGUE BUCAL-->
  <div class="container" style="z-index: 2;position: relative;margin-bottom:35px;">
    <div class="row">
      <div class="col-sm-6 col-md-6">
            <img style="width: 50%;margin: 0 20%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/enjuague-prodent-original.png" alt="Prodent sabor chicle">
            <div class="content-info amarillo">
              <p>Enjuague Bucal <br> <strong>Pro-Dent Original</strong></p>
              <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 46522)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
            </div>
            <div style="width:70%;margin: 0 auto;">
              <div class="separator amarillo"></div>
              <ul class="lista-descrip amarillo">
                <li>Previene la acumulación de Sarro.</li>
                <li>Combatern los gérmenes que producen la placa <br>bacteriana y el mal aliento.</li>
              </ul>
            </div>
          </div>
      <div class="col-sm-6 col-md-6">
            <img style="width: 50%;margin: 0 20%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/enjuague-bucal-fresh.png" alt="Prodent kids">
            <div class="content-info azul-claro">
              <p>Enjuague Bucal<br> <strong>Pro-Dent Fresh Mint</strong></p>
              <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 10636)) ?>"><img style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/boton.png" alt="Comprar Online"></a>
            </div>
            <div style="width:70%;margin: 0 auto;">
              <div class="separator azul-claro"></div>
              <ul class="lista-descrip azul-claro">
                <li>Combate los gérmenes que producen el mal <br> aliento y la inflamación de las encías.</li>
                <li>Elimina la placa bacteriana.</li>
                <li>Permite acabar con aquellas bacterias localizadas<br> en zonas de difícil acceso tanto para el cepillo <br> como para el hilo dental.</li>
              </ul>
            </div>
          </div>
    </div>
  </div>
  <img class="img-responsive bg-prodent02" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/prodent/bg-prodent.jpg">
<!--Fin versión escritorio-->
<?php endif; ?>
