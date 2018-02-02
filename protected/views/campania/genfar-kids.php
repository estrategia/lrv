<?php $this->pageTitle = "Genfar-Kids - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='¡Conoce nuestro Mundo KLIM®! Aquí encontrarás los alimentos lácteos para cada etapa, para niños a partir de 1 año, hasta los 5 años en adelante. '>
  <meta name='keywords' content='leche en polvo, leche klim, klim Colombia'>
  <style>
    @font-face {font-family:FrutigerLTStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/genfar-kids/fonts/FrutigerLTStd-Bold.otf);}
    @font-face {font-family:FrutigerLTStd-Light; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/genfar-kids/fonts/FrutigerLTStd-Light.otf);}
    @font-face {font-family:FrutigerLTStd-Roman; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/genfar-kids/fonts/FrutigerLTStd-Roman.otf);}
    @font-face {font-family:HelveticaNeueLTStd-Bd; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/genfar-kids/fonts/HelveticaNeueLTStd-Bd.otf);}
    @font-face {font-family:HelveticaNeueLTStd-BdCn; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/genfar-kids/fonts/HelveticaNeueLTStd-BdCn.otf);}
    @font-face {font-family:HelveticaNeueLTStd-Roman; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/genfar-kids/fonts/HelveticaNeueLTStd-Roman.otf);}
    @font-face {font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    @font-face {font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face {font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face {font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}


    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {font-size: 15px;}
    .programa-hora .span1 {font-family:HelveticaNeueLight;color:#363636;}
    .programa-hora .span2 {font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 16px;letter-spacing: 1px;margin-left2px;}
    .programa-hora .span3{color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;}
    .programa-hora .content {display: flex;width: 100%;flex-direction: row;max-width: 100%;flex-wrap: wrap;margin: 0 auto;}
    .programa-hora .content .seccion1 {padding-left: 100px;width: 60%;background-color: #C9C8C6;position: relative;}
    .programa-hora .content .seccion1:after {position: absolute;right: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0 23px 28px;border-color: #BF1A24 #BF1A24 #BF1A24 #C9C8C6;top: 0;}
    .programa-hora .content .seccion2 {width: 40%;background-color: #BF1A24;padding-right: 100px;}
    .programa-hora .content .seccion1-m {background-color: #C9C8C6;padding: 15px;text-align: center;}
    .programa-hora .content .seccion2-m {background-color: #BF1A24;width: 100%;padding: 15px;}
    .agradecimiento {font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 16px;}
    .agradecimiento span {font-family:HelveticaNeue-BlackCond;letter-spacing:1px;}
    a:hover, a:active, a:focus {outline: none !important;}

    @font-face {font-family:VAGRoundedStd-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/mundo-klim/fonts/VAGRoundedStd-Bold.otf);}
    #main-content {background-color: #F3FAFF; }
    .btn-compra-banner { text-align: right; position: absolute; right: 47%; margin-top: -75px;}
    .btn-compra-banner img {width:250px; max-width:260px;}
    .intro-txt {    font-family: HelveticaNeueLTStd-BdCn;text-align: center;color: white;font-size: 32px;margin-top: 50px;margin-right: 29%;letter-spacing: -1px;   text-shadow: 2px 2px 10px #9a9999;}
    .intro-txt-m {    font-family: HelveticaNeueLTStd-BdCn;text-align: center;color: white;font-size: 23px;margin-top: 26px;letter-spacing: -1px;   text-shadow: 2px 2px 10px #9a9999;}

    .intro-txt  span { color: #FE0000;}
    .row-productos {background: linear-gradient(to bottom, rgba(144,194,69,1) 0%, rgba(181,246,90,1) 100%); padding: 50px 0 25px;}
    .section-products {display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; width: 100%; max-width: 1200px; margin: 0 auto;}
    .column {width: 20%;}
    .section-products .column img {width: 100%; max-width: 241px;}
    .precioproductos-antes{font-family:VAGRoundedStd-Bold; color:#474747;margin: 0 auto;font-size: 19px;text-align: center; }
    .precioproductos-antes span::before {content: ''; width: 75px; height: 3px; background-color: #D60203; position: absolute; margin-top: 11px;}
    .precioproductos{font-family:VAGRoundedStd-Bold; color: #D60203;margin: 0 auto;font-size: 22px;text-align: center; }
    .txt-footer {  text-align: center;    font-family:HelveticaNeueLTStd-Roman;color: #414a35;margin-top: 72px;font-size: 15px;}
    .owl-pagination {margin-top: 35px;}
    @media only screen and (max-width: 1920px) and (min-width: 1700px)  {
      .btn-compra-banner {margin-top: -92px;}
      .programa-hora .content .seccion1 {width: 55%;}
      .programa-hora .content .seccion2 { width: 45%;}
      .programa-hora .content .seccion1 {padding-left: 432px;}
      .programa-hora .content .seccion2 {padding-right: 400px;}
  }
    .iconofrase{display: grid; grid-template-columns: 45% 43%;-webkit-box-align: center; grid-auto-rows: 100px; background: #90c245; padding-top: 43px;   }

.iconofrase-m{display: grid;grid-template-rows: 100% 100%;-webkit-box-align: center;grid-auto-rows: 100px;background: #90c245; padding-top: 43px;  }

.iconofrase img.img-responsive{display: block; width: 280px; max-width: 280px; margin-top: 7px;margin-left: 57%; height: auto;
}

.iconofrase-m img.img-responsive{display: block; width: 220px; max-width: 280px;margin-top: -32px;margin-left: 22%;height: auto;
}

@media only screen and (max-width: 2000px) and (min-width: 1700px)  {

  .btn-compra-banner { right: 47%; margin-top: -112px;  }

  .btn-compra-banner img {width: 376px;max-width: 400px;}


  .intro-txt { margin-right: 40%;}

.iconofrase img.img-responsive{
margin-left: 79%;

}
}

.item.lengueta {

    height: 92%;
}

.barrablanca{background: white;width:100%;margin: 0.5%;margin-bottom: 0px;}

.barrablanca img.img-responsive{ margin: 0% 88%;}

.distribucionlengueta {
  display: grid;
grid-template-rows: 50px 200px 200px;
grid-template-columns: 224px;
grid-gap: 10px;
grid-row-gap: 10px;
justify-content: center;
padding-top: 5px;

}


.contenedor-de-lengueta{
  border: 2.5px solid #932a7f;
      background: white;
      border-radius: 20px;
      height: 520px;
      box-shadow: 4px 4px 7px rgba(136, 136, 136, 0.5);
}

.contenedor-de-lengueta-m{
  border: 2.5px solid #932a7f;
      background: white;
      border-radius: 20px;
      height: 465px !important;
      box-shadow: 4px 4px 7px rgba(136, 136, 136, 0.5);
}


  img.img-responsive.cabecera-lengueta {
    display: block;
z-index: 8;
position: absolute;
  }

  img.img-responsive.cabecera-lengueta-m {
    display: block;
z-index: 8;
position: absolute;
    max-width: 85% !important;
  }

img.img-responsive.producto-contenido{
  width: 141px;
    margin: 0 auto;
    padding-top: 42%;
}

img.img-responsive.producto-contenido-m{
  width: 88px;
    margin: 0 auto;
    padding-top: 42%;
}

.titulolengueta{font-family: Frutiger LT Std;margin-bottom: 0px;font-size: 19px;text-align: center;font-weight: bold;
    color: #802F7D;
}

.titulosecundariolengueta{font-size: 15px;margin-top: 0px;font-family: Frutiger LT Std;text-align: center;color: #802F7D;
}

.descripcionlengueta{font-family: Frutiger LT Std;text-align: center;color: #5B5B5F;}

.vermasinformacion{font-family: Frutiger LT Std;    font-weight: bold;text-align: center;color: red;text-decoration: underline;}


  </style>
";
?>
<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/banner.jpg" alt="genfar kids">
<div class="iconofrase-m">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Una-linea-especial Home.png" alt="genfar kids">
<h1 class="intro-txt-m"> PARA LOS QUE TANTO QUIERES</h1>


</div>
<section class="row-productos">
  <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item" style="margin: 0 30px;">
      <img class="img-responsive cabecera-lengueta-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Dolor-y-Fiebre-O+.png" alt="genfar kids">
      <div class="distribucionlengueta">
        <div class="contenedor-de-lengueta-m">
          <img class="img-responsive producto-contenido-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Dolor-y-fiebre-O+.png" alt="genfar kids">
          <!---aqui debe seguir con el texto-->
          <h1 class="titulolengueta">DOLOR Y FIEBRE 0+</h1>
          <h4 class="titulosecundariolengueta">Acetaminofén</h4>
          <p class="descripcionlengueta">Cuando tu bebé siente<br> un dolorcito y se pone<br>
            muy calientico.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-acetaminofen">
                <h5 class="vermasinformacion">Ver más información </h5>
            </a>
         <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 119430)) ?>">
           <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
         </a>
        </div>
      </div>
    </div>
    <div class="item" style="margin: 0 30px;">
      <div class="item lengueta">
        <img class="img-responsive cabecera-lengueta-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Fiebre.png" alt="genfar kids">
        <div class="distribucionlengueta">
          <div class="contenedor-de-lengueta-m" style="border: 2.5px solid #ff7351;">
            <img class="img-responsive producto-contenido-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Fiebre.png" alt="genfar kids">
            <!---aqui debe seguir con el texto-->
            <h1 class="titulolengueta" style="color:#FF7354;">FIEBRE FUERTE</h1>
            <h4 class="titulosecundariolengueta" style="color:#FF7354;">Ibuprofeno</h4>
            <p class="descripcionlengueta" style="margin-bottom: 30px;">Es ese malaestar que<br> no los deja divertirse.</p>
              <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-ibuprofeno">
                  <h5 class="vermasinformacion">Ver más información </h5>
              </a>
           <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117520)) ?>">
             <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
           </a>
          </div>
        </div>
      </div>
    </div>
    <div class="item" style="margin: 0 30px;">
      <img class="img-responsive cabecera-lengueta-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Tos.png" alt="genfar kids">
      <div class="distribucionlengueta">
        <div class="contenedor-de-lengueta-m" style="    border: 2.5px solid #00d3d8;">
          <img class="img-responsive producto-contenido-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Tos.png" alt="genfar kids">
          <!---aqui debe seguir con el texto-->
          <h1 class="titulolengueta" style="color:#00A2DC;">TOS</h1>
          <h4 class="titulosecundariolengueta" style="color:#00A2DC;">Hedera Helix</h4>
          <p class="descripcionlengueta">Es ese pequeño llamado<br> de emergencia previo<br> a un resfriado.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-hedera-helix">
                <h5 class="vermasinformacion">Ver más información </h5>
            </a>
         <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117525)) ?>">
           <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
         </a>
        </div>
      </div>
    </div>
    <div class="item" style="margin: 0 30px;">
      <img class="img-responsive cabecera-lengueta-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Alergia.png" alt="genfar kids">
      <div class="distribucionlengueta">
        <div class="contenedor-de-lengueta-m" style="    border: 2.5px solid #ff4e72;">
          <img class="img-responsive producto-contenido-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Alergia.png" alt="genfar kids">
          <!---aqui debe seguir con el texto-->
          <h1 class="titulolengueta" style="color:#FF4F70;">ALERGIAS</h1>
          <h4 class="titulosecundariolengueta" style="color:#FF4F70;">Cetirizina Jarabe</h4>
          <p class="descripcionlengueta">Son esas señales que<br>los desespera y dejan<br>ver que algo no está bien.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-cetirizina">
                <h5 class="vermasinformacion">Ver más información </h5>
            </a>
         <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117515)) ?>">
           <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
         </a>
        </div>
      </div>
    </div>
    <div class="item" style="margin: 0 30px;">
      <img class="img-responsive cabecera-lengueta-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Cicatriz.png" alt="genfar kids">
      <div class="distribucionlengueta">
        <div class="contenedor-de-lengueta-m" style="    border: 2.5px solid #6fbe34;">
          <img class="img-responsive producto-contenido-m" style="width: 170px;margin: 13% auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Cicatriz.png" alt="genfar kids">
          <!---aqui debe seguir con el texto-->
          <h1 class="titulolengueta" style="color:#55AA2E;padding-top: 10%;">CICATRIZ</h1>
          <h4 class="titulosecundariolengueta" style="color:#55AA2E;">Calamina + óxido de Zinc</h4>
          <p class="descripcionlengueta" >Son esas marcas que quedan<br>después de jugar, y siempre<br>se deben cuidar.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-calamina">
                <h5 class="vermasinformacion">Ver más información </h5>
            </a>
         <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117523)) ?>">
           <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
         </a>
        </div>
      </div>
    </div>
  </div>
  <p class="txt-footer" style="margin: 25px 30px 0; font-size: 15px;">Es un medicamento no exceder su consumo. Leer indicaciones y contraindicaciones. Si los síntomas persisten consulte a su médico. Registro sanitario INVIMA:2015 M-014891-R2 - 2012M-0001230-R1 - PFM2011-0001744 - 2016M-0005929-R1 - 2012M-001-3653 - SACO.GFR.17.06.0723</p>
</section>
<section class="programa-hora">
  <div class="content">
    <div class="seccion1-m" style="margin: -5px;">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2-m">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
</section>
<div style="margin-top:30px;padding:0 15px;">
  <div style="padding: 0 25%;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-mobile.png" alt="Chat en linea">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-mobile.png" alt="pqrs">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-mobile.png" alt="Linea gratuita">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
  </div>
</div>
<!--FIN VERSION MOVIL-->

<!--VERSION DE ESCRITORIO-->
<?php else: ?>
  <div class="barrablanca"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/sanofi-logo.jpg" alt="genfar kids">
</div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/banner.jpg" alt="genfar kids">
<div class="btn-compra-banner">
  <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 6298)) ?>">
    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/mundo-klim/btn-compra.png" alt="Comprar">
  </a>
</div>
<div class="iconofrase">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Una-linea-especial Home.png" alt="genfar kids">
<h1 class="intro-txt"> PARA LOS QUE TANTO QUIERES</h1>


</div>
<section class="row-productos">
  <div class="section-products">
<!-- seccion del dolor y fiebre-->
    <div class="column">
      <div class="item lengueta">
        <img class="img-responsive cabecera-lengueta" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Dolor-y-Fiebre-O+.png" alt="genfar kids">
        <div class="distribucionlengueta">
          <div class="contenedor-de-lengueta">
            <img class="img-responsive producto-contenido" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Dolor-y-fiebre-O+.png" alt="genfar kids">
            <!---aqui debe seguir con el texto-->
            <h1 class="titulolengueta">DOLOR Y FIEBRE 0+</h1>
            <h4 class="titulosecundariolengueta">Acetaminofén</h4>
            <p class="descripcionlengueta">Cuando tu bebé siente<br> un dolorcito y se pone<br>
              muy calientico.</p>
              <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-acetaminofen">
                  <h5 class="vermasinformacion">Ver más información </h5>
              </a>
           <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 119430)) ?>">
             <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
           </a>
          </div>
        </div>
      </div>
    </div>
  <!--seccion de la fiebre-->
    <div class="column">
      <div class="item lengueta">
        <img class="img-responsive cabecera-lengueta" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Fiebre.png" alt="genfar kids">
        <div class="distribucionlengueta">
          <div class="contenedor-de-lengueta" style="border: 2.5px solid #ff7351;">
            <img class="img-responsive producto-contenido" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Fiebre.png" alt="genfar kids">
            <!---aqui debe seguir con el texto-->
            <h1 class="titulolengueta" style="color:#FF7354;">FIEBRE FUERTE</h1>
            <h4 class="titulosecundariolengueta" style="color:#FF7354;">Ibuprofeno</h4>
            <p class="descripcionlengueta" style="margin-bottom: 30px;">Es ese malaestar que<br> no los deja divertirse.</p>
              <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-ibuprofeno">
                  <h5 class="vermasinformacion">Ver más información </h5>
              </a>
           <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117520)) ?>">
             <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
           </a>
          </div>
        </div>
      </div>
    </div>
  <!--seccion de la TOS-->
  <div class="column">
    <div class="item lengueta">
      <img class="img-responsive cabecera-lengueta" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Tos.png" alt="genfar kids">
      <div class="distribucionlengueta">
        <div class="contenedor-de-lengueta" style="    border: 2.5px solid #00d3d8;">
          <img class="img-responsive producto-contenido" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Tos.png" alt="genfar kids">
          <!---aqui debe seguir con el texto-->
          <h1 class="titulolengueta" style="color:#00A2DC;">TOS</h1>
          <h4 class="titulosecundariolengueta" style="color:#00A2DC;">Hedera Helix</h4>
          <p class="descripcionlengueta">Es ese pequeño llamado<br> de emergencia previo<br> a un resfriado.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-hedera-helix">
                <h5 class="vermasinformacion">Ver más información </h5>
            </a>
         <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117525)) ?>">
           <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
         </a>
        </div>
      </div>
    </div>
  </div>
  <!-- seccion de alergia-->
  <div class="column">
    <div class="item lengueta">
      <img class="img-responsive cabecera-lengueta" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Alergia.png" alt="genfar kids">
      <div class="distribucionlengueta">
        <div class="contenedor-de-lengueta" style="    border: 2.5px solid #ff4e72;">
          <img class="img-responsive producto-contenido" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Alergia.png" alt="genfar kids">
          <!---aqui debe seguir con el texto-->
          <h1 class="titulolengueta" style="color:#FF4F70;">ALERGIAS</h1>
          <h4 class="titulosecundariolengueta" style="color:#FF4F70;">Cetirizina Jarabe</h4>
          <p class="descripcionlengueta">Son esas señales que<br>los desespera y dejan<br>ver que algo no está bien.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-cetirizina">
                <h5 class="vermasinformacion">Ver más información </h5>
            </a>
         <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117515)) ?>">
           <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
         </a>
        </div>
      </div>
    </div>
  </div>
