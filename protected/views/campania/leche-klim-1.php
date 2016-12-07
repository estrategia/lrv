<?php $this->pageTitle = "Klim 1+ La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='La leche en polvo Klim 1+ ayuda a desarrollar un sistema de defensas y un sistema digestivo saludable. Especial para niños entre 1 y 3 años.'>
    <meta name='keywords' content='Leche en polvo, leche klim,  prebioticos.'>
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
          .contentText{max-width: 900px;margin: auto;background-color: #FFF376;padding: 15px;border: 3px solid #905B2F;border-radius: 15px;}
          .contentText .texto {text-align: justify;font-size: 18px;}
          .contentText-m{max-width: 85%;margin: auto;background-color: #FFF376;padding: 15px;border: 3px solid #905B2F;border-radius: 15px;}
          .contentText-m .texto {text-align: justify;font-size: 18px;}
          .list li{list-style: none;display: inline-block;}
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
            <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 1699)) ?>">
                <img style="width:40%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/btn-comprar.png" alt="Comprar Klim1+">
            </a>
        </center>
        <center>
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/entrega-en-1-hora.png" alt="Entrega en 1 hora">
        </center>
        <center>
            <a href="<?= Yii::app()->request->baseUrl ?>/prebioticos-klim" data-ajax="false">
                <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/que-son-previoticos.png" class="img-responsive" alt="¿Qué son los prebióticos?">
            </a>
        </center>
        <section>
            <a href="">
                <img style="width:100%;margin-top: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-receta.png" class="img-responsive" alt="Receta con alimento lácteo klim 1+ fortiprotect">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/xrHTcWo4iko?showinfo=0" frameborder="0" allowfullscreen></iframe>
            </a>
        </section>
        <section>
            <img style="width:100%;margin-top: 15px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-desarrollo.png" class="img-responsive" alt="Desarrollo de 1 a 3 años">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/avoR-zOnGbM?showinfo=0" frameborder="0" allowfullscreen></iframe>
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
        <div class="row">
          <div class="col-md-6">
            <a href="<?= Yii::app()->request->baseUrl ?>/prebioticos-klim" data-ajax="false">
                <img style="width: 60%;margin: 25px auto 25px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/que-son-previoticos.png" class="img-responsive" alt="¿Qué son los prebióticos?">
            </a>
          </div>
          <div class="col-md-6">
            <center>
              <ul class="list">
                <li>
                  <a href="<?php echo CController::createUrl('/contenido/ver', array('tipo' => 'grupo', 'contenido' => 1699)) ?>">
                    <img style="width: 45%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/btn-comprar.png" class="img-responsive" alt="Comprar Klim1+">
                  </a>
                </li>
                <li><img style="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/entrega-en-1-hora.png" class="img-responsive" alt="Entrega en 1 hora"></li>
              </ul>
            </center>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="contentText">
                <h1 class="text-strong" style="color: #A12F16;text-shadow: 3px 0px 0px #fff;text-align: center;">Prebio<sup>®</sup> 1 el aliado de las defensas de tu hijo.</h1>
                <p class="texto">
                  Tu hijo ahora es más inquieto y curioso, quiere tocar, mover y meterse todo en la boca, es una etapa de su vida donde es importante ayudarlo a reforzar sus defensas.</p>
                <p class="texto">
                  Por fortuna encontramos sustancias en algunos alimentos que por su constitución no son digeridas en el estómago o en el intestino delgado y llegan al colon para favorecer el crecimiento y mantenimiento de las bacterias de la llamada flora intestinal normal. A estos alimentos se les conoce con el nombre de prebióticos y la leche materna es el principal ejemplo de ellos.</p><p>
                </p>

              </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
              <img style="width: 86%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/contenido-klim.png" class="img-responsive" alt="Contiene nutrientes que ayudan al normal funcionamiento del sistema de defensas.">
          </div>
        </div>
        <div class="row" style="margin-top:34px;">
            <div class="col-md-6">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-receta.png" class="img-responsive" alt="Receta con alimento lácteo klim 1+ fortiprotect">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/xrHTcWo4iko?showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-6">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim1/title-desarrollo.png" class="img-responsive" alt="Desarrollo de 1 a 3 años">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/avoR-zOnGbM?showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row">
            <p class="texto"><span class="text-strong">Aviso importante:</span> la leche materna es el mejor alimento para los niños. <br>
            KLIM® 1+ FORTIPROTECT® es un Alimento Lácteo para niños a partir de 1 año.</p>
        </div>
    </div>
    <!--Fin versión escritorio-->
<?php endif; ?>
