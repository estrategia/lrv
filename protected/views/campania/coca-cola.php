
<?php $this->pageTitle = "Coca-Cola - La Rebaja Virtual"; ?>

<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Coca Cola llega ahora nuevas presentaciones: Coca Cola sin azúcar, endulzado con Estevia, sabor ligero y por supuesto su inigualable sabor original.'>
    <meta name='keywords' content='Coca Cola, Gaseosa, gaseosa sin azúcar'>

	<!-- styles -->
	<style>
		@font-face {
		    font-family: Gotham-Bold;
		    src: url(".Yii::app()->request->baseUrl."/images/contenido/coca-cola/Gotham-Bold.otf);
		}  
        p {font-family: Gotham-Bold;}
        .btn-entrega{margin:0 auto;width:400px;}  
        .space {height: 60px;} 
        .owl-carousel.owl-theme.owl-productodetalle.cocacola .owl-pagination{margin-top: 50px !important;}
	</style>

    ";
?>


<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <section>
        <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/banner-movil.jpg">  
    </section>
    <section>
    	<p style="font-size: 13px;text-align: center;padding: 15px;">Identifícalas por su descriptor, el color de su tapa y el de su etiqueta: </p>
    </section>
    <section>
	    <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle cocacola">
	        <div class="item"><a href="#" ><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-sabor-original-movil.jpg" alt=""></a></div> 
	        <div class="item"><a href="#" ><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-azucar-estebia-movil.jpg" alt=""></a></div>  
	        <div class="item"><a href="#" ><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-sin-azucar-movil.jpg" alt=""></a></div>  
	        <div class="item"><a href="#" ><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-sabor-ligero-movil.jpg" alt=""></a></div>        
	    </div>    	
    </section>
    <center>
    	<a href="">
    		<img style="margin-top: 25px; margin-bottom:20px;width: 70%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/boton-compra.png" alt="Btón compra online">
    	</a> 
    </center>
    <section>
        <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/banner2-movil.jpg" class="img-responsive" alt="Banner Promocional Coca-Cola">
    </section>
    <center style="margin-top: 10px;margin-bottom: 10px;">
    	<a href="">
    		<img style="width: 90%;margin: 0px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/btn-mas-info.jpg" class="img-responsive" alt="Botón más información">
    	</a>
    </center>
    <center style="margin-top: 10px;margin-bottom: 10px;">
    	<a href="">
    		<img style="width: 90%;margin: 0px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/btn-productos-relacionados.jpg" class="img-responsive" alt="Botón productos relacionados">  
    	</a>    	
    </center>



    <!--Version movil-->   


    <!--Versión escritorio-->
<?php else: ?>
    <div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/banner.jpg" class="img-responsive" alt="Banner Promocional Coca-Cola">
        </div>
        <div class="row">
        	<div class="col-md-12 col-sm-3">
        	    <a href="">
        	    	<img style="margin-top: 25px; margin-bottom:45px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/boton-compra.png" class="img-responsive btn-entrega" alt="Btón compra online">
        	    </a> 
        	</div>
        </div>
        <div class="row">
        	<p style="font-size: 25px;text-align: center;">Identifícalas por su descriptor, el color de su tapa y el de su etiqueta: </p>
        	<div class="space"></div>
        	<div class="col-md-3 col-sm-3">
        		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-sabor-original.jpg" class="img-responsive" alt="Coca-Cola sabor original">
        	</div>
        	<div class="col-md-3 col-sm-3">
        		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-azucar-estebia.jpg" class="img-responsive" alt="Coca-Cola con azúcar y estebia">
        	</div>
        	<div class="col-md-3 col-sm-3">
        		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-sin-azucar.jpg" class="img-responsive" alt="Coca-Cola sin azúcar">
        	</div>
        	<div class="col-md-3 col-sm-3">
        		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/coca-cola-sabor-ligero.jpg" class="img-responsive" alt="Coca-Cola sabor ligero">
        	</div>
        </div>
        <div class="space"></div>
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/banner2.jpg" class="img-responsive" alt="Banner Promocional Coca-Cola">
        </div>
        <div class="row" style="margin-top: 40px;margin-bottom: 40px;">
        	<div class="col-md-6">
        		<a href="">
        			<img style="width: 300px;margin: 0px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/btn-mas-info.jpg" class="img-responsive" alt="Botón más información">
        		</a>
        	</div>
        	<div class="col-md-6">
        		<a href="">
        			<img style="width: 393px;margin: 0px auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coca-cola/btn-productos-relacionados.jpg" class="img-responsive" alt="Botón productos relacionados">  
        		</a>
        	</div>
        </div>
    </div>
    <!--Fin versión escritorio-->   
<?php endif; ?>
