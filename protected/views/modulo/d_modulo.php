<?php if ($objModulo->tipo == ModulosConfigurados::TIPO_BANNER): ?>
    <?php $this->renderPartial('/modulo/_d_banner', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PRODUCTOS): ?>
    <?php $this->renderPartial('/modulo/_d_listaProductos', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_IMAGENES): ?>
    <?php $this->renderPartial('/modulo/_d_listaImagenes', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PROMOCION_FLOTANTE): ?>
    <a href="<?php echo $objModulo->contenido ?>" class="scroll-modulo-flotante"><?php echo $objModulo->descripcion ?></a>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_HTML): ?>
    <?php $this->renderPartial('/modulo/_d_html', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_HTML_PRODUCTOS): ?>
    <?php $this->renderPartial('/modulo/_d_htmlProductos', array('objModulo' => $objModulo)) ?>
<?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PRODUCTOS_CUADRICULA): ?>
    <?php $this->renderPartial('/modulo/_d_GrillaProductos', array('objModulo' => $objModulo)) ?>
<?php endif; ?>
