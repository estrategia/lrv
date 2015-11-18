<?php if ($objModulo != null): ?>
    <?php if ($objModulo->tipo == ModulosConfigurados::TIPO_BANNER): ?>
        <?php $this->renderPartial('/contenido/_banner', array('objModulo' => $objModulo)) ?>
    <?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PRODUCTOS): ?>
        <?php $this->renderPartial('/contenido/_listaProductos', array('objModulo' => $objModulo))  ?>
    <?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_IMAGENES): ?>
        <?php $this->renderPartial('/contenido/_listaImagenes', array('objModulo' => $objModulo))  ?>
    <?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PROMOCION_FLOTANTE): ?>
        <?php $this->renderPartial('/contenido/_linkFlotante', array('objModulo' => $objModulo)) ?>
    <?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_HTML): ?>
        <?php $this->renderPartial('/contenido/html', array('contenido' => $objModulo->contenidoMovil)) ?>
    <?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_HTML_PRODUCTOS): ?>
        <?php $this->renderPartial('/contenido/_htmlProductos', array('objModulo' => $objModulo))  ?>
    <?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PRODUCTOS_CUADRICULA): ?>
        <?php $this->renderPartial('/contenido/_GrillaProductos', array('objModulo' => $objModulo))  ?>
    <?php endif; ?>
<?php endif; ?>
