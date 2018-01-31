<ul class="nav nav-pills nav-stacked menu-tucuenta">
    <li class="<?php echo ($vista=="d_registro" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/infoPersonal') ?>" >
            Informaci&oacute;n personal
        </a>
    </li>
    <li class="<?php echo ($vista=="d_contrasena" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/contrasena') ?>" >
            Cambia tu contrase&ntilde;a
        </a>
    </li>
    <li class="<?php echo ($vista=="d_direcciones" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/direcciones') ?>" >
            Tus direcciones de despacho
        </a>
    </li>
    <li class="<?php echo ($vista=="d_pedidos" || $vista=="d_pedido" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/listapedidos') ?>" >
            Listado de pedidos
        </a>
    </li>
    <li class="<?php echo ( $vista=="d_listaPersonal" || $vista=="d_listaDetalle" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/listapersonal') ?>" >
            Tus listas personales
        </a>
    </li>
    <!-- <li class="<?php echo ($vista=="d_cotizaciones" || $vista == "d_cotizacion" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/listacotizaciones') ?>" >
            Cotizaciones
        </a>
    </li> -->
    <li class="<?php echo ($vista=="d_suscripciones" || $vista == "d_suscripciones" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/suscripciones') ?>" >
            Suscripciones
        </a>
    </li>
    <li class="<?php echo ($vista=="d_pagoExpress" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/pagoexpress') ?>" >
            Pago express
        </a>
    </li>
    <li class="<?php echo ($vista=="d_bonos" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/bonos') ?>">
            Tus bonos de promoción
        </a>
    </li>
    <li class="<?php echo ($vista=="" ? "active" : "")?>">
        <a href="<?php echo CController::createUrl('/usuario/salir') ?>" >
            Cerrar sesi&oacute;n
        </a>
    </li>
</ul>
