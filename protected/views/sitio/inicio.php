<!--
<h1 class="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio1.jpg" style="width:90%; margin:auto;"></h1>
-->

<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio1.jpg" alt=""></a></div>
    <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio2.jpg" alt=""></a></div>
    <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio3.jpg" alt=""></a></div>
</div>

<ul data-role="listview" data-inset="true" class="c_list_inicio">
    <li class="c_listini_first">
        <a href="<?php echo CController::createUrl('/sitio/categorias') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_categorias.png">
            <h2>Categorías de producos</h2>
            <p>Conozca nuestra oferta completa.</p>
        </a>
    </li>
    <li>
        <a href="#" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_descuentos.png">
            <h2>Descuentos</h2>
            <p>Aproveche nuestras ofertas.</p>
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
        <a href="#" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_puntos.png ">
            <h2>Puntos de venta</h2>
            <p>Más de 1000 puntos a nivel nacional.</p>
        </a>
    </li>
</ul>