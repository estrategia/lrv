<?php $this->pageTitle = "Asepxia - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Cuida tu piel del exceso de grasa, barros o espinillas con productos Asepxia, línea de tecnología avanzada que ayuda a eliminar imperfecciones. ¡Cómprala aquí! '>
  <meta name='keywords' content='asepxia, asepxia elimina imperfecciones, asepxia elimina el exceso de grasa'>
  <style>
    @font-face {font-family:FjallaOne-Regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/asepxia/fonts/FjallaOne-Regular.ttf);}
    @font-face {font-family:NunitoSans-Regular;src: url(".Yii::app()->request->baseUrl."/images/contenido/asepxia/fonts/NunitoSans-Regular.ttf);}
    /*......................... primera seccion ..........................*/
    .space-1 {height: 0px !important; }
    .cuerpo { /* background: rgb(252,210,57); background: linear-gradient(to bottom, rgb(252,210,57) 0%,rgb(234,209,65) 20%,rgb(239,222,110) 21%,rgb(214,151,246) 18%,rgb(219,173,244) 51%,rgb(230,210,242) 70%,rgb(227,93,94) 66%,rgb(226,124,124) 80%,rgb(226,186,186) 94%,rgb(59,59,187) 94%,rgb(59,59,187) 100%);
    */ /*
    background: rgb(136,174,212);
    background: -moz-linear-gradient(top, rgb(136,174,212) 1%, rgb(203,235,255) 38%, rgb(208,193,197) 38%, rgb(241,235,240) 75%, rgb(97,0,0) 75%, rgb(226,0,0) 92%, rgb(254,0,0) 100%);
    background: -webkit-linear-gradient(top, rgb(136,174,212) 1%,rgb(203,235,255) 38%,rgb(208,193,197) 38%,rgb(241,235,240) 75%,rgb(97,0,0) 75%,rgb(226,0,0) 92%,rgb(254,0,0) 100%);
    background: linear-gradient(to bottom, rgb(136,174,212) 1%,rgb(203,235,255) 24%,rgb(208,193,197) 24%,rgb(241,235,240) 66%,rgb(97,0,0) 65%,rgb(226,0,0) 88%,rgb(254,0,0) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#88aed4', endColorstr='#fe0000',GradientType=0 );
    */
    background: rgb(254,211,51);
    background: -moz-linear-gradient(top, rgba(254,211,51,1) 1%, rgba(254,211,51,1) 24%, rgba(214,151,248,1) 24%, rgba(214,151,248,1) 65%, rgba(228,95,95,1) 65%, rgba(228,95,95,1) 94%, rgba(58,59,189,1) 88%, rgba(58,59,189,1) 88%, rgba(58,59,189,1) 100%);
    background: -webkit-linear-gradient(top, rgba(254,211,51,1) 1%,rgba(254,211,51,1) 24%,rgba(214,151,248,1) 24%,rgba(214,151,248,1) 65%,rgba(228,95,95,1) 65%,rgba(228,95,95,1) 94%,rgba(58,59,189,1) 88%,rgba(58,59,189,1) 88%,rgba(58,59,189,1) 100%);
    background: linear-gradient(to bottom, rgba(254,211,51,1) 1%,rgba(254,211,51,1) 24%,rgba(214,151,248,1) 24%,rgba(214,151,248,1) 65%,rgba(228,95,95,1) 65%,rgba(228,95,95,1) 94%,rgba(58,59,189,1) 88%,rgba(58,59,189,1) 88%,rgba(58,59,189,1) 100%)
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fed333', endColorstr='#3a3bbd',GradientType=0 );
    }
    /*
  .agua{background-size: cover;position: absolute;width: 100%;height: 100%;margin-top: 3%;opacity: 0.8;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/asepxia/images/water-bubbles.png);}
  @media (max-width: 900px) {.agua{background-size: 121%;position: absolute;width: 137%;height: 26%;margin-top: 43%;opacity: 0.8;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/asepxia/images/water-bubbles.png);}}
  */
  .cuerpotitulo{text-align: center;}
  h1.titulo-principal{font-family: FjallaOne-Regular;color:white;font-size: 57px;margin: 1em 0px 0.5em;}
  h2.texto-deltitulo{font-family: FjallaOne-Regular;color: #414042;font-size: 1.7em;}
  h4.tituloproductos{font-family:FjallaOne-Regular;font-size: 1.5em;color: #154780;width: 300px;}
  p.textoproductos{font-family:NunitoSans-Regular;padding-left: 2.5em;text-align: center;font-size: 1.08em;color: #4A4A4A;width: 300px;}
  p.precioproductos{font-family:FjallaOne-Regular;text-align: center;font-size: 1.6em;color: #4A4A4A;width: 300px;font-weight: bold;transform: scaleX(0.8);}
  .contenedor-blanco{background: white;padding-top: 5em;padding-bottom: 5em;position:relative;margin-right: 8%;margin-left: 8%;}
  .img-responsive.img-producto{padding: 0 1rem;margin: 1rem;margin-left: auto;margin-right: auto;}
  .row.productos{padding-top: 5em;padding-bottom: 3em;}
  .row.textoproductos {margin: 0 auto;padding: 0 3rem;text-align: center;}
  .row.textoproductosparabajar{margin: 0 auto;margin-top: 10%;padding: 0 3rem;text-align: center;}
  .franja{margin-left: 28em;position: absolute;width: 2px;height: 245px;box-shadow: 9px 10px 12px 0px #d8d1d1;border-radius: 5px;}
  .franja2{margin-left: 57em;position: absolute;width: 2px;height: 245px;box-shadow: 9px 10px 12px 0px #d8d1d1;border-radius: 5px;}
  @media (max-width: 900px) {.textoproductos, .textoproductos2, .tituloproductos2, .precioproductos, .precioproductos2, .contenedor-creditos{text-align: unset !important;width: 200px !important;padding: 0px !important;}.franja, .franja2 {display: none !important;}}
  /* .........................ESTILOS SEGUNDA SECCION..................*/
  h1.titulo-principal2{font-family: FjallaOne-Regular;color: white;font-size: 57px;margin-top: 1em;margin-bottom:1em;}
  h1.titulo-principa3{font-family: FjallaOne-Regular;color:white;font-size: 57px;margin: 1.3em 0 1em;}
  .contenedor-titulos{text-align:center;}
  h2.texto-deltitulo2{font-family: FjallaOne-Regular;color: #414042;font-size: 1.7em;margin-bottom: 1em;}
  h4.tituloproductos2{font-family:FjallaOne-Regular;font-size: 1.5em;color: #154780;width: 300px;text-align: center;}
  p.textoproductos2{font-family:NunitoSans-Regular;text-align: center;font-size: 1.08em;color: #4A4A4A;width: 300px;}
  p.precioproductos2{font-family:FjallaOne-Regular; text-align: center;font-size: 1.6em;color: #4A4A4A;width: 300px; font-weight: bold;}
  .contenedor-blanco2{background: white;padding-top: 5em;padding-bottom: 5em;margin-right: 8%;margin-left: 8%;}
  .img-responsive.img-producto2{padding: 0 1rem;margin: 1rem;margin-left: auto;margin-right: auto;}
  .row.productos2{padding-top: 5em;padding-bottom: 3em;}
  .row.textoproductos2 {margin: 0 auto;padding: 0 3rem;text-align: center;}
  .franja4{margin-left: 42em;position: absolute;width: 2px;height: 700px;box-shadow: 9px 10px 12px 0px #d8d1d1;border-radius: 5px;}
  .franja5{margin-left: 42em;position: absolute;width: 2px;height: 245px; box-shadow: 9px 10px 12px 0px #d8d1d1;border-radius: 5px;}
  .botoncompra{ margin: 0 auto; }
  /*.botoncompra:hover{ background: #4673db; text-decoration: none;margin-bottom: 20px;border:none; padding: 12px 22px;}*/
  @media (min-width: 1915px) and (max-width: 1920px){
    .franja4, .franja3{margin-left: 56em;}
    .franja{margin-left: 37em;}
    .franja2{margin-left: 75em;}
    .franja5{margin-left: 59em;}
    .tituloproductos, .tituloproductos2{width: 23em !important;}
    .textoproductos, .textoproductos2, .precioproductos, .precioproductos2{margin: 0 auto !important;}
  }
  /*----------------------seccion final---------------*/
  /*....................tercera seccion................*/
  .franja3{margin-left: 44em;position: absolute;width: 2px;height: 245px;box-shadow: 9px 10px 12px 0px #d8d1d1;border-radius: 5px;}
  /*....................final tercera seccion...............*/
  .contenedor-creditos {padding: 40px 0px 40px 0px;font-size: 1.0em;color: white;text-align: center;margin: 7px 0px 0px 0px;}
  .precioproductos-m{font-family: FjallaOne-Regular;margin-top:0px;}
  .precioproductos-m-antes{font-family: FjallaOne-Regular;text-decoration: line-through;margin-bottom:0px;}
  /* ---------------estilos del movil--------------*/
  img-responsive-m {width:100%;display:block;}
  .cuerpo-m{background: #fed333;}
  .titulo-principal2-m{font-family: FjallaOne-Regular;padding: 1em 1em 0 1.8em; color: white;font-size: 34px;margin-top: 0px;}
  .texto-deltitulo2-m{font-family: FjallaOne-Regular;padding: 0 1em 1em 1em;text-align: center;color: #414042;font-size: 1.4em;}
  .titulo-principal3-m-2{font-family: FjallaOne-Regular;padding: 1em 1em 0 1.8em; color: white;font-size: 34px;margin-top: 0px;}
  div#owl-productodetalle-inicio{background: #fed333;}
  .item.secciondelproducto{margin: 0 2em 2em;padding: 2em 0 2em;background-color; background: white;}
  .textoproductos-m{ font-family:FjallaOne-Regular; padding: 0 1rem;font-size: 16px; text-align: center;color: #414042;}
  .tituloproductos-m{font-family:FjallaOne-Regular;font-size: 1.5em;color: #154780;color: #1c4e85;}
  .owl-theme .owl-controls .owl-page span{background-color: white !important;}
  /*seccion 2 del movil*/
  div#owl-productodetalle-inicio2{background:#d697f8;}
  div#owl-productodetalle-inicio3{background: #e45f5f;}
  .cuerpo2-m{background: #d697f8;}
  .cuerpo3-m{background: #e45f5f;}
  .titulo-principal2-m-2{font-family: FjallaOne-Regular;padding: 1em 1em 0 1em; color: white;font-size: 34px;margin-top: 0.1px;}
  .owl-controls{padding-bottom: 2em;}
  .contenedor-creditos-m {background: #3a3bbd;padding: 40px;font-size: 1.0em;color: white;text-align: center;margin:0px;}
  @media (max-width: 900px) {{.botoncompra: width: 25%; margin: 0 auto;}}
  p.precioproductos-antes {transform: scaleX(0.8);font-family: FjallaOne-Regular;text-decoration: line-through;font-weight: bold;margin-bottom: 0;text-align: center;font-size: 1.6em;color: #4A4A4A;margin-top: 15px;}
</style>
";
?>

<?php $jabon_exfoliante = Producto::consultarPrecio('63948', $this->objSectorCiudad)?>
<?php $jabon_forte = Producto::consultarPrecio('63949', $this->objSectorCiudad)?>
<?php $jabon_soft = Producto::consultarPrecio('65423', $this->objSectorCiudad)?>
<?php //$jabon_neutro = Producto::consultarPrecio('15512', $this->objSectorCiudad, 'u')?>
<?php //$jabon_forteazufre = Producto::consultarPrecio('65424', $this->objSectorCiudad, 'u')?>
<?php $jabon_maquillajenatural = Producto::consultarPrecio('82323', $this->objSectorCiudad)?>
<?php $jabon_maquillajebronce = Producto::consultarPrecio('82324', $this->objSectorCiudad)?>
<?php $jabon_maquillajebeigemate = Producto::consultarPrecio('82325', $this->objSectorCiudad)?>
<?php $jabon_maquillajeclaromate = Producto::consultarPrecio('83241', $this->objSectorCiudad)?>
<?php $gel_spot = Producto::consultarPrecio('63950', $this->objSectorCiudad)?>
<?php $camouflaje = Producto::consultarPrecio('63944', $this->objSectorCiudad)?>


<!--VERSIÓN MÓVIL-->
<?php if ($this->isMobile): ?>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/banner-asepxia.png" alt="Para eliminar las imperfecciones">
<section class="cuerpo-m">
  <div class="agua"></div>
  <h1 class="titulo-principal2-m">LÍNEA LIMPIEZA</h1>
  <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle secciondelproducto">
    <div class="item secciondelproducto">
      <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/platilla-producto.png" alt="Para eliminar las imperfecciones">
        <div class=" textoproductos-m">
            <h4 class="tituloproductos-m">ASEPXIA TOALLITAS DE LIMPIEZA X25 unidades</h4>
             <p class="textoproductos-m">Dile adiós al brillo de tu cara con Toallitas Asepxia.</p>
             <p class="precioproductos-m-antes">ANTES: <?= ($jabon_exfoliante == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_exfoliante["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <p class="precioproductos-m">AHORA: <?= ($jabon_exfoliante == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_exfoliante["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63948)) ?>"><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
        </div>
    </div>
    <div class="item secciondelproducto">
        <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/platilla-producto.png" alt="Remueve células muertas con efecto astringente.  ">
        <div class=" textoproductos-m">
            <h4 class="tituloproductos-m">ASEPXIA TOALLITAS DE LIMPIEZA X10 unidades</h4>
             <p class="textoproductos-m">Dile adiós al brillo de tu cara con Toallitas Asepxia.</p>
             <p class="precioproductos-m-antes">ANTES: <?= ($jabon_forte == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_forte["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <p class="precioproductos-m">AHORA: <?= ($jabon_forte == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_forte["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63949)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
        </div>
    </div>
    <div class="item secciondelproducto">
      <img class="img-responsive img-producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/jabon-soft.png" alt="favoreciendo delicadamente las pieles grasas y con granitos.">
      <div class="textoproductos-m">
          <h4 class="tituloproductos-m">ASEPXIA GEL EXFOLIANTE PARA PUNTOS NEGROS</h4>
           <p class="textoproductos-m">Exfolia suavemente tu piel, renovada y sin imperfecciones.</p>
           <p class="precioproductos-m-antes">ANTES: <?= ($jabon_soft == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_soft["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
           <p class="precioproductos-m">AHORA: <?= ($jabon_soft == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_soft["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
           <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65423)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
      </div>
    </div>
</section>
<section class="cuerpo2-m">
  <h1 class="titulo-principal2-m-2">ASEPXIA MAQUILLAJES</h1>
  <div id="owl-productodetalle-inicio2" class="owl-carousel owl-theme owl-productodetalle secciondelproducto">
    <div class="item secciondelproducto">
      <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="Para eliminar las imperfecciones">
        <div class=" textoproductos-m">
            <h4 class="tituloproductos-m"> ASEPXIA MAQUILLAJE NATURAL</h4>
             <p class="textoproductos-m">Cubre y cuida tus imperfecciones con Polvos Asepxia. </p>
             <p class="precioproductos-m-antes">ANTES: <?= ($jabon_maquillajenatural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajenatural["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <p class="precioproductos-m">AHORA: <?= ($jabon_maquillajenatural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajenatural["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 82323)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
        </div>
    </div>
    <div class="item secciondelproducto">
        <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="Remueve células muertas con efecto astringente.  ">
        <div class=" textoproductos-m">
            <h4 class="tituloproductos-m">ASEPXIA MAQUILLAJE BRONCE</h4>
             <p class="textoproductos-m">Cubre y cuida tus imperfecciones con Polvos Asepxia.</p>
              <p style="margin: 0px;height:14px;">&nbsp;</p>
              <p class="precioproductos-m-antes">ANTES: <?= ($jabon_maquillajebronce == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebronce["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <p class="precioproductos-m">AHORA: <?= ($jabon_maquillajebronce == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebronce["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 82324)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
        </div>
    </div>
    <div class="item secciondelproducto">
      <img class="img-responsive img-producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="favoreciendo delicadamente las pieles grasas y con granitos.">
      <div class="textoproductos-m">
          <h4 class="tituloproductos-m"> ASEPXIA MAQUILLAJE <br> BEIGE MATE</h4>
           <p class="textoproductos-m">Cubre y cuida tus imperfecciones con Polvos Asepxia. </p>
           <p class="precioproductos-m-antes">ANTES: <?= ($jabon_maquillajebeigemate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebeigemate["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
           <p class="precioproductos-m">AHORA: <?= ($jabon_maquillajebeigemate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebeigemate["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
           <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 82325)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
    </div>
  </div>
    <div class="item secciondelproducto">
      <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="prevenir la aparición de imperfecciones. ">
      <div class=" textoproductos-m">
          <h4 class="tituloproductos-m">  ASEPXIA MAQUILLAJE <br> CLARO MATE</h4>
           <p class="textoproductos-m">Maquillaje en polvo compacto que absorbe la grasa de la piel mientras ayuda a reducir imperfecciones.  </p>
           <p class="precioproductos-m-antes">ANTES: <?= ($jabon_maquillajeclaromate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajeclaromate["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
           <p class="precioproductos-m">AHORA: <?= ($jabon_maquillajeclaromate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajeclaromate["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
           <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 83241)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
    </div>
  </div>
</section>
<section class="cuerpo3-m">
  <h1 class="titulo-principal3-m-2">LÍNEA EMERGENCIA</h1>
  <div id="owl-productodetalle-inicio3" class="owl-carousel owl-theme owl-productodetalle secciondelproducto">
    <div class="item secciondelproducto">
      <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/emergencias.png" alt="Para eliminar las imperfecciones">
        <div class="row textoproductos-m">
            <h4 class="tituloproductos-m">Asepxia Emergencia Spot Transparente</h4>
             <p class="textoproductos-m">Cuando te salen granitos sin avisar, Asepxia Spot está de tu lado para combatirlos.</p>
             <p class="precioproductos-m-antes">ANTES: <?= ($gel_spot == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $gel_spot["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <p class="precioproductos-m">AHORA: <?= ($gel_spot == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $gel_spot["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63950)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
        </div>
    </div>
    <div class="item secciondelproducto">
      <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/emergencias.png " alt="Para eliminar las imperfecciones">
      <div class="row textoproductos-m">
          <h4 class="tituloproductos-m">Asepxia Emergencia Color Piel Camouflage</h4>
           <p class="textoproductos-m">Cuando te salen granitos sin avisar, Asepxia Camouflage está de tu lado para combatirlos. </p>
              <p style="margin: 0px;height:14px;">&nbsp;</p>
              <p class="precioproductos-m-antes">ANTES: <?= ($camouflaje == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $camouflaje["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <p class="precioproductos-m">AHORA: <?= ($camouflaje == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $camouflaje["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63944)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
        </div>
    </div>
</section>
<div class="col-md-12">
  <div class="row">
    <h3 class="contenedor-creditos-m">©2017 Genomma Lab. Todos los derechos reservados</h3>
  </div>
</div>
<!---FIN VERSIÓN MÓVIL-->
<!--VERSIÓN ESCRITORIO-->
<?php else: ?>
<img class="img-responsive escritorio" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/banner1920.jpg" alt="Para eliminar las imperfecciones">
<section class="cuerpo">
  <div class="agua"></div>
  <div>
    <div class="row cuerpotitulo">
      <h1 class="titulo-principal">LÍNEA LIMPIEZA</h1>
    </div>
    <br>
    <div class="row">
      <div class="contenedor-blanco">
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/platilla-producto.png" alt="Para eliminar las imperfecciones">
              <div class="row textoproductos">
                  <h4 class="tituloproductos"> ASEPXIA TOALLITAS DE LIMPIEZA <br> X25 unidades</h4>
                   <p class="textoproductos">Dile adiós al brillo de tu cara con Toallitas Asepxia. </p>
                   <p class="precioproductos-antes"> ANTES: <?= ($jabon_exfoliante == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_exfoliante["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                   <p class="precioproductos"> AHORA: <?= ($jabon_exfoliante == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_exfoliante["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                   <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63948)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
              </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/ASEPXIA-JABÓN-FORTE.png" alt="Remueve células muertas con efecto astringente.  ">
            <div class="row textoproductos">
                <h4 class="tituloproductos">ASEPXIA TOALLITAS DE LIMPIEZA <br> X10 unidades</h4>
                 <p class="textoproductos">Dile adiós al brillo de tu cara con Toallitas Asepxia. </p>
                 <p class="precioproductos-antes">ANTES: <?= ($jabon_forte == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_forte["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <p class="precioproductos">AHORA: <?= ($jabon_forte == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_forte["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63949)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
            </div>
          </div>
          <div class="franja"></div>
          <div class="col-sm-4 col-md-4">
            <img class="img-responsive img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/jabon-soft.png" alt="favoreciendo delicadamente las pieles grasas y con granitos.">
            <div class="row textoproductosparabajar">
                <h4 class="tituloproductos">ASEPXIA GEL EXFOLIANTE PARA<BR> PUNTOS NEGROS</h4>
                 <p class="textoproductos">Exfolia suavemente tu piel, renovada y sin imperfecciones. </p>
                 <p class="precioproductos-antes">ANTES: <?= ($jabon_soft == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_soft["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <p class="precioproductos">AHORA: <?= ($jabon_soft == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_soft["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65423)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
            </div>
          </div>
          <div class="franja2"></div>
        </div>
        </div>
      </div>
    </div>
<!-- ..................SEGUNDA SECTION...................-->
<div class="row contenedor-titulos">
      <h1 class="titulo-principal2">ASEPXIA MAQUILLAJES</h1>
    </div>
<br>
<div class="row">
      <div class="contenedor-blanco2">
        <div class="row">
          <div class="col-sm-offset-2 col-md-4">
            <img class="img-responsive img-producto2" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="Para eliminar las imperfecciones">
              <div class="row textoproductos2">
                  <h4 class="tituloproductos2">ASEPXIA MAQUILLAJE NATURAL</h4>
                   <p class="textoproductos2">Cubre y cuida tus imperfecciones con Polvos Asepxia. </p>
                   <p style="margin:0px;">&nbsp;</p>
                   <p class="precioproductos-antes">ANTES: <?= ($jabon_maquillajenatural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajenatural["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                   <p class="precioproductos">AHORA: <?= ($jabon_maquillajenatural == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajenatural["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                   <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 82323)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
              </div>
          </div>
            <div class="franja4"></div>
          <div class="col-sm-4 col-md-4">
            <img class="img-responsive img-producto2" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="Para eliminar las imperfecciones">
            <div class="row textoproductos2">
                <h4 class="tituloproductos2"> ASEPXIA MAQUILLAJE BRONCE</h4>
                 <p class="textoproductos2">Cubre y cuida tus imperfecciones con Polvos Asepxia. </p>
                 <p style="margin:0px;">&nbsp;</p>
                 <p class="precioproductos-antes">ANTES: <?= ($jabon_maquillajebronce == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebronce["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <p class="precioproductos">AHORA: <?= ($jabon_maquillajebronce == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebronce["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 82324)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
            </div>
          </div>
          <div class="col-sm-offset-2 col-md-4" style="margin-top: 30px;">
            <img class="img-responsive img-producto2" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="Para eliminar las imperfecciones">
            <div class="row textoproductos2">
                <h4 class="tituloproductos2"> ASEPXIA MAQUILLAJE <br> BEIGE MATE</h4>
                 <p class="textoproductos2">Cubre y cuida tus imperfecciones con Polvos Asepxia. </p>
                 <p class="precioproductos-antes">ANTES: <?= ($jabon_maquillajebeigemate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebeigemate["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <p class="precioproductos">AHORA: <?= ($jabon_maquillajebeigemate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajebeigemate["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 82325)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
            </div>
          </div>
            <div class="col-sm-4 col-md-4" style="margin-top: 30px;">
            <img class="img-responsive img-producto2" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/plantilla-producto-2.png" alt="Para eliminar las imperfecciones">
            <div class="row textoproductos2">
                <h4 class="tituloproductos2"> ASEPXIA MAQUILLAJE <br> CLARO MATE</h4>
                 <p class="textoproductos2">Cubre y cuida tus imperfecciones con Polvos Asepxia. </p>
                 <p class="precioproductos-antes">ANTES: <?= ($jabon_maquillajeclaromate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajeclaromate["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <p class="precioproductos">AHORA: <?= ($jabon_maquillajeclaromate == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $jabon_maquillajeclaromate["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
                 <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 83241)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
            </div>
          </div>
        </div>
        </div>
      </div>
<!-- SECCION TRES-->
<div class="row contenedor-titulos">
  <h1 class="titulo-principa3">LÍNEA EMERGENCIA</h1>
<!--  <h2 class="texto-deltitulo2">LA AVANZADA FÓRMULA DE ASEPXIA MAQUILLAJE NEUTRALIZA Y ABSORBE LA GRASA<br> MIENTRAS AYUDA A ELIMINAR LOS PUNTOS NEGROS.</h2>-->
<br>
<div class="row">
  <div class="contenedor-blanco2">
    <div class="row">
      <div class="col-sm-offset-2 col-md-offset-2 col-sm-4 col-md-4">
        <img class="img-responsive img-producto2" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/emergencias.png" alt="Para eliminar las imperfecciones">
          <div class="row textoproductos2">
              <h4 class="tituloproductos2">ASEPXIA EMERGENCIA SPOT TRANSPARENTE</h4>
               <p class="textoproductos2">Cuando te salen granitos sin avisar, Asepxia Spot está de tu lado para combatirlos.</p><br>
               <p class="precioproductos-antes">ANTES: <?= ($gel_spot == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $gel_spot["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
               <p class="precioproductos">AHORA: <?= ($gel_spot == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $gel_spot["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
               <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63950)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
          </div>
      </div>
        <div class="franja5"></div>
      <div class="col-sm-4 col-md-4">
        <img class="img-responsive img-producto2" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/emergencias.png" alt="Para eliminar las imperfecciones">
        <div class="row textoproductos2">
            <h4 class="tituloproductos2">ASEPXIA EMERGENCIA COLOR PIEL CAMOUFLAGE</h4>
             <p class="textoproductos2">Cuando te salen granitos sin avisar, Asepxia Camouflage está de tu lado para combatirlos. </p>
             <p class="precioproductos-antes">ANTES: <?= ($camouflaje == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $camouflaje["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <p class="precioproductos">AHORA: <?= ($camouflaje == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $camouflaje["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>
             <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 63944)) ?>" ><img class="img-responsive escritorio botoncompra" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/asepxia/images/boton-asepxia.png" > </a>
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
      <h3 class="contenedor-creditos">©2017 Genomma Lab. Todos los derechos reservados</h3>
    </div>
  </div>
    </div>
  </div>
</section>
<?php endif; ?>
<!--FIN VERSIÓN ESCRITORIO-->
