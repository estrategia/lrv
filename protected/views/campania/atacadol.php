
<?php $this->pageTitle = "Atacadol - La Rebaja Virtual"; ?>

<?php
    $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Atacadol es el nuevo analgésico que alivia los fuertes síntomas de la migraña y múltiples dolores en tan solo minutos.'>
    <meta name='keywords' content='Dolor de cabeza, migraña y alivio del dolor.'>

	<!-- styles -->
	<style>
            @font-face {
                font-family: Interstate regular;
                src: url(".Yii::app()->request->baseUrl."/images/contenido/atacadol/fonts/interstate-regular.ttf);
            }
            @font-face {
                font-family: Helvetica Neue ;
                src: url(".Yii::app()->request->baseUrl."/images/contenido/atacadol/fonts/HelveticaNeue.otf);
            }   
            body {color:#fff !important;font-family:Interstate regular !important;font-size:18px !important;}
            .space{margin-top:30px;}
            .background{
				background: rgba(0,25,130,1);
				background: -moz-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
				background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0,25,130,1)), color-stop(100%, rgba(0,151,218,1)));
				background: -webkit-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
				background: -o-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
				background: -ms-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
				background: linear-gradient(to bottom, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001982', endColorstr='#0097da', GradientType=0 );
				padding: 0px 45px;
            }
            .background-m{
            	background: rgba(0,25,130,1);
            	background: -moz-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
            	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0,25,130,1)), color-stop(100%, rgba(0,151,218,1)));
            	background: -webkit-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
            	background: -o-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
            	background: -ms-linear-gradient(top, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
            	background: linear-gradient(to bottom, rgba(0,25,130,1) 0%, rgba(0,151,218,1) 100%);
            	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001982', endColorstr='#0097da', GradientType=0 );
            	padding: 0px 18px;
            	margin-top:-5px;
            }

            .img-entrega{width: 300px;margin: 0px auto;}
            .texto-intro{background-color:#004F9F;padding:5px;}
            .texto-intro p {border:4px solid #F7B800;margin:0px;color:#fff;text-align:center;font-size:30px;}
            .title{margin-bottom: 20px;}            
            .list{list-style:none;list-style-image: url('../../images/contenido/atacadol/ico.png');text-align:justify;}
            .list-m {padding: 0px 10px 0px 36px;}
            .filtro {background-color:#fff;border-radius: 5px;border: 1px solid red;padding: 0 !important;}
            .filtro-m {background-color:#fff;border-radius: 5px;border: 1px solid red;padding: 19px !important;}

	</style>

    ";
?>


<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <section style="background-color:#001781;">
  		<img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/banner-movil.png">  
    	
   		<div class="background-m">
   			<img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/descripcion.png">
	    	<center>
	    		<a href=""><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/entrega.png" class="img-responsive img-entrega"></a>
	    	</center>
	    	<section >
	    		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-1.png" alt="¿Que es atacadol?">
	    		<ul class="list list-m">
	    			<li>El nuevo AtacaDol es un analgésico que alivia múltiples síntomas del dolor sin causar somnolencia.</li>
	    		</ul>
	    	</section>
	    	<section>
	    		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-2.png" alt="Beneficios de AtacaDol">
	    		<p>Alivio de la fiebre y de los dolores más comunes como:</p>
	    		<ul class="list list-m">
	    			<li>Dolores del resfriado</li>
	    			<li>Dolor de cabeza</li>
	    			<li>Dolores musculares</li>
	    			<li>Dolores de espalda</li>
	    			<li>Dolor de garganta</li>
	    		</ul>
	    	</section>
	    	<section>
	    		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-3.png" alt="¿Cómo se utiliza atacaDol?">
	    		<p>Administrar por vía oral. Adultos (incluyendo la edad avanzada) y niños mayores de 12 años:</p>
	    		<ul class="list list-m">
	    			<li>1 a 2 tabletas cada 4 a 6 horas. Si es necesario repetir la dosis cada 4 horas tome únicamente una tableta.</li>
	    			<li>No tome más de 6 tabletas en 24 horas (3000mg de acetaminofén).</li>
	    			<li>Niños menores de 12 años: no se recomienda.</li>
	    			<li>No administrar con otros productos que contengan acetaminofén.</li>
	    			<li>No exceder la dosis máxima recomendada.</li>
	    			<li>Si los síntomas persisten consulte a su médico</li>
	    		</ul>
	    	</section>	
	    	<section>
	    		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-4.png" alt="¿Qué contiene AtacaDol?">
	    		<ul class="list">
	    			<li>Paracetamol 500mg</li>
	    			<li>Cafeína 50mg</li>
	    		</ul>
	    	</section> 
	    	<section>
	    	    <img width=100% src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-5.png" alt="Contraindicaciones y Advertencias">
	    	    <ul class="list list-m">
	    	        <li>Hipersensibilidad a los componentes, adminístrese con precaución a pacientes con insuficiencia hepática o renal.</li>
	    	      	<li><strong>Precauciones:</strong> <br>
	    				La ingesta de grandes cantidades de cafeína puede producir dificultades para dormir, nerviosismo y una sensación desagradable en el pecho producida por palpitaciones.
	    			</li>
	    			<li><strong>Embarazo y Lactancia:</strong> <br>
	    				No se recomienda su uso durante el embarazo. Debe evitarse el uso durante la lactancia.
	    			</li>
	    			<li><strong>Recomendaciones:</strong> <br>
	    				Si consume té o café hacerlo moderadamente.
	    			</li>
	    	    </ul>	    		
	    	</section>
	    	<section>
    			<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-6.png" alt="Sobredosificación">
	    	        <ul class="list list-m">
	    	        	<li>La sobredosificación con acetaminofén puede causar falla hepática. Cualquier tipo de sobredosis debe ser manejada médicamente en forma inmediata, así no se encuentren presentes en el momento signos o síntomas de sobredosificación.</li>
	    	        	<li>La sobredosificación con cafeína puede causar dolor epigástrico, vómitos, diuresis, taquicardia o arritmia cardíaca, estimulación del SNC (insomnio, inquietud, excitación, agitación, nerviosismos, temblor y convulsiones). Debe tenerse en cuenta que si aparecen síntomas clínicamente significativos de sobredosis de cafeína por este producto, la cantidad ingerida podría estar asociada con una severa toxicidad hepática producida por el acetaminofén.</li>

	    				<li>ANTÍDOTO: N-acetilcisteina o metionina.</li>
	    				<li><strong>Recomendaciones:</strong> <br>
	    					Si consume té o café hacerlo moderadamente.
	    				</li>
	    	        </ul>
	    	</section> 
	    	<section>
	    		<img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-7.png" alt="Reacciones Adversas">
        		<p>Suspenda la medicación y consulte a su médico inmediatamente si:</p>
        		<ul class="list list-m">
        			<li>Presenta una reacción alérgica con problemas respiratorios o inflamación de labios, lengua, garganta o cara.</li>
        			<li>Presenta un rash en la piel o descamación de la piel o úlceras bucales.</li>

					<li>Ha tenido previamente problemas respiratorios con Ácido acetilsalicílico u otros antiinflamatorios no esteroideos, y presenta una reacción similar con este producto.</li>
					<li>Presenta sangrado o hematomas sin causa aparente. Todas estas reacciones son raras. </li>
        		</ul>
        		<p>Manténganse fuera del alcance de los niños. Consérvese a no más de 30 °C en su empaque original.</p>
	    	</section>  



	    	<section>
	    	    <section class="filtro-m" style="text-align:center;">
	    	        <span style="color:#E90000;">Productos relacionados</span>
	    	        <a href=""><img width="34" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
	    	    </section>
				<div class="space"></div>
	    	    <section class="filtro-m" style="text-align:center;">
	    	        <span style="color:#E90000;">Más información</span>
	    	        <a href=""><img width="34" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
	    	    </section>	            	
	    	    <p style="color:#000;font-size:14px;padding-bottom:20px;">AtacaDol Activo: Es un medicamento No exceder su consumo. <br>
	    	     Reg. sanitario INVIMA 2015M-0016108. Leer indicaciones y contraindicaciones. Sí los síntomas persisten, consultar al médico.</p>
	    	</section>
	    	
	    


    	</div>
	</section>

<!--Version movil-->   


<!--Versión escritorio-->
<?php else: ?>
    <div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/banner-desktop.png" class="img-responsive">
        </div>
        <div class="row background">
        	<div class="col-md-12">
	            <div class="col-md-6">
	            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/descripcion.png">
	              <!--   <div class="texto-intro">
	                	<p>
		                	Llega <strong>ATACADOL</strong> <span style="color:#DF040F;">Activo</span>,<br>
		                	para el alivio de dolores de <br>
		                	cabeza como la migraña	                		
	                	</p>
	                </div> -->
	                <div class="space"></div>
	            </div>
	            <div class="col-md-6">
	                <a href=""><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/entrega.png" class="img-responsive img-entrega"></a> 
	                <div class="space"></div>
	            </div>
        	</div>

        	<div class="col-md-12">
        		<img class="title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-1.png" alt="¿Que es atacadol?">
        		<ul class="list">
        			<li>El nuevo AtacaDol es un analgésico que alivia múltiples síntomas del dolor sin causar somnolencia.</li>
        		</ul>
        	</div>

        	<div class="col-md-12">
        		<img class="title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-2.png" alt="Beneficios de AtacaDol">
        		<p>Alivio de la fiebre y de los dolores más comunes como:</p>
        		<ul class="list">
        			<li>Dolores del resfriado</li>
        			<li>Dolor de cabeza</li>
        			<li>Dolores musculares</li>
        			<li>Dolores de espalda</li>
        			<li>Dolor de garganta</li>
        		</ul>
        	</div>

        	<div class="col-md-12">
        		<img class="title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-3.png" alt="¿Cómo se utiliza atacaDol?">
        		<p>Administrar por vía oral. Adultos (incluyendo la edad avanzada) y niños mayores de 12 años:</p>
        		<ul class="list">
        			<li>1 a 2 tabletas cada 4 a 6 horas. Si es necesario repetir la dosis cada 4 horas tome únicamente una tableta.</li>
        			<li>No tome más de 6 tabletas en 24 horas (3000mg de acetaminofén).</li>
        			<li>Niños menores de 12 años: no se recomienda.</li>
        			<li>No administrar con otros productos que contengan acetaminofén.</li>
        			<li>No exceder la dosis máxima recomendada.</li>
        			<li>Si los síntomas persisten consulte a su médico</li>
        		</ul>
        	</div>

        	<div class="col-md-12">
        		<img class="title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-4.png" alt="¿Qué contiene AtacaDol?">
        		<ul class="list">
        			<li>Paracetamol 500mg</li>
        			<li>Cafeína 50mg</li>
        		</ul>
        	</div>

        	<div class="col-md-12">
        		<img class="title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-5.png" alt="Contraindicaciones y Advertencias">
        		<ul class="list">
        			<li>Hipersensibilidad a los componentes, adminístrese con precaución a pacientes con insuficiencia hepática o renal.</li>
        			<li><strong>Precauciones:</strong> <br>
						La ingesta de grandes cantidades de cafeína puede producir dificultades para dormir, nerviosismo y una sensación desagradable en el pecho producida por palpitaciones.
					</li>
					<li><strong>Embarazo y Lactancia:</strong> <br>
						No se recomienda su uso durante el embarazo. Debe evitarse el uso durante la lactancia.
					</li>
					<li><strong>Recomendaciones:</strong> <br>
					Si consume té o café hacerlo moderadamente.
					</li>
        		</ul>
        	</div>


        	<div class="col-md-12">
        		<img class="title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-6.png" alt="Sobredosificación">
        		<ul class="list">
        			<li>La sobredosificación con acetaminofén puede causar falla hepática. Cualquier tipo de sobredosis debe ser manejada médicamente en forma inmediata, así no se encuentren presentes en el momento signos o síntomas de sobredosificación.</li>
        			<li>La sobredosificación con cafeína puede causar dolor epigástrico, vómitos, diuresis, taquicardia o arritmia cardíaca, estimulación del SNC (insomnio, inquietud, excitación, agitación, nerviosismos, temblor y convulsiones). Debe tenerse en cuenta que si aparecen síntomas clínicamente significativos de sobredosis de cafeína por este producto, la cantidad ingerida podría estar asociada con una severa toxicidad hepática producida por el acetaminofén.</li>

					<li>ANTÍDOTO: N-acetilcisteina o metionina.</li>
					<li><strong>Recomendaciones:</strong> <br>
					Si consume té o café hacerlo moderadamente.
					</li>
        		</ul>
        	</div>

        	<div class="col-md-12">
        		<img class="title" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/atacadol/titulo-7.png" alt="Reacciones Adversas">
        		<p>Suspenda la medicación y consulte a su médico inmediatamente si:</p>
        		<ul class="list">
        			<li>Presenta una reacción alérgica con problemas respiratorios o inflamación de labios, lengua, garganta o cara.</li>
        			<li>Presenta un rash en la piel o descamación de la piel o úlceras bucales.</li>

					<li>Ha tenido previamente problemas respiratorios con Ácido acetilsalicílico u otros antiinflamatorios no esteroideos, y presenta una reacción similar con este producto.</li>
					<li>Presenta sangrado o hematomas sin causa aparente. Todas estas reacciones son raras. </li>
        		</ul>
        		<p>Manténganse fuera del alcance de los niños. Consérvese a no más de 30 °C en su empaque original.</p>
        	</div>



           	<div class="col-md-12">
           	<div class="space"></div>
	            <div class="col-md-5">
	                <p style="color:#000;">AtacaDol Activo: Es un medicamento No exceder su consumo. <br>
	                 Reg. sanitario INVIMA 2015M-0016108. Leer indicaciones y contraindicaciones. Sí los síntomas persisten, consultar al médico.</p>
	            </div>
	            <div class="col-md-6 filtro" style="padding-top: 15px !important;padding-bottom: 15px !important;margin-top: 25px;">
	                <div class="col-md-7">
	                    <span style="color:#E90000;">Productos relacionados</span>
	                    <a href=""><img width="34" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
	                </div>
	                <div class="col-md-5">
	                    <span style="color:#E90000;">Más información</span>
	                    <a href=""><img width="34" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/ico-filtro.png" ></a>
	                </div>	            	
	            </div>
           		</div>
           	</div>

        </div>
    </div>
 <!--Fin versión escritorio-->   
<?php endif;?>
