<?php /* @var $this Controller */ ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta content="es" http-equiv="content-language">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>";
            gmapKey = "<?php echo Yii::app()->params['google']['llaveMapa']; ?>";</script>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon_16.ico" type="image/x-icon" />  
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/vendedor.css"); ?>
    </head>

    <body>
        <div data-role="page" id="main-page" data-theme="c">
            <div data-role="header" data-theme="h">
                <div class="logo ui-content">                    
                    <!-- OPCIONES PARA EL HEADER -->
                    <?php if ($this->showHeaderIcons): ?>
                        <div class="c_icon c_icon_menu"><a href="#panel-menu-ppal"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/menu_icon.png"></a></div>
                        <div class="c_icon c_icon_car"><a href="#panel-carro-canasta"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_cart.png"></a></div>
                        <?php if (Yii::app()->controller->module->user->isGuest): ?>
                            <div class="c_icon c_icon_user"><a href="<?php echo CController::createUrl('usuario/autenticar') ?>" data-ajax="false" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_user.png"></a></div>
                        <?php else: ?>
                            <div class="c_icon c_icon_user"><a href="#panel-menu-usuario"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_user.png"></a></div>
                        <?php endif; ?>
                        <div class="c_icon c_icon_ub"><a href="#" onclick="verUbicacionVendedor();"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_ub.png"></a></div>                            
                    <?php endif; ?>  
                    <a href="<?php echo ($this->showHeaderIcons ? $this->createUrl('/sitio/inicio') : $this->createUrl('/')) ?>" class="<?php echo ($this->showHeaderIcons ? "logo-main" : "logo-home") ?>" data-ajax="false"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logotop.png" alt="logo - La Rebaja" title="<?php echo CHtml::encode(Yii::app()->name) ?>"></a>                 
                </div>

                <?php if ($this->showHeaderIcons): ?>
                    <div id="ubicacion-info" class=" hide" data-active="0"> 
                        <a href="#" data-role="cambioubicacionvendedor" class="title_h">
                            <?php echo $this->sectorName ?>
                        </a>
                    </div>
                <?php endif; ?>  
                <?php if ($this->showSeeker): ?>
                    <div class="ui-content search-bar">
                        <form method="get" action="<?php echo CController::createUrl('catalogo/buscar') ?>" data-ajax="false">
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

                <div data-role="popup" id="popup-cambioubicacion" data-dismissible="false" data-theme="a" data-position-to="window" class="c_lst_pop_cont">
                    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                    <div data-role="main">
                        <div data-role="content">
                            <h2>Tienes productos en el carrito, al cambiar la ubicación se borrarán.</h2>
                            <?php echo CHtml::link('Seleccionar ubicación', $this->createUrl('sitio/ubicacion'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
                            <?php echo CHtml::link('Cerrar', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-mini' => 'true', 'data-rel' => 'back')); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Fin main content -->
           
                <div data-role="panel" id="panel-menu-ppal" data-display="overlay" data-position="right" data-position-fixed="false">
                    <?php $this->renderPartial('/sitio/menu'); ?>
                </div>
           
             
            <div data-role="panel" id="panel-carro-canasta" data-display="overlay" data-position="right" data-position-fixed="false">
                <?php $this->renderPartial('/carro/canasta'); ?>
            </div>
         
            
                <div data-role="panel" id="panel-menu-usuario" data-display="overlay" data-position="right" data-position-fixed="false" class="no-padding">
                    <?php $this->renderPartial('/usuario/menu'); ?>
                </div>

            <?php foreach ($this->extraContentList as $content): ?>
                <?php echo $content; ?>
            <?php endforeach; ?>

            <div data-role="footer" data-theme="f" <?php echo ($this->fixedFooter ? 'data-position="fixed" data-visible-on-page-show="false" data-tap-toggle="false"' : "") ?> >
                <?php echo $this->renderPartial("//layouts/footer"); ?>
            </div>
            <!-- Fin footer -->
        </div>
        <!-- Fin page -->
        <?php foreach ($this->extraPageList as $page): ?>
            <?php echo $page; ?>
        <?php endforeach; ?>
    </body>
</html>