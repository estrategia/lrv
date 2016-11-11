
<?php $this->pageTitle = "Klim fortigrow | La Rebaja Virtual"; ?>

<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='KLIM® FORTIGROW® es un alimento lácteo con adición de vitaminas y minerales que ayuda a cubrir necesidades nutricionales en etapa escolar y crecimiento.'>
    <meta name='keywords' content='klim fortigrow, etapa escolar, crecimiento niños.'>

	<!-- styles -->
	<style>
        .background {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim-fortigrow/background.png);background-size:100% 100%;}
        .background-m {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/klim-fortigrow/background.png);background-size:cover;}
        .space {height:32px;}
        .contain{padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;}
        @font-face {
            font-family:VAGRoundedStd-Bold ;
            src: url(".Yii::app()->request->baseUrl."/images/contenido/klim-fortigrow/font/VAGRoundedStd-Bold.otf);
        }
        .content{font-family:VAGRoundedStd-Bold;max-width: 900px;margin: 0px auto 29px;font-size: 19px;text-align: justify;}
	</style>


    ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <section class="contain background-m">
      <img style="width:100%;margin:0px auto;margin-top: 5%;" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/logo-klimFortigrow.png" alt="Klim fortigrow">
      <img style="width:100%;margin-top: 5%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/dummie.png" alt="Klim fortigrow">
      <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/desarrollo-cognitivo.png" alt="">
      <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/producto/producto/114669/"><img style="width: 62%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/compra-onlie.png" alt=""></a>
      <img style="width: 35%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/entrega-1-hora.png" alt="">
      <div class="col-md-12 ">
        <div class="content">
          <p>KLIM®FORTIGROW® es un alimento lácteo con adición de vitaminas y minerales para ayudar a cubrir las necesidades nutricionales en la
             etapa de crecimiento y ayudar a preparar a los niños para el colegio.</p>
          <p>El ingrediente principal de KLIM® FORTIGROW® es leche fresca pero su aporte nutricional se diferencia de ésta, porque se adicionan 13 vitaminas y 3 minerales.</p>
          <p>Los nutrientes adicionados son vitaminas (A, D, E, K, C, B1, B2, Niacina, B6, Ácido fólico, B12, Ácido pantoténico, Biotina, y los minerales Calcio, Hierro y Zinc. </p>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
          <img style="width: 95%;margin: 0 auto;position:absolute;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/descubre-lo-que-te-trae.png" alt="">
          <iframe width="100%" height="315" style="margin-top: 26%;" src="https://www.youtube.com/embed/L5tiFbiA3iU?showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
          <img style="width: 95%;margin: 0 auto;position:absolute;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/lo-que-haces-por-tus-hijos.png" alt="">
          <iframe width="100%" height="315" style="margin-top: 26%;" src="https://www.youtube.com/embed/jEmsNmI2weE?showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>            <div class="space"></div>
      </div>

    </section>
    <!--Version movil-->


    <!--Versión escritorio-->
<?php else: ?>
    <div class="container background">
        <div class="row">
          <div class="col-xs-5 col-sm-5 col-md-5">
            <img style="margin: 50px auto;" class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/logo-klimFortigrow.png" alt="Klim fortigrow">
          </div>
          <div class="col-xs-7 col-sm-7 col-md-7">
            <img style="width:100%;margin: 128px 0 35px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/dummie.png" alt="Klim fortigrow">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-7 col-sm-7 col-md-7">
            <img style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/desarrollo-cognitivo.png" alt="">
          </div>
          <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="row">
              <center>
                <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/producto/producto/114669/"><img style="width: 62%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/compra-onlie.png" alt=""></a>
              </center>
            </div>
            <div class="row">
              <center>
                <img style="width: 35%;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/entrega-1-hora.png" alt="">
              </center>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12 ">
          <div class="content">
            <p>KLIM®FORTIGROW® es un alimento lácteo con adición de vitaminas y minerales para ayudar a cubrir las necesidades nutricionales en la
               etapa de crecimiento y ayudar a preparar a los niños para el colegio.</p>
            <p>El ingrediente principal de KLIM® FORTIGROW® es leche fresca pero su aporte nutricional se diferencia de ésta, porque se adicionan 13 vitaminas y 3 minerales.</p>
            <p>Los nutrientes adicionados son vitaminas (A, D, E, K, C, B1, B2, Niacina, B6, Ácido fólico, B12, Ácido pantoténico, Biotina, y los minerales Calcio, Hierro y Zinc. </p>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
              <img style="width: 95%;margin: 0 auto;position:absolute;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/descubre-lo-que-te-trae.png" alt="">
              <iframe width="100%" height="315" style="margin-top: 26%;" src="https://www.youtube.com/embed/L5tiFbiA3iU?showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <img style="width: 95%;margin: 0 auto;position:absolute;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/klim-fortigrow/lo-que-haces-por-tus-hijos.png" alt="">
              <iframe width="100%" height="315" style="margin-top: 26%;" src="https://www.youtube.com/embed/jEmsNmI2weE?showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>            <div class="space"></div>
          </div>
        </div>
    </div>
    <!--Fin versión escritorio-->
<?php endif; ?>
