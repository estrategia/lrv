
<?php $this->pageTitle = "Klim 1+ La Rebaja Virtual"; ?>

<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='La leche en polvo Klim 1+ ayuda a desarrollar un sistema de defensas y un sistema digestivo saludable. Especial para niños entre 1 y 3 años. '>
    <meta name='keywords' content='Leche en polvo, leche klim,  leche klim 1.'>

	<!-- styles -->
	<style>
        .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim1/background.jpg);background-size:cover;}
        @font-face {
            font-family:VAGRoundedStd-Bold ;
            src: url(".Yii::app()->request->baseUrl."/images/contenido/klim1/font/VAGRoundedStd-Bold.otf);
        }
        @font-face {
            font-family:VAGRoundedStd-Light ;
            src: url(".Yii::app()->request->baseUrl."/images/contenido/klim1/font/VAGRoundedStd-Light.otf);
        }
        .texto{font-family:VAGRoundedStd-Light ; font-size:14px;color:#872f01;text-align: center;margin-top: 3%;margin-bottom: 2%;}
        .text-strong {font-family:VAGRoundedStd-Bold ;}
	</style>


    ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <div class="background">
        <section>
            <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/banner-klim.png" alt="Klim 1+ Fortiprotect">
        </section>
        <section>
            <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/contenido-klim.png" alt="Contiene nutrientes que ayudan al normal funcionamiento del sistema de defensas.">
        </section>
        <center>
            <a href="#">
                <img style="width:40%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/btn-comprar.png" alt="Comprar Klim1+">
            </a>    
        </center>
        <center>
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/entrega-en-1-hora.png" alt="Entrega en 1 hora">
        </center>
        <center>
            <a href="#">
                <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/que-son-previoticos.png" class="img-responsive" alt="¿Qué son los prebióticos?">
            </a> 
        </center>
        <section>
            <a href="">
                <img style="width:100%;margin-top: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-receta.png" class="img-responsive" alt="Receta con alimento lácteo klim 1+ fortiprotect">
                <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/img-klim.png" class="img-responsive" alt="">
            </a>    
        </section>
        <section>
            <img style="width:100%;margin-top: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-desarrollo.png" class="img-responsive" alt="Desarrollo de 1 a 3 años"> 
            <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/img-desarrollo.png" class="img-responsive" alt="">
        </section>
        <section style="margin-top:20px;">
            <p class="texto"><span class="text-strong">Aviso importante:</span> <br>la leche materna es el mejor alimento para los niños. <br>
            KLIM® 1+ FORTIPROTECT® es un Alimento Lácteo para niños a partir de 1 año.</p>
            <div style="height:24px;"></div>
        </section>

    </div>
    <!--Version movil-->   


    <!--Versión escritorio-->
<?php else: ?>
    <div class="container background">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/banner-klim.png" class="img-responsive" alt="Klim 1+ Fortiprotect">
        </div>
        <div class="row ">
            <div class="space"></div>
            <div class="col-md-7 col-sm-6 col-xs-6">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/contenido-klim.png" class="img-responsive" alt="Contiene nutrientes que ayudan al normal funcionamiento del sistema de defensas.">
            </div>
            <div class="col-md-5 col-sm-6 col-xs-6">
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <a href="">
                        <img style="margin: auto;margin-top: 15%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/btn-comprar.png" class="img-responsive" alt="Comprar Klim1+">
                    </a>                      
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <img style="margin: 0 auto;margin-top: 30%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/entrega-en-1-hora.png" class="img-responsive" alt="Entrega en 1 hora">
                </div>
              
                <div class="col-md-12">
                    <a href="">
                        <img style="margin: 0 auto;margin-top: 20%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/que-son-previoticos.png" class="img-responsive" alt="¿Qué son los prebióticos?">
                    </a>                    
                </div>
                
            </div>
   
        </div>
        <div class="row" style="margin-top:34px;">
            <div class="col-md-6">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-receta.png" class="img-responsive" alt="Receta con alimento lácteo klim 1+ fortiprotect">
                <img style="margin-top: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/img-klim.png" class="img-responsive" alt="">
            </div>
            <div class="col-md-6">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-desarrollo.png" class="img-responsive" alt="Desarrollo de 1 a 3 años"> 
                <img style="margin-top: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/img-desarrollo.png" class="img-responsive" alt="">
            </div>
        </div>
        <div class="row">
            <p class="texto"><span class="text-strong">Aviso importante:</span> la leche materna es el mejor alimento para los niños. <br>
            KLIM® 1+ FORTIPROTECT® es un Alimento Lácteo para niños a partir de 1 año.</p>
        </div>
    </div>
    <!--Fin versión escritorio-->   
<?php endif; ?>
