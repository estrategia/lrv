
<?php $this->pageTitle = "Nan optipro - La Rebaja Virtual"; ?>

<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Nan Optipro 3 Desarrollo de Nestlé es una  proteína optimizada que ayuda a construir bases sólidas para el crecimiento y desarrollo de su hijo.'>
    <meta name='keywords' content='crecimiento, proteína para niños, desarrollo niños.'>

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

  <!-- Google Code para etiquetas de remarketing -->
  <script type='text/javascript'>
    /* <![CDATA[ */
    var google_conversion_id = 872146633;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
  </script>
  <script type='text/javascript' src='//www.googleadservices.com/pagead/conversion.js'>
  </script>
  <noscript>
  <div style='display:inline;'>
  <img height='1' width='1' style='border-style:none;' alt='' src='//googleads.g.doubleclick.net/pagead/viewthroughconversion/872146633/?guid=ON&amp;script=0'/>
  </div>
  </noscript>
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
            <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 1218)) ?>" data-ajax="false">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/compra-online.png" class="compra-online-movil" alt="Compra Nan Optipro">
            </a>
        </center>
        <center>
            <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/nan-recetas" data-ajax="false">
                <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/recetas.png" alt="Recetas Nan Optipro">
            </a>
        </center>
        <div class="space"></div>
        <section>
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/que-es-optipro.png" alt="Qué es Optipro?">
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/hSR0AkTsguk" frameborder="0" allowfullscreen></iframe>
        </section>
        <div class="space"></div>
        <section>
            <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/deliciosas-recetas.png" alt="Qué es programación metabolica?">
            <iframe width="100%" style="margin-top: 15px;" src="https://www.youtube.com/embed/8bckex25LDs" frameborder="0" allowfullscreen></iframe>
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
                <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 1218)) ?>">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/compra-online.png" class="img-responsive compra-online" alt="Compra Nan Optipro">
                </a>
                <a href="#">
                   <img style="margin: 15px auto 0px;width:65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/entrega-en-1-hora.png" class="img-responsive" alt="Entrega en 1 hora Nan Optipro">
                </a>
                <div class="space"></div>
                <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/nan-recetas">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/recetas.png" class="img-responsive" alt="Recetas Nan Optipro">
                </a>
            </div>
            <div class="container">
                <div class="col-md-6">
                    <div class="space"></div>
                     <img style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/que-es-optipro.png" class="img-responsive" alt="Qué es Optipro?">
                     <iframe width="100%" height="315" style="margin-top: 15px;" src="https://www.youtube.com/embed/hSR0AkTsguk" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    <div class="space"></div>
                    <img style="height: 97px;margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/deliciosas-recetas.png" class="img-responsive" alt="Qué es programación metabolica?">
                    <iframe width="100%" height="315" style="margin-top: 15px;" src="https://www.youtube.com/embed/8bckex25LDs" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div>
              <div class="space"></div>
            <center>
              <a href="<?= Yii::app()->request->baseUrl ?>/campania/contenido/mas-informacion-nan">
                <img style="" width="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/btn-mas-info.png" alt="Banner Nan Optipro">
              </a>
            </center>
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
