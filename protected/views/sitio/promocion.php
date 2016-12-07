<div class="ui-content">
    <?php foreach ($listaItems as $idx => $itemPromocion) : ?>
        <div>
            <a data-ajax="false" href="<?php echo $this->createUrl('/catalogo/promocion', array('nombre' => $promocion, 'elemento' => $idx)) ?>" ><img class="ajustada" src="<?php echo Yii::app()->request->baseUrl . $itemPromocion['rutaImagen']; ?>" alt=""></a>
        </div>
    <?php endforeach; ?>
</div>