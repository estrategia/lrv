<?php if (!Yii::app()->user->isGuest): ?>
    <div class="uttlo_nom">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_user_blanco.png"> Hola, <?php echo Yii::app()->user->shortName ?>
    </div>
<?php endif; ?>

<ul data-role="listview" data-inset="true" class="cpanel_menu_ppal ui-nodisc-icon ui-alt-icon">
    <li>
        <a href="<?php echo CController::createUrl('/usuario/infoPersonal') ?>" data-ajax="false">
            <h2>Información personal</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/usuario/contrasena') ?>" data-ajax="false">
            <h2>Cambiar contraseña</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/usuario/direcciones') ?>" data-ajax="false">
            <h2>Direcciones de despacho</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/usuario/listapedidos') ?>" data-ajax="false">
            <h2>Listado de pedidos</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/usuario/listapersonal') ?>" data-ajax="false">
            <h2>Listas personales</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/usuario/pagoexpress') ?>" data-ajax="false">
            <h2>Pago express</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('/usuario/salir') ?>" data-ajax="false">
            <h2>Cerrar sesión</h2>
        </a>
    </li>
</ul>