<!-- seccion cicatriz-->
  <div class="column">
    <div class="item lengueta">
      <img class="img-responsive cabecera-lengueta" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/titulo-Cicatriz.png" alt="genfar kids">
      <div class="distribucionlengueta">
        <div class="contenedor-de-lengueta" style="    border: 2.5px solid #6fbe34;">
          <img class="img-responsive producto-contenido" style="width: 201px;margin: 29% auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/genfar-kids/home/Pack-Cicatriz.png" alt="genfar kids">
          <!---aqui debe seguir con el texto-->
          <h1 class="titulolengueta" style="color:#55AA2E;padding-top: 10%;">CICATRIZ</h1>
          <h4 class="titulosecundariolengueta" style="color:#55AA2E;">Calamina + óxido de Zinc</h4>
          <p class="descripcionlengueta" >Son esas marcas que quedan<br>después de jugar, y siempre<br>se deben cuidar.</p>
            <a data-ajax="false" href="<?= Yii::app()->request->baseUrl ?>/mundo-genfar-kids-calamina">
                <h5 class="vermasinformacion">Ver más información </h5>
            </a>
         <a data-ajax="false" href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 117523)) ?>">
           <img width="200" style="margin:0 auto;display:block;width: 130px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/gelicart/btn-comprar.png" alt="">
         </a>
        </div>
      </div>
    </div>
  </div>

  </div>
  <p class="txt-footer">Es un medicamento no exceder su consumo. Leer indicaciones y contraindicaciones. Si los síntomas persisten consulte a su médico.<br> Registro sanitario INVIMA:2015 M-014891-R2 - 2012M-0001230-R1 - PFM2011-0001744 - 2016M-0005929-R1 - 2012M-001-3653 - SACO.GFR.17.06.0723</p>
</section>
<section class="programa-hora">
  <div class="content">
    <div class="seccion1">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
</section>
<section style="background-color: #fff;">
  <div class="container" style="padding-top:30px;">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-escritorio.png" alt="Chat en linea">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
      </div>
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-escritorio.png" alt="pqrs">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
        <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
      </div>
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-escritorio.png" alt="Linea gratuita">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
        <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
      </div>
    </div>
  </div>
</section>
<!--Fin versión escritorio -->
<?php endif; ?>
