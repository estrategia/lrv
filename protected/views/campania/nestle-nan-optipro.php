
<?php $this->pageTitle = "Nan optipro - La Rebaja Virtual"; ?>

<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='NAN® OPTIPRO® 3 DESARROLLO de Nestlé es una  proteína optimizada que ayuda a construir bases sólidas para el crecimiento y desarrollo de su hijo.'>
    <meta name='keywords' content='crecimiento, proteína para niños, desarrollo niños.'>

	<!-- styles -->
	<style>
        .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/nan/background.jpg);background-size:cover;}
        @font-face {
            font-family: VAGRoundedStd-Bold;
            src: url(".Yii::app()->request->baseUrl."/images/contenido/nan/font/VAGRoundedStd-Bold.otf);
        }
        @font-face {
            font-family: vagrounded-normal;
            src: url(".Yii::app()->request->baseUrl."/images/contenido/nan/font/vagrounded-normal.ttf);
        }
        .copy{font-family: VAGRoundedStd-Bold;color:#fff;font-size:11pt;text-align:center;}
        .space{height:34px;}
        .end {margin-top: -54px;}
        .compra-online {width: 70%;margin: 0px auto 0px;}
        .compra-online-movil {width: 60%;}
        .container-p{font-family: vagrounded-normal;font-size: 22px;color: #fff;padding: 6% 0;text-align: center;}
        .container-p-m {font-family: vagrounded-normal; font-size: 19px; color: #fff; padding: 0 5%; text-align: center;}
	</style>

  <!-- Google Code para etiquetas de remarketing. -->
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

  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window,document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
   fbq('init', '1237970366269442');
  fbq('track', 'PageView');
  </script>
  <noscript>
   <img height='1' width='1'
  src='https://www.facebook.com/tr?id=1237970366269442&ev=PageView
  &noscript=1'/>
  </noscript>
  <!-- End Facebook Pixel Code -->

  <script>
  fbq('track', 'ViewContent', {
  value: 3.50,
  currency: 'USD'
  });
  </script>

  <!-- Hotjar Tracking Code for www.larebajavirtual.com/nestle-nan-optipro -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:360594,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

    ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <section>
        <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/banner-nan-optipro.jpg">
    </section>
    <div class="background" style="margin-top: -1%;">
        <img style="padding: 5% 3% 0;" width="95%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/optipro-proteina.png" alt="Banner Nan Optipro">
        <div class="container-p-m">
          <p>Las proteínas tienen beneficios importantes en el niño en los primeros años de vida, por ejemplo son necesarias para que el niño crezca saludablemente,
          se desarrollen adecuadamente sus defensas (sistema inmunológico) y su cerebro.</p>
          <p> Darle a tu hijo una proteína de excelente calidad, es clave para una lograr una adecuada salud presente y futura</p>
        </div>
        <center>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>" data-ajax="false">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/compra-online.png" class="compra-online-movil" alt="Compra Nan Optipro">
            </a>
        </center>
        <center>
            <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro" data-ajax="false">
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
          <img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/descripcion-nan-optipro.png" alt="Nan Optipro">
          <div class="space"></div>
          <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan">
            <img style="width: 100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/btn-mas-info.png" alt="Banner Nan Optipro">
          </a>
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
                <img style="margin-top: 33px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/optipro-proteina.png" class="img-responsive" alt="Banner Nan Optipro">
              <div class="container-p">
                <p>Las proteínas tienen beneficios importantes en el niño en los primeros años de vida, por ejemplo son necesarias para que el niño crezca saludablemente,
                se desarrollen adecuadamente sus defensas (sistema inmunológico) y su cerebro.</p>
                <p> Darle a tu hijo una proteína de excelente calidad, es clave para una lograr una adecuada salud presente y futura</p>
              </div>
            </div>
            <div class="col-md-4">
                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 65388)) ?>">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/compra-online.png" class="img-responsive compra-online" alt="Compra Nan Optipro">
                </a>
                <a href="#">
                   <img style="margin: 15px auto 0px;width:65%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/entrega-en-1-hora.png" class="img-responsive" alt="Entrega en 1 hora Nan Optipro">
                </a>
                <div class="space"></div>
                <a href="<?= Yii::app()->request->baseUrl ?>/recetas-nestle-nan-optipro">
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
            <img style="width:75%;margin:0 auto;" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan/descripcion-nan-optipro.png" alt="Nan Optipro">
            <div class="space"></div>
            <center>
              <a href="<?= Yii::app()->request->baseUrl ?>/mas-informacion-nan">
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
