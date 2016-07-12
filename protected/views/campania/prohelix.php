<?php $this->pageTitle = "Prohelix - La Rebaja Virtual"; ?>


<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Jarabe para la tos a base de Hedera Helix, es un expectorante natural y ayuda al tratamiento de la tos seca. No contiene alcohol, azúcar ni colorantes'>
    <meta name='keywords' content='Hedera helix, expectorante natural, tos'>";
?>


<!--Vista móvil-->
<?php if ($this->isMobile): ?>
    <style>
        .title {font-size: 15pt;display: inline-block;color:#054220;font-weight: bolder;margin-top: 0px;margin-bottom: 0px;position: absolute;}
        .texto{color: #054220;margin: 0px 19px 0px 32px;text-align:justify;}
        .btn-blank {background-color: initial;border-top:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #ccc;padding: 5px 50px;color: #E90000;font-family: NewJune-Bold;}
        .registro {color: #054220;font-size:12px;margin-left: 35px;}
        .col {width: 100%;margin-top:15px;}
        blockquote {padding:10px 0 10px !important;font-size:14px;background-color: rgba(128, 128, 128, 0.04);margin:0px;border-left: 5px solid #eee;margin-top: 25px;}
    </style>


    <img width="100%" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/banner-movil.png" alt="Prohelix">
    <!--<center><img width="150" style="margin-top:-5px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/sello-prohelix.png" alt="Prohelix"></center>-->

    <center><a href="#" data-role="button" data-inline="true"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/btn-compra.png" width="250" alt=""></a></center>
    <center><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/domicilio.png" width="180" alt=""></center>

    <div class="ui-content c_form_rgs ui-body-c">
        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Composición</p></div>
         <p class="texto">Cada 100 ml contiene: Extracto seco de Hiedra 4.8:1 (Hedera helix L.) 0.72g. Excipientes c.s. <br>Uso terapéutico: Expectorante.</p>

        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Indicaciones</p></div>
        <p class="texto">Tratamiento sintomático de la tos.<br> Expectorante natural y tos seca.</p>

        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Posolog&iacute;a y forma de administrar</p></div>
        <p class="texto">Adultos: Tomar una (1) cucharada tres (3) veces al día o la que el médico señale. <br> Niños de 3 a 6 años: la mitad de la dosis.<br>
                    Estas dosis pueden ser modificadas según criterio médico <br>
                    Vía de administración: Oral. <br>
                    VENTA LIBRE<br>
                    Agitar siempre bien el frasco antes de usar.</p></p>

        <div class="col"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Contraindicaciones y advertencias​</p></div>
        <p class="texto">hipersensibilidad a los componentes. Embarazo y lactancia.</p>

        <div>
            <video  style="width:100%;margin-top: 20px;" controls style="margin-top: 20px;">
                <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/comercial.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>  
        </div>

        <blockquote>
            <p class="registro">REGISTRO SANITARIO No. INVIMA PFM 2010-0001569</p>
            <p class="texto"> Este producto es un Fitoterapeutico. Si los síntomas persisten consulte a su medico. No consumir dosis superiores a las indicadas. Manténgase fuera del alcance de los niños.  </p>
            <p class="texto">Laboratorio <strong>Impharma</strong> empresa nacional que garantiza  los más altos estándares de calidad Internacional.</p>
            <img style="margin-left: 32px;margin-top: 10px;" width="195" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/logo-impharma.png" alt="Logo Impharma">
        </blockquote> 
    </div>

<!--Vista desktop-->
<?php else: ?>
    <style>
        @font-face {
            font-family: NewJune-Bold;

            src: url("<?= Yii::app()->request->baseUrl?>/images/contenido/prohelix/Fonts/NewJune-Bold.otf");
        }
        @font-face {
            font-family: NewJune-Regular;
            src: url("<?= Yii::app()->request->baseUrl?>/images/contenido/prohelix/Fonts/NewJune-Regular.otf");           
        }
        .title {font-size: 15pt;display: inline-block;color:#054220;font-weight: bolder;font-family: NewJune-Bold !important;margin: 0 !important;}
        .texto{color: #054220;margin-left: 32px;font-family: NewJune-Regular;}
        .btn-blank {background-color: initial;border-top:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #ccc;padding: 5px 50px;color: #E90000;font-family: NewJune-Bold;}
        .registro {font-family: NewJune-Regular;color: #054220;margin-left:32px;}  
        blockquote {padding:10px 0 10px !important;font-size:14px;background-color: rgba(128, 128, 128, 0.04);margin-top: 39px;}
    </style>

    <div class="container">
        <div class="row">
            <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/banner.png" class="img-responsive">
        </div>
    </div>


    <div class="container" style="margin-top:40px;">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Composición</p>
                    <p class="texto">Cada 100 ml contiene: Extracto seco de <br>Hiedra 4.8:1 (Hedera helix L.) 0.72g. <br> Excipientes c.s. <br> Uso terapéutico: Expectorante.
                        <img width="250" style="float: right;margin-top: -164px;margin-right: 7%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/sello-prohelix.png" alt="Prohelix">
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Indicaciones</p>
                    <p class="texto">Tratamiento sintomático de la tos.<br> Expectorante natural y tos seca. 
                    </p>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-link btn-lg"><img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/btn-compra.png" width="300" alt="Comprar prohelix"></button>

                </div>

            </div>
            <div class="row">
                <div class="col-md-8">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Posolog&iacute;a y forma de administrar</p>
                    <p class="texto">Adultos: Tomar una (1) cucharada tres (3) veces al día o <br> la que el médico señale.Niños de 3 a 6 años: la mitad de la dosis.<br>
                    Estas dosis pueden ser modificadas según criterio médico <br>
                    Vía de administración: Oral. <br>
                    VENTA LIBRE<br>
                    Agitar siempre bien el frasco antes de usar.</p>
                </div>
                <div class="col-md-4">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/domicilio.png" width="300" alt="Entrega en 1 hora prohelix">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/prohelix/ico-natural.png" alt=""><p class="title">Contraindicaciones y advertencias​:</p>
                    <p class="texto">
                        Hipersensibilidad a los componentes. Embarazo y lactancia.<br>
                    </p>
                    <blockquote>
                        <p class="registro">REGISTRO SANITARIO No. INVIMA PFM 2010-0001569</p>
                        <p class="texto"> Este producto es un Fitoterapeutico. Si los síntomas persisten consulte a su medico. No consumir dosis superiores a las indicadas. Manténgase fuera del alcance de los niños.  </p>
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


        </div>
    </div>
<?php endif; ?>
