<ul data-role="listview" data-inset="true" class="cpanel_menu_ppal ui-nodisc-icon ui-alt-icon" >
    <?php if (Yii::app()->user->isGuest): ?>
        <li>
            <a href="<?php echo CController::createUrl('/usuario/autenticar') ?>" data-ajax="false" >
                <h2>Iniciar sesión</h2>
            </a>
        </li>
        <li>
            <a href="<?php echo CController::createUrl('/usuario/registro') ?>" data-ajax="false" >
                <h2>Registrarse</h2>
            </a>
        </li>
    <?php else: ?>
        <li>
            <a href="<?php echo CController::createUrl('/usuario') ?>" data-ajax="false">
                <h2>Mi cuenta</h2>
            </a>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo CController::createUrl('/sitio/categorias') ?>" data-ajax="false" >
            <h2>Categoria de productos</h2>
        </a>
    </li>
    <li>
        <a href="#" >
            <h2>Descuentos</h2>
        </a>
    </li>

    <li>
        <a href="#" >
            <h2>Puntos de venta</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/sitio/index') ?>" data-ajax="false" >
            <h2>Modificar tipo de entrega</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/sitio/ubicacion') ?>" data-ajax="false" >
            <h2>Modificar ubicación</h2>
        </a>
    </li>
    <li>
        <a href="#" >
            <h2>Carro de compras</h2>
        </a>
    </li>
</ul>