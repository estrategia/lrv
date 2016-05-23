<ul data-role="listview" data-inset="true" class="cpanel_menu_ppal ui-nodisc-icon ui-alt-icon" >
    <?php if (Yii::app()->controller->module->user->isGuest): ?>
        <li>
            <a href="<?php echo CController::createUrl('usuario/autenticar') ?>" data-ajax="false" >
                <h2>Iniciar sesión</h2>
            </a>
        </li>
    <?php else: ?>
        <li>
            <a href="<?php echo CController::createUrl('usuario/contrasena') ?>" data-ajax="false">
                <h2>Cambiar contrase&ntilde;a</h2>
            </a>
        </li>
        <li>
            <a href="<?php echo CController::createUrl('sitio/categorias') ?>" data-ajax="false" >
                <h2>Categorías de productos</h2>
            </a>
        </li>
    <?php endif; ?>

    <li>
        <a href="<?php echo CController::createUrl('cliente/cliente') ?>" data-ajax="false">
            <h2><?= (Yii::app()->controller->module->user->getClienteLogueado())?'Cambiar':'Seleccionar'?> Cliente</h2>
        </a>
    </li>
    <li>
        <a href="<?php echo CController::createUrl('cliente/salirCliente') ?>" data-ajax="false">
            <h2>Cerrar cliente</h2>
        </a>
    </li>
    <?php if (!Yii::app()->controller->module->user->isGuest): ?>
        <li>
            <a href="<?php echo CController::createUrl('usuario/salir') ?>" data-ajax="false">
                <h2>Cerrar sesi&oacute;n vendedor</h2>
            </a>
        </li>
    <?php endif; ?>
</ul>