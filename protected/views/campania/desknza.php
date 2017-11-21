<?php $this->pageTitle = "Desknza - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Los Cojines Desknza cuentan con microperlas anatómicas que relajan los músculos de tu cuerpo y le brindan a tu cuerpo el descanso que se merece.'>
  <meta name='keywords' content='cojin cervical, desknza, cojin para viajar.'>
  <style>
    @font-face {font-family:HelveticaNeueLTStd-BdCn; src: url(".Yii::app()->request->baseUrl."/images/contenido/desknza/fonts/HelveticaNeueLTStd-BdCn.otf);}
    @font-face {font-family:HelveticaNeueLTStd-LtCn; src: url(".Yii::app()->request->baseUrl."/images/contenido/desknza/fonts/HelveticaNeueLTStd-LtCn.otf);}
	@font-face {font-family:calibriLight; src: url(".Yii::app()->request->baseUrl."/images/contenido/desknza/fonts/calibril.ttf);}
	@font-face {font-family:calibriBold; src: url(".Yii::app()->request->baseUrl."/images/contenido/desknza/fonts/calibrib.ttf);}
	a, a:hover, a:active, a:focus {outline: none !important;cursor:pointer;text-decoration:none !important;}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
	#main-content {background-color: #EEEEF6;}
	.contenedor-principal {width: 100%;max-width: 1000px;margin: auto;}    
	.contenedor-menu {display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;margin-top: 30px;}
	.contenedor-menu .item {width: 20%;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/desknza/sombra.png);background-repeat: no-repeat;background-position: center 80%;background-size: 90%;}
	.item img {transition: all 0.4s ease-in-out 0s;}
	.item:hover img {transform: translateY(-5px);-ms-transform: translateY(-5px);-webkit-transform: translateY(-5px);}
	.item:hover .nombre {transform: translateY(-5px);-ms-transform: translateY(-5px);-webkit-transform: translateY(-5px);}
	.item:hover .line-active {background-color: #4A72B2;}
	.nombre {text-align: center;color: #4A72B2;font-family: HelveticaNeueLTStd-LtCn;font-size: 23px;line-height: 20px;transition: all 0.4s ease-in-out 0s;}
	.nombre span {font-family:HelveticaNeueLTStd-BdCn;color:#1B225E;display: block;}
    .guia-menu .item {width:80%;height:19px;}
    .line-active {border-radius: 25px;height: 7px;width: 50%;margin: 25px auto;}
    .show {background-color: #0E1D60;}  
    .hide {display:none;}
	.bg-info {text-align: center;padding: 80px 0 30px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/desknza/bg.jpg);background-size: cover;}
	.contenedor-info{padding: 30px 0;background-color: #fff;border: 7px solid #0E1D60;border-radius: 25px;}
	.contenedor-product {align-items: center;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;margin: 0 30px;}
	.contenedor-product .imagen, .contenedor-product .beneficios {width:50%;padding: 0 20px;}
	.contenedor-info .titulo-producto {font-family:HelveticaNeueLTStd-BdCn; color:#1B225E;}
	.contenedor-info p {font-family:HelveticaNeueLTStd-LtCn; color:#1B225E;font-size: 25px;line-height: 25px;}
	.contenedor-info p span {font-family:HelveticaNeueLTStd-BdCn;}
	.beneficios {text-align: left;}
	.beneficios h3 {margin-bottom: 15px;font-size: 50px;font-family: HelveticaNeueLTStd-BdCn;color: #25438F;}
	.lista-beneficios {font-family: calibriLight;color: #25438F;font-size: 20px;display: flex;}
	.lista-beneficios dt {color: #CF6E00;margin-right: 5px;margin-top: -5px;}
	.lista-beneficios dd {line-height: 20px;}
	.lista-beneficios span {font-family:calibriBold;}
	.btn-comprar {margin: 25px 0;width: 50%;max-width: 221px;}  
	.texto-legal {font-family: calibriLight;color: #fff;text-align: center;font-size: 17px;line-height: 17px;margin-top: 60px;font-weight: bold;}
    .precioproductos{font-family: HelveticaNeueLTStd-BdCn !important;margin: 0;color: #25438F !important;}
    .precioproductos-antes{text-decoration: line-through;font-family: HelveticaNeueLTStd-BdCn !important;margin: 0;color: #25438F !important;font-size: 22px !important;}
	.owl-controls {position: absolute;top: 8px;right: 10px;left: 10px;}
	.owl-theme .owl-controls .owl-page span {background-color: #25438F !important;}
	.producto-m {width: 70%;}
	.beneficios-m {font-size: 30px;font-family: HelveticaNeueLTStd-BdCn;color: #25438F;margin: 0;}
	#owl-productodetalle-inicio .item:hover img {transform: translateY(-0px);-ms-transform: translateY(-0px);-webkit-transform: translateY(-0px);}
	.titulo-producto-m {font-family: HelveticaNeueLTStd-BdCn;color: #1B225E;text-align: center;line-height: 20px;margin: 0 0 20px;}
	.titulo-producto-m sup {font-size: 14px;}
	.descrip-intro-m {font-family: calibriLight;color: #1B225E;font-size: 17px;text-align: center;margin: 0 5px 20px;}
	.descrip-intro-m span {font-family: HelveticaNeueLTStd-BdCn;}
	#owl-productodetalle-inicio {margin-top:30px;}
	#owl-productodetalle-inicio .lista-beneficios {font-size: 17px;}
	#owl-productodetalle-inicio .lista-beneficios dt {margin-top: 0px;}
  </style>
  ";
?>

<!-- Cambio de productos -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#producto1').click(function(){
      $('#producto1 #guia').addClass('show');
      $('#producto3 #guia').removeClass('show');
      $('#producto2 #guia').removeClass('show');
      $('#producto4 #guia').removeClass('show');
      $('#producto5 #guia').removeClass('show');
      $('#info-producto1').removeClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
    });
    $('#producto2').click(function(){
      $('#producto2 #guia').addClass('show');
      $('#producto1 #guia').removeClass('show');
      $('#producto3 #guia').removeClass('show');
      $('#producto4 #guia').removeClass('show');
      $('#producto5 #guia').removeClass('show');
      $('#info-producto2').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
    });
    $('#producto3').click(function(){
      $('#producto3 #guia').addClass('show');
      $('#producto1 #guia').removeClass('show');
      $('#producto2 #guia').removeClass('show');
      $('#producto4 #guia').removeClass('show');
      $('#producto5 #guia').removeClass('show');
      $('#info-producto3').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto4').addClass('hide');
      $('#info-producto5').addClass('hide');
    });
    $('#producto4').click(function(){
      $('#producto4 #guia').addClass('show');
      $('#producto1 #guia').removeClass('show');
      $('#producto2 #guia').removeClass('show');
      $('#producto3 #guia').removeClass('show');
      $('#producto5 #guia').removeClass('show');
      $('#info-producto4').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto5').addClass('hide');
    });
    $('#producto5').click(function(){
      $('#producto5 #guia').addClass('show');
      $('#producto1 #guia').removeClass('show');
      $('#producto2 #guia').removeClass('show');
      $('#producto4 #guia').removeClass('show');
      $('#producto3 #guia').removeClass('show');
      $('#info-producto5').removeClass('hide');
      $('#info-producto1').addClass('hide');
      $('#info-producto2').addClass('hide');
      $('#info-producto3').addClass('hide');
      $('#info-producto4').addClass('hide');
    });
  });
</script>

<!--Consulta el precio de los productos-->
<?php $cervical = Producto::consultarPrecio('92332', $this->objSectorCiudad)?> <!--Cervical normal -->
<?php $coccix = Producto::consultarPrecio('92329', $this->objSectorCiudad)?> <!--Coccix normal -->
<?php $lumbar = Producto::consultarPrecio('25099', $this->objSectorCiudad)?> <!--Lumbar ultra confort -->
<?php $cervical_mundo_animal = Producto::consultarPrecio('115449', $this->objSectorCiudad)?> <!--Cervical mundo animal -->
<?php $cervical_infantil = Producto::consultarPrecio('105138', $this->objSectorCiudad)?> <!--Cervical infantil -->

<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<!--Añadir al carro-->
<input type="hidden" id="cantidad-producto-unidad-92332" value="1">	<!--Cervical normal -->
<input type="hidden" id="cantidad-producto-unidad-92329" value="1">	<!--Coccix normal -->
<input type="hidden" id="cantidad-producto-unidad-25099" value="1">	<!--Lumbar ultra confort -->
<input type="hidden" id="cantidad-producto-unidad-115449" value="1"><!--Cervical mundo animal -->
<input type="hidden" id="cantidad-producto-unidad-105138" value="1"><!--Cervical infantil -->
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/banner.png">
<a style="position: absolute;left: 25px;top: 20%;" href="" data-role="button" data-icon="arrow-l" data-iconpos="left"></a>
<a style="position: absolute;right: 25px;top: 20%;" href="" data-role="button" data-icon="arrow-r" data-iconpos="right"></a>
<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
	<div class="item" style="padding: 0 20px;">
		<img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-normal-detalle.png" alt="">
		<h2 class="titulo-producto-m">El Cojín CERVICAL NORMAL Desknza<sup>®</sup></h2>
	   	<p class="descrip-intro-m ">cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	    <div class="contenedor-info" style="border: 4px solid #0E1D60;padding: 15px;">
		    <h3 class="beneficios-m">Beneficios</h3>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;">Ideal para <span> procesos de recuperación</span> de la zona del cuello y cabeza, para viajar, dormir, leer, ver televisión y descansar.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Reduce el dolor</span> de cuello causado por estrés o tensión muscular.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Cojín anatómico</span> que disminuye la aparición de espasmos en el cuello, los hombros y la espalda alta.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Proporciona una postura cómoda </span> mientras estas sentado.</dd>
			</dl>				
			<center>
				<p class="precioproductos-antes">ANTES: <?= ($cervical == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>		
				<p class="precioproductos">AHORA: <?= ($cervical == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>	
				<a data-ajax="false" data-cargar="1" data-producto="92332" data-id="1" href="#"><img class="btn-comprar" style="margin: 20px 0;width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
			</center>  			      
	    </div>
	</div>	
	<div class="item" style="padding: 0 20px;">
		<img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/coccix-normal-detalle.png" alt="">
		<h2 class="titulo-producto-m">El Cojín CÓCCIX NORMAL Desknza<sup>®</sup></h2>
	   	<p class="descrip-intro-m ">cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	    <div class="contenedor-info" style="border: 4px solid #0E1D60;padding: 15px;">
		    <h3 class="beneficios-m">Beneficios</h3>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span> Ideal para patologías de cadera.</span></dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Apoya la recuperación</span> de lipoinyección, lipoescultura e implante de glúteos.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Ideal para el tratamiento</span> de las hemorroides.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span> Ayuda a tener una postura cómoda</span> en todo tipo de sillas.</dd>
			</dl>				
			<center>
				<p class="precioproductos-antes">ANTES: <?= ($coccix == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $coccix["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>		
				<p class="precioproductos">AHORA: <?= ($coccix == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $coccix["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>		
				<a data-ajax="false" data-cargar="1" data-producto="92329" data-id="2" href="#"><img class="btn-comprar" style="margin: 20px 0;width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
			</center>  			      
	    </div>
	</div>	
	<div class="item" style="padding: 0 20px;">
		<img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-lumbar-ultra-confort-detalle.png" alt="">
		<h2 class="titulo-producto-m">El Cojín LUMBAR ULTRA CONFORT Desknza<sup>®</sup></h2>
	   	<p class="descrip-intro-m ">cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	    <div class="contenedor-info" style="border: 4px solid #0E1D60;padding: 15px;">
		    <h3 class="beneficios-m">Beneficios</h3>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span> Provee soporte integral a la zona lumbar</span> (espalda baja).</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Cuenta con un diseño especial ultra anatómico </span> que se adapta a la curvatura de la columna.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Evita </span>  posibles lesiones.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span> Incluye elástico ajustable para asegurarlo</span> a cualquier silla.</dd>
			</dl>				
			<center>
				<p class="precioproductos-antes">ANTES: <?= ($lumbar == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $lumbar["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>		
				<p class="precioproductos">AHORA: <?= ($lumbar == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $lumbar["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>			
				<a data-ajax="false" data-cargar="1" data-producto="25099" data-id="3"  href="#"><img class="btn-comprar" style="margin: 20px 0;width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
			</center>  			      
	    </div>
	</div>	
	<div class="item" style="padding: 0 20px;">
		<img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-mundo-animal-detalle.png" alt="">
		<h2 class="titulo-producto-m">El Cojín CERVICAL MUNDO ANIMAL Desknza<sup>®</sup></h2>
	   	<p class="descrip-intro-m ">cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	    <div class="contenedor-info" style="border: 4px solid #0E1D60;padding: 15px;">
		    <h3 class="beneficios-m">Beneficios</h3>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;">Cojín infantil que <span>se adapta al cuerpo.</span></dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;">Ofrece elevada<span> sensación de confort. </span></dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Ideal para viajes largos </span> o para descansar en el hogar.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span> Ideal para niños de 4 años en adelante.</span></dd>
			</dl>				
			<center>
				<p class="precioproductos-antes">ANTES: <?= ($cervical_mundo_animal == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_mundo_animal["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?>  </p>		
				<p class="precioproductos">AHORA: <?= ($cervical_mundo_animal == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_mundo_animal["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>			
				<a data-ajax="false" data-cargar="1" data-producto="115449" data-id="4" href="#"><img class="btn-comprar" style="margin: 20px 0;width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
			</center>  			      
	    </div>
	</div>
	<div class="item" style="padding: 0 20px;">
		<img class="producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-infantil-detalle.png" alt="">
		<h2 class="titulo-producto-m">El Cojín CERVICAL INFANTIL Desknza<sup>®</sup></h2>
	   	<p class="descrip-intro-m ">cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	    <div class="contenedor-info" style="border: 4px solid #0E1D60;padding: 15px;">
		    <h3 class="beneficios-m">Beneficios</h3>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;">Cojín infantil que<span> se adapta al cuerpo.</span></dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;">Ofrece elevada<span> sensación de confort. </span></dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span>Ideal para viajes largos </span> o para descansar en el hogar.</dd>
			</dl>
		    <dl class="lista-beneficios">
				<dt>•</dt><dd style="margin: 0 10px;"><span> Ideal para niños de 4 años en adelante.</span></dd>
			</dl>				
			<center>
				<p class="precioproductos-antes">ANTES:  <?= ($cervical_infantil == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_infantil["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>		
				<p class="precioproductos">AHORA: <?= ($cervical_infantil == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_infantil["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>			
				<a data-ajax="false" data-cargar="1" data-producto="105138" data-id="5"  href="#"><img class="btn-comprar" style="margin: 20px 0;width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
			</center>  			      
	    </div>
	</div>	  
</div>
<section class="texto-legal" style="background: #021D62;padding: 5px 15px;font-size: 14px;margin-top: 20px;">
	<p>Global AIM S.A.S. Representante Autorizado de la Marca Desknza®. NIT 900.524.963-1. Hecho en Colombia. <br>
	Este producto no requiere registro Sanitario - Certificación Invima N° 2010014661.</p>
</section>
<img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/banner-footer-movil.png" alt="">

<!--VERSION DE ESCRITORIO->
<?php else: ?>
<!--Añadir al carro-->
<input type="hidden" id="cantidad-producto-unidad-92332-1" value="1">	<!--Cervical normal -->
<input type="hidden" id="cantidad-producto-unidad-92329-2" value="1">	<!--Coccix normal -->
<input type="hidden" id="cantidad-producto-unidad-25099-3" value="1">	<!--Lumbar ultra confort -->
<input type="hidden" id="cantidad-producto-unidad-115449-4" value="1">	<!--Cervical mundo animal -->
<input type="hidden" id="cantidad-producto-unidad-105138-5" value="1">	<!--Cervical infantil -->
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/banner.png">
<div class="contenedor-principal">
	<div class="contenedor-menu">
		<div class="item">
			<a id="producto1" href="#cervical-normal">
				<div class="nombre"> <span>Cervical</span>normal</div>
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cervical-normal.png" alt="">
	        	<div id="guia" class="line-active show "></div>
			</a>
		</div>
		<div class="item">
			<a id="producto2" href="#coccix-normal">
				<div class="nombre"><span>Cóccix</span>normal</div>
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/coccix-normal.png" alt="">
		         <div id="guia" class="line-active "></div>
			</a>
		</div>
		<div class="item">
			<a id="producto3" href="#lumbar-ultra-confort">
				<div class="nombre"><span>Lumbar</span>ultra confort</div>
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-lumbar-ultra-confort.png" alt="">
		         <div id="guia" class="line-active "></div>
			</a>
		</div>
		<div class="item">
			<a id="producto4" href="#cervical-mundo-animal">
				<div class="nombre"><span>Cervical</span> mundo animal</div>
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-mundo-animal.png" alt="">
		        <div id="guia" class="line-active "></div>
			</a>
		</div>
		<div class="item">
			<a id="producto5" href="#cervical-infantil">
				<div class="nombre"><span>Cervical</span> infantil</div>
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-infantil.png" alt="">
		        <div id="guia" class="line-active "></div>
			</a>
		</div>
	</div>
</div>
<div class="bg-info">
  <div class="contenedor-principal">
    <div id="info-producto1" class="contenedor-info ">
    	<h2 class="titulo-producto">El Cojín CERVICAL NORMAL Desknza<sup>®</sup></h2>
        <p>cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> <br> a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	      <div class="contenedor-product">  
	      	<div class="imagen">
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-normal-detalle.png" alt="">
	      	</div>
	      	<div class="beneficios">
	      		<h3>Beneficios</h3>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd>Ideal para <span> procesos de recuperación</span> <br> de la zona del cuello y cabeza, para viajar, <br>dormir, leer, ver televisión y descansar.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Reduce el dolor</span> de cuello causado por estrés <br>o tensión muscular.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Cojín anatómico</span> que disminuye la aparición <br>de espasmos en el cuello, los hombros <br>y la espalda alta.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Proporciona una postura cómoda </span><br>mientras estas sentado.</dd>
				</dl>		
				<p class="precioproductos-antes">ANTES: <?= ($cervical == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>		
				<p class="precioproductos">AHORA: <?= ($cervical == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>	
				<a data-cargar="1" data-producto="92332" data-id="1" href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
	      	</div>     
	      </div>
    </div>
    <div id="info-producto2" class="contenedor-info hide ">
    	<h2 class="titulo-producto">El Cojín CÓCCIX NORMAL Desknza<sup>®</sup></h2>
        <p>cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> <br>a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	      <div class="contenedor-product">  
	      	<div class="imagen">
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/coccix-normal-detalle.png" alt="">
	      	</div>
	      	<div class="beneficios">
	      		<h3>Beneficios</h3>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Ideal para patologías de cadera.</span></dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Apoya la recuperación</span> de lipoinyección, <br> lipoescultura e implante de glúteos.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Ideal para el tratamiento</span> <br> de las hemorroides.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Ayuda a tener una postura cómoda</span><br> en todo tipo de sillas.</dd>
				</dl>	
				<p class="precioproductos-antes">ANTES: <?= ($coccix == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $coccix["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>		
				<p class="precioproductos">AHORA: <?= ($coccix == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $coccix["u"], Yii::app()->params->formatoMoneda['moneda']) ?></p>		
				<a data-cargar="1" data-producto="92329" data-id="2" href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
	      	</div>     
	      </div>
    </div>
    <div id="info-producto3" class="contenedor-info hide ">
    	<h2 class="titulo-producto">El Cojín LUMBAR ULTRA CONFORT Desknza<sup>®</sup></h2>
        <p>cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> <br>a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	      <div class="contenedor-product">  
	      	<div class="imagen">
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-lumbar-ultra-confort-detalle.png" alt="">
	      	</div>
	      	<div class="beneficios">
	      		<h3>Beneficios</h3>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd> <span>Provee soporte integral a la zona lumbar</span> <br> (espalda baja).</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Cuenta con un diseño especial ultra anatómico </span><br> que se adapta a la curvatura de la columna.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Evita</span> posibles lesiones.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Incluye elástico ajustable para asegurarlo</span> <br> a cualquier silla.</dd>
				</dl>
				<p class="precioproductos-antes">ANTES: <?= ($lumbar == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $lumbar["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>		
				<p class="precioproductos">AHORA: <?= ($lumbar == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $lumbar["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>			
				<a data-cargar="1" data-producto="25099" data-id="3" href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
	      	</div>     
	      </div>
    </div>
    <div id="info-producto4" class="contenedor-info hide ">
    	<h2 class="titulo-producto">El Cojín CERVICAL MUNDO ANIMAL Desknza<sup>®</sup></h2>
        <p>cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> <br>a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	      <div class="contenedor-product">  
	      	<div class="imagen">
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-mundo-animal-detalle.png" alt="">
	      	</div>
	      	<div class="beneficios">
	      		<h3>Beneficios</h3>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd>Cojín infantil que <span>se adapta al cuerpo.</span></dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd>Ofrece elevada <span>sensación de confort.</span></dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Ideal para viajes largos</span> <br>o para descansar en el hogar.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Ideal para niños de 4 años en adelante.</span></dd>
				</dl>
				<p class="precioproductos-antes">ANTES: <?= ($cervical_mundo_animal == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_mundo_animal["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?>  </p>		
				<p class="precioproductos">AHORA: <?= ($cervical_mundo_animal == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_mundo_animal["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>			
				<a data-cargar="1" data-producto="115449" data-id="4" href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
	      	</div>     
	      </div>
    </div>
    <div id="info-producto5" class="contenedor-info hide ">
    	<h2 class="titulo-producto">El Cojín CERVICAL INFANTIL Desknza<sup>®</sup></h2>
        <p>cuenta con una tecnología de <span>MICROPERLAS ULTRA ANATÓMICAS QUE AYUDAN</span> <br>a relajar los músculos del cuerpo, devolviéndole la sensación de vivir cómodamente.</p>
	      <div class="contenedor-product">  
	      	<div class="imagen">
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/cojin-cervical-infantil-detalle.png" alt="">
	      	</div>
	      	<div class="beneficios">
	      		<h3>Beneficios</h3>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd>Cojín infantil que <span>se adapta al cuerpo.</span></dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd>Ofrece elevada <span>sensación de confort.</span></dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Ideal para viajes largos</span> <br>o para descansar en el hogar.</dd>
				</dl>
	      		<dl class="lista-beneficios">
					<dt>•</dt><dd><span>Ideal para niños de 4 años en adelante.</span></dd>
				</dl>
				<p class="precioproductos-antes">ANTES:  <?= ($cervical_infantil == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_infantil["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?></p>		
				<p class="precioproductos">AHORA: <?= ($cervical_infantil == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $cervical_infantil["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>			
				<a data-cargar="1" data-producto="105138" data-id="5" href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
	      	</div>     
	      </div>
    </div>
	<section class="texto-legal">
		<p>Global AIM S.A.S. Representante Autorizado de la Marca Desknza®. NIT 900.524.963-1. Hecho en Colombia. <br>
		Este producto no requiere registro Sanitario - Certificación Invima N° 2010014661.</p>
	</section>
  </div>
</div>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/banner-footer.jpg" alt="">
<!--Fin versión escritorio -->
<?php endif; ?>
