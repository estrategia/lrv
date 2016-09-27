
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
        .texto {/*font-family: VAGRoundedStd-Bold;*/color:#fff;cursor:pointer;}
        .space{height:34px;}
        .end {margin-top: -54px;}
        .compra-online {width: 70%;margin: 0px auto 0px;}
        .compra-online-movil {width: 60%;}
        .hide {display:none;-webkit-transition: width 2s linear; transition: width 2s linear;}
        .ui-title{text-align:center;}
        #paginador a {
            display: inline-block;
            width: 20px;
            height: 20px;
            text-indent: -999em;
            background: #fff;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            box-shadow: 0 0 1px 1px #707173;
            margin-right: 10px;
            cursor:pointer;
        }
	</style>
    ";
?>
    <!-- Funcionamiento de cambio de los videos -->
   <script type='text/javascript'>

           $(document).ready(function(){
            $('#receta1').click(function(){
                $('#video-receta1').removeClass('hide');
                $('#video-receta2').addClass('hide');                
                $('#video-receta3').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta8').addClass('hide');
                $('#video-receta9').addClass('hide'); 
                // para pausar el video
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
            });
            $('#receta2').click(function(){               
                $('#video-receta2').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $('#video-receta3').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta8').addClass('hide');
                $('#video-receta9').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
                
            });
            $('#receta3').click(function(){
                $('#video-receta3').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $('#video-receta2').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta8').addClass('hide');
                $('#video-receta9').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
            });
            $('#receta4').click(function(){
                $('#video-receta4').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $('#video-receta2').addClass('hide');
                $('#video-receta3').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta8').addClass('hide');
                $('#video-receta9').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
            });
            $('#receta5').click(function(){
                $('#video-receta5').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $('#video-receta2').addClass('hide');
                $('#video-receta3').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta8').addClass('hide');
                $('#video-receta9').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));

            });
            $('#receta6').click(function(){
                $('#video-receta6').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $('#video-receta2').addClass('hide');
                $('#video-receta3').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta8').addClass('hide');
                $('#video-receta9').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
            });
            $('#receta7').click(function(){
                $('#video-receta7').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $('#video-receta2').addClass('hide');
                $('#video-receta3').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta8').addClass('hide');
                $('#video-receta9').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
            });
            $('#receta8').click(function(){
                $('#video-receta8').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $('#video-receta2').addClass('hide');
                $('#video-receta3').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta9').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta9").attr("src", $("#video-receta9").attr("src"));
            });
            $('#receta9').click(function(){
                $('#video-receta9').removeClass('hide');
                $('#video-receta1').addClass('hide');
                $('#video-receta2').addClass('hide');
                $('#video-receta3').addClass('hide');
                $('#video-receta4').addClass('hide');
                $('#video-receta5').addClass('hide');
                $('#video-receta6').addClass('hide');
                $('#video-receta7').addClass('hide');
                $('#video-receta8').addClass('hide');
                // para pausar el video
                $("#video-receta1").attr("src", $("#video-receta1").attr("src"));
                $("#video-receta2").attr("src", $("#video-receta2").attr("src"));
                $("#video-receta3").attr("src", $("#video-receta3").attr("src"));
                $("#video-receta4").attr("src", $("#video-receta4").attr("src"));
                $("#video-receta5").attr("src", $("#video-receta5").attr("src"));
                $("#video-receta6").attr("src", $("#video-receta6").attr("src"));
                $("#video-receta7").attr("src", $("#video-receta7").attr("src"));
                $("#video-receta8").attr("src", $("#video-receta8").attr("src"));
            });

        });

    </script>
    
