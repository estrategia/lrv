<?php $this->pageTitle = "Sol-or - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Protectores solares SOL-OR brindan protección para tu piel y la de tu familia en sus actividades diarias sin tener que preocuparse por los RUV.
'>
    <meta name='keywords' content='Protector solar, bloqueador solar, cuidado de la piel.'>
	<!-- styles -->
	<style>
		@font-face {
		    font-family:omnes-bold;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/sol-or/fonts/omnes-bold-webfont.ttf);
		}
		@font-face {
		    font-family:omnes-regular;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/sol-or/fonts/omnes-regular-webfont.ttf);
		}
		.sidebar-cart {position: fixed;right: 0px;top: 49%;z-index: 2000;}
		.carousel .item {max-height: initial !important;}
		.carousel {margin-bottom: 51px;}
		.ico-imagen {width: 40px;margin-right: 10px}
		.img-producto{width:80%;}
		.segundo-parrafo{margin-left: 17%;}
		.list p {line-height: 0px;}
		.border {border-right: 3px solid #ECECEC;}
		.wrap{margin: 50px 0;}
		.ultra{ font-family:omnes-bold;color: #1291EC;font-size: 25px;}
		.gel {font-family:omnes-bold; color:#009BA3;font-size: 25px;}
		.crema {font-family:omnes-bold; color:#EA4896;font-size: 25px;}
		.emulsion {font-family:omnes-bold; color:#42D1F0;font-size: 25px;}
		.locion {font-family:omnes-bold; color:#84BA43;font-size: 25px;}
		.agua {font-family:omnes-bold; color:#4377E3;font-size: 23px;}
		.infantil {font-family:omnes-bold; color:#F1C800;font-size: 25px;}
		.btn-comprar {width: 80px;margin-top: 30px;box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.41);}
		.all-over {font-family:omnes-bold; color:#214AA1;font-size: 25px;}
		.lassar {font-family:omnes-bold; color:#009FD8;font-size: 25px;}
		.elements p {font-family:omnes-regular;font-size: 17px;color: #595959;}
		.colum-resset{padding-right: 0px !important; padding-left: 0px !important; }
		.bull{color: #214B9F;font-size: 35px;margin-right: 8px;}
		.list2 p {line-height: 18px;}
		.owl-pagination {margin-top: -43px;}
		.owl-theme .owl-controls .owl-page span {background-color: #009BD6 !important;}
		.img-producto-m {width: 40%;}
		.contenedor-m{padding:0px 40px;color: #7D7D7D;font-family:omnes-regular;}
		.btn-comprar-m {width: 100px;box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.41);margin-top: 10px;}
		.ui-grid-a > .ui-block-a{width: 20% !important;}
		.ui-grid-a > .ui-block-b {width: 80% !important;}
		.ui-grid-a p {margin: 7px 10px 0px !important;}
		hr {margin: 30px;border: 1px solid #EDEDED;}
	</style>

<!-- Google Code para etiquetas de remarketing -->
<script type='text/javascript'>
/* <![CDATA[ */
var google_conversion_id = 865606460;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type='text/javascript' src='//www.googleadservices.com/pagead/conversion.js'>
</script>
<noscript>
<div style='display:inline;'>
<img height='1' width='1' style='border-style:none;'' alt='' src='//googleads.g.doubleclick.net/pagead/viewthroughconversion/865606460/?guid=ON&amp;script=0'/>
</div>
</noscript>

    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<section>
    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle cocacola">
        <div class="item">
        	<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.jpg" alt="Vive Joven Vive Sol-or">
        </div>
        <div class="item">
        	<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.jpg" alt="Te permite realizar las actividades cotidianas sin preocuparte">
        </div>
        <div class="item">
        	<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.jpg" alt="Protege tu piel de los efectos nocivos causados por la radiación ultravioleta">
        </div>
    </div>
</section>
<!-- SOL-OR ULTRA -->
<section style="margin-top: 30px;">
	<center>
		<img class="img-producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/sol-or-ultra.png" alt="Sol-or Ultra">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="ultra">Ultra </span> Piel normal y seca <br>
		Protección solar de <strong>uso diario</strong></p>
		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/fps50.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Protección muy alta</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/absorcion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Rápida absorción</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/vitamina-e.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Vitamina E</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/aloe-vera.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Contiene Aloe vera, D-Pantenol <strong>y Ácido Hialurónico.</strong></p></div>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 31194)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<hr>
<!-- SOL-OR GEL -->
<section>
	<center>
		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/sol-or-gel.png" class="img-producto-m" alt="Sol-or gel">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="gel">Gel </span> Piel mixta <br>
		Protección solar de <strong>uso diario</strong></p>

		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/fps36.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Protección alta</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/absorcion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Rápida absorción</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/e+c.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Vitamina E y C</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/aloe-vera.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Contiene Aloe vera, D-Pantenol <strong>y Ácido Hialurónico.</strong></p></div>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 37681)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<hr>
<!-- SOL-OR CREMA -->
<section>
	<center>
		<img class="img-producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/sol-or-crema.png" alt="Sol-or Crema">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="crema">Crema </span> Piel extremadamente seca <br>
		Protección solar de <strong>uso diario</strong></p>

		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/fps35.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Máxima protección</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/absorcion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Rápida absorción</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/reemplaza.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Reemplaza tu crema humectante</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/e+d.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Vitaminas E y D</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/aloe-vera.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p> Aloe vera, D-pantenol <strong>y Ácido Hialurónico.</strong></p></div>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 94665)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<hr>
<!-- SOL-OR EMULSION -->
<section>
	<center>
		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/sol-or-emulsion.png" class="img-producto-m" alt="Sol-or gel">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="emulsion">Emulsión </span> Piel mixta <br>
		Protección solar de <strong>uso diario</strong></p>
		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/fps41.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Máxima protección</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/absorcion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Rápida absorción</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/e+c.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Vitaminas E y C</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/aloe-vera.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Aloe vera, D-Pantenol <strong>y Ácido Hialurónico.</strong></p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/spray.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p> Sistema de spray</p></div>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 54081)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<hr>
<!-- SOL-OR LOCION -->
<section>
	<center>
		<img class="img-producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/sol-or-locion.png" alt="Sol-or Locion">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="locion">Loción </span> Piel seca <br>
    				Protección solar de <strong>uso diario</strong></p>
		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/fps35.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Máxima protección</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/absorcion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Rápida absorción</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/refrescante.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Sensación refrescante</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/secrecion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Regula la secreción sebácea</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/sin-fragancia.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p> Sin fragancia</p></div>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 94530)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<hr>
<!-- SOL-OR RESISTENTE AL AGUA -->
<section>
	<center>
		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/sol-or-resistente-al-agua.png" class="img-producto-m" alt="Sol-or Resistente al agua">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="agua">Resistente al agua </span> todo tipo de piel.
    	Protección en spray para <strong>uso en actividades deportivas, acuáticas y al aire libre.</strong></p>
		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/fps35.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Máxima protección</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/resistente.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Resistente al agua (80 minutos)</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/absorcion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Rápida absorción</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/spray.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Sistema de spray</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/aloe-vera.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Aloe vera y aceite de coco</p></div>
		</div>
		<center>
      <!-- <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 17845)) ?>"> -->
        <img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/no-disponible.png">
      <!-- </a> -->
    </center>
	</div>
</section>
<hr>
<!-- SOL-OR INFANTIL -->
<section>
	<center>
		<img class="img-producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/sol-or-infantil.png" alt="Sol-or Infantil">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="infantil">Infantil </span> <br>
		Protección solar de <strong>uso diario</strong></p>
		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/fps50.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Máxima protección</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/6meses.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>6 meses en adelante</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/absorcion.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Rápida absorción</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/aloe-vera.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Aloe vera</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/vitaminae.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Vitamina E</p></div>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 37683)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<hr>
<!-- SOL-OR  INFANTIL RESISTENTE AL AGUA -->
<section>
	<center>
		<img class="img-producto-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/sol-or-infantil2.png" alt="Sol-or Infantil">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;"><span class="infantil">Infantil </span> Resistente al agua<br>
		Protección en spray para <strong>uso en actividades deportivas, acuáticas y al aire libre.</strong></p>
		<div class="ui-grid-a">
			<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/fps50.png" class="ico-imagen"></div>
		 	<div class="ui-block-b"><p>Máxima protección</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/2anos.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>2 años en adelante</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/resistente.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Resistente al agua (80 minutos)</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/aloe-vera.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Aloe vera y aceite de coco</p></div>
		</div>
		<div class="ui-grid-a">
		   	<div class="ui-block-a"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/spray.png" class="ico-imagen"></div>
		   	<div class="ui-block-b"><p>Sistema de spray</p></div>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 17846)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<hr>
<!-- SOL-OR ALL OVER -->
<section>
	<center>
		<img style="width: 25%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/9.all-over/all-over.png" alt="Sol-or All over">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;">
			<span class="all-over">All-over </span> <br>
    		Antisudoral <strong>para todo el cuerpo</strong>
		</p>
		<div class="list2">
			<p><span class="bull">&bull;</span>Antisudoral</p>
			<p><span class="bull">&bull;</span>Línea preventiva</p>
			<p><span class="bull">&bull;</span>Controla el sudor</p>
			<p><span class="bull">&bull;</span>Evita el mal olor</p>
			<p><span class="bull">&bull;</span>Producto libre de fragancia</p>
			<p><span class="bull">&bull;</span>Sensación cool y refrescante como en la ducha.</p>
			<p><span class="bull">&bull;</span>No permite la sudoración evidente</p>
			<p><span class="bull">&bull;</span>Aplica diariamente en: axilas, manos, pies, abdomen, espalda, ingle y pecho.</p>
		</div>
		<center>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 37679)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
      <!-- <img class="btn-comprar-m" style="box-shadow: none;margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/Boton Descuento.png"> -->
      <p style="font-size: 11px;">Aplica los 17, 19, 26 de diciembre de 2016 y 2 de enero de 2017  </p>
      <p style="font-size: 11px;">
          Descuento valido para compra virtual www.larebajavirtual.com, telefónica y presencial. El precio ofrecido en la www.larebajavirtual.com
          es diferente al de los puntos de venta y puede variar según la ciudad y el sector para entrega o recogida del pedido. Producto sujeto a
          disponibilidad en los puntos de venta La Rebaja droguerías y minimarkets. El producto que se entrega tiene las mismas características
          del exhibido en la presente propaganda comercial. <a href="http://www.clientefiel.co" target="_blank">Ver reglamento en www.clientefiel.co*</a>
      </p>
    </center>
	</div>
</section>




<hr>
<!-- PASTA LASSAR -->
<section>
	<center>
		<img style="width:45%;" style="margin-top: 30%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/10.pasta-lassar/pasta-lassar.png" alt="Sol-or Pasta Lassar">
	</center>
	<div class="contenedor-m">
		<p style="text-align: center;margin: 0px 0px 15px;">
			<span class="lassar">Pasta Lassar </span> <br>
    		<strong>Medicamento de venta libre</strong><br>
			Protector, astrigente y emoliente cutáneo
		</p>
		<div class="list2">
			<p><span class="bull">&bull;</span>Previene la irritación por contacto</p>
			<p><span class="bull">&bull;</span>Coayudante en la formación de escaras</p>
			<p><span class="bull">&bull;</span>Alivia irritaciones de la piel ocasionadas por quemaduras leves.</p>
			<p><span class="bull">&bull;</span>Efecto cicatrizante en heridas cerradas</p>
			<p><span class="bull">&bull;</span>Resistente al agua</p>
			<p><span class="bull">&bull;</span>Alto poder emoliente</p>
		</div>
		<center><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 35207)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a></center>
	</div>
</section>
<div style="height:50px;"></div>
<!--Fin version movil-->

<!--Versión escritorio-->
<?php else: ?>
	<div class="sidebar-cart">
	<a href="#">
		<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/boton-sticky.png" alt="Comprar sol-or">
	</a>
	</div>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        	<div class="item active">
            	<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.jpg" class="img-responsive" alt="Vive Joven Vive Sol-or">
            </div>
            <div class="item">
              <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.jpg" class="img-responsive" alt="Te permite realizar las actividades cotidianas sin preocuparte">
            </div>
            <div class="item">
              <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.jpg" class="img-responsive" alt="Protege tu piel de los efectos nocivos causados por la radiación ultravioleta">
            </div>
        </div>
        <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev"><i class="prev-slide"></i></a>
        <a class="carousel-control right" href="#carousel-example-generic" data-slide="next"><i class="next-slide"></i></a>
    </div>
    <div class="container">
    	<div class="row wrap">
    		<!-- SOL-OR ULTRA -->
    		<div class="col-sm-6 col-md-6 elements border">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img class="img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/sol-or-ultra.png" alt="Sol-or Ultra"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="ultra">Ultra </span> Piel normal y seca <br>
    				Protección solar de <strong>uso diario</strong></p>
    				<div class="list">
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/fps50.png" class="ico-imagen"> Protección muy alta</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/absorcion.png" class="ico-imagen"> Rápida absorción</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/vitamina-e.png" class="ico-imagen"> Vitamina E</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/1.ultra/aloe-vera.png" class="ico-imagen"> Contiene Aloe vera, D-Pantenol <br> <strong class="segundo-parrafo">y Ácido Hialurónico.</strong></p>
    				</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 31194)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
    			</div>
    		</div>
			<!-- SOL-OR GEL -->
    		<div class="col-sm-6 col-md-6 elements">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/sol-or-gel.png" class="img-producto" alt="Sol-or gel"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="gel">Gel </span> Piel mixta <br>
    				Protección solar de <strong>uso diario</strong></p>
    				<div class="list">
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/fps36.png" class="ico-imagen"> Protección alta</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/absorcion.png" class="ico-imagen"> Rápida absorción</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/e+c.png" class="ico-imagen"> Vitamina E y C</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/2.gel/aloe-vera.png" class="ico-imagen"> Contiene Aloe vera, D-Pantenol <br> <strong class="segundo-parrafo">y Ácido Hialurónico.</strong></p>
    				</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 37681)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
    			</div>
    		</div>
    	</div>

    	<div class="row wrap">
    		<!-- SOL-OR CREMA -->
    		<div class="col-sm-6 col-md-6 elements border">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img class="img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/sol-or-crema.png" alt="Sol-or Crema"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="crema">Crema </span> Piel extremadamente seca <br>
    				Protección solar de <strong>uso diario</strong></p>
    				<div class="list">
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/fps35.png" class="ico-imagen"> Máxima protección</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/absorcion.png" class="ico-imagen"> Rápida absorción</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/reemplaza.png" class="ico-imagen"> Reemplaza tu crema humectante</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/e+d.png" class="ico-imagen"> Vitaminas E y D</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/3.crema/aloe-vera.png" class="ico-imagen"> Aloe vera, D-pantenol <br> <strong class="segundo-parrafo">y Ácido Hialurónico.</strong></p>
    				</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 94665)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
    			</div>
    		</div>
			<!-- SOL-OR EMULSION -->
    		<div class="col-sm-6 col-md-6 elements">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/sol-or-emulsion.png" class="img-producto" alt="Sol-or gel"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="emulsion">Emulsión </span> Piel mixta <br>
    				Protección solar de <strong>uso diario</strong></p>
    				<div class="list">
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/fps41.png" class="ico-imagen"> Máxima protección</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/absorcion.png" class="ico-imagen"> Rápida absorción</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/e+c.png" class="ico-imagen"> Vitaminas E y C</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/aloe-vera.png" class="ico-imagen"> Aloe vera, D-Pantenol <br> <strong class="segundo-parrafo">y Ácido Hialurónico.</strong></p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/4.emulsion/spray.png" class="ico-imagen"> Sistema de spray</p>
    				</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 54081)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
    			</div>
    		</div>
    	</div>

    	<div class="row wrap">
    		<!-- SOL-OR LOCION -->
    		<div class="col-sm-6 col-md-6 elements border">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img class="img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/sol-or-locion.png" alt="Sol-or Locion"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="locion">Loción </span> Piel seca <br>
    				Protección solar de <strong>uso diario</strong></p>
    				<div class="list">
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/fps35.png" class="ico-imagen"> Máxima protección</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/absorcion.png" class="ico-imagen"> Rápida absorción</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/refrescante.png" class="ico-imagen"> Sensación refrescante</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/secrecion.png" class="ico-imagen"> Regula la secreción sebácea</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/5.locion/sin-fragancia.png" class="ico-imagen"> Sin fragancia</p>
    				</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 94530)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
    			</div>
    		</div>
			<!-- SOL-OR RESISTENTE AL AGUA -->
	   		<div class="col-sm-6 col-md-6 elements">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/sol-or-resistente-al-agua.png" class="img-producto" alt="Sol-or Resistente al agua"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="agua">Resistente al agua </span> todo tipo de piel <br>
    				Protección en spray para <strong>uso en actividades deportivas, acuáticas y al aire libre.</strong></p>
    				<div class="list">
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/fps50.png" class="ico-imagen"> Máxima protección</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/resistente.png" class="ico-imagen"> Resistente al agua (80 minutos)</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/absorcion.png" class="ico-imagen"> Rápida absorción</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/spray.png" class="ico-imagen"> Sistema de spray</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/6.resistente-al-agua/aloe-vera.png" class="ico-imagen"> Aloe vera y aceite de coco</p>
    				</div>
    				<!-- <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 17845)) ?>"> -->
              <img style="margin-top: 5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/no-disponible.png">
            <!-- </a> -->
    			</div>
    		</div>
    	</div>

    	<div class="row wrap">
    		<!-- SOL-OR INFANTIL -->
    		<div class="col-sm-6 col-md-6 elements border">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img class="img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/sol-or-infantil.png" alt="Sol-or Infantil"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="infantil">Infantil </span> <br>
    				Protección solar de <strong>uso diario</strong></p>
    				<div class="list">
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/fps50.png" class="ico-imagen"> Máxima protección</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/6meses.png" class="ico-imagen"> 6 meses en adelante</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/absorcion.png" class="ico-imagen"> Rápida absorción</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/aloe-vera.png" class="ico-imagen"> Aloe vera</p>
    					<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/7.infantil1/vitaminae.png" class="ico-imagen"> Vitamina E</p>
    				</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 37683)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
    			</div>
    		</div>
			<!-- SOL-OR  INFANTIL RESISTENTE AL AGUA -->
			<div class="col-sm-6 col-md-6 elements border">
				<div class="col-sm-5 col-md-5 colum-resset">
					<center><img class="img-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/sol-or-infantil2.png" alt="Sol-or Infantil"></center>
				</div>
				<div class="col-sm-7 col-md-7 colum-resset">
					<p style="line-height: 20px;"><span class="infantil">Infantil </span> Resistente al agua<br>
					Protección en spray para <strong>uso en actividades deportivas, acuáticas y al aire libre.</strong></p>
					<div class="list">
						<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/fps50.png" class="ico-imagen"> Máxima protección</p>
						<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/2anos.png" class="ico-imagen"> 2 años en adelante</p>
						<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/resistente.png" class="ico-imagen"> Resistente al agua (80 minutos)</p>
						<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/aloe-vera.png" class="ico-imagen"> Aloe vera y aceite de coco</p>
						<p><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/8.infantil2/spray.png" class="ico-imagen"> Sistema de spray</p>
					</div>
					<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 17846)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
				</div>
			</div>
    	</div>

    	<div class="row wrap">
    		<!-- SOL-OR ALL OVER -->
    		<div class="col-sm-6 col-md-6 elements border">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/9.all-over/all-over.png" alt="Sol-or All over"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="all-over">All-over </span> <br>
    				Antisudoral <strong>para todo el cuerpo</strong></p>
					<div class="list2">
						<p><span class="bull">&bull;</span>Antisudoral</p>
						<p><span class="bull">&bull;</span>Línea preventiva</p>
						<p><span class="bull">&bull;</span>Controla el sudor</p>
						<p><span class="bull">&bull;</span>Evita el mal olor</p>
						<p><span class="bull">&bull;</span>Producto libre de fragancia</p>
						<p><span class="bull">&bull;</span>Sensación cool y refrescante como en la ducha.</p>
						<p><span class="bull">&bull;</span>No permite la sudoración evidente</p>
						<p><span class="bull">&bull;</span>Aplica diariamente en: axilas, manos, pies, abdomen, espalda, ingle y pecho.</p>
					</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 37679)) ?>"><img class="btn-comprar" style="margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
            <!-- <img class="btn-comprar" style="box-shadow: none;margin-top: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/Boton Descuento.png"> -->
            <p style="font-size: 12px;margin-top: 15px;">Aplica los 17, 19, 26 de diciembre de 2016 y 2 de enero de 2017  </p>
    			</div>
          <div class="col-md-12">
            <p style="font-size: 11px;text-align: justify;">
                Descuento valido para compra virtual www.larebajavirtual.com, telefónica y presencial. El precio ofrecido en la www.larebajavirtual.com
                es diferente al de los puntos de venta y puede variar según la ciudad y el sector para entrega o recogida del pedido. Producto sujeto a
                disponibilidad en los puntos de venta La Rebaja droguerías y minimarkets. El producto que se entrega tiene las mismas características
                del exhibido en la presente propaganda comercial. <a href="http://www.clientefiel.co" target="_blank">Ver reglamento en www.clientefiel.co*</a>
            </p>
          </div>
    		</div>
			<!-- PASTA LASSAR -->
    		<div class="col-sm-6 col-md-6 elements border">
    			<div class="col-sm-5 col-md-5 colum-resset">
    				<center><img class="img-producto" style="margin-top: 30%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/10.pasta-lassar/pasta-lassar.png" alt="Sol-or Pasta Lassar"></center>
    			</div>
    			<div class="col-sm-7 col-md-7 colum-resset">
    				<p style="line-height: 20px;"><span class="lassar">Pasta Lassar </span> <br>
    				<strong>Medicamento de venta libre</strong><br>
					Protector, astrigente y emoliente cutáneo
    				</p>
					<div class="list2">
						<p><span class="bull">&bull;</span>Previene la irritación por contacto</p>
						<p><span class="bull">&bull;</span>Coayudante en la formación de escaras</p>
						<p><span class="bull">&bull;</span>Alivia irritaciones de la piel ocasionadas por quemaduras leves.</p>
						<p><span class="bull">&bull;</span>Efecto cicatrizante en heridas cerradas</p>
						<p><span class="bull">&bull;</span>Resistente al agua</p>
						<p><span class="bull">&bull;</span>Alto poder emoliente</p>
					</div>
    				<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 35207)) ?>"><img class="btn-comprar" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/sol-or/comprar.png"></a>
    			</div>
    		</div>
    	</div>
    </div>
    <!--Fin versión escritorio-->
<?php endif; ?>
