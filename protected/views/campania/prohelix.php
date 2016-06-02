<?php
/* $this->metaTags = "<meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=''>
  <meta name='author' content=''>"; */
?>

<?php $this->pageTitle = "Prohelix - La Rebaja Virtual"; ?>

<?php if ($this->isMobile): ?>
    <style>
       .title {font-size: 15pt;display: inline-block;color:#054220;font-weight: bolder;margin-top: 0px;margin-bottom: 0px;position: absolute;}
       .texto{color: #054220;margin: 0px 19px 0px 32px;text-align:justify;}
       .btn-blank {background-color: initial;border-top:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #ccc;padding: 5px 50px;color: #E90000;font-family: NewJune-Bold;}
       .registro {color: #054220;font-size:12px;margin-left: 35px;}
        .col {width: 100%;margin-top:15px;}
        blockquote {padding:10px 0 10px !important;font-size:14px;background-color: rgba(128, 128, 128, 0.04);margin:0px;border-left: 5px solid #eee;margin-top: 25px;}

    </style>


  <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/banner-movil.jpg" alt="Prohelix">
  <!--<center><img width="150" style="margin-top:-5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/sello-prohelix.png" alt="Prohelix"></center>-->
   
     <center><a href="#" data-role="button" data-inline="true"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/btn-compra.png" width="250" alt=""></a></center>
     <center><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/domicilio.png" width="180" alt=""></center>
   
   <div class="ui-content c_form_rgs ui-body-c">
       <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Fórmula</p></div>
       <p class="texto">Cada 100 ml contiene: Extracto de Hiedra 4.8:1 <br> (Hedera Helix L) 0,72 g. Excipientes c.s.</p>
       
       <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Indicaciones</p></div>
        <p class="texto">Tratamiento sintomático de la tos.<br> Expectorante natural y tos seca. <br> Es un medicamento, no exceder su consumo, si los síntomas persisten, consultar al médico.
</p>
           
       <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Posolog&iacute;a y forma de administrar</p></div>
                <p class="texto">Adultos: tomar una cucharada tres veces al día <br> o la que el médico señale. Niños: la mitad de la dosis.</p>
                <p class="texto">Estas dosis pueden ser modificadas según criterio médico. <br>  Agitar siempre bien el frasco antes de usar.</p>
               
       <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Contraindicaciones</p></div>
       <p class="texto">hipersensibilidad a los componentes. Embarazo y lactancia.</p>
       
       <div>
           <video  style="width:100%;margin-top: 20px;" controls style="margin-top: 20px;">
             <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/comercial.mp4" type="video/mp4">
            Your browser does not support the video tag.
         </video>  
       </div>
       
      <blockquote>
         <p class="registro">REGISTRO SANITARIO No. INVIMA PFM 2010-0001569</p>
         <p class="texto">Laboratorio <strong>Impharma</strong> empresa nacional que garantiza  los más altos estándares de calidad Internacional.</p>
         <img style="margin-left: 32px;" width="195" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/logo-impharma.png" alt="Logo Impharma">
       </blockquote> 
   </div>

<?php else: ?>
<div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/banner.jpg" class="img-responsive">
        </div>
    

    <div class="container" style="margin-top:40px;">
        <div class="row">
            <div class="col-md-12">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Fórmula</p>
                <p class="texto">Cada 100 ml contiene: Extracto de Hiedra 4.8:1 <br> (Hedera Helix L) 0,72 g. Excipientes c.s.
                <img width="250" style="float: right;margin-top: -94px;margin-right: 7%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/sello-prohelix.png" alt="Prohelix">
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Indicaciones</p>
                <p class="texto">Tratamiento sintomático de la tos.<br> Expectorante natural y tos seca. <br> Es un medicamento, no exceder su consumo, <br> si los síntomas persisten, consultar al médico.
</p>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-link btn-lg"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/btn-compra.png" width="300" alt="Comprar prohelix"></button>
                
            </div>
            	
        </div>
        <div class="row">
            <div class="col-md-8">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Posolog&iacute;a y forma de administrar</p>
                <p class="texto">Adultos: tomar una cucharada tres veces al día <br> o la que el médico señale. Niños: la mitad de la dosis.</p>
                <p class="texto">Estas dosis pueden ser modificadas según criterio médico. <br>  Agitar siempre bien el frasco antes de usar.</p>
            </div>
            <div class="col-md-4">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/domicilio.png" width="300" alt="Entrega en 1 hora prohelix">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Contraindicaciones</p>
                <p class="texto">hipersensibilidad a los componentes. Embarazo y lactancia.</p>
                <blockquote>
                    <p class="registro">REGISTRO SANITARIO No. INVIMA PFM 2010-0001569</p>
                    <p class="texto">Laboratorio <strong>Impharma</strong> empresa nacional que garantiza  los más altos estándares de calidad Internacional.</p>
                    <img style="margin-left: 32px;" width="195" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/logo-impharma.png" alt="Logo Impharma">
                 </blockquote>
            </div>
            <div class="col-md-6">
                
                <video width="430" height="320" controls style="float: right;">
                    <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/comercial.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
            </div>
        </div>


       <!-- <div class="row">           
            <div class="col-md-6">
                <p>
                    <button type="button" class="btn btn-blank btn-lg">Más información <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-filtro.png" alt=""></button>
                    <button type="button" class="btn btn-blank btn-lg">Investigación <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-filtro.png" alt=""></button>
                </p>
            </div>
        </div>	-->		


    </div>

    <?php
    $this->metaTags = "<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
	<title>Prohelix - La rebaja virtual</title>
	<!-- styles -->
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	
	<style>
		@font-face {
		    font-family: NewJune-Bold;
		    src: url(".Yii::app()->request->baseUrl."/images/contenido/prohelix/Fonts/NewJune-Bold.otf);
		}
		@font-face {
		    font-family: NewJune-Regular;
		    src: url(".Yii::app()->request->baseUrl."/images/contenido/prohelix/Fonts/NewJune-Regular.otf);
		}
		.title {font-size: 15pt;display: inline-block;color:#054220;font-weight: bolder;font-family: NewJune-Bold !important;margin: 0 !important;}
		.texto{color: #054220;margin-left: 32px;font-family: NewJune-Regular;}
		.btn-blank {background-color: initial;border-top:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #ccc;padding: 5px 50px;color: #E90000;font-family: NewJune-Bold;}
		.registro {font-family: NewJune-Regular;color: #054220;margin-left:32px;}  
                blockquote {padding:10px 0 10px !important;font-size:14px;background-color: rgba(128, 128, 128, 0.04);margin-top: 39px;}
	</style>";
    endif;
?>