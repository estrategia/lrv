
<?php $this->pageTitle = "Recetas Nan optipro - La Rebaja Virtual"; ?>

<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Nan Optipro 3 Desarrollo de Nestlé trae unas deliciosas recetas fáciles de preparar para que tu hijo consuma proteína de una manera divertida.'>
    <meta name='Recetas para niños, loncheras, proteína para niños.'>

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
        .compra-online {width: 70%;margin: 0px auto 0px;}
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
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/mod-recetas.png" alt="Recetas Nan Optipro">   
        </center>
        <section>
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/8bckex25LDs" frameborder="0" allowfullscreen></iframe>
        </section>
        <section>
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/E1TrSvbmS2Q?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe width="100%" style="margin-top: 15px;" height="190" src="https://www.youtube.com/embed/abBQhy3vmlA?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
             <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/H8jw2AhPt-Y?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
        </section>
        <section>
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/1hpaHKt-hs4?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/xu9TM2T3Ylo?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/BlqwKLjx41Y?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/_YBjJPeelQ0?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
        </section>
        <section>
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/W5N7OClImrE?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
        </section>
        <div class="space"></div>     

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
       
            <div class="container">
                <div class="col-md-6">
                   <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/mod-recetas.png" class="img-responsive" alt="Recetas Nan Optipro"> 
                </div>
                <div class="col-md-6">
                    <img style="width: 85%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/optipro-proteina.png" class="img-responsive" alt="Banner Nan Optipro">                   
                </div>
            </div>
            <div class="container">
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/8bckex25LDs" frameborder="0" allowfullscreen></iframe>                    
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/E1TrSvbmS2Q?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>                    
                </div>                
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/abBQhy3vmlA?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>                    
                </div>
            </div>
            <div class="container">
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/H8jw2AhPt-Y?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>                    
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/1hpaHKt-hs4?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>                    
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/xu9TM2T3Ylo?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>                    
                </div>
            </div>
            <div class="container">
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/BlqwKLjx41Y?li=stPLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>                    
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/_YBjJPeelQ0?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="space"></div>
                    <iframe width="100%" height="190" src="https://www.youtube.com/embed/W5N7OClImrE?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
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
