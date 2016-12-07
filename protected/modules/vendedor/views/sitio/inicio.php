<div class="ui-content">
    <?php foreach ($listModulosPromociones as $idx => $objModulo) : ?>
        <div>
            <a data-ajax="false" href="<?php echo $this->createUrl('/vendedor/catalogo/productos', array('modulo' => $objModulo->idModulo)) ?>" ><img class="ajustada" src="<?php echo Yii::app()->request->baseUrl ."/" . Yii::app()->params->callcenter['modulosConfigurados']['urlImagenes'] . $objModulo->contenidoMovil; ?>" alt=""></a>
        </div>
    <?php endforeach; ?>
</div>