
<?php $this->pageTitle = "Nan optipro - La Rebaja Virtual"; ?>

<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>

	<!-- styles -->
	<style>
        .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan/background.jpg);background-size:cover;}
        @font-face {
            font-family: VAGRoundedStd-Bold;
            src: url(".Yii::app()->request->baseUrl."/images/contenido/nan/font/VAGRoundedStd-Bold.otf);
        }
        .copy{font-family: VAGRoundedStd-Bold;color:#fff;font-size:11pt;text-align:center;}
        .space{height:34px;}
        .end {margin-top: -54px;}
        .compra-online {width: 70%;margin: 32px auto 0px;}
        .compra-online-movil {width: 60%;}
	</style>

    ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <section>
        <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/banner-nan-optipro.jpg">  
    </section>
    <div class="background" style="margin-top: -1%;">
        <img style="padding: 5% 3%;" width="95%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/optipro-proteina.png" alt="Banner Nan Optipro">
        <center>
            <a href="#">  
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/compra-online.png" class="compra-online-movil" alt="Compra Nan Optipro">
            </a>
        </center>
        <center>
            <a href="#">
                <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/recetas.png" alt="Recetas Nan Optipro">                   
            </a>
        </center>
        <div class="space"></div>
        <section>
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/que-es-optipro.png" alt="Qué es Optipro?">
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/cover-video1.jpg"  alt="video 1">
        </section>
        <div class="space"></div>
        <section>
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/que-es-programacion-metabolica.png" alt="Qué es programación metabolica?">
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/cover-video2.jpg" alt="video 2">
        </section>
        <section>
            <div class="space"></div>
            <p class="copy">
                Productos a partir de 24 meses. <br>
                *Junto con una alimentación balanceada y ejercicio físico diario.
            </p>
            <img style="display:flex;" width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/end.png"> 
        </section>
    </div>
    <!--Version movil-->   


    <!--Versión escritorio-->
<?php else: ?>
    <div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/banner-nan-optipro.jpg" class="img-responsive" alt="Banner Nan Optipro">
        </div>
        <div class="row background">
            <div class="space"></div>
            <div class="col-md-8">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/optipro-proteina.png" class="img-responsive" alt="Banner Nan Optipro">
            </div>
            <div class="col-md-4">
                <a href="#">  
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/compra-online.png" class="img-responsive compra-online" alt="Compra Nan Optipro">
                </a>
                <div class="space"></div>
                <a href="#">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/recetas.png" class="img-responsive" alt="Recetas Nan Optipro">                   
                </a>
            </div>
            <div class="container">
                <div class="col-md-6">
                    <div class="space"></div>
                     <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/que-es-optipro.png" class="img-responsive" alt="Qué es Optipro?">
                     <img style="margin-top:20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/cover-video1.jpg" class="img-responsive" alt="video 1">
                </div>
                <div class="col-md-6">
                    <div class="space"></div>
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/que-es-programacion-metabolica.png" class="img-responsive" alt="Qué es programación metabolica?">
                    <img style="margin-top:20px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/cover-video2.jpg" class="img-responsive" alt="video 2"> 
                </div>
            </div>
            <div>
                <div class="space"></div>
                <p class="copy">
                    Productos a partir de 24 meses. <br>
                    *Junto con una alimentación balanceada y ejercicio físico diario.
                </p>
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/end.png" class="img-responsive end"> 
            </div>
        </div>
    </div>
    <!--Fin versión escritorio-->   
<?php endif; ?>
