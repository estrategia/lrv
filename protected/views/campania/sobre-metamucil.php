
<?php $this->pageTitle = "Sobre Metamucil - La Rebaja Virtual"; ?>

<?php
    $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Metamucil es una fibra soluble con muchos beneficios basado en plantago Psyllium, una fuente de fibra de origen 100% natural.'>
    <meta name='keywords' content='plantago Psyllium, fibra de origen de natural, fibra multi-beneficios.'>
	<!-- styles -->
	<style>
            @font-face {
                font-family: HelveticaBold;
                src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/helvetica-bold.otf);
            }
            @font-face {
                font-family: Interstate regular;
                src: url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/fonts/interstate-regular.ttf);
            }   
            .texto {font-family:Interstate regular;font-size:20px;}
            .texto_m {font-family:Interstate regular;font-size:19px;}
            .font-title{font-family:HelveticaBold;}
            .space{margin-top:30px;}
            .pattern-background{background-image:url(".Yii::app()->request->baseUrl."/images/contenido/metamucil/pattern.png);background-size:cover;}
            .title{background-color: #AB084E;color: #fff; padding: 21px; border-radius: 15px; margin: 0% 25% 0% 25%;text-align: center;}
            .title_m {background-color: #AB084E;color: #fff; padding: 21px; border-radius: 15px; margin: 0;text-align: center;}
	</style>

    <!--Codigo google analitycs-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-80765083-1', 'auto');
      ga('send', 'pageview');
    </script>

    ";
?>

<!--Versión movil-->
<?php if ($this->isMobile): ?>
    <div class="container">
        <div class="row pattern-background">
            <div style="padding: 0px 30px;">
                <p style="margin:0;">&nbsp;</p>
                <h1 class="font-title title_m">Sobre metamucil</h1>
                <div class="space"></div>
                <h3 class="texto" style="color:#AB084E;font-size: 19px;">Hay muchos productos basados en fibra.<br> ¿Pero estos productos usan la fibra qué es multi-beneficios?</h3>
            </div> 
            <div style="padding: 0px 30px;">
                <center>
                   <img style="width: 80%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/imagen-blog1.png" class="img-responsive"> 
                </center>                 
            </div>
             <div style="padding: 0px 30px;">
                <div class="space"></div>
                <p class="texto_m" style="text-align:justify;">Hay dos tipos de fibras: las solubles y las insolubles. Todas estas fibras son extremamente saludables y deben ser consumidas regularmente. Sin embargo, solamente las fibras solubles viscosas, como las que contiene Metamucil®, le proporciona más beneficios que las demás fibras. Metamucil® es basado en Plantago psyllium, una fibra 100% de origen natural. Metamucil® le da muchos beneficios, y es por eso que llamamos Plantago psyllium una fibra ¡multi-beneficios!</p>
            </div>   
            <div style="padding: 0px 30px;">
                <h3 style="font-weight: bolder;color:#000;">Los beneficios de Metamucil<sup>®</sup>:</h3>
                <h3 class="texto" style="color:#EF8A00;font-size: 24px;">1. Ayuda a regular tu intestino</h3>
                <p class="texto_m" style="text-align:justify;">
                    Su sistema digestivo sale ganando con Plantago psyllium. Una dieta equilibrada, con el uso de Metamucil<sup>®</sup>, ayuda a reducir la sensación de hinchazón. Esto ocurre porque Metamucil<sup>®</sup> viene con la cantidad apropiada de Plantago psyllium para regular el funcionamiento de su intestino, proporcionando más comodidad para su digestión.
                </p>
                <h3 class="texto" style="color:#EF8A00;font-size: 24px;">2. Favorece tu proceso natural de limpieza</h3>
                <p class="texto_m" style="text-align:justify;">
                    Plantago psyllium es una fibra 100% de origen natural que funciona de modo distinto a otras fuentes de fibras: al ingresar en tu estómago, Plantago psyllium forma un gel que atrapa y remueve alimentos no procesados que se quedaron en su sistema digestivo. Esto es porque Plantago psyllium es una fibra viscosa.
                </p>
                <h3 class="texto" style="color:#EF8A00;font-size: 24px;">3. Te hace sentirte más ligera</h3>
                <h3 class="texto" style="color:#EF8A00;font-size: 24px;">4. Es una fuente de fibra 100% de origen natural</h3>
                <div class="space" style="height:1px;"></div>
            </div>
        </div> 
   </div>
<!--Versión movil-->   
<!--Versión escritorio-->
<?php else: ?>
    <div class="container">
        <div class="row pattern-background">
            <div class="col-md-12" style="padding: 0px 70px;">
                <h1 class="font-title title">Sobre metamucil</h1>
                <div class="space"></div>
                <h3 class="texto" style="color:#AB084E;font-size: 30px;">Hay muchos productos basados en fibra.<br> ¿Pero estos productos usan la fibra qué es multi-beneficios?</h3>
            </div>
            <div class="col-md-12" style="padding: 0px 70px;">
                <div class="space"></div>
                <div class="col-md-6">
                    <p class="texto" style="font-weight:bolder;text-align:justify;">Hay dos tipos de fibras: las solubles y las insolubles. Todas estas fibras son extremamente saludables y deben ser consumidas regularmente. Sin embargo, solamente las fibras solubles viscosas, como las que contiene Metamucil®, le proporciona más beneficios que las demás fibras. Metamucil® es basado en Plantago psyllium, una fibra 100% de origen natural. Metamucil® le da muchos beneficios, y es por eso que llamamos Plantago psyllium una fibra ¡multi-beneficios!</p>
                </div>
                <div class="col-md-6">
                    <img style="width: 300px;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/metamucil/imagen-blog1.png" class="img-responsive">
                </div>
            </div>
            <div class="col-md-12" style="padding: 0px 70px;">
                <h3 style="font-weight: bolder;">Los beneficios de Metamucil<sup>®</sup>:</h3>
                <h3 class="texto" style="color:#EF8A00;font-size: 30px;">1. Ayuda a regular tu intestino</h3>
                <p class="texto" style="font-weight:bolder;text-align:justify;">
                    Su sistema digestivo sale ganando con Plantago psyllium. Una dieta equilibrada, con el uso de Metamucil<sup>®</sup>, ayuda a reducir la sensación de hinchazón. Esto ocurre porque Metamucil<sup>®</sup> viene con la cantidad apropiada de Plantago psyllium para regular el funcionamiento de su intestino, proporcionando más comodidad para su digestión.
                </p>
                <h3 class="texto" style="color:#EF8A00;font-size: 30px;">2. Favorece tu proceso natural de limpieza</h3>
                <p class="texto" style="font-weight:bolder;text-align:justify;">
                    Plantago psyllium es una fibra 100% de origen natural que funciona de modo distinto a otras fuentes de fibras: al ingresar en tu estómago, Plantago psyllium forma un gel que atrapa y remueve alimentos no procesados que se quedaron en su sistema digestivo. Esto es porque Plantago psyllium es una fibra viscosa.
                </p>
                <h3 class="texto" style="color:#EF8A00;font-size: 30px;">3. Te hace sentirte más ligera</h3>
                <h3 class="texto" style="color:#EF8A00;font-size: 30px;">4. Es una fuente de fibra 100% de origen natural</h3>
                 <div class="space"></div>
                  <div class="space"></div>
            </div>
        </div> 
   </div>
    
 <!--Fin versión escritorio-->   
<?php endif;?>
