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

        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/main-desktop.css"); ?>
    </head>

    <body>
        <div id="main-page" >
            <div class="container-fluid">
                <header>
                    <div class="row">
                        <!--logo-->
                        <div class="col-md-2">
                            <a class="navbar-brand logo-top"  title="Drogueria - La Rebaja Virtual" alt="logo - La Rebaja" href="<?php echo Yii::app()->baseUrl ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logotop.png" alt="La rebaja virtual"></a>
                        </div>

                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="top_ubicacion">
                                        <?php if (isset($this->sectorName)): ?>
                                            <?php echo $this->sectorName ?>
                                        <?php endif; ?>
                                        <?php echo CHtml::link('<span class="text-center title-desp"><br><span class="glyphicon glyphicon-map-marker" style="margin-right: 5px;"></span> Cambiar Ubicaci&oacute;n </span>', CController::createUrl('/sitio/ubicacion'), array()); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form method="get" action="<?php echo CController::createUrl('/catalogo/buscar') ?>">
                                        <div class="row">
                                            <div class="col-md-6 content-search">
                                                <input type="text" class="form-control" placeholder="Escriba el nombre del producto"  autocomplete="off" value="" id="busqueda" name="busqueda" > 
                                            </div>
                                            <div class="col-md-6 content-category">
                                                <div class="controls">
                                                    <span class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-label-placement>
                                                        Todas las categor&iacute;as</span>
                                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-filtro-categorias.png"></i></a>
                                                    <ul class="dropdown-menu todas-categorias" aria-labelledby="categorias">
                                                        <?php foreach ($this->categorias as $categoria): ?>
                                                            <li>
                                                                <input type="checkbox" name="categoriasBuscador[<?php echo $categoria->idCategoriaTienda ?>]" id="categoriasBuscador_<?php echo $categoria->idCategoriaTienda ?>" value="<?php echo $categoria->idCategoriaTienda ?>">
                                                                <label for="categoriasBuscador_<?php echo $categoria->idCategoriaTienda ?>" class="clst_check"><span></span> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/menu/desktop/<?php echo $categoria->rutaImagen ?>" alt="" class="data-label"><?php echo $categoria->nombreCategoriaTienda ?></label>
                                                            </li>
                                                        <?php endforeach; ?>     
                                                    </ul>
                                                    <a href="#" id="btn-buscador-productos"><img class="ico-buscar" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-buscar.png" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">	
                                    <?php if (Yii::app()->user->isGuest): ?>
                                        <ul class="user">
                                            <li><a href="<?= Yii::app()->request->baseUrl; ?>/usuario/autenticar/opcion/inicio" ><img class="ico-user" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-iniciar-sesion.png" alt=""> Iniciar Sesión</a></li>
                                            <span style="color:#A3A3A3;">|</span>
                                            <li><a href="<?= Yii::app()->request->baseUrl; ?>/usuario/autenticar/opcion/registro">Registrate</a></li>
                                        </ul>
                                    <?php else: ?>
                                        <ul class="user login_in">
                                            <li>
                                                <a href="<?= Yii::app()->request->baseUrl; ?>/usuario/" class="">Hola <?php echo Yii::app()->user->shortName; ?> (Mi cuenta)</a> 
                                                <br>
                                                <a href="<?= Yii::app()->request->baseUrl; ?>/usuario/salir" class=""><span class="glyphicon glyphicon-log-out"></span> Cerrar sesi&oacute;n</a> 
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                    <div class="info-compra" style="margin-right:0;">
                                        <div data-role="panel" id="div-carro-canasta">
                                            <?php $this->renderPartial('/carro/d_canasta'); ?>
                                        </div>
                                    </div>
                                    <div class="info-compra">
                                        <a href="#" data-role='compararProductos' data-opcion='comparar'>
                                            <span><img class="ico-carrito" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/star-on.png" alt="Comparar productos" title="Comparar productos"></span>
                                        </a>
                                        <span id="cantidad-productos-comparar" class="cantidad-productos">
                                            <?php echo (isset(Yii::app()->session[Yii::app()->params->sesion['productosComparar']])) ? count(Yii::app()->session[Yii::app()->params->sesion['productosComparar']]) : 0 ?>
                                        </span>
                                        <p style="color: #A3A3A3;">Productos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <!--menu-->
            <nav class="main_menu">
                <ul class="nav nav-justified" role="tablist">
                    <li class="dropdown categorias" role="presentation" style="position:inherit;">
                        <a id="categorias" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorías<span class="ico-cat"></span></a>
                        <ul class="dropdown-menu category" aria-labelledby="categorias">
                            <?php foreach ($this->categorias as $categoria): ?>
                                <li class="cuidado-personal"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/menu/desktop/<?php echo $categoria->rutaImagen ?>" alt=""><?php echo $categoria->nombreCategoriaTienda ?></a>
                                    <?php if ($categoria->listCategoriasHijas): ?>
                                        <div class="right-nav">
                                            <ul class="submenu">
                                                <div class="sub_float">
                                                <?php $cpunte=0; foreach ($categoria->listCategoriasHijas as $subcategoria): $cpunte++; /*echo $cpunte;*/ ?>
                                                    <div class="section-submenu">
                                                        <?php if (count($subcategoria->listModulosConfigurados) > 0): ?>
                                                            <li class='title-submenu'><?php echo CHtml::link("<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>".ucfirst(strtolower($subcategoria->nombreCategoriaTienda)), CController::createUrl('/catalogo/division', array('division' => $subcategoria->idCategoriaTienda))); ?></li>
                                                        <?php else: ?>
                                                            <li class='title-submenu'><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><?php echo ucfirst(strtolower($subcategoria->nombreCategoriaTienda)); ?></li>
                                                        <?php endif; ?>
                                                        <?php for ($i = 0; $i < count($subcategoria->listCategoriasHijasMenu) && $i < 5; $i++): ?>
                                                            <?php $categoriaHija = $subcategoria->listCategoriasHijasMenu[$i]; ?>
                                                            <?php if (count($subcategoria->listModulosConfigurados) > 0): ?>
                                                                <li><?php echo ucfirst(strtolower($categoriaHija->nombreCategoriaTienda)); ?></li>
                                                            <?php else: ?>
                                                                <li><?php echo CHtml::link(ucfirst(strtolower($categoriaHija->nombreCategoriaTienda)), CController::createUrl('/catalogo/categoria', array('categoria' => $categoriaHija->idCategoriaTienda))); ?></li>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <?php if (count($subcategoria->listCategoriasHijasMenu) > 5): ?>
                                                            <li class='title-viewmore_category'><?php echo CHtml::link("Ver más...", CController::createUrl('/catalogo/division', array('division' => $subcategoria->idCategoriaTienda))); ?></li>
                                                        <?php endif; ?>        
                                                    </div>
                                                <?php if ($cpunte==4 && count($categoria->listCategoriasHijas)!=4): ?>
                                                        </div>
                                                        <div class="sub_float">
                                                    <?php $cpunte=0; endif;
                                                        
                                                    endforeach; ?>
                                                </div>
                                            </ul>
                                            <?php if (!empty($categoria->rutaImagenMenu)): ?>
                                                <img class="img_categoria" src="<?php echo Yii::app()->request->baseUrl; ?>/images/menu/desktop/<?php echo $categoria->rutaImagenMenu ?>"> 
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <?php foreach (ModulosConfigurados::getModulosMenu($this->objSectorCiudad) as $objModulo): ?>
                        <li class="modulo-menu" style="background-color: <?php echo $objModulo->objMenuModulo->color; ?>;">
                            <a href="<?php echo $this->createUrl($objModulo->objMenuModulo->contenido) ?>"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['menuDesktop'] . $objModulo->objMenuModulo->rutaImagen; ?>" /> <?php echo $objModulo->descripcion ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <!--fin menu-->

            <!--inicio migas de pan-->
            <?php if (isset($this->breadcrumbs) && !(empty($this->breadcrumbs))): ?>
                <section>
                    <div class="container">
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                            'encodeLabel' => false,
                            'homeLink' => false,
                            'tagName' => 'ol',
                            'separator' => '',
                            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                            'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                            'htmlOptions' => array('class' => 'breadcrumb')
                        ));
                        ?>
                    </div>
                </section>
            <?php endif ?>
            <!--fin migas de pan-->

            <!-- <div class="container"> -->
            <?php echo $content; ?>
            <!-- </div> -->
            <!--banner footer-->
            <!--
            <section class="img-footer">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/entrega-pedido.png" alt="Entregamos tus pedidos en tan solo 1H -  o si prefieres programala la hora!">
            </section>
            -->
            <!--fin banner footer-->
            <!--footer-->
            <footer>	
                <div class="container">	
                    <div class="row">
                        <div class="col-md-12" style="padding-top:20px;">	
                            <div class="col-md-3">
                                <div class="titulo-footer">	
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/informacion-y-servicios.png" alt="">
                                    <strong style="margin-left:10px;">Información</strong><br><strong class="title-footer2"> y servicios</strong>
                                </div>
                                <ul>	
                                    <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'horario')) ?>">Horarios de atención</a></li>
                                    <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'polidescuento')) ?>">Politicas días de descuento 1,10,15 y 25</a></li>
                                    <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'pqrs')) ?>">PQRS (Pregunras, quejas, reclamos, sugerencias)</a></li>
                                    <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'politerminos')) ?>">Políticas y términos de uso</a></li>
                                    <li><a target="_blank" href="http://www.sic.gov.co/es/">SIC (Súper intendencia de industria y comercio)</a></li>
                                    <li><a target="_blank" href="http://www.credirebaja.com/">Tarjeta crediRebaja</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <div class="titulo-footer">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/cliente-fiel.png" alt="">	
                                    <strong style="margin-left:10px;">Club</strong><br><strong class="title-footer2">cliente fiel</strong>
                                </div>
                                <ul>	
                                    <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=78&Itemid=464">Informaci&oacute;n del programa</a></li>
                                    <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=78&Itemid=464&pest=2">Beneficios del programa</a></li>
                                    <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=78&Itemid=464&pest=6">Términos y condiciones</a></li>
                                    <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_users&view=login">Actualiza datos</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="titulo-footer">	
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-actividad-comercial.png" alt="">
                                    <strong style="margin-left:10px;">Actividades</strong><br><strong class="title-footer2">comerciales</strong>
                                </div>
                                <ul>	
                                    <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=featured&Itemid=444">Políticas y condiciones</a></li>
                                    <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=85&Itemid=476">Ganadores de campañas</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <div class="titulo-footer">	
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/coopervir.png" alt="">
                                    <strong>Cooperservir</strong>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="titulo-footer-last">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-contactanos.png" alt="">	
                                    <strong>Contactanos</strong>
                                </div>
                                <ul>	
                                    <li>Call center <br> 01 8000 93 99 00</li>
                                </ul>
                            </div>
                        </div>	

                        <div class="col-md-12">	
                            <br>
                            <br>
                        </div>	

                        <div class="col-md-12">	
                            <p align="center">Cooperativa Multiactiva &nbsp;de Servicios Solidarios Copservir  Ltda | NIT &nbsp;830.011.670-3 | LA REBAJA DROGUERIA | 01 8000 93 99  00 <br> Calle 13 No. 42 - 10 Bogotá, Colombia | <a href="mailto:infolrv@copservir.com">infolrv@copservir.com</a>
                                Colombia © 2015 <a href="http://www.larebajavirtual.com">www.larebajavirtual.com <br> </a><a href="/contenido/index/opcion/param/99/">PQRS (preguntas, quejas, reclamos, sugerencias)</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
