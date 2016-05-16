<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <?php foreach ($listModulos as $objModulo): ?>
        <?php foreach ($objModulo->listImagenesBanners as $objImagen): ?>
            <div class="item"><a href="#" ><img src="<?php echo Yii::app()->request->baseUrl . $objImagen->rutaImagen; ?>" alt="<?php echo $objImagen->nombre ?>"></a></div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>

<ul data-role="listview" data-inset="true" class="c_list_inicio">
    <?php $cantPromo = 0; ?>
    <?php foreach ($listaPromociones as $idx => $promocion): ?>
        <?php $cantPromo++; ?>
        <li class="c_listini_first">
            <a href="<?php echo CController::createUrl('sitio/promocion',array('nombre'=>$idx)) ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
                <img src="<?php echo Yii::app()->request->baseUrl . $promocion['icono']; ?>">
                <h2 style="color:#fff;"><?php echo $promocion['nombre']?></h2>
                <p style="color:#fff;">&nbsp;</p>
            </a>
        </li>
    <?php endforeach; ?>
    <li class="<?php echo ($cantPromo==0 ? "c_listini_first" : "")?>">
        <a href="<?php echo CController::createUrl('sitio/categorias') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_categorias.png">
            <h2 style="color:#fff;">Categorías de productos</h2>
            <p style="color:#fff;">Conozca nuestra oferta completa.</p>
        </a>
    </li>
    <?php if (Yii::app()->controller->module->user->isGuest): ?>
        <li>
            <a href="<?php echo CController::createUrl('/vendedor/usuario/autenticar') ?>" data-ajax="false" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_cuenta.png">
                <h2 style="color:#fff;">Mi cuenta</h2>
                <p style="color:#fff;">Información personal.</p>
            </a>
        </li>
    <?php else: ?>
        <li>
            <a href="#panel-menu-usuario" class=" ui-nodisc-icon ui-alt-icon cbtn_menu_inicio">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inicio/icon_cuenta.png">
                <h2 style="color:#fff;">Mi cuenta</h2>
                <p style="color:#fff;">Información personal.</p>
            </a>
        </li>
    <?php endif; ?>
</ul>