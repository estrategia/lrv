<?php foreach($promociones as $categoria):?>

<section>
    <div class="container-fluid">
        <div class="row">
        <?= $categoria->nombreCategoriaTienda?>
        </div>
        <div class="row">
            <?php $dim = round( 12 / count($categoria->listPromociones)) ?>
            <?php foreach ($categoria->listPromociones as $objPromocionCategoria): ?>
                <div class="col-md-3 padding6px">
                   <a href="<?php echo $this->createUrl($objPromocionCategoria->objPromocion->url) ?>">
                       <img style="width:100%;" src="<?php echo Yii::app()->request->baseUrl . $objPromocionCategoria->objPromocion->rutaImagen; ?>" alt="<?php echo $objPromocionCategoria->objPromocion->nombre ?>" />
                   </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<?php endforeach;?>