<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <div class="background" style="margin-top: -1%;">
        <img style="padding: 5% 3%;" width="95%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/optipro-proteina.png" alt="Banner Nan Optipro">       
        <center style="padding: 0px 20px;">
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/mod-recetas.png" alt="Recetas Nan Optipro">   
        </center>

        <section style="padding: 0px 20px;">
            <iframe id="video-receta1" width="100%" style="margin-top: 15px;" height="230" src="https://www.youtube.com/embed/8bckex25LDs" frameborder="0" allowfullscreen></iframe>
        </section>
        <section>
            <iframe id="video-receta2" class="hide" width="100%" height="230" style="margin-top: 15px;" src="https://www.youtube.com/embed/E1TrSvbmS2Q?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe id="video-receta3" class="hide" width="100%" height="230" style="margin-top: 15px;" height="190" src="https://www.youtube.com/embed/abBQhy3vmlA?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
             <iframe id="video-receta4" class="hide" width="100%" height="230" style="margin-top: 15px;" src="https://www.youtube.com/embed/H8jw2AhPt-Y?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
        </section>
        <section>
            <iframe id="video-receta5" class="hide" width="100%" height="230" style="margin-top: 15px;" src="https://www.youtube.com/embed/1hpaHKt-hs4?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe id="video-receta6" class="hide" width="100%" height="230" style="margin-top: 15px;" src="https://www.youtube.com/embed/xu9TM2T3Ylo?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe id="video-receta7" class="hide" width="100%" height="230" style="margin-top: 15px;" src="https://www.youtube.com/embed/BlqwKLjx41Y?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
        </section>
        <section>
            <iframe id="video-receta8" class="hide" width="100%" height="230" style="margin-top: 15px;" src="https://www.youtube.com/embed/_YBjJPeelQ0?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
        </section>
        <section>
            <iframe id="video-receta9" class="hide" width="100%" height="230" style="margin-top: 15px;" src="https://www.youtube.com/embed/W5N7OClImrE?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
        </section> 
                <div class="space"></div>   

        <section>
              <span class="ui-title"> 
                <div id="paginador">
                  <a id="receta1">1</a>
                  <a id="receta2">2</a>
                  <a id="receta3">3</a>
                  <a id="receta4">4</a>
                  <a id="receta5">5</a>
                  <a id="receta6">6</a>
                  <a id="receta7">7</a>
                  <a id="receta8">8</a>
                  <a id="receta9">9</a>
                </div>
              </span>
        </section>  

        <div class="space"></div>   

    </div>
    <!--Version movil-->   


    <!--Versión escritorio-->
<?php else: ?>
    <div class="container">
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
                <div class="col-md-4">
                    <div class="space"></div>
                     <div class="space"></div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video1.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta1" class="texto">Gelatina de frutas con NAN® OPTIPRO® 3 DESARROLLO</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video2.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta2" class="texto">Sorbete de fresa con NAN® OPTIPRO® 3 DESARROLLO y NESTUM® YOGURT FRESA</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video3.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta3" class="texto">NAN® OPTIPRO® 3 DESARROLLO con manzana</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video4.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta4" class="texto">NAN® OPTIPRO® 3 DESARROLLO con banano</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video5.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta5" class="texto">NAN® OPTIPRO® 3 DESARROLLO con avena</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video6.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta6" class="texto">Malteada de NESTUM® VAINILLA, NAN® OPTIPRO® 3 DESARROLLO, duraznos y galletas MILO® </p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video7.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta7" class="texto">Malteada de NESTUM® VAINILLA y NAN® OPTIPRO® 3 DESARROLLO con melón</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video8.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta8" class="texto">Batido de mango con NAN® OPTIPRO® 3 DESARROLLO</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-4">
                            <img style="width: 81%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/video9.jpg" class="img-responsive"> 
                        </div>
                        <div class="col-md-8">
                            <p id="receta9" class="texto">Batido de guayaba con NAN® OPTIPRO® 3 DESARROLLO</p>
                        </div>
                    </div>
                     
                </div>
                <div class="col-md-8">
                    <div class="space"></div>
                    <div class="space"></div>
                    <iframe id="video-receta1" style="margin-top: 15px;" width="100%" height="400" src="https://www.youtube.com/embed/8bckex25LDs" frameborder="0" allowfullscreen></iframe>
                    <iframe id="video-receta2" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/E1TrSvbmS2Q?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
                    <iframe id="video-receta3" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/abBQhy3vmlA?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>   
                    <iframe id="video-receta4" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/H8jw2AhPt-Y?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
                    <iframe id="video-receta5" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/1hpaHKt-hs4?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
                    <iframe id="video-receta6" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/xu9TM2T3Ylo?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
                    <iframe id="video-receta7" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/BlqwKLjx41Y?li=stPLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe> 
                    <iframe id="video-receta8" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/_YBjJPeelQ0?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
                    <iframe id="video-receta9" style="margin-top: 15px;" class="hide" width="100%" height="400" src="https://www.youtube.com/embed/W5N7OClImrE?list=PLLEhMEIG7E97afwfr_lMSAQjejl_lfWAJ" frameborder="0" allowfullscreen></iframe>
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
