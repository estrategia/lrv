<?php if (!Yii::app()->controller->module->user->isGuest): ?>
    <div class="uttlo_nom">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/icon_user_blanco.png"> Hola, <?php echo Yii::app()->controller->module->user->shortName ?> <br/>
        <?php if (Yii::app()->controller->module->user->getClienteLogueado()): ?> 
            Cliente seleccionado:  <?= Yii::app()->controller->module->user->getNombreCliente() ?>
        <?php elseif (Yii::app()->controller->module->user->getIsClienteInvitado()): ?>
            Cliente invitado
        <?php endif; ?>
    </div>
<?php endif; ?>

<ul data-role="listview" data-inset="true" class="cpanel_menu_ppal ui-nodisc-icon ui-alt-icon">
    <?php if (Yii::app()->controller->module->user->getClienteLogueado()): ?>
        <li>
            <a href="<?php echo CController::createUrl('cliente/infoPersonal') ?>" data-ajax="false">
                <h2>Informaci&oacute;n personal</h2>
            </a>
        </li>
    <?php endif; ?>

    <?php if (Yii::app()->controller->module->user->getClienteLogueado()): ?>
        <li>
            <a href="<?php echo CController::createUrl('cliente/direcciones') ?>" data-ajax="false">
                <h2>Direcciones de despacho</h2>
            </a>
        </li>
        <li>
            <a href="<?php echo CController::createUrl('cliente/listapedidos') ?>" data-ajax="false">
                <h2>Buscar pedidos</h2>
            </a>
        </li>
        <li>
            <a href="<?php echo CController::createUrl('cliente/listapersonal') ?>" data-ajax="false">
                <h2>Listas personales</h2>
            </a>
        </li>
        <!-- <li>
            <a href="<?php echo CController::createUrl('cliente/listacotizaciones') ?>" data-ajax="false">
                <h2>Cotizaciones</h2>
            </a>
        </li> -->
        <li>
            <a href="<?php echo CController::createUrl('cliente/bonos') ?>" data-ajax="false">
                <h2>Consultar Bonos</h2>
            </a>
        </li>
        <li>
            <a href="<?php echo CController::createUrl('cliente/cliente') ?>" data-ajax="false">
                <h2>Cambiar Cliente</h2>
            </a>
        </li>
        <li>
            <a href="<?php echo CController::createUrl('cliente/salirCliente') ?>" data-ajax="false">
                <h2>Cerrar cliente</h2>
            </a>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo CController::createUrl('usuario/salir') ?>" data-ajax="false">
            <h2>Cerrar sesi&oacute;n vendedor</h2>
        </a>
    </li>
</ul>