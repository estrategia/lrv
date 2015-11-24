<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta charset="utf-8" />

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon_16.ico" type="image/x-icon" /> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>";</script>
        <link id="bs-css" href="<?php echo Yii::app()->request->baseUrl; ?>/libs/charisma/css/bootstrap-simplex.min.css" rel="stylesheet" />

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php //Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
        
        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.carousel.css");?>
        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.theme.css")?>
        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/operator.css"); ?>
    </head>

    <body>
        <div role="navigation" class="navbar navbar-default">
            <div class="navbar-inner">
                <button class="navbar-toggle pull-left animated flip" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand"> 
                    <img class="hidden-xs" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_lrv.png" alt="La Rebaja Virtual Logo" />
                </a>

                <div class="btn-group pull-right">
                    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"><?php echo Yii::app()->controller->module->user->shortName ?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><?php echo CHtml::link('Salir', $this->createUrl('/callcenter/usuario/salir')) ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="container" class="ch-container">

            <div id="div-menu-callcenter" class="col-sm-2 col-lg-2">
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked">
                        </div>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <?php if (in_array(Yii::app()->controller->module->user->profile, array(1,2))): ?>
                                <li class="nav-header">CALLCENTER</li>
                                <li class="">
                                    <a href="<?php echo $this->createUrl('/callcenter') ?>" class="ajax-link"><i class="glyphicon glyphicon-home"></i><span> Panel de control</span></a>
                                </li>
                                <li class="">
                                    <a href="<?php echo $this->createUrl('/callcenter/admin/pedidos') ?>" class="ajax-link" target="_blank"><i class="glyphicon glyphicon-list-alt"></i><span> Pedidos</span></a>
                                </li>
                                <li class="">
                                    <a href="<?php echo $this->createUrl('/callcenter/admin/recordarclave') ?>" class="ajax-link"><i class="glyphicon glyphicon-lock"></i><span> Administrar claves</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/callcenter/admin/remisionborrar') ?>" class="ajax-link"><i class="glyphicon glyphicon-retweet"></i><span> Borrar remisión</span></a>
                                </li>
                                <li>
                                    <a href="#" class="ajax-link"><i class="glyphicon glyphicon-briefcase"></i><span> Venta nacional</span></a>
                                </li>
                                <li>
                                    <a href="#" class="ajax-link"><i class="glyphicon glyphicon-file"></i><span> Cotizaciones</span></a>
                                </li>
                            <?php endif; ?>
                            <?php if (Yii::app()->controller->module->user->profile == 2): ?>
                                <li class="nav-header hidden-md">Admin</li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/callcenter/operador') ?>" class="ajax-link"><i class="glyphicon glyphicon-user"></i><span> Operadores</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/callcenter/categoria') ?>" class="ajax-link"><i class="glyphicon glyphicon-glass"></i><span> Categorías</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/callcenter/pedido/exportar') ?>" class="ajax-link"><i class="glyphicon glyphicon-download-alt"></i><span> Pedidos</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/callcenter/contenido/index') ?>" class="ajax-link"><i class="glyphicon glyphicon-file"></i><span> Contenidos administrables</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/callcenter/productosRelacionados/index') ?>" class="ajax-link"><i class="glyphicon glyphicon-file"></i><span> Productos relacionados</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('/callcenter/tarifadomicilio/index') ?>" class="ajax-link"><i class="glyphicon glyphicon-file"></i><span> Tarifa domicilio</span></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="content" class="col-lg-10 col-sm-10" style="display: block;">
                <!--
                <div>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                    </ul>
                </div>
                -->

                <?php echo $content ?>
            </div>
        </div>

        
    </body>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/libs/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/operator.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modulos-jj.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modulos-om.js"></script>
</html>
