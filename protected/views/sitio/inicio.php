<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <?php foreach ($listModulos as $objModulo): ?>
        <?php foreach ($objModulo->listImagenesBanners as $objImagen): ?>
            <div class="item"><a href="#" ><img src="<?php echo Yii::app()->request->baseUrl . $objImagen->rutaImagen; ?>" alt="<?php echo $objImagen->nombre ?>"></a></div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>

<ul data-role="listview" data-inset="true" class="c_list_inicio">
    <li class="c_listini_first">
        <a href="<?php echo CController::createUrl('/sitio/categorias') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_categorias.png">
            <h2>Categorías de productos</h2>
            <p>Conozca nuestra oferta completa.</p>
        </a>
    </li>
    <?php if (Yii::app()->user->isGuest): ?>
        <li>
            <a href="<?php echo CController::createUrl('/usuario/autenticar') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_cuenta.png">
                <h2>Mi cuenta</h2>
                <p>Información personal.</p>
            </a>
        </li>
    <?php else: ?>
        <li>
            <a href="#panel-menu-usuario" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_cuenta.png">
                <h2>Mi cuenta</h2>
                <p>Información personal.</p>
            </a>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo CController::createUrl('/catalogo/descuentos') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_descuentos.png">
            <h2>Descuentos</h2>
            <p>Aproveche nuestras ofertas.</p>
        </a>
    </li>

    <li>
        <a href="<?php echo CController::createUrl('/catalogo/masvistos') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/masvistos.png">
            <h2>M&aacute;s vistos</h2>
            <p>M&aacute;s vistos.</p>
        </a>
    </li>

    <li>
        <a href="<?php echo CController::createUrl('/catalogo/masvendidos') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/masvendidos.png">
            <h2>M&aacute;s vendidos</h2>
            <p>M&aacute;s vendidos.</p>
        </a>
    </li>

    <!--
    <li>
        <a href="#" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_puntos.png ">
            <h2>Puntos de venta</h2>
            <p>Más de 1000 puntos a nivel nacional.</p>
        </a>
    </li>
    -->

</ul>

<?php $this->renderPartial('/contenido/modulo', array('objModulo'=>ModulosConfigurados::getModuloFlotante($this->objSectorCiudad, UbicacionModulos::UBICACION_MOVIL_INICIO))) ?>
