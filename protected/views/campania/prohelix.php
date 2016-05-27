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
        .registro {color: #054220;font-size:12px;}        
        .custom_listview_img {
            margin:0px; 
            padding:0px;
            background-image:url('<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/banner-movil.jpg');
            background-repeat:no-repeat;
            background-size:100%;
            height:200px;
        }
        .col {width: 100%;margin-top:15px;}
    </style>

    <div class="custom_listview_img"></div>
    <center>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => '91937', 'descripcion' => 'PROHELIX.html')) ?>" data-role="button" data-inline="true" data-ajax="false">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/btn-compra.png" width="250" alt="">
        </a>
    </center>
    <center><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/domicilio.png" width="180" alt=""></center>

    <div class="ui-content c_form_rgs ui-body-c">
        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Fórmula</p></div>
        <p class="texto">Cada 100 ml de solución contiene Extracto <br>seco de Hedera Helix 4.8.1 en etanol <br>al 96% 0.729009 g</p>
        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Indicaciones</p></div>
        <p class="texto">Tratamiento sintomático de la tos.<br> Expectorante natural y tos seca.</p>
        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Posolog&iacute;a y forma de administrar</p></div>
        <p class="texto">Se administra vía oral. Niños de 2 a 6 años, 2,5 ml (medidos con el vasito adjunto), 2 veces por día y niños mayores de 12 años y adultos,5 hm, 3 veces por día. Estas dosis pueden ser modificadas según criterio médico. Agitar siempre bien el frasco antes de usar.</p>
        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Contraindicaciones</p></div>
        <p class="texto">Reacciones de hipersensibilidad</p>
        <p class="registro">REGISTRO SANITARIO No. INVIMA PFM 2010-0001569</p>
    </div>

<?php else: ?>
    <style>
        @font-face {
            font-family: NewJune-Bold;
            src: url("<?php echo Yii::app()->request->baseUrl?>/images/contenido/prohelix/Fonts/NewJune-Bold.otf");
        }
        @font-face {
            font-family: NewJune-Regular;
            src: url("<?php echo Yii::app()->request->baseUrl?>/images/contenido/prohelix/Fonts/NewJune-Regular.otf");
        }
        .title {font-size: 15pt;display: inline-block;color:#054220;font-weight: bolder;font-family: NewJune-Bold !important;}
        .texto{color: #054220;margin-left: 32px;font-family: NewJune-Regular;}
        .btn-blank {background-color: initial;border-top:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #ccc;padding: 5px 50px;color: #E90000;font-family: NewJune-Bold;}
        .registro {font-family: NewJune-Regular;color: #054220;}
    </style>
    <div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/banner.jpg" class="img-responsive">
        </div>
    </div>

    <div class="container" style="margin-top:40px;">
        <div class="row">
            <div class="col-md-12">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Fórmula</p>
                <p class="texto">Cada 100 ml de solución contiene Extracto <br>
                    seco de Hedera Helix 4.8.1 en etanol <br>
                    al 96% 0.729009 g</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Indicaciones</p>
                <p class="texto">Tratamiento sintomático de la tos.<br> Expectorante natural y tos seca.</p>
            </div>	
            <div class="col-md-4">
                <a class="btn btn-link btn-lg" href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => '91937', 'descripcion' => 'PROHELIX.html')) ?>">
                    <img width="300" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/btn-compra.png" alt="">
                </a>
            </div>	
        </div>
        <div class="row">
            <div class="col-md-8">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Posologia y forma de administrar</p>
                <p class="texto">Se administra vía oral. Niños de 2 a 6 años, <br>
                    2,5 ml (medidos con el vasito adjunto), 2 veces<br>
                    por dia y niños mayores de 12 años y adultos, <br>
                    5 hm, 3 veces por día. Estas dosis pueden ser <br>
                    modificadas según criterio médico. <br>
                    Agitar siempre bien el frasco antes de usar.</p>
            </div>
            <div class="col-md-4">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/domicilio.png" width="300" style="margin-top: 35px;" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Contraindicaciones</p>
                <p class="texto">Reacciones de hipersensibilidad</p>
            </div>
        </div>	
        <div class="row">
            <div class="col-md-5">
                <p class="registro">REGISTRO SANITARIO No. INVIMA PFM 2010-0001569</p>
            </div>
            <!--
            <div class="col-md-6">
                <p>
                    <button type="button" class="btn btn-blank btn-lg">Más información <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-filtro.png" alt=""></button>
                    <button type="button" class="btn btn-blank btn-lg">Investigación <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-filtro.png" alt=""></button>
                </p>
            </div>
            -->
        </div>
    </div>
<?php endif; ?>