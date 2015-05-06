<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta content="es" http-equiv="content-language">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>";</script>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon_16.ico" type="image/x-icon" />  
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div data-role="page" id="main-page" data-theme="c">
            <div data-role="header" data-theme="h">
                <div class="logo ui-content">                    
                    <!-- OPCIONES PARA EL HEADER -->
                    <?php if ($this->showHeaderIcons): ?>
                        <div class="c_icon c_icon_menu"><a href="#panel-menu-ppal"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/menu_icon.png"></a></div>
                        <div class="c_icon c_icon_car"><a href="#panel-carro-canasta"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_cart.png"></a></div>
                        <?php if (Yii::app()->user->isGuest): ?>
                            <div class="c_icon c_icon_user"><a href="<?php echo CController::createUrl('/usuario/autenticar') ?>" data-ajax="false" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_user.png"></a></div>
                        <?php else: ?>
                            <div class="c_icon c_icon_user"><a href="#panel-menu-usuario"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_user.png"></a></div>
                        <?php endif; ?>
                            <div class="c_icon c_icon_ub"><a href="#" onclick="verUbicacion();"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_ub.png"></a></div>                            
                    <?php endif; ?>  
                    <a href="<?php echo $this->createUrl('/') ?>" class="<?php if ($this->showHeaderIcons): echo 'logo-main'; else: echo 'logo-home'; endif; ?>" data-ajax="false"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logotop.png" alt="logo - La Rebaja" title="<?php echo CHtml::encode(Yii::app()->name) ?>"></a>                 
                </div>

                <?php if ($this->showHeaderIcons): ?>
                <div id="ubicacion-info" class=" hide" data-active="0">                            
                    <a href="<?php echo CController::createUrl('/sitio/ubicacion') ?>" data-ajax="false" class="title_h">
                        <?php echo $this->sectorName ?>
                    </a>
                </div>
                <?php endif; ?>  
                <?php if ($this->showSeeker): ?>
                    <div class="ui-content search-bar">
                        <form method="get" action="<?php echo CController::createUrl('/catalogo/buscar') ?>" data-ajax="false">
                            <div class="ui-field-contain c_src_page">
                                <input type="text" name="busqueda" data-inline="true" id="busqueda" placeholder="¿Qué estás buscando?" />
                                <input type="submit" data-inline="true" value="Buscar" required>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Fin header -->

            <div data-role="main" id="main-content">
		<a href="#" class="scroll-top">Ir Arriba</a>
                <?php echo $content; ?>
            </div>
            <!-- Fin main content -->

            <div data-role="panel" id="panel-menu-ppal" data-display="overlay" data-position="right" data-position-fixed="false">
                <?php $this->renderPartial('/sitio/menu'); ?>
            </div>
            
            <div data-role="panel" id="panel-carro-canasta" data-display="overlay" data-position="right" data-position-fixed="false">
                <?php $this->renderPartial('/carro/canasta'); ?>
            </div>

            <?php if (!Yii::app()->user->isGuest): ?>
                <div data-role="panel" id="panel-menu-usuario" data-display="overlay" data-position="right" data-position-fixed="false" class="no-padding">
                    <?php $this->renderPartial('/usuario/menu'); ?>
                </div>
            <?php endif; ?>

            <?php foreach ($this->extraContentList as $content): ?>
                <?php echo $content; ?>
            <?php endforeach; ?>

            <div data-role="footer" data-theme="f" <?php echo ($this->fixedFooter ? 'data-position="fixed" data-visible-on-page-show="false" data-tap-toggle="false"' : "")?> >
                <div class="f_redes_sociales ui-content">
                    <a href="#" class="ui-btn ui-btn-inline ui-icon-tw ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon">Twitter</a>
                    <a href="#" class="ui-btn ui-btn-inline ui-icon-yt ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon">YouTube</a>
                    <a href="#" class="ui-btn ui-btn-inline ui-icon-fb ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon">Facebook</a>

                    <div class="cont_call">                        
                        <p><strong>Call Center</strong> 01 8000 939 900<br><span>&copy; 2015 Copservir Ltda | Colombia</span></p>
                    </div>
                </div>
               <!-- <div class="f_copy">
                    <div class="copyright">
                        <p></p>
                    </div>
                </div>-->
                <div class="f_sic ui-content">
                    <p> SIC - Superintendencia de Industria y Comercio </p>
                </div>
                <div class="barraf"></div>

            </div>
            <!-- Fin footer -->
        </div>
        <!-- Fin page -->
        <?php foreach ($this->extraPageList as $page): ?>
            <?php echo $page; ?>
        <?php endforeach; ?>
    </body>
</html>