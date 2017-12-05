<?php $this->pageTitle = "Menticol - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Los desodorantes para pies Menticol Pies llegan con toda la frescura del mentol y la
efectiva acción antibacterial gracias al Triclosán.'>
  <meta name='keywords' content='talco, desodorante para pies, talco para pies'>
  <style>
	@font-face {font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
	@font-face {font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
	@font-face {font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
	@font-face {font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
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

  @font-face {font-family:AvenirBlack; src: url(".Yii::app()->request->baseUrl."/images/contenido/menticol/fonts/AvenirBlack.otf);}
	@font-face {font-family:AvenirHeavy; src: url(".Yii::app()->request->baseUrl."/images/contenido/menticol/fonts/AvenirHeavy.ttf);}
	@font-face {font-family:AvenirLTStd-Roman; src: url(".Yii::app()->request->baseUrl."/images/contenido/menticol/fonts/AvenirLTStd-Roman.otf);}
	a, a:hover, a:active, a:focus {outline: none !important;cursor:pointer;text-decoration:none !important;}
  .space-1 {height: 0px !important;}
  .img-responsive-m {width:100%;}
  .bg-menu {padding-bottom: 30px;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/menticol/bg-menu.jpg);background-attachment: fixed;background-size:cover;background-position: center;background-repeat:no-repeat;}
	.banner {-webkit-box-shadow: 0px 4px 12px -2px rgba(0,0,0,0.4);-moz-box-shadow: 0px 4px 12px -2px rgba(0,0,0,0.4);box-shadow: 0px 4px 12px -2px rgba(0,0,0,0.4);}
	.title-principal {margin-top: 50px;color:#003383;text-align:center;font-family:AvenirBlack;}
	sup {font-size: 60% !important; top: -0.8em !important;}
	.contenedor-principal {width: 100%;max-width: 1000px;margin: auto;}
	.contenedor-menu {display: flex; flex-direction: row; flex-wrap: wrap;margin: 50px auto 0; width: 100%; max-width: 800px; justify-content: center; align-items: center;}
	.contenedor-menu .item {width: 40%;}
	.item img {transition: all 0.4s ease-in-out 0s;width: 150px;margin: 0 auto;}
	.item:hover img {transform: translateY(-5px);-ms-transform: translateY(-5px);-webkit-transform: translateY(-5px);}
	.nombre {font-family:AvenirBlack;text-align: center;color: #003383;font-size: 14px;line-height: 20px;transition: all 0.4s ease-in-out 0s;}
	.nombre span {font-family:AvenirHeavy;color:#3979BE;display: block;font-size:22px;margin-bottom:10px;}
  .guia-menu {width: 100%; height: 10px; background-color: rgba(202, 202, 202, 0.4); border-radius: 25px; margin-top: -65px;}
  .line-active {transition: all 0.2s ease-in-out 0s;border-radius: 25px;height: 15px;width: 50%;margin: 25px auto;z-index: 1;position: relative;}
  .show {background-color: #003383;}
  .hide {display:none;}
  .nombre-producto {font-family: AvenirHeavy;color: #3979BE;font-size: 20px;margin: 0;}
	.nombre-producto span {font-family:AvenirBlack;font-size: 30px;}
	.subtitle{font-family:AvenirLTStd-Roman;color:#003383;margin: 0;}
	.descripcion {color: #003383;font-family: AvenirLTStd-Roman;	margin-top: 25px;margin-bottom: 30px;text-align: justify;font-size: 16px;}
	.bg-info {padding: 30px 0;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/menticol/bg-productos.jpg);background-size: cover;}
	.contenedor-info{transition: all 0.4s ease-in-out 0s;padding: 30px 0;background-color: rgba(255,255,255,0.6);border: 9px solid #003383;border-radius: 50px;-webkit-box-shadow: inset 3px 3px 6px 2px rgba(0,0,0,0.4);-moz-box-shadow: inset 3px 3px 6px 2px rgba(0,0,0,0.4);box-shadow: inset 3px 3px 6px 2px rgba(0,0,0,0.4);}
	.bg-info .contenedor-principal {-webkit-box-shadow: 3px 3px 6px 2px rgba(0,0,0,0.4);-moz-box-shadow: 3px 3px 6px 2px rgba(0,0,0,0.4);box-shadow: 3px 3px 6px 2px rgba(0,0,0,0.4);border-radius: 50px;}
	.contenedor-product {align-items: center;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;margin: 0 30px;}
	.contenedor-product .beneficios  {width:70%;padding: 0px 0px 0px 20px;}
	.contenedor-product .imagen {width:30%;padding: 0 40px;}
	.btn-comprar {margin: 25px auto 0;width: 75%;max-width: 166px;display: block;}
  .precioproductos-antes{text-align:center;text-decoration: line-through;margin: 25px auto 0;font-size: 18px !important;color: #003383;font-family:AvenirBlack;line-height: 18px;}
  .precioproductos{text-align:center;margin: 0;color: #003383;font-family: AvenirBlack;font-size: 20px;line-height: 20px;}
	.linea {margin-bottom: 25px;align-items: center;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-between;}
	.linea .lista-beneficios {width:53%;}
	.skew {position: relative;padding: 5px 15px;color: #fff;background-color: #077AC1;font-family: AvenirBlack;font-size: 18px;width: 44%;text-align: center;}
	.skew::before {position: absolute;left: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0px 35px 12px;border-color: #077AC1 #077AC1 #077AC1 #fff;top: 0;}
	.skew::after {position: absolute;right: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0 36px 12px;border-color: #fff #fff #fff #077AC1;top: 0;}
	.skew-v {color:#043084 !important;position: relative;padding: 5px 15px;color: #fff;background-color: #ADBD30;font-family: AvenirBlack;font-size: 18px;width: 44%;text-align: center;}
	.skew-v::before {position: absolute;left: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0px 35px 12px;border-color: #ADBD30 #ADBD30 #ADBD30 #fff;top: 0;}
	.skew-v::after {position: absolute;right: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0 36px 12px;border-color: #fff #fff #fff #ADBD30;top: 0;}
	.lista-beneficios {font-size: 16px;color: #4E4E4E;display: flex;font-family:AvenirBlack;margin-bottom: 0;}
	.lista-beneficios dt {margin-right: 5px;}
	.lista-beneficios dd {line-height: 20px;}
	#main-content .item:hover img {transform: translateY(-0px); -ms-transform: translateY(-0px); -webkit-transform: translateY(-0px);}
	.owl-theme .owl-controls .owl-page span {background-color: #25438F !important;}
	.owl-controls {position: absolute;top: 8px;right: 10px; left: 10px;}
  </style>
  ";
?>
<!-- Cambio de productos -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#producto1').click(function(){
      $('#producto1 #guia').addClass('show');
      $('#producto2 #guia').removeClass('show');
      $('#info-producto1').removeClass('hide');
      $('#info-producto2').addClass('hide');
    });
    $('#producto2').click(function(){
      $('#producto2 #guia').addClass('show');
      $('#producto1 #guia').removeClass('show');
      $('#info-producto2').removeClass('hide');
      $('#info-producto1').addClass('hide');
    });
  });
</script>
<!--Consulta el precio de los productos-->
<?php $menticol_aerosol = Producto::consultarPrecio('100733', $this->objSectorCiudad)?>
<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<a href="#"><img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/banner.jpg"></a>
<div style="margin: 0 30px;">
	<h1 class="title-principal" style="font-size: 20px;margin-top: 20px;line-height: 20px;">Talco y desodorante Menticol<sup>&reg;</sup> <br>para tu necesidad</h1>
	<div  style="margin-top: 30px;" id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
		<div class="item" style="margin-top: 30px;">
			<div class="contenedor-product" style="margin: 0">
			  	<div class="beneficios" style="width: 100%;padding: 0;">
					<h2 class="nombre-producto" style="line-height: 25px;">Desodorante <br><span style="font-size: 23px;">Triple Acción</span></h2>
					<h3 class="subtitle" style="font-size: 15px;">Oferta súper precio 120ml + 60ml Talco</h3>
					<p class="descripcion">Talco Desodorante para pies triple acción, con clorhidrato de aluminio que evita la transpiración aún en condiciones de actividad intensa. Posee acción refrescante gracias al mentol y efectiva acción antibacterial gracias al triclosan.</p>
					<img style="width: 40%;max-width:120px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/menticol-talco.png" alt="Menticol pies">
					<p class="precioproductos-antes">ANTES:  </p>
					<p class="precioproductos">AHORA:  </p>
					<a href="#"><img class="btn-comprar" style="margin: 20px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
					<div style="margin-top: 25px;">
						<div class="skew" style="width: 80%;height: 25px;">Acción Antitranspirante</div>
						<dl class="lista-beneficios">
							<dt>•</dt><dd style="margin-left: 8px;">Evita la sudoración.</dd>
						</dl>
					</div>
					<div style="margin-top: 25px;">
						<div class="skew" style="width: 80%;height: 25px;">Acción Antibacterial </div>
						<dl class="lista-beneficios">
							<dt>•</dt><dd style="margin-left: 8px;">Previene y elimina el 99,9% de hongos y bacterias causantes del mal olor.</dd>
						</dl>
					</div>
					<div style="margin-top: 25px;">
						<div class="skew" style="width: 80%;height: 25px;">Acción Refrescante</div>
						<dl class="lista-beneficios">
							<dt>•</dt><dd style="margin-left: 8px;">Mantiene los pies frescos durante todo el día.</dd>
						</dl>
					</div>
			   	</div>
			</div>
		</div>
		<div class="item" style="margin-top: 30px;">
			<div class="contenedor-product" style="margin: 0">
			  	<div class="beneficios" style="width: 100%;padding: 0;">
					<h2 class="nombre-producto" style="line-height: 25px;">Desodorante Clinical  <br><span style="font-size: 23px;">Sudoración Extrema</span></h2>
					<h3 class="subtitle" style="font-size: 15px;">Aerosol</h3>
					<p class="descripcion">Desodorante Clinical Menticol® de fácil y rápida aplicación para la sudoración extrema de los pies.<br>Gracias a sus ingredientes activos crea una capa protectora que actúa como desodorante, protegiéndolos de las bacterias causantes del mal olor.</p>
					<img style="width: 40%;max-width:120px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/menticol-clinical.png" alt="Menticol pies">
					<p class="precioproductos-antes">ANTES: <?= ($menticol_aerosol == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $menticol_aerosol["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
					<p class="precioproductos">AHORA: <?= ($menticol_aerosol == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $menticol_aerosol["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
					<a data-ajax="false" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100733 )) ?>"><img class="btn-comprar" style="margin: 20px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
					<div style="margin-top: 25px;">
						<div class="skew-v" style="width: 80%;height: 25px;">Acción Antitranspirante</div>
						<dl class="lista-beneficios">
							<dt>•</dt><dd style="margin-left: 8px;">Reduce la sudoración extrema.</dd>
						</dl>
					</div>
					<div style="margin-top: 25px;">
						<div class="skew-v" style="width: 80%;height: 25px;">Acción Antibacterial </div>
						<dl class="lista-beneficios">
							<dt>•</dt><dd style="margin-left: 8px;">Previene y elimina el 99,9% de hongos y bacterias causantes del mal olor.</dd>
						</dl>
					</div>
					<div style="margin-top: 25px;">
						<div class="skew-v" style="width: 80%;height: 25px;">Acción Refrescante</div>
						<dl class="lista-beneficios">
							<dt>•</dt><dd style="margin-left: 8px;">Mantiene los pies frescos durante todo el día.</dd>
						</dl>
					</div>
					<div style="margin-top: 25px;">
						<div class="skew-v" style="width: 80%;height: 25px;">48 horas de protección</div>
						<dl class="lista-beneficios">
							<dt>•</dt><dd style="margin-left: 8px;">Libre de preocupaciones.</dd>
						</dl>
					</div>
			   	</div>
			</div>
		</div>
	</div>
</div>
<section class="programa-hora" style="margin-top: 50px;">
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
<!--VERSION DE ESCRITORIO-->
<?php else: ?>
<section class="bg-menu">
	<a href="#">
		<img class="img-responsive banner" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/banner.jpg">
	</a>
	<h1 class="title-principal">Talco y desodorante Menticol<sup>&reg;</sup>para tu necesidad</h1>
	<div class="contenedor-principal">
		<div class="contenedor-menu">
			<div class="item">
				<a id="producto1" href="#talco">
					<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/menticol-talco-menu.png" alt="menticol talco">
					<div class="nombre"> <span>Triple Acción</span>TALCO</div>
		        	<div id="guia" class="line-active show "></div>
				</a>
			</div>
			<div class="item">
				<a id="producto2" href="#aerosol">
					<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/menticol-aerosol-menu.png" alt="Menticol aerosol">
	   				<div class="nombre"><span>Clinical Sudoración Extrema</span>AEROSOL</div>
			        <div id="guia" class="line-active "></div>
				</a>
			</div>
			<div class="guia-menu"></div>
		</div>
	</div>
</section>
<div class="bg-info">
  <div class="contenedor-principal">
    <div id="info-producto1" class="contenedor-info ">
	    <div class="contenedor-product">
	      	<div class="beneficios">
				<h2 class="nombre-producto">Desodorante <br><span>Triple Acción</span></h2>
				<h3 class="subtitle">Oferta súper precio 120ml + 60ml Talco</h3>
				<p class="descripcion">
					Talco Desodorante para pies triple acción, con clorhidrato de <br>
					aluminio que evita la transpiración aún en condiciones de actividad <br>
					intensa. Posee acción refrescante gracias al mentol y efectiva acción <br>
					antibacterial gracias al triclosan.
				</p>
				<div class="linea">
					<div class="skew">Acción Antitranspirante</div>
					<dl class="lista-beneficios">
						<dt>•</dt><dd>Evita la sudoración.</dd>
					</dl>
				</div>
				<div class="linea">
					<div class="skew">Acción Antibacterial </div>
					<dl class="lista-beneficios">
						<dt>•</dt><dd>Previene y elimina el 99,9% de hongos <br> y bacterias causantes del mal olor.</dd>
					</dl>
				</div>
				<div class="linea">
					<div class="skew">Acción Refrescante</div>
					<dl class="lista-beneficios">
						<dt>•</dt><dd>Mantiene los pies frescos durante <br>todo el día.</dd>
					</dl>
				</div>
	      	</div>
	      	<div class="imagen">
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/menticol-talco.png" alt="Menticol pies">
	      		<p class="precioproductos-antes">ANTES:  </p>
	      		<p class="precioproductos">AHORA: </p>
	      		<a href="#"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
	      	</div>
	    </div>
    </div>
    <div id="info-producto2" class="contenedor-info hide ">
	    <div class="contenedor-product">
	      	<div class="beneficios">
				<h2 class="nombre-producto">Desodorante Clinical <br><span>Sudoración Extrema</span></h2>
				<h3 class="subtitle">Aerosol</h3>
				<p class="descripcion">
					Desodorante Clinical Menticol® de fácil y rápida aplicación <br>
					para la sudoración extrema de los pies.  <br>
					Gracias a sus ingredientes activos crea una capa protectora  <br>
					que actúa como desodorante, protegiéndolos <br>
					de las bacterias causantes del mal olor.
				</p>
				<div class="linea">
					<div class="skew-v">Acción Antitranspirante</div>
					<dl class="lista-beneficios">
						<dt>•</dt><dd>Reduce la sudoración extrema.</dd>
					</dl>
				</div>
				<div class="linea">
					<div class="skew-v">Acción Antibacterial </div>
					<dl class="lista-beneficios">
						<dt>•</dt><dd>Previene y elimina el 99,9% de hongos <br> y bacterias causantes del mal olor.</dd>
					</dl>
				</div>
				<div class="linea">
					<div class="skew-v">Acción Refrescante </div>
					<dl class="lista-beneficios">
						<dt>•</dt><dd>Mantiene los pies frescos durante <br>todo el día.</dd>
					</dl>
				</div>
				<div class="linea">
					<div class="skew-v">48 horas de protección</div>
					<dl class="lista-beneficios">
						<dt>•</dt><dd>Libre de preocupaciones.</dd>
					</dl>
				</div>
				<p class="descripcion">Encuéntrelo en presentación de 260ml</p>
	      	</div>
	      	<div class="imagen">
				<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/menticol/menticol-clinical.png" alt="Menticol pies">
	      		<p class="precioproductos-antes">ANTES: <?= ($menticol_aerosol == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $menticol_aerosol["u-a"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
	      		<p class="precioproductos">AHORA: <?= ($menticol_aerosol == null) ? "--" : Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $menticol_aerosol["u"], Yii::app()->params->formatoMoneda['moneda']) ?> </p>
	      		<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 100733 )) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/desknza/btn-comprar.png" alt=""></a>
	      	</div>
	    </div>
    </div>
  </div>
</div>
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
<div class="container" style="margin-top:30px;">
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
<!--Fin versión escritorio -->
<?php endif; ?>
