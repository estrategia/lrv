<?php if ($objModulo != null && $objModulo->tipo == ModulosConfigurados::TIPO_PROMOCION_FLOTANTE): ?>
    <a href="<?php echo $objModulo->contenido ?>" class="scroll-modulo-flotante"><?php echo $objModulo->descripcion ?></a>
<?php endif; ?>