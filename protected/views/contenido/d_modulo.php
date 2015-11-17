<?php if ($objModulo->tipo == ModulosConfigurados::TIPO_BANNER): ?>
    <?php $this->renderPartial('/contenido/_d_banner', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PRODUCTOS): ?>
    <?php $this->renderPartial('/contenido/_d_listaProductos', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_IMAGENES): ?>
    <?php $this->renderPartial('/contenido/_d_listaImagenes', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PROMOCION_FLOTANTE): ?>
    <?php $this->renderPartial('/contenido/_d_linkFlotante', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_HTML): ?>
    <?php $this->renderPartial('/contenido/_d_html', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_HTML_PRODUCTOS): ?>
    <?php $this->renderPartial('/contenido/_d_htmlProductos', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PRODUCTOS_CUADRICULA): ?>
    <?php $this->renderPartial('/contenido/_d_GrillaProductos', array('objModulo' => $objModulo)) ?>
<?php endif; ?